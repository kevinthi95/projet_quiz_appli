<?php
session_start(); 

// Supprime id
if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']); // Supprime variable 
}

// destruction session
session_destroy(); 

header('Location: http://localhost:8888/index.php');
exit;
?>
