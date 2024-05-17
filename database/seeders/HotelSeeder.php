<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hotel;
use Illuminate\Support\Facades\Log;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //if(Hotel::count() == 0){
            Hotel::factory(20)->create();
        //}
    }
}
