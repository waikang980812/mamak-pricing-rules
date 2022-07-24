<?php

use Illuminate\Database\Seeder;
use App\PricingRule;

class PricingRuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        PricingRule::truncate();

        PricingRule::create([
            'disc_rate' => '0.5',
            'product_id' => 1,
            'min_quan' => 2,
            'type' => 'Bundle'
        ]);

        PricingRule::create([
            'disc_rate' => '0.8',
            'product_id' => 2,
            'min_quan' => 2,
            'type' => 'None'
        ]);
        
        PricingRule::create([
            'disc_rate' => '0.5',
            'product_id' => 3,
            'min_quan' => 2,
            'type' => 'Bundle'
        ]);

        
    }
}
