<?php $pag = $this->uri->segment(1); ?>
<?php $page = $this->uri->segment(2); ?>
<?php $pages = $this->uri->segment(3); ?>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>
					<?php
					if ($page == "create" || $page == "Create") {
						echo 'Tambah Sub-kriteria';
					} else {
						echo 'Update Sub-kriteria';
					} ?>
				</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">
						<?php
						if ($page == "create" || $page == "Create") {
							echo 'Tambah Sub-kriteria';
						} else {
							echo 'Update Sub-kriteria';
						} ?>
					</li>
				</ol>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<!-- general form elements -->
				<div class="card card-primary">
					<!-- /.card-header -->
					<!-- form start -->
					<?= form_open($action . $link, array('class' => 'form-horizontal form-groups-bordered')); ?>
					<div class="card-body">
						<input type="hidden" name="tipe" value="teks" />
						<input type="hidden" name="id_kriteria" value="<?= $kriteria; ?>" />
						<div class="form-group">
							<label for="field-1">Sub-Kriteria</label>
							<input type="text" class="form-control" name="nama_subkriteria" id="nama_subkriteria" placeholder="Sub-Kriteria" required="" autocomplete="">

						</div>

					</div>
					<!-- /.card-body -->

					<div class="card-footer">
						<button type="submit" name="submit" class="btn btn-primary btn-flat">Tambah</button>
						<a href="javascript:history.back(-1);" class="btn btn-default btn-flat">Batal</a>
					</div>
					<?= form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</section>