<?php

namespace Database\Seeders;

use App\Helpers\Enums\OrdersStatuses;
use App\Models\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = collect(OrdersStatuses::cases());
        $statuses->each(fn($status) => OrderStatus::firstOrCreate(['name' => $status->value]));

    }
}
