<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();

        try {
            User::insert([
                ['id' => 1, 'username' => 'Admin', 'email' => 'admin@gmail.com', 'password' => bcrypt(1234567890),'phone' => '0812xxxxxxxx', 'address' => 'indonesia', 'role' => 'admin', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 2, 'username' => 'Approval', 'email' => 'approval@gmail.com', 'password' => bcrypt(1234567890), 'phone' => '0812xxxxxxxx', 'address' => 'indonesia', 'role' => 'approval', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 3, 'username' => 'Approval 2', 'email' => 'approval2@gmail.com', 'password' => bcrypt(1234567890),'phone' => '0812xxxxxxxx', 'address' => 'indonesia',  'role' => 'approval', 'created_at' => now(), 'updated_at' => now()],
            ]);
            DB::commit();
            $this->command->info("User added");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->command->info($e->getMessage());
        }
    }
}
