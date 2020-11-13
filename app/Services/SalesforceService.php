<?php

namespace App\Services;

use App\AuthToken;
use App\Lead;
use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class SalesforceService
{

    private $client;
    private $auth;

    public function __construct(User $user)
    {
        $this->client = new Client(['base_uri' => config('brightoak.salesforce_base_url')]);
        $this->auth = AuthToken::where('type', AuthToken::SALESFORCE)
            ->where('user_id', $user->id)
            ->firstOrFail();
    }

    private function refreshToken()
    {
        $request = $this->client->post('/services/oauth2/token', [
            RequestOptions::FORM_PARAMS => [
                'grant_type' => 'refresh_token',
                'client_id' => config('brightoak.salesforce_client_id'),
                'client_secret' => config('brightoak.salesforce_client_secret'),
                'refresh_token' => $this->auth->refresh_token,
            ]
        ]);
        $response = json_decode($request->getBody()->getContents());
        $this->auth->access_token = $response->access_token;
        $this->auth->save();
    }

    public function listObjects()
    {
        return $this->doRequest('/services/data/v48.0/sobjects/', 'GET');
    }

    public function getLead(Lead $lead)
    {
        $endpoint = '/services/data/v48.0/sobjects/i360__Appointment__c/' . $lead->salesforce_appointment_id;
        return $this->doRequest($endpoint, 'GET');
    }

    public function getStaffByEmail($email)
    {
        $query = "SELECT Id,Name,i360__Email__c FROM i360__Staff__c WHERE i360__Email__c Like '$email'";
        $query = str_replace(' ', '+', $query);
        return $this->doRequest('/services/data/v48.0/queryAll?q=' . $query, 'GET');
    }


    public function getStaff($id)
    {
        $endpoint = '/services/data/v48.0/sobjects/i360__Staff__c/' . $id;
        return $this->doRequest($endpoint, 'GET');
    }


    public function listStaff()
    {
        $query = 'SELECT Id,Name,i360__Email__c FROM i360__Staff__c';
        $query = str_replace(' ', '+', $query);
        return $this->doRequest('/services/data/v48.0/queryAll?q=' . $query, 'GET');
    }

    public function listMarketingOpportunities()
    {
        return $this->doRequest('/services/data/v48.0/sobjects/i360__Marketing_Task__c/', 'GET');
    }

    public function confirmAppointment(Lead $lead)
    {
        $endpoint = '/services/data/v48.0/sobjects/i360__Appointment__c/' . $lead->salesforce_appointment_id;
        $header = ['Content-Type' => 'application/json'];
        $options = [RequestOptions::JSON => [
            'i360__Confirmed_On__c' => now()->timezone('America/Los_Angeles')->toIso8601String(),
            'i360__Confirmed_By__c' => $lead->user->salesforce_id,
        ]
        ];
        return $this->doRequest($endpoint, 'PATCH', $header, $options);
    }

    public function updateEmail($id, $email)
    {
        $endpoint = '/services/data/v48.0/sobjects/i360__Staff__c/' . $id;
        $header = ['Content-Type' => 'application/json'];
        $options = [RequestOptions::JSON => [
            'i360__Email__c' => $email,
        ]];
        return $this->doRequest($endpoint, 'PATCH', $header, $options);
    }

    public function updateExternalId(Lead $lead)
    {
        $endpoint = '/services/data/v48.0/sobjects/i360__Appointment__c/' . $lead->salesforce_appointment_id;
        $header = ['Content-Type' => 'application/json'];
        $options = [RequestOptions::JSON => [
            'i360__External_System_Id__c' => $lead->id,
        ]];
        return $this->doRequest($endpoint, 'PATCH', $header, $options);
    }

    public function resultAppointment(Lead $lead)
    {
        $endpoint = '/services/data/v48.0/sobjects/i360__Appointment__c/' . $lead->salesforce_appointment_id;
        $header = ['Content-Type' => 'application/json'];
        $options = [RequestOptions::JSON => [
            'i360__Quoted_Amount__c' => $lead->payment->discounted_total,
            'i360__Result__c' => $lead->salesDisposition->name,
            'i360__Comments__c' => optional($lead->dispositionReport)->notes,
        ]];
        $appointmentReponse = $this->doRequest($endpoint, 'PATCH', $header, $options);
        $marketingResponse = $this->createMarketingOpportunity($lead);
        return [$appointmentReponse, $marketingResponse];
    }



    public function createMarketingOpportunity(Lead $lead)
    {
        $endpoint = '/services/data/v48.0/sobjects/i360__Marketing_Task__c/';
        $header = ['Content-Type' => 'application/json'];
        $options = [RequestOptions::JSON => [
            'i360__Appointment__c' => $lead->salesforce_appointment_id,
            'i360__Due_Date__c' => now()->addDay()->timezone('America/Los_Angeles')->toIso8601String(),
            'i360__Lead_Source__c' => $lead->salesforce_lead_source,
            'i360__Prospect__c' => $lead->salesforce_prospect_id,
            'i360__Type__c' => 'Follow-up Appointment', //TODO find out if other values need to be set
        ]];
        return $this->doRequest($endpoint, 'POST', $header, $options);
    }


    private function doRequest($endpoint, $method, $headers = [], $options = [])
    {
        $authHeaders = ['Authorization' => 'Bearer ' . $this->auth->access_token];
        $headerContents = array_merge($authHeaders, $headers);
        $defaultOptions = ['timeout' => 15];
        $requestsOptions = array_merge($defaultOptions, $options, [RequestOptions::HEADERS => $headerContents]);
        try {
            $response = $this->client->request($method, $endpoint, $requestsOptions);
            return json_decode($response->getBody()->getContents());
        } catch (ClientException $exception) {
            $message = $exception->getMessage();
            if (Str::contains($message, 'INVALID_SESSION_ID')) {
                $this->refreshToken();;
                return $this->doRequest($endpoint, $method, $headers, $options);
            }
            throw $exception;
        }

    }

}
