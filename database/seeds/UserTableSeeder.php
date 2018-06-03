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

class UserTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            [
                'id'             => 1,
                'first_name'     => 'Bertrand',
                'middle_name'    => 'Son',
                'last_name'      => 'Kintanar',
                'email'          => 'bertrand@imakintanar.com',
                'password'       => '$2y$10$5HZ1XCi.90I2gy8tb7xjC.TxLn1i6i.orob34ITIu8PXOd1FomHRO',
                'remember_token' => 'OJPEKgmVW9',
                'last_login_at'  => '2018-05-28 10:33:58',
                'created_at'     => '2018-05-28 10:33:58',
                'updated_at'     => '2018-05-28 10:33:58',
            ],
        ]);
    }
}
