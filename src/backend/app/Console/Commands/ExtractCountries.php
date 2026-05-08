<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Country;

class ExtractCountries extends Command
{
    protected $signature = 'extract:countries';
    protected $description = 'Extract countries from API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://restcountries.com/v3.1/all?fields=name,capital,region,subregion,population,cca2');

        if (!$response->successful()) {
            $this->error('Erro ao buscar países');
            return;
        }

        foreach ($response->json() as $item) {
            Country::updateOrCreate(
                ['code' => $item['cca2'] ?? null],
                [
                    'name' => $item['name']['common'] ?? null,
                    'capital' => $item['capital'][0] ?? null,
                    'region' => $item['region'] ?? null,
                    'subregion' => $item['subregion'] ?? null,
                    'population' => $item['population'] ?? 0,
                    'code' => $item['cca2'] ?? null
                ]
            );
        }

        $this->info('Países importados');
    }
}
