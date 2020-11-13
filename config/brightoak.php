<?php

return [
    'whitelisted_ip_addresses' => explode(',', env('WHITELISTED_IP_ADDRESSES')),
    'prod_user' => env('PRODUCTION_SSH_USER'),
    'prod_host' => env('PRODUCTION_SSH_HOST'),
    'prod_port' => env('PRODUCTION_SSH_PORT', 22),
    // in 24 hour time format, the number of the hour that determines if the lead displayed is for today or for tomorrow
    // if the current hour is before this hour, it will show "today's leads" if the current time is after this time,
    // it will show "tomorrow's leads". All other leads will show up in pending leads.
    'lead_cutoff_hour' => env('LEAD_CUTOFF_HOUR', 16),
    'ide_helper_enabled' => env('IDE_HELPER_ENABLED', false),
    'chromedriver_host' => env('CHROMEDRIVER_HOST', 'http://localhost:9515'),
    'disable_local_cache' => env('DISABLE_LOCAL_CACHE', true),
    'salesforce_base_url' => env('SALESFORCE_BASE_URL'),
    'salesforce_client_id' => env('SALESFORCE_CLIENT_ID'),
    'salesforce_client_secret' => env('SALESFORCE_CLIENT_SECRET'),
    'salesforce_redirect_uri' => env('SALESFORCE_REDIRECT_URI'),

];
