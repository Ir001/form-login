<?php
    session_start(); /* Menjalankan fungsi session */
    if(empty($_SESSION['users'])): /* Mengecek apakah user sudah login?  */
        header('Location:index.php'); /* Mengarahkan user jika belum login */
    endif;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antonio - Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha512-MoRNloxbStBcD8z3M/2BmnT+rg4IsMxPkXaGh2zD6LGNNFE80W3onsAhRcMAMrSoyWL9xD7Ert0men7vR8LUZg==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <a href="logout.php" class="float-right small">Logout</a>
                <h1 class='h3'>Welcome back, <?=$_SESSION['users']['fullname']?></h1>
                <p class="alert alert-info">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur commodi debitis tenetur consequuntur, quis voluptate rem dicta exercitationem dolorem cupiditate ea optio molestiae veniam ratione sint eos reprehenderit quidem expedita.
                </p>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha512-M5KW3ztuIICmVIhjSqXe01oV2bpe248gOxqmlcYrEzAvws7Pw3z6BK0iGbrwvdrUQUhi3eXgtxp5I8PDo9YfjQ==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
</body>
</html>