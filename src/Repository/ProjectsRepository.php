<?php

require_once __DIR__ . '/../Models/Projects.php';

class ProjectsRepository {

    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }
           

   // Create
    public function addProject(Projects $project): void {
        $stmt = $this->pdo->prepare("
            INSERT INTO projects_tbl 
            (proj_title, proj_start_date, proj_end_date, proj_budget, proj_description, proj_is_done, proj_is_visible, proj_type) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $project->getTitle(),
            $project->getStartDate(),
            $project->getEndDate(),
            $project->getBudget(),
            $project->getDescription(),
            $project->getIsDone() ? 1 : 0,
            $project->getIsVisible() ? 1 : 0,
            $project->getType()
        ]);
    }

    // Read All
    public function getAllProjects(): array {
        $stmt = $this->pdo->query('SELECT * FROM projects_tbl');
        $rows = $stmt->fetchAll();

        $projects = [];
        foreach ($rows as $row) {
            $projects[] = new Projects(
                (int)$row['proj_id'],
                $row['proj_title'],
                $row['proj_start_date'],
                $row['proj_end_date'],
                (float)$row['proj_budget'],
                $row['proj_description'],
                (bool)$row['proj_is_done'],
                (bool)$row['proj_is_visible'],
                $row['proj_type']
            );
        }
        return $projects;
    }

    // Read One
    public function getProjectById(int $id): ?Projects {
        $stmt = $this->pdo->prepare('SELECT * FROM projects_tbl WHERE proj_id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch();

        if (!$row) {
            return null;
        }

        return new Projects(
            (int)$row['proj_id'],
            $row['proj_title'],
            $row['proj_start_date'],
            $row['proj_end_date'],
            (float)$row['proj_budget'],
            $row['proj_description'],
            (bool)$row['proj_is_done'],
            (bool)$row['proj_is_visible'],
            $row['proj_type']
        );
    }

    // Update
    public function updateProject(Projects $updatedProject): bool {
        $stmt = $this->pdo->prepare('UPDATE projects_tbl SET proj_title = :title, proj_start_date = :start_date, proj_end_date = :end_date, proj_budget = :budget, proj_description = :description, proj_is_done = :is_done, proj_is_visible = :is_visible, proj_type = :type WHERE proj_id = :id');
        return $stmt->execute([
            'id'          => $updatedProject->getId(),
            'title'       => $updatedProject->getTitle(),
            'start_date'  => $updatedProject->getStartDate(),
            'end_date'    => $updatedProject->getEndDate(),
            'budget'      => $updatedProject->getBudget(),
            'description' => $updatedProject->getDescription(),
            'is_done'     => (int)$updatedProject->getIsDone(),
            'is_visible'  => (int)$updatedProject->getIsVisible(),
            'type'        => $updatedProject->getType(),
        ]);
    }

    // Delete (soft delete)
    public function deleteProject(int $id): bool {
        $stmt = $this->pdo->prepare('UPDATE projects_tbl SET proj_is_visible = 0 WHERE proj_id = :id');
        return $stmt->execute(['id' => $id]);
    }
}

// === FIX IS HERE ===

// // 1. Load the database file
// $db = require_once __DIR__ . '/../../config/database.php';

// // 2. Double-check that $db is actually a PDO object
// if (!$db instanceof PDO) {
//     die("Error: config/database.php did not return a valid PDO instance.\n");
// }

// // 3. Pass the valid connection into the repository
// $projectsRepo = new ProjectsRepository($db);
// $allProjects = $projectsRepo->getAllProjects();

// foreach ($allProjects as $project) {
//     echo "Title: " . $project->getTitle() . "\n";
//     echo "Type: " . $project->getType() . "\n";
//     echo "-------------------------\n";
// }