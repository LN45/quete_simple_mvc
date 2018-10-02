<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 01/10/18
 * Time: 15:02
 */

// src/Controller/ItemController.php
namespace Controller;
use Model\ItemManager;



class ItemController{
    public function index (){
        $itemManager = new ItemManager();
        $items=$itemManager->selectAllItems();
        require __DIR__ . '/../View/Item.php';
    }
    public function show(int $id)
    {
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneItem($id);

        require __DIR__ . '/../View/showItem.php';
    }
}