<?php

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
