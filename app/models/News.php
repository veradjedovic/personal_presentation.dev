<?php

namespace app\models;

use app\exceptions\ItemNotFoundException as ItemNotFoundException;
use app\factories\LoadObjectFactory as Factory;
use app\exceptions\ValidatorException as ValidatorException;
use SimpleXMLElement as SimpleXmlElement;

/**
 * Description of News
 *
 * @author Vera
 */
class News extends Model
{           
        /**
         *
         * @var object
         */
        protected $validator;
        

        /**
         * Construct
         */
        public function __construct() 
        {
           $this->validator = Factory::GetObject('app\classes\Validator'); 
        }

        /**
         * 
         * @return array
         * @throws ItemNotFoundException
         */
        public function GetMainNews($feed_url)
        {
            $content = file_get_contents($feed_url);
            $news = new SimpleXmlElement($content);
            
            if(!$news) {
                
                throw new ItemNotFoundException('Nije pronadjena ni jedna nova vest.');
            }
            
            return $news;
        }
}
