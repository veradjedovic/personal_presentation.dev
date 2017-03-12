<?php

define("Loaded",TRUE);

/**
 * 
 * @param $name
 */
function aload_controllers($name) {
    $parts = explode('\\', $name);
    if(file_exists(APP_PATH."app/controllers/" . end($parts) . ".php"))        
    require_once APP_PATH.'app/controllers/' . end($parts) . '.php';
}

/**
 * 
 * @param $name
 */
function aload_models($name) {
    $parts = explode('\\', $name);
    if(file_exists(APP_PATH.'app/models/'.end($parts).'.php'))        
    require_once APP_PATH.'app/models/'.end($parts).'.php'; 
}

/**
 * 
 * @param $name
 */
function aload_exeptions($name) {
    $parts = explode('\\', $name);
    if(file_exists(APP_PATH.'app/exeptions/'.end($parts).'.php'))        
    require_once APP_PATH.'app/exeptions/'.end($parts).'.php'; 
}

/**
 * 
 * @param $name
 */
function aload_factories($name) {
    $parts = explode('\\', $name);
    if(file_exists(APP_PATH.'app/factories/'.end($parts).'.php'))        
    require_once APP_PATH.'app/factories/'.end($parts).'.php'; 
}

/**
 * 
 * @param $name
 */
function aload_modules($name) {
    $parts = explode('\\', $name);
    if(file_exists(APP_PATH.'app/modules/'.end($parts).'.php'))        
    require_once APP_PATH.'app/modules/'.end($parts).'.php'; 
}

/**
 * 
 * @param $name
 */
function aload_repositories($name) {
    $parts = explode('\\', $name);
    if(file_exists(APP_PATH.'app/repositories/'.end($parts).'.php'))        
    require_once APP_PATH.'app/repositories/'.end($parts).'.php'; 
}

/**
 * 
 * @param $name
 */
function aload_builders($name) {
    $parts = explode('\\', $name);
    if(file_exists(APP_PATH.'app/builders/'.end($parts).'.php'))        
    require_once APP_PATH.'app/builders/'.end($parts).'.php'; 
}

/**
 * 
 * @param $name
 */
function aload_classes($name) {
    $parts = explode('\\', $name);
    if(file_exists(APP_PATH.'app/classes/'.end($parts).'.php'))        
    require_once APP_PATH.'app/classes/'.end($parts).'.php'; 
}

/**
 * 
 * @param $name
 */
function aload_jobs($name) {
    $parts = explode('\\', $name);
    if(file_exists(APP_PATH.'app/jobs/'.end($parts).'.php'))        
    require_once APP_PATH.'app/jobs/'.end($parts).'.php'; 
}

/**
 * 
 * @para $name
 */
function aload_admin_controllers($name) {
    $parts = explode('\\', $name);
    if(file_exists(APP_PATH.'app/controllers/adminControllers/'.end($parts).'.php'))        
    require_once APP_PATH.'app/controllers/adminControllers/'.end($parts).'.php'; 
}

spl_autoload_register("aload_controllers");
spl_autoload_register("aload_models");
spl_autoload_register("aload_exeptions");
spl_autoload_register("aload_factories");
spl_autoload_register("aload_modules");
spl_autoload_register("aload_repositories");
spl_autoload_register("aload_builders");
spl_autoload_register("aload_classes");
spl_autoload_register("aload_jobs");
spl_autoload_register("aload_admin_controllers");
