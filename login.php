<?php 
session_start();
include('library.php');
$lib = new Library();

            if(isset($_POST['login'])){ -->
    
                //Retrieve the field values from our login form.
                $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
                $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
                $salt = "CrazyassLongSALTThatMakesYourUsersPasswordVeryLong123!!312567__asdSdas";
                $password = hash('sha256', $salt.$password);
                $loginform = $lib->login($username);

                If $row is FALSE.
                if($loginform === false){
                    //Could not find a user with that username!
                    //PS: You might want to handle this error in a more user-friendly manner!
                    echo $password;
                    die('Incorrect username / password combination!');
                   
                } else{
                    //User account found. Check to see if the given password matches the
                    password hash that we stored in our users table.
                    
                    //Compare the passwords.
                    $validPassword = password_verify($password, $loginform['password']);
                    
                    If $validPassword is TRUE, the login has been successful.
                    if($password == $loginform['password']){
                        
                        Provide the user with a login session.
                        $_SESSION['logged_in'] = true; //set you've logged in
                        $_SESSION['last_activity'] = time(); //your last activity was now, having logged in.
                        $_SESSION['expire_time'] = 60*60; //expire time in seconds: three hours (you must change this)
                        $_SESSION['user_id'] = $loginform['userid'];
                        
                        //Redirect to our protected page, which we called home.php
                        header('Location: admin.php');
                        exit;
                        
                    } else{
                        $validPassword was FALSE. Passwords do not match.
                        echo "passwod salah";
                        echo $password;
                        die('Incorrect username / password combination!');
                        
                    }
                }
                
            }


?> 
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" type="image/png" href="img/mb_logo.png">
        <title>PAB MB UGM 2020</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    </head>
<body style="padding-top: 75px;">
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light" style="padding-top: 5px;padding-bottom: 5px;">
        <div class="container">
            <a class="navbar-brand" href="index.html" style=" padding: 0px;">
                <img src="img/mb_logo.png" alt="logo mb" style="height: 40px;">
            </a>
            <button class="navbar-toggler mt-1" type="button" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-start ml-lg-2 ml-0">
                <span class="navbar-text py-0 px-lg-2" style="font-weight: 475;font-size: 19px;">Admin</span>
                <span class="navbar-text py-0 px-lg-2" style="font-weight: 350;font-size: 12px;margin-top: -2px;">PAB MB UGM 2020</span>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Login</h3>
            </div>
            <div class="card-body">
            <form method="post" action="">
                <div class="form-group row">
                    <label for="username" class="col-sm-2 col-form-label">username</label>
                    <div class="col-sm-10">
                    <input type="text" name="username" class="form-control" id="username">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-2 col-form-label">password</label>
                    <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="password">
                    </div>
                </div>
                
                    <input type="submit" name="login" class="btn btn-primary" value="login">
                    
                
            </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    </body>
</html>