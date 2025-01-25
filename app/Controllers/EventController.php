<?php

class EventController
{
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $description = trim($_POST['description']);
            $date = $_POST['date'];
            $maxCapacity = (int)$_POST['max_capacity'];
            $createdBy = $_SESSION['user_id'];

            $db = getDbConnection();
            $stmt = $db->prepare("INSERT INTO events (name, description, date, max_capacity, created_by) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$name, $description, $date, $maxCapacity, $createdBy]);

            header("Location: /events");
        } else {
            include_once __DIR__ . '/../Views/events/create.php';
        }
    }

    public function list()
    {
        $db = getDbConnection();
        $stmt = $db->query("SELECT * FROM events");
        $events = $stmt->fetchAll();

        include_once __DIR__ . '/../Views/events/list.php';
    }

    public function delete($id)
    {
        $db = getDbConnection();
        $stmt = $db->prepare("DELETE FROM events WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: /events");
    }
}
