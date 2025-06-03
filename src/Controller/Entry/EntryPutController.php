<?php 

use Src\Utils\ControllerUtils;
use Src\Service\Entry\EntryUpdaterService;

final readonly class EntryPutController {
    private EntryUpdaterService $service;

    public function __construct() {
        $this->service = new EntryUpdaterService();
    }

    public function start(int $id): void
    {
        $id_author = ControllerUtils::getPost("id_author");
        $title = ControllerUtils::getPost("title");
        $text = ControllerUtils::getPost("text");
        $creation_date = ControllerUtils::getPost("creation_date");

        $creation_date = new DateTime($creation_date);

       
        

        $this->service->update($id_author, $title, $text, $creation_date,$id);
    }
}