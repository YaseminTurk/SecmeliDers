<?php 
include 'baglan.php';
include 'header.php';
include 'sidebar.php';
?>

<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-head-line">Alınan Dersler</h1> <br><br>
        <?php
        if (isset($_SESSION['ogrenci_kadi'])) {
          $id=$_SESSION['ogrenci_kadi'];
          $ogrid= mysqli_query($baglan,"SELECT * from ogrenci where ogrenci_kadi='".$id."'");

          $ogrcek=mysqli_fetch_array($ogrid);

              $a=$ogrcek['ogrenci_id']; //giriş yapan öğrencinin id si çekildi
            }
            if (isset($_SESSION['admin_kadi'])) {

              $a=$_GET['ogrenci_id'];
            }

            $cek= mysqli_query($baglan,"SELECT * from ders_ogrenci inner join dersler on  ders_ogrenci.ders_id=dersler.ders_id  where ogrenci_id='".$a."'");
            $say1=mysqli_num_rows($cek);

            if($say1>0){

              ?>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-hover" border="1" align="center" width="80%">
                    <thead>
                      <tr class="success">
                        <td>Ders ID</td>
                        <td>Ders Kodu</td>
                        <td>Ders Adı</td>
                        <td>Ders Dönemi</td>
                        <td>Ders Akts</td>
                        <td>Ders Kontenjan</td>


                      </tr>
                    </thead>


                    <?php





                          while($ders_cek=mysqli_fetch_array($cek)) //sorgudan dönen verileri diziye atarken kullanılır.
                          {

                            echo '<tr>';
                            echo '<td>'.$ders_cek['ders_id'].'</td>';
                            echo '<td>'.$ders_cek['ders_kodu'].'</td>';
                            echo '<td>'.$ders_cek['ders_ad'].'</td>';
                            echo '<td>'.$ders_cek['ders_donem'].'</td>';
                            echo '<td>'.$ders_cek['ders_akts'].'</td>';
                            echo '<td>'.$ders_cek['ders_kontenjan'].'</td>';
                            ?>




                            <?php

                            echo '</tr>';



                          }  




                          ?>

                        </table>

                      </div>
<!--</div>

<button style="width: 100%" type="submit"  name="btn_guncelle" class="btn btn-primary">Ders Güncelle</button>
</div>-->
<?php }
else
{
  echo "Seçim yapılan ders yok";
}
?>


</div>
</div>
</div>
<!-- /. ROW  -->


</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->





<?php include 'footer.php'; ?>
