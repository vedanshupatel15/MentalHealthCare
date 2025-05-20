<?php include "header.php" ?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <h1 class="text-capitalize text-lg">Welcome, <span><?php echo $_SESSION['admin']; ?></span></h2>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section service-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="service-block mb-5">
					<div class="content">
						<h4 class="mt-4 mb-2 title-color">Manage Tasks</h4>
						<?php include "AdminDashboardSideMenu.php"; ?>
					</div>
				</div>
			</div>

			<div class="col-lg-8 col-md-8 col-sm-8">
				<div class="service-block mb-5">
					<div class="content">
						<h4 class="mt-4 mb-2  title-color">Welcome, <span><?php echo $_SESSION['admin']; ?></span> to the Admin Panel</h4>
						Date : <span><?php echo date("d-m-Y"); ?></span>
              <p>Select task from left side menu and execute</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include "footer.php" ?>