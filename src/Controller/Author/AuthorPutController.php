<?php 

use Src\Utils\ControllerUtils;
use Src\Service\Author\AuthorUpdaterService;

final readonly class AuthorPutController {
    private AuthorUpdaterService $service;

    public function __construct() {
        $this->service = new AuthorUpdaterService();
    }

    public function start(int $id): void
    {
        $name = ControllerUtils::getPost("name");
        $email = ControllerUtils::getPost("email");

        $this->service->update($name, $email, $id);
    }
}