<?php 

/*LOGICA DE NEGOCIO.actúa como intermediario entre los controladores y el repositorio de datos, encapsulando la lógica */
namespace Src\Service\Entry;

use Src\Entity\Entry\Entry;
use Src\Infrastructure\Repository\Entry\EntryRepository;

final readonly class EntriesSearcherService {
    private EntryRepository $repository; //Crea un objeto de tipo repositorio

    public function __construct() {
        $this->repository = new EntryRepository(); //crea una nueva instancia del objeto
    }

    /** @return Entry[] */  /* -> significa que retorna un array de objetos Entry*/
    public function search(): array
    {
        return $this->repository->search(); //llama a la funcion search de repositorio
    }

    /*Debido a que el repositorio solo se encarga del crud, si se quiere agregar cache, paginacion,etc ésta seria la capa correcta */
}