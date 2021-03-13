<?php

namespace Softveld\Skeleton\Commands;

use Illuminate\Console\Command;

class SkeletonCommand extends Command
{
    /**
      * The name and signature of the console command.
      *
      * @var string
      */
    protected $signature = 'skeleton';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This is skeleton  command';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->comment('All done');
    }
}
