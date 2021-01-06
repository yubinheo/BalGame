<?php 
  include "../system.php";
  isBlockBrowser();
  
    include "../db.php";
    $didx = $_GET['idx']; 
    $result = mq("SELECT  * FROM qna WHERE idx = $didx");
    $data = $result->fetch_array();
?>

<!DOCTYPE html>
<html lang="ko">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>BALGAME - QNA</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/blog-post.css" rel="stylesheet">

</head>

<body>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-md-12">

        <!-- Title -->
        <h1 class="mt-4"><?php echo $data["title"]; ?></h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="../../user.php?uid=<?php echo $data["writer_code"]; ?>"><?php echo $data["writer"]; ?></a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on <?php echo $data["created"]; ?></p>

        <hr>

        <!-- Post Content -->
        <p class="lead"><?php echo $data["contents"]; ?></p>

        <hr>
          <h4 onclick='history.back(-1);'>이전 페이지로 돌아가기</h4>
        <hr>
        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Comment:</h5>
          <div class="card-body">

            <form action="./reply_ok.php" method="POST">
              <input type="hidden" name="gubun" value="comment" />
              <input type="hidden" name="post_idx" value="<?php echo $didx; ?>" />
              <div class="form-group">
                <textarea class="form-control" rows="3" name="contents"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">작성</button>
            </form>
          </div>
        </div>

        <!-- Comment with nested comments -->
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Test</h5>
              Test
            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Test</h5>
                Test
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Test</h5>
                Test
              </div>
            </div>

            <div class="card my-4">
              <h5 class="card-header">Reply:</h5>
              <div class="card-body">
                <form action="./reply_ok.php">
                  <input type="hidden" name="gubun" value="reply" />
                  <input type="hidden" name="post_idx" value="<?php echo $didx; ?>" />
                  <div class="form-group">
                    <textarea class="form-control" rows="3" name="contents"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">작성</button>
                </form>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your HeoYuBin 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
