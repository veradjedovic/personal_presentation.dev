<?php

namespace app\factories;

use app\exceptions\ItemNotFoundException as ItemNotFoundException;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LoadObjectFactory
 *
 * @author frog
 */
class LoadObjectFactory 
{   
    /**
     * 
     * Param expects class name with namespace
     * 
     * @param string $object
     * @return object
     * @throws ItemNotFoundException
     */
    public static function GetObject($object)
    {
        if(!class_exists($object)) {
            
            throw new ItemNotFoundException('Class not exists!');
        }
        
        $instance = new $object;
        
        if(!$instance) {
            
            throw new ItemNotFoundException('Object not found!');
        }
        
        return $instance;
    }
}
