  <?php include "Header.php" ?>
  <section class="contact-form-wrap section">
    <div class="container">
      <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center">
                    <h2 class="text-md mb-2">Appointment Status</h2>
                    <div class="divider mx-auto my-4"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                    <?php
              $sql = "select aid,(select name from doctor where did=appoinment.did) as did,date,time,disease,symptoms,status from appoinment where pid=".$_SESSION["patient_id"];
              $result=mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
              $result=mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($result)){  
                ?>
                <div class="col-md-3 col-lg-3">
                  <div class="box ">
                    <div class="detail-box">
                      <p><b>Appointment ID : </b><?php echo $row["aid"]; ?></p>
                      <p><b>Doctor Name : <?php echo $row["did"]; ?></b></p>
                      <p><b>Date : </b><?php echo $row["date"]; ?></p>
                      <p><b>Time : </b><?php echo $row["time"]; ?></p>
                      <p><b>Disease : </b><?php echo $row["disease"]; ?></p>
                      <p><b>Symptoms : </b><?php echo $row["symptoms"]; ?></p>
                      <p><b>Status : <?php echo $row["status"]; ?></b></p>
                    </div>
                  </div>
                </div>
                <?php
                }
              }
              ?>
                    </div>
                   
            </div>
        </div>
    </div>
</section>
<?php include "Footer.php" ?>
<?php
//Insert Records
if(isset($_REQUEST["appoinment_book"])){
  $sql = "INSERT INTO `appoinment`(`pid`, `did`, `date`, `time`, `disease`, `symptoms`, `status`) VALUES ('".$_SESSION['patient_id']."','".$_REQUEST["did"]."','".$_REQUEST["appoinment_date"]."','".$_REQUEST["selTime"]."','".$_REQUEST["disease"]."','".$_REQUEST["symptoms"]."','waiting')";

  if (mysqli_query($conn, $sql)) {
    echo "<script>window.location='PatientViewAppoinment.php';</script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
mysqli_close($conn);
?>
