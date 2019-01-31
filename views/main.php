
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Music App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">



    <link href="<?php echo ROOT_URL; ?>assets/css/style.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">MusicApp</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
            </li>
          </ul>
          <div class="form-inline mt-2 mt-md-0">
            <ul class="navbar-nav mr-auto">
              <?php if(isset($_SESSION['is_logged_in'])): ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo ROOT_URL; ?>/users/logout">Logout</a>
                </li>
              <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo ROOT_URL; ?>/users/login">Login</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo ROOT_URL; ?>/users/register">Register</a>
                </li>
              <?php endif;?>


            </ul>
          </div>
        </div>
      </nav>
    </header>
    <?php if(isset($_SESSION['is_logged_in'])): ?>
    <div class="container">
      <h3 class="text-center mt-5">Welcome, <?php echo $_SESSION['username']; ?></h3>
    </div>
    <?php endif; ?>

    <?php require($view); ?>

    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
       <script type="text/javascript">
         var root_url = '<?php echo ROOT_URL; ?>';

       </script>
       <script src="<?php echo ROOT_URL; ?>assets/js/script.js"></script>
  </body>
</html>
