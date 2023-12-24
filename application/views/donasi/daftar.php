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
                        <h4 class="mb-sm-0">Donasi Umrah Hafidz Quran 30 Juz</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pendaftaran</a></li>
                                <li class="breadcrumb-item active">Donasi</li>
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
                            <h5 class="card-title mb-0" style="float:left">Form Donasi Umrah Hafidz Quran 30 Juz</h5>
                            <!-- <button type="button" class="btn btn-primary" style="float:right" name="button" data-bs-toggle="modal" data-bs-target="#addJadwalKeberangkatan">Tambah Jadwal</button> -->
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url() ?>/Donasi/daftarAction" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                                <div class="row g-3">


                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <!-- <input type="text" class="form-control" name="nama"
                                                placeholder="Masukan Nama Lengkap" required>
                                            <label>Nama Lengkap</label> -->
                                            <select class="form-control js-example-basic-single" name="nama" id="user_id_jemaah" style="height:57px;">
                                                <option value="">Nama Lengkap</option>
                                                <?php
                                                foreach ($jemaah as $row_jemaah) {
                                                ?>
                                                    <option value="<?= $row_jemaah->nama ?>" data-nama="<?= $row_jemaah->nama ?>" data-nik="<?= $row_jemaah->nik ?>">
                                                        <?= $row_jemaah->nama ?>
                                                    </option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukan NIK" required>
                                            <label>NIK</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" required>
                                            <label>Email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Masukan Nomor Telephon" required>
                                            <label>No HP/Whatsapp</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nama_bank" placeholder="Nama Bank" required>
                                            <label>Nama Bank</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="no_rekening" placeholder="No Rekening" required>
                                            <label>No Rekening</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="atas_nama" placeholder="Atas Nama" required>
                                            <label>Atas Nama</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="jumlah_donasi" id="cleave-numeral" placeholder="Jumlah Donasi" required>
                                            <label>Jumlah Donasi</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-info" style="width:100%;">Submit</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->


        </div>
        <!-- container-fluid -->
    </div>
</div>
<!-- End Page-content -->

<script>
    $(document).ready(function(e) {

        $('#user_id_jemaah').on('change', function() {
            // var nama_kota = $(this).find(':selected').attr('data-nama');
            var nik = $(this).find(':selected').attr('data-nik');

            var user_id_jemaah = $(this).val();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Agen/getAllJemaah'); ?>",
                data: "nik=" + nik,
                success: function(response) {
                    var row = JSON.parse(response);
                    var kode_kota = row.user_id_jemaah.substr(0, 3);
                    $('#nik').val(row.nik);
                    $('#email').val(row.email);
                    $('#no_telp').val(row.no_telp);
                }
            });

        });



    }); // End Document Ready Function
</script>