<?php

use Illuminate\Database\Seeder;

class JsQuestionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('js_questions')->delete();
        
        \DB::table('js_questions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'question' => 'Type of Property:',
                'order_column' => 1,
                'type' => 'multiple-choice',
                'choices' => '[{"key": "3359cf32edd16626", "layout": "choices", "attributes": {"choice": "House"}}, {"key": "baf20a9ba778ab3b", "layout": "choices", "attributes": {"choice": "TownHouse"}}, {"key": "2f15aeaf41a4dc45", "layout": "choices", "attributes": {"choice": "Mobile Home Single"}}, {"key": "5617cc1335f395e8", "layout": "choices", "attributes": {"choice": "Mobile Home Double"}}, {"key": "929769b3a696eb54", "layout": "choices", "attributes": {"choice": "Condo"}}]',
                'allow_additional_comments' => 1,
                'help_text' => 'If a Condo, include property manager name and phone here:',
                'created_at' => '2019-10-08 17:03:11',
                'updated_at' => '2019-10-08 17:03:11',
            ),
            1 => 
            array (
                'id' => 2,
                'question' => 'Walk-in tub-bath location:',
                'order_column' => 2,
                'type' => 'multiple-choice',
                'choices' => '[{"key": "9b1897b79b02be36", "layout": "choices", "attributes": {"choice": "Basement"}}, {"key": "f86d35395ca95fc7", "layout": "choices", "attributes": {"choice": "1st Floor"}}, {"key": "09beefaaf0b9640a", "layout": "choices", "attributes": {"choice": "2nd Floor"}}, {"key": "023c4af0510bad2d", "layout": "choices", "attributes": {"choice": "3rd Floor"}}]',
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:06:16',
                'updated_at' => '2019-10-08 17:08:16',
            ),
            2 => 
            array (
                'id' => 3,
                'question' => 'Existing Tub Length and Width:',
                'order_column' => 3,
                'type' => 'text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:08:55',
                'updated_at' => '2019-10-08 17:08:55',
            ),
            3 => 
            array (
                'id' => 4,
                'question' => 'Does tub backup to another bath?',
                'order_column' => 4,
                'type' => 'yesno-choice',
                'choices' => '[]',
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:09:11',
                'updated_at' => '2019-10-08 17:09:11',
            ),
            4 => 
            array (
                'id' => 5,
                'question' => 'Water heater capacity in gallons:',
                'order_column' => 5,
                'type' => 'text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:09:29',
                'updated_at' => '2019-10-08 17:09:29',
            ),
            5 => 
            array (
                'id' => 6,
                'question' => 'Water heater type:',
                'order_column' => 6,
                'type' => 'multiple-choice',
                'choices' => '[{"key": "3fecc8f9f80aeb20", "layout": "choices", "attributes": {"choice": "Gas"}}, {"key": "955099659370e24a", "layout": "choices", "attributes": {"choice": "Electric"}}, {"key": "f5e4d10d6c6c9486", "layout": "choices", "attributes": {"choice": "Tankless Heater"}}]',
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:09:54',
                'updated_at' => '2019-10-08 17:09:54',
            ),
            6 => 
            array (
                'id' => 7,
                'question' => 'Replacing Water Heater?',
                'order_column' => 7,
                'type' => 'yesno-choice',
                'choices' => '[]',
                'allow_additional_comments' => 1,
                'help_text' => 'If yes, width, length, and height of area:',
                'created_at' => '2019-10-08 17:10:26',
                'updated_at' => '2019-10-08 17:10:26',
            ),
            7 => 
            array (
                'id' => 8,
                'question' => 'Distance between tub and vanity',
                'order_column' => 8,
                'type' => 'text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:10:37',
                'updated_at' => '2019-10-08 17:10:37',
            ),
            8 => 
            array (
                'id' => 9,
                'question' => 'Distance between tub and toilet:',
                'order_column' => 9,
                'type' => 'text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:10:49',
                'updated_at' => '2019-10-08 17:10:49',
            ),
            9 => 
            array (
                'id' => 10,
                'question' => 'Does vanity decrease the size of the opening by the door?',
                'order_column' => 10,
                'type' => 'yesno-choice',
                'choices' => '[]',
                'allow_additional_comments' => 1,
                'help_text' => 'If yes, how much?',
                'created_at' => '2019-10-08 17:11:15',
                'updated_at' => '2019-10-08 17:11:15',
            ),
            10 => 
            array (
                'id' => 11,
                'question' => 'Width of front or back door of house:',
                'order_column' => 11,
                'type' => 'text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:11:33',
                'updated_at' => '2019-10-08 17:11:33',
            ),
            11 => 
            array (
                'id' => 12,
                'question' => 'Width of Interior Door:',
                'order_column' => 12,
                'type' => 'text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:11:44',
                'updated_at' => '2019-10-08 17:11:44',
            ),
            12 => 
            array (
                'id' => 13,
                'question' => 'Width of Bathroom Door:',
                'order_column' => 13,
                'type' => 'text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:12:00',
                'updated_at' => '2019-10-08 17:12:00',
            ),
            13 => 
            array (
                'id' => 14,
                'question' => 'Entrance Walkway:',
                'order_column' => 14,
                'type' => 'text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:12:15',
                'updated_at' => '2019-10-08 17:12:15',
            ),
            14 => 
            array (
                'id' => 15,
                'question' => 'Width of Interior Hall:',
                'order_column' => 15,
                'type' => 'text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:12:24',
                'updated_at' => '2019-10-08 17:12:24',
            ),
            15 => 
            array (
                'id' => 16,
                'question' => 'Stair Width:',
                'order_column' => 16,
                'type' => 'text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:12:34',
                'updated_at' => '2019-10-08 17:12:34',
            ),
            16 => 
            array (
                'id' => 17,
                'question' => 'Stair Landings:',
                'order_column' => 17,
                'type' => 'long-text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:13:11',
                'updated_at' => '2019-10-08 17:13:11',
            ),
            17 => 
            array (
                'id' => 18,
            'question' => 'R & R Door(s) Frame:',
                'order_column' => 18,
                'type' => 'yesno-choice',
                'choices' => '[]',
                'allow_additional_comments' => 1,
                'help_text' => 'If yes, put number',
                'created_at' => '2019-10-08 17:13:54',
                'updated_at' => '2019-10-08 17:13:54',
            ),
            18 => 
            array (
                'id' => 19,
            'question' => 'Enlarge Door(s):',
                'order_column' => 19,
                'type' => 'yesno-choice',
                'choices' => '[]',
                'allow_additional_comments' => 1,
                'help_text' => 'Include door number and available space Rt and Let',
                'created_at' => '2019-10-08 17:14:28',
                'updated_at' => '2019-10-08 17:14:28',
            ),
            19 => 
            array (
                'id' => 20,
                'question' => 'Replace Door:',
                'order_column' => 20,
                'type' => 'yesno-choice',
                'choices' => '[]',
                'allow_additional_comments' => 1,
                'help_text' => 'Include door number and available space Rt and Let',
                'created_at' => '2019-10-08 17:14:51',
                'updated_at' => '2019-10-08 17:14:51',
            ),
            20 => 
            array (
                'id' => 21,
                'question' => 'Walls around bath door are?',
                'order_column' => 21,
                'type' => 'multiple-choice',
                'choices' => '[{"key": "bcda704ed89f6ec1", "layout": "choices", "attributes": {"choice": "Tile"}}, {"key": "d80072b0dfa82bc5", "layout": "choices", "attributes": {"choice": "Wallpaper"}}, {"key": "0303b71d54245404", "layout": "choices", "attributes": {"choice": "Painted Sheetrock"}}, {"key": "d4d87e0a80c147f7", "layout": "choices", "attributes": {"choice": "Plaster"}}]',
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:15:57',
                'updated_at' => '2019-10-08 17:15:57',
            ),
            21 => 
            array (
                'id' => 22,
                'question' => 'Does a Stair Climber impact access to bath?',
                'order_column' => 22,
                'type' => 'yesno-choice',
                'choices' => '[]',
                'allow_additional_comments' => 1,
                'help_text' => 'Explain if Yes',
                'created_at' => '2019-10-08 17:16:32',
                'updated_at' => '2019-10-08 17:16:32',
            ),
            22 => 
            array (
                'id' => 23,
                'question' => 'R & R Toilet?',
                'order_column' => 23,
                'type' => 'yesno-choice',
                'choices' => '[]',
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:16:46',
                'updated_at' => '2019-10-08 17:16:46',
            ),
            23 => 
            array (
                'id' => 24,
                'question' => 'R & R Vanity?',
                'order_column' => 24,
                'type' => 'yesno-choice',
                'choices' => '[]',
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:16:57',
                'updated_at' => '2019-10-08 17:16:57',
            ),
            24 => 
            array (
                'id' => 25,
                'question' => 'Existing Tub is:',
                'order_column' => 25,
                'type' => 'multiple-choice',
                'choices' => '[{"key": "ff44d7f65e0429e9", "layout": "choices", "attributes": {"choice": "One PIece"}}, {"key": "cc8eb354ed1caa89", "layout": "choices", "attributes": {"choice": "Tub"}}, {"key": "a53178b5511ee17b", "layout": "choices", "attributes": {"choice": "Shower"}}, {"key": "506589dcf1b7cdd2", "layout": "choices", "attributes": {"choice": "Free Standing"}}, {"key": "766fc48c5a5e8a49", "layout": "choices", "attributes": {"choice": "New Construction"}}]',
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:17:34',
                'updated_at' => '2019-10-08 17:17:34',
            ),
            25 => 
            array (
                'id' => 26,
                'question' => 'Tub Type:',
                'order_column' => 26,
                'type' => 'multiple-choice',
            'choices' => '[{"key": "a26fc4c3fde0b80f", "layout": "choices", "attributes": {"choice": "Cast Iron"}}, {"key": "e72c7cb663a50e8a", "layout": "choices", "attributes": {"choice": "Plastic"}}, {"key": "702b157e78adbe01", "layout": "choices", "attributes": {"choice": "Fiberglass"}}, {"key": "1919be5f2b5e3c68", "layout": "choices", "attributes": {"choice": "Jetted Tub"}}, {"key": "dfcecfe9bac801ae", "layout": "choices", "attributes": {"choice": "Other (describe below)"}}]',
                'allow_additional_comments' => 1,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:18:36',
                'updated_at' => '2019-10-08 17:18:36',
            ),
            26 => 
            array (
                'id' => 27,
                'question' => 'Existing Safety Bars?',
                'order_column' => 27,
                'type' => 'yesno-choice',
                'choices' => '[]',
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:18:49',
                'updated_at' => '2019-10-08 17:18:49',
            ),
            27 => 
            array (
                'id' => 28,
                'question' => 'Reuse Existing Safety Bar?',
                'order_column' => 28,
                'type' => 'yesno-choice',
                'choices' => '[]',
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:19:02',
                'updated_at' => '2019-10-08 17:19:02',
            ),
            28 => 
            array (
                'id' => 29,
                'question' => 'Walls around tub:',
                'order_column' => 29,
                'type' => 'multiple-choice',
            'choices' => '[{"key": "7295b15ed557a562", "layout": "choices", "attributes": {"choice": "Tile"}}, {"key": "a3a8585f240f2e9a", "layout": "choices", "attributes": {"choice": "Wallpaper"}}, {"key": "4df0567b1046375c", "layout": "choices", "attributes": {"choice": "Painted Sheetrock"}}, {"key": "634b9386ecd618f7", "layout": "choices", "attributes": {"choice": "Other (describe below)"}}]',
                'allow_additional_comments' => 1,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:19:41',
                'updated_at' => '2019-10-08 17:19:41',
            ),
            29 => 
            array (
                'id' => 30,
                'question' => 'Window over the bathtub?',
                'order_column' => 30,
                'type' => 'yesno-choice',
                'choices' => '[]',
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:19:58',
                'updated_at' => '2019-10-08 17:19:58',
            ),
            30 => 
            array (
                'id' => 31,
                'question' => 'Distance from the floor of the bathtub to the bottom of the window sill edge:',
                'order_column' => 31,
                'type' => 'text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:20:26',
                'updated_at' => '2019-10-08 17:20:26',
            ),
            31 => 
            array (
                'id' => 32,
                'question' => 'Is drain accessible from underneath:',
                'order_column' => 32,
                'type' => 'yesno-choice',
                'choices' => '[]',
                'allow_additional_comments' => 1,
                'help_text' => 'If yes, how?',
                'created_at' => '2019-10-08 17:20:51',
                'updated_at' => '2019-10-08 17:20:51',
            ),
            32 => 
            array (
                'id' => 33,
                'question' => 'Electric Panel Brand',
                'order_column' => 33,
                'type' => 'text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:21:03',
                'updated_at' => '2019-10-08 17:21:03',
            ),
            33 => 
            array (
                'id' => 34,
                'question' => 'Number of open slots in electrical panel:',
                'order_column' => 34,
                'type' => 'text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:21:15',
                'updated_at' => '2019-10-08 17:21:15',
            ),
            34 => 
            array (
                'id' => 35,
                'question' => 'Electric panel type:',
                'order_column' => 35,
                'type' => 'multiple-choice',
            'choices' => '[{"key": "ed19d789fa8ad410", "layout": "choices", "attributes": {"choice": "Fuse"}}, {"key": "e2ef5011fc5a2b62", "layout": "choices", "attributes": {"choice": "Breaker"}}, {"key": "e56bdd2a5397dfec", "layout": "choices", "attributes": {"choice": "Other (describe below)"}}]',
                'allow_additional_comments' => 1,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:21:53',
                'updated_at' => '2019-10-08 17:21:53',
            ),
            35 => 
            array (
                'id' => 36,
                'question' => 'Location of Electrical Panel:',
                'order_column' => 36,
                'type' => 'multiple-choice',
            'choices' => '[{"key": "4179c08de8ef9418", "layout": "choices", "attributes": {"choice": "Basement"}}, {"key": "2620ed166309d8d7", "layout": "choices", "attributes": {"choice": "Garage"}}, {"key": "b07b4604988ab742", "layout": "choices", "attributes": {"choice": "Other (describe below)"}}]',
                'allow_additional_comments' => 1,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:22:45',
                'updated_at' => '2019-10-08 17:22:45',
            ),
            36 => 
            array (
                'id' => 37,
                'question' => 'Distance from Electrical Panel to Bathroom:',
                'order_column' => 37,
                'type' => 'text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:23:02',
                'updated_at' => '2019-10-08 17:23:02',
            ),
            37 => 
            array (
                'id' => 38,
                'question' => 'Additional work or services request:',
                'order_column' => 38,
                'type' => 'long-text-field',
                'choices' => NULL,
                'allow_additional_comments' => 0,
                'help_text' => NULL,
                'created_at' => '2019-10-08 17:23:20',
                'updated_at' => '2019-10-08 17:23:20',
            ),
        ));
        
        
    }
}