<?php 

use Src\Service\Entry\EntryFinderService;

final readonly class EntryGetController {

    private EntryFinderService $service; //se crea el objeto EntryFinderService

    public function __construct() {
        $this->service = new EntryFinderService(); //se instancia el objeto
    }

    public function start(int $id): void{//se crea el metodo start que recibe el id de la url

        $entry = $this->service->find($id); //el servicio devuelve Objeto Entry(con el id indicado)
        
        echo json_encode([ //se pasa a json usando getters del objeto Entry
            "id" => $entry->id(),
            "id_author" => $entry->id_author(),
            "title" => $entry->title(),
            "text" => $entry->text(),
            "creation_date" => $entry->creation_date()->format("Y-m-d H:i:s"),
            "deleted" => $entry->isDeleted()
            

        ]);
    }
}