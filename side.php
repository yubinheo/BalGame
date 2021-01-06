
<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="./index.php" class="simple-text logo-mini">
            CTF
            </a>
            <a href="./index.php" class="simple-text logo-normal">
            BALGAME
            </a>
        </div>
        <ul class="nav">
            <li class="active ">
            <a href="./index.php">
            <i class="tim-icons icon-bell-55"></i>
            <p>Notice Board</p>
            </a>
            <a href="./rank.php">
            <i class="tim-icons icon-bank"></i>
            <p>Ranking</p>
            </a>
            <a href="./wiki.php">
            <i class="tim-icons icon-book-bookmark"></i>
            <p>WiKi</p>
            </a>
            <a href="./QNA.php">
            <i class="tim-icons icon-book-bookmark"></i>
            <p>QNA Board</p>
            </a>
            <?php if(isset($_SESSION['id'])){ ?>
            <a href="./webhack.php">
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
            <a class="navbar-brand" href="/questions" style="font-size: 30px;">BALGAME</a>
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
                      <li class="nav-link"><a href="../user.php?uid=<?php echo $data["egv"]; ?>" class="nav-item dropdown-item">Profile</a></li>
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