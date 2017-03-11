<?php

namespace app\controllers;

use app\factories\LoadObjectFactory as Factory;
use app\exceptions\LanguagesNotFoundException as LanguagesNotFoundException;
use Exception;

/**
 * Description of LanguageController
 *
 * @author Vera
 */
class LanguageController extends Controller
{
    /**
     *
     * @var string
     */
    public $layout = '';
    
    
    /**
     * Construct
     */
    public function __construct()
    {
        $this->language = Factory::GetObject('app\models\Language');
    }
    
    /**
     * Index method
     */
    public function index()
    {
        try {
            
            $languages = $this->language->GetVisibleLanguages();
            
            $this->view('modules/mod_embedded/mod_languages/languages', ['languages' => $languages]);
            
        } catch (LanguagesNotFoundException $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Poznavanje jezika</h1><p>{$ex->getMessage()}</p></section>";
            
        } catch (Exception $ex) {
            
            echo "<section class = 'section_of_modules'><h1>Poznavanje jezika</h1><p>Nema informacija o poznavanju jezika.</p></section>";
        }
    }
}
