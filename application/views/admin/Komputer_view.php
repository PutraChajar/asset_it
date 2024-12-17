<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<?php $this->load->view("admin/_partials/navbar.php") ?>
	<div id="wrapper">

		<?php $this->load->view("admin/_partials/sidebar.php") ?>

		<div id="content-wrapper">

			<div class="container-fluid">

				<?php $this->load->view("admin/_partials/breadcrumb.php") ?>

				<!-- DataTables -->
				<div class="card mb-3">
					<div class="card-header">
						<a id="tambah" href="javascript:void(0);"><i class="fas fa-plus"></i> Tambah</a>
					</div>
					<div class="card-body">

						<div class="table-responsive">
							<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>ID Komputer</th>
										<th>Nama Komputer</th>
										<th>Spesifikasi</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($datas as $data): ?>
									<tr>
										<td>
											<?php echo $data->id_komputer ?>
										</td>
										<td>
											<?php echo $data->nama_komputer ?>
										</td>
										<td>
											<?php echo $data->spesifikasi ?>
										</td>
										<td>
											<a onclick="editHandler('<?php echo $data->id_komputer ?>', '<?php echo $data->nama_komputer ?>', '<?php echo $data->spesifikasi ?>')" href="javascript:void(0);" class="btn btn-small">
												<i class="fas fa-edit"></i> Edit
											</a>
											<a onclick="deleteHandler('<?php echo $data->id_komputer ?>')" href="javascript:void(0);" class="btn btn-small text-danger">
												<i class="fas fa-trash"></i> Hapus
											</a>
										</td>
									</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
			<!-- /.container-fluid -->

			<!-- Sticky Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

		</div>
		<!-- /.content-wrapper -->

	</div>
	<!-- /#wrapper -->
	 
	<!-- Modal -->
	<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="formModalLabel">Form</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="id_komputer">ID Komputer</label>
						<input type="text" class="form-control" id="id_komputer" placeholder="Masukkan ID Komputer" maxlength="5">
					</div>
					<div class="form-group">
						<label for="nama_komputer">Nama Komputer</label>
						<input type="text" class="form-control" id="nama_komputer" placeholder="Masukkan Nama Komputer" maxlength="50">
					</div>
					<div class="form-group">
						<label for="spesifikasi">Spesifikasi</label>
						<!-- <input type="text" class="form-control" id="spesifikasi" placeholder="Masukkan Spesifikasi Komputer"> -->
						<textarea class="form-control" id="spesifikasi" rows="4" cols="4"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="button" class="btn btn-primary" id="simpan">Simpan</button>
				</div>
			</div>
		</div>
	</div>

	<?php $this->load->view("admin/_partials/scrolltop.php") ?>
	<?php $this->load->view("admin/_partials/modal.php") ?>

	<?php $this->load->view("admin/_partials/js.php") ?>

	<script>
		var is_insert;

		$('#tambah').on('click', function () {
			is_insert = true;
			$('#id_komputer').val('').prop('disabled', false);
			$('#nama_komputer').val('');
			$('#spesifikasi').val('');
			$('#aksi').val('');
			$('#formModal').modal('show');
		});

		function editHandler(id_komputer, nama_komputer, spesifikasi) {
			is_insert = false;
			$('#id_komputer').val(id_komputer).prop('disabled', true);
			$('#nama_komputer').val(nama_komputer);
			$('#spesifikasi').val(spesifikasi);
			$('#formModal').modal('show');
		}

		function deleteHandler(id){
			if (confirm("Yakin hapus data?") == true) {
				hapus_data(id);
			}
		}

		$('#simpan').on('click', function () {
			if ($('#id_komputer').val() == '') {
				alert('ID komputer belum diisi');
				$('#id_komputer').focus();
				return;
			}
			if ($('#nama_komputer').val() == '') {
				alert('Nama Pegawai belum diisi');
				$('#nama_komputer').focus();
				return;
			}

			is_insert ? simpan_data() : edit_data();
		});

		function simpan_data() {
			$.ajax({
				type: 'POST',
				url: `Komputer/simpan_data`,
				dataType: 'JSON',
				data: {
					id_komputer: $('#id_komputer').val(),
					nama_komputer: $('#nama_komputer').val(),
					spesifikasi: $('#spesifikasi').val()
				},
				success: function () {
					$('#formModal').modal('hide');
					alert('Berhasil Menyimpan Data');
					location.reload();
				},
				error: function () {
					alert('Gagal Menyimpan Data');
				}
			});
		}

		function edit_data() {
			$.ajax({
				type: 'POST',
				url: `Komputer/edit_data`,
				dataType: 'JSON',
				data: {
					id_komputer: $('#id_komputer').val(),
					nama_komputer: $('#nama_komputer').val(),
					spesifikasi: $('#spesifikasi').val()
				},
				success: function () {
					$('#formModal').modal('hide');
					alert('Berhasil Mengedit Data');
					location.reload();
				},
				error: function () {
					alert('Gagal Mengedit Data');
				}
			});
		}

		function hapus_data(id) {
			$.ajax({
				type: 'POST',
				url: `Komputer/hapus_data`,
				dataType: 'JSON',
				data: {
					id_komputer: id
				},
				success: function () {
					alert('Berhasil Menghapus Data');
					location.reload();
				},
				error: function () {
					alert('Gagal Menghapus Data');
				}
			});
		}
	</script>
</body>

</html>
