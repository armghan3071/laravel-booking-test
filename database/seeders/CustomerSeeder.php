<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()
        ->count(30)
        ->hasBookings(10)
        ->create();

        Customer::factory()
        ->count(70)
        ->hasBookings(5)
        ->create();

        Customer::factory()
        ->count(100)
        ->hasBookings(3)
        ->create();
    }
}
