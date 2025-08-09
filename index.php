<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Portal</title>
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
        <h2>Submit Your Details</h2>
        <form action="submit.php" method="POST" id="submission-form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <span id="name-error" class="error-message"></span>
            </div>

            <label for="gender">Gender:</label>
            <div>
                <input type="radio" id="male" name="gender" value="Male" required>
                <label for="male">Male</label>

                <input type="radio" id="female" name="gender" value="Female">
                <label for="female">Female</label>

                <input type="radio" id="other" name="gender" value="Other">
                <label for="other">Other</label>
            </div>

            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>

            <input type="submit" value="Submit" id="submit-btn" disabled>
        </form>
        <a href="view.php">View Submissions</a>
    </div>

    <footer>
        <p>&copy; 2025 Form Submission Portal. All rights reserved by Parth R. LTD.</p>
    </footer>

    <script>
        const nameInput = document.getElementById('name');
        const nameError = document.getElementById('name-error');
        const submitBtn = document.getElementById('submit-btn');
        const form = document.getElementById('submission-form');

        function validateName() {
            const name = nameInput.value.trim();
            const nameRegex = /^[a-zA-Z\s]+$/;
            
            if (name === '') {
                nameError.textContent = 'Name is required.';
                submitBtn.disabled = true;
                return false;
            } else if (name.length > 50) {
                nameError.textContent = 'Name cannot exceed 50 characters.';
                submitBtn.disabled = true;
                return false;
            } else if (!nameRegex.test(name)) {
                nameError.textContent = 'Name can only contain letters and spaces.';
                submitBtn.disabled = true;
                return false;
            } else {
                nameError.textContent = '';
                submitBtn.disabled = false;
                return true;
            }
        }

        nameInput.addEventListener('input', validateName);

        form.addEventListener('input', () => {
            const allFieldsValid = validateName() && 
                form.querySelectorAll('input[required]:not(#name)').length === 
                form.querySelectorAll('input[required]:not(#name)').length;
            submitBtn.disabled = !allFieldsValid;
        });
    </script>
</body>
</html>