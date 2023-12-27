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
                <li class="breadcrumb-item active">Detail Tipe Ujroh</li>
              </ol>
            </div>

          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-lg-12">
          <div class="d-flex">
            <a href="<?= site_url('SuratPengajuanUjroh') ?>" class="btn btn-primary d-flex align-items-center">
              <i class="ri-arrow-left-line me-2"></i>Kembali ke Surat Pengajuan Ujroh
            </a>
          </div>
          <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="card-title mb-0">Data Detail Tipe Ujroh</h5>
              <a href="<?= site_url('UjrohType/new') ?>" class="text-white btn btn-info">
                Tambah Tipe Ujroh
              </a>
            </div>
            <div class="card-body">
              <table class="table table-responsive nowrap align-middle" style="width:100%;">
                <thead>
                  <tr>
                    <th>Nama Ujroh</th>
                    <th>Deskripsi Ujroh</th>
                    <th>Nominal Ujroh</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (count($ujroh_type) > 0) : ?>
                    <?php foreach ($ujroh_type as $row) :  ?>
                      <tr>
                        <td>
                          <?= $row->name ?>
                        </td>
                        <td>
                          <?= $row->description ?>
                        </td>
                        <td>
                          Rp. <?= number_format($row->price) ?>
                        </td>
                        <td>
                          <a href="<?= base_url() ?>UjrohType/edit/<?= $row->id ?>" class="btn btn-warning">
                            <i class="ri-pencil-line"></i>
                          </a>

                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ujroh-type-modal-<?= $row->id ?>">
                            <i class="ri-delete-bin-line"></i>
                          </button>

                          <div class="modal fade" id="ujroh-type-modal-<?= $row->id ?>" tabindex="-1" aria-labelledby="ujroh-type-modal-label-<?= $row->id ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="ujroh-type-modal-label-<?= $row->id ?>">
                                    Hapus Data
                                  </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  Anda yakin ingin menghapus data ini? <br />
                                  <b>
                                    <?= $row->name ?>
                                  </b>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                                  <a href="<?= base_url() ?>UjrohType/destroy/<?= $row->id ?>" class="btn btn-danger">
                                    Ya, Saya Yakin
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  <?php else : ?>
                    <tr>
                      <td class="text-center fw-bold py-4" colspan="100%">
                        No data found.
                      </td>
                    </tr>
                  <?php endif ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>