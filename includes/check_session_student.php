<?php
if (!isset($_SESSION['role'])) {
    header("Location: ../index.php");
} 
else if ($_SESSION['role'] !== 'user') {
    header("Location: ../index.php");
}