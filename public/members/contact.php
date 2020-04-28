<?php 
  require_once('../../private/initialize.php');
  $page_title = 'Contact'; 
  include(SHARED_PATH . '/header.php');
?>

 <div class="container">
    <h1>Contact Us</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="row">
      <div class="col-25">
        <label for="name">Name</label>
      </div>
      <div class="col-75">
        <input type="text" id="name" name="name" placeholder="Name..">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">Email</label>
      </div>
      <div class="col-75">
        <input type="text" id="email" name="email" placeholder="Last name..">
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="subject">Subject</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div> 

<?php include(SHARED_PATH . '/footer.php'); ?>
