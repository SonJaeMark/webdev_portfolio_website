<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

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

    // Read
    public function getAllProjects(): array {
        $stmt = $this->pdo->query("SELECT * FROM projects_tbl");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $projects = [];
        foreach ($rows as $row) {
        $projects[] = new Projects(
            $row['id'],
            $row['title'],
            $row['start_date'],
            $row['end_date'],
            $row['budget'],
            $row['description'],
            (bool) $row['is_done'],
            (bool) $row['is_visible'],
            $row['type']
        );
    }
    return $projects;
}

    public function getProjectById(int $id): ?Projects {
        $stmt = $this->pdo->prepare("SELECT * FROM projects_tbl WHERE id = ?"); 
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Projects(
                $row['id'],
                $row['title'],
                $row['start_date'],
                $row['end_date'],
                $row['budget'],
                $row['description'],
                (bool) $row['is_done'],
                (bool) $row['is_visible'],
                $row['type']
            );
        }
        return null;
    }

    // Update
    //public function updateProject(Projects $updatedProject): bool {
       
    //}

    // Delete
    //public function deleteProject(int $id): bool {
    //}

}

// 1. Load the database file
$db = require __DIR__ . '/../../config/database.php'; 

// 2. Double-check that $db is actually a PDO object, not an integer
if (!$db instanceof PDO) {
    die("Error: config/database.php did not return a valid PDO instance.\n");
}

 // 3. Instantiate the repository 
$projectsRepo = new ProjectsRepository($db);

$newProject = new Projects(
    null, 
    'Test Project', 
    '2026-06-01', 
    '2026-08-01', 
    50000.00, 
    'This is a Test Project', 
    false, 
    true, 
    'Health'
);

    $projectsRepo->addProject($newProject);
    echo "New project added successfully.\n";




// call getAllProjects and echo the results
// $repository = new ProjectsRepository();
// $allProjects = $repository->getAllProjects();
// foreach ($allProjects as $project) {
//     echo "ID: " . $project->getId() . "\n";
//     echo "Title: " . $project->getTitle() . "\n";
//     echo "Start Date: " . $project->getStartDate() . "\n";
//     echo "End Date: " . $project->getEndDate() . "\n";
//     echo "Budget: " . $project->getBudget() . "\n";
//     echo "Description: " . $project->getDescription() . "\n";
//     echo "Is Done: " . ($project->getIsDone() ? 'Yes' : 'No') . "\n";
//     echo "Is Visible: " . ($project->getIsVisible() ? 'Yes' : 'No') . "\n";
//     echo "Type: " . $project->getType() . "\n";
//     echo "-------------------------\n";
// }