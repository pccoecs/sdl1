<?php


include('connect.php');

if(isset($_POST['submit'])) {
    
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['repassword'])) {
        echo "Please fill all the fields.";
    } else {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $repassword = mysqli_real_escape_string($conn, $_POST['repassword']);

        if ($password != $repassword) {
            echo "Passwords do not match.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $sql = "INSERT INTO student (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
            
            $res = mysqli_query($conn, $sql);
            
            if($res) {
                echo "Record successfully inserted.";
            } else {
                echo "There was a problem inserting the record.";
            }
        }
    }
}
?>
