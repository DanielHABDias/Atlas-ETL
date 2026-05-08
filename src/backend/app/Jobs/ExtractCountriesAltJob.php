<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;

class ExtractCountriesAltJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $response = Http::get('https://restcountries.com/v3.1/all?fields=name,capital,region,subregion,population,cca2');

        foreach ($response->json() as $item) {
            TransformCountriesJob::dispatch($item)->onQueue('transform');
        }
    }
}
