<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SshToProduction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ssh:prod';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        if (app()->environment() !== 'local') {
            exit;
        }
        $user = config('brightoak.prod_user');
        $host = config('brightoak.prod_host');
        $port = config('brightoak.prod_port');
        $sshString = "ssh -t $user@$host -p $port";
        passthru($sshString);
    }
}
