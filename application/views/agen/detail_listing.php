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
                        <h4 class="mb-sm-0">Detail Data Agen</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Listing </a></li>
                                <li class="breadcrumb-item active">Detail Agen</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <h3>Detail Perwakilan</h3>

                                    <table class="table" style="width:90%;">
                                        <tr>
                                            <td>
                                                <h5>Nama Perwakilan</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $rows->nama_agen ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>User ID Perwakilan</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $rows->user_id_agen ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Kota Perwakilan</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $rows->kota_agen ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>Alamat</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $rows->alamat_agen ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5>No Handphone</h5>
                                            </td>
                                            <td>:</td>
                                            <td>
                                                <h5><?= $rows->no_telp_agen ?></h5>
                                            </td>
                                        </tr>

                                    </table>

                                </div>


                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Jumlah Uang Ujroh</h3>
                                    <div class="card card-animate bg-danger mt-3" style="width:100%;">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="fw-medium text-white mb-0">Jumlah Perlu Di Bayar</p>
                                                    <h2 class="mt-2 ff-secondary fw-semibold text-white"><?= number_format($ujroh_belum_bayar->nominal) ?></h2>
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
                                    <div class="card card-animate bg-success mt-3" style="width:100%;">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="fw-medium text-white mb-0">Jumlah Sudah Di Bayar</p>
                                                    <h2 class="mt-2 ff-secondary fw-semibold text-white"><?= number_format($ujroh_sudah_bayar->nominal) ?></h2>
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

                                    <!-- <button class="btn btn-info mt-2" >Edit Tiket</button> -->
                                </div>


                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <h3 class="">Jumlah Uang Subsidi</h3>
                                    <div class="card card-animate bg-danger mt-3" style="width:100%;">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="fw-medium text-white mb-0">Jumlah Perlu Di Bayar</p>
                                                    <h2 class="mt-2 ff-secondary fw-semibold text-white"><?= number_format($subsidi_belum_bayar->nominal) ?></h2>
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
                                    <div class="card card-animate bg-success mt-3" style="width:100%;">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <p class="fw-medium text-white mb-0">Jumlah Sudah Di Bayar</p>
                                                    <h2 class="mt-2 ff-secondary fw-semibold text-white"><?= number_format($subsidi_sudah_bayar->nominal) ?></h2>
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

                                    <!-- <button class="btn btn-info mt-2" >Edit Tiket</button> -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="">Data History Ujroh</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                    <table class="table" id="example">
                                        <thead>
                                            <tr>
                                                <td>
                                                    <h5 class="">Tanggal</h5>
                                                </td>
                                                <td>
                                                    <h5 class="">Jenis Ujroh</h5>
                                                </td>
                                                <td>
                                                    <h5 class="">Jumlah</h5>
                                                </td>
                                                <td>
                                                    <h5 class="">ID Jemaah</h5>
                                                </td>
                                                <td>
                                                    <h5 class="">Nama Jemaah</h5>
                                                </td>
                                                <td>
                                                    <h5 class="">Status</h5>
                                                </td>
                                                <td>
                                                    <h5 class="">Action</h5>
                                                </td>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($rows_ujroh as $row_ujroh) {

                                                if ($row_ujroh->status == 0) {
                                                    $status = "Belum Dibayar";
                                                } else {
                                                    $status = " Sudah Dibayar";
                                                }
                                            ?>
                                                <tr>
                                                    <td>
                                                        <h5 class=""><?= $row_ujroh->tanggal ?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class=""><?= $row_ujroh->jenis_ujroh ?></h5>
                                                    </td>
                                                    <td><?php if ($row_ujroh->jenis_ujroh == "Ujroh") { ?><h5 class=""><?= number_format($row_ujroh->nominal_ujroh) ?></h5><?php } ?></td>
                                                    <td>
                                                        <h5 class=""><?= $row_ujroh->user_id_jemaah ?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class=""><?= $row_ujroh->nama ?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class=""><?= $status ?></h5>
                                                    </td>
                                                    <td><?php if ($row_ujroh->jenis_ujroh == "Ujroh" && $row_ujroh->status == "0") { ?><button class="btn btn-info"><a href="<?= base_url() ?>Agen/bayarUjrohAction/<?= $row_ujroh->id_ujroh ?>/<?= $row_ujroh->user_id_agen ?>/<?= $row_ujroh->nominal_ujroh ?>" class="text-white">Bayar Ujroh</a></button><?php } ?></td>

                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div><!--end col-->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="">Data History Subsidi</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12  table-responsive">
                                    <table class="table" id="example2">
                                        <thead>
                                            <tr>
                                                <td>
                                                    <h5 class="">Tanggal</h5>
                                                </td>
                                                <td>
                                                    <h5 class="">Jenis</h5>
                                                </td>
                                                <td>
                                                    <h5 class="">Jumlah</h5>
                                                </td>
                                                <td>
                                                    <h5 class="">ID Jemaah</h5>
                                                </td>
                                                <td>
                                                    <h5 class="">Nama Jemaah</h5>
                                                </td>
                                                <td>
                                                    <h5 class="">Status</h5>
                                                </td>
                                                <td>
                                                    <h5 class="">Action</h5>
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($rows_subsidi as $row_subsidi) {

                                                if ($row_subsidi->status == 0) {
                                                    $status = "Belum Dibayar";
                                                } else {
                                                    $status = " Sudah Dibayar";
                                                }
                                            ?>
                                                <tr>
                                                    <td>
                                                        <h5 class=""><?= $row_subsidi->tanggal ?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class="">Subsidi Agen</h5>
                                                    </td>
                                                    <td>
                                                        <h5 class=""><?= number_format($row_subsidi->nominal_subsidi) ?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class=""><?= $row_subsidi->user_id_jemaah ?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class=""><?= $row_subsidi->nama ?></h5>
                                                    </td>
                                                    <td>
                                                        <h5 class=""><?= $status ?></h5>
                                                    </td>
                                                    <td><?php if ($row_subsidi->status == "0") { ?><button class="btn btn-info"><a href="<?= base_url() ?>Agen/bayarSubsidiAction/<?= $row_subsidi->id_detail_subsidi_agen ?>/<?= $row_subsidi->user_id_agen ?>/<?= $row_subsidi->nominal_subsidi ?>" class="text-white">Bayar Subsidi</a></button><?php } ?></td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
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
</div>

<script>
    $(document).ready(function(e) {

        var base_url = "<?php echo base_url(); ?>"; // You can use full url here but I prefer like this
        $('#example2').DataTable({
            "pageLength": 10,

        }); // End of DataTable


    }); // End Document Ready Function
</script>