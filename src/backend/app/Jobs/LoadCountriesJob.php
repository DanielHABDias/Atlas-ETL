<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Country;

class LoadCountriesJob implements ShouldQueue
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
        Country::updateOrCreate(
            ['code' => $this->data['code']],
            $this->data
        );
    }
}
