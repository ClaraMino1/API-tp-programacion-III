<?php

use Src\Utils\ControllerUtils;
use Src\Service\Article\ArticleCreatorService;

final readonly class ArticlePostController {
    private ArticleCreatorService $service;

    public function __construct() {
        $this->service = new ArticleCreatorService();
    }

    public function start(): void
    {
        
        $category_id = ControllerUtils::getPost("category_id");
        $title = ControllerUtils::getPost("title");
        $description = ControllerUtils::getPost("description");
        $image_url = ControllerUtils::getPost("image_url");
        $date = ControllerUtils::getPost("date");

        $date = new DateTime($date);

        $this->service->create($category_id, $title, $description, $image_url, $date);
    }
}