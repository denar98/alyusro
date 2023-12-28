<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">

  <div class="page-content">
    <div class="container-fluid">
      <!-- start page title -->
      <div class="row">
        <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Surat Pengajuan Ujroh</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Administrasi</a></li>
                <li class="breadcrumb-item">Surat Pengajuan Ujroh</li>
                <li class="breadcrumb-item active">Edit Surat Pengajuan Ujroh</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title mb-0">Edit Surat Pengajuan Ujroh</h5>
            </div>
            <div class="card-body">
              <form action="<?= site_url("SuratPengajuanUjroh/edit/") . $row_2->surat_pengajuan_ujroh_id ?>" method="post" novalidate enctype="multipart/form-data" novalidate class="needs-validation">
                <div class="row g-3">
                  <div class="col-lg-6">
                    <label>ID Perwakilan</label>
                    <select class="form-control js-example-basic-single" name="perwakilan_id" id="perwakilan_id" style="height:57px;">
                      <option value="">ID Perwakilan</option>
                      <?php foreach ($perwakilan as $row) : ?>
                        <option value="<?= $row->id_agen ?>" <?= $row->id_agen == $row_2->perwakilan_id ? 'selected' : '' ?>>
                          <?= $row->user_id_agen ?> | <?= $row->nama_agen ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                    <?php if (form_error('perwakilan_id')) : ?>
                      <div class="text-danger mt-1">
                        <?= form_error('perwakilan_id') ?>
                      </div>
                    <?php endif ?>
                  </div>
                  <div class="col-lg-6">
                    <label>ID Jemaah</label>
                    <select class="form-control js-example-basic-single" name="jemaah_id" id="jemaah_id" style="height:57px;">
                      <option value="">ID Jemaah</option>
                      <?php foreach ($jemaah as $row) : ?>
                        <option value="<?= $row->id_jemaah ?>" <?= $row->id_jemaah == $row_2->jemaah_id ? 'selected' : "" ?>>
                          <?= $row->user_id_jemaah ?> | <?= $row->nama ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                    <?php if (form_error('jemaah_id')) : ?>
                      <div class="text-danger mt-1">
                        <?= form_error('jemaah_id') ?>
                      </div>
                    <?php endif ?>
                  </div>
                  <div class="col-lg-6">
                    <label>Tipe Ujroh</label>
                    <select class="form-control js-example-basic-single" name="ujroh_type_id" id="ujroh_type_id" style="height:57px;">
                      <option value="">Tipe Ujroh</option>
                      <?php foreach ($ujroh_type as $row) : ?>
                        <option value="<?= $row->id ?>" <?= $row->id == $row_2->ujroh_type_id ? 'selected' : '' ?>>
                          <?= $row->name ?> | Rp. <?= number_format($row->price) ?>
                        </option>
                      <?php endforeach ?>
                    </select>
                    <?php if (form_error('ujroh_type_id')) : ?>
                      <div class="text-danger mt-1">
                        <?= form_error('ujroh_type_id') ?>
                      </div>
                    <?php endif ?>
                  </div>
                </div>

                <div class="card mt-3">
                  <div class="card-header fw-bold">
                    Data Jemaah
                  </div>
                  <div class="card-body">
                    <div class="row g-3">
                      <div class="col-lg-4">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control bg-white" id="nama" placeholder="Nama Lengkap" value="<?= $row_2->nama ?>" readonly>
                      </div>
                      <div class="col-lg-4">
                        <label>NIK</label>
                        <input type="text" class="form-control bg-white" id="nik" placeholder="NIK" value="<?= $row_2->nik ?>" readonly>
                      </div>
                      <div class="col-lg-4">
                        <label>Email</label>
                        <input type="email" class="form-control bg-white" id="email" placeholder="Email" value="<?= $row_2->email ?>" readonly>
                      </div>
                      <div class="col-lg-6">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control bg-white" id="tempat_lahir" placeholder="Tempat Lahir" value="<?= $row_2->tempat_lahir_jemaah ?>" readonly>
                      </div>
                      <div class="col-lg-6">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control bg-white" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= $row_2->tanggal_lahir_jemaah ?>" readonly>
                      </div>
                      <div class="col-lg-6">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control bg-white" id="pekerjaan" placeholder="Pekerjaan" value="<?= $row_2->pekerjaan_jemaah ?>" readonly>
                      </div>
                      <div class="col-lg-3">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control bg-white" id="jenis_kelamin" placeholder="Jenis Kelamin" value="<?= $row_2->jenis_kelamin_jemaah ?>" readonly>
                      </div>
                      <div class="col-lg-3">
                        <label>Status</label>
                        <input type="text" class="form-control bg-white" id="status_pernikahan" placeholder="Status" value="<?= $row_2->status_pernikahan_jemaah ?>" readonly>
                      </div>
                      <div class="col-lg-6">
                        <label>Kota Tinggal</label>
                        <input type="text" class="form-control bg-white" id="kota" placeholder="Kota Tinggal" value="<?= $row_2->kota ?>" readonly>
                      </div>
                      <div class="col-lg-6">
                        <label>Alamat Lengkap</label>
                        <input type="text" class="form-control bg-white" id="alamat" placeholder="Alamat Lengkap" value="<?= $row_2->alamat ?>" readonly>
                      </div>
                      <div class="col-lg-6">
                        <label>No HP/Whatsapp</label>
                        <input type="text" class="form-control bg-white" id="no_telp" placeholder="Nomor Telepon" value="<?= $row_2->no_telp ?>" readonly>
                      </div>
                      <div class="col-lg-6">
                        <label>Riwayat Penyakit</label>
                        <input type="text" class="form-control bg-white" id="riwayat_penyakit" placeholder="Riwayat Penyakit" value="<?= $row_2->riwayat_penyakit_jemaah ?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-flex justify-content-end gap-3">
                  <a href="<?= site_url('SuratPengajuanUjroh') ?>" class="btn btn-primary">
                    Kembali
                  </a>
                  <button type="submit" class="btn btn-info" name="submit">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#jemaah_id').change(function() {
      var jemaah_id = $(this).val();
      $.ajax({
        url: "<?= site_url('SuratPengajuanUjroh/get_jemaah_by_id') ?>",
        method: 'post',
        data: {
          jemaah_id: jemaah_id
        },
        dataType: 'json',
        success: function(response) {
          var row = response[0];

          if (row == null) {
            $('#nama').val("");
            $('#nik').val("");
            $('#email').val("");
            $('#tempat_lahir').val("");
            $('#tanggal_lahir').val("");
            $('#pekerjaan').val("");
            $('#jenis_kelamin').val("");
            $('#status_pernikahan').val("");
            $('#kota').val("");
            $('#alamat').val("");
            $('#no_telp').val("");
            $('#riwayat_penyakit').val("");
          } else {
            $('#nama').val(row.nama);
            $('#nik').val(row.nik);
            $('#email').val(row.email);
            $('#tempat_lahir').val(row.tempat_lahir);
            $('#tanggal_lahir').val(row.tanggal_lahir);
            $('#pekerjaan').val(row.pekerjaan);
            $('#jenis_kelamin').val(row.jenis_kelamin);
            $('#status_pernikahan').val(row.status_pernikahan);
            $('#kota').val(row.kota);
            $('#alamat').val(row.alamat);
            $('#no_telp').val(row.no_telp);
            $('#riwayat_penyakit').val(row.riwayat_penyakit);
          }
        }
      });
    });
  });
</script>