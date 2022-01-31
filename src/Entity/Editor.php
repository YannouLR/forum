<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class Editor extends User{

    public function __construct(string $f, string $m)
    {
        parent::__construct($f, $m);
    }
}