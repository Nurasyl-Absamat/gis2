<?php

use App\Models\Building;
use App\Models\Category;
use App\Models\Firm;
use App\Models\Phone;
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
        Building::create([
            'address' => 'Karagandy, prospect nursultana',
            'geoposition' => '213214.124.12.412.41',
        ]);
        $firm = Firm::create([
            'title' => 'Wooppay',
            'building_id' => 1
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
        $cat3 = Category::create([
            'title' => 'Beef',
            'parent_id' => $cat2->id,
        ]);
        $cat4 = Category::create([
            'title' => 'Cars',
            'parent_id' => null,
        ]);

        $cat5 = Category::create([
            'title' => 'Cabriolet',
            'parent_id' => $cat4->id,
        ]);

        $firm->categories()->sync([1,2]);



    }
}
