<?php
include'config/controller.php';
if(!isset($_SESSION['login_adminapt'])){
  header("Location: login.php");
}else{
//include'sweetalert/sweetalert.php';
include'root/notification.php';
$query= new Database();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>APT UMA - Dashboard</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="http://www.uma.ac.id/asset/images/favicon.png" />
    <link href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">

    <style>
      #loader {
        transition: all 0.3s ease-in-out;
        opacity: 1;
        visibility: visible;
        position: fixed;
        height: 100vh;
        width: 100%;
        background: #fff;
        z-index: 90000;
      }

      #loader.fadeOut {
        opacity: 0;
        visibility: hidden;
      }

      .spinner {
        width: 40px;
        height: 40px;
        position: absolute;
        top: calc(50% - 20px);
        left: calc(50% - 20px);
        background-color: #333;
        border-radius: 100%;
        -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
        animation: sk-scaleout 1.0s infinite ease-in-out;
      }

      @-webkit-keyframes sk-scaleout {
        0% { -webkit-transform: scale(0) }
        100% {
          -webkit-transform: scale(1.0);
          opacity: 0;
        }
      }

      @keyframes sk-scaleout {
        0% {
          -webkit-transform: scale(0);
          transform: scale(0);
        } 100% {
          -webkit-transform: scale(1.0);
          transform: scale(1.0);
          opacity: 0;
        }
      }
    </style>
  </head>
  <body class="app">
    <!-- @TOC -->
    <!-- =================================================== -->
    <!--
      + @Page Loader
      + @App Content
          - #Left Sidebar
              > $Sidebar Header
              > $Sidebar Menu

          - #Main
              > $Topbar
              > $App Screen Content
    -->

    <!-- @Page Loader -->
    <!-- =================================================== -->
    <div id='loader'>
      <div class="spinner"></div>
    </div>

    <script>
      window.addEventListener('load', () => {
        const loader = document.getElementById('loader');
        setTimeout(() => {
          loader.classList.add('fadeOut');
        }, 300);
      });
    </script>

    <!-- @App Content -->
    <!-- =================================================== -->
    <div>
      <!-- #Left Sidebar ==================== -->
      <div class="sidebar">
        <div class="sidebar-inner">
          <!-- ### $Sidebar Header ### -->
          <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
              <div class="peer peer-greed">
                <a class="sidebar-link td-n" href="index.html">
                  <div class="peers ai-c fxw-nw">
                    <div class="peer">
                      <div class="logo">
                        <img src="http://spmi.uma.ac.id/admin/images/uma.png" style="width: 55px; margin: 5px 0px 0px 5px;" alt="APT">
                      </div>
                    </div>
                    <div class="peer peer-greed">
                      <h5 class="lh-1 mB-0 logo-text">APT - UMA</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div class="peer">
                <div class="mobile-toggle sidebar-toggle">
                  <a href="" class="td-n">
                    <i class="ti-arrow-circle-left"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- ### $Sidebar Menu ### -->
          <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 active">
              <a class="sidebar-link" id="dashboard" href="views/dashboard.php">
                <span class="icon-holder">
                  <i class="c-brown-500 ti-home"></i>
                </span>
                <span class="title">Dashboard</span>
              </a>
            </li>

            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-share"></i>
                </span>
                <span class="title">Dokumen</span>
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <?php
                if($_SESSION['level_adminapt'] == '0')
                {
                ?>
                  <li>
                    <a class='sidebar-link' id="inputdokumen" href="views/input-dokumen.php">Input Dokumen</a>
                  </li>
                <?php
                }
                ?>
                <li>
                  <a class='sidebar-link' id="listdokumen" href="views/list-dokumen.php">List Dokumen</a>
                </li>

              </ul>
            </li>

<!--             <li class="nav-item">
              <a class='sidebar-link' href="email.html">
                <span class="icon-holder">
                  <i class="c-brown-500 ti-email"></i>
                </span>
                <span class="title">Email</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="calendar.html">
                <span class="icon-holder">
                  <i class="c-deep-orange-500 ti-calendar"></i>
                </span>
                <span class="title">Calendar</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="chat.html">
                <span class="icon-holder">
                  <i class="c-deep-purple-500 ti-comment-alt"></i>
                </span>
                <span class="title">Chat</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="charts.html">
                <span class="icon-holder">
                  <i class="c-indigo-500 ti-bar-chart"></i>
                </span>
                <span class="title">Charts</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="forms.html">
                <span class="icon-holder">
                  <i class="c-light-blue-500 ti-pencil"></i>
                </span>
                <span class="title">Forms</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="sidebar-link" href="ui.html">
                <span class="icon-holder">
                    <i class="c-pink-500 ti-palette"></i>
                  </span>
                <span class="title">UI Elements</span>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-orange-500 ti-layout-list-thumb"></i>
                </span>
                <span class="title">Tables</span>
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a class='sidebar-link' href="basic-table.html">Basic Table</a>
                </li>
                <li>
                  <a class='sidebar-link' href="datatable.html">Data Table</a>
                </li>
              </ul>
            </li> -->
          </ul>
        </div>
      </div>

      <!-- #Main ============================ -->
      <div class="page-container">
        <!-- ### $Topbar ### -->
        <div class="header navbar">
          <div class="header-container">
            <ul class="nav-left">
              <li>
                <a id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
                  <i class="ti-menu"></i>
                </a>
              </li>
              <!-- <li class="search-box">
                <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                  <i class="search-icon ti-search pdd-right-10"></i>
                  <i class="search-icon-close ti-close pdd-right-10"></i>
                </a>
              </li>
              <li class="search-input">
                <input class="form-control" type="text" placeholder="Search...">
              </li> -->
            </ul>
            <ul class="nav-right">
              <?php if($_SESSION['level_adminapt']==0){?>
              <li class="notifications dropdown">
                <span class="counter bgc-red">
                  <div class="load-notification" ></div>
                </span>
                <a href="" class="dropdown-toggle no-after" data-toggle="dropdown">
                  <i class="ti-bell"></i>
                </a>

                <ul class="dropdown-menu">
                  <li class="pX-20 pY-15 bdB">
                    <i class="ti-bell pR-10"></i>
                    <span class="fsz-sm fw-600 c-grey-900">Notifications</span>
                  </li>
              <div class="warning-notif"></div>
                  <li class="pX-20 pY-15 ta-c bdT">
                    <span><a id="listnotif" href="views/list-notification.php" class="c-grey-600 cH-blue fsz-sm td-n">View All Notifications <i class="ti-angle-right fsz-xs mL-10"></i></a></span></li>
                </ul>
              </li>
            <?php } ?>
              <li class="dropdown">
                <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                  <div class="peer mR-10">
                    <img class="w-2r bdrs-50p" src="https://www.aurigo.com/wp-content/uploads/2016/01/no-image.png" alt="">
                  </div>
                  <div class="peer">
                    <span class="fsz-sm c-grey-900"><?php echo $_SESSION['login_adminapt']; ?></span>
                  </div>
                </a>
                <ul class="dropdown-menu fsz-sm">
                  <li>
                    <a id="gantipassword" href="views/gantipassword.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                      <i class="ti-settings mR-10"></i>
                      <span>Ganti Password</span>
                    </a>
                  </li>
                  <li>
                    <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                      <i class="ti-user mR-10"></i>
                      <span>Profile</span>
                    </a>
                  </li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="logout.php" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                      <i class="ti-power-off mR-10"></i>
                      <span>Logout</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>

        <!-- ### $App Screen Content ### -->
        <main class='main-content bgc-grey-100'>
          <div id='mainContent'>
            <?php include'views/dashboard.php';?>
          </div>
        </main>
<!--=====================================   -->
        <!-- <table style="width:40%; text-align:left">
			<thead>
			<tr>
				<th>ID</th>
				<th>NAMA</th>
				<th>ALAMAT</th>
			</tr>
			</thead>
			<tbody id="load-notification">  // parameter untuk memuat data tabel

			</tbody>
		</table> -->
  <!-- ==================================  -->

        <!-- ### $App Screen Footer ### -->
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600">
          <span>Copyright © 2018 Developed by <a href="http://pdai.uma.ac.id">PDAI</a> - Designed by Colorlib</a>. All rights reserved.</span>
        </footer>
      </div>
    </div>

    <script type="text/javascript" src="js/vendor.js">
    </script><script type="text/javascript" src="js/bundle.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">
      $(document).ready( function (){
        $('#dataTable').DataTable();
        $('.load-notification').load("root/getnotif.php");
        $('.warning-notif').load("views/warning-notif.php");

      });

      $('#inputdokumen').on('click', function (evt) {
          evt.preventDefault();
          var link = evt.target,
          span = $('<span>... processing ...</span>');
          //$('#mainContent').replaceWith(span);
          $('#mainContent').load(this.href);
          //console.log(this.href);
      });

      $('#listdokumen').on('click', function (evt) {
          evt.preventDefault();
          var link = evt.target,
          span = $('<span>... processing ...</span>');
          //$('#mainContent').replaceWith(span);
          $('#mainContent').load(this.href);
          //console.log(this.href);
      });

      $('#listnotif').on('click', function (evt) {
          evt.preventDefault();
          var link = evt.target,
          span = $('<span>... processing ...</span>');
          //$('#mainContent').replaceWith(span);
          $('#mainContent').load(this.href);
          //console.log(this.href);
      });

      $('#dashboard').on('click', function (evt) {
          evt.preventDefault();
          var link = evt.target,
          span = $('<span>... processing ...</span>');
          //$('#mainContent').replaceWith(span);
          $('#mainContent').load(this.href);
          //console.log(this.href);
      });

      $('#gantipassword').on('click', function (evt) {
          evt.preventDefault();
          var link = evt.target,
          span = $('<span>... processing ...</span>');
          //$('#mainContent').replaceWith(span);
          $('#mainContent').load(this.href);
          //console.log(this.href);
      });


    </script>
  </body>
</html>
<?php } ?>
