<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';
?>

<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-head-line">Öğrenci Ekle</h1> <br><br>

				


				<form action="" method="POST" role="form">

					
         <div class="form-group">
           <label>Öğrenci Bölümü</label>
           <!-- <input class="form-control" type="text" name="bolum_id" value=""> -->
           <select name="bolum_ad" id="bolum_ad">
            <option value="BİLGİSAYAR MÜHENDİSLİĞİ" selected="selected">BİLGİSAYAR MÜHENDİSLİĞİ</option>
            <option value="BİYOMEDİKAL MÜHENDİSLİĞİ">BİYOMEDİKAL MÜHENDİSLİĞİ</option>
            <option value="ELEKTRİK-ELEKTRONİK MÜHENDİSLİĞİ" selected="selected">ELEKTRİK-ELEKTRONİK MÜHENDİSLİĞİ</option>
            <option value="MAKİNE MÜHENDİSLİĞİ">MAKİNE MÜHENDİSLİĞİ</option>
            <option value="MEKATRONİK MÜHENDİSLİĞİ" selected="selected">MEKATRONİK MÜHENDİSLİĞİ</option>
            <option value="METALURJİ VE MALZEME MÜHENDİSLİĞİ">METALURJİ VE MALZEME MÜHENDİSLİĞİ</option>
          </select></td>
        </div>

        <div class="form-group">
          <label>Öğrenci Numarası</label>
          <input class="form-control" type="integer" name="ogrenci_no" value="">
        </div>

        <div class="form-group">
          <label>Öğrenci Ad</label>
          <input class="form-control" type="text" name="ogrenci_ad" value="">
        </div>

        <div class="form-group">
          <label>Öğrenci Soyad</label>
          <input class="form-control" type="text" name="ogrenci_soyad" value="">
        </div>

        <div class="form-group">
          <label>Öğrenci Kullanıcı Adı</label>
          <input class="form-control" type="text" name="ogrenci_kadi" value="">
        </div>

        <div class="form-group">
          <label>Öğrenci Şifresi</label>
          <input class="form-control" type="text" name="ogrenci_sifre" value="">
        </div>

        <div class="form-group">
         <label>Öğrenci Sınıf</label>
         <input class="form-control" type="integer" name="ogrenci_sinif" value="">
       </div>



       <center><button style="width: 100%" type="submit" name="ogr_ekle" class="btn btn-primary">Ekle</button></center>  <br>

     </form>


   </div>
 </div>
 <!-- /. ROW  -->


</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->



<?php 

if(isset($_POST['ogr_ekle']))
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

$ogrenci_no=$_POST['ogrenci_no'];
$ogrenci_ad=$_POST['ogrenci_ad'];
$ogrenci_soyad=$_POST['ogrenci_soyad'];
$ogrenci_kadi=$_POST['ogrenci_kadi'];
$ogrenci_sifre=$_POST['ogrenci_sifre'];
$ogrenci_sinif=$_POST['ogrenci_sinif'];


$sorgu= mysqli_query($baglan,"SELECT ogrenci_no from ogrenci where ogrenci_no='$ogrenci_no'");
$say=mysqli_num_rows($sorgu);


if ($say<1) 
{

  $ogrenciekle= mysqli_query($baglan,"INSERT into ogrenci (bolum_id,ogrenci_no,ogrenci_ad,ogrenci_soyad,ogrenci_kadi,ogrenci_sifre,ogrenci_sinif) VALUES ('".$bolum_id."','".$ogrenci_no."','".$ogrenci_ad."','".$ogrenci_soyad."','".$ogrenci_kadi."','".$ogrenci_sifre."','".$ogrenci_sinif."') ");

       if ($ogrenciekle) //kayıt başarılıysa
       {
       	header('Location:ogrenci_islemleri.php');

       }
       else
       {
        echo '<script type="text/javascript">alert("Öğrenci Eklenemedi. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=ogrenci_ekle.php" />';
       	//header('Location:ogrenci_islemleri.php?durum=no');
       }

     }

     else
     {
      echo '<script type="text/javascript">alert("Bu Öğrenci Numarası Kayıtlı Bir Öğrenci Var. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=ogrenci_ekle.php" />';
      //header('Location:ogrenci_islemleri.php?durum=no');
    }
}


?>



<?php include 'footer.php'; ?>
