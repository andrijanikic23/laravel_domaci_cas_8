<?php

namespace App\Console\Commands;

use App\Models\ExchangeRatesModel;
use Carbon\Carbon;
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

        foreach(ExchangeRatesModel::AVAILABLE_CURRENCIES as $currency)
        {

            $todayCurrency = ExchangeRatesModel::getCurrencyForToday($currency);

            if($todayCurrency !== null)
            {
                continue;
            }

            $response = Http::get("https://v6.exchangerate-api.com/v6/{$apiKey}/latest/{$currency}");
            ExchangeRatesModel::create([
               "currency" => $currency,
               "value" => $response->json()["conversion_rates"]["RSD"]
            ]);
        }


    }
}
