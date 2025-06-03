<?php 

namespace Src\Service\Entry;

use Src\Entity\Entry\Entry;
use Src\Infrastructure\Repository\Entry\EntryRepository;
use DateTime;

final readonly class EntryUpdaterService {
    private EntryRepository $repository; //se crea el objeto EntryRepository
    private EntryFinderService $finder; //se crea el objeto del servicio finder

    public function __construct() {
        //se instancian los objetos
        $this->repository = new EntryRepository();
        $this->finder = new EntryFinderService();
    }

    public function update(int $id_author, string $title, string $text, DateTime $creation_date, int $id): void //recibe los parametros que le pasa el controller
    {
        $entry = $this->finder->find($id); //busca el id con el servicio find y devuelve el objeto Entry

        $entry->modify($id_author, $title, $text,$creation_date);
        //se llama a la funcion modify del objeto Entry. Se modifica la entidad pero no la BD

        $this->repository->update($entry);
    } 
}