<?php
class Projects {
    private $id;
    private $title;
    private $start_date;
    private $end_date;
    private $budget;
    private $description;
    private $is_done;
    private $is_visible;
    private $type;

    public function __construct($id, $title, $start_date, $end_date, $budget, $description, $is_done, $is_visible, $type) {
        $this->id = $id;
        $this->title = $title;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
        $this->budget = $budget;
        $this->description = $description;
        $this->is_done = $is_done;
        $this->is_visible = $is_visible;
        $this->type = $type;
    }

    // Getters and Setters
    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getStartDate() {
        return $this->start_date;
    }

    public function setStartDate($start_date) {
        $this->start_date = $start_date;
    }

    public function getEndDate() {
        return $this->end_date;
    }

    public function setEndDate($end_date) {
        $this->end_date = $end_date;
    }

    public function getBudget() {
        return $this->budget;
    }

    public function setBudget($budget) {
        $this->budget = $budget;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getIsDone() {
        return $this->is_done;
    }

    public function setIsDone($is_done) {
        $this->is_done = $is_done;
    }   

    public function getIsVisible() {
        return $this->is_visible;
    }

    public function setIsVisible($is_visible) {
        $this->is_visible = $is_visible;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

} 