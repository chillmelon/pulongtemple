<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <!-- bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>
  <!-- custom -->
  <script src="../js/script.js"></script>
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-md navbar-dark">
    <a class="navbar-brand" href="#">Puli.Found.Me</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbarCollapse" style="">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('/') }}">首頁 <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">登入</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">註冊</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="container-fluid top">
    <div class="row">
      <!-- image_main -->
      <div class="imgbox col-sm-12 col-lg-8">
        <div class="imgbox-inner">
          <div class="image" style="background-image: url('../image/pulongTemple.png');"></div>
        </div>
      </div>
      <!-- intro -->
      <div class="intro col-sm-12 col-lg-4">
        <!-- title -->
        <div class="title">
          <h3>
            <b>{{ $title }}</b>
            <br>
            <small> by Pulong Temple</small>
          </h3>
          <hr class="style-eight">
        </div>
        <!-- status -->
        <div class="row status">
          <!-- goal -->
          <div class="goal col-6 col-sm-8 col-lg-6">
            <h3><b>NT${{ $total_amount }}</b></h3>
              <h6>目標 NT${{ $goal }}</h6>
              <h6>贊助人數 {{ $supporter }} 人</h6>
              <hr class="new" color="#8C8C8C">
              <h6>剩餘時間 {{ $time_left }} 天</h6>
              <h6>{{ $created_at }}<br>– {{ $deadline }}</h6>
          </div>
          <!-- Progress bar -->
          <div class="progress_circle col-6 col-sm-4 col-lg-6">
            <div class="green">
              <div class="progress">
                <div class="inner">
                  <div class="percent"><span>{{ $progress }}</span>%</div>
                  <div class="water"></div>
                  <div class="glare"></div>
                </div>
              </div>
            </div>
            <!-- <span>Enter Percentage: <input type="text" placeholder="67" id="percent-box">%</span> -->
            <!-- copyright: progress bar  -->
            <!-- <section id="copyright">
              <div>(c) 2015 June Hanabi - <a href="https://opensource.org/licenses/MIT">License MIT</a> </div>
              <div>Work is modified and inspired from <a href="https://codepen.io/JamieDixon/pen/Pqrjvv">Jamie Dixon's pen</a></div>
            </section> -->
            <!-- END -->
            <!-- <div class="col-sm-12">
            <a href="#" class="btn btn-block btn-danger" type="button">Donate</a>
            </div> -->
          </div>
        </div>
        <!-- description -->
        <div class="description">
          <p class="lead">
            　　{{ $content }}
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- medium navbar -->
  <nav class="navbar navbar-expand-md navbar-dark sticky-top ">
    <a class="navbar-brand" href="#">Sticky top</a>
  </nav>
  <!-- content -->
  <div class="imgbox col-sm-12 col-lg-8">
    <div class="imgbox-inner">
      <div class="image" style="background-image: url('../image/pulongTemple.png');"></div>
    </div>
  </div>
  <div class="imgbox col-sm-12 col-lg-8">
    <div class="imgbox-inner">
      <div class="image" style="background-image: url('../image/pulongTemple.png');"></div>
    </div>
  </div>
  <div class="imgbox col-sm-12 col-lg-8">
    <div class="imgbox-inner">
      <div class="image" style="background-image: url('../image/pulongTemple.png');"></div>
    </div>
  </div>
  <div class="imgbox col-sm-12 col-lg-8">
    <div class="imgbox-inner">
      <div class="image" style="background-image: url('../image/pulongTemple.png');"></div>
    </div>
  </div>
  <div class="imgbox col-sm-12 col-lg-8">
    <div class="imgbox-inner">
      <div class="image" style="background-image: url('../image/pulongTemple.png');"></div>
    </div>
  </div>
  <div class="imgbox col-sm-12 col-lg-8">
    <div class="imgbox-inner">
      <div class="image" style="background-image: url('../image/pulongTemple.png');"></div>
    </div>
  </div>
  <div class="imgbox col-sm-12 col-lg-8">
    <div class="imgbox-inner">
      <div class="image" style="background-image: url('../image/pulongTemple.png');"></div>
    </div>
  </div>
  <div class="imgbox col-sm-12 col-lg-8">
    <div class="imgbox-inner">
      <div class="image" style="background-image: url('../image/pulongTemple.png');"></div>
    </div>
  </div>
  <!-- scripts -->
  <script type="text/javascript">
  var colorInc = 100 / 3;
  $(function() {
    // progress_bar
    $("#percent-box").click(function() {
      $(this).select();
    });

    $("#percent-box").keyup(function() {
      var val = $(this).val();

      if (val != "" &&
        !isNaN(val) &&
        val <= 100 &&
        val >= 0) {
        console.log(val);

        var valOrig = val;
        val = 100 - val;

        if (valOrig == 0) {
          $("#percent-box").val(0);
          $(".progress .percent").text(0 + "%");
        } else $(".progress .percent").text(valOrig + "%");

        $(".progress").parent().removeClass();
        $(".progress .water").css("top", val + "%");

        if (valOrig < colorInc * 1)
          $(".progress").parent().addClass("red");
        else if (valOrig < colorInc * 2)
          $(".progress").parent().addClass("orange");
        else
          $(".progress").parent().addClass("green");
      } else {
        $(".progress").parent().removeClass();
        $(".progress").parent().addClass("green");
        $(".progress .water").css("top", 100 - 67 + "%");
        $(".progress .percent").text(67 + "%");
        $("#percent-box").val("");
      }
    });
  });
  //fixed nav on scroll
  if ($(window).width() > 992) {
    $(window).scroll(function() {
      if ($(this).scrollTop() > 40) {
        $('#navbar_top').addClass("fixed-top");
        // add padding top to show content behind navbar
        $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
      } else {
        $('#navbar_top').removeClass("fixed-top");
        // remove padding top from body
        $('body').css('padding-top', '0');
      }
    });
  }
  </script>
</body>

</html>