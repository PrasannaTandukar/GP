<?php
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'rms';

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($connection) {
    echo "We are connected";
}