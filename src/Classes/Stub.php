<?php

namespace ITHilbert\Themes\Classes;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

class Stub{

    private string $stub;
    private string $theme;

    public function __construct(string $stubName = null)
    {
        $this->theme = strtolower(Cache::get('active_theme'));
        if(!$this->theme){
            throw new \Exception('Es wurde kein Modul ausgewählt');
        }

        //Stub laden
        if($stubName) $this->load($stubName);
    }

    public function load($stubName){
        $this->stub = File::get(__DIR__.'/../Stubs/'.$stubName.'.stub');
    }

    private function save($fileName){

        $this->replaceStub();

        $pfad = base_path('themes/'.$this->theme.'/src//'.$fileName);

        //Prüfen ob Ordner existiert, sonst anlegen
        if(!File::exists(dirname($pfad))){
            File::makeDirectory(dirname($pfad),0755,true);
        }
        File::put($pfad, $this->stub);
    }

    public function saveComposer(){
        $this->replaceStub();

        $pfad = base_path('themes/'.$this->theme.'/composer.json');

        //Prüfen ob Ordner existiert, sonst anlegen
        if(!File::exists(dirname($pfad))){
            File::makeDirectory(dirname($pfad),0755,true);
        }
        File::put($pfad, $this->stub);
    }

    public function saveReadme(){
        $this->replaceStub();

        $pfad = base_path('themes/'.$this->theme.'/README.md');

        //Prüfen ob Ordner existiert, sonst anlegen
        if(!File::exists(dirname($pfad))){
            File::makeDirectory(dirname($pfad),0755,true);
        }
        File::put($pfad, $this->stub);
    }

    public function saveAsLang($fileName){
        $this->save('Lang/'.$fileName.'.php');
    }

    public function saveAsConfig($fileName){
        $this->save('Config/'.$fileName.'.php');
    }

    public function saveAsSeeders($fileName){
        $this->save('Database/Seeders/'.$fileName.'.php');
    }

    public function saveAsView($fileName){
        $this->save('Views/'. $fileName.'.blade.php');
    }

    public function saveAsServiceProvider($fileName){
        //prüfen ob $fileName mit ServiceProvider endet
        if(!str_ends_with($fileName, 'ServiceProvider')){
            $fileName .= 'ServiceProvider';
        }

        $this->save('Theme'.ucfirst($fileName).'.php');
    }

    /**
     * Ersetzt die Variablen im Stub
     *
     * @param [type] $this->modulName
     * @param [type] $stub
     * @return void
     */
    private function replaceStub(){
        //Modulname mit ersten Buchstaben groß
        $dummyTheme =  $this->theme;
        $DummyTheme = ucfirst($dummyTheme);

        $stub = $this->stub;
        $stub = str_replace('dummyTheme', $dummyTheme, $stub);
        $stub = str_replace('DummyTheme', $DummyTheme, $stub);

        $this->stub = $stub;
    }


}
