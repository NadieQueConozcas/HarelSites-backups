<?php
include 'settings.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mailaddress = $_POST['mailaddress'];
    $userpassword = $_POST['userpassword'];

    $hashed_password = password_hash($userpassword, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE mailaddress = ?");
    $stmt->execute([$mailaddress]);
    if ($stmt->rowCount() > 0) {
        echo "<center><p style='color: red;'>Email address already exists.</p></center>";
    } else {
        $stmt = $pdo->prepare("INSERT INTO users (mailaddress, userpassword) VALUES (?, ?)");
        $stmt->execute([$mailaddress, $hashed_password]);
        echo "<center><p style='color: green;'>Registration successful!</p></center>";
    }
}
?>