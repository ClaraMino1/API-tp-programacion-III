<?php 

namespace Src\Entity\Article;
use DateTime;
final class Article {

    public function __construct(
        private readonly ?int $id,
        private string $category_id,
        private string $title,
        private string $description,
        private string $image_url,
        private DateTime $date,
        private bool $deleted
    ) {
    }

    public static function create(string $category_id,string $title, string $description, string $image_url, DateTime $date): self
    {
        return new self(null, $category_id, $title, $description, $image_url, $date, false);
    }

    public function modify(string $category_id,string $title, string $description, string $image_url, DateTime $date): void
    {
        $this->category_id = $category_id;
        $this->title = $title;
        $this->description = $description;
        $this->image_url = $image_url;
        $this->date = $date;
    }






    public function delete(): void
    {
        $this->deleted = true;
    }

    public function isDeleted(): int
    {
        return $this->deleted ? 1 : 0;
    }





    

    public function id(): ?int
    {
        return $this->id;
    }

    public function category_id(): string
    {
        return $this->category_id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function image_url(): string
    {
        return $this->image_url;
    }

    public function date(): DateTime
    {
        return $this->date;
    }
    
    public function deleted(): int
    {
        return $this->deleted ? 1 : 0;
    }
}