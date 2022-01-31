<?php

namespace App\Controller;

session_start();

use App\Entity\Article;
use App\Helpers\EntityManagerHelper as Em;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class ArticleController
{
    
    const REQUIRES = [
        "title",
        "resume",
        "author",
        "num_ISBN",
        "editor"
    ];

    public function showAll()
    {
        $em = Em::getEntityManager();
        $repository = new EntityRepository($em, new ClassMetadata("App\Entity\Article"));

        $aArticle =$repository->findAll();
    }

    public function add()
    {
        foreach (self::REQUIRES as $value) {
            $_POST[$value] = htmlentities(strip_tags(trim($_POST[$value])));
            if ($_POST[$value] === '') {
                $_SESSION['error'] = 'Veuillez remplir tous les champs ! ';
                include __DIR__ . "/../Vues/Article/AddArticle.php";
                exit();
            }
                if (!array_key_exists($value, $_POST)) {
                    $_SESSION['error'] = 'Veuillez remplir tous les champs ! ';
                    include __DIR__ . "/../Vues/Article/AddArticle.php";
                    exit();
                }
            }
            $em = Em::getEntityManager();
            $repo = new EntityRepository($em, new ClassMetadata("App\Entity\Editor"));
            $editor = $repo->find($_POST['editor']);
            
        $aArticle = new Article($_POST['title'],$_POST['resume'],$_POST['author'],$_POST['num_ISBN'], $editor);
        // var_dump((int) $_POST['num_place'], (int) $_POST['num_pad']);
        // die('---END---');
        
        $em->persist($aArticle);
        // var_dump($aTable);
        // die('---END---');
        $em->flush();
        
        include __DIR__ . "/../Vues/Article/AddArticle.php";
    }

    public function modify(string $id)
    {
        $em = Em::getEntityManager();
        $Repository = new EntityRepository($em, new ClassMetadata("App\Entity\Article"));

        $articleId = $Repository->find($id);
 

        if (!empty($_POST)) {
            foreach (self::REQUIRES as $value) {
                // var_dump("je suis la "); die;
                $exist = array_key_exists($value, $_POST);
                if ($exist === false) {
                    echo "Erreur";
                    include __DIR__ . "/../Vues/Article/ModifyArticle.php";
                    exit;
                }
                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));
                
                if ($_POST[$value] === "") {
                    echo "champs $value vide";
                    include __DIR__ . "/../Vues/Article/ModifyArticle.php";
                    die();

                }
            }
            

            if ($_POST["title"] !== $articleId->getTitle()) {
                $articleId->setTitle($_POST["title"]);
            }
            if ($_POST["resume"] !== $articleId->getResume()) {
                $articleId->setResume($_POST["resume"]);
            }
            if ($_POST["author"] !== $articleId->getAuthor()) {
                $articleId->setAuthor($_POST["author"]);
            }
            if ($_POST["num_ISBN"] !== $articleId->getNum_ISBN()) {
                $articleId->setnum_ISBN($_POST["num_ISBN"]);
            }      
            if ($_POST["num_ISBN"] !== $articleId->getNum_ISBN()) {
                $articleId->setnum_ISBN($_POST["num_ISBN"]);
            }      
                  
            $em->persist($articleId);
            $em->flush();
        }
        
        include __DIR__ . "/../Vues/Article/ModifyArticle.php";

    }

    public function delete(string $id)
    {
        $em = Em::getEntityManager();
        $Repo = new EntityRepository($em, new ClassMetadata("App\Entity\Article"));

        $articleD = $Repo->find($id);

        $em->remove($articleD);
        $em->flush();
    }
}