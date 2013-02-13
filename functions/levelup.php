<?php
include_once '../includes/config.php';
include_once '../includes/functions.php';
$user = getUser();
$goals = getGoals();
    foreach ($goals as $goal) {
        $id = $goal['id'];
        if (isset($_GET[$id])){
            addGoalPoints($user['id'], $goal['id'], $goal['points']);
        }
    }
header('location: ../index.php');