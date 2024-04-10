<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data from html page to php variables
    $num_questions = $_POST["num_questions"];
    $time_limit = $_POST["time_limit"];
    $num_options = $_POST["num_options"];
    $exam_datetime = $_POST["exam_datetime"];
    $marks_per_question = $_POST["marks_per_question"];
    $language = $_POST["language"];
    $proctoring = isset($_POST["proctoring"]) ? $_POST["proctoring"] : "off";
    $negativemarks = isset($_POST["negativemarks"]) ? $_POST["negativemarks"] : "no";
    $negative_marks_per_question = $_POST["negative_marks_per_question"];
    // connection variable - server, username, password, database name
    $conn = new mysqli('localhost', 'root', '', 'secureexamproctor');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // Inserting data into the database (tablename to which I want to insert data is adminsettings)
    $sql = "INSERT INTO adminsettings (num_questions, time_limit, num_options, exam_datetime, marks_per_question, language, proctoring, negativemarks, negative_marks_per_question) 
            VALUES ('$num_questions', '$time_limit', '$num_options', '$exam_datetime', '$marks_per_question', '$language', '$proctoring', '$negativemarks', '$negative_marks_per_question')";

    if ($conn->query($sql) === TRUE) {
        echo "Exam created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    // Close the database connection
    $conn->close();
}
?>
