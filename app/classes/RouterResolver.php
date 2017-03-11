<?php

namespace app\classes;

use Phroute\Phroute\HandlerResolver as HandlerResolver;
use Orno\Di\Container as Container;
use app\factories\LoadObjectFactory as Factory;

/**
 * Description of Validator
 *
 * @author Vera
 */
class RouterResolver extends HandlerResolver
{
        /**
         *
         * @var object
         */
        protected $container;

        
        /**
         * Construct
         */
        public function __construct()
        {
            $this->container = Factory::GetObject('Orno\Di\Container');
        }
        
        /**
         * 
         * Create an instance of the given handler.
         * 
         * @param $handler
         * @return array
         */
        public function resolve($handler)
        {
            /*
             * Only attempt resolve uninstantiated objects which will be in the form:
             *
             *      $handler = ['App\Controllers\Home', 'method'];
             */
            if(is_array($handler) and is_string($handler[0]))
            {
                $handler[0] = $this->container[$handler[0]];
            }

            return $handler;
        }
}
