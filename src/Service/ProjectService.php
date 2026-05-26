<?php

require_once __DIR__ . '/../Repository/ProjectsRepository.php';
require_once __DIR__ . '/../Models/Projects.php';

class ProjectService{
    private ProjectsRepository $repository;

    public function __construct(ProjectsRepository $repository){
        $this->repository = $repository;
    }

    public function getAllProjects(): array{
        return $this->repository->getAllProjects();
    }
    
    public function getProjectById(int $id): ?Projects{
        return $this->repository->getProjectById($id);
    }

    public function createProject(
        string $title,
        string $description,
        bool $is_done,
        bool $is_visible,
        string $start_date, 
        string $end_date ,
        string $type,
        string $budget
    ): bool{
        $proj = new Projects(null, $title, $start_date, $end_date, $budget, $description, $is_done, $is_visible, $type);
        if ($this->repository->addProject($proj)) {
            return true;
        }
        return false;
    }

    public function updateProject(
        string $title,
        string $description,
        bool $is_done,
        bool $is_visible,
        string $start_date, 
        string $end_date ,
        string $type,
        string $budget
    ): bool{
        $updProj = new Projects(null, $title, $start_date, $end_date, $budget, $description, $is_done, $is_visible, $type);
        return $this->repository->updateProject($updProj);
    }

    public function deleteProject(int $id): bool{
        return $this->repository->deleteProject($id);
    }
}
