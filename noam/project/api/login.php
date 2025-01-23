<?php
include 'settings.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mailaddress = $_POST['mailaddress'];
    $userpassword = $_POST['userpassword'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE mailaddress = ?");
    $stmt->execute([$mailaddress]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($userpassword, $user['userpassword'])) {
        echo "<center><p style='color: green;'>Login successful!</p></center>";
    } else {
        echo "<center><p style='color: red;'>Invalid credentials.</p></center>";
    }
}
?>