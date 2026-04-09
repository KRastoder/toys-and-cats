<?php

declare (strict_types = 1);

namespace App\Console\Commands;

use App\Models\Booking;
use App\Models\DailyReport;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;

final class GenerateDailyReport extends Command
{
    protected $signature = 'report:daily';

    protected $description = 'Generate daily revenue report';

    public function handle(): void
    {
        $date = Carbon::yesterday()->toDateString();

        $ordersQuery = Order::query()
            ->whereDate('created_at', $date);

        $bookingsQuery = Booking::query()
            ->whereDate('created_at', $date);

        $ordersCount   = $ordersQuery->count();
        $bookingsCount = $bookingsQuery->count();

        $ordersRevenue   = $ordersQuery->sum('price');
        $bookingsRevenue = $bookingsQuery->sum('price');

        DailyReport::updateOrCreate(
            ['date' => $date],
            [
                'orders_count'     => $ordersCount,
                'bookings_count'   => $bookingsCount,

                'orders_revenue'   => $ordersRevenue,
                'bookings_revenue' => $bookingsRevenue,

                'total_revenue'    => $ordersRevenue + $bookingsRevenue,
            ]
        );
    }
}
