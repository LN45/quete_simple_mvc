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
// ... ajoute ces 2 use
use Twig_Loader_Filesystem;
use Twig_Environment;


class ItemController
{
    private $twig;

    public function __construct()
    {
        $loader = new Twig_Loader_Filesystem(__DIR__.'/../View');
        $this->twig = new Twig_Environment($loader);
    }

    public function index()
    {
        $itemManager = new ItemManager();
        $items=$itemManager->selectAllItems();
        return $this->twig->render('Item.html.twig', ['items' => $items]);
    }

    public function show(int $id)
    {
        $itemManager = new ItemManager();
        $item = $itemManager->selectOneItem($id);
        return $this->twig->render('showItem.html.twig', ['item' => $item]);
    }
}

