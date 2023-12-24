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
                        <h4 class="mb-sm-0">Listing Tabungan Umrah</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Listing </a></li>
                                <li class="breadcrumb-item active">Tabungan Umrah</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5>Data Umrah Jemaah</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <img src="<?= base_url() ?>/assets/ktp/1234567890.jpg" alt="" style="width:90%; height:auto">
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
                                                <h5>No Registrasi</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $rows->no_reg_umrah_jemaah ?></h5>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <td><h5>Paket</h5></td>
                                            <td>:</td>
                                            <td><h5><?= $rows->nama_paket ?></h5></td>
                                        </tr> -->

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">

                            <div class="card card-animate bg-info" style="width:100%;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <p class="fw-medium text-white mb-0">Total Tabungan</p>
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

                        </div>

                    </div>
                    <div class="card">
                        <div class="card-body">

                            <a href="<?= base_url() ?>TabunganUmrah/jadiUmrahTerjadwal/<?= $rows->no_reg_umrah_jemaah ?>" class="text-white btn btn-info text-center" style="width:100%;">
                                <h5 class="text-white mt-2">JADIKAN UMRAH TERJADWAL</h5>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0" style="float:left">History Tabungan Umrah</h5>
                            <button class="btn btn-info" style="float:right;" data-bs-toggle="modal" data-bs-target="#addSaldo"><a class="text-white">Tambah Saldo</a></button>

                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 mt-3">
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <td>
                                                    <h5 class="">Tanggal</h5>
                                                </td>
                                                <td>
                                                    <h5 class="">Jumlah</h5>
                                                </td>
                                                <td>
                                                    <h5 class="">Total Saldo</h5>
                                                </td>
                                                <!-- <td><h5 class="">Action</h5></td> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($rows_history as $row_history) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <h5 class=""><?= $row_history->tanggal_menabung ?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class=""><?= number_format($row_history->jumlah_menabung) ?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class=""><?= number_format($row_history->saldo_tabungan) ?></h5>
                                                    </td>
                                                    <!-- <td><h5 class=""><button class="btn btn-primary"  onclick="getHistoryMenabung(' <?= $row_history->id_tabungan_umrah_jemaah ?> ')" data-bs-toggle="modal" data-bs-target="#editSaldo"><a class="text-white" >Edit</a></button></h5></td> -->

                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>

                                </div>
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
<div class="modal fade" id="addSaldo" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Tambah Saldo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>TabunganUmrah/addSaldoAction">
                    <div class="row g-3">

                        <div class="col-xxl-12">
                            <div>
                                <label for="nomor_tiket" class="form-label">Tanggal Menabung</label>
                                <input type="hidden" class="form-control" name="id_umrah_jemaah" value="<?= $rows->id_umrah_jemaah ?>">
                                <input type="hidden" class="form-control" name="no_reg_umrah_jemaah" value="<?= $rows->no_reg_umrah_jemaah ?>">
                                <input type="hidden" class="form-control" name="nik" value="<?= $rows->nik ?>">
                                <input type="text" class="form-control flatpickr_form" name="tanggal_menabung" placeholder="Tanggal Menabung" required>
                            </div>
                        </div><!--end col-->


                        <div class="col-xxl-12">
                            <div>
                                <label for="nomor_tiket" class="form-label">Nominal Menabung</label>
                                <input type="text" class="form-control" name="jumlah_menabung" id="cleave-numeral" placeholder="Nominal Saldo" required>
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
<div class="modal fade" id="editSaldo" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalgridLabel">Edit Tabungan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?= base_url() ?>TabunganUmrah/editSaldoAction">
                    <div class="row g-3">

                        <div class="col-xxl-12">
                            <div>
                                <label for="nomor_tiket" class="form-label">Tanggal Menabung</label>
                                <input type="hidden" class="form-control" name="id_tabungan_umrah_jemaah" id="id_tabungan_umrah_jemaah">
                                <input type="hidden" class="form-control" name="id_umrah_jemaah" id="id_umrah_jemaah" value="<?= $rows->id_umrah_jemaah ?>">
                                <input type="hidden" class="form-control" name="no_reg_umrah_jemaah" id="no_reg_umrah_jemaah" value="<?= $rows->no_reg_umrah_jemaah ?>">
                                <input type="hidden" class="form-control" name="nik" id="nik" value="<?= $rows->nik ?>">
                                <input type="text" class="form-control flatpickr_form" name="tanggal_menabung" id="tanggal_menabung" placeholder="Tanggal Menabung" required>
                            </div>
                        </div><!--end col-->


                        <div class="col-xxl-12">
                            <div>
                                <label for="nomor_tiket" class="form-label">Nominal Menabung</label>
                                <input type="text" class="form-control" name="jumlah_menabung" id="cleave-numeral2" placeholder="Nominal Saldo" required>
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

<script>
    $(document).ready(function(e) {
        var base_url = "<?php echo base_url(); ?>"; // You can use full url here but I prefer like this
        $('#history-table').DataTable();

    }); // End Document Ready Function

    function getHistoryMenabung(id_tabungan_umrah_jemaah) {
        var id_tabungan_umrah_jemaah = id_tabungan_umrah_jemaah;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('TabunganUmrah/getHistoryMenabungById'); ?>",
            data: "id_tabungan_umrah_jemaah=" + id_tabungan_umrah_jemaah,
            success: function(response) {
                var row = JSON.parse(response);
                $('#tanggal_menabung').val(row.tanggal_menabung);
                $('#id_tabungan_umrah_jemaah').val(row.id_tabungan_umrah_jemaah);
                // $('#cleave-numeral2').val(row.jumlah_menabung);
            }
        });
    }
</script>