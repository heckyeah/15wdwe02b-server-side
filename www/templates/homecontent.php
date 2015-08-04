<!-- Call to action -->
  <div id="call-to-action">
    <div class="row">
      <div class="medium-8 medium-centered large-uncentered medium-text-center large-text-left columns">
        <h1>Stay up to date with the latest offers!</h1>
        <p>Sign up to our weekly E-Mail and have tailored deals sent directly to your inbox!</p>
        <a href="weekly-subscription.html" class="alert button">Get weekly deals!</a>
      </div>
    </div>
  </div>

  <!-- The latest deals -->
  <div id="latest-deals">
    <div class="row">
      <div class="medium-10 medium-centered columns text-center">
        <h2>The latest deals <br><small>you're welcome.</small></h2>
      </div>
    </div>
    <div class="row">
      <div class="columns">
        <!-- Latest deal containers -->
        <ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">

        <?php
          // Get all the latest deals
          $result = $this->model->getLatestDeals();

          // Loop through each result and display inside a list item
          while( $row = $result->fetch_assoc() ) {
            echo '<li>';
            echo '<a href="index.php?page=deal&dealid='.$row['id'].'"><img src="img/deals/thumbnails/'.$row['image'].'"></a>';
            echo '<h3><a href="index.php?page=deal&dealid='.$row['id'].'">'.$row['name'].'</a></h3>';
            echo '<p>'.$row['description'].'</p>';
            echo '</li>';
          }

        ?>

        </ul>
      </div>
    </div>
  </div>

  <div id="deal-categories">
    <div class="row">
      <div class="columns">
        <h2 class="text-center">Pick a category <br><small>any category...</small></h2>
      </div>
    </div>
    <div class="row">
      <div class="columns">
        <ul class="small-block-grid-2 medium-block-grid-4 large-block-grid-7 text-center">
          <li>
            <p><a href="category.html"><i class="fa fa-cutlery"></i><br>Food</a></p>
          </li>
          <li>
            <p><a href="category.html"><i class="fa fa-tags"></i><br>Shopping</a></p>
          </li>
          <li>
            <p><a href="category.html"><i class="fa fa-heart"></i><br>Beauty</a></p>
          </li>
          <li>
            <p><a href="category.html"><i class="fa fa-laptop"></i><br>Computers</a></p>
          </li>
          <li>
            <p><a href="category.html"><i class="fa fa-subway"></i><br>Transport</a></p>
          </li>
          <li>
            <p><a href="category.html"><i class="fa fa-bed"></i><br>Accomodation</a></p>
          </li>
          <li>
            <p><a href="category.html"><i class="fa fa-plane"></i><br>Travel</a></p>
          </li>
        </ul>
      </div>
    </div>
  </div>