<?php
$id = md5(rand(6000,PHP_INT_MAX));
?>
<?
include('geturl.php');
?>
<?php
session_start();

if(isset($_POST['lang']) && !empty($_POST['lang'])){
 $_SESSION['lang'] = $_POST['lang'];

 if(isset($_SESSION['lang']) && $_SESSION['lang'] != $_POST['lang']){
  echo "<script type='text/javascript'> location.reload(); </script>";
 }
}

if(isset($_SESSION['lang'])){
 include "lang_".$_SESSION['lang'].".php";
}else{
 include "lang_en.php";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?= _TITLE ?></title>
<script>
 function changeLang(){
  document.getElementById('form_lang').submit();
 }
</script>
<script src="jquery-1.9.1.js"></script>
<script src="bootstrap.min.js"></script>
<style type="text/css">
	body {
	background-image: url('background.png');
		font-family: Verdana, Arial;
		font-size: 10pt;
		margin-left: 10px;
		padding-left: 3px;
		padding-bottom: 0px;
	}
		
	h2 {
		border-bottom: 1px solid darkgray;
	}
</style>
<script>
            $(function() {
 
                if (localStorage.chkbx && localStorage.chkbx != '') {
                    $('#remember_me').attr('checked', 'checked');
                    $('#save_uname').val(localStorage.usrname);
                    $('#save_passwd').val(localStorage.pass);
                } else {
                    $('#remember_me').removeAttr('checked');
                    $('#save_uname').val('');
                    $('#save_passwd').val('');
                }
 
                $('#remember_me').click(function() {
 
                    if ($('#remember_me').is(':checked')) {
                        localStorage.usrname = $('#save_uname').val();
                        localStorage.pass = $('#save_passwd').val();
                        localStorage.chkbx = $('#remember_me').val();
                    } else {
                        localStorage.usrname = '';
                        localStorage.pass = '';
                        localStorage.chkbx = '';
                    }
                });
            });
 
        </script>
<script>
function ShowUsername() {
  var x = document.getElementById("save_uname");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
<script>
function ShowPassword() {
  var x = document.getElementById("save_passwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"> 
<link href="bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">

<nav class="navbar navbar-light bg-light">
  <br><br><div class="alert alert-light order-first">
  <h2><b><img src="/home.svg"></img>&nbsp;<?echo $yourdomain;?></b></h2>
</div>
<div class="form-inline"> 
<form method='POST' action='' id='form_lang'> 
<span class="input-group-text"><img src="/lang.svg"></img>&nbsp;<select class="btn btn-light" onchange='changeLang();' name="lang">
<option <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'en'){ echo 'selected=selected'; } else echo ''; ?> value="en"><small>Eng</small></option>
<option <?php if(isset($_SESSION['lang']) && $_SESSION['lang'] == 'ka'){ echo 'selected=selected'; } else echo ''; ?> value="ka"><small>ქარ</small></option>
</select></span>
</form></div>
</nav></div>

<div class="container"><center><div class="alert alert-success" role="alert">
  <h4 class="alert-heading"><?= _WHAT_IS_THIS ?></h4>
  <hr>
  <p class="mb-0"><?= _ABOUT_THIS_WEBSITE ?></p>
</div></center><div class="row">
<div class="col-md-6"><p>
<form action="http://cpanel.<?echo $yourdomain;?>/login.php" method="post" name="login" >
<div class="card">
  <center><h5 class="card-header"><?= _SITE_MANAGEMENT ?></h5></center>
  <div class="card-body">
    <p class="card-text">
     <p><center><img src="cpanel.svg" style="max-width:110px;height:auto;"></center></p>
<p><div class="input-group mb-3"><span class="input-group-text"><img src="/user.svg"></img></span><input class="form-control" placeholder="<?= _USERNAME ?>" name="uname" type="password" alt="username" id="save_uname" oninvalid="this.setCustomValidity('Enter username')" oninput="setCustomValidity('')" required>
<div class="input-group-append">
<span class="input-group-text">
    <input type="checkbox" class="btn-check" id="btn-check-outlined-username" autocomplete="off" onclick="ShowUsername()"> <label for="btn-check-outlined-username">&nbsp;<img src="/show.svg"></img><?= _SHOW ?></label></span>
</div></div>
</p>
<p><div class="input-group mb-3"><span class="input-group-text"><img src="/pass.svg"></img></span><input class="form-control" placeholder="<?= _PASSWORD ?>" type="password" name="passwd" alt="password" id="save_passwd" oninvalid="this.setCustomValidity('Enter password')" oninput="setCustomValidity('')" required>  <div class="input-group-append">
<span class="input-group-text">
    <input type="checkbox" class="btn-check" id="btn-check-outlined-paasword" autocomplete="off" onclick="ShowPassword()"> <label for="btn-check-outlined-paasword">&nbsp;<img src="/show.svg"></img><?= _SHOW ?></label></span>
</div></div>
</p>
<center><p><input type="submit" name="Submit" value="<?= _SIGNIN ?>" class="btn btn-primary"/> <input class="btn-check" type="checkbox" id="remember_me"><label class="btn btn-outline-success" for="remember_me"><?= _REMEMBER ?></label>
</p>
<hr>
<p><a href="http://cpanel.<?echo $yourdomain;?>/lostpassword.php" class="btn btn-secondary btn-sm"><?= _LOST_YOUR_PASSWORD ?></a></p>
</center>
</form></p></div></div>
</div>

<div class="col-md-6"><p>
<form method=post action="http://order.<?echo $yourdomain;?>/register2.php">
<div class="card">
  <center><h5 class="card-header"><?= _REGISTRATION ?></h5></center>
  <div class="card-body">
    <p class="card-text">
<div class="input-group mb-3">
<span class="input-group-text"><img src="/url.svg"></img></span><input class="form-control" placeholder="<?= _SUBDOMAIN ?>" type=text name=username value="" pattern="[a-z0-9]{4,16}" maxlength="16" oninvalid="this.setCustomValidity('Enter subdomain')" oninput="setCustomValidity('')" required>
  <div class="input-group-append">
    <span class="input-group-text">.<?echo $yourdomain;?></span>
  </div>
</div>
<p><div class="input-group mb-3"><img class="input-group-text" src="/pass.svg"></img><input class="form-control" placeholder="<?= _PASSWORD ?>" type=password name=password pattern=".{6,16}" maxlength="16" oninvalid="this.setCustomValidity('Enter password')" oninput="setCustomValidity('')" required></div></p>	
<p><div class="input-group mb-3"><img class="input-group-text" src="/email.svg"></img><input class="form-control" placeholder="<?= _EMAIL ?>" type=text name=email pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="" oninvalid="this.setCustomValidity('Enter e-mail address')" oninput="setCustomValidity('')" required></div></p>
<input type=hidden name=id value="<?PHP echo $id; ?>">
<p><div class="input-group d-flex justify-content-center"><img class="img-thumbnail" src="http://order.<? echo $yourdomain;?>/image.php?id=<?PHP echo $id; ?>"><div class="input-group-append d-flex justify-content-center">
    <span class="input-group-text"><img src="/code.svg"></img></span><input class="form-control" placeholder="<?= _CODE ?>" type=text pattern=".{5,5}" name=number oninvalid="this.setCustomValidity('Enter security code')" oninput="setCustomValidity('')" required>
</div>
</div></p>
<center><p><button type="submit" class="btn btn-primary"><?= _SIGNUP ?></button></p></center>
</form></p></div></div></div></div>
<br>
<br><nav class="navbar fixed-bottom navbar-light bg-light">
<div class="container">
<small><span class="badge rounded-pill bg-secondary"> &copy; 2023 <?echo $yourdomain;?></span></small>
<?php include 'stat.php'; ?>
</div>
</nav>
</body>
</html>

