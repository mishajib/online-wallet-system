<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Setting::create([
            "site_name" => "Online Wallet System",
            "fixed_charge" => 0.00,
            "percent_charge" => 0,
            "join_bonus" => 0.00,
            "currency" => "BDT",
        ]);
    }
}
