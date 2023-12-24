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
                        <h4 class="mb-sm-0">Daftar Agen</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Pendaftaran</a></li>
                                <li class="breadcrumb-item active">Agen</li>
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
                            <h5 class="card-title mb-0" style="float:left">Form Pendaftaran Agen</h5>
                            <!-- <button type="button" class="btn btn-primary" style="float:right" name="button" data-bs-toggle="modal" data-bs-target="#addJadwalKeberangkatan">Tambah Jadwal</button> -->
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url() ?>/Laskar/addAction" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                                <div class="row g-3">

                                    <div class="col-lg-12">
                                        <input type="hidden" class="form-control" name="no_reg_umrah_jemaah" id="no_reg_umrah_jemaah" required>
                                        <select class="form-control js-example-basic-single" name="user_id_jemaah" id="user_id_jemaah" style="height:57px;">
                                            <option value="">ID Jemaah</option>
                                            <?php
                                            foreach ($jemaah as $row_jemaah) {
                                            ?>
                                                <option value="<?= $row_jemaah->user_id_jemaah ?>" data-nama="<?= $row_jemaah->nama ?>" data-nik="<?= $row_jemaah->nik ?>">
                                                    <?= $row_jemaah->user_id_jemaah ?> | <?= $row_jemaah->nama ?>
                                                </option>

                                            <?php } ?>
                                        </select>

                                        <!-- <div class="form-floating">
                                                <input type="text" class="form-control" name="user_id_jemaah" id="user_id_jemaah" placeholder="Masukan ID Jemaah" required>
                                                <label>Nama Jemaah</label>
                                            </div> -->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Lengkap" required>
                                            <label>Nama Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukan NIK" required>
                                            <label>NIK</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" required>
                                            <label>Email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan Tempat Lahir" required>
                                            <label>Tempat Lahir</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control flatpickr_form" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukan Tanggal Lahir">
                                            <label>Tanggal Lahir</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Masukan Pekerjaan" required>
                                            <label>Pekerjaan</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <!-- Inline Radios -->
                                        <div class="box-radio">
                                            <label for="">Jenis Kelamin :</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin1" value="Laki-Laki" required>
                                                <label class="form-check-label" for="jenis_kelamin1">Laki-Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin2" value="Perempuan" required>
                                                <label class="form-check-label" for="jenis_kelamin2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <!-- Inline Radios -->
                                        <div class="box-radio">
                                            <label for="">Status :</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_pernikahan" id="status_menikah" value="Menikah" required>
                                                <label class="form-check-label" for="status_menikah">Menikah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_pernikahan" id="status_lajang" value="Lajang" required>
                                                <label class="form-check-label" for="status_lajang">Lajang</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <!-- <div class="form-floating"> -->
                                        <select class="form-control js-example-basic-single" name="kota" id="kota" style="height:57px;" required>
                                            <option value="">Kota Tinggal</option>
                                            <?php
                                            foreach ($kota as $row_kota) {
                                            ?>
                                                <option value="<?= $row_kota->kode_kota ?>" data-nama="<?= $row_kota->nama_kota ?>"><?= $row_kota->kode_kota ?> |
                                                    <?= $row_kota->nama_kota ?>
                                                </option>

                                            <?php } ?>
                                        </select>
                                        <input type="hidden" class="form-control" name="nama_kota" id="nama_kota" placeholder="Masukan Kota Tinggal">
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <textarea name="alamat" id="alamat" class="form-control" rows="8" cols="80" placeholder="Masukan Alamat Lengkap" required></textarea>
                                            <label>Alamat Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Masukan Nomor Telephon" required>
                                            <label>No HP/Whatsapp</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <textarea name="riwayat_penyakit" id="riwayat_penyakit" class="form-control" rows="8" cols="80" placeholder="Masukan Riwayat Penyakit" required></textarea>
                                            <label>Riwayat Penyakit</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <!-- <label class="">Harap Upload Foto KTP Asli</label> -->
                                        <input class="form-control form-ktp" name="ktp" type="file" required>
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
                    // alert(kode_kota);
                    $('#nama').val(row.nama);
                    $('#nik').val(row.nik);
                    $('#email').val(row.email);
                    $('#tempat_lahir').val(row.tempat_lahir);
                    $('#tanggal_lahir').val(row.tanggal_lahir);
                    $('#pekerjaan').val(row.pekerjaan);
                    $('#no_reg_umrah_jemaah').val(row.no_reg_umrah_jemaah);

                    $("#kota option").each(function() {
                        // console.log($(this).val());
                        if ($(this).val() == kode_kota) {
                            $(this).attr("selected", "selected");
                            console.log(row.no_reg_umrah_jemaah);

                        }
                    });

                    $("#kota option[value=" + kode_kota + "]").prop("selected", true);

                    $('#nama_kota').val(row.kota);
                    $('#alamat').val(row.alamat);
                    $('#no_telp').val(row.no_telp);
                    $('#riwayat_penyakit').val(row.riwayat_penyakit);
                    $('#status_menikah').val(row.status_menikah);

                    if (row.jenis_kelamin == "Laki-Laki") {
                        $('#jenis_kelamin1').prop('checked', true);
                    } else {
                        $('#jenis_kelamin2').prop('checked', true);
                    }

                    if (row.status_menikah == "Menikah") {
                        $('#status_menikah').prop('checked', true);
                    } else {
                        $('#status_lajang').prop('checked', true);
                    }

                }
            });

        });



    }); // End Document Ready Function

    $('#kota').on('change', function() {
        var nama_kota = $(this).find(':selected').attr('data-nama');
        $('#nama_kota').val(nama_kota);

    });
    $('#paketPlatinum').on('click', function() {
        $('#cleave-numeral').val('150,000,000');
        $('#cleave-numeral').prop('readonly', true);
    });
    $('#paketVIP').on('click', function() {
        $('#cleave-numeral').val('300,000,000');
        $('#cleave-numeral').prop('readonly', true);
    });
    $('#paketSpecial').on('click', function() {
        $('#cleave-numeral').val('0');
        $('#cleave-numeral').removeAttr('readonly');
    });
</script>