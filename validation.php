<?php
    require('config/config.php');
    require('model/functions.fn.php');
    session_start();

    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) &&
        !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!isUsernameAvailable($db, $username)) {
            $_SESSION['message'] = 'Erreur : Username indisponible';
            header('Location: register.php');
            exit;
        }

        if (!isEmailAvailable($db, $email)) {
            $_SESSION['message'] = 'Erreur : Email indisponible';
            header('Location: register.php');
            exit;
        }

        userRegistration($db, $username, $email, $password);

        header('Location: login.php');
    } else {
        $_SESSION['message'] = 'Erreur : Formulaire incomplet';
        header('Location: register.php');
        exit;
    }
?>