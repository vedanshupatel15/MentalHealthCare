  <?php include "Header.php" ?>
  <?php include "DBConnect.php" ?>
 <section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Contact Us</span>
          <h1 class="text-capitalize mb-5 text-lg">Get in Touch</h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Contact Us</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section contact-info pb-0">
    <div class="container">
         <div class="row">
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-live-support"></i>
                    <h5>Call Us</h5>
                     +823-4565-13456
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-support-faq"></i>
                    <h5>Email Us</h5>
                     contact@mail.com
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6">
                <div class="contact-block mb-4 mb-lg-0">
                    <i class="icofont-location-pin"></i>
                    <h5>Location</h5>
                     North Main Street,Brooklyn Australia
                </div>
            </div>
        </div>
    </div>
</section>

<section class="contact-form-wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="text-md mb-2">Contact us</h2>
                    <div class="divider mx-auto my-4"></div>
                    <p class="mb-5">Submit your inquiry detail</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form class="contact__form " method="post">
                 
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input name="name" id="name" type="text" class="form-control" placeholder="Your Full Name" >
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <input name="email" id="email" type="email" class="form-control" placeholder="Your Email Address">
                            </div>
                        </div>
                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="contact" id="phone" type="text" class="form-control" placeholder="Your Phone Number">
                            </div>
                        </div>
                    </div>

                    <div class="form-group-2 mb-4">
                        <textarea name="inquiryDetail" id="message" class="form-control" rows="8" placeholder="Your Inquiry Detail"></textarea>
                    </div>

                    <div class="text-center">
                        <input class="btn btn-main btn-round-full" name="Inquiry" type="submit" value="Submit"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


 <div class="google-map ">
    <div id="map"></div>
</div>
<?php include "Footer.php" ?>
<?php
if(isset($_REQUEST["Inquiry"])){
  $sql = "INSERT INTO `inquiry`(`name`, `email`, `contact`, `enquiry`) VALUES ('".$_REQUEST["name"]."','".$_REQUEST["email"]."','".$_REQUEST["contact"]."','".$_REQUEST["inquiryDetail"]."')";

  if (mysqli_query($conn, $sql)) {
    echo "<script>window.location='index.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>
