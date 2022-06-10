<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Stations\Models\Stations;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [   'Cairo',
            'Alexandria',
            'Giza',
            'Shubra el-Khema',
            'Port Said',
            'Suez',
            'El Mahalla el Kubra',
            'El Mansoura',
            'Tanta',
            'Asyut',
            'Fayoum',
            'Zagazig',
            'Ismailia'
        ];
        foreach ($cities as $city) {
            $stations = new Stations();
            $stations->title = $city;
            $stations->save();
        }
    }
}
