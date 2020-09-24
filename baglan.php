<?php 
//ob_start();
//session_start();  //login işlemleri için gerekli

if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    else
    {
        session_destroy();
        session_start(); 
    }

//veritabanı ulaşım bilgileri
$username="epiz_26577543";
$password="FxlORwM5WA";
$sunucu="sql106.epizy.com";
$database="epiz_26577543_secmeliders";

$baglan=mysqli_connect($sunucu,$username,$password); //MySql sunucusuna bağlanılır.

mysqli_set_charset($baglan, "utf8"); //türkçe karakter hatası almamak için yazılır.

if (!$baglan)
{
	echo "Bağlantı Hatası:".mysql_errno();
}

$db=mysqli_select_db($baglan,$database); //erişilmek istenen veritabanı seçilir.

if (!$db) 
{
	echo "Bağlantı Hatası:".mysql_errno();
	echo "<br>";

	exit();
}


 ?> 