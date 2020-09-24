<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';

$kadi=$_SESSION['ogrenci_kadi'];
$ogrid=mysqli_query($baglan,"SELECT * FROM ogrenci where ogrenci_kadi='$kadi' ");
$cek=mysqli_fetch_array($ogrid);
$id=$cek["ogrenci_id"]; //giriş yapan öğrencinin id si çekildi.

$ogrencisorgu=mysqli_query($baglan,"SELECT * from ogrenci where ogrenci_id='$id'"); 

mysqli_set_charset($baglan, "utf8");

$ogrencicek=mysqli_fetch_array($ogrencisorgu);




?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Profili Düzenle</h1> <br><br>



            </div>
        </div>
        <!-- /. ROW  -->

        <form action="" method="POST" role="form">

            

            <div class="form-group">
                <label>Öğrenci Kullanıcı Adı</label>
                <input class="form-control" type="text" name="ogrenci_kadi" value="<?php echo $ogrencicek['ogrenci_kadi'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Şifresi</label>
                <input class="form-control" type="text" name="ogrenci_sifre" value="<?php echo $ogrencicek['ogrenci_sifre'] ?>">
            </div>
        


            <center><button style="width: 100%" type="submit" name="profil_duzenle_kaydet" class="btn btn-primary">Kaydet</button></center>  <br>

        </form>


    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->


<?php 

if(isset($_POST['profil_duzenle_kaydet']))
{
    $ogrenci_id=$_GET['ogrenci_id'];
    $profil_duzenle_kaydet=mysqli_query($baglan,"UPDATE ogrenci set  ogrenci_kadi='".$_POST['ogrenci_kadi']."', ogrenci_sifre='".$_POST['ogrenci_sifre']."'  where ogrenci_id='$id' ");

    if ($profil_duzenle_kaydet) 
    {
        $_SESSION['ogrenci_kadi']=$_POST['ogrenci_kadi'];
        header('Location:profil_duzenle.php?');

    }
    else
    {
        echo '<script type="text/javascript">alert("Profil Düzenlenemedi. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=profil_duzenle.php" />';
        //header('Location:profil_duzenle.php?durum=no');
    }

}


?>


<?php include 'footer.php'; ?>
