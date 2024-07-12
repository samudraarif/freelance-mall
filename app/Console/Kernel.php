<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Menjadwalkan command untuk memperbarui token Instagram setiap hari
        $schedule->command('instagram:refresh-token')->daily();
    }

    /**
     * Daftar command yang ada di aplikasi
     */
    protected $commands = [
        Commands\RefreshInstagramToken::class,
    ];

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
