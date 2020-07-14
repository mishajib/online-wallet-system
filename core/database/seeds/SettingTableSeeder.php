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
            "fixed_charge" => 2.00,
            "percent_charge" => 3,
            "join_bonus" => 20.00,
            "refer_bonus" => 50,
            "transfer_bonus" => 3,
            "currency" => "BDT",
        ]);
    }
}
