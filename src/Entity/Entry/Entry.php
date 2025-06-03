<?php 

namespace Src\Entity\Entry;
use DateTime;
final class Entry {

    public function __construct(
        private readonly ?int $id, //id inmutable
        private int $id_author,
        private string $title,
        private string $text,
        private DateTime $creation_date,
        private bool $deleted
    ) {
    }

    //crear una instancia de objeto Entry
    public static function create(int $id_author, string $title, string $text, DateTime $creation_date): self{

        //id = null (será generado por la DB).  y deleted = false
        return new self(null,$id_author,$title,$text,$creation_date, false);
    }



    
     public function modify(int $id_author,string $title, string $text, DateTime $creation_date): void{
        //le asigna a la entidad los valores que llegan por parametro. como si fuesen varios setters
        $this->id_author = $id_author;
        $this->title = $title;
        $this->text = $text;
        $this->creation_date = $creation_date;
    }   
    



    public function delete(): void{
        $this->deleted = true; //cambia el estado de deleted
    }

    public function isDeleted(): int
    {
        return $this->deleted ? 1 : 0; // Convierte bool a int para la DB
    }
 



    //GETTERS

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
    
    
}