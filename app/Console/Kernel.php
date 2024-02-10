<?php

namespace App\Console;

use App\Models\Task;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Notifications\MyCustomNotification;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    // protected function schedule(Schedule $schedule): void
    // {
    //     // $schedule->command('inspire')->hourly();
    //     // app/Console/Kernel.php
    //     $schedule->call(function () {
    //         // الكود لإرسال الإشعار
    //         $user = Task::find(1); // قم بتعديل هذا ليناسب استرجاع المستخدم الخاص بك
    //         $user->notify(new MyCustomNotification());
    //     })->dailyAt('2:10');

    }

    /**
     * Register the commands for the application.
      */
    // protected function commands(): void
    // {
    //     $this->load(__DIR__.'/Commands');

    //     require base_path('routes/console.php');
//     }
// }
