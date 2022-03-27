<?php 

      // Create database connection
  $db = mysqli_connect("localhost", "root", "", "tour9ja");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);
    $username = mysqli_real_escape_string($db, $_POST['username']);

  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO upload_travel (username, images, text) VALUES ('$username', '$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM upload_travel");

?>  


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Booking</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap"
      rel="stylesheet"
    />
    <script
      src="https://kit.fontawesome.com/5a5a633a88.js"
      crossorigin="anonymous"
    ></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="comments.css" />
    <link rel="stylesheet" href="user.css">
  </head>
  <body>
    <header 
      style=
        "background-image: url('images/comments-img.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        padding: 4rem 7rem;
        height: 55vh;
        text-align: center;
      "
    >
      <nav>
        <img src="images/Logo.svg" alt="brand logo" class="logo" />
        <ul class="nav-links">
          <li><a href="index.html">Home</a></li>
          <li><a href="bookings.html">Bookings</a></li>
          <li><a href="dashboard.php">Dashboard</a></li>
        </ul>
        <div class="nav-btn">
            <a href="logout.php"><button class="login btn">Logout</button></a>
          </div>
      </nav>

      <h1>Share your amazing experience with others!</h1>
    </header>


    <div class="user-story">
        <?php
        while ($row = mysqli_fetch_array($result)) {
          echo "<div id='container'>";
            echo "<div id='img_div'>";
              echo "<img src='images/".$row['images']."' >";
            echo "</div>";
            echo "<div id='comment'>";
              echo "<p>".$row['username']."</p>";
              echo "<p>".$row['text']."</p>";
            echo "</div>";
          echo "</div>";
          }
        ?>
    </div>

  <div id="content" style="">
    <form method="POST" action="user_feedback.php" enctype="multipart/form-data" class="form">
      <input type="hidden" name="size" value="1000000">
      <div>
        <input class="input-group" type="file" name="image">
      </div>
      <div>
        <label for="username" class="user">Username</label>
        <input type="text" name="username" id="username" class="input-group" placeholder="Name">
        <label for="text">Comment</label>
        <textarea 
          class="input-group textarea comment"
          id="text" 
          cols="40" 
          rows="4" 
          name="image_text" 
          placeholder="Say something about this image..."></textarea>
      </div>
      <div>
        <button type="submit" class="btn" name="upload">POST</button>
      </div>
    </form>
  </div>


    <footer>
      <div class="brand">
        <img src="images/Logo.svg" alt="" class="logo-footer" />
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>

      <div class="resources-links">
        <h3>Resources</h3>
        <ul class="footer-links">
          <li><a href="index.html">Home</a></li>
          <li><a href="bookings.html">Bookings</a></li>
          <li>
            <select name="" id="contact" class="contact" style="  font-size: 2.6rem;
            line-height: 4.3rem;
            color: #000;
            background-color: transparent;
            border: 2px solid grey;
            margin-top: 1rem;
            width: 5rem;">
              <option value="1">Contact Us</option>
              <option value="2">tour9ja@yahoo.com</option>
              <option value="3">0791-111-5555</option>
            </select>
          </li>
          <li><a href="register.html">Register</a></li>
        </ul>
      </div>

      <div class="get-started-links">
        <h3>Get Started</h3>
        <ul class="footer-links">
          <li><a href="login.php">Login</a></li>
          <li><a href="register.php">Sign Up</a></li>
        </ul>
      </div>

      <div class="social">
        <h3>Socials</h3>
        <ul class="footer-links">
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Instagram</a></li>
          <li><a href="#">Twitter</a></li>
        </ul>
          <p class="copyright">Copyright © 2022</p>
        </div>
      </div>
    </footer>
  </body>
</html>
