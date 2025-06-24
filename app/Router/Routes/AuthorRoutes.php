<?php 

final readonly class AuthorRoutes {
  public static function getRoutes(): array {
    return [
      [
        "name" => "author_get",
        "url" => "/authors",
        "controller" => "Author/AuthorGetController.php",
        "method" => "GET",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "authors_get",
        "url" => "/authors",
        "controller" => "Author/AuthorsGetController.php",
        "method" => "GET"
      ],
      [
        "name" => "authors_deleted_get",
        "url" => "/authors/deleted",
        "controller" => "Author/AuthorsDeletedGetController.php",
        "method" => "GET"
      ],
      [
        "name" => "author_post",
        "url" => "/authors",
        "controller" => "Author/AuthorPostController.php",
        "method" => "POST"
      ],
      [
        "name" => "author_put",
        "url" => "/authors",
        "controller" => "Author/AuthorPutController.php",
        "method" => "PUT",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "author_delete",
        "url" => "/authors",
        "controller" => "Author/AuthorDeleteController.php",
        "method" => "DELETE",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "author_physical_delete",
        "url" => "/authors/physical",
        "controller" => "Author/AuthorPhysicalDeleteController.php",
        "method" => "DELETE",
        "parameters" => [
          [
            "name" => "id",
            "type" => "int"
          ]
        ]
      ],
      [
        "name" => "author_restore",
        "url" => "/authors/restore",
        "controller" => "Author/AuthorRestoreController.php",
        "method" => "PATCH",
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
