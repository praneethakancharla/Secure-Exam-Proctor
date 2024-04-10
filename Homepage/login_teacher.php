<?php

    $emailaddress = $_POST['emailaddress'];
    $password1 = $_POST['password1'];

    $con = new mysqli('localhost', 'root', '', 'secureexamproctor');
    if($con->connect_error){
        die("Failed to connect :". $con->connect_error);

    }else{
        $stmt = $con->prepare("select * from signup_teacher where emailaddress = ?");
        $stmt->bind_param("s", $emailaddress);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['password1'] === $password1){
                session_start();
                $_SESSION['username'] = $data['username'];
                header("Location: http://localhost/SecureExamProctor/admindashboard/AdminDashboard.html");
                exit();
            }else{
                echo "<h2>Invalid Email or password</h2>";
            }
        }else{
            echo "<h2>Invalid Email or password</h2>";
        }
    }