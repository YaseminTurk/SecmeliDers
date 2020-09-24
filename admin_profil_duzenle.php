<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';

$admin=$_SESSION['admin_kadi'];
$adminid=mysqli_query($baglan,"SELECT * FROM admin where admin_kadi='$admin' ");
$cek=mysqli_fetch_array($adminid);
$id=$cek["admin_id"];

$adminsorgu=mysqli_query($baglan,"SELECT * from admin where admin_id='$id'"); 

mysqli_set_charset($baglan, "utf8");

$admincek=mysqli_fetch_array($adminsorgu);


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
                <label>Ad</label>
                <input class="form-control" type="text" name="admin_ad" value="<?php echo $admincek['admin_ad'] ?>">
            </div>

            <div class="form-group">
                <label>Soyad</label>
                <input class="form-control" type="text" name="admin_soyad" value="<?php echo $admincek['admin_soyad'] ?>">
            </div>

            <div class="form-group">
                <label>Kullanıcı Adı</label>
                <input class="form-control" type="text" name="admin_kadi" value="<?php echo $admincek['admin_kadi'] ?>">
            </div>

            <div class="form-group">
                <label>Şifresi</label>
                <input class="form-control" type="text" name="admin_sifre" value="<?php echo $admincek['admin_sifre'] ?>">
            </div>

            
            <br>


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
    $profil_duzenle_kaydet=mysqli_query($baglan,"UPDATE admin set admin_ad='".$_POST['admin_ad']."', admin_soyad='".$_POST['admin_soyad']."', admin_kadi='".$_POST['admin_kadi']."', admin_sifre='".$_POST['admin_sifre']."' where admin_id='$id' ");

    if ($profil_duzenle_kaydet) 
    {
        $_SESSION['admin_kadi']=$_POST['admin_kadi'];
        header('Location:admin_profil_duzenle.php?');

    }
    else
    {
        echo '<script type="text/javascript">alert("Profil Güncellenemedi. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=admin_profil_duzenle.php" />';
        //header('Location:admin_profil_duzenle.php?durum=no');
    }

}


?>


<?php include 'footer.php'; ?>
