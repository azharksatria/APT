<?php
include'config/controller.php';
if(isset($_SESSION['login_adminapt'])){
  header("Location: index.php");
}else{
include'sweetalert/sweetalert.php';
if(isset($_GET['error']))
{
  echo "<script>swal('Opss..','Password atau Username Salah','error')</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">

    <title>APT UMA - Universitas Medan Area</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    html{
      /*background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);
      background: -webkit-linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);*/
      background: linear-gradient(to bottom, #AAE7FF, #84DCFF);
      background: -webkit-linear-gradient(to bottom, #AAE7FF, #84DCFF);
      height: 100%
    }
.login-block{
float:left;
width:100%;
padding : 77.5px 0;
}
.form-group{margin-bottom: 1.5rem;}
.container{background:#fff;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 75px 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:50px; font-size:24px; letter-spacing: 2px;}
.login-sec h2:after{content:" "; width:100px; height:2px; background:#000; display:block; margin-top:20px;  margin-left:auto;margin-right:auto}
.btn-login{background: #DE6262; color:#fff; font-weight:600;}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}
    </style>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />');
            else $('head > link').filter(':first').replaceWith(defaultCSS);
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height());
          window.parent.postMessage( iframe_height, 'https://bootsnipp.com');
        });
    </script>
</head>
<body>
    <section class="login-block" style="padding-left: 25px; padding-right: 25px;">
    <div class="container">
    <div class="row" style="box-shadow: 0 0 20px 0 rgba(0,0,0,.2), 0 5px 5px 0 rgba(0,0,0,.24);">
        <div class="col-md-4 login-sec">
            <h2 class="text-center"><b style="color: #84DCFF;">Login</b> - APT</h2>
            <form class="login-form" method="POST" action="root/proses_login.php?aksi=cek_login">
              <div class="form-group">

                <input type="text" name="username" id="username" class="form-control" style="border-radius: 0; border: 0; background-color: #f2f2f2;" placeholder="Username" required>
              </div>
              <div class="form-group">

                <input type="password" name="password" password="password" class="form-control" style="border-radius: 0; border: 0; background-color: #f2f2f2;" placeholder="Password" required>
              </div>


                <div class="form-check" style="padding: 10px 0;">
                <button type="submit" name="submit" id="submit" class="btn btn-login" style="width: 100%;border-radius:  0;background: #35E1D5; padding: 10px; letter-spacing: 1px; font-size: 14px;"><i class="fas fa-sign-in-alt"></i> LOGIN</button>
              </div>

            </form>
<div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="http://pdai.uma.ac.id">PDAI - UMA</a></div>
        </div>
        <div class="col-md-8 banner-sec" style="padding: 0;">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="images/1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">

  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="images/2.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">

    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="images/3.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">

    </div>
  </div>
            </div>

        </div>
    </div>
</div>
</section>
<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
<!-- <script type="text/javascript">
    $(document).ready(function (a) {
    $(".login-form").on('submit',(function(a) {
    a.preventDefault();
    $.ajax({
    url: "root/proses_login.php?aksi=cek_login",
    type: "POST",
    data:  new FormData(this),
    contentType: false,
    cache: false,
    processData:false,

    success: function(){

  swal("berhasil","","success")
    }
    success: function(){

  swal("berhasil","","success")
    }
    });
    }));
    });
</script> -->
<!-- <script>
$(document).ready(function(){
    $("#submit").click(function(){
        var username = $("#username").val().trim();
        var password = $("#password").val().trim();

        if( username != "" && password != "" ){
            $.ajax({
                url:'root/proses_login.php?aksi=cek_login',
                type:'post',
                data:{username:username,password:password},
                success:function(response){
                    var msg = "";
                    if(response == 1){
                        window.location = "home.php";
                    }else{
                        msg = "Invalid username and password!";
                    }
                    $("#message").html(msg);
                }
            });
        }
    });
});
</script> -->
</body>
</html>
<?php } ?>
