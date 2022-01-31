<?php

namespace App\Controller;

session_start();

use App\Entity\Visitor;
use App\Helpers\EntityManagerHelper as Em;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;

class VisitorController
{
    
    const REQUIRES = [
        "firstname",
        "mail"
    ];

    public function showAll()
    {
        $em = Em::getEntityManager();
        $repository = new EntityRepository($em, new ClassMetadata("App\Entity\Visitor"));

        $aVisitor =$repository->findAll();
    }

    public function add()   
    {

        foreach (self::REQUIRES as $value) {
            if ($_POST[$value] === "") {
                $error = "les champs ne doivent pas etre vide";
                include __DIR__ . "/../Vues/Visitor/AddVisitor.php";                
                echo $error;
                exit;
            }
            if (!array_key_exists($value, $_POST)) {
                $_SESSION["error"] ="Il manque des champs à remplir";
                include __DIR__ . "/../Vues/Visitor/AddVisitor.php";                
                exit;
            }
            $_POST[$value] = htmlentities(strip_tags(trim($_POST[$value])));
        }

        $Visitor = new Visitor($_POST["firstname"], $_POST["mail"]);

        $entityManager = Em::getEntityManager();
        $entityManager->persist($Visitor);

        $entityManager->flush();

        include __DIR__ . "/../Vues/Visitor/AddVisitor.php";
        
    }

    public function modify(string $id)
    {
        $em = Em::getEntityManager();
        $Repository = new EntityRepository($em, new ClassMetadata("App\Entity\Visitor"));

        $VisitorId = $Repository->find($id);
 

        if (!empty($_POST)) {
            foreach (self::REQUIRES as $value) {
                // var_dump("je suis la "); die;
                $exist = array_key_exists($value, $_POST);
                if ($exist === false) {
                    echo "Erreur";
                    include __DIR__ . "/../Vues/Visitor/ModifyVisitor.php";
                    exit;
                }
                $_POST[$value] = trim(htmlentities(strip_tags($_POST[$value])));
                
                if ($_POST[$value] === "") {
                    echo "champs $value vide";
                    include __DIR__ . "/../Vues/Visitor/ModifyVisitor.php";
                    die();

                }
            }
            

            if ($_POST["firstname"] !== $VisitorId->getFirstname()) {
                $VisitorId->setFirstname($_POST["firstname"]);
            }
            if ($_POST["mail"] !== $VisitorId->getMail()) {
                $VisitorId->setmail($_POST["mail"]);
            }          
            $em->persist($VisitorId);
            $em->flush();
        }
        
        include __DIR__ . "/../Vues/Visitor/ModifyVisitor.php";

    }

    public function delete(string $id)
    {
        $em = Em::getEntityManager();
        $Repo = new EntityRepository($em, new ClassMetadata("App\Entity\Visitor"));

        $visitorD = $Repo->find($id);

        $em->remove($visitorD);
        $em->flush();
    }
}