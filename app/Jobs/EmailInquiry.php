<?php

namespace App\Jobs;

use App\Inquiry;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class EmailInquiry implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $inquiry;

    /**
     * Create a new job instance.
     * 
     * @param Inquiry $inquiry
     * @return void
     */
    public function __construct(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       Log::debug('handling!'); 
    }
}
