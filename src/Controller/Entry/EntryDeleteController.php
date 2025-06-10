<?php 

use Src\Service\Entry\EntryDeleterService;

final readonly class EntryDeleteController {
    private EntryDeleterService $service; //se crea el objeto EntryDeleterService

    public function __construct() {
        $this->service = new EntryDeleterService(); //cuando se llama al controlador se instancia el objeto
    }

    public function start(int $id): void
    {
        $this->service->delete($id); //se crea un metodo start que recibe un id y llama al metodo delete del servicio
    }
}