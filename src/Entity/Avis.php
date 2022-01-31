<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class Avis{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */

    private int $id;

    /**
     * @ORM\Column(type="integer")
     */

    private int $note;

    /**
     * @ORM\Column(length=255)
     */

    private string $commentaire;

    /**
     * @ORM\ManyToOne(targetEntity="Article")
     * @ORM\JoinColumn(name="id_Article", referencedColumnName="id")
     */

    private Article $article;

    /**
     * @ORM\ManyToOne(targetEntity="Visitor")
     * @ORM\JoinColumn(name="id_User", referencedColumnName="id")
     */

    private Visitor $user;

    public function __construct(int $note, string $commentaire, Article $a, Visitor $u)
    {
        $this->note = $note;
        $this->commentaire = $commentaire;
        $this->article = $a;
        $this->user = $u;
    }



    /**
     * Get the value of article
     *
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }

    /**
     * Set the value of article
     *
     * @param Article $article
     *
     * @return self
     */
    public function setArticle(Article $article): self
    {
        $this->article = $article;

        return $this;
    }


    /**
     * Get the value of user
     *
     * @return Visitor
     */
    public function getUser(): Visitor
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @param Visitor $user
     *
     * @return self
     */
    public function setUser(Visitor $user): self
    {
        $this->user = $user;

        return $this;
    }
}