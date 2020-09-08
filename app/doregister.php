<?php
    session_start(); /* Menjalankan fungsi session */
    require 'config.php';
    if(isset($_POST['submit-btn'])){
        $email = strip_tags(htmlspecialchars($_POST['email']));
        $fullname = strip_tags(htmlspecialchars($_POST['fullname']));
        $password = strip_tags(htmlspecialchars($_POST['password']));
        $repassword = strip_tags(htmlspecialchars($_POST['repassword']));
        $check_user = $conn->query("SELECT * FROM users WHERE email = '{$email}'");
        if($check_user->num_rows >= 1):
            $msg['status'] = false;
            $msg['message'] = 'Email has been registered';
        else:
            if($password == $repassword):
                $password = md5($password);
                $regist = $conn->query("INSERT INTO users (fullname, email, password, created_at) VALUES('{$fullname}', '{$email}', '{$password}', NOW())");
                if($regist):
                    $msg['status'] = true;
                    $msg['message'] = 'Account has been registered! wait a sec';
                else:
                    $msg['status'] = false;
                    $msg['message'] = 'Something when wrong!';
                endif;
            else:
                $msg['status'] = false;
                $msg['message'] = 'Password not match';
            endif;
        endif;
        echo json_encode($msg, JSON_PRETTY_PRINT);
    }