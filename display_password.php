<?php
session_start();

if (isset($_SESSION['generated_password'])) {
    $password = $_SESSION['generated_password'];
    echo "Generated Password: " . $password;
} else {
    echo "No password generated.";
}
?>