<?php

use Src\Utils\ControllerUtils;
use Src\Service\Entry\EntryCreatorService;

final readonly class EntryPostController {
    private EntryCreatorService $service;

    public function __construct() {
        $this->service = new EntryCreatorService();
    }

    public function start(): void
    {
        
        $id_author = ControllerUtils::getPost("id_author");
        $title = ControllerUtils::getPost("title");
        $text = ControllerUtils::getPost("text");
        $creation_date = ControllerUtils::getPost("creation_date");

        $creation_date = new DateTime($creation_date);


        $this->service->create($id_author, $title, $text, $creation_date);
    }
}