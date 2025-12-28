<?php

namespace App\Jobs;

use App\Models\CartItem;
use App\Models\User;
use App\Mail\DailySalesReport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendDailySalesReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $today = Carbon::today();
        $sales = CartItem::whereDate('created_at', $today)->get();

        $admin = User::where('email', 'admin@example.com')->first(); // dummy admin

        if ($sales->count()) {
            Mail::to($admin->email)->send(new DailySalesReport($sales));
        }
    }
}
