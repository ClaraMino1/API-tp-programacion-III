<?php 

namespace Src\Service\Entry;

use Src\Infrastructure\Repository\Entry\EntryRepository;

/*El EntryDeleterService tambien usa el servicio EntryFinderService para saber que id borrar */

final readonly class EntryDeleterService {
    private EntryRepository $repository; //se crea el objeto EntryRepository -> actualiza el estado en la BD
    private EntryFinderService $finder; //se crea el objeto EntryFinderService

    public function __construct() {
        $this->repository = new EntryRepository(); //se instancian los objetos
        $this->finder = new EntryFinderService();
    }

    public function delete(int $id): void{//se crea un metodo delete que recibe un id(el metodo que llama el controller)

        $entry = $this->finder->find($id); //se busca el id a borrar (con el servicio finder) Devuelve un objeto Entry

        $entry->delete(); //Marcar como eliminada(cambia de estado). Usa metodo de objeto entry

        $this->repository->update($entry);//persistir el cambio
    } 
}