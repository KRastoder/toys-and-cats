<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'orders_count',
        'bookings_count',
        'orders_revenue',
        'bookings_revenue',
        'total_revenue',
    ];
}
