<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 01/10/18
 * Time: 15:02
 */

// src/Controller/ItemController.php
require __DIR__ . '/../Model/ItemManager.php';

$items = selectAllItems();

require __DIR__ . '/../View/Item.php';
?>