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
