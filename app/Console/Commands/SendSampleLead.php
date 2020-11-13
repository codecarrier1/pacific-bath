<?php

namespace App\Console\Commands;

use App\Service;
use App\User;
use Faker\Generator as Faker;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class SendSampleLead extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:fake-lead {--service=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /** @var Faker */
    protected $faker;

    protected $client;

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
        // Normally, you'd just use dependency injection to do this, but all constructors of commands are loaded
        // at boot, which causes problems in production if a dev dependency is required
        // because of this, I'm simply resolving it here instead.
        $this->resolveFaker();

        $soapData = file_get_contents(base_path('tests/sampleNotification.xml'));
        $xml = $this->insertFakeData($soapData);

        $client = new Client([ 'headers' => [
            'Content-Type' => 'text/xml; charset=UTF8',
        ]]);

        $url = 'http://pacificbath.test/api/create-new-lead';
        $response = $client->request('POST', $url, [ 'body' => $xml]);
        dump($response->getBody()->getContents());

    }

    protected function resolveFaker()
    {
        $this->faker = app()->make(Faker::class);

    }

        protected function insertFakeData($data)
    {
        $ids = [2, 3, 7, 9];
        $salesRep = User::Role('Sales Representative')->whereIn('id', $ids)->inRandomOrder()->firstOrFail();
        $service = Service::inRandomOrder()->first();
        $fullName = $this->faker->lastName . ", " . $this->faker->firstName;
        $data = str_replace('FAKER_UUID', $this->faker->uuid, $data);
        $data = str_replace('FAKER_ADDRESS', $this->faker->streetAddress, $data);
        $data = str_replace('FAKER_CITY', $this->faker->city, $data);
        $data = str_replace('FAKER_LAST_FIRST', $fullName , $data);
        $data = str_replace('FAKER_PROSPECT_ID', Str::random(), $data);
        $data = str_replace('FAKER_SOURCE', Str::random(), $data);
        $data = str_replace('SALES_REP_SALESFORCE_ID', $salesRep->salesforce_id, $data);
        $data = str_replace('FAKER_STATE_ABBREV', $this->faker->stateAbbr, $data);
        $data = str_replace('FAKER_ZIP', $this->faker->postcode, $data);
        $data = str_replace('SERVICE_NAME', $service->name, $data);
        $data = str_replace('START_DATE_TIME', now()->addHours(48), $data);

        return $data;
    }
}
