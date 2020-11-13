<?php

use App\DiscoveryQuestion;
use Illuminate\Database\Seeder;

class DiscoveryQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiscoveryQuestion::create(['question' => 'How did you hear about us today?', 'order_column' => 1]);
        DiscoveryQuestion::create(['question' => 'Most people call us for more than one reason.  The first reason is…..it’s Kohler, a brand everyone knows and trusts.  What’s another reason you decided to call?', 'order_column' => 2]);
        DiscoveryQuestion::create(['question' => 'Tell me what you already know about walk-in baths.', 'order_column' => 3]);
        DiscoveryQuestion::create(['question' => 'Have you ever had anyone come out to your home to discuss a walk-in bath as an option?', 'order_column' => 4]);
        DiscoveryQuestion::create(['question' => 'What are some of the biggest challenges you’re currently having with your existing bathroom?', 'order_column' => 5]);
        DiscoveryQuestion::create(['question' => 'How long have you been dealing with those challenges?', 'order_column' => 6]);
        DiscoveryQuestion::create(['question' => 'What made you decide to do something about it now?', 'order_column' => 7]);
        DiscoveryQuestion::create(['question' => 'Why do you think a walk-in bath will benefit you?', 'order_column' => 8]);
    }
}
