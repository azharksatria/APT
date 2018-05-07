<?php
    session_start();
?>
<div class="row gap-20 masonry pos-r" style="position: relative; height: 271px;">
    <div class="masonry-sizer col-md-6"></div>
    
    <div class="masonry-item col-md-12" style="position: absolute; left: 0%;">
        <div class="bd bgc-white">
            <div class="layers">
                <div class="layer w-100 pX-20 pT-20">
                    <h6 class="lh-1" id="textup16">Dashboard</h6>
                </div>
                <div class="layer bdT p-20 w-100">
                    <p>Selamat Datang Website APT UMA<!-- <?php echo $_SESSION['login_adminapt']; ?> -->, Kamu login sebagai 
                    <u>
                        <?php 
                            if($_SESSION['level_adminapt'] == '0')
                                echo 'Sekretariat '.$_SESSION['kriteria'];
                            else if($_SESSION['level_adminapt'] == '1')
                                echo 'Ketua'; 
                            else if($_SESSION['level_adminapt'] == '2')
                                echo $_SESSION['login_adminapt'];
                            else
                                echo 'Koordinator Kriteria '.$_SESSION['login_adminapt'];
                        ?>
                    </u>
                </p></div>
            </div>
        </div>
    </div>
    
</div>