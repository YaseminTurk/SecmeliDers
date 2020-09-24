<?php 
include "baglan.php";
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Giriş</title>

  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <style>
  </style>
</head>
<body >
  <div class="container">
    <div class="row text-center " style="padding-top:100px;">
      <div class="col-md-12">
        <center><img width="400" height="200" src="images/logo.jpg" /></center>

      </div>
    </div>
    <div class="row ">

      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">

        <div class="panel-body">
          <center>
            <form action="" method="POST" role="form">
              <hr /><hr>
              <h2>Giriş</h2>
              <br />

              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                <input type="text" name="kadi" class="form-control" placeholder="Kullanıcı Adınız " />
              </div> <br>
              <div class="form-group input-group">
                <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                <input type="password" name="sifre" class="form-control"  placeholder="Şifreniz" />
              </div>

              <br>
              <br>

              <button style="width: 100%" type="submit" name="giris" class="btn btn-primary">GİRİŞ</button> <br> 

            </form>
          </center>
          
        </div>


<?php 

if(isset($_POST['giris']))
{

  $kadi=$_POST['kadi'];
  $sifre=$_POST['sifre'];
  
    if ($kadi && $sifre) 
    {
      //kullanıcı adı ve şifrenin hangi tabloda olduğunu bulduk
      $sorgula1= mysqli_query($baglan,"SELECT * from admin where admin_kadi='$kadi' and admin_sifre='$sifre'"); 
      $verisay1=mysqli_num_rows($sorgula1); //eğer kayıt varsa kaç tane kayıt olduğunu döndürür.
      $sorgula2= mysqli_query($baglan,"SELECT * from ogrenci where ogrenci_kadi='$kadi' and ogrenci_sifre='$sifre'");
      $verisay2=mysqli_num_rows($sorgula2); //eğer kayıt varsa kaç tane kayıt olduğunu döndürür.


      if ($verisay1>0) 
      {
        $_SESSION['admin_kadi']=$kadi;
        header('Location:index.php');
      }
      else if ($verisay2>0)
      {
        $_SESSION['ogrenci_kadi']=$kadi;
        header('Location:index.php');
      }
      else
      {
        echo '<script type="text/javascript">alert("Kullanıcı Adı veya Şifre Hatalı Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=login.php" />';
        //header('Location:login.php');
      }

    }
    else
    {
      echo '<script type="text/javascript">alert("Kullanıcı Adı ve Şifre Değerlerini Giriniz.");</script> <meta http-equiv="refresh" content="0;URL=login.php" />';
      //header('Location:login.php');
    }

}

?>



      </div>


    </div>
  </div>

</body>
</html>
