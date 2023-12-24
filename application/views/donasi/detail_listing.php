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
                        <h4 class="mb-sm-0">Listing Donasi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Listing </a></li>
                                <li class="breadcrumb-item active">Donasi</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-header">
                            <h5>Data Donasi</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- <div class="col-md-5">
                                    <img src="<?= base_url() ?>/assets/ktp/1234567890.jpg" alt="" style="width:90%; height:auto">
                                </div> -->
                                <div class="col-md-6">
                                    <h3>Donatur : <?= $rows->nama ?></h3>
                                </div>
                                <div class="col-md-6">
                                    <h3>No Reg : <?= $rows->no_registrasi ?></h3>
                                </div>
                                <div class="col-md-6">
                                    <!-- <h5><?= $rows->alamat ?>, <?= $rows->kota ?></h5> -->

                                    <table class="table" style="width:90%;">
                                        <tr>
                                            <td>
                                                <h5>Tanggal Donasi</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $rows->tanggal_donasi ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>No Telepon</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $rows->no_telp ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Program</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5>Donasi</h5>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">

                                    <table class="table" style="width:90%;">
                                        <tr>
                                            <td>
                                                <h5>Bank</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $rows->nama_bank ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>No Rekening</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $rows->no_rekening ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Atas Nama</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $rows->atas_nama ?></h5>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <?php
                            if ($rows->status == 0) {
                                $status = "Belum di Bayar";
                                $warna_label = "danger";
                            } else {
                                $status = "Sudah di Bayar";
                                $warna_label = "success";
                            }
                            ?>
                            <div class="card card-animate bg-<?= $warna_label ?>" style="width:100%;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-white mb-0">Status Pembayaran</p>
                                            <h2 class="mt-2 ff-secondary fw-semibold text-white"><?= $status ?></h2>
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
                            <div class="card card-animate bg-<?= $warna_label ?>" style="width:100%;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-white mb-0">Jumlah Yang Dibayarkan</p>
                                            <h2 class="mt-2 ff-secondary fw-semibold text-white">Rp. <?= number_format($rows->jumlah_donasi) ?></h2>
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


                        </div>

                    </div>
                </div>


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
                                    <input type="hidden" class="form-control" name="id_umrah_jemaah" id="id_umrah_jemaah" value="">
                                    <input type="hidden" class="form-control" name="nik" id="nik" value="">
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