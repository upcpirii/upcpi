<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilyMemberTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $time = \Carbon\Carbon::now();
        DB::table('family_members')->delete();

        DB::table('family_members')->insert([
            [
                'member_id'  => 1,
                'family_id'  => 1,
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'member_id'  => 1,
                'family_id'  => 2,
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'member_id'  => 142,
                'family_id'  => 1,
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'member_id'  => 143,
                'family_id'  => 1,
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'member_id'  => 149,
                'family_id'  => 2,
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'member_id'  => 150,
                'family_id'  => 2,
                'created_at' => $time,
                'updated_at' => $time,
            ],
        ]);
    }
}
