<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';
?>

<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-head-line">Ders Ekle</h1> <br><br>

				


				<form action="" method="POST" role="form">

					<div class="form-group">
           <label>Desin Bölümü</label>
           <!-- <input class="form-control" type="text" name="bolum_id" value=""> -->
           <select name="bolum_ad" id="bolum_ad">
            <option value="BİLGİSAYAR MÜHENDİSLİĞİ" selected="selected">BİLGİSAYAR MÜHENDİSLİĞİ</option>
            <option value="BİYOMEDİKAL MÜHENDİSLİĞİ">BİYOMEDİKAL MÜHENDİSLİĞİ</option>
            <option value="ELEKTRİK-ELEKTRONİK MÜHENDİSLİĞİ" >ELEKTRİK-ELEKTRONİK MÜHENDİSLİĞİ</option>
            <option value="MAKİNE MÜHENDİSLİĞİ">MAKİNE MÜHENDİSLİĞİ</option>
            <option value="MEKATRONİK MÜHENDİSLİĞİ" >MEKATRONİK MÜHENDİSLİĞİ</option>
            <option value="METALURJİ VE MALZEME MÜHENDİSLİĞİ">METALURJİ VE MALZEME MÜHENDİSLİĞİ</option>
          </select></td>
        </div>

          <div class="form-group">
            <label>Ders Kodu</label>
            <input class="form-control" type="text" name="ders_kodu" value="">
          </div>

          <div class="form-group">
            <label>Ders Ad</label>
            <input class="form-control" type="text" name="ders_ad" value="">
          </div>

          <div class="form-group">
            <label>Ders Dönem</label>
            <input class="form-control" type="text" name="ders_donem" value="">
          </div>

          <div class="form-group">
            <label>Ders Akts</label>
            <input class="form-control" type="text" name="ders_akts" value="">
          </div>


          <div class="form-group">
           <label>Ders Kontenjan</label>
           <input class="form-control" type="text" name="ders_kontenjan" value="">
         </div>



         <center><button style="width: 100%" type="submit" name="ders_ekle" class="btn btn-primary">Ekle</button></center>  <br>

       </form>


     </div>
   </div>
   <!-- /. ROW  -->


 </div>
 <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->



<?php 

if(isset($_POST['ders_ekle']))
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
 //$bolum_id=$_POST['bolum_id'];
 $ders_kodu=$_POST['ders_kodu'];
 $ders_ad=$_POST['ders_ad'];
 $ders_donem=$_POST['ders_donem'];
 $ders_akts=$_POST['ders_akts'];
 $ders_kontenjan=$_POST['ders_kontenjan'];
 

 $sorgu= mysqli_query($baglan,"SELECT ders_ad from dersler where ders_ad='$ders_ad'");
 $say=mysqli_num_rows($sorgu);


 if ($say<1) 
 {

  $dersekle= mysqli_query($baglan,"INSERT into dersler (bolum_id,ders_kodu,ders_ad,ders_donem,ders_akts,ders_kontenjan) VALUES ('".$bolum_id."','".$ders_kodu."','".$ders_ad."','".$ders_donem."','".$ders_akts."','".$ders_kontenjan."') ");

       if ($dersekle) //kayıt başarılıysa
       {
       	header('Location:ders_islemleri.php');

       }
       else
       {
        echo '<script type="text/javascript">alert("Ders Ekleme İşlemi Gerçekleştirilemedi. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=ders_islemleri.php" />';
       	//header('Location:ders_islemleri.php?durum=no');
       }

     }

     else
     {
      echo '<script type="text/javascript">alert("Ders Ekleme İşlemi Gerçekleştirilemedi. Ekleme Yapmak İstediğiniz Ders Adında Bir Ders Var. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=ders_islemleri.php" />';
      //header('Location:ogrenci_islemleri.php?durum=no');
    }
  }


  ?>



  <?php include 'footer.php'; ?>
