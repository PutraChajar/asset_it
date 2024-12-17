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
										<th>Pegawai</th>
										<th>Komputer</th>
										<th>Mouse</th>
										<th>Keyboard</th>
										<th>Printer</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($datas as $data): ?>
									<tr>
										<td>
											<?php echo $data->nama_pegawai ?>
										</td>
										<td>
											<?php echo $data->nama_komputer ?>
										</td>
										<td>
											<?php echo $data->nama_mouse ?>
										</td>
										<td>
											<?php echo $data->nama_keyboard ?>
										</td>
										<td>
											<?php echo $data->nama_printer ?>
										</td>
										<td>
											<a onclick="editHandler('<?php echo $data->id_pegawai ?>', '<?php echo $data->nama_pegawai ?>', '<?php echo $data->id_komputer ?>', '<?php echo $data->id_mouse ?>', '<?php echo $data->id_keyboard ?>', '<?php echo $data->id_printer ?>')" href="javascript:void(0);" class="btn btn-small">
												<i class="fas fa-edit"></i> Edit
											</a>
											<a onclick="deleteHandler('<?php echo $data->id_pegawai ?>')" href="javascript:void(0);" class="btn btn-small text-danger">
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
						<label for="id_pegawai">ID Pegawai</label>
						<input type="text" class="form-control" id="id_pegawai" placeholder="Masukkan ID Pegawai">
					</div>
					<div class="form-group">
						<label for="nama_pegawai">Nama Pegawai</label>
						<input type="text" class="form-control" id="nama_pegawai" placeholder="Masukkan Nama Pegawai">
					</div>
					<div class="form-group">
						<label for="komputer">Komputer</label>
						<select class="form-control" id="komputer"></select>
					</div>
					<div class="form-group">
						<label for="mouse">Mouse</label>
						<select class="form-control" id="mouse"></select>
					</div>
					<div class="form-group">
						<label for="keyboard">Keyboard</label>
						<select class="form-control" id="keyboard"></select>
					</div>
					<div class="form-group">
						<label for="printer">Printer</label>
						<select class="form-control" id="printer"></select>
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

		get_komputer();
		get_mouse();
		get_keyboard();
		get_printer();

		$('#tambah').on('click', function () {
			is_insert = true;
			$('#id_pegawai').val('').prop('disabled', false);
			$('#nama_pegawai').val('');
			$('#komputer').val('');
			$('#mouse').val('');
			$('#keyboard').val('');
			$('#printer').val('');
			$('#formModal').modal('show');
		});

		function editHandler(id_pegawai, nama_pegawai, id_komputer, id_mouse, id_keyboard, id_printer) {
			is_insert = false;
			$('#id_pegawai').val(id_pegawai).prop('disabled', true);
			$('#nama_pegawai').val(nama_pegawai);
			$('#komputer').val(id_komputer);
			$('#mouse').val(id_mouse);
			$('#keyboard').val(id_keyboard);
			$('#printer').val(id_printer);
			$('#formModal').modal('show');
		}

		function deleteHandler(id){
			if (confirm("Yakin hapus data?") == true) {
				hapus_data(id);
			}
		}

		$('#simpan').on('click', function () {
			if ($('#id_pegawai').val() == '') {
				alert('ID Pegawai belum diisi');
				$('#id_pegawai').focus();
				return;
			}
			if ($('#nama_pegawai').val() == '') {
				alert('Nama Pegawai belum diisi');
				$('#nama_pegawai').focus();
				return;
			}

			is_insert ? simpan_data() : edit_data();
		});

		function simpan_data() {
			$.ajax({
				type: 'POST',
				url: `Pegawai/simpan_data`,
				dataType: 'JSON',
				data: {
					id_pegawai: $('#id_pegawai').val(),
					nama_pegawai: $('#nama_pegawai').val(),
					komputer: $('#komputer').val(),
					mouse: $('#mouse').val(),
					keyboard: $('#keyboard').val(),
					printer: $('#printer').val()
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
				url: `Pegawai/edit_data`,
				dataType: 'JSON',
				data: {
					id_pegawai: $('#id_pegawai').val(),
					nama_pegawai: $('#nama_pegawai').val(),
					komputer: $('#komputer').val(),
					mouse: $('#mouse').val(),
					keyboard: $('#keyboard').val(),
					printer: $('#printer').val()
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
				url: `Pegawai/hapus_data`,
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

		function get_komputer() {
			$.ajax({
				type: 'POST',
				url: `Pegawai/get_komputer`,
				dataType: 'JSON',
				success: function (data) {
					$('#komputer').html('<option value="" selected disabled>-- Pilih Komputer --</option>');
					$.each(data, function (key, val) {
						$('#komputer').append(`<option value="${val.id_komputer}">${val.nama_komputer}</option>`);
					});
				},
				error: function () {
					toast('error', 'Gagal Mengambil Data Komputer');
				}
			});
		}

		function get_mouse() {
			$.ajax({
				type: 'POST',
				url: `Pegawai/get_mouse`,
				dataType: 'JSON',
				success: function (data) {
					$('#mouse').html('<option value="" selected disabled>-- Pilih Mouse --</option>');
					$.each(data, function (key, val) {
						$('#mouse').append(`<option value="${val.id_mouse}">${val.nama_mouse}</option>`);
					});
				},
				error: function () {
					toast('error', 'Gagal Mengambil Data Mouse');
				}
			});
		}

		function get_keyboard() {
			$.ajax({
				type: 'POST',
				url: `Pegawai/get_keyboard`,
				dataType: 'JSON',
				success: function (data) {
					$('#keyboard').html('<option value="" selected disabled>-- Pilih Keyboard --</option>');
					$.each(data, function (key, val) {
						$('#keyboard').append(`<option value="${val.id_keyboard}">${val.nama_keyboard}</option>`);
					});
				},
				error: function () {
					toast('error', 'Gagal Mengambil Data Keyboard');
				}
			});
		}

		function get_printer() {
			$.ajax({
				type: 'POST',
				url: `Pegawai/get_printer`,
				dataType: 'JSON',
				success: function (data) {
					$('#printer').html('<option value="" selected disabled>-- Pilih Printer --</option>');
					$.each(data, function (key, val) {
						$('#printer').append(`<option value="${val.id_printer}">${val.nama_printer}</option>`);
					});
					},
				error: function () {
					toast('error', 'Gagal Mengambil Data Printer');
				}
			});
		}
	</script>
</body>

</html>
