<?php 
require_once('../../private/initialize.php');
$page_title = 'Member Progress'; 
include(SHARED_PATH . '/header.php');


if (is_logged_in() == false) {
  
  redirect_to(url_for('../login.php')); 
  } 

$id = $_SESSION['mem_id'];
$member = find_member_by_id($id);
?>

<h1 id="progh1">Your Progress</h1>

<div class="breweries" id="breweries">
  <ul>
    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/ashebrewing.png" alt="asheville brewing logo">
      </figure>
      <h2>Asheville Brewing</h2>
      <a href="https://www.ashevillebrewing.com/" target="_blank">Visit Site</a>
            <a href="https://www.google.com/maps/place/Asheville+Brewing+Company/@35.5953354,-82.5568308,15.5z/data=!4m8!1m2!2m1!1sasheville+brewing!3m4!1s0x8859f35140b9ec0b:0x673d7a64410a0be6!8m2!3d35.5917507!4d-82.555212" target="_blank">Get Directions</a>
      <div class="visit">
        <?php 
            $result = brewStatus($id, 1);
            if($result == true) {
              echo "Visited";
              } else {
              echo "Not Visited";
            }
          ?>
      </div>
    </li>

    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/bhramari_brewing_asheville_2015.png" alt="bhramari logo">
      </figure>
      <h2>Bhramari Brewing</h2>
      <a href="https://www.bhramaribrewing.com/" target="_blank">Visit Site</a>
            <a href="https://www.google.com/maps/place/Bhramari+Brewing+Company/@35.5914943,-82.5542075,17z/data=!3m1!4b1!4m5!3m4!1s0x8859f350bbf08cc3:0x79c0fd8788d492a7!8m2!3d35.5914943!4d-82.5520188" target="_blank">Get Directions</a>
      <div class="visit">
        <?php $result = brewStatus($id, 2);
            if($result === true) {
              echo "Visited";
              } else {
              echo "Not Visited";
            }
          ?>
      </div>
    </li>

    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/highwire.png" alt="highwire logo">
      </figure>
      <h2>HighWire Brewing</h2>
      <a href="https://hiwirebrewing.com/" target="_blank">Visit Site</a>
            <a href="https://www.google.com/maps/place/Hi-Wire+Brewing+-+South+Slope/@35.5912661,-82.5581275,17z/data=!3m1!4b1!4m5!3m4!1s0x8859f35167aa4f01:0xefe2fb0499d15dc8!8m2!3d35.5912661!4d-82.5559388" target="_blank">Get Directions</a>
      <div class="visit">
        <?php $result = brewStatus($id, 3);
            if($result === true) {
              echo "Visited";
              } else {
              echo "Not Visited";
            }
          ?>
      </div>
    </li>

    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/Green-man-logo-300x300.png" alt="greenman logo">
      </figure>
      <h2>GreenMan Brewing</h2>
      <a href="http://www.greenmanbrewery.com/" target="_blank">Visit Site</a>
            <a href="https://www.google.com/maps/place/Green+Man+Brewery/@35.5886605,-82.5547056,17z/data=!3m1!4b1!4m5!3m4!1s0x8859f3504859377f:0xe63922c80f0e7287!8m2!3d35.5886605!4d-82.5525169" target="_blank">Get Directions</a>
      <div class="visit">
        <?php $result = brewStatus($id, 4);
            if($result === true) {
              echo "Visited";
              } else {
              echo "Not Visited";
            }
          ?>
      </div>
    </li>

    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/CVB-Color-Logo-JPEG.jpg" alt="catawba logo">
      </figure>
      <h2>Catawba Brewing</h2>
      <a href="https://catawbabrewing.com/" target="_blank">Visit Site</a>
            <a href="https://www.google.com/maps/place/Catawba+Brewing+Company+South+Slope+Asheville/@35.589068,-82.5557257,17z/data=!3m1!4b1!4m5!3m4!1s0x8859f35052abf78f:0x84c3da9609a75c91!8m2!3d35.589068!4d-82.553537" target="_blank">Get Directions</a>
      <div class="visit">
        <?php $result = brewStatus($id, 5);
            if($result === true) {
              echo "Visited";
              } else {
              echo "Not Visited";
            }
          ?>
      </div>
    </li>

    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/CMLGkHBgDaTw8fAD3CCBd9dP.jpg" alt="burial beer logo">
      </figure>
      <h2>Burial Beer Co</h2>
      <a href="https://burialbeer.com/" target="_blank">Visit Site</a>
            <a href="https://www.google.com/maps/place/Burial+Beer+Co./@35.588049,-82.5559847,17z/data=!3m1!4b1!4m5!3m4!1s0x8859f351ccc58e73:0x6c5b45a3497c7c1e!8m2!3d35.588049!4d-82.553796" target="_blank">Get Directions</a>
      <div class="visit">
        <?php $result = brewStatus($id, 6);
            if($result === true) {
              echo "Visited";
              } else {
              echo "Not Visited";
            }
          ?>
      </div>
    </li>

    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/twinLeaf.jpg" alt="twin leaf logo">
      </figure>
      <h2>Twin Leaf Brewing</h2>
      <a href="http://www.twinleafbrewery.com/" target="_blank">Visit Site</a>
            <a href="https://www.google.com/maps/place/Twin+Leaf+Brewery/@35.5894151,-82.5569085,17z/data=!3m1!4b1!4m5!3m4!1s0x8859f351a462c6e7:0x1a8f83a6b096b605!8m2!3d35.5894151!4d-82.5547198" target="_blank">Get Directions</a>
      <div class="visit">
        <?php $result = brewStatus($id, 7);
            if($result === true) {
              echo "Visited";
              } else {
              echo "Not Visited";
            }
          ?>
      </div>
    </li>

    <li class="brewery">
      <figure>
        <img src="../../assets/brewlogos/wicked.jpg" alt="wicked-weed logo">
      </figure>
      <h2>Wicked-Weed</h2>
      <a href="https://www.wickedweedbrewing.com/" target="_blank">Visit Site</a>
            <a href="https://www.google.com/maps/place/Wicked+Weed+Brewing+Pub/@35.591694,-82.5532212,17z/data=!3m1!4b1!4m5!3m4!1s0x8859f350a79b0c25:0xfdd7d81ab16a7766!8m2!3d35.591694!4d-82.5510325" target="_blank">Get Directions</a>
      <div class="visit">
        <?php $result = brewStatus($id, 8);
            if($result === true) {
              echo "Visited";
              } else {
              echo "Not Visited";
            }
          ?>
      </div>
    </li>

    <li id="btnCode-li">
      <a id="btnCode" class="action" type="button" href="<?php echo url_for('/members/validate_code.php?id=' . h(u($_SESSION['mem_id']))); ?>">Enter Code</a>
    </li>
  </ul>

</div>
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Congratulation! You have completed the crawl!</p>
  </div>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
