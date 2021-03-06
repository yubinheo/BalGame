<?php 
include "./db.php";
include "./system.php";
isBlockBrowser();

$uid = $_GET['uid']; 
$result = mq("SELECT  * FROM users WHERE egv = '$uid'");
$data = $result->fetch_array();

?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./public/quest/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./public/quest/img/favicon.png">
  <title>
    BALGAME - User's Profile
  </title>
  <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="./public/quest/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./public/quest/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <link href="./public/quest/demo/demo.css" rel="stylesheet" />
</head>

<body class="" style="font-family: 'Nanum Gothic', sans-serif; font-size: 20px;">
  <div class="wrapper">
    
<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="javascript:void(0)" class="simple-text logo-mini">
            CTF
            </a>
            <a href="javascript:void(0)" class="simple-text logo-normal">
            BALGAME
            </a>
        </div>
        <ul class="nav">
            <li class="active ">
            <a href="./questions/index.php">
            <i class="tim-icons icon-bell-55"></i>
            <p>Notice Board</p>
            </a>
            <a href="./questions/rank.php">
            <i class="tim-icons icon-bank"></i>
            <p>Ranking</p>
            </a>
            <a href="./questions/wiki.php">
            <i class="tim-icons icon-book-bookmark"></i>
            <p>WiKi</p>
            </a>
            <?php if(isset($_SESSION['id'])){ ?>
            <a href="./questions/webhack.php">
                <i class="tim-icons icon-atom"></i>
                <p>WebHacking</p>
            </a>
            <?php } ?>
            </li>
        </ul>
    </div>
</div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#" style="font-size: 30px;">BALGAME</a>
          </div>
          <?php if(isset($_SESSION['id'])){ ?>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav ml-auto">
                <li class="dropdown nav-item">
                  <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <div class="photo">
                      <img src="../public/images/anime3.png" alt="Profile Photo">
                    </div>
                    <b class="caret d-none d-lg-block d-xl-block"></b>
                    <p class="d-lg-none">
                      Log out
                    </p>
                  </a>
                  <ul class="dropdown-menu dropdown-navbar">
                    <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Profile</a></li>
                    <li class="nav-link"><a href="javascript:void(0)" class="nav-item dropdown-item">Settings</a></li>
                    <li class="dropdown-divider"></li>
                    <li class="nav-link"><a href="../member/logout.php" class="nav-item dropdown-item">Log out</a></li>
                  </ul>
                </li>
                <li class="separator d-lg-none"></li>
              </ul>
            </div>
          <?php } else { ?>
            <a href="../member">로그인이 필요함</a> 
          <?php } ?>


        </div>
      </nav>
      <!-- End Navbar -->
    <div class="main-panel">
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="title"><?php echo $data["name"]; ?>'s Profile</h2>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12 pr-md-1">
                      <div class="form-group">
                        <label style="font-size:20px;">User ID(Email)</label>
                        <input type="text" class="form-control" style="color:white; font-size:20px;" disabled="" value="<?php echo email_preg($data["id"]); ?>">
                      </div>
                    <div class="col-md-12 px-md-1">
                      <div class="form-group">
                        <label style="font-size:20px;">Username</label>
                        <input type="text" class="form-control" style="color:white; font-size:20px;" disabled="" value="<?php echo $data["name"]; ?>">
                      </div> <hr />
                      <div class="form-group">
                        <label style="font-size:20px;">Score</label>
                        <input type="text" class="form-control" style="color:white; font-size:20px;" disabled="" value="<?php echo $data["score"]; ?>점">
                      </div> <br />
                      <div class="form-group">
                      <label style="font-size:20px;">Solved Problems</label>
                      <div class="table-responsive" style="overflow-y:hidden; overflow-x:hidden;">
                          <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Question Number
                                    </th>
                                    <th>
                                        Question Name
                                    </th>
                                    <th>
                                      Finished
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              $sql = mq("SELECT * FROM finish_users WHERE egv='$uid' ORDER BY quest_num ASC");
                              while($data = $sql->fetch_array()) { ?>

                              <?php 
                              $result = mq("SELECT * FROM questions_web WHERE quest_num = '".$data["quest_num"]."' ");
                              $data2 = $result->fetch_array();?>

                                  <tr>
                                      <td>
                                          <?php echo $data["quest_num"]; ?>
                                      </td>
                                      <td>
                                          <a href="./questions/webhack.php#<?php echo $data2["quest_num"]; ?>" target="_blank"><?php echo $data2["title"]; ?></a>
                                      </td>
                                      <td>
                                        <?php echo $data["finished"]; ?>
                                      </td>       
                                  </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                      </div>
                    </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      <footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                Creative Tim
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                About Us
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                Blog
              </a>
            </li>
          </ul>
          <div class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
              </script>2020 made with <i class="tim-icons icon-heart-2"></i> by HeoYuBin
          </div>
        </div>
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">LIGHT MODE</span>
          <span class="badge light-badge mr-2"></span>
          <span class="badge dark-badge ml-2"></span>
          <span class="color-label">DARK MODE</span>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/black-dashboard" target="_blank" class="btn btn-primary btn-block btn-round">Download Now</a>
          <a href="https://demos.creative-tim.com/black-dashboard/docs/1.0/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block btn-round">
            Documentation
          </a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
          <a class="github-button" href="https://github.com/creativetimofficial/black-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
      </ul>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./public/quest/js/core/jquery.min.js"></script>
  <script src="./public/quest/js/core/popper.min.js"></script>
  <script src="./public/quest/js/core/bootstrap.min.js"></script>
  <script src="./public/quest/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="./public/quest/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./public/quest/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./public/quest/js/black-dashboard.min.js?v=1.0.0"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="./public/quest/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
</body>

</html>