<?php
namespace Src;

use Src\Contracts\ViewContract;

class View implements ViewContract
{

    public function render($file, $var = [])
    {
        if (count($var))
            extract($var);

        return require __DIR__.'/../app/Views/'.$file.'.php';
    }
}