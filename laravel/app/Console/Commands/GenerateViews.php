<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateViews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:generate-views {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate all blade views for the given model';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $model = strtolower($this->argument('model'));
        $viewPath = resource_path("views/{$model}");

        if (!File::exists($viewPath)) {
            File::makeDirectory($viewPath, 0755, true);
            $this->info("Mappa létrehozva: {$viewPath}");
        } else {
            $this->warn("A mappa már létezik: {$viewPath}");
        }

        $views = ['index.blade.php', 'destroy.blade.php', 'create.blade.php', 'edit.blade.php'];

        foreach ($views as $view) {
            $filePath = "{$viewPath}/{$view}";

            if (!File::exists($filePath)) {
                File::put($filePath, "<!-- {$model} {$view} -->");
                $this->info("Létrehozva: {$filePath}");
            } else {
                $this->warn("Már létezik: {$filePath}");
            }
        }

        $this->info('A nézetek létrehozása befejeződött.');
    }
}
