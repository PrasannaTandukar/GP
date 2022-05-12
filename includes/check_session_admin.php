<?php
if (!isset($_SESSION['role'])) {
    header("Location: ./index.php");
} 
else if ($_SESSION['role'] !== 'admin') {
    header("Location: ./index.php");
}