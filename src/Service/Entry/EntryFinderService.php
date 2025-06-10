<?php 

namespace Src\Service\Entry;

use Src\Entity\Entry\Entry;
use Src\Infrastructure\Repository\Entry\EntryRepository;
use Src\Entity\Entry\Exception\EntryNotFoundException;

final readonly class EntryFinderService {

    private EntryRepository $repository; //se crea el objeto EntryRepository

    public function __construct() {
        $this->repository = new EntryRepository();//se instancia el objeto
    }

    public function find(int $id): Entry {   //el metodo find recibe un id y devuelve un objeto Entry

        $entry = $this->repository->find($id); //se llama al metodo find del repositorio(devuelve un objeto Entry)

        if ($entry === null) { //si no existe el id se devuelve una excepcion
            throw new EntryNotFoundException($id);
        }

        return $entry;
    }
}