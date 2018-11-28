<!DOCTYPE html>
<html lang="en" class="index-page">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>

        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body class="index-body">
        <div class="row">
            <div class="login-db  center-button">
                <button onclick="location.href='/loginDbPage.php'" value="Open Login Page">Database Bağlantılı Giriş</button>
            </div>
            <div class="login-no-db center-button">
                <button onclick="location.href='/loginWithoutDbPage.php'" value="Open Login Page">Database Bağlantısız Giriş</button>
            </div>
        </div>

        <script src="login.js"></script>
    </body>
</html>