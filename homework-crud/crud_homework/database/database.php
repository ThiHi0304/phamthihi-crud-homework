<?php
// Connect to database

function db() {
    $host     = 'localhost'; 
    $database = 'phpmyadmin';
    $user     = 'root';
    $password = '';

    try {
        $db = new PDO("mysql:host=$host;dbname=$database", $user, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $db;
}


// Create new student record
 
function createStudent($name,$age,$email,$profile) {
    $db = db(); 
    $stmt = $db->prepare("INSERT INTO student (name,age,email,profile) VALUES (:name, :age, :email, :profile)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':profile', $profile);
    $stmt->execute();
}


/**
 * Get all data from table student
 */
function selectAllStudents() {
    $db=db();
    $stmt=$db->prepare("SELECT *FROM student");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

/**
 * Get only one on record by id 
 */
function selectOnestudent($id) {
    $db=db();
    $stmt=$db->prepare("SELECT *FROM student WHERE id =  :id ");
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;

}

/**
 * Delete student by id
 */
function deleteStudent($id) {
    $db=db();
    $sql = "DELETE FROM student WHERE id = :id";
    $stmt=$db->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
}


/**
 * Update students
 * 
 */
function updateStudent($id, $name, $age, $email, $profile) {
    $db = db();
    $sql = "UPDATE student SET name = :name, age = :age, email = :email, profile = :profile WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':profile', $profile);
    $stmt->execute();
}
