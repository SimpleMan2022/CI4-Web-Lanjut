<?= $this->extend('template/template'); ?>
<?= $this->section('konten'); ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Data Mahasiswa</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Master</a></li>
            <li class="breadcrumb-item active">Mahasiswa</li>
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
          <!-- Default box -->
          <div class="card">
            <div class="card-header">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                Tambah Mahasiswa <i class="fas fa-plus"></i>
              </button>

              <!-- Modal -->
              <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Input Mahasiswa</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="<?= base_url() ?>mahasiswa/store" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                          <div class="mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim">
                          </div>
                          <div class="mb-3">
                            <label for="Nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="Nama" name="nama">
                          </div>
                          <div class="mb-3">
                            <label for="Alamat" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="Alamat" name="alamat">
                          </div>
                          <div class="mb-3">
                            <label for="jk" class="form-label">Jenis Kelamin</label>
                            <select name="jk" id="jk" class="form-control">
                              <option value="" selected disabled>-- Pilih --</option>
                              <option value="laki-laki">Laki-laki</option>
                              <option value="perempuan">Perempuan</option>
                            </select>
                          </div>

                          <div class="mb-3">
                            <label for="kode_prodi" class="form-label">Prodi</label>
                            <select name="kode_prodi" id="kpde_prodi" class="form-control">
                              <option value="#" selected disabled>-- Pilih --</option>
                              <?php foreach ($prodi as $key => $value) : ?>
                                <option value="<?= $value["id_jurusan"], "-", $value["kode_program_studi"]; ?>"><?= $value["nama_jurusan"], " - ", $value["nama_program_studi"]; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                      <button type="button" class="btn btn-transparent" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>

            <div class="card-body">
              <?php if (session()->has("success")) :  ?>
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>
                    <?= session("success"); ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if (session()->has("error")) :  ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>
                    <?= session("error"); ?>
                  </h5>
                </div>
              <?php endif; ?>

              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th width="15%">NIM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($mahasiswa as $index => $mhs) : ?>
                    <tr>
                      <td><?= $index + 1 ?></td>
                      <td><?= $mhs["nim"] ?></td>
                      <td><?= $mhs["nama"] ?></td>
                      <td><?= $mhs["alamat"] ?></td>
                      <td><?= $mhs["jenkel"] ?></td>
                      <td>
                        <button class="btn btn-sm btn-warning edit-data" data-toggle="modal" data-target="#edit" data-nim="<?= $mhs["nim"]; ?>" data-nama="<?= $mhs["nama"]; ?>" data-alamat="<?= $mhs["alamat"]; ?>" data-jenkel="<?= $mhs["jenkel"]; ?>" data-kode_prodi="<?= $mhs["kode_prodi"]; ?>" data-id_jurusan="<?= $mhs["id_jurusan"]; ?>"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-danger delete-data" data-nim="<?= $mhs["nim"]; ?>" data-toggle="modal" data-target="#hapus"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(); ?>mahasiswa/update" method="post">
          <?php echo csrf_field(); ?>
          <div class="form-group">
            <div class="mb-3">
              <label for="nim" class="form-label">NIM</label>
              <input readonly type="text" class="form-control" id="nim" name="nim">
            </div>
            <div class="mb-3">
              <label for="Nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <div class="mb-3">
              <label for="Alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
              <label for="jk" class="form-label">Jenis Kelamin</label>
              <select name="jk" id="jk" class="form-control">
                <option value="" selected disabled>-- Pilih --</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="kode_prodi" class="form-label">Prodi</label>
              <select name="kode_prodi" id="kode_prodi" class="form-control">
                <option value="#" selected disabled>-- Pilih --</option>
                <?php foreach ($prodi as $key => $value) : ?>
                  <option value="<?= $value["id_jurusan"], "-", $value["kode_program_studi"]; ?>"><?= $value["nama_jurusan"], " - ", $value["nama_program_studi"]; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
      </div>

      <div class="modal-footer d-flex justify-content-between">
        <button type="button" class="btn btn-transparent" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">Edit Mahasiswa <i class="fas fa-edit"></i></button>
      </div>
      </form>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Mahasiswa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url(); ?>mahasiswa/delete" method="post">
          <div class="form-group">
            <div class="mb-3">
              <b id="confirm-text">Yakin ingin menghapus data mahasiswa ?</b>
              <input type="hidden" class="form-control" id="nim" name="nim">
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-between">
            <button type="button" class="btn btn-transparent" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Hapus Data <i class="fas fa-trash"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
      <i class="fas fa-minus"></i>
    </button>
    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
      <i class="fas fa-times"></i>
    </button>
  </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('scripts'); ?>

<script>
  $(document).ready(function() {
    $(document).on('click', '.edit-data', function() {
      var nim = $(this).data('nim');
      var nama = $(this).data('nama');
      var alamat = $(this).data('alamat');
      var jenkel = $(this).data('jenkel');
      var kode_prodi = $(this).data('kode_prodi');
      var id_jurusan = $(this).data('id_jurusan');

      $('#edit .modal-body #nim').val(nim);
      $('#edit .modal-body #nama').val(nama);
      $('#edit .modal-body #alamat').val(alamat);
      $('#edit .modal-body #jk').val(jenkel);
      $('#edit .modal-body #kode_prodi').val(`${id_jurusan}-${kode_prodi}`);

    });
  });

  $(document).on('click', '.delete-data', function() {
    console.log("test");
    var nim = $(this).data('nim');
    $('#hapus .modal-body #nim').val(nim);
    $('#confirm-text').html('Yakin ingin menghapus data mahasiswa ' + nim + ' ?');
  })
</script>
<?= $this->endSection(); ?>
<!-- /.content-wrapper -->