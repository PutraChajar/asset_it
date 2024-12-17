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
										<th>Printer</th>
										<th>Spesifikasi</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($datas as $data): ?>
									<tr>
										<td>
											<?php echo $data->nama_printer ?>
										</td>
										<td>
											<?php echo $data->spesifikasi ?>
										</td>
										<td>
											<a onclick="editHandler('<?php echo $data->id_printer ?>', '<?php echo $data->nama_printer ?>', '<?php echo trim(preg_replace('/\s+/', ' ', $data->spesifikasi)); ?>')" href="javascript:void(0);" class="btn btn-small">
												<i class="fas fa-edit"></i> Edit
											</a>
											<a onclick="deleteHandler('<?php echo $data->id_printer ?>')" href="javascript:void(0);" class="btn btn-small text-danger">
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
						<label for="id_printer">ID Printer</label>
						<input type="text" class="form-control" id="id_printer" placeholder="Masukkan ID Printer" maxlength="5">
					</div>
					<div class="form-group">
						<label for="nama_printer">Nama Printer</label>
						<input type="text" class="form-control" id="nama_printer" placeholder="Masukkan Nama Printer" maxlength="50">
					</div>
					<div class="form-group">
					<label for="spesifikasi">Spesifikasi</label>
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
			$('#id_printer').val('').prop('disabled', false);
			$('#nama_printer').val('');
			$('#spesifikasi').val('');
			$('#formModal').modal('show');
		});

		function editHandler(id_printer, nama_printer, spesifikasi) {
			is_insert = false;
			$('#id_printer').val(id_printer).prop('disabled', true);
			$('#nama_printer').val(nama_printer);
			$('#spesifikasi').val(spesifikasi);
			$('#formModal').modal('show');
		}

		function deleteHandler(id){
			if (confirm("Yakin hapus data?") == true) {
				hapus_data(id);
			}
		}

		$('#simpan').on('click', function () {
			if ($('#id_printer').val() == '') {
				alert('ID Printer belum diisi');
				$('#id_printer').focus();
				return;
			}
			if ($('#nama_printer').val() == '') {
				alert('Nama Printer belum diisi');
				$('#nama_printer').focus();
				return;
			}

			is_insert ? simpan_data() : edit_data();
		});

		function simpan_data() {
			$.ajax({
				type: 'POST',
				url: `Printer/simpan_data`,
				dataType: 'JSON',
				data: {
					id_printer: $('#id_printer').val(),
					nama_printer: $('#nama_printer').val(),
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
				url: `Printer/edit_data`,
				dataType: 'JSON',
				data: {
					id_printer: $('#id_printer').val(),
					nama_printer: $('#nama_printer').val(),
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
				url: `Printer/hapus_data`,
				dataType: 'JSON',
				data: {
					id_printer: id
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
