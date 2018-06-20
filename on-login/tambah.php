<?php 
include("header.php"); 
include("koneksi.php"); 
?>
	<div class="container">
		<div class="content">
			<h2>Data Karyawan &raquo; Tambah Data</h2>
			<hr />
			
			<?php
			if(isset($_POST['add'])){
				$nik		     = $_POST['nik'];
				$nama		     = $_POST['nama'];
				$jenis_kelamin   = $_POST['jenis_kelamin'];
				$tempat_lahir	 = $_POST['tempat_lahir'];
				$tanggal_lahir	 = $_POST['tanggal_lahir'];
				$alamat		     = $_POST['alamat'];
				$no_telepon		 = $_POST['no_telepon'];
				$jabatan		 = $_POST['jabatan'];
				$status			 = $_POST['status'];
				$nama_gambar = $_FILES['foto']['name'];
				$file_gambar = $_FILES['foto']['tmp_name'];
				$directory	 = "images/$nama_gambar";
				move_uploaded_file($file_gambar, $directory);
				
				$cek = mysqli_query($koneksi, "SELECT * FROM karyawan WHERE nik='$nik'");

				if(mysqli_num_rows($cek) == 0){ 
					if(true){
						
						$insert = mysqli_query($koneksi, "INSERT INTO karyawan(nik, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, no_telepon, jabatan, status, foto) VALUES('$nik','$nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_telepon', '$jabatan', '$status, $nama_gambar')") or die(mysqli_error()); 
						if($insert){ 
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Karyawan Berhasil Di Simpan.</div>'; 
						}else{ 
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Karyawan Gagal Di simpan!</div>'; 
						}
					} else{ 
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password Tidak sama!</div>'; 
					}
				}else{ 
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIK Sudah Ada..!</div>'; 
				}
			}
			?>

			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">NIK</label>
					<div class="col-sm-2">
						<input type="text" name="nik" class="form-control" placeholder="NIK" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nama</label>
					<div class="col-sm-4">
						<input type="text" name="nama" class="form-control" placeholder="Nama" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jenis Kelamin</label>
					<div class="col-sm-2">
						<select name="jenis_kelamin" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tempat Lahir</label>
					<div class="col-sm-4">
						<input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Tanggal Lahir</label>
					<div class="col-sm-3">
						<input type="text" name="tanggal_lahir" class="input-group datepicker form-control" date="" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Alamat</label>
					<div class="col-sm-3">
						<textarea name="alamat" class="form-control" placeholder="Alamat"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">No Telepon</label>
					<div class="col-sm-3">
						<input type="text" name="no_telepon" class="form-control" placeholder="No Telepon" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Jabatan</label>
					<div class="col-sm-2">
						<select name="jabatan" class="form-control" required>
							<option value=""> ----- </option>
							<option value="Helper">Helper</option>
							<option value="Operator">Operator</option>
							<option value="Leader">Leader</option>
							<option value="Staf">Staf</option>
                            <option value="Supervisor">Supervisor</option>
							<option value="Manager">Manager</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Status</label>
					<div class="col-sm-2">
						<select name="status" class="form-control">
							<option value=""> ----- </option>
                            <option value="Outsourcing">Outsourcing</option>
							<option value="Kontrak">Kontrak</option>
							<option value="Tetap">Tetap</option>
						</select>

					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Foto Profil</label>
					<div class="col-sm-2">
             			<input name="foto" class="form-control-file" type="file" id="exampleInputFile"> <br> <br>

					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Simpan" data-toggle="tooltip" title="Simpan Data Karyawan">
						<a href="index.php" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Batal">Batal</a>
					</div>
				</div>
			</form> 
		</div> 
	</div> 
<?php 
include("footer.php"); 
?>