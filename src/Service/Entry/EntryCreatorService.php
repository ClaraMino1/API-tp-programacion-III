<?php 

namespace Src\Service\Entry;

use Src\Entity\Entry\Entry;
use Src\Infrastructure\Repository\Entry\EntryRepository;

final readonly class EntryCreatorService {
    private EntryRepository $repository;//crea el objeto EntryRepository

    public function __construct() {
        $this->repository = new EntryRepository();//instancia el objeto
    }

    //recibe los parametros del handler
    public function create(int $id_author, string $title, string $text): Entry
    {
        //Retorna una nueva instancia de Entry
        $entry = Entry::create($id_author, $title, $text);
        //inserta los datos a la BD con el repository
        return $this->repository->insert($entry);
    }
}