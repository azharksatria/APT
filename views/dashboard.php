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
                    <p>Selamat Datang <?php echo $_SESSION['login_adminapt']; ?>, Kamu login sebagai 
                    <u>
                        <?php 
                            if($_SESSION['level_adminapt'] == '0')
                                echo 'Sekretariat';
                            else if($_SESSION['level_adminapt'] == '1')
                                echo 'Super Admin'; 
                            else if($_SESSION['level_adminapt'] == '2')
                                echo 'Koordinator Pelaksana';
                            else
                                echo 'Koordinator Kriteria'.' '.$_SESSION['kriteria'];
                        ?>
                    </u>
                </p></div>
            </div>
        </div>
    </div>
    
</div>