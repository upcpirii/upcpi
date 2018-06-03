<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(MemberTableSeeder::class);
        $this->call(FamilyTableSeeder::class);
        $this->call(FamilyMemberTableSeeder::class);
    }
}
