<?php

namespace ITHilbert\Themes\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;
use ITHilbert\Themes\Classes\Stub;

class CreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme:create {theme}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Erstellt ein neues Theme';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $theme = $this->argument('theme') ?? '';
        //prüfen ob $theme leer ist
        if ($theme == '') {
            $this->error('Es wurde kein Themename angegeben!');
            return;
        }

        //theme in kleinbuchstaben umwandeln
        $theme = strtolower($theme);


        //prüfen ob der ordner "theme" existiert, sonst anlegen
        if (!File::exists(base_path('themes'))) {
            File::makeDirectory(base_path('themes'));
        }

        //prüfen ob es bereits ein theme mit dem Namen gibt
        if (File::exists(base_path('themes/'.$theme))) {
            $this->error('Es existiert bereits ein Theme mit dem Namen '.$theme.'!');
            return;
        }

        //Modulname setzen
        Cache::put('active_theme', $theme, now()->addDay());

        //Ordner anlegen
        $this->createFolder($theme);

        //composer.json anlegen
        $stub = new Stub('composer');
        $stub->saveComposer();

        //readme anlegen
        $stub = new Stub('readme');
        $stub->saveReadme();

        //ServiceProvider anlegen
        $this->createServiceProvider($theme);

        //Config anlegen
        $this->createConfig($theme);

        //Views anlegen
        $this->createViews($theme);

        //lang anlegen
        $this->createLang($theme);

        //Gitingore anlegen
        $this->createGitingore($theme);

        $this->info("Theme wurde angelegt. Vergessen Sie nicht es in der config/app.php und in der composer.json einzutragen!");
    }

    private function createViews($theme)
    {
        $stub = new Stub('layouts/root');
        $stub->saveAsView('layouts/root');

        $stub = new Stub('layouts/basic');
        $stub->saveAsView('layouts/basic');

        $stub = new Stub('layouts/app');
        $stub->saveAsView('layouts/app');

        $stub = new Stub('layouts/card');
        $stub->saveAsView('layouts/card');

    }

    private function createConfig($theme)
    {
        $stub = new Stub('config');
        $stub->saveAsConfig($theme);
    }

    private function createServiceProvider($theme)
    {
        $stub = new Stub('serviceProvider');
        $stub->saveAsServiceProvider($theme);
    }

    private function createLang($theme)
    {
        $stub = new Stub('lang/de_login');
        $stub->saveAsLang('de/login');

        $stub = new Stub('lang/en_login');
        $stub->saveAsLang('en/login');
    }


    private function createFolder($theme)
    {
        //ordner für das thene anlegen
        $pfadTheme = base_path('themes/'.$theme);
        File::makeDirectory($pfadTheme);

        //src Ordner anlegen
        $pfadTheme .= '/src/';
        File::makeDirectory($pfadTheme);

        //Config
        File::makeDirectory($pfadTheme .'Config');
        //Public
        File::makeDirectory($pfadTheme .'Assets');
        File::makeDirectory($pfadTheme .'Assets/css');
        File::makeDirectory($pfadTheme .'Assets/js');
        File::makeDirectory($pfadTheme .'Assets/images');
        //Views
        File::makeDirectory($pfadTheme .'Views');
        File::makeDirectory($pfadTheme .'Views/layouts');
        File::makeDirectory($pfadTheme .'Views/auth');
        //lang
        File::makeDirectory($pfadTheme .'Lang');
        File::makeDirectory($pfadTheme .'Lang/de');
        File::makeDirectory($pfadTheme .'Lang/en');
    }

    private function createGitingore($theme)
    {
        //Public
        file_put_contents(base_path('themes/'.$theme.'/src/Assets/css/.gitignore'),'');
        file_put_contents(base_path('themes/'.$theme.'/src/Assets/js/.gitignore'),'');
        file_put_contents(base_path('themes/'.$theme.'/src/Assets/images/.gitignore'),'');
    }

}
