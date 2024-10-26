<?php
include '../database/db_connect.php';

$message = "";
$toastClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // Check if email already exists
    $checkEmailStmt = $conn->prepare("SELECT email FROM userdata WHERE email = ?");
    $checkEmailStmt->bind_param("s", $email);
    $checkEmailStmt->execute();
    $checkEmailStmt->store_result();

    if (strlen(trim($username)) < 6 || strlen(trim($username)) > 50) {
        $message  = 'ФИО должен содержать не менее 6 и не более 50 символов';
        $toastClass = "#007bff"; // Primary color
    }
    elseif (!preg_match('/^[a-zA-Zа-яёА-ЯЁ\s\-]+$/u', $_POST['username'])) {
        $message = "Не правильно введен ФИО";
        $toastClass = "#007bff"; // Primary color
    }
    elseif ($checkEmailStmt->num_rows > 0) {
        $message = "Email ID already exists";
        $toastClass = "#007bff"; // Primary color
    }
    elseif (!preg_match("/^[a-z0-9_.-]+@([a-z0-9]+\.)+[a-z]{2,6}$/i", $_POST['email'])) {
        $message = "Не правильно введен E-mail";
        $toastClass = "#007bff"; // Primary color
    }
    elseif ($password != $password2) {
        $message = "Пароли не совпадают";
        $toastClass = "#007bff"; // Primary color
    }
    elseif (strlen(trim($password)) < 6 || strlen(trim($password)) > 20) {
        $message  = 'Пароль должен содержать не менее 6 и не более 20 символов';
        $toastClass = "#007bff"; // Primary color
    } else {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO userdata (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            $message = "Account created successfully";
            $toastClass = "#28a745"; // Success color
        } else {
            $message = "Error: " . $stmt->error;
            $toastClass = "#dc3545"; // Danger color
        }

        $stmt->close();
    }

    $checkEmailStmt->close();
    $conn->close();
}


?>

<script>
        let toastElList = [].slice.call(document.querySelectorAll('.toast'))
        let toastList = toastElList.map(function (toastEl) {
            return new bootstrap.Toast(toastEl, { delay: 3000 });
        });
        toastList.forEach(toast => toast.show());
    </script>