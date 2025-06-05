<?php 

namespace Src\Service\Author;

use Src\Infrastructure\Repository\Author\AuthorRepository;

final readonly class AuthorDeleterService {
    private AuthorRepository $repository;
    private AuthorFinderService $finder;

    public function __construct() {
        $this->repository = new AuthorRepository();
        $this->finder = new AuthorFinderService();
    }

    public function delete(int $id): void
    {
        $author = $this->finder->find($id);

        $author->delete();
        //Utiliza el Borrado Logico de la Entidad
        $this->repository->update($author);
    } 
}