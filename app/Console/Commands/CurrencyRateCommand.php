<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class CurrencyRateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:currency-rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command returns the exact currency rate';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiKey = env("EXCHANGE_RATE_API_KEY");
        $euroResponse = Http::get("https://v6.exchangerate-api.com/v6/{$apiKey}/latest/EUR");
        $dollarResponse = Http::get("https://v6.exchangerate-api.com/v6/{$apiKey}/latest/USD");

        $euroJsonResponse = $euroResponse->json();
        $dollarJsonResponse = $dollarResponse->json();

        $euroExchangeResponse = $euroJsonResponse["conversion_rates"]["RSD"];
        $dollarExchangeResponse = $dollarJsonResponse["conversion_rates"]["RSD"];

        $this->line("💶 Euro:   {$euroExchangeResponse} RSD");
        $this->line("💵 Dollar: {$dollarExchangeResponse} RSD");
    }
}
