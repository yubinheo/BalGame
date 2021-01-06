<?php 
include "../system.php";
isBlockBrowser();

include "../db.php";
if(!isset($_SESSION['id'])){
  echo "<script>alert('로그인 후 이용가능합니다.'); history.back(-1);</script>";
} 
?>

<!DOCTYPE html>
<html lang="ko">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../public/quest/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../public/quest/img/favicon.png">
  <title>
    BALGAME - Web Questions
  </title>
  <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
  <link href="../public/quest/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../public/quest/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
  <link href="../public/quest/demo/demo.css" rel="stylesheet" />
</head>

<body class="" style="font-family: 'Do Hyeon', sans-serif; font-size: 20px;">
  <div class="wrapper">
  <div class="wrapper">
    <?php include "../side.php"; ?>
    <div class="main-panel">
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h2 class="title">WebHacking Questions</h5>
              </div>
                  <?php
                  $sql = mq("select * from questions_web order by idx asc");
                  while($data = $sql->fetch_array()) { ?>
                    <div class="card-body all-icons" id="<?php echo $data["quest_num"]; ?>">
                      <div class="font-icon-detail" style="height: 400px;">
                        <i class="tim-icons icon-paper"></i>
                        <p style="font-size: 30px;"><?php 
                        $query2 = mysqli_query($conn, "SELECT EXISTS (SELECT * FROM finish_users WHERE quest_num='".$data["quest_num"]."' and user_id='".$_SESSION['id']."') as ok") or die("알 수 없는 오류");
                        $data2 = $query2->fetch_array();
                        if($data2['ok'] == 1) {
                          echo $data["quest_num"].". "; echo $data["title"]; ?> (<?php echo $data["score"]; ?>점) <span style="color: lightgreen;">(Solved)</span>
                        <?php } else { 
                          echo $data["quest_num"].". "; echo $data["title"]; ?> (<?php echo $data["score"]; ?>점)
                        <?php } ?> </p>
                        <p style="font-size: 10px;">
                        <button type="button" style="width: 80%" class="btn btn-primary" data-toggle="modal" data-target="#Quest_<?php echo $data["idx"]; ?>">
                          View More
                        </button>
                        </p> <br /><br />
                        <?php if($data2['ok'] == 1) { ?>
                          <p style="font-size:25px;"><span style="color: lightcoral;">이미 해결한 문제는 중복 제출할 수 없습니다.</span></p>
                          
                        
                        <?php } else { ?>

                          <form action="./web_flag_ok.php" method="get">
                            <input type="hidden" name="quest_num" value="<?php echo $data["quest_num"]; ?>">
                            <input type="text" class="form-control" id="inlineFormInputGroup" name="flag" placeholder="플래그 값 (flag_is_ 제외) 입력 후 엔터!" style="width: 80%; margin: 0 auto; background-color:white; color:black;">
                            <button type="submit" style="width: 80%; margin: 0 auto;" class="btn btn-primary" id="search-button">
                              Input FLAG
                            </button>
                          </form>

                        <?php } ?>
                      </div>
   
                    </div>
                  <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav ml-auto">
          <li class="search-bar input-group">
            <button class="btn btn-link" id="search-button" data-toggle="modal" data-target="#searchModal"><i class="tim-icons icon-zoom-split" ></i>
              <span class="d-lg-none d-md-block">Search</span>
            </button>
          </li>
        </ul>
      </div>
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
      </ul>
    </div>
  </div>

  <script src="../public/quest/js/core/jquery.min.js"></script>
  <script src="../public/quest/js/core/popper.min.js"></script>
  <script src="../public/quest/js/core/bootstrap.min.js"></script>
  <script src="../public/quest/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <script src="../public/quest/js/plugins/chartjs.min.js"></script>
  <script src="../public/quest/js/plugins/bootstrap-notify.js"></script>
  <script src="../public/quest/js/black-dashboard.min.js?v=1.0.0"></script>
  <script src="../public/quest/demo/demo.js"></script>

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

          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

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

    function fnMove(seq){
      var offset = $("#" + seq).offset();
      var winH = $(window).height();
      if(seq == 'main') {
          $('html, body').stop().animate({ scrollTop : -930 });
      } else {
          $('html, body').animate({scrollTop : (offset.top - 150)}, 400);
      } 
    }
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>

    <!-- Modal -->
  <?php $sql = mq("select * from questions_web order by idx asc");
  while($data = $sql->fetch_array()) { ?>
    <div class="modal fade" id="Quest_<?php echo $data["idx"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" id="exampleModalLabel"><?php echo $data["title"]; ?></h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php echo nl2br($data["contents"]); ?>
            <hr /> (힌트) 
            <?php 
              if ($data["hint"] == "NULL") {
                echo "힌트가 없습니다.";
              } else {
                echo $data["hint"];
              }
            ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Exit</button>
          <a href="./<?php echo $data['page']; ?>" target="_blank"><button type="button" class="btn btn-primary">Go</button></a>  
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

</body>

</html>