<?php 
include "baglan.php";
include "header.php";
include "sidebar.php";
extract($_POST); //sayfayı post etmek için kullanılır.
$id=$_SESSION['ogrenci_kadi'];
$ogrid= mysqli_query($baglan,"SELECT * from ogrenci where ogrenci_kadi='".$id."'");

$ogrcek=mysqli_fetch_array($ogrid);

$a=$ogrcek['ogrenci_id']; //session daki kullanıcının id si bulundu. 
$bolum=$ogrcek["bolum_id"];



if(isset($_POST["btn_kaydet1"]))
{



    $ogrders= mysqli_query($baglan,"SELECT * from gecici_ders where gecici_ders_ogrenci_id='".$a."'");
    $say=mysqli_num_rows($ogrders);
    if ($say==0) {
       echo '<script type="text/javascript">alert("Ders Seçimi Yapılmadı. Tekrar Deneyiniz.");</script> <meta http-equiv="refresh" content="0;URL=derssecimi.php" />';
    }

    foreach ($ogrders as $data) { 
    $gecdersid=$data['gecici_ders_ders_id']; //kayıt edilmeye çalısılan dersin id si

    $maxders= mysqli_query($baglan,"SELECT * from dersler where ders_id='".$gecdersid."'"); //dersin kontenjanı kac
    $kontenjancek=mysqli_fetch_array($maxders);
    $kontenjan=$kontenjancek['ders_kontenjan'];

    //echo ("ders".$gecdersid);
    // echo ("kontenjan".$derskapasite);
    $kayitderskapasite= mysqli_query($baglan,"SELECT * from ders_ogrenci where ders_id='".$gecdersid."'"); //kac tane kayıt edilmiş
    $kytdrskapasite=mysqli_num_rows($kayitderskapasite);
    echo $kontenjan;
    echo $kytdrskapasite;

    $gecici_ders_durum=2;

    $durum=mysqli_query($baglan,"UPDATE gecici_ders set gecici_ders_durum=2 where gecici_ders_ders_id='$gecdersid' ");
    if($kytdrskapasite<$kontenjan){

        
        $ekle= mysqli_query($baglan,"INSERT INTO ders_ogrenci (ogrenci_id,ders_id) VALUES ('".$a."','".$gecdersid."') ");


    if ($ekle) 
    {
        header('Location:ders_goruntule.php');

    }
    else
    {
        header('Location:ders_goruntule.php?durum=no');
    }
    }
    else
    {
      echo '<script type="text/javascript">alert("Kapasite Dolu. Başka Bir Dersi Seçmeyi Deneyiniz..");</script> <meta http-equiv="refresh" content="0;URL=derssecimi.php" />';
        //echo "kapasite dolu";
    }

} //forech

}



?>

<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-head-line">Ders Seç</h1> <br><br>

				
				
             <div class="panel-body">
              <div class="table-responsive">


               <table class="table table-hover" border="1" align="center" width="80%">

                <thead>
                 <tr class="success">
                  <td>Bolum ID</td>
                  <td>Ders Kodu</td>
                  <td>Ders Adı</td>
                  <td>Ders Dönemi</td>
                  <td>Ders Akts</td>
                  <td>Ders Kontenjan</td>
                  <td>Seçim</td>
              </tr>
          </thead>


          <?php

          $derssorgu=mysqli_query($baglan,"SELECT * from dersler where bolum_id='$bolum'"); //öğrenci hangi bölümdeyse onunla ilgili dersler listelenir

          mysqli_set_charset($baglan, "utf8");



            while($derscek=mysqli_fetch_array($derssorgu)) //sorgudan dönen verileri diziye atarken kullanılır.
            {

            	echo '<tr>';
            	echo '<td>'.$derscek['bolum_id'].'</td>';
            	echo '<td>'.$derscek['ders_kodu'].'</td>';
            	echo '<td>'.$derscek['ders_ad'].'</td>';
            	echo '<td>'.$derscek['ders_donem'].'</td>';
            	echo '<td>'.$derscek['ders_akts'].'</td>';
            	echo '<td>'.$derscek['ders_kontenjan'].'</td>';
            	?>
            	<td><a href="derssecimi.php?ders_id=<?php echo $derscek['ders_id']?>&durum=ok"><button style="width: 100%" type="submit"  name="ekle" class="btn btn-primary">Geçici Ekle</button></a></td>

            	<?php

            	echo '</tr>';


            }

            ?>

        </table>

        <?php 
// $sorgu22= mysqli_query($baglan,"select * from gecici_ders where gecici_ders_durum='0'");
//     $say=mysqli_num_rows($sorgu22); 
//  if($say==0){
// }

        $sorgu1= mysqli_query($baglan,"SELECT * from gecici_ders where gecici_ders_durum='1'");
        $say1=mysqli_num_rows($sorgu1); 
        if($say1==0){ //ders yoksa kaydetme
        	echo "ders yok"; 
        }
        $sorgu= mysqli_query($baglan,"SELECT * from gecici_ders inner join dersler on gecici_ders.gecici_ders_ders_id=dersler.ders_id where gecici_ders_durum='1' and gecici_ders_ogrenci_id='".$a."'");
        $say3=mysqli_num_rows($sorgu); 
        if($say1>0 and $say3>0){

        	?>
        	<div class="panel-body">
        		<div class="table-responsive">



                    <div>
                        
                         <table class="table table-hover" border="1" align="center" width="80%">

                            <thead>
                               <tr class="success">
                                  <td>Ders Adı</td>
                                  <td>Gecici Ders Öğrenci ID</td>
                                  <td>Gecici Ders Ders ID</td>
                                  <td>Ders Kodu</td>
                                  <td>Geçici Ders Durum</td>

                                  <td>Çıkar</td> 

                              </tr>
                          </thead>


                          <?php




                          mysqli_set_charset($baglan, "utf8");



            while($derscek=mysqli_fetch_array($sorgu)) //sorgudan dönen verileri diziye atarken kullanılır.
            {

            	echo '<tr>';
            	echo '<td>'.$derscek['ders_ad'].'</td>';
            	echo '<td>'.$derscek['gecici_ders_ogrenci_id'].'</td>';
            	echo '<td>'.$derscek['gecici_ders_ders_id'].'</td>';
            	echo '<td>'.$derscek['ders_kodu'].'</td>';
            	echo '<td >'.$derscek['gecici_ders_durum'].'</td>';

                ?>

                <form action="derssecimi.php?dersid=<?php echo $derscek['ders_id']?>&sil=ok" role="form" method="post"> 
                  <td><a href=""><button style="width: 100%" type="submit"  name="ders_sil" class="btn btn-primary">Sil</button></a></td> </form>

                <?php 
                echo '</tr>';


            }

            ?>

        </table>
    
</div>
</div>
</div>
<?php } ?>
<div>
    <form action="" role="form" method="post"> 

        <?php $sorgu= mysqli_query($baglan,"SELECT * from ders_ogrenci where ogrenci_id='".$a."'"); 
        $say2=mysqli_num_rows($sorgu);

        ?>

        <button style="width: 100%" type="submit" id="btn_kaydet1" name="btn_kaydet1" class="btn btn-primary" <?php if($say2>0){ ?>disabled <?php }?> > <?php if($say2>0){ ?>  Kayıt işlemini tamamladınız <?php }else {?> Kaydet <?php } ?></button>


    </form></div>


</div>
</div>



</div>
</div>
<!-- /. ROW  -->


</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->



<?php 

if(@$_GET['durum']=="ok")
{

    //$id=$_SESSION['ogrenci_kadi'];
 //$ogrid= mysqli_query($baglan,"SELECT * from ogrenci where ogrenci_kadi='".$id."'");

// $ogrcek=mysqli_fetch_array($ogrid);

//$a=$ogrcek['ogrenci_id']; //öğrencinin id si


    $gecici_ders_ders_id=$_GET['ders_id'];
    $gecicidersvarmi= mysqli_query($baglan,"SELECT *from gecici_ders where gecici_ders_ders_id='".$gecici_ders_ders_id."' and gecici_ders_ogrenci_id='".$a."' and gecici_ders_durum=1");
    $verisay=mysqli_num_rows($gecicidersvarmi);

    if ($verisay>0) 
    {
      echo '<script type="text/javascript">alert("Bu Dersi Zaten Seçtiniz. Başka Bir Dersi Seçmeyi Deneyiniz..");</script> <meta http-equiv="refresh" content="0;URL=derssecimi.php" />';

     //header('Location:derssecimi.php?durum=no');
 }
 else
 {
	//$gecici_ders_ders_id=$_GET['ders_id'];
    $gecici_ders_durum=1;

    $gecicidersekle= mysqli_query($baglan,"INSERT INTO gecici_ders (gecici_ders_ogrenci_id,gecici_ders_ders_id,gecici_ders_durum) VALUES ('".$a."','".$gecici_ders_ders_id."','".$gecici_ders_durum."') ");


    if ($gecicidersekle) 
    {
      header('Location:derssecimi.php');

  }
  else
  {
    echo '<script type="text/javascript">alert("Geçici Ders Ekleme İşlemi Başarılı Olamadı.");</script> <meta http-equiv="refresh" content="0;URL=derssecimi.php" />';
      //header('Location:derssecimi.php?durum=no');
  }
}


}


if(isset($_POST['ders_sil']))
{
    $dersid=$_GET['dersid'];

    $derssil=mysqli_query($baglan,"DELETE from gecici_ders where gecici_ders_ders_id='$dersid' and gecici_ders_ogrenci_id='".$a."' ");

    if ($derssil) 
    {
        header('Location:derssecimi.php');
    }
    else
    {
      echo '<script type="text/javascript">alert("Geçici Ders Silme İşlemi Başarılı Olamadı.");</script> <meta http-equiv="refresh" content="0;URL=derssecimi.php" />';
        //header('Location:derssecimi.php?durum=no');
    }

}


?>




<?php 
include "footer.php";
?>