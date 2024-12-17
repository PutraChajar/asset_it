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
										<th>Mouse</th>
										<th>Spesifikasi</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($datas as $data): ?>
									<tr>
										<td>
											<?php echo $data->nama_mouse ?>
										</td>
										<td>
											<?php echo $data->spesifikasi ?>
										</td>
										<td>
											<a onclick="editHandler('<?php echo $data->id_mouse ?>',  '<?php echo $data->nama_mouse ?>', '<?php echo $data->spesifikasi ?>')" href="javascript:void(0);" class="btn btn-small">
												<i class="fas fa-edit"></i> Edit
											</a>
											<a onclick="deleteHandler('<?php echo $data->id_mouse ?>')" href="javascript:void(0);" class="btn btn-small text-danger">
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
						<label for="id_mouse">ID Mouse</label>
						<input type="text" class="form-control" id="id_mouse" placeholder="Masukkan ID Mouse">
					</div>
					<div class="form-group">
						<label for="nama_mouse">Nama Mouse</label>
						<input type="text" class="form-control" id="nama_mouse" placeholder="Masukkan Nama Mouse">
					</div>
					<div class="form-group">
						<label for="spesifikasi">Spesifikasi</label>
						<input type="text" class="form-control" id="spesifikasi" placeholder="Masukkan Spesifikasi">
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
			$('#id_mouse').val('').prop('disabled', false);
			$('#nama_mouse').val('');
			$('#spesifikasi').val('');
			$('#formModal').modal('show');
		});

		function editHandler(id_mouse, nama_mouse, spesifikasi) {
			is_insert = false;
			$('#id_mouse').val(id_mouse).prop('disabled', true);
			$('#nama_mouse').val(nama_mouse);
			$('#spesifikasi').val(spesifikasi);
			$('#formModal').modal('show');
		}

		function deleteHandler(id){
			if (confirm("Yakin hapus data?") == true) {
				hapus_data(id);
			}
		}

		$('#simpan').on('click', function () {
			if ($('#id_mouse').val() == '') {
				alert('ID Mouse belum diisi');
				$('#id_mouse').focus();
				return;
			}
			if ($('#nama_mouse').val() == '') {
				alert('Nama Mouse belum diisi');
				$('#nama_mouse').focus();
				return;
			}

			is_insert ? simpan_data() : edit_data();
		});

		function simpan_data() {
			$.ajax({
				type: 'POST',
				url: `Mouse/simpan_data`,
				dataType: 'JSON',
				data: {
					id_mouse: $('#id_mouse').val(),
					nama_mouse: $('#nama_mouse').val(),
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
				url: `Mouse/edit_data`,
				dataType: 'JSON',
				data: {
					id_mouse: $('#id_mouse').val(),
					nama_mouse: $('#nama_mouse').val(),
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
				url: `Mouse/hapus_data`,
				dataType: 'JSON',
				data: {
					id_mouse: id
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
