<?php 

/**
 * Controlador: Maneja entrada/salida HTTP
 * Cuando se llame al controlador (en el router)
 *  se ejecuta el constructor, en el que se crea una instancia del servicio search y se asigna esa instancia a la variable $service
 */

use Src\Service\Entry\EntriesSearcherService;

final readonly class EntriesGetController {

    private EntriesSearcherService $service;  //crea un objeto de tipo EntriesSearcherService

    public function __construct() {
        $this->service = new EntriesSearcherService(); //Crea una nueva instancia de EntriesSearcherService
    }

    public function start(): void{
        $entries = $this->service->search(); //se llama a la funcion search que ya tiene el objeto service y se guarda en entries. Retorna un array de objetos Entry

        echo json_encode($this->toResponse($entries)); //convierte el array a json

        //Objetos Entity → Arrays asociativos → JSON


    }

    private function toResponse(array $entries): array{ //transformacion a array asociativo
        $responses = [];
        
        foreach($entries as $entry) {
            $responses[] = [
            
            "id" => $entry->id(), //llama a los getters de Entry
            "id_author" => $entry->id_author(),
            "title" => $entry->title(),
            "text" => $entry->text(),
            "creation_date" => $entry->creation_date()->format("Y-m-d H:i:s"),
            "deleted" => $entry->isDeleted()
        

            ];
        }

        return $responses;
    }
}