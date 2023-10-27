<?php

namespace App\Console;

use App\Http\Controllers\CompanyDetailsController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            $CompanyDetailsController = new CompanyDetailsController();
            $CompanyDetailsController->sendReminderMail();
        })->hourly()->timezone('Europe/London');

        //document expiration mail to admin
        $schedule->call(function () {
            $CompanyDetailsController = new CompanyDetailsController();
            $CompanyDetailsController->sendDocumentExpiredMail();
        })->everyThirtyMinutes()->timezone('Europe/London');

        //cancel account if document expired
        $schedule->call(function () {
            $CompanyDetailsController = new CompanyDetailsController();
            $CompanyDetailsController->updateClinicApprovedStatus();
        })->everyTenMinutes()->timezone('Europe/London');


        //quiz reminder mail anually
        $schedule->call(function () {
            $CompanyDetailsController = new CompanyDetailsController();
            $CompanyDetailsController->sendQuizRedoReminderMain();
        })->everyFifteenMinutes()->timezone('Europe/London');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
