<?php
/**
 * Created by PhpStorm.
 * User: ln
 * Date: 13/10/18
 * Time: 16:57
 */

namespace Controller;

use Twig_Loader_Filesystem;
use Twig_Environment;
use App\Connection;

abstract class AbstractController
{
    protected $twig;
    protected $pdo;

    public function __construct()
    {
        // instanciation de Twig
        $loader = new Twig_Loader_Filesystem(APP_VIEW_PATH);
        $this->twig = new Twig_Environment(
            $loader,
            [
                'cache' => !APP_DEV,
                'debug' => APP_DEV,
            ]
        );
        $this->twig->addExtension(new \Twig_Extension_Debug());

        // instanciation de la connexion à la BDD
        $connection = new Connection();
        $this->pdo = $connection->getPdoConnection();
    }

    /**
     * @return Twig_Environment
     */
    public function getTwig()
    {
        return $this->twig;
    }

    /**
     * @param Twig_Environment $twig
     */
    public function setTwig($twig)
    {
        $this->twig = $twig;
    }

    /**
     * @return \PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @param \PDO $pdo
     */
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;
    }
}