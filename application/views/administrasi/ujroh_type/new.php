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
            <h4 class="mb-sm-0">Detail Tipe Ujroh</h4>
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Administrasi</a></li>
                <li class="breadcrumb-item">Surat Pengajuan Ujroh</li>
                <li class="breadcrumb-item">Detail Tipe Ujroh</li>
                <li class="breadcrumb-item active">Tambah Tipe Ujroh</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title mb-0">Tambah Tipe Ujroh</h5>
            </div>
            <div class="card-body">
              <form action="<?= site_url("UjrohType/new") ?>" method="post" novalidate enctype="multipart/form-data">
                <div class="row g-3">
                  <div class="col-lg-12">
                    <label>Nama Ujroh</label>
                    <input type="text" name="name" class="form-control bg-white" id="nama" placeholder="Nama Ujroh">
                    <?php if (form_error('name')) : ?>
                      <div class="text-danger mt-1">
                        <?= form_error('name') ?>
                      </div>
                    <?php endif ?>
                  </div>
                  <div class="col-lg-12">
                    <label>Deskripsi Ujroh</label>
                    <textarea name="description" id="description" cols="30" rows="3" class="form-control" placeholder="Deskripsi Ujroh"></textarea>
                    <?php if (form_error('description')) : ?>
                      <div class="text-danger mt-1">
                        <?= form_error('description') ?>
                      </div>
                    <?php endif ?>
                  </div>
                  <div class="col-lg-12">
                    <label>Nominal Ujroh</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Nominal Ujroh">
                    <?php if (form_error('price')) : ?>
                      <div class="text-danger mt-1">
                        <?= form_error('price') ?>
                      </div>
                    <?php endif ?>
                  </div>
                  <div class="d-flex justify-content-end gap-3">
                    <a href="<?= site_url('UjrohType') ?>" class="btn btn-primary">
                      Kembali
                    </a>
                    <button type="submit" class="btn btn-info" name="submit">Simpan</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>