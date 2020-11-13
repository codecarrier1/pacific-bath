<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // This is only needed for testing.
        $files = glob(database_path('seeds/backup/*.jpeg'));
        foreach($files as $file){
            if(app()->environment() === 'local'){
                $newFile = str_replace('/backup/','/images/', $file );
                copy($file, $newFile);
                $file = $newFile;
            }

            $filename = basename($file);
            $colorName = \Illuminate\Support\Str::title(str_replace('.jpeg', '', $filename));
            $colorName = str_replace('-', ' ', $colorName);

            $isMetallic = \Illuminate\Support\Str::contains($file, ['Chrome', 'Nickel', 'Silver']);
            factory(\App\Color::class)->create(['name' => $colorName, 'is_metallic' => $isMetallic]);
        }

    }
}
