<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<!-- STyle menu -->
	<link rel="stylesheet" type="text/css" href="../style/styles.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="C:/Xampp/htdocs/Ayiz/aset/css/all.css" rel="stylesheet">
	<!-- <script src="https://kit.fontawesome.com/b99e675b6e.js"></script> -->
	<!-- Animasi -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<!-- GRAFIK  -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			$(".hamburger").click(function() {
				$(".wrapper").toggleClass("active")
			})
		});
	</script>
</head>

<body>
	<?php
	session_start();
	?>
	<div class="wrapper">

		<div class="top_navbar">
			<div class="logo">
				<a href="#">Ayis</a>
			</div>
			<!-- LOGO HOME -->
			<div class="top_menu">
				<div class="home_link">
					<!-- LINK KE HOME -->
					<a href="../konten/main.php">
						<span class="icon"><i class="fas fa-home"></i></span>
						<span>Home</span>
					</a>
				</div>

				<div class="right_info">
					<div class="icon_wrap">
						<div class="icon">
							<a href="../konten/logout.php">
								<span class="icon"><i class="fas fa-sign-out-alt"></i></span>
								<span>Log Out</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="footer">
			<p>&copy; Ayis Official</p>
		</div> -->
		<!-- CONTENT -->
		<div class="main_body">
			<?php
			if ($_SESSION['level'] == 'admin') {
				?>
				<div class="sidebar_menu">
					<div class="inner__sidebar_menu">
						<!-- SIDEBAR MENU -->
						<ul>
							<li>
								<a href="?page=DataAccount"" class=" active">
									<span class="icon"><i class="fas fa-user"></i></span>
									<span class="list">Account</span>
								</a>
							</li>
							<li>
								<a href="?page=regisAdmin"" class=" active">
									<span class="icon"><i class="fas fa-user"></i></span>
									<span class="list">Admin</span>
								</a>
							</li>
							<li>
								<a href="?page=regisDsn">
									<span class="icon"><i class="fas fa-address-book"></i></span>
									<span class="list">Dosen</span>
								</a>
							</li>
							<li>
								<a href="?page=regisMhs">
									<span class="icon"><i class="fas fa-address-book"></i></span>
									<span class="list">Mahasiswa</span>
								</a>
							</li>
							<li>
								<a href="?page=DataQuest">
									<span class="icon"><i class="fas fa-list-ul"></i></span>
									<span class="list">Question</span>
								</a>
							</li>
							<li>
								<a href="?page=pertanyaan">
									<span class="icon"><i class="fas fa-clipboard-list"></i></span>
									<span class="list">Organize Question</span>
								</a>
							</li>
							<li>
								<a href="?page=result">
									<span class="icon"><i class="far fa-chart-bar"></i></span>
									<span class="list">Report</span>
								</a>
							</li>
							<li>
								<a href="?page=resultDosen">
									<span class="icon"><i class="far fa-chart-bar"></i></span>
									<span class="list">result</span>
								</a>
							</li>
						</ul>
						<!-- Arrow -->
						<div class="hamburger">
							<div class="inner_hamburger">
								<span class="arrow">
									<i class="fas fa-long-arrow-alt-left"></i>
									<i class="fas fa-long-arrow-alt-right"></i>
								</span>
							</div>
						</div>

					</div>
				</div>
			<?php
			} else if ($_SESSION['level'] == 'dosen') {
				?>
				<div class="sidebar_menu">
					<div class="inner__sidebar_menu">
						<!-- SIDEBAR MENU -->
						<ul>
							<li>
								<a href="?page=bio" class="active">
									<span class="icon"><i class="fas fa-user"></i></span>
									<span class="list">Profile</span>
								</a>
							</li>
							<li>
								<a href="?page=penilaian_mhs">
									<span class="icon"><i class="fas fa-list-ul"></i></span>
									<span class="list">Question</span>
								</a>
							</li>
						</ul>
						<!-- Arrow -->
						<div class="hamburger">
							<div class="inner_hamburger">
								<span class="arrow">
									<i class="fas fa-long-arrow-alt-left"></i>
									<i class="fas fa-long-arrow-alt-right"></i>
								</span>
							</div>
						</div>

					</div>
				</div>
			<?php
			} else {
				?>
				<div class="sidebar_menu">
					<div class="inner__sidebar_menu">
						<!-- SIDEBAR MENU -->
						<ul>
							<li>
								<a href="?page=bio" class="active">
									<span class="icon"><i class="fas fa-user"></i></span>
									<span class="list">Profile</span>
								</a>
							</li>
							<li>
								<a href="?page=penilaian">
									<span class="icon"><i class="fas fa-list-ul"></i></span>
									<span class="list">Question</span>
								</a>
							</li>
							<!-- Arrow -->
							<div class="hamburger">
								<div class="inner_hamburger">
									<span class="arrow">
										<i class="fas fa-long-arrow-alt-left"></i>
										<i class="fas fa-long-arrow-alt-right"></i>
									</span>
								</div>
							</div>

					</div>
				</div>
			<?php
			};
			?>

			<div class="container">
				<div class="item_warp">
					<?php
					if (isset($_GET['page'])) {
						include "../konten/$_GET[page].php";
					} else {
						?>
						<h2>HELLO :D, <?php echo $_SESSION['namadep'], $_SESSION['namabel']; ?> <?php echo $_SESSION['namabel']; ?></h2>
						<p>Selamat Datang</p>
					<?php
					}
					?>
				</div>
			</div>

		</div>

	</div>
	</div>
	</div>


</body>

</html>