<?php

namespace App\Http\Controllers;

use App\AuthToken;
use App\Services\SalesforceService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SalesforceController extends Controller
{
    public function callback(Request $request)
    {
        try{
            if($code = $request->get('code')){
                $client = new Client;
                $authorizationRequest = $client->post(config('brightoak.salesforce_base_url') . '/services/oauth2/token', [
                    'form_params' => [
                        'code' => $code,
                        'grant_type' => 'authorization_code',
                        'client_id' => config('brightoak.salesforce_client_id'),
                        'client_secret' => config('brightoak.salesforce_client_secret'),
                        'redirect_uri' => config('brightoak.salesforce_redirect_uri'),
                    ],
                ]);
                $data = json_decode($authorizationRequest->getBody()->getContents());
                $token = AuthToken::where('type', AuthToken::SALESFORCE)->where('user_id', auth()->id())->firstOrNew();
                $token->type = AuthToken::SALESFORCE;
                $token->user_id = auth()->id();
                $token->access_token = $data->access_token;
                $token->refresh_token = $data->refresh_token;
                $token->save();
                $user = auth()->user();
                $service = new SalesforceService($user);
                $record = $service->getStaffByEmail($user->email);
                $user->salesforce_id = $record->records[0]->Id;
                $user->save();
                cache()->put('salesforce_auth_succeeded_' . auth()->id(), 1, 10);
                return redirect()->route('home');
            }
        } catch (\Throwable $exception){
            $message = $exception->getMessage();
        }

        Log::error(json_encode($request->getContent()));
        return redirect()->to(config('home'))->withErrors('error', $message);
    }
}
