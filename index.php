<?php include 'main.php'; ?>
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Nith's URL Shortner</title>
  <meta content="The shortest URL shortner, URL Shortning service with analytics" name="description">
  <meta content="URL, Shortner, URL Shortner, Nithin S, Nithin, Nith, Bitly, Tinyurl" name="keywords">
  <link href="assets/img/Logo.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <meta name="google-signin-client_id" content="408902227454-66nc070rqp0s3h1ic4vbiof65u9hs3n8.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://www.google.com/recaptcha/api.js?render=6Ld9sQAVAAAAABYTMt2kBplwTLvqLxteJDZe52rm"></script>
<script>
  grecaptcha.ready(function() {
      grecaptcha.execute('6Ld9sQAVAAAAABYTMt2kBplwTLvqLxteJDZe52rm', {action: 'homepage'}).then(function(token) {
         // console.log(token);
         document.getElementById("token").value = token;
      });
  });
  </script>
</head>
<body>
  <section id="hero">
    <div class="hero-container">
      <a href="index.html" class="hero-logo" data-aos="zoom-in"><img src="assets/img/LogoG.png" alt="" width="200px"></a>
      <h1 data-aos="zoom-in">Nith's URL Shortner</h1>
      <h2 data-aos="fade-up">The shortest URL shortner</h2>
      <form method="POST" action="">
      <input type="text" name="user" value="<?php if(isset($_COOKIE["userID"])) {echo $_COOKIE["userID"];}else{echo 1;}?>" hidden>
      <input type="hidden" id="token" name="token">
      <input type="text" name="textarea" class="form-control" id="name" placeholder="Enter large url" data-type="url" data-msg="Please enter a valid URL" style="max-width: 500px;padding: 1.3em ; margin-top: 20px;"/>
      <button data-aos="fade-up" class="btn-get-started scrollto" type="submit" name="submit" style="border:none;">Shorten It</button>
      </form>
    </div>
  </section>
  <header id="header" class="d-flex align-items-center">
    <div class="container">

      <!-- Mobile Logo -->
      <div class="logo d-block d-lg-none">
        <a href="index.html"><img src="assets/img/Logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul class="nav-inner">
          <li class="active"><a href="index.html">Home</a></li>
          
          <li><a href="#services">Services</a></li>

          <li class="nav-logo"><a href="index.html"><img src="assets/img/Logo.png" alt="" class="img-fluid" width="65px"></a></li>

          
          <li><a href="#analytics">Analytics</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="apidocs.php" target="_blank">API</a></li>

        </ul>
      </nav>

    </div>
  </header>

  <main id="main">

<section id="pricing" class="pricing section-bg">
      <div class="container">
		<?php
      			  
                  $conn = new mysqli($host, $dbuser, $dbpass, $dbname);
                  if (!$conn) {
                      echo '<script>alert("DATABASE NOT CONNECTED")</script>';
                  }
      			  $query = "SELECT COUNT(id) AS total from links";
                  $result = $conn->query($query);
                  $row = $result->fetch_assoc();
      			  $links = $row["total"];
      			  $query = "SELECT SUM(clicks) AS total from links";
                  $result = $conn->query($query);
                  $row = $result->fetch_assoc();
      			  $clicks = $row["total"];
     	 ?>
        <div class="section-title" data-aos="fade-up">
          <h2>Stats</h2>
          <p>Refresh the page to see them update</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6" style="margin-bottom:10px;">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
            <h3>Links till date</h3>
              <h4><?php echo $links + 200;?><span> links</span></h4>
            </div>
          </div>

          <div class="col-lg-4 col-md-6" style="margin-bottom:10px;">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
            <h3>Total redirections</h3>
              <h4><?php echo $clicks;?><span> redirections</span></h4>
            </div>
          </div>
        
        <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="zoom-in" data-aos-delay="100">
            <h3>Server uptime</h3>
              <h4><?php echo floor(preg_replace ('/\.[0-9]+/', '', file_get_contents('/proc/uptime')) / 3600);?><span> hours</span></h4>
            </div>
          </div>

        </div>

      </div>
    </section>
  
  
  
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p>Why Choose us ?</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1">
          <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-laptop"></i>
              <h4>Chrome Extension</h4>
          <p>You can now get your links shortened at the comfort of your browser tab <a href="https://nith.ml/extpopup" target="_blank">Click here to install</a></p>
            </div><br>
            <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up">
              <i class="bx bx-fast-forward"></i>
              <h4>50ms response time</h4>
              <p>Get your links shortned at the highest speed</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
              <i class="bx bxs-server"></i>
              <h4>100% uptime</h4>
              <p>We try provide 24 x 7 uptime of our servers. <br> <a href="https://status.nith.ml" target="_blank">Click to check our uptime status and history</a></p>
             
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-link"></i>
              <h4>Short URLs</h4>
              <p>We provide you easy to remember short URLs</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-bar-chart-alt"></i>
              <h4>Analytics</h4>
              <p>You can get detailed analytics on your short link's usage</p>
            </div>
          </div>
          <div class="image col-lg-6 order-1 order-lg-2" style='background-image: url("assets/img/services.png");' data-aos="fade-left" data-aos-delay="100"></div>
        </div>

      </div>
    </section><!-- End Services Section -->

    

    <section id="analytics" class="pricing section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Analytics</h2>
          <p>Analytics provided here are recorded from our own servers</p>
        </div>

        <div class="row">

          <div class="col-lg-12 col-md-6">
            <div class="box" data-aos="zoom-in" data-aos-delay="100" style="text-align: center;align-items:center">
              
              <table class="table table-responsive analytics-table" hidden>
                <thead class="thead-dark">
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">URL</th>
                  <th scope="col">Short Link</th>
                  <th scope="col">Clicks</th>
                  <th scope="col">Delete</th>
                  <th scope="col">Created at</th>
                  <th scope="col">Last accessed</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $cookie_name = "userID";
                if(!isset($_COOKIE[$cookie_name])) {
                    echo " ";
                } else {
                  $query = "SELECT * from links where user='".$_COOKIE[$cookie_name]."'";
                  $result = $conn->query($query);
                  if ($result->num_rows > 0) {
                    $id=0;
                    $usermod = substr($_COOKIE[$cookie_name],10,11)."9481599862".substr($_COOKIE[$cookie_name],0,10)."4342039881";
                    while($row = $result->fetch_assoc()) {
                        $id=$id+1;
                        echo "<tr><td scope=\"row\">".$id."</td><td style=\"max-width:300px;overflow:hidden;text-overflow:ellipsis;\">".$row["url"]."</td><td><a href=\"https://nith.ml/".$row["title"]."\" style=\"color:blue;\">".$row["title"]."</a></td><td>".$row["Clicks"]."</td><td><a href=\"delete.php?title=".$row["title"]."&user=".$usermod."\"><button class=\"no-style-button\"><i class=\"bx bx-trash\"></i></button></a></td><td>".$row["created_at"]."</td><td>".$row["recent_access"]."</td></tr>";
                    }
                } else {
                    echo "No links found";
                }
                $conn->close();
                }
                ?>
              </tbody>
              </table>
              <?php
                $cookie_name = "userID";
                if(!isset($_COOKIE[$cookie_name])) {
                    echo "Sign-in to see analytics of your shortlinks";
                } else {
                  echo "<br><br>Sign-in with another account to see analytics of your shortlinks";
                }
                ?>
              <div class="g-signin2" data-onsuccess="onSignIn"></div>
            </div>
          </div>

        </div>

      </div>
    </section>


  <section id="testimonials" class="testimonials">
  <div class="container" data-aos="zoom-in">
    <div class="quote-icon">
      <i class="bx bxs-quote-right"></i>
    </div>
    <div class="owl-carousel testimonials-carousel">
	<div class="testimonial-item">
        <p>
          Ever wondered what's the benefit of being short? You'll find this answer here
        </p>
        <img src="assets/img/testimonials/sid.jpg" class="testimonial-img" alt="">
        <h3>Siddhanth Hegde</h3>
        <h4>Data Scientist</h4>
     </div>
    
      <div class="testimonial-item">
        <p>
          Nith's url shortner: your URLs shorter than shortest
        </p>
        <img src="assets/img/testimonials/babu.jpeg" class="testimonial-img" alt="">
        <h3>Shreyas MK</h3>
        <h4>Coder</h4>
      </div>

      <div class="testimonial-item">
        <p>
        Best and easiest URL shortner I have ever seen.
          Keep things 'Short' because life is 'Short'
        </p>
        <img src="assets/img/testimonials/bhuvan.jpg" class="testimonial-img" alt="">
        <h3>Bhuvan Jain SM</h3>
        <h4>Web Enthusiast</h4>
      </div>

    </div>

  </div>
</section>

    <section id="contact" class="contact section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Contact us if you face any website issues</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="info d-flex flex-column justify-content-center" data-aos="fade-right">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Location:</h4>
                <p>Hassan,<br>Karnataka, IN 573202</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>oneandonlytobe@gmail.com</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Call:</h4>
                <p>+919481543420</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form target="_blank" action="https://formsubmit.co/bf1f93f75e848faabe9bff639cfb7578" method="POST" role="form" class="php-email-form" data-aos="fade-left">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="_subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
            <input type="hidden" name="_captcha" value="false">
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section>

  </main>

  <footer id="footer">

    <div class="footer-top">

      <div class="container">

        <div class="row justify-content-center">
          <div class="col-lg-6">
            <a href="#header" class="scrollto footer-logo"><img src="assets/img/LogoG.png" alt=""></a>
            <h3>Nith's URL Shortner</h3>
            <p>The Shortest URL Shortner</p>
          </div>
        </div>

        

        <div class="social-links">
          <a href="https://twitter.com/Techin_Studio" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="https://www.facebook.com/hackernithin" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="https://www.instagram.com/nithin_s.gowda/" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="https://www.github.com/NithinSGowda" class="github"><i class="bx bxl-github"></i></a>
          <a href="https://www.linkedin.com/in/NithinSGowda" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>

      </div>
    </div>

    <div class="container footer-bottom clearfix">
      <div class="copyright" style="color: rgba(216, 191, 216, 0);">
        &copy; Copyright <strong><span>Knight</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Developed by <a href="http:///www.instagram.com/nithin_s.gowda/">Nithin S Gowda</a>
      </div>
      <div class="credits">
       <span style="color: rgba(216, 191, 216, 0);"> Designed by <a href="https://bootstrapmade.com/" style="color: rgba(216, 191, 216, 0);">BootstrapMade</a></span>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="script.js"></script>
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/js/main.js"></script>

</body>

</html>