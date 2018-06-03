<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $time = \Carbon\Carbon::now();
        DB::table('departments')->delete();

        DB::table('departments')->insert([
            [
                'id'         => 1,
                'name'       => 'AMF',
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'id'         => 2,
                'name'       => 'Ladies Ministry',
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'id'         => 3,
                'name'       => 'Young People',
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'id'         => 4,
                'name'       => 'Children',
                'created_at' => $time,
                'updated_at' => $time,
            ],
        ]);
    }
}
