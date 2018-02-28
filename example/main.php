<?php
require __DIR__."/vendor/autoload.php";

// Get the build :
$build = new \DronePluginSdk\Build();

// Get some settings :
var_dump($build->getPluginParameter('my_parameter'));

// Get a secret :
var_dump($build->getSecret('my_secret'));

// Get current branch :
var_dump($build->getCommit()->getBranch());
