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
										<th>ID keyboard</th>
										<th>Nama keyboard</th>
										<th>Spesifikasi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($datas as $data): ?>
									<tr>
										<td>
											<?php echo $data->id_keyboard ?>
										</td>
										<td>
											<?php echo $data->nama_keyboard ?>
										</td>
										<td>
											<?php echo $data->spesifikasi ?>
										</td>
										<td>
											<a onclick="editHandler('<?php echo $data->id_keyboard ?>', '<?php echo $data->nama_keyboard ?>', '<?php echo $data->spesifikasi ?>')" href="javascript:void(0);" class="btn btn-small">
												<i class="fas fa-edit"></i> Edit
											</a>
											<a onclick="deleteHandler('<?php echo $data->id_keyboard ?>')" href="javascript:void(0);" class="btn btn-small text-danger">
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
						<label for="id_keyboard">ID Keyboard</label>
						<input type="text" class="form-control" id="id_keyboard" placeholder="Masukkan ID Keyboard">
					</div>
					<div class="form-group">
						<label for="nama_keyboard">Nama Keyboard</label>
						<input type="text" class="form-control" id="nama_keyboard" placeholder="Masukkan Nama Keyboard">
					</div>
					<div class="form-group">
						<label for="spesifikasi">Spesifikasi</label>
						<input type="text" class="form-control" id="spesifikasi" placeholder="Masukkan Spesifikasi Keyboard">
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
			$('#id_keyboard').val('').prop('disabled', false);
			$('#nama_keyboard').val('');
			$('#spesifikasi').val('');
			$('#formModal').modal('show');
		});

		function editHandler(id_keyboard, nama_keyboard, spesifikasi) {
			is_insert = false;
			$('#id_keyboard').val(id_keyboard).prop('disabled', true);
			$('#nama_keyboard').val(nama_keyboard);
			$('#spesifikasi').val(spesifikasi);
			$('#formModal').modal('show');
		}

		function deleteHandler(id){
			if (confirm("Yakin hapus data?") == true) {
				hapus_data(id);
			}
		}

		$('#simpan').on('click', function () {
			if ($('#id_keyboard').val() == '') {
				alert('ID keyboard belum diisi');
				$('#id_keyboard').focus();
				return;
			}
			if ($('#nama_keyboard').val() == '') {
				alert('Nama Pegawai belum diisi');
				$('#nama_keyboard').focus();
				return;
			}

			is_insert ? simpan_data() : edit_data();
		});

		function simpan_data() {
			$.ajax({
				type: 'POST',
				url: `Keyboard/simpan_data`,
				dataType: 'JSON',
				data: {
					id_pegawai: $('#id_keyboard').val(),
					nama_pegawai: $('#nama_keyboard').val(),
					komputer: $('#spesifikasi').val()
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
				url: `Keyboard/edit_data`,
				dataType: 'JSON',
				data: {
					id_keyboard: $('#id_keyboard').val(),
					nama_keyboard: $('#nama_keyboard').val(),
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
				url: `Keyboard/hapus_data`,
				dataType: 'JSON',
				data: {
					id_pegawai: id
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
