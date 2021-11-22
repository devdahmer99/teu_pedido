<?php

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '96001702000169',
            'name' => 'DS-Tecnologia',
            'url' => 'dstecnologia',
            'email' => 'eduardodahmer99@gmail.com'
        ]);
    }
}
