<?php 

namespace Src\Entity\Author;

final class Author {
// 'ReadOnly' solo donde sea Necesario
    public function __construct(
        private readonly ?int $id,
        private string $name,
        private string $email,
        private bool $deleted
        ){}


    public static function create(string $name, string $email): self
    {
        return new self(null, $name, $email, false);
        // 'Self' indica Instancia de el mismo Objeto (Author)
    }

    public function modify(string $name, string $email): void
    {
        $this->name = $name;
        $this->email = $email;
    }
    
// Cambia Estado 'DELETED'
    public function delete(): void
    {
        $this->deleted = true;
    }

    
    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
    
    public function email(): string
    {
        return $this->email;
    }
    
// Consulta Estado 'DELETED'
    public function isDeleted(): int
    {
        return $this->deleted ? 1 : 0;
    }
}