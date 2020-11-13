<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class UpdateIDEHelper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:ide-helper';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updates the IDE Helper files in non production environments.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (app()->environment() !== 'production') {
            Artisan::call('ide-helper:generate');
            Artisan::call('ide-helper:meta');
            Artisan::call('ide-helper:models --write');
        }
    }
}
