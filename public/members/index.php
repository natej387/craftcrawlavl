<?php 
require_once('../../private/initialize.php');
$page_title = 'Member Progress'; 
include(SHARED_PATH . '/header.php');

$id = $_SESSION['mem_id'];
$member = find_member_by_id($id);

require_login();
?>

<h1 id="progh1">Your Progress</h1>

<div class="breweries" id="breweries">
  <ul>
    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/ashebrewing.png">
      </figure>
      <h2>Asheville Brewing</h2>
      <div class="visit">
        <?php 
            $result = brew1($id);
            if($result == true) {
              echo "visited";
              } else {
              echo "not visited";
            }
          ?>
      </div>
    </li>

    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/bhramari_brewing_asheville_2015.png">
      </figure>
      <h2>Bhramari Brewing</h2>
      <div class="visit">
        <?php $result = brew2($id);
            if($result === true) {
              echo "visited";
              } else {
              echo "not visited";
            }
          ?>
      </div>
    </li>

    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/highwire.png">
      </figure>
      <h2>HighWire Brewing</h2>
      <div class="visit">
        <?php $result = brew3($id);
            if($result === true) {
              echo "visited";
              } else {
              echo "not visited";
            }
          ?>
      </div>
    </li>

    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/Green-man-logo-300x300.png">
      </figure>
      <h2>GreenMan Brewing</h2>
      <div class="visit">
        <?php $result = brew4($id);
            if($result === true) {
              echo "visited";
              } else {
              echo "not visited";
            }
          ?>
      </div>
    </li>

    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/CVB-Color-Logo-JPEG.jpg">
      </figure>
      <h2>Catawba Brewing</h2>
      <div class="visit">
        <?php $result = brew5($id);
            if($result === true) {
              echo "visited";
              } else {
              echo "not visited";
            }
          ?>
      </div>
    </li>

    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/CMLGkHBgDaTw8fAD3CCBd9dP.jpg">
      </figure>
      <h2>Burial Beer Co</h2>
      <div class="visit">
        <?php $result = brew6($id);
            if($result === true) {
              echo "visited";
              } else {
              echo "not visited";
            }
          ?>
      </div>
    </li>

    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/twinleaf.jpg">
      </figure>
      <h2>Twin Leaf Brewing</h2>
      <div class="visit">
        <?php $result = brew7($id);
            if($result === true) {
              echo "visited";
              } else {
              echo "not visited";
            }
          ?>
      </div>
    </li>

    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/wicked.jpg">
      </figure>
      <h2>Wicked-Weed</h2>
      <div class="visit">
        <?php $result = brew8($id);
            if($result === true) {
              echo "visited";
              } else {
              echo "not visited";
            }
          ?>
      </div>
    </li>


    <li>
      <a id="btnCode" class="action" type="button" href="<?php echo url_for('/members/validate_code.php?id=' . h(u($_SESSION['mem_id']))); ?>">Enter Code</a>
    </li>
  </ul>

</div>



<?php include(SHARED_PATH . '/footer.php'); ?>
