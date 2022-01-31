<?php

namespace App\Controller;

final class AppController extends AbstractController
{

    public function index(): void
    {
        print_r($this->serialize(["Home" => "Hello World"], 'json'));
    }
}
