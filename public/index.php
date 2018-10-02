<?php

require __DIR__ . '/../vendor/autoload.php';
use Controller\ItemController;


$itemController = new ItemController();
$itemController-> index();