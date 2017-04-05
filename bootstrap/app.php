<?php

/**
 * Autoload.
 */
require __DIR__ . '/../vendor/autoload.php';

/**
 * Load Config of The Application.
 */
require_once 'config/index.php'; 

/**
 * Load Service Container.
 */
//require 'config/container/serviceContainer.php';

/**
 * Load The Application Routes.
 */
require_once APP_PATH . 'router/dispatcher.php';

