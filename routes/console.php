<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('generate', function () {
    $generator = new \Wsdl2PhpGenerator\Generator();
    $generator->generate(
        new \Wsdl2PhpGenerator\Config(array(
            'inputFile' => 'workflowOutboundMessage.wsdl',
            'outputDir' => storage_path('soap'),
        ))
    );
})->describe('generate soap stuff');
