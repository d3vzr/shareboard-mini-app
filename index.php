<?php

// start session
session_start();

// include config
require('config.php');

// include classes
require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

// include controllers
require('controllers/home.php');
require('controllers/shares.php');
require('controllers/users.php');

// include models
require('models/home.php');
require('models/share.php');
require('models/user.php');

$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();

if ($controller) {
  $controller->executeAction();
}