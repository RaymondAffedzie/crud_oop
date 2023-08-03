<?php
session_start();
include_once 'connection.php';

// register new member
if (isset($_POST['add'])) {
    $firstname  = $_POST['firstname'];
    $surname    = $_POST['surname'];
    $birthdate  = $_POST['birthdate'];
    $email      = sanitizeEmail($_POST['email']);

    $query = "INSERT INTO member (firstname, surname, dob, email) VALUES (:firstname, :surname, :dob, :email)";
    $stmt = $connection->prepare($query);

    $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
    $stmt->bindParam(':dob', $birthdate, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);

    $query_execute = $stmt->execute();
    if ($query_execute) {
        $_SESSION['success'] = "New record added";
        header('Location: index.php');
        exit(0);
    } else {
        $_SESSION['warning'] = "No record added";
        header('Location: index.php');
        exit(0);
    }
}



// update member profile
if (isset($_POST['save'])) {
    $id         = $_POST['member_id'];
    $firstname  = $_POST['firstname'];
    $surname    = $_POST['surname'];
    $email      = $_POST['email'];
    $birthdate  = $_POST['birthdate'];

    try {
        $query = "UPDATE member SET firstname  = :firstname, surname = :surname, email = :email, dob = :dob WHERE id = :id";
        $stmt = $connection->prepare($query);

        $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $stmt->bindParam(':surname', $surname, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':dob', $birthdate, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        $query_execute = $stmt->execute();
        if ($query_execute) {
            $_SESSION['success'] = "Record updated";
            header('Location: index.php');
            exit(0);
        } else {
            $_SESSION['warning'] = "Record not updated";
            header('Location: index.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


// delete member code
if (isset($_POST['delete'])) {
    $id = $_POST['member_id'];

    try {
        $query = "DELETE FROM member WHERE id = :id";
        $stmt = $connection->prepare($query);

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $query_execute = $stmt->execute();

        if ($query_execute) {
            $_SESSION['danger'] = "Record deleted";
            header('Location: index.php');
            exit(0);
        } else {
            $_SESSION['warning'] = "Record not deleted";
            header('Location: index.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}




/**
 * query for selecting specific member details
 * SELECT `Firstname`, `Sur_name`, `Other_name`, `Sex`, `Birth_Date`, `Birth_Place`, `Birth_Region`, `Birth_District` FROM members WHERE CONCAT(`Init`,`Reg_year`,`Id`) LIKE "SAP%";
 * query for selecting all member details
 * SELECT * FROM `members` WHERE CONCAT(`Init`,`Reg_year`,`Id`) = "SAP20221";
 * query for updating member details
 * UPDATE `members` SET `Firstname`='Raymond' WHERE CONCAT(`Init`,`Reg_year`,`Id`) = "SAP20221";
 */
