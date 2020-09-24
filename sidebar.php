
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <img src="assets/img/tf_logo_tr.png" class="img-thumbnail" />

                    <div class="inner-text">
                        Hoşgeldiniz <?php 
                        if(isset($_SESSION['ogrenci_kadi'])){ echo $_SESSION['ogrenci_kadi'];  }
                        if(isset($_SESSION['admin_kadi'])){ echo $_SESSION['admin_kadi'];  }?>
                        <br />
                        <small> </small>
                    </div>
                </div>

            </li>


            <?php 
            if(isset($_SESSION['ogrenci_kadi']) and !isset($_SESSION['admin_kadi'])){?>
                <li>
                    <a class="active-menu" href="index.php"><i class="fa fa-dashboard "></i>Anasayfa</a>
                </li>

                <li>
                    <a  href="profil_duzenle.php"><i class="fa fa-dashboard "></i>Profil Güncelle</a>
                </li>  

                <li>
                    <a  href="derssecimi.php"><i class="fa fa-dashboard "></i>Ders Seçimi </a>
                </li>  

                <li>
                    <a  href="ders_goruntule.php"><i class="fa fa-dashboard "></i>Alınan Dersler </a>
                </li>  

            <?php }

            ?>

            <?php 
            if(isset($_SESSION['admin_kadi']) and !isset($_SESSION['ogrenci_kadi'])){?>


             <li>
                <a class="active-menu" href="index.php"><i class="fa fa-dashboard "></i>Anasayfa</a>
            </li>

            <li>
                <a  href="admin_profil_duzenle.php"><i class="fa fa-dashboard "></i>Profil Güncelle</a>
            </li> 

            <li>
                <a  href="ogrenci_islemleri.php"><i class="fa fa-dashboard "></i>Öğrenci İşlemleri</a>
            </li> 

            <li>
                <a  href="ders_islemleri.php"><i class="fa fa-dashboard "></i>Ders İşlemleri</a>
            </li> 



        <?php }

        ?>





    </ul>

</div>

</nav>
