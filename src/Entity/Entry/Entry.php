<?php 

namespace Src\Entity\Entry;
use DateTime;
final class Entry {

    public function __construct(
        private readonly ?int $id,
        private int $id_author,
        private string $title,
        private string $text,
        private DateTime $creation_date,
        private bool $deleted
    ) {
    }

    public static function create(int $id_author, string $title, string $text, DateTime $creation_date): self
    {
        return new self(null,$id_author,$title,$text,$creation_date, false);
    }

        
    





    

    public function id(): ?int
    {
        return $this->id;
    }

    public function id_author(): int
    {
        return $this->id_author;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function text(): string
    {
        return $this->text;
    }


    public function creation_date(): DateTime
    {
        return $this->creation_date;
    }
    
    public function deleted(): int
    {
        return $this->deleted ? 1 : 0;
    }
}