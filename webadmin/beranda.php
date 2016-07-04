<?php include 'header.php'; ?>
<div class="container-fluid body">
	<div class="row">
		<div class="col-lg-2 sidebar">
			<?php include 'sidebar.php'; ?>
		</div>
		<div class="col-lg-10 main-content">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<h2 class="page-header">Selamat datang, <strong><?php echo $_SESSION['nm_admin']; ?></strong></h2>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="col-sm-3 big-icon">
								<a href="berita.php">
									<span class="fa fa-newspaper-o fa-5x"></span>
									<h4>Berita</h4>
								</a>
							</div>
							<div class="col-sm-3 big-icon">
								<a href="kategori.php">
									<span class="fa fa-folder-o fa-5x"></span>
									<h4>Kategori</h4>
								</a>
							</div>
							<div class="col-sm-3 big-icon">
								<a href="profil.php">
									<span class="fa fa-user fa-5x"></span>
									<h4>Profil</h4>
								</a>
							</div>
							<div class="col-sm-3 big-icon">
								<a href="pesan.php">
									<span class="fa fa-envelope fa-5x"></span>
									<h4>Pesan</h4>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>