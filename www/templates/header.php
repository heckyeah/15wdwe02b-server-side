<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $this->model->title; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php echo $this->model->description; ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/css/foundation.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/vendor/modernizr.js"></script>
</head>
<body>

  <!-- Navigation -->
  <div class="contain-to-grid fixed">
    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name"><h1><a href="index.php?page=home">Cheap Deals for Students</a></h1></li>
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
      </ul>

      <section class="top-bar-section">
        <ul class="right">
          <li><a href="index.php?page=home">Home</a></li>
          <li><a href="index.php?page=about">About Us</a></li>
          <li><a href="index.php?page=contact">Contact Us</a></li>
          <li class="show-for-large-up">
            <form action="index.php" method="get">
              <input type="hidden" name="page" value="search">
              <div class="row collapse">
                <div class="medium-8 columns">
                  <input type="search" name="query">
                </div>
                <div class="medium-4 columns">
                  <button class="tiny">Search</button>
                </div>
              </div>
            </form>
          </li>
          <?php

            // If the user is logged in then show their username in link
            // Otherwise just show "account"
            if( isset($_SESSION['username']) ) {
              $text = $_SESSION['username'];
            } else {
              $text = 'Account';
            }

          ?>
          <li class="has-dropdown"><a href="index.php?page=account"><?php echo $text; ?></a>
            <ul class="dropdown">
            <?php

              // If the user is not logged in
              if( !isset($_SESSION['username']) ) : ?>
                <li><a href="index.php?page=register">Register</a></li>
                <li><a href="index.php?page=login">Login</a></li>
              <?php else: ?>
                <li><a href="index.php?page=logout">Logout</a></li>
              <?php endif;

            ?>
              
              
            </ul>
          </li>
        </ul>
      </section>
    </nav>
  </div>







