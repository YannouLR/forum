<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class Article{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
    */

    private int $id;
    
    /**
     * @ORM\Column(length=100)
    */

    private string $title;

    /**
     * @ORM\Column(length=255)
    */

    private string $resume;

    /**
     * @ORM\Column(length=100)
    */

    private string $author;

    /**
     * @ORM\Column(type="integer")
    */

    private int $num_ISBN;

    /**
     * @ORM\ManyToOne(targetEntity="Editor")
     * @ORM\JoinColumn(name="id_Editor", referencedColumnName="id")
     */

    private Editor $editor;


    public function __construct(string $t, string $r, string $a, int $num, Editor $e)
    {
        $this->title = $t;
        $this->resume = $r;
        $this->author = $a;
        $this->num_ISBN = $num;
        $this->editor = $e;
    
    }

    

    /**
     * Get the value of id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     *
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of resume
     *
     * @return string
     */
    public function getResume(): string
    {
        return $this->resume;
    }

    /**
     * Set the value of resume
     *
     * @param string $resume
     *
     * @return self
     */
    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get the value of author
     *
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Set the value of author
     *
     * @param string $author
     *
     * @return self
     */
    public function setAuthor(string $author): self
    {
        $this->editor = $author;

        return $this;
    }

    /**
     * Get the value of num_ISBN
     *
     * @return int
     */
    public function getNumISBN(): int
    {
        return $this->num_ISBN;
    }

    /**
     * Set the value of num_ISBN
     *
     * @param int $num_ISBN
     *
     * @return self
     */
    public function setNumISBN(int $num_ISBN): self
    {
        $this->num_ISBN = $num_ISBN;

        return $this;
    }

    /**
     * Get the value of editor
     *
     * @return Editor
     */
    public function getEditor(): Editor
    {
        return $this->editor;
    }

    /**
     * Set the value of editor
     *
     * @param Editor $editor
     *
     * @return self
     */
    public function setEditor(Editor $editor): self
    {
        $this->editor = $editor;

        return $this;
    }

}