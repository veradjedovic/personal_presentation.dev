<?php

namespace app\models;

use app\exceptions\ItemNotFoundException as ItemNotFoundException;
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

        }

        /**
         * 
         * @return array
         * @throws ItemNotFoundException
         */
        public function GetMainNews($feed_url = [])
        {
            $news = [];

            foreach($feed_url as $url) {
                
                $this->validUrl($url); 
                
                if(strpos(file_get_contents($url),'<?xml')===false) {
                    
                    throw new ItemNotFoundException('Neispravan servis.');
                }
                
                $content = file_get_contents($url);               
                $news[] = new SimpleXmlElement($content);
            } 
            
            if(!$news) {
                
                throw new ItemNotFoundException('Nije pronadjena ni jedna nova vest.');
            }
            
            return $news;
        }
        
        /**
         * 
         * @param string $url
         * @return boolean
         * @throws ItemNotFoundException
         */
        protected function validUrl($url)
        {
            $file_headers = @get_headers($url);
            
            if(!$file_headers || $file_headers[0] != 'HTTP/1.1 200 OK') {
                
                throw new ItemNotFoundException('Neispravna url adresa.');
            }
            
            return true;
        }
}
