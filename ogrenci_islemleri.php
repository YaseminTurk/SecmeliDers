<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';
?>

<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Öğrenci İşlemleri </h1> <br><br>

      </div>
      <div class="col-md-2">

        <a href="ogrenci_ekle.php"><button style="width: 100%" type="submit"  name="btn_ekle" class="btn btn-primary">Öğrenci Ekle</button></a><br><br>

     </div>


     <div class="col-md-12">

      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-hover" border="1" align="center" width="80%">
            <thead>
              <tr class="success">

                  <td>Ögrenci No</td>
                  <td>Ögrenci Adı</td>
                  <td>Ögrenci Soyadı</td>

                
                <td>Sil</td>
                <td>Güncelle</td>
                <td>Alınan Ders Göster</td>


              </tr>
            </thead>


            <?php

            $ogrencisorgu=mysqli_query($baglan,"SELECT * from ogrenci "); 

              mysqli_set_charset($baglan, "utf8");



            while($ogrencicek=mysqli_fetch_array($ogrencisorgu)) //sorgudan dönen verileri diziye atarken kullanılır.
            {

              echo '<tr>';
              echo '<td>'.$ogrencicek['ogrenci_no'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_ad'].'</td>';
              echo '<td>'.$ogrencicek['ogrenci_soyad'].'</td>';
              ?>
              <td><a href="ogrenci_islemleri.php?ogrenci_id=<?php echo $ogrencicek['ogrenci_id'] ?> & ogrsil=ok"><button style="width: 100%" type="submit"  name="btn_sil" class="btn btn-primary">Sil</button></a></td>
              <td><a href="ogrenci_guncelle.php?ogrenci_id=<?php echo $ogrencicek['ogrenci_id'] ?>"><button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Güncelle</button></a></td>
              <td><a href="ders_goruntule.php?ogrenci_id=<?php echo $ogrencicek['ogrenci_id'] ?>"><button style="width: 100%" type="submit"  name="btn_ders_goster" class="btn btn-primary">Alınan Ders Göster</button></a></td>



              <?php

              echo '</tr>';
              


            }
            ?>

          </table>

        </div>
<!--</div>

<button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Ders Güncelle</button>
</div>-->
</div>

<!-- /. ROW  -->


</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->


<?php 

if(@$_GET['ogrsil']=="ok")
{

  $ogrsil=mysqli_query($baglan,"DELETE from ogrenci where ogrenci_id='".$_GET['ogrenci_id']."'");


  if ($ogrsil) 
  {

    header('Location:ogrenci_islemleri.php');

  }
  else
  {
     echo '<script type="text/javascript">alert("Silme İşlemi Gerçekleştirilemedi. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=ogrenci_islemleri.php" />';
    //header('Location:ogrenci_islemleri.php?durum=no');
  }
  
}

 ?>


<?php include 'footer.php'; ?>

