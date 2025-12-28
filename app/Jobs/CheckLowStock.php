<?php

namespace App\Jobs;

use App\Models\Product;
use App\Models\User;
use App\Mail\LowStockNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CheckLowStock implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct() {}

    public function handle()
    {
        $lowStockProducts = Product::where('stock_quantity', '<=', 5)->get();

        $admin = User::where('email', 'admin@example.com')->first(); // dummy admin

        foreach ($lowStockProducts as $product) {
            Mail::to($admin->email)->send(new LowStockNotification($product));
        }
    }
}
