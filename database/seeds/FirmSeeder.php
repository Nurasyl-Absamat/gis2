<?php

use App\Building;
use App\Category;
use App\Firm;
use App\Phone;
use Illuminate\Database\Seeder;

class FirmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firm = Firm::create([
            'title' => 'Wooppay',
            'building_id' => 1
        ]);
        Building::create([
            'address' => 'Karagandy, prospect nursultana',
            'geoposition' => '213214.124.12.412.41',
            'firm_id' => 1
        ]);
        Phone::create([
            'phone_num' => '1234-32143124-2142134',
            'firm_id' => 1
        ]);

        Phone::create([
            'phone_num' => '1234213-331232143124-2142134',
            'firm_id' => 1
        ]);

        $cat1 = Category::create([
            'title' => 'Food',
            'parent_id' => null,
        ]);


        $cat2 = Category::create([
            'title' => 'Meat',
            'parent_id' => $cat1->id,
        ]);

        $firm->categories()->sync([1,2]);



    }
}
