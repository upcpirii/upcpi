<?php

/*
 * This file is part of the UPCPI Software package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the 3-clause BSD License.
 *
 * This source file is subject to the 3-clause BSD License that is
 * bundled with this package in the LICENSE file.
 *
 * @version    alpha
 *
 * @author     Bertrand Kintanar <bertrand@imakintanar.com>
 * @license    BSD License (3-clause)
 * @copyright  (c) 2017-2018, UPC Engineering
 *
 * @link       https://bitbucket.org/bkintanar/upcpi
 */

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
