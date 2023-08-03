<?php
$servername = "localhost";
$username = "irbba";
$password = "incorrect";
$dbname = "test";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}


function sanitizeEmail($input)
{
    $input = filter_var($input, FILTER_VALIDATE_EMAIL);
    if ($input === false) {
        return null; // or handle the invalid email in some other way
    }
    $input = filter_var($input, FILTER_SANITIZE_EMAIL);
    return $input;
}


function sanitizeInput($input)
{
    $input = trim($input);
    $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
    $input = strip_tags($input);
    return $input;
}
