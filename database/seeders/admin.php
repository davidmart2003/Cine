<?php

namespace Database\Seeders;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Facade;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name'=>'admin1',
            'email' => 'admin1@ejemplo.com'
        ]);
        \App\Models\User::factory()->create([
            'name'=>'admin2',
            'email' => 'admin2@ejemplo.com'
        ]);    
    }
}
