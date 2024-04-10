<?php
    $emailaddress = $_POST['emailaddress'];
    $Username = $_POST['Username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    
    $conn = new mysqli('localhost', 'root', '', 'secureexamproctor');
    if ($conn->connect_error) {
        die('Connection Failed: ' . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO signup (emailaddress, Username, password1, password2)
        VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $emailaddress, $Username, $password1, $password2);
        $stmt->execute();
        header("Location: http://localhost/SecureExamProctor/Homepage/login.html");
        $stmt->close();
        $conn->close();
    }
?>
