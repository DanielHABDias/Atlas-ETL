<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class TransformCountriesJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public array $data){}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if (!isset($this->data['cca2'])) {
            Log::warning('Country sem código', ['data' => $this->data]);
            return;
        }

        $formatted = [
            'code' => $this->data['cca2'],
            'name' => $this->data['name']['common'] ?? null,
            'capital' => $this->data['capital'][0] ?? null,
            'region' => $this->data['region'] ?? null,
            'subregion' => $this->data['subregion'] ?? null,
            'population' => $this->data['population'] ?? 0,
        ];

        LoadCountriesJob::dispatch($formatted)->onQueue('load');
    }
}
