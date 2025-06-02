<?php 

namespace Src\Entity\EntryLogs;
use DateTime;
final class entryLogs {

    public function __construct(
        private readonly ?int $id,
        private string $id_entry,
        private DateTime $creation_date,
        private string $description
    ) {
    }

    public static function create(string $id_entry, DateTime $creation_date, string $description): self
    {
        return new self(null, $id_entry, $creation_date, $description);
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function id_entry(): string
    {
        return $this->id_entry;
    }
    public function creation_date(): DateTime
    {
        return $this->creation_date;
    }
    public function description(): string
    {
        return $this->description;
    }
}