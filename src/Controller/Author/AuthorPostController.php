<?php

use Src\Utils\ControllerUtils;
use Src\Service\Author\AuthorCreatorService;

final readonly class AuthorPostController {
    private AuthorCreatorService $service;

    public function __construct() {
        $this->service = new AuthorCreatorService();
    }

    public function start(): void
    { 
        $name = ControllerUtils::getPost("name");
        $email = ControllerUtils::getPost("email");

        $this->service->create($name, $email);
    }
}