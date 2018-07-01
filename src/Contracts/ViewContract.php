<?php
namespace Src\Contracts;


interface ViewContract
{

    public function render($file, $var = []);


}