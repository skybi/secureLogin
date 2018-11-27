<?php
/**
 * Created by PhpStorm.
 * User: Onur UYSAL
 * Date: 24.11.2018
 * Time: 12:57
 */

session_start();

if (!empty($_POST['token'])) {
    if (hash_equals($_SESSION['token'], $_POST['token'])) {

        $user = 'root';
        $pass = '';
        $db = 'secure_login';

        $db = new mysqli('localhost', $user, $pass, $db) or die("Baglanti kurulamadi");

//validate e-mail and password
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $email = $_POST['email'];
                $password = $_POST['password'];

                $stmt = $db->prepare('SELECT email, password FROM users WHERE email=? AND password=?');
                $stmt->bind_param('ss',$email, $password );
                $stmt->execute();
                $stmt->store_result();
                $num_rows = $stmt->num_rows;

                if($num_rows>0){

                    $message = "Başarılı giriş yaptınız";
                    $_SESSION['user'] = $email;
                }else {
                    $message = "Email ya da şifreniz hatalı";
                }

                $stmt->free_result();
                $stmt->close();
                $db->close();
            }else {
                $message = ("Geçersiz E-posta");
            }
        } else {
            $message = ("Tüm alanları doldurunuz.");
        }

    } else {
        $message = "UYARI: CSRF token hatası";
    }
    $_SESSION['loginDbMessage'] = $message;
    header("Location: /loginDbPage.php");
}


