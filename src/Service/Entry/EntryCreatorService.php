<?php 

namespace Src\Service\Entry;

use Src\Entity\Entry\Entry;
use Src\Infrastructure\Repository\Entry\EntryRepository;
use DateTime;

final readonly class EntryCreatorService {
    private EntryRepository $repository;//crea el objeto EntryRepository

    public function __construct() {
        $this->repository = new EntryRepository();//instancia el objeto
    }

    //recibe los parametros del controller
    public function create(int $id_author, string $title, string $text, DateTime $creation_date): Entry{

        //Retorna una nueva instancia de Entry
        $Entry = Entry::create($id_author, $title, $text, $creation_date);

        //inserta los datos a la BD con el repository
        $id = $this->repository->insert($Entry);



        return new Entry($id,$id_author, $title, $text, $creation_date, false);
    }
}