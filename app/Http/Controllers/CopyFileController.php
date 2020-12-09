<?php

namespace App\Http\Controllers;

class CopyFileController extends Controller
{
    public function copyFile()
    {
        $basepath = __DIR__;
        return "$basepath//";
        $path = app_path('Http/Controllers/file.stub');
        $copyto = app_path('Http/Controllers/FileToCopyTo.php');

        $fp = fopen($copyto, 'a');//opens file in append mode
        $filetocopy = file_get_contents($path);
        fwrite($fp, $filetocopy);
        fclose($fp);

        return "appended";
    }
}
