<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>


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
    <link rel="stylesheet" href="bookings.css" />
  </head>
  <body>
    <header 
      style=
        "background-image: url('images/dashboard-img.jpg');
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
          <li><a href="comments.php">feedbacks</a></li>
          <li><a href="user_feedback.php">Experience</a></li>
        </ul>
        <div class="nav-btn">
            <a href="logout.php"><button class="login btn">Logout</button></a>
          </div>
      </nav>

      <h1>My Dashboard</h1>
      <h2 style="color: #fff; font-size: 3.6rem;" id="welcome">Welcome <?=$_SESSION['username']?>!</h2>
    </header>



      <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
      	<?php if ($_SESSION['role'] == 'admin') {?>
      		<!-- For Admin -->
      		<div class="card" style="width: 18rem;">
			  <img src="images/admin-default.png" 
			       class="card-img-top" 
			       alt="admin image">
			  <div class="card-body text-center">
			    <h5 class="card-title">
			    	<?=$_SESSION['username']?>
			    </h5>
			    <a href="logout.php" class="btn btn-dark">Logout</a>
			  </div>
			</div>
			<div class="p-3">
				<?php include 'members.php';
                 if (mysqli_num_rows($res) > 0) {?>
                  
				<h1 class="display-4 fs-1">Members</h1>
				<table class="table" 
				       style="">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Email</th>
				      <th scope="col">User name</th>
				      <th scope="col">Role</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  	$i =1;
				  	while ($rows = mysqli_fetch_assoc($res)) {?>
				    <tr>
				      <th scope="row"><?=$i?></th>
				      <td><?=$rows['email']?></td>
				      <td><?=$rows['username']?></td>
				      <td><?=$rows['role']?></td>
				    </tr>
				    <?php $i++; }?>
				  </tbody>
				</table>
				<?php }?>
			</div>
      	<?php }else { ?>
      		<!-- FORE USERS -->
      		<div class="card" style="width: 18rem;">
			  <img src="images/user-default.png" 
			       class="card-img-top" 
			       alt="admin image">
			  <div class="card-body text-center">
			    <h3 class="card-title">
			    	<?=$_SESSION['username']?>
			    </h3>
			    <a href="logout.php" class="btn btn-dark">Logout</a>
			  </div>
			</div>

      	<?php } ?>
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
          <li><a href="register.php">Register</a></li>
          <li>
            <select name="" id="contact" class="contact" style="  font-size: 2.6rem;
            line-height: 4.3rem;
            color: #000;
            background-color: transparent;
            border: 2px solid grey;
            margin-top: 1rem;
            width: 17rem;">
              <option value="1">Contact Us</option>
              <option value="2">tour9ja@yahoo.com</option>
              <option value="3">0791-111-5555</option>
            </select>
          </li>
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
<?php }else{
	header("Location: index.html");
} ?>
