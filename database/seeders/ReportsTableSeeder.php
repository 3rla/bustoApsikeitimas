<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Report;

class ReportsTableSeeder extends Seeder
{
    public function run()
    {
        Report::factory()->count(500)->create();
    }
}
