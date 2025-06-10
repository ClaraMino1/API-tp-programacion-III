<?php 

use Src\Service\EntryLogs\EntryLogsFinderService;

final readonly class EntryLogsGetController {

    private EntryLogsFinderService $service;

    public function __construct() {
        $this->service = new EntryLogsFinderService();
    }

    public function start(?int $id = null): void //acá start puede recibir un parametro opcional (entero/nulo), pero si no se le pasa nada se le asigna nulo
    {
        $entryLogs = $this->service->find($id);

        //verificamos si $entryLogs es un array o un objeto
        if (is_array($entryLogs)) {//is_array devuelve true si se obtienen muchos registros o sino false
            $formattedLogs = [];

            // Recorremos cada uno de los logs y los formateamos
            foreach ($entryLogs as $log) {
                $formattedLogs[] = [
                    "id" => $log->id(),
                    "id_entry" => $log->id_entry(),
                    "creation_date" => $log->creation_date()->format("Y-m-d H:i:s"),
                    "description" => $log->description()
                ];
            }

            //convierte a JSON para mandarlo como respuesta
            echo json_encode($formattedLogs);
        } else {
            //convierte a JSON para mandarlo como respuesta
            echo json_encode([
                "id" => $entryLogs->id(),
                "id_entry" => $entryLogs->id_entry(),
                "creation_date" => $entryLogs->creation_date()->format("Y-m-d H:i:s"),
                "description" => $entryLogs->description()
            ]);
        }
    }
}