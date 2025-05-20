  <?php include "Header.php"; ?>
  <?php if(isset($_SESSION["patient"])){ 
    $sql_select = "select * from patient_mentalhealth_problem where PID='".$_SESSION["patient_id"]."'";
    $result=mysqli_query($conn, $sql_select);
    //if (mysqli_num_rows($result) > 0) {
    //  echo "<script>window.location='BookAppoinment.php';</script>";
    //} else {
  ?>
<section class="contact-form-wrap section">
    <div class="container">
      <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="text-md mb-2">Describe your Mental Health for getting proper treatment</h2>
                    <div class="divider mx-auto my-4"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <form id="contact-form" class="contact__form " method="post">
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group">
                        <input type="text" name="patient_name" class="form-control" value="<?php echo $_SESSION['patient']; ?>" placeholder="Full Name" />
                        </div>
                        </div>    
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <input type="text" name="mental_health_problem" class="form-control" placeholder="Mental Health Problem" required />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <input type="text" name="mental_health_challenges" class="form-control" required placeholder="Mental Health Challenges" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-lg-6">
                            <div class="form-group">
                            <input type="text" name="taken_trearment" class="form-control" placeholder="Taken Treatment" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <input type="text" name="treatment_history" class="form-control"  placeholder="History of taken Treatment" />
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <input class="btn btn-main btn-round-full" type="submit" value="Patient Mental Health" name="patient_mentalHealth"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php //} 
} else {
  echo "<script>window.location='Login.php';</script>";
} ?>
<?php include "Footer.php"; ?>
<?php
//Insert Records
if(isset($_REQUEST["patient_mentalHealth"])){

  $sql = "INSERT INTO `patient_mentalhealth_problem`(`pid`, `problem`, `problem_description`, `pre_treatment`, `treatment_history`,`status`) VALUES ('".$_SESSION["patient_id"]."','".$_REQUEST["mental_health_problem"]."','".$_REQUEST["mental_health_challenges"]."','".$_REQUEST["taken_trearment"]."','".$_REQUEST["treatment_history"]."','new')";

  if (mysqli_query($conn, $sql)) {
    echo "<script>window.location='BookAppoinment.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
mysqli_close($conn);
?>