<?php include 'header.php'; ?>
<div class="container-fluid">
	<div class="row">
		<div class="container konten-wrapper">
			<div class="panel panel-default">
				<div class="panel-body main">
					<div class="col-md-8">
						<div class="post-detail">
							<div class="row post-title">
								<div class="col-sm-12">
									<h2>KONTAK KAMI</h2>
								</div>
							</div>
							<div class="row post-content">
								<div class="col-sm-12">
									<table border="0" width="100%">
										<tr>
											<th>Telp</th>
											<td>:</td>
											<td>(0265) 345-394</td>
										</tr>
										<tr>
											<th>No. Handphone</th>
											<td>:</td>
											<td>087999880999</td>
										</tr>
										<tr>
											<th>E-mail</th>
											<td>:</td>
											<td>kontak@beritakita.com</td>
										</tr>
										<tr>
											<th>Alamat Redaksi</th>
											<td>:</td>
											<td>Jl. Komarasari II no. 28 Kel. Empangsari, Kec. Tawang Kota Tasikmalaya 46113</td>
										</tr>
									</table>
								</div>
								<div class="clear"></div>
								<div class="col-sm-8 col-sm-offset-2">
									<form method="POST" id="formPesan">
										<div class="form-group">
											<label>Nama Lengkap</label>
											<input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Anda..." id="nama">
										</div>
										<div class="form-group">
											<label>Email</label>
											<input type="email" class="form-control" name="email" placeholder="Email Anda..." id="email">
										</div>
										<div class="form-group">
											<label>Subjek</label>
											<input type="text" class="form-control" name="subjek" placeholder="Membahas tentang..." id="subjek">
										</div>
										<div class="form-group">
											<label>Pesan</label>
											<textarea name="pesan" class="form-control" rows="8" id="pesan"></textarea>
										</div>
										<div class="form-group">
											<button class="btn btn-default" id="btn-kirim" type="button" onclick="kirimPesan()">
												<i class="glyphicon glyphicon-send"></i>&nbsp;&nbsp;KIRIM
											</button>
										</div>
									</form>
									<div id="hasil"></div>
								</div>
							</div>
						</div>
					</div>
					<?php include 'sidebar.php'; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php';