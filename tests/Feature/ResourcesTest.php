<?php

namespace Tests\Feature;

use App\Models\Building;
use Tests\TestCase;

class ResourcesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertEquals(5, Building::count());
    }
}
