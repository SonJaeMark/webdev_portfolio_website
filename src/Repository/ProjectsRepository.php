<?php 

require_once __DIR__ . '/../Models/Projects.php';

class ProjectsRepository {

    private array $barangay_projects = [];

    // Correct way to initialize objects inside a class
    public function __construct() {
        $this->barangay_projects = [
            // HEALTH PROJECTS
            new Projects(
                1, 
                'Barangay Nutrition and Feeding Program', 
                '2026-06-01', 
                '2026-08-01', 
                50000.00, 
                'A two-month supplemental feeding initiative targeting undernourished children in the community.', 
                false, 
                true, 
                'Health'
            ),
            new Projects(
                2, 
                'Operation Tuli and Medical Mission', 
                '2026-04-15', 
                '2026-04-17', 
                75000.00, 
                'Free medical check-ups, dental services, and circumcision during the summer break.', 
                true, 
                true, 
                'Health'
            ),

            // EDUCATION PROJECTS
            new Projects(
                3, 
                'Barangay E-Learning Hub', 
                '2026-07-01', 
                '2026-09-15', 
                120000.00, 
                'Setting up a computer laboratory with internet access for student research and printing.', 
                false, 
                true, 
                'Education'
            ),
            new Projects(
                4, 
                'Sangguniang Kabataan Libreng Tutors', 
                '2026-01-10', 
                '2026-03-28', 
                20000.00, 
                'Remedial reading and mathematics classes for elementary students during weekends.', 
                true, 
                true, 
                'Education'
            ),

            // ENVIRONMENT PROJECTS
            new Projects(
                5, 
                'Community Segregation and MRF Upgrade', 
                '2026-08-01', 
                '2026-11-30', 
                90000.00, 
                'Constructing a Materials Recovery Facility and distributing color-coded trash bins.', 
                false, 
                true, 
                'Environment'
            ),
            new Projects(
                6, 
                'Barangay Tree Planting and Clean-up', 
                '2026-05-10', 
                '2026-05-11', 
                15000.00, 
                'Cleaning local waterways and planting native trees along the riverbanks.', 
                true, 
                true, 
                'Environment'
            )
        ];
    }

    // Create
    public function addProject(Projects $project): void {
        $this->barangay_projects[] = $project;
    }

    // Read
    public function getAllProjects(): array {
        return $this->barangay_projects;
    }

    public function getProjectById(int $id): ?Projects {
        foreach ($this->barangay_projects as $project) {
            if ($project->getId() === $id) {
                return $project;
            }
        }
        return null; 
    }

    // Update
    public function updateProject(Projects $updatedProject): bool {
        foreach ($this->barangay_projects as $index => $project) {
            if ($project->getId() === $updatedProject->getId()) {
                $this->barangay_projects[$index] = $updatedProject;
                return true; 
            }
        }
        return false; 
    }

    // Delete
    public function deleteProject(int $id): bool {
        foreach ($this->barangay_projects as $index => $project) {
            if ($project->getId() === $id) {
                $this->barangay_projects[$index]->setIsVisible(false);
                return true; 
            }
        }
        return false; 
    }
}

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