<?php
include 'db.php';

$sql = "SELECT * FROM data";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Submissions</title>
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
        <h2>Submitted Entries</h2>
        <?php
        if (mysqli_num_rows($result) > 0) {
            echo "<table><tr><th>Name</th><th>Gender</th><th>DOB</th><th>Email</th><th>Message</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["name"] . "</td><td>" . $row["gender"] . "</td><td>" . $row["dob"] . "</td><td>" . $row["email"] . "</td><td>" . $row["message"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No results found.</p>";
        }

        echo '<a href="index.php"><button>Add Another Entry</button></a>';

        mysqli_close($conn);
        ?>
    </div>

    <footer>
        <p>&copy; 2025 Form Submission Portal. All rights reserved.</p>
    </footer>
</body>
</html>
