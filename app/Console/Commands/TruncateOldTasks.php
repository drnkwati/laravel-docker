<?php
namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class TruncateOldTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to delete tasks table records back to 0 once per minute on the minute';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('task truncate works!!');

        return Task::truncate() ? 1 : 0;
    }
}
