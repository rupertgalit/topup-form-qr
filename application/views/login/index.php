  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <title>Admin Login</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('/assets/css/login-style.css') ?>"> <!-- Link to the external CSS file -->
    <link rel="shortcut icon" href="<?= base_url('/assets/images/updated_logo.png') ?>">
  </head>

  <body>
    <div class="login" style="transform: scale(1.1);">
      <div id="loginform">
        <div id="ISELCO"><a href="https://iselco2.com.ph/" target="_blank"><img width="200" height="200" src="<?= base_url('/assets/images/logo.png') ?>" alt="logo" class="logo-dark" /></a>
        </div>
        <div id="mainlogin">
          <div id="or">
            <i class="fas fa-user-tie" style="color:white"></i>

          </div>
          <h1>Log in as admin</h1>
          <?php if ($this->session->flashdata('error_message')): ?>
            <center>
            <h6 style="font-size:70%; color:red">
          <?php echo $this->session->flashdata('error_message'); ?>
          </h6>
          </center>
          <?php endif; ?>
          <form action="<?= base_url('auth/login') ?>" method="POST">
            <input type="text" name="username" placeholder="username or email" value="" required>
            <input type="password" name="password" placeholder="password" value="" required>
            <button type="submit"><i class="fa fa-arrow-right"></i></button>
          </form>
          <!-- <div id="note"><a href="#">Forgot your password?</a></div> -->
        </div>
      </div>
    </div>

  </body>

  </html>