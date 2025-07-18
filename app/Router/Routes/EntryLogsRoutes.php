<?php 

final readonly class EntryLogsRoutes {
  public static function getRoutes(): array {
    return [
        [ 
            "name" => "entryLogs_get",
            "url" => "/entrylogs",
            "controller" => "EntryLogs/EntryLogsGetController.php",
            "method" => "GET"
        ],
        [ 
            "name" => "entryLog_get",
            "url" => "/entrylogs",
            "controller" => "EntryLogs/EntryLogsGetController.php",
            "method" => "GET",
            "parameters" => [
                [
                    "name" => "id",
                    "type" => "int"
                ]
            ]
        ]
    ];
  }
}
