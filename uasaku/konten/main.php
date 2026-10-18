<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" type="text/css" href="../style/styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<!-- Animasi -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
								<a href="?page=masterData"" class=" active">
									<span class="icon"><i class="fas fa-user"></i></span>
									<span class="list">Account</span>
								</a>
							</li>
							<li>
								<a href="?page=daftar">
									<span class="icon"><i class="fas fa-address-book"></i></span>
									<span class="list">Organize Account</span>
								</a>
							</li>
							<li>
								<a href="?page=masterQuest">
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
								<a href="?page=hasil">
									<span class="icon"><i class="far fa-chart-bar"></i></span>
									<span class="list">Report</span>
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
								<a href="?page=hasil">
									<span class="icon"><i class="fas fa-list-ul"></i></span>
									<span class="list">Question</span>
								</a>
							</li>
							<li>
								<a href="cetak.php">
									<span class="icon"><i class="far fa-chart-bar"></i></span>
									<span class="list">Report</span>
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
						<h2>Halo, <?php echo $_SESSION['namadep']; ?> <?php echo $_SESSION['namabel']; ?></h2>
						<p>
							Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe voluptate ipsam, veniam, repellat a nisi excepturi commodi dicta deleniti eligendi consectetur? Dicta quibusdam neque eos ipsa tenetur quo voluptatem nam! Selamat Datang di Website Penilaian Dosen</p>
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