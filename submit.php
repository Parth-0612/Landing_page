<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    if (empty($name)) {
        die("Name is required.");
    }
    if (strlen($name) > 50) {
        die("Name cannot exceed 50 characters.");
    }
    if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        die("Invalid name. Only letters and spaces are allowed.");
    }

    $dob_date = new DateTime($dob);
    $today = new DateTime();
    $age = $today->diff($dob_date)->y;

    if ($age < 18) {
        die("You must be at least 18 years old.");
    }

    $name = mysqli_real_escape_string($conn, $name);
    $gender = mysqli_real_escape_string($conn, $gender);
    $dob = mysqli_real_escape_string($conn, $dob);
    $email = mysqli_real_escape_string($conn, $email);
    $message = mysqli_real_escape_string($conn, $message);

    $sql = "INSERT INTO data (name, gender, dob, email, message) VALUES ('$name', '$gender', '$dob', '$email', '$message')";

    if (mysqli_query($conn, $sql)) {
        $success_message = "<p>Record inserted successfully.</p>";
    } else {
        $error_message = "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Result</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Form Submission Portal</h1>
        <nav>
            <a href="index.php">Submit Details</a>
            <a href="view.php">View Submissions</a>
        </nav>
    </header>

    <div class="container">
        <h2>Submission Result</h2>
        <?php
        if (isset($success_message)) {
            echo $success_message;
        }
        if (isset($error_message)) {
            echo $error_message;
        }
        ?>
        <p><a href="index.php">Go Back</a></p>
        <a href="index.php"><button>Add Another Entry</button></a>
        <a href="view.php">View Submissions</a>
    </div>

    <footer>
        <p>&copy; 2025 Form Submission Portal. All rights reserved.</p>
    </footer>
</body>
</html>