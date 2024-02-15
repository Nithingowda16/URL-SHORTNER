<?php include 'config.php'; ?>
<?php include 'main.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>API - Nith's URL Shortner</title>
  <meta content="Get shortlinks for any need directly from your front/back end through this API" name="description">
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
<style>
    .code{
        background-color: rgb(48, 48, 48);
        font-family: monospace;
        font-size: 1.2em;
        color: white;
    overflow: scroll
    }
    .url{
        background-color: rgba(123, 255, 0, 0.185);
    }
    .user{
        background-color: rgba(0, 102, 255, 0.219);
    }
    .co{
        background-color: rgba(230, 230, 230, 0.349);
        color: rgb(0, 0, 0);
    }
</style>
</head>
<body>
  
  <header id="header" class="d-flex align-items-center">
    <div class="container">

      <div class="logo d-block d-lg-none">
        <a href="index.html"><img src="assets/img/Logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul class="nav-inner">
          <li class="active"><a href="index.php">Home</a></li>
          
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
    <section id="api" class="api">
        <div class="container">
  
          <div class="section-title" data-aos="fade-up">
            <h2>API</h2>
            <p>Documentation of nith.ml API</p>
          </div>
  	<br>
          <div>
              <div class="co p-3 pt-5">
                <h4>API URL : <a href="https://nith.ml/API.php"><span style="font-weight:bold; color: rgb(0, 119, 255);">https://nith.ml/API.php</span></a></h4>
                <h4>Method : <span style="font-weight:bold;">POST</span></h4>
                <h4>Form data : </span></h4>
                <div class="pl-3">
                    <ol>
                        <li>link = <span style="font-weight:bold;">https://anylonglink.com</span></li>
                        <li>user = UserId to track analytics. Set it to <span style="font-weight:bold;">0 </span>if you have none</li>
                        <li>submit = <span style="font-weight:bold;">TRUE</span></li>
                    </ol>
                </div><br></div><br>
                <div>
                    <h5>For example your requirements are as follows</h5><br>
                    <form>
                        <div class="form-group">
                          <label for="formGroupExampleInput">Long URL</label>
                          <input type="text" class="form-control" id="url" placeholder="Enter long URL here">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">userID</label>
                          <input type="number" class="form-control" id="user" placeholder="Enter GoogleID for analytics or else default it to 0" value="<?php if(isset($_COOKIE["userID"])) {echo $_COOKIE["userID"];}else{echo 0;}?>">
                        <small id="roomHelp" class="form-text text-muted">*Sign-in on nith.ml to get your userId </small>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="generate()">Generate API code</button>
                      </form>
                </div>
                <br><br>
          </div>
          <div class="container"><br>
              <h3>Javascript - fetch()</h3><br>
              <div class="container code p-5 jsxhr">
                <br>var myHeaders = new Headers();
<br>
				<br>var formdata = new FormData();
				<br>formdata.append("submit", "true");
				<br>formdata.append("link", "<span class="url">http://longurl.com</span>");
				<br>formdata.append("user", "<span class="user">0</span>");
<br>
				<br>var requestOptions = {
        			<br>method: 'POST',
        			<br>headers: myHeaders,
        			<br>body: formdata,
        			<br>redirect: 'follow'
				<br>};
<br>
				<br>fetch("https://nith.ml/API.php", requestOptions)
        		<br>	.then(response => response.text())
        		<br>	.then(result => console.log(result))
        		<br>	.catch(error => console.log('error', error));
              </div>
          </div>
    
    		<div class="container"><br>
              <h3>Javascript - XHR</h3><br>
              <div class="container code p-5 jsxhr">
                var data = new FormData();<br>
                data.append("link", "<span class="url">http://longurl.com</span>");<br>
                data.append("submit", "true");<br>
                data.append("user", "<span class="user">0</span>");<br>
                <br>
                var xhr = new XMLHttpRequest();<br>
                xhr.withCredentials = true;<br>
                <br>
                xhr.addEventListener("readystatechange", function () {<br>
                  if (this.readyState === 4) {<br>
                    console.log(this.responseText);<br>
                  }<br>
                });<br>
                <br>
                xhr.open("POST", "https://nith.ml/API.php");<br>
                xhr.setRequestHeader("cache-control", "no-cache");<br>
                <br>
                xhr.send(data);
              </div>
          </div>

          
          <div class="container"><br><br><br>
            <h3>jQuery</h3><br>
            <div class="container code p-5 jquery">
                <br>var form = new FormData();
                <br>form.append("link", "<span class="url">http://longurl.com</span>");
                <br>form.append("submit", "true");
                <br>form.append("user", "<span class="user">0</span>");
                <br>
                <br>var settings = {
                <br>  "async": true,
                <br>  "crossDomain": true,
                <br>  "url": "https://nith.ml/API.php",
                <br>  "method": "POST",
                <br>  "headers": {
                <br>    "cache-control": "no-cache",
                <br>  },
                <br>  "processData": false,
                <br>  "contentType": false,
                <br>  "mimeType": "multipart/form-data",
                <br>  "data": form
                <br>}
                <br>
                <br>$.ajax(settings).done(function (response) {
                <br>  console.log(response);
                <br>});
            </div>
        </div>

        <div class="container"><br><br><br>
            <h3>NodeJS - Native</h3><br>
            <div class="container code p-5 jquery">
                <br>var http = require("https");
<br>
                <br>var options = {
                <br>"method": "POST",
                <br>"hostname": "nith.ml",
                <br>"port": null,
                <br>"path": "/API.php",
                <br>"headers": {
                <br>    "content-type": "multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                <br>    "cache-control": "no-cache",
                <br>}
                <br>};
<br>
                <br>var req = http.request(options, function (res) {
                <br>var chunks = [];
<br>
                <br>res.on("data", function (chunk) {
                <br>    chunks.push(chunk);
                <br>});
<br>
                <br>res.on("end", function () {
                <br>    var body = Buffer.concat(chunks);
                <br>    console.log(body.toString());
                <br>});
                <br>});
<br>
                <br>req.write("------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"link\"\r\n\r\n<span class="url">http://longurl.com</span>\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"submit\"\r\n\r\ntrue\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"user\"\r\n\r\n<span class="user">0</span>\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--");
                <br>req.end();
            </div>
        </div>

        <div class="container"><br><br><br>
            <h3>NodeJS - Request</h3><br>
            <div class="container code p-5 jquery">
                <br>var request = require("request");
<br>
                <br>var options = { method: 'POST',
                <br>url: 'https://nith.ml/API.php',
                <br>headers: 
                <br>{ 
                <br>    'cache-control': 'no-cache',
                <br>    'content-type': 'multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW' },
                <br>formData: 
                <br>{ link: '<span class="url">http://longurl.com</span>',
                <br>    submit: 'true',
                <br>    user: '<span class="user">0</span>' } };
<br>
                <br>request(options, function (error, response, body) {
                <br>if (error) throw new Error(error);
<br>
                <br>console.log(body);
                <br>});

            </div>
        </div>

        <div class="container"><br><br><br>
            <h3>PHP - cURL</h3><br>
            <div class="container code p-5 jquery">
                <br>&lt;?php
<br>
                <br>$curl = curl_init();
<br>
                <br>curl_setopt_array($curl, array(
                <br>CURLOPT_URL => "https://nith.ml/API.php",
                <br>CURLOPT_RETURNTRANSFER => true,
                <br>CURLOPT_ENCODING => "",
                <br>CURLOPT_MAXREDIRS => 10,
                <br>CURLOPT_TIMEOUT => 30,
                <br>CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                <br>CURLOPT_CUSTOMREQUEST => "POST",
                <br>CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"link\"\r\n\r\n<span class="url">http://longurl.com</span>\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"submit\"\r\n\r\ntrue\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"user\"\r\n\r\n<span class="user">0</span>\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
                <br>CURLOPT_HTTPHEADER => array(
                <br>    "cache-control: no-cache",
                <br>    "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
                <br>),
                <br>));
<br>
                <br>$response = curl_exec($curl);
                <br>$err = curl_error($curl);
<br>
                <br>curl_close($curl);
<br>
                <br>if ($err) {
                <br>echo "cURL Error #:" . $err;
                <br>} else {
                <br>echo $response;
                <br>}
                <br>?>
            </div>
        </div>

        <div class="container"><br><br><br>
            <h3>PHP - HttpRequest</h3><br>
            <div class="container code p-5 jquery">
                <br>&lt;?php
<br>
                <br>$request = new HttpRequest();
                <br>$request->setUrl('https://nith.ml/API.php');
                <br>$request->setMethod(HTTP_METH_POST);
<br>
                <br>$request->setHeaders(array(
                <br>'cache-control' => 'no-cache',
                <br>'content-type' => 'multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW'
                <br>));
<br>
                <br>$request->setBody('------WebKitFormBoundary7MA4YWxkTrZu0gW
                <br>Content-Disposition: form-data; name="link"
<br>
                <br><span class="url">http://longurl.com</span>
                <br>------WebKitFormBoundary7MA4YWxkTrZu0gW
                <br>Content-Disposition: form-data; name="submit"
<br>
                <br>true
                <br>------WebKitFormBoundary7MA4YWxkTrZu0gW
                <br>Content-Disposition: form-data; name="user"
<br>
                <br><span class="user">0</span>
                <br>------WebKitFormBoundary7MA4YWxkTrZu0gW--');
<br>
                <br>try {
                <br>$response = $request->send();
<br>
                <br>echo $response->getBody();
                <br>} catch (HttpException $ex) {
                <br>echo $ex;
                <br>}
                <br>?>
            </div>
        </div>

        <div class="container"><br><br><br>
            <h3>Python</h3><br>
            <div class="container code p-5 jquery">
                <br>import requests
<br>
                <br>url = "https://nith.ml/API.php"
<br>
                <br>payload = "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"link\"\r\n\r\n<span class="url">http://longurl.com</span>\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"submit\"\r\n\r\ntrue\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"user\"\r\n\r\n<span class="user">0</span>\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--"
                <br>headers = {
                <br>    'content-type': "multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
                <br>    'cache-control': "no-cache"
                <br>    }
<br>
                <br>response = requests.request("POST", url, data=payload, headers=headers)
<br>
                <br>print(response.text)
            </div>
        </div>

        <div class="container"><br><br><br>
            <h3>Java OK Http</h3><br>
            <div class="container code p-5 jquery">
                <br>OkHttpClient client = new OkHttpClient();
<br>
                <br>MediaType mediaType = MediaType.parse("multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW");
                <br>RequestBody body = RequestBody.create(mediaType, "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"link\"\r\n\r\n<span class="url">http://longurl.com</span>\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"submit\"\r\n\r\ntrue\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"user\"\r\n\r\n<span class="user">0</span>\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--");
                <br>Request request = new Request.Builder()
                <br>.url("https://nith.ml/API.php")
                <br>.post(body)
                <br>.addHeader("content-type", "multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW")
                <br>.addHeader("cache-control", "no-cache")
                <br>.build();
<br>
                <br>Response response = client.newCall(request).execute();
            </div>
        </div>

        <div class="container"><br><br><br>
            <h3>Ruby (NET::Http)</h3><br>
            <div class="container code p-5 jquery">
                <br>require 'uri'
                <br>require 'net/http'
                <br>
                <br>url = URI("https://nith.ml/API.php")
                <br>
                <br>http = Net::HTTP.new(url.host, url.port)
                <br>http.use_ssl = true
                <br>http.verify_mode = OpenSSL::SSL::VERIFY_NONE
                <br>
                <br>request = Net::HTTP::Post.new(url)
                <br>request["content-type"] = 'multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW'
                <br>request["cache-control"] = 'no-cache'
                <br>request.body = "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"link\"\r\n\r\n<span class="url">http://longurl.com</span>\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"submit\"\r\n\r\ntrue\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"user\"\r\n\r\n<span class="user">0</span>\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--"
                <br>
                <br>response = http.request(request)
                <br>puts response.read_body
            </div>
        </div>

        </div>
      </section>
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
<div Class="col-lg-4 col-md-6" style="margin-bottom:10px;">
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

            <form action="mail.php" method="post" role="form" class="php-email-form" data-aos="fade-left">
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="from" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validate"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="body" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Loading</div>
                <div class="error-message">This is a beta feature. Please contact us through the email provided above</div>
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
  <script>
      function generate(){
          user = document.querySelector('#user').value;
          url = document.querySelector('#url').value;
          urlList = document.querySelectorAll('.url');
          userList = document.querySelectorAll('.user')
          for(u of userList){
              u.innerHTML = user 
          }
          for(U of urlList){
              U.innerHTML = url 
          }
      }  </script>
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
