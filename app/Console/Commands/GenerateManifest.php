<?php

namespace App\Console\Commands;

use App\Services\ManifestService;
use Illuminate\Console\Command;

class GenerateManifest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'manifest:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the manifest.json file';

    /**
     * Execute the console command.
     */
    public function handle(ManifestService $manifestService): int
    {
        $manifestService->generateManifest();
        $this->info('manifest.json file has been generated successfully.');

        return Command::SUCCESS;
    }
}
