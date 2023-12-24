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
                        <h4 class="mb-sm-0">Listing Umrah Terjadwal</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Listing </a></li>
                                <li class="breadcrumb-item active">Umrah Terjadwal</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <?php
                if ($rows->total_saldo_jemaah < $rows->harga_paket || $rows->status_kelengkapan == 0 || $rows->status_manifestasi == 0) {
                    $status_kesiapan = "BELUM SIAP BERANGKAT";
                    $warna_label_kesiapan = "danger";
                } else {
                    $status_kesiapan = "SIAP BERANGKAT";
                    $warna_label_kesiapan = "success";
                }


                if ($rows->total_saldo_jemaah < $rows->harga_paket) {
                    $status_pembayaran = "Belum Lunas";
                    $warna_label_pembayaran = "danger";
                } else {
                    $status_pembayaran = "Sudah Lunas";
                    $warna_label_pembayaran = "success";
                }
                if ($rows->status_kelengkapan == 0) {
                    $status_kelengkapan = "Belum Dikirim";
                    $warna_label_kelengkapan = "danger";
                } else {
                    $status_kelengkapan = "Sudah Dikirim";
                    $warna_label_kelengkapan = "success";
                }
                if ($rows->status_manifestasi == 0) {
                    $status_manifestasi = "Belum Lengkap";
                    $warna_label_manifestasi = "danger";
                } else {
                    $status_manifestasi = "Sudah Lengkap";
                    $warna_label_manifestasi = "success";
                }
                ?>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Data Umrah Jemaah</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="<?= base_url() ?>/assets/ktp/<?= $rows->ktp_jemaah ?>" alt="" style="width:90%; height:auto">
                                </div>
                                <div class="col-md-7">
                                    <h3><?= $rows->nama ?></h3>
                                    <h5><?= $rows->jenis_kelamin ?> / <?= $rows->status_pernikahan ?></h5>
                                    <h5><?= $rows->alamat ?>, <?= $rows->kota ?></h5>

                                    <table class="table" style="width:90%;">
                                        <tr>
                                            <td>
                                                <h5>ID Perwakilan</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $rows->user_id_agen ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>ID Agen</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $rows->user_id_referall ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>ID Jemaah</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $rows->user_id_jemaah ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Paket</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $rows->nama_paket ?></h5>
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card card-animate bg-<?= $warna_label_kesiapan ?>" style="width:100%;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-white mb-0">Status Kesiapan</p>
                                            <h2 class="mt-2 ff-secondary fw-semibold text-white"><?= $status_kesiapan ?></h2>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-light rounded-circle fs-2">
                                                    <i class=" bx bx-navigation text-white"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                            <div class="card card-animate bg-<?= $warna_label_pembayaran ?>" style="width:100%;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-white mb-0">Jumlah Yang Dibayarkan</p>
                                            <h2 class="mt-2 ff-secondary fw-semibold text-white">Rp. <?= number_format($rows->total_saldo_jemaah) ?></h2>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-light rounded-circle fs-2">
                                                    <i class="bx bx-dollar-circle text-white"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>
                            <div class="card card-animate bg-<?= $warna_label_pembayaran ?>" style="width:100%;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-white mb-0">Tanggal Keberangkatan</p>
                                            <h2 class="mt-2 ff-secondary fw-semibold text-white"><?= date("d/m/Y", strtotime($rows->tanggal_keberangkatan)) ?></h2>
                                        </div>
                                        <div>
                                            <div class="avatar-sm flex-shrink-0">
                                                <span class="avatar-title bg-soft-light rounded-circle fs-2">
                                                    <i class=" bx bx-calendar-event text-white"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card body -->
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0" style="float:left">Status Kesiapan Kelengkapan </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">


                                <div class="col-md-12">
                                    <table class="table" style="width:100%;">
                                        <tr>
                                            <td>
                                                <h5 class="mt-2">Pembayaran</h5>
                                            </td>
                                            <td>
                                                <h5 class="text-<?= $warna_label_pembayaran ?>"><?= $status_pembayaran ?></h5>
                                            </td>
                                            <td><button class="btn btn-warning"><a class="text-white" href="<?= base_url() ?>Validasi/Pembayaran">Validasi</a></button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="mt-2">Kelengkapan Umrah</h5>
                                            </td>
                                            <td>
                                                <h5 class="text-<?= $warna_label_kelengkapan ?>"><?= $status_kelengkapan ?></h5>
                                            </td>
                                            <td><button class="btn btn-warning"><a class="text-white" href="<?= base_url() ?>Validasi/Kelengkapan">Validasi</a></button></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="mt-2">Kelengkapan Manifestasi</h5>
                                            </td>
                                            <td>
                                                <h5 class="text-<?= $warna_label_manifestasi ?>"><?= $status_manifestasi ?></h5>
                                            </td>
                                            <td><button class="btn btn-warning"><a class="text-white" href="<?= base_url() ?>Validasi/Manifestasi">Validasi</a></button></td>
                                        </tr>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0" style="float:left">Tiket Pesawat</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">


                                <div class="col-md-12">
                                    <div class="card card-animate bg-primary" style="width:100%;">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="fw-medium text-white mb-0">Nomor Tiket Pesawat</p>
                                                    <h2 class="mt-2 ff-secondary fw-semibold text-white"><?= $rows->nomor_tiket ?></h2>
                                                </div>
                                                <div>
                                                    <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-soft-light rounded-circle fs-2">
                                                            <i class=" bx bx-navigation text-white"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- end card body -->
                                    </div>
                                    <button class="btn btn-info" style="width:100%;" data-bs-toggle="modal" data-bs-target="#editTiket"><a class="text-white">Edit Tiket Pesawat</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0" style="float:left">Pasangkan Keberangkatan </h5>
                            <button type="button" class="btn btn-info" style="float:right" name="button" data-bs-toggle="modal" data-bs-target="#pilihJemaah"><a class="text-white">Pilih Jemaah</a></button>
                        </div>
                        <div class="card-body">
                            <div class="row">


                                <div class="col-md-12">
                                    <table class="table mt-3" id="example" style="width:100%;">
                                        <thead>
                                            <tr>
                                                <td>
                                                    <h5>ID Jemaah</h5>
                                                </td>
                                                <td>
                                                    <h5>Nama Lengkap</h5>
                                                </td>
                                                <td>
                                                    <h5>Hubungan Status</h5>
                                                </td>
                                                <td>
                                                    <h5>Status Keberangkatan</h5>
                                                </td>
                                                <td>
                                                    <h5>Action</h5>
                                                </td>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($pasangan_umrah as $row_pasangan_umrah) {
                                                if ($row_pasangan_umrah->status_pembayaran == 0 || $row_pasangan_umrah->status_kelengkapan == 0 || $row_pasangan_umrah->status_manifestasi == 0  || $row_pasangan_umrah->status_umrah != 'Booking') {
                                                    $status_kesiapan = "Belum Siap Berangkat";
                                                    $warna_status_kesiapan = "danger";
                                                } else {
                                                    $status_kesiapan = "Siap Berangkat";
                                                    $warna_status_kesiapan = "info";
                                                }
                                            ?>
                                                <tr>
                                                    <td>
                                                        <h5><?= $row_pasangan_umrah->user_id_jemaah ?></h5>
                                                    </td>
                                                    <td>
                                                        <h5><?= $row_pasangan_umrah->nama ?></h5>
                                                    </td>
                                                    <td>
                                                        <h5><?= $row_pasangan_umrah->status_hubungan ?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="text-<?= $warna_status_kesiapan ?>"><?= $status_kesiapan ?></h5>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-info" style="" name="button"><a href="<?= base_url() ?>/umrahTerjadwal/detailListing/<?= $row_pasangan_umrah->nik ?>" class="text-white">Cek</a></button>
                                                        <button type="button" class="btn btn-danger" style="" name="button"><a href="<?= base_url() ?>/umrahTerjadwal/hapusPasanganUmrah/<?= $row_pasangan_umrah->user_id_jemaah ?>/<?= $rows->nik ?>" class="text-white">Hapus</a></button>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0" style="float:left">Action</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">


                                <div class="col-md-12">
                                    <button class="btn btn-info" style="width:100%;"><a class="text-white" href="<?= base_url() ?>UmrahTerjadwal/berangkatAction/<?= $rows->id_umrah_jemaah ?>">Berangkatkan</a></button>
                                    <button class="btn btn-danger mt-3" style="width:100%;">Dibatalkan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->



        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <div class="modal fade" id="editTiket" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit Tiket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>UmrahTerjadwal/editTiketAction">
                        <div class="row g-3">

                            <div class="col-xxl-12">
                                <div>
                                    <label for="nomor_tiket" class="form-label">Nomor Tiket</label>
                                    <input type="hidden" class="form-control" name="id_umrah_jemaah" id="id_umrah_jemaah" value="<?= $rows->id_umrah_jemaah ?>">
                                    <input type="hidden" class="form-control" name="nik" id="nik" value="<?= $rows->nik ?>">
                                    <input type="text" class="form-control" name="nomor_tiket" id="nomor_tiket" placeholder="Masukan Nama Paket" required>
                                </div>
                            </div><!--end col-->


                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="btn-add">Submit</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="pilihJemaah" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Pilih Jemaah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>UmrahTerjadwal/gabungkanJemaah">
                        <div class="row g-3">

                            <div class="col-xxl-12">
                                <div>
                                    <label for="nomor_tiket" class="form-label">Nama Jemaah</label>
                                    <select class="form-control js-example-basic-single" name="user_id_jemaah" id="user_id_jemaah">
                                        <option value="">ID Jemaah</option>
                                        <?php
                                        foreach ($jemaah as $row_jemaah) {
                                        ?>
                                            <option value="<?= $row_jemaah->user_id_jemaah ?>" data-nama="<?= $row_jemaah->nama ?>" data-nik="<?= $row_jemaah->nik ?>">
                                                <?= $row_jemaah->user_id_jemaah ?> | <?= $row_jemaah->nama ?>
                                            </option>

                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mt-3">
                                    <label for="nomor_tiket" class="form-label">Hubungan Status</label>
                                    <input type="hidden" class="form-control" name="parent_user_id_jemaah" id="parent_user_id_jemaah" value="<?= $rows->user_id_jemaah ?>">
                                    <input type="hidden" class="form-control" name="nik" id="nik" value="<?= $rows->nik ?>">
                                    <input type="text" class="form-control" name="status_hubungan" id="status_hubungan" placeholder="Masukan Hubungan Status" required>
                                </div>
                            </div><!--end col-->


                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="btn-add">Submit</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(e) {

        var base_url = "<?php echo base_url(); ?>"; // You can use full url here but I prefer like this
        $('#user-table').DataTable({
            "pageLength": 10,
            "serverSide": true,
            "order": [
                [0, "asc"]
            ],
            "ajax": {
                url: base_url + 'UmrahTerjadwal/getAllUmrahTerjadwal',
                type: 'POST'
            },
        }); // End of DataTable


    }); // End Document Ready Function
</script>