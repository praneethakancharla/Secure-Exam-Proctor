<?php
// Ensure the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $CurrentPassword = $_POST['CurrentPassword'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if new password and confirm password match
    if ($new_password == $confirm_password) {
        $connect = new mysqli('localhost', 'root', '', 'secureexamproctor');

        // Check connection
        if ($connect->connect_error) {
            die("Connection failed: " . $connect->connect_error);
        }

        // Prepare and execute the query to check if the current password matches
        $query = "SELECT * FROM signup_teacher WHERE password1 = '$CurrentPassword'";
        $result = $connect->query($query);

        if ($result->num_rows > 0) {
            // Update the password if the current password matches
            $update_query = "UPDATE signup_teacher SET password1='$new_password', password2='$new_password' WHERE password1 = '$CurrentPassword'";
            if ($connect->query($update_query) === TRUE) {
                echo "Password updated successfully";
            } else {
                echo "Error updating password: " . $connect->error;
            }
        } else {
            echo "Old password does not match";
        }

        $connect->close();
    } else {
        echo "New Password & confirm new password do not match";
    }
}
?>



