<?php
include_once 'header.php';
require_once"inc/mas.php";


//`users_id`, `username`, `users_email`, `users_password`, `users_phone`, `users_station`, `users_type`, `users_status`

 $message = $errors[0];

if(isset($_POST['add'])){

    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $station  = $_POST['station'];
    $phone    = $_POST['phone'];
    $userstype= $_POST['user_type'];

       // check if input empty
    if ($username =="" || $email =="" || empty($password) || $phone=="" || empty($station) || $userstype =="")
       $message = $errors[2];
    else {
          $sql="insert into users (`username`,users_email,users_password,users_phone,users_station,users_type,users_status)
          VALUES ('{$username}','{$email}','{$password}','{$phone}','{$station}','{$userstype}','0')";
                                                                                          // 0 = not acitve yet
         $result=mysql_query($sql);
         if($result) $message = $errors[1];
         sleep(1);
         header('Refresh:3; URL=register');

    }

}


?>
<body>
<div class="container" style="margin-bottom:110px; margin-top:60px;">
<?=$message;?>
 <div class="panel  text-center">
 <div calss='panel_body'>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal"  action="<?php $_SERVER["PHP_SELF"]?>" method="POST">
                <h1 class="text-center" style="color:#006E75">Create New Account </h1>
                <hr>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" style="color:#EE6759" for="name-input-field">Name </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control input-sm" style="color:#EE6759" id ="username" name="username" type="text" placeholder="username">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" style="color:#EE6759" for="email-input-field">Email </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control input-sm" style="color:#EE6759" id ="email" name="email"  type="email" placeholder="example@domain.com">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label"  style="color:#EE6759" for="pawssword-input-field">Password </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" style="color:#EE6759" id ="password" name="password" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" style="color:#EE6759" >Phone </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control input-sm"  style="color:#EE6759" id ="phone " name="phone" type="phone" placeholder="05 ####-####">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" style="color:#EE6759"> Address </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control input-sm" style="color:#EE6759" id ="station" name="station" type="text " placeholder="address/station ">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" style="color:#EE6759"> Your type </label>
                    </div>
                    <div class="col-sm-4">
                <select name="user_type" class="form-control">
                  <option value=""></option>
                  <option value="1" >HCP admin</option>
                  <option value="2"> HCP employee</option>
                  <option value="3">Suppiler employee</option>
                </select>

                    </div>
                </div>
               
                <button  type="submit" class="btn btn-success" name="add" style="background:#006E75;" >Create Account </button>
                <br><br>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
<?php


include 'footer.php';

?>
