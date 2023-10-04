<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
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
            Vehicle::insert([
                ['id' => 1, 'merk' => 'kijang','nopol' => 'N 1234 ABI', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 2, 'merk' => 'inova','nopol' => 'N 56789 ABI', 'created_at' => now(), 'updated_at' => now()],
                ['id' => 3, 'merk' => 'xenia','nopol' => 'N 3543 ABI', 'created_at' => now(), 'updated_at' => now()],
            ]);
            DB::commit();
            $this->command->info("Vehicle addedd");
        } catch (\Exception $e) {
            DB::rollBack();
            $this->command->info($e->getMessage());
        }
    }
}
