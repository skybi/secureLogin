<?php
/**
 * Created by PhpStorm.
 * User: Onur UYSAL
 * Date: 24.11.2018
 * Time: 12:57
 */

session_start();

$userEmail="deneme@deneme.com";
$userPassword="123456";

if (!empty($_POST['token'])) {
    if (hash_equals($_SESSION['token'], $_POST['token'])) {

//validate e-mail and password
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                $email = $_POST['email'];
                $password = $_POST['password'];
                if($userEmail == $email && $userPassword == $password){
                    $message = "Başarılı Giriş Yaptınız.";
                    $_SESSION['user'] = $email;
                }else {
                    $message = "Email ya da şifreniz hatalıdır.";
                }

            }else {
                $message = ("Geçersiz E-posta");
            }
        } else {
            $message = ("Tüm alanları doldurunuz.");
        }
    } else {
        $message = "UYARI: CSRF token hatası";
    }
    $_SESSION['loginMessage'] = $message;
    header("Location: /loginWithoutDbPage.php");
}


