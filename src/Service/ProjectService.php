<?php

require_once __DIR__ . '/../Repository/ProjectsRepository.php';
require_once __DIR__ . '/../Models/Projects.php';

class ProjectService{

    private Projects $model;

    public function __construct(Projects $model){
        $this->model = $model;
    }

    public function getAllProjects(): array{
        return[];
    }
    
    public function getProjectById(int $id): ?Projects{
        return null;
    }

    public function createProject(
        int $id,
        string $title,
        string $description,
        bool $is_done,
        bool $is_visible,
        string $start_date, 
        string $end_date ,
        string $type,
        string $budget
    ): bool{
        return true;
    }

    public function updateProject(
        int $id,
        string $title,
        string $description,
        bool $is_done,
        bool $is_visible,
        string $start_date, 
        string $end_date ,
        string $type,
        string $budget
    ): bool{
        return true;
    }

    public function deleteProject(int $id): bool{
        return true;
    }
}
