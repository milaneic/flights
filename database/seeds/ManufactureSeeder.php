<?php

use App\Airplane;
use App\Manufacture;
use Carbon\Factory;
use Illuminate\Database\Seeder;
use Faker\Provider\Base;

class ManufactureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Manufacture::class, 2)->create();
    }
}
