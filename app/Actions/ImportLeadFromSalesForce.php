<?php

namespace App\Actions;

use App\Lead;
use App\SalesDisposition;
use App\Service;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use SimpleXMLElement;

class ImportLeadFromSalesForce
{


    public function handle($xml)
    {
        $data = $this->parseXml($xml);
        $verifiedData = $this->verifyData($data);
        return $this->response($verifiedData);
    }

    protected function parseXml($xml)
    {
        $response = preg_replace("/(<\/?)(\w+):([^>]*>)/", "$1$2$3", $xml);
        $parsed = new SimpleXMLElement($response);
        return json_decode(json_encode((array)$parsed), true);
    }

    protected function verifyData($data) : bool
    {
        if(array_key_exists('soapenvBody', $data)){
            if(array_key_exists('notifications', $data['soapenvBody'])){
                if(array_key_exists('Notification', $data['soapenvBody']['notifications'])){
                    if(array_key_exists('sObject', $data['soapenvBody']['notifications']['Notification'])){
                        return $this->createLead($data['soapenvBody']['notifications']['Notification']['sObject']);
                    }
                }
            }
        }
        return false;
    }

    protected function createLead($leadData) : bool
    {
        $date = Carbon::parse($leadData['sfi360__StartDateTime__c']);
        $salesRep = User::findBySalesforceId($leadData['sfi360__Sales_Rep_1__c']);
        $service = Service::findBySalesforceName($leadData['sfi360__Components__c']);

        $nameArray = explode(', ', $leadData['sfi360__Prospect_Name__c']);
        $data = [
            'salesforce_appointment_id' => $leadData['sfId'],
            'salesforce_prospect_id' => $leadData['sfi360__Prospect__c'],
            'salesforce_lead_source' => $leadData['sfi360__Lead_Source__c'],
            'first_name' => $nameArray[1],
            'last_name' => $nameArray[0],
            'address' => $leadData['sfi360__Address__c'],
            'city' => $leadData['sfi360__City__c'],
            'state' => $leadData['sfi360__State__c'],
            'zip' => $leadData['sfi360__Zip__c'],
            'email' => $leadData['sfi360__Email_Address__c'] ?? null,
            'appointment_time' => $date,
            'sales_disposition_id' => SalesDisposition::NEW,
            'service_id' => $service->id,
            'user_id' => $salesRep->id,
        ];

        if($lead = Lead::where('salesforce_appointment_id', $leadData['sfId'])->count()){
            return true;
        }

        return (bool) Lead::create($data);
    }


    protected function response($success = true) {
        return '<?xml version="1.0" encoding="UTF-8"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
         <soapenv:Body>
         <notifications xmlns="http://soap.sforce.com/2005/09/outbound">
         <Ack>' . (int)$success . '</Ack>
         </notifications>
         </soapenv:Body>
         </soapenv:Envelope>';
    }
}
