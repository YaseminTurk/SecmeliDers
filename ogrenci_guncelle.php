<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';


$id=$_GET["ogrenci_id"];

$ogrencisorgu=mysqli_query($baglan,"SELECT * from ogrenci where ogrenci_id='$id'"); 

mysqli_set_charset($baglan, "utf8");

$ogrencicek=mysqli_fetch_array($ogrencisorgu);




?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Öğrenci Profili Düzenle</h1> <br><br>



            </div>
        </div>
        <!-- /. ROW  -->

        <form action="" method="POST" role="form">

            <div class="form-group">
                <label>Öğrenci Numarası</label>
                <input class="form-control" type="integer" name="ogrenci_no" value="<?php echo $ogrencicek['ogrenci_no'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Bölümü</label>

                <?php
                $bolumid=$ogrencicek['bolum_id'];
                $bolumsorgu= mysqli_query($baglan,"SELECT * from bolum where bolum_id='$bolumid'");
                $bolumcek=mysqli_fetch_array($bolumsorgu);
                $bolumad=$bolumcek['bolum_ad'];

                ?>

                <input class="form-control" type="text" name="bolum_id" value="<?php echo $bolumad ?>">
            </div>
            <div class="form-group">
                <label>Bölümü Aşağıdan Seçiniz.</label>
                <select name="bolum_ad" id="bolum_ad">
                    <option value="BİLGİSAYAR MÜHENDİSLİĞİ" >BİLGİSAYAR MÜHENDİSLİĞİ</option>
                    <option value="BİYOMEDİKAL MÜHENDİSLİĞİ"  >BİYOMEDİKAL MÜHENDİSLİĞİ</option>
                    <option value="ELEKTRİK-ELEKTRONİK MÜHENDİSLİĞİ" >ELEKTRİK-ELEKTRONİK MÜHENDİSLİĞİ</option>
                    <option value="MAKİNE MÜHENDİSLİĞİ" >MAKİNE MÜHENDİSLİĞİ</option>
                    <option value="MEKATRONİK MÜHENDİSLİĞİ" >MEKATRONİK MÜHENDİSLİĞİ</option>
                    <option value="METALURJİ VE MALZEME MÜHENDİSLİĞİ" >METALURJİ VE MALZEME MÜHENDİSLİĞİ</option>
                </select></td>

            </div>


            <div class="form-group">
                <label>Öğrenci Ad</label>
                <input class="form-control" type="text" name="ogrenci_ad" value="<?php echo $ogrencicek['ogrenci_ad'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Soyad</label>
                <input class="form-control" type="text" name="ogrenci_soyad" value="<?php echo $ogrencicek['ogrenci_soyad'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Kullanıcı Adı</label>
                <input class="form-control" type="text" name="ogrenci_kadi" value="<?php echo $ogrencicek['ogrenci_kadi'] ?>">
            </div>

            <div class="form-group">
                <label>Öğrenci Şifresi</label>
                <input class="form-control" type="text" name="ogrenci_sifre" value="<?php echo $ogrencicek['ogrenci_sifre'] ?>">
            </div>

            
            <div class="form-group">
                <label>Öğrenci Sınıf</label>
                <input class="form-control" type="text" name="ogrenci_sinif" value="<?php echo $ogrencicek['ogrenci_sinif'] ?>">
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
   $bolum_ad=$_POST['bolum_ad'];

   switch ($bolum_ad)
   {
      case "BİLGİSAYAR MÜHENDİSLİĞİ":
      $sorgu2= mysqli_query($baglan,"SELECT * from bolum where bolum_ad='$bolum_ad'");
      $cek=mysqli_fetch_array($sorgu2);
      $bolum_id=$cek['bolum_id'];
      break;
      case "BİYOMEDİKAL MÜHENDİSLİĞİ":
      $sorgu2= mysqli_query($baglan,"SELECT * from bolum where bolum_ad='$bolum_ad'");
      $cek=mysqli_fetch_array($sorgu2);
      $bolum_id=$cek['bolum_id'];
      break;
      case "ELEKTRİK-ELEKTRONİK MÜHENDİSLİĞİ":
      $sorgu2= mysqli_query($baglan,"SELECT * from bolum where bolum_ad='$bolum_ad'");
      $cek=mysqli_fetch_array($sorgu2);
      $bolum_id=$cek['bolum_id'];
      break;
      case "MAKİNE MÜHENDİSLİĞİ":
      $sorgu2= mysqli_query($baglan,"SELECT * from bolum where bolum_ad='$bolum_ad'");
      $cek=mysqli_fetch_array($sorgu2);
      $bolum_id=$cek['bolum_id'];
      break;
      case "MEKATRONİK MÜHENDİSLİĞİ":
      $sorgu2= mysqli_query($baglan,"SELECT * from bolum where bolum_ad='$bolum_ad'");
      $cek=mysqli_fetch_array($sorgu2);
      $bolum_id=$cek['bolum_id'];
      break;
      case "METALURJİ VE MALZEME MÜHENDİSLİĞİ":
      $sorgu2= mysqli_query($baglan,"SELECT * from bolum where bolum_ad='$bolum_ad'");
      $cek=mysqli_fetch_array($sorgu2);
      $bolum_id=$cek['bolum_id'];
      break;
  }

  $ogrenci_id=$_GET['ogrenci_id'];


  $profil_duzenle_kaydet=mysqli_query($baglan,"UPDATE ogrenci set ogrenci_no='".$_POST['ogrenci_no']."',bolum_id='".$bolum_id."', ogrenci_ad='".$_POST['ogrenci_ad']."', ogrenci_soyad='".$_POST['ogrenci_soyad']."', ogrenci_kadi='".$_POST['ogrenci_kadi']."', ogrenci_sifre='".$_POST['ogrenci_sifre']."', ogrenci_sinif='".$_POST['ogrenci_sinif']."' where ogrenci_id='$id' ");

  if ($profil_duzenle_kaydet) 
  {

    header('Location:ogrenci_islemleri.php');

}
else
{
    echo '<script type="text/javascript">alert("Güncelleme İşlemi Gerçekleştirilemedi. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=ogrenci_islemleri.php" />';
    //header('Location:ogrenci_islemleri.php?durum=no');
}

}


?>


<?php include 'footer.php'; ?>
