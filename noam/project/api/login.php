<!DOCTYPE html>
<html>

<head>
    <title>Oracle | Login</title>
    <link rel="stylesheet" href="/content/css/main.css">
    <meta name="description" content="Oracle offers a wide range of products including database software, cloud services, enterprise software, EPM, and SCM." />
    <link rel="icon" type="image/png" sizes="32x32" href="/content/images/general/icon.png">
</head>

<body>
    <header class="site-navigation">
        <ul class="menu">
            <li class="menu-item"><a href="/index.html"><img class="logo" src="/content/images/general/logo.png" alt="Logo"></a></li>
            <li class="menu-item"><a href="/p/products.html">Products</a></li>
            <li class="menu-item"><a href="/p/industries.html">Industries</a></li>
            <li class="menu-item"><a href="/p/partners.html">Partners</a></li>
            <li class="menu-item"><a href="/p/developers.html">Developers</a></li>
            <li class="menu-item"><a href="/p/about.html">About</a></li>
            <li class="menu-item"><a href="/f/login.html" class="login-btn"><img src="/content/images/general/login-icon-nav-menu.png" alt="Login">Login</a></li>
            <li class="menu-item"><a href="/f/contact.html" class="contact-btn"><img src="/content/images/general/contact-widget.png" alt="Contact">Contact sales</a></li>
        </ul>
    </header>
    <article>
        <div class="bg">
            <center>
                <h1>Login</h1>
            </center>
            <hr>
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
        </div>
        <div class="contact-bg">
            <h2>Need help?</h2>
            <p>Send a message to an Oracle advisor by clicking here:</p>
            <a href="/f/contact.html" class="contact-btn"><img class="contact-btn-img" src="/content/images/general/contact-widget.png" alt="Contact">Contact support</a>
            <br>
        </div>
    </article>
    <footer>
        <ul>
            <li><a href="https://project.alum.sh/f/contact.html">Contact</a></li>
            <li><a href="https://project.alum.sh/p/industries.html">Industries</a></li>
            <li><a href="https://project.alum.sh/p/partners.html">Partners</a></li>
            <li><a href="https://project.alum.sh/p/developers.html">Developers</a></li>
            <li><a href="https://project.alum.sh/p/about.html">About</a></li>
            <li><a href="https://project.alum.sh/f/contact.html">Contact</a></li>
            <br>
            <li><a href="https://project.alum.sh/p/about-me.html">About me</a></li>
        </ul>
        <p>&copy; 2024 Oracle. All rights reserved.</p>
    </footer>
</body>
</html>