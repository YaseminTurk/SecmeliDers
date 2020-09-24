<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';
?>

<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Ders İşlemleri </h1> <br><br>

      </div>
      <div class="col-md-2">

        <a href="ders_ekle.php"><button style="width: 100%" type="submit"  name="btn_ekle" class="btn btn-primary">Ders Ekle</button></a><br><br>

     </div>


     <div class="col-md-12">

      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-hover" border="1" align="center" width="80%">
            <thead>
              <tr class="success">

                  <td>Ders Kodu</td>
                  <td>Ders Adı</td>
                  <td>Ders Dönemi</td>
                  <td>Ders Akts</td>
                  <td>Ders Kontenjan</td>

                
                <td>Sil</td>
                <td>Güncelle</td>


              </tr>
            </thead>


            <?php

            $derssorgu=mysqli_query($baglan,"SELECT * from dersler "); 

              mysqli_set_charset($baglan, "utf8");



            while($derscek=mysqli_fetch_array($derssorgu)) //sorgudan dönen verileri diziye atarken kullanılır.
            {

              echo '<tr>';
              echo '<td>'.$derscek['ders_kodu'].'</td>';
              echo '<td>'.$derscek['ders_ad'].'</td>';
              echo '<td>'.$derscek['ders_donem'].'</td>';
              echo '<td>'.$derscek['ders_akts'].'</td>';
              echo '<td>'.$derscek['ders_kontenjan'].'</td>';

              ?>
              <td><a href="ders_islemleri.php?ders_id=<?php echo $derscek['ders_id'] ?> & derssil=ok"><button style="width: 100%" type="submit"  name="btn_sil" class="btn btn-primary">Sil</button></a></td>
              <td><a href="ders_duzenle.php?ders_id=<?php echo $derscek['ders_id'] ?>"><button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Güncelle</button></a></td>



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

if(@$_GET['derssil']=="ok")
{

  $derssil=mysqli_query($baglan,"DELETE from dersler where ders_id='".$_GET['ders_id']."'");


  if ($derssil) 
  {

    header('Location:ders_islemleri.php');

  }
  else
  {
    echo '<script type="text/javascript">alert("Ders Silme İşlemi Gerçekleştirilemedi. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=ders_islemleri.php" />';
    //header('Location:ders_islemleri.php?durum=no');
  }
  
}

 ?>


<?php include 'footer.php'; ?>

