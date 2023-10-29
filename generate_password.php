<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password_length'])) {
    $password_length = intval($_POST['password_length']);

    if ($password_length < 8 || $password_length > 16) {
        header('Location: index.php?error=1');
    } else {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+[]{}|;:,.<>';
        $password = '';
        
        $hasLowercase = false;
        $hasUppercase = false;
        $hasNumber = false;
        $hasSpecialChar = false;

        for ($i = 0; $i < $password_length; $i++) {
            $char = $chars[rand(0, strlen($chars) - 1)];
            $password .= $char;

            if (ctype_lower($char)) {
                $hasLowercase = true;
            } elseif (ctype_upper($char)) {
                $hasUppercase = true;
            } elseif (is_numeric($char)) {
                $hasNumber = true;
            } else {
                $hasSpecialChar = true;
            }
        }

        if (!($hasLowercase && $hasUppercase && $hasNumber && $hasSpecialChar)) {
            header('Location: generate_password.php');
        } else {
            session_start();
            $_SESSION['generated_password'] = $password;
            header('Location: display_password.php');
        }
    }
} else {
    header('Location: index.php');
}
