<?php include "Header.php" ?>
<?php if(isset($_SESSION["doctor"])){
  ?>
  <!-- treatment section -->
  <section class="treatment_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Patient <span>Appoinment</span>
        </h2>
      </div>
      <div class="row">
        <div class="col-md-3 col-lg-3">
          <div class="box ">
            <?php include "DoctorDashboardSideMenu.php"; ?>
          </div>
          </div>
          <div class="col-md-9 col-lg-9">
          <div class="box ">
            <div class="detail-box">
              <table>
              <?php
              $sql = "select aid,(select name from patient where pid=appoinment.pid) as pid,date,time,disease,symptoms,status from appoinment where status='waiting' AND did=".$_SESSION['doctor_id'];
              $result=mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                ?>
              <tr>
                <th>aid</th>
                <th>patient</th>
                <th>date</th>
                <th>time</th>
                <th>disease</th>
                <th>symptoms</th>
               	<th>status</th>
                <th>Confirm Appoinment</th>
              </tr>  
              <?php
                while($row = mysqli_fetch_assoc($result)){
              ?>  
              <tr>
                <td><?php echo $row["aid"]; ?></td>
                <td><?php echo $row["pid"]; ?></td>
                <td><?php echo $row["date"]; ?></td>
                <td><?php echo $row["time"]; ?></td>
                <td><?php echo $row["disease"]; ?></td>
                <td><?php echo $row["symptoms"]; ?></td>
                <td><?php echo $row["status"]; ?></td>
                <td><a href="DoctorUpdateAppoinmentStatus.php?id=<?php echo $row["aid"]; ?>">Update</a></td>
              </tr>
              <?php
                }
              } else {
              	echo "There is no waiting appointment...";
              }
              ?>
              </table>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php } else {
  echo "<script>window.location='Login.php';</script>";
} ?>
<?php include "Footer.php"; ?>