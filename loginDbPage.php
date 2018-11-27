<?php
session_start();
if (empty($_SESSION['token'])) {
    try {
        $_SESSION['token'] = bin2hex(random_bytes(32));
        $token = $_SESSION['token'];
    }catch (Exception $e){
        echo $e->getMessage();
    }
}else {
    if(array_key_exists('user', $_SESSION)){
        echo $_SESSION['user']." maili ile giriş yaptınız.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body class="background">
<?php if(!array_key_exists('user', $_SESSION)): ?>
<div class="center-form">
    <h3>Database Bağlantısıyla Giriş Yap</h3>
    <form name="loginForm" action="loginWithDb.php" method="post" onsubmit="return checkValidation()">
        <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>">
        <table class="form-table">
            <tr>
                <td><span>E-posta: </span></td>
                <td><input placeholder="E-posta" name="email"></td>
            </tr>
            <tr>
                <td></td>
                <td><span class="validation" id="emailValidation"></span></td>
            </tr>
            <tr>
                <td><span>Şifre: </span></td>
                <td><input placeholder="Şifre" type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td><span class="validation" id="passwordValidation"></span></td>
            </tr>
            <tr>
                <td><button type="submit">GİRİŞ</button></td>
                <?php if(array_key_exists('loginDbMessage', $_SESSION)): ?>
                <td><?php echo $_SESSION['loginDbMessage'] ?></td>
                <?php endif; ?>
            </tr>
        </table>
    </form>
</div>
<?php else: ?>
<div>
    <form name="logoutForm" action="logout.php" method="post">
        <button type="submit">Çıkış Yap</button>
    </form>
</div>
<?php endif; ?>

<script src="login.js"></script>

</body>
</html>