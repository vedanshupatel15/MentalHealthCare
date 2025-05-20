<?php include "Header.php" ?>
<?php if(isset($_SESSION["doctor"])){
  ?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <h1 class="text-capitalize text-lg">Welcome, <span><?php echo $_SESSION['doctor']; ?></span></h2>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="service-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="service-block mb-5">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">Manage Tasks</h4>
						<?php include "DoctorDashboardSideMenu.php"; ?>
					</div>
				</div>
			</div>

			<div class="col-lg-8 col-md-8 col-sm-8">
				<div class="service-block">
					<div class="content">
						<h4 class="mt-4 mb-2  title-color">Patient Detail</h4>
						<table border=1 cellspacing=2 cellpadding=5>
            <?php
              $sql = "select patient.pid as pid, patient.name as name, patient.gender as gender, patient.age, patient.weight, appoinment.disease,appoinment.symptoms,count(appoinment.pid) as 'total appoinment' from patient inner join appoinment on patient.pid=appoinment.pid where did=".$_SESSION["doctor_id"]." AND patient.pid IN (select pid from appoinment where did=".$_SESSION['doctor_id'].") group by patient.pid";
              
              $result=mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                ?>
              <tr>
                <th>pid</th>
                <th>patient</th>
                <th>gender</th>
                <th>age</th>
                <th>weight</th>
                <th>disease</th>
                <th>symptoms</th>
               	<th>Taken Appointment</th>
              </tr>  
              <?php
                while($row = mysqli_fetch_assoc($result)){
              ?>  
              <tr>
                <td><?php echo $row["pid"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><?php echo $row["gender"]; ?></td>
                <td><?php echo $row["age"]; ?></td>
                <td><?php echo $row["weight"]; ?></td>
                <td><?php echo $row["disease"]; ?></td>
                <td><?php echo $row["symptoms"]; ?></td>
                <td><?php echo $row["total appoinment"]; ?></td>
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
</section>
  <?php } else {
  echo "<script>window.location='Login.php';</script>";
} ?>
<?php include "Footer.php"; ?>