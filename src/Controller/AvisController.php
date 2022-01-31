<?php

namespace App\Controller;

session_start();

use App\Entity\Avis;
use App\Helpers\EntityManagerHelper as Em;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class AvisController
{
    
    const REQUIRES = [
        "note",
        "commentaire",
        "Article",
        "user"
    ];

    public function showAll()
    {
        $em = Em::getEntityManager();
        $repository = new EntityRepository($em, new ClassMetadata("App\Entity\Avis"));

        $aAvis =$repository->findAll();
    }

    public function add()   
    {

        foreach (self::REQUIRES as $value) {
            if ($_POST[$value] === "") {
                $error = "les champs ne doivent pas etre vide";
                include __DIR__ . "/../Vues/Avis/AddAvis.php";                
                echo $error;
                exit;
            }
            if (!array_key_exists($value, $_POST)) {
                $_SESSION["error"] ="Il manque des champs à remplir";
                include __DIR__ . "/../Vues/Avis/AddAvis.php";                
                exit;
            }
            $_POST[$value] = htmlentities(strip_tags(trim($_POST[$value])));
        }
        $em = Em::getEntityManager();
        $repo = new EntityRepository($em, new ClassMetadata("App\Entity\Article"));
        $Article = $repo->find($_POST['article']);

        $repo = new EntityRepository($em, new ClassMetadata("App\Entity\Visitor"));
        $User = $repo->find($_POST['user']);

        $avis = new Avis($_POST["note"], $_POST["commentaire"], $Article, $User);

        $em->persist($avis);

        $em->flush();

        include __DIR__ . "/../Vues/Avis/AddAvis.php";
        
    }

    public function modify(string $id)
    {
        $em = Em::getEntityManager();
        $Repository = new EntityRepository($em, new ClassMetadata("App\Entity\Avis"));

        $avisId = $Repository->find($id);
 

        if (!empty($_POST)) {
            foreach (self::REQUIRES as $value) {
                // var_dump("je suis la "); die;
                $exist = array_key_exists($value, $_POST);
                if ($exist === false) {
                    echo "Erreur";
                    include __DIR__ . "/../Vues/Avis/ModifyAvis.php";
                    exit;
                }
                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));
                
                if ($_POST[$value] === "") {
                    echo "champs $value vide";
                    include __DIR__ . "/../Vues/Avis/ModifyAvis.php";
                    die();

                }
            }
            

            if ($_POST["firstname"] !== $avisId->getFirstname()) {
                $avisId->setFirstname($_POST["firstname"]);
            }
            if ($_POST["mail"] !== $avisId->getMail()) {
                $avisId->setmail($_POST["mail"]);
            }          
            $em->persist($avisId);
            $em->flush();
        }
        
        include __DIR__ . "/../Vues/Avis/ModifyAvis.php";

    }

    public function delete(string $id)
    {
        $em = Em::getEntityManager();
        $Repo = new EntityRepository($em, new ClassMetadata("App\Entity\Editor"));

        $editorD = $Repo->find($id);

        $em->remove($editorD);
        $em->flush();
    }
}