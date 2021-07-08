<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title><?= SHORT_SITE_URL.' | '.$page_title ?></title>
  <!-- Favicon -->
  <link rel="icon" href="<?= site_url('assets/assets/img/brand/favicon.ico') ?>" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?= site_url('assets/assets/vendor/nucleo/css/nucleo.css') ?>" type="text/css">
  <link rel="stylesheet" href="<?= site_url('assets/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') ?>" type="text/css">
  <link rel="stylesheet" href="<?= site_url('assets/assets/vendor/animate.css/animate.min.css') ?>">

  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?= site_url('assets/assets/css/argon.css?v=1.1.0') ?>" type="text/css">
</head>

<body class="bg-default">

  <!-- Main content -->
  <div class="main-content">

    <!-- Page content -->
    <div class="container py-5 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="card-img text-center">
                <img width="220" height="90" src="<?= site_url('assets/assets/img/brand/logo.png') ?>">
              </div>
              <div class="text-center text-muted mb-4">
                <small><?= SITE_URL ?></small>
              </div>
              <form role="form" id="form-login">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" placeholder="Username" type="text" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox" name="remember">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" id="btn-login" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-light"><small>&copy; 2021 BasisCoding</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="#" class="text-light"><small>V 1.0.0</small></a>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
  
  <!-- Core -->
  <script src="<?= site_url('assets/assets/vendor/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?= site_url('assets/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script> 
  <script src="<?= site_url('assets/assets/vendor/js-cookie/js.cookie.js') ?>"></script>

  <script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#form-login').on('submit', function() {
                    
          $.ajax({
              url: '<?= site_url('Auth/login') ?>',
              type: 'POST',
              dataType:'JSON',
              data: $(this).serialize(),
              beforeSend: function()
              { 
                  $("#btn-login").attr('disabled', '');
                  $("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span>   Sending ...');
              },
              success:function(response) {
                  $.notify({
                    icon: 'ni ni-bell-55',
                    title: response.title,
                    message:response.message
                  },{
                    type:response.status,
                    placement: {
                      from: "top",
                      align: "right"
                    },
                    animate: {
                      enter: 'animated fadeInDown',
                      exit: 'animated fadeOutUp'
                    }
                  });

                  setTimeout(function(){ 
                    window.location.href = response.redirect;
                  }, 1500);
              }
          });

          return false;
      });
    });
  </script>
</body>

</html>