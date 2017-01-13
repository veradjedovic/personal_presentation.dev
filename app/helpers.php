<?php

/**
 * 
 * @return array
 */
function numbersOfControllers()
{
    $dir = new DirectoryIterator(APP_PATH."app/controllers/");
    $controllers_arr = [];
    
    foreach ($dir as $item){
        if(!$item->isDot()){

            $controllers_arr[] = $item->getFilename();
        }   
    }   
    
    return $controllers_arr;
}

/**
 * 
 * @param $param
 */
function dd($param)
{
    print_r($param);
    die();
}

