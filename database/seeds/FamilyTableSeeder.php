<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilyTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $time = \Carbon\Carbon::now();
        DB::table('families')->delete();

        DB::table('families')->insert([
            [
                'id'         => 1,
                'head'       => 1,
                'name'       => 'Bertrand Kintanar Family',
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'id'         => 2,
                'head'       => 149,
                'name'       => 'Nestor Kintanar Family',
                'created_at' => $time,
                'updated_at' => $time,
            ],
        ]);
    }
}
