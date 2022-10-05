<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('task_users')->insert([
        [
            'status' => 'Application Program',
        ],
        [
            'status' => 'Application Software',

        ],
        [
            'status' => 'Application Developer',

        ],
        ]);
    }
}
