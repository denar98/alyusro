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
                <li class="breadcrumb-item active">Surat Pengajuan Ujroh</li>
              </ol>
            </div>

          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-lg-12">
          <div class="d-flex">
            <a href="<?= site_url('UjrohType') ?>" class="btn btn-success d-flex align-items-center">
              <i class="ri-eye-line me-2"></i>Lihat Detail Tipe Ujroh
            </a>
          </div>
          <div class="card mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
              <h5 class="card-title mb-0" style="float:left">Data Surat Pengajuan Ujroh</h5>
              <a href="<?= site_url('SuratPengajuanUjroh/new') ?>" class="text-white btn btn-info">
                Tambah Surat Pengajuan Ujroh
              </a>
            </div>
            <div class="card-body">
              <table class="table table-responsive nowrap align-middle" style="width:100%;">
                <thead>
                  <tr>
                    <th>ID Perwakilan</th>
                    <th>Nama Perwakilan</th>
                    <th>ID Jemaah</th>
                    <th>Nama Jemaah</th>
                    <th>Tgl Dibuat</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (count($surat_pengajuan_ujroh) > 0) : ?>
                    <?php foreach ($surat_pengajuan_ujroh as $row) :  ?>
                      <tr>
                        <td>
                          <?= $row->user_id_agen ?>
                        </td>
                        <td>
                          <?= $row->nama_agen ?>
                        </td>
                        <td>
                          <?= $row->user_id_jemaah ?>
                        </td>
                        <td>
                          <?= $row->nama ?>
                        </td>
                        <td>
                          <?= $row->created_at ?>
                        </td>
                        <td>
                          <!-- <a href="<?= base_url() ?>SuratPernyataanKeberangkatan/download/<?= $row->id ?>" class="btn btn-success">
                            <i class="ri-download-2-line me-2"></i>Unduh (.pdf)
                          </a> -->

                          <!-- <a href="<?= base_url() ?>SuratPernyataanKeberangkatan/edit/<?= $row->id ?>" class="btn btn-warning">
                            <i class="ri-pencil-line"></i>
                          </a>

                          <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#jemaah-modal-<?= $row->id ?>">
                            <i class="ri-delete-bin-line"></i>
                          </button>

                          <div class="modal fade" id="jemaah-modal-<?= $row->id ?>" tabindex="-1" aria-labelledby="jemaah-modal-label-<?= $row->id ?>" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="jemaah-modal-label-<?= $row->id ?>">
                                    Hapus Data
                                  </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  Anda yakin ingin menghapus data ini? <br />
                                  <b>
                                    <?= $row->user_id_jemaah ?> | <?= $row->nama ?>
                                  </b>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Tutup</button>
                                  <a href="<?= base_url() ?>SuratPernyataanKeberangkatan/destroy/<?= $row->id ?>" class="btn btn-danger">
                                    Ya, Saya Yakin
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div> -->
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