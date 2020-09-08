<?php
    session_start(); /* Menjalankan fungsi session */
    if(isset($_SESSION['users'])):
        header('Location:dashboard.php'); /* Mengarahkan user jika sudah login */
    endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antonio - Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 mx-auto mt-5 pt-5">
                <div class="card mt-5">
                    <div class="card-header bg-primary text-white">
                        Welcome back!
                    </div>
                    <div class="card-body">
                        <form id="dologin" method="post" action="app/dologin.php">
                            <div class="my-2">
                                <label for="email" class="form-label">Email</label>
                                <!-- Default irwan@gmail.com -->
                                <input type="text" name="email" id="email" class="form-control form-control-sm" placeholder="youremail@domain.com" required>
                            </div>
                            <div class="my-2">
                                <label for="password" class="form-label">Password</label>
                                <!-- Default irwan123 -->
                                <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Password" minlength="6" required>
                            </div>
                            <div class="my-2">
                                <p class="small"><small><a href="#">Forgot Password?</a></small></p>
                                <p class="small float-right"><small><a href="register.php">Don't have account?</a></small></p>
                                <button type="submit" name="submit-btn" class="btn btn-sm btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha512-M5KW3ztuIICmVIhjSqXe01oV2bpe248gOxqmlcYrEzAvws7Pw3z6BK0iGbrwvdrUQUhi3eXgtxp5I8PDo9YfjQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $('#dologin').submit(function(e){
            e.preventDefault();
            $('button[name=submit-btn]').html('Proccessing');
            $('button[name=submit-btn]').attr('disabled');
            setTimeout(() => {
                $.ajax({
                    url : $(this).attr('action'),
                    type : $(this).attr('method'),
                    data : $(this).serialize(),
                    dataType : 'json',
                    success : function(data){
                        if(data.status){
                            toastr['success'](data.message);
                            setTimeout(() => {
                                window.location.href="dashboard.php";
                            }, 1000);
                        }else{
                            toastr['error'](data.message);
                        }
                        $('button[name=submit-btn]').html('Login');
                        $('button[name=submit-btn]').attr('disabled', false);
                    }
                })
            }, 500);
        })
    </script>
</body>
</html>