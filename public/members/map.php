<?php 
  require_once('../../private/initialize.php');
  $page_title = 'Map'; 
  include(SHARED_PATH . '/header.php'); 
?>

<h1>Map</h1>
<section id="map-responsive">
  <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1CWzVEVYp7dcpP24GBF08Z4XwqTjvdSlp" width="640" height="480"></iframe>
</section>

<?php include(SHARED_PATH . '/footer.php'); ?>
