<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';


$ders_id=$_GET['ders_id'];
$derssorgu=mysqli_query($baglan,"SELECT * from dersler where ders_id='$ders_id' "); 

mysqli_set_charset($baglan, "utf8");
$derscek=mysqli_fetch_array($derssorgu);




?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Dersi Düzenle</h1> <br><br>




                

            </div>
        </div>
        <!-- /. ROW  -->

        <form action="" method="POST" role="form">
            <div class="form-group">
                <label>Dersin Bölümü</label>

                <?php
                $bolumid=$derscek['bolum_id'];
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
                <label>Ders Kodu</label>
                <input class="form-control" type="integer" name="ders_kodu" value="<?php echo $derscek['ders_kodu'] ?>">

            </div>
            <div class="form-group">
                <label>Ders Adı</label>
                <input class="form-control" type="text" name="ders_ad" value="<?php echo $derscek['ders_ad'] ?>">

            </div>
            <div class="form-group">
                <label>Ders Dönem</label>
                <input class="form-control" type="integer" name="ders_donem" value="<?php echo $derscek['ders_donem'] ?>">
            </div>
            <div class="form-group">
                <label>Ders Akts</label>
                <input class="form-control" type="integer" name="ders_akts" value="<?php echo $derscek['ders_akts'] ?>">
            </div>
            <div class="form-group">
                <label>Ders Kontenjan</label>
                <input class="form-control" type="integer" name="ders_kontenjan" value="<?php echo $derscek['ders_kontenjan'] ?>">
            </div> <br>

            <center><button style="width: 100%" type="submit" name="btn_duzenle_kaydet" class="btn btn-primary">Kaydet</button></center>  <br>

        </form>


    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->


<?php 


if(isset($_POST['btn_duzenle_kaydet']))
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
  $ders_id=$_GET['ders_id'];
  $btn_duzenle_kaydet=mysqli_query($baglan,"UPDATE dersler set bolum_id='".$bolum_id."', ders_kodu='".$_POST['ders_kodu']."', ders_ad='".$_POST['ders_ad']."', ders_donem='".$_POST['ders_donem']."', ders_akts='".$_POST['ders_akts']."', ders_kontenjan='".$_POST['ders_kontenjan']."' where ders_id='$ders_id' ");

  if (mysqli_affected_rows()) 
  {

    header('Location:ders_islemleri.php');

}
else
{
    header('Location:ders_islemleri.php?durum=no');
}

}


?>


<?php include 'footer.php'; ?>
