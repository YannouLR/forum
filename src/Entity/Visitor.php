<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */

class Visitor extends User{

    public function __construct(string $f, string $m)
    {
        parent::__construct($f, $m);
    }
}