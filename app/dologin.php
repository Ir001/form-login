<?php
    session_start(); /* Menjalankan fungsi session */
    require 'config.php';
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = strip_tags(htmlspecialchars($_POST['email']));
        $password = strip_tags(htmlspecialchars(md5($_POST['password'])));
        $check_user = $conn->query("SELECT * FROM users WHERE email = '{$email}'");
        if($check_user->num_rows >= 1):
            $data = $check_user->fetch_assoc();
            if($data['password'] == $password):
                $_SESSION['users'] = $data;
                $msg['status'] = true;
                $msg['message'] = 'Login successfully! wait a second';
            else:
                $msg['status'] = false;
                $msg['message'] = 'Wrong password!';
            endif;
        else:
            $msg['status'] = false;
            $msg['message'] = 'Email not available';
        endif;
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }