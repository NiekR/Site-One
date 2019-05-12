<?php

session_start();

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

    <div class="header">
        <div class="container">
<!--            <a href="#">-->
<!--                <img src="#" alt="#">-->
<!--            </a>-->

           <div class="navbar d-flex align-items-center justify-content-between">
               <div class="nav">
                   <ul class="d-flex list-unstyled" >
                       <li class="mr-4" ><a class="dark-link" href="index.php">Home</a></li>
                       <li class="mr-4" ><a href="#">Portfolio</a></li>
                       <li class="mr-4" ><a href="#">About me</a></li>
                       <li class="mr-4" ><a href="#">Contact</a></li>
                   </ul>
               </div>

               <div class="form pt-2">
                   <?php
                   if(!isset($_SESSION['userName'])) {
                       echo '
                       <form action="includes/login.php" method="post">
                           <div class="d-flex">
                               <div class="form-group mr-2">
                                   <input class="form-control" type="text" name="mailuid" placeholder="Your e-mail">
                               </div>
    
                               <div class="form-group mr-2">
                                   <input class="form-control" type="password" name="pwd" placeholder="Your password" >
                               </div>
    
                               <div class="form-group mr-2">
                                   <button class="btn btn-danger" type="submit" name="login-submit">Login</button>
                               </div>
                           </div>
                       </form>
                    ';
                   }
                   ?>
        </div>

    </div>

</body>