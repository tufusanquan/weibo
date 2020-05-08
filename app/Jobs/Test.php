<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Test implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    public $string;

    /**
     * @var int
     */
    public $int;

    /**
     * @var array
     */
    public $array;

    /**
     * @var object
     */
    public $object;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($string)
    {
        $this->string = $string;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        file_put_contents('test.txt', $this->string . PHP_EOL, FILE_APPEND);

        echo 'test job is ok';
    }
}
