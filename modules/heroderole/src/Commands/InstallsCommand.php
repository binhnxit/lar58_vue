<?php
/**
 * Created by PhpStorm.
 * User: binhnx
 * Date: 4/26/19
 * Time: 4:43 PM
 */

namespace Herode\Role\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\DetectsApplicationNamespace;

class InstallCommand extends Command
{
    use DetectsApplicationNamespace;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'herode-role:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all of the Herode roles resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment('Publishing Herode role Migration...');
        $this->callSilent('vendor:publish', ['--tag' => 'herode-role-migrations']);

        $this->comment('Publishing Herode role configure...');
        $this->callSilent('vendor:publish', ['--tag' => 'herode-role-config']);

        $this->comment('Publishing Herode role seeds...');
        $this->callSilent('vendor:publish', ['--tag' => 'herode-role-seeds']);

        $this->info('Herode role scaffolding installed successfully.');
    }
}
