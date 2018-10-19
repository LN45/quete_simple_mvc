<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 01/10/18
 * Time: 15:02
 */

// src/Controller/ItemController.php
namespace Controller;
use Model\Item;
use Model\ItemManager;
// ... ajoute ces 2 use
//use Twig_Loader_Filesystem;
//use Twig_Environment;


class ItemController extends AbstractController
{
    public function index()
    {
        $itemManager = new ItemManager($this->getPdo());
        $items = $itemManager->selectAll();
        return $this->twig->render('Item/Item.html.twig', ['items' => $items]);
    }

    public function show(int $id)
    {
        $itemManager = new ItemManager($this->getPdo());
        $item = $itemManager->selectOneById($id);
        return $this->twig->render('Item/showItem.html.twig', ['item' => $item]);
    }

    public function edit(int $id)
    {
        $itemManager = new ItemManager($this->getPdo());
        $item = $itemManager->selectOneById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $errors = [];
            if (empty($_POST['title'])) {
                $errors[] = "le titre est obligatoire";
            }else{
                $item->setTitle($_POST['title']);
                $itemManager->update($item);
            }
        }
        return $this->twig->render('Item/edit.html.twig', ['item' => $item]);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $errors = [];
            if (empty($_POST['title'])) {
                $errors[] = "le titre est obligatoire";
            } else {
                $itemManager = new ItemManager($this->getPdo());
                $item = new Item();
                $item->setTitle($_POST['title']);
                $id = $itemManager->insert($item);
                header('Location:/item/' . $id);
            }
        }
        return $this->twig->render('Item/add.html.twig');
    }

    /**
     * Handle item deletion
     *
     * @param int $id
     */
    public function delete(int $id)
    {
        $itemManager = new ItemManager($this->getPdo());
        $itemManager->delete($id);
        header('Location:/');
    }
}
