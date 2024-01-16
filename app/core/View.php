<?php 
namespace App\core;

class View{
    public static function Load(string $path, array $data = []){
        $file = __DIR__.'/../view/'.$path. ".php";
        if(file_exists($file)){
            extract($data);

            ob_start();
            include $file;
            ob_end_flush();
        } else{
            echo "<p>Sorry, could not find the file <span style='font-size: 30px';><strong>" . $path . "</strong></span></p>";
        }
    }
}