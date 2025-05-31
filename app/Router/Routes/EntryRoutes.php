<?php 

final readonly class EntryRoutes {
  public static function getRoutes(): array {
    return [
      [
        "name" => "entry_get",
        "url" => "/entries",
        "controller" => "Entry/EntryGetController.php",
        "method" => "GET",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "entries_get",
        "url" => "/entries",
        "controller" => "Entry/EntriesGetController.php",
        "method" => "GET"
      ],
      [
        "name" => "entry_post",
        "url" => "/entries",
        "controller" => "Entry/EntryPostController.php",
        "method" => "POST"
      ],
      [
        "name" => "entry_put",
        "url" => "/entries",
        "controller" => "Entry/EntryPutController.php",
        "method" => "PUT",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
        ],
        [
        "name" => "entry_delete",
        "url" => "/entries",
        "controller" => "Entry/EntryDeleteController.php",
        "method" => "DELETE",
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
