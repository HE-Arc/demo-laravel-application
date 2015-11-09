<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->delete();

        Country::create([
            'code' => 'ch',
            'en' => ['name' => 'Switzerland'],
            'fr' => ['name' => 'Suisse'],
            'de' => ['name' => 'Schweiz']
        ]);

        Country::create([
            'code' => 'fr',
            'en' => ['name' => 'France'],
            'fr' => ['name' => 'France'],
            'de' => ['name' => 'Frankreich']
        ]);

        Country::create([
            'code' => 'de',
            'en' => ['name' => 'Germany'],
            'fr' => ['name' => 'Allemagne'],
            'de' => ['name' => 'Deutschland']
        ]);
    }
}
