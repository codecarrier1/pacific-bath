@unless(optional(auth()->user()->salesforceToken)->access_token)
    <div class="text-red-870e14 bg-red-f6d7da border-solid border border-red-c70c16 text-20 font-bold px-8 py-6 mb-10 rounded-lg">
        <p>Attention! Your account has not been linked with Salesforce! You will not be able to receive leads until you link your account.</p>
        <form action="{{config('brightoak.salesforce_base_url')}}/services/oauth2/authorize" method="POST">
            <input name="redirect_uri" type="hidden" value="{{ config('brightoak.salesforce_redirect_uri') }}" >
            <input name="client_id" type="hidden" value="{{ config('brightoak.salesforce_client_id') }}" >
            <input name="response_type" type="hidden" value="code" >
            <input name="client_secret" type="hidden" value="{{ config('brightoak.salesforce_client_secret') }}" >
            <button type="submit" class="btn btn-default btn-primary hover:underline">Click here to link with Salesforce</button>
        </form>
    </div>
@endunless
@if(cache()->has('salesforce_auth_succeeded_' . auth()->id()))
    <div class="text-green-094d16 bg-green-d5f5da border-solid border border-green-0cc72e text-20 font-bold px-8 py-6 mb-10 rounded-lg">
        <p>Your account has been successfully linked with Salesforce.</p>
    </div>
@endif
@if($errors->any())
    @foreach($errors as $error)
        <p>{{ $error }}</p>
        @endforeach
    @endif
