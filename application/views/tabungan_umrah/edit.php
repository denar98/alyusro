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
                        <h4 class="mb-sm-0">Edit Tabungan Umrah</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Edit</a></li>
                                <li class="breadcrumb-item active">Tabungan Umrah</li>
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
                            <h5 class="card-title mb-0" style="float:left">Form Edit Tabungan Umrah</h5>
                            <!-- <button type="button" class="btn btn-primary" style="float:right" name="button" data-bs-toggle="modal" data-bs-target="#addJadwalKeberangkatan">Tambah Jadwal</button> -->
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url() ?>/TabunganUmrah/updateAction" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                                <div class="row g-3">


                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="hidden" class="form-control" name="id_tabungan_umrah_jemaah" required value="<?= $tabungan_umrah->id_tabungan_umrah_jemaah ?>">
                                            <input type="hidden" class="form-control" name="no_reg_umrah_jemaah" required value="<?= $tabungan_umrah->no_reg_umrah_jemaah ?>">
                                            <input type="text" class="form-control" name="nama" placeholder="Masukan Nama Lengkap" required value="<?= $tabungan_umrah->nama ?>">
                                            <label>Nama Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nik" placeholder="Masukan NIK" value="<?= $tabungan_umrah->nik ?>" readonly required>
                                            <label>NIK</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="email" placeholder="Masukan Email" required value="<?= $tabungan_umrah->email ?>">
                                            <label>Email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukan Tempat Lahir" required value="<?= $tabungan_umrah->tempat_lahir ?>">
                                            <label>Tempat Lahir</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control flatpickr_form" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir" value="<?= $tabungan_umrah->tanggal_lahir ?>">
                                            <label>Tanggal Lahir</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="pekerjaan" placeholder="Masukan Pekerjaan" required value="<?= $tabungan_umrah->pekerjaan ?>">
                                            <label>Pekerjaan</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <!-- Inline Radios -->
                                        <div class="box-radio">

                                            <label for="">Jenis Kelamin :</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="Laki-Laki" required <?php if ($tabungan_umrah->jenis_kelamin == 'Laki-Laki') {
                                                                                                                                                                    echo 'checked';
                                                                                                                                                                } ?>>
                                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="Perempuan" required <?php if ($tabungan_umrah->jenis_kelamin == 'Perempuan') {
                                                                                                                                                                    echo 'checked';
                                                                                                                                                                } ?>>
                                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-3">
                                        <!-- Inline Radios -->
                                        <div class="box-radio">
                                            <label for="">Status :</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_pernikahan" id="inlineRadioMenikah" value="Menikah" required <?php if ($tabungan_umrah->status_pernikahan == 'Menikah') {
                                                                                                                                                                            echo 'checked';
                                                                                                                                                                        } ?>>
                                                <label class="form-check-label" for="inlineRadioMenikah">Menikah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_pernikahan" id="inlineRadioLajang" value="Lajang" required <?php if ($tabungan_umrah->status_pernikahan == 'Lajang') {
                                                                                                                                                                            echo 'checked';
                                                                                                                                                                        } ?>>
                                                <label class="form-check-label" for="inlineRadioLajang">Lajang</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- <div class="form-floating"> -->
                                        <select class="form-control js-example-basic-single" name="kota" id="kota" style="height:57px;">
                                            <option value="">Kota Tinggal</option>
                                            <?php
                                            foreach ($kota as $row_kota) {
                                            ?>
                                                <option value="<?= $row_kota->kode_kota ?>" data-nama="<?= $row_kota->nama_kota ?>" <?php if ($tabungan_umrah->kota == $row_kota->nama_kota) {
                                                                                                                                        echo 'selected';
                                                                                                                                    } ?>><?= $row_kota->kode_kota ?> |
                                                    <?= $row_kota->nama_kota ?></option>

                                            <?php } ?>
                                        </select>
                                        <input type="hidden" class="form-control" name="nama_kota" id="nama_kota" placeholder="Masukan Kota Tinggal">
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <textarea name="alamat" class="form-control" rows="8" cols="80" placeholder="Masukan Alamat Lengkap" required><?= $tabungan_umrah->alamat ?></textarea>
                                            <label>Alamat Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="no_telp" placeholder="Masukan Nomor Telephon" required value="<?= $tabungan_umrah->no_telp ?>">
                                            <label>No HP/Whatsapp</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <textarea name="riwayat_penyakit" class="form-control" rows="8" cols="80" placeholder="Masukan Riwayat Penyakit" required><?= $tabungan_umrah->riwayat_penyakit ?></textarea>
                                            <label>Riwayat Penyakit</label>
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nama_bank" placeholder="Nama Bank" required value="<?= $tabungan_umrah->nama_bank ?>">
                                            <label>Nama Bank</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="no_rekening" placeholder="No Rekening" required value="<?= $tabungan_umrah->no_rekening ?>">
                                            <label>No Rekening</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="atas_nama" placeholder="Atas Nama" required value="<?= $tabungan_umrah->atas_nama ?>">>
                                            <label>Atas Nama</label>
                                        </div>
                                    </div>




                                    <div class="col-lg-4">
                                        <select class="form-control js-example-basic-single" name="user_id_agen" id="user_id_agen" style="height:57px;" required>
                                            <option value="">ID Perwakilan</option>
                                            <option value="BDO-000-000">BDO-000-0000</option>
                                            <?php
                                            foreach ($agen as $row_agen) {
                                            ?>
                                                <option value="<?= $row_agen->user_id_agen ?>" data-nama="<?= $row_agen->nama_agen ?>" <?php if ($tabungan_umrah->user_id_agen == $row_agen->user_id_agen) {
                                                                                                                                            echo 'selected';
                                                                                                                                        } ?>><?= $row_agen->user_id_agen ?> |
                                                    <?= $row_agen->nama_agen ?></option>

                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control js-example-basic-single" name="user_id_referall" id="user_id_referall" style="height:57px;" required>
                                            <option value="">ID Agen</option>
                                            <option value="BDO-000-000">BDO-000-0000</option>
                                            <?php
                                            foreach ($laskar as $row_laskar) {
                                            ?>
                                                <option value="<?= $row_laskar->user_id_laskar ?>" data-nama="<?= $row_laskar->nama_laskar ?>" <?php if ($tabungan_umrah->user_id_referall == $row_laskar->user_id_laskar) {
                                                                                                                                                    echo 'selected';
                                                                                                                                                } ?>><?= $row_laskar->user_id_laskar ?> |
                                                    <?= $row_laskar->nama_laskar ?></option>

                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="col-lg-4">
                                        <!-- Inline Radios -->
                                        <div class="box-radio">

                                            <label for="">Jenis Ujroh :</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_ujroh" id="inlineRadio3" value="Ujroh" checked required <?php if ($tabungan_umrah->jenis_ujroh == 'Ujroh') {
                                                                                                                                                                        echo 'checked';
                                                                                                                                                                    } ?>>
                                                <label class="form-check-label" for="inlineRadio3">Ujroh</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_ujroh" id="inlineRadio4" value="Paket A" required <?php if ($tabungan_umrah->jenis_ujroh == 'Paket A') {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="inlineRadio4">Paket A</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_ujroh" id="inlineRadio5" value="Paket B" required <?php if ($tabungan_umrah->jenis_ujroh == 'Paket B') {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="inlineRadio5">Paket B</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-8">
                                        <!-- <label class="">Harap Upload Foto KTP Asli</label> -->
                                        <input class="form-control form-ktp" name="ktp" type="file" required>

                                    </div>

                                    <div class="col-lg-4">
                                        <div class="box-radio">

                                            <label for="">Mendaftar Via :</label><br>
                                            <div class="form-check mb-2 form-check-inline">
                                                <input class="form-check-input" type="radio" name="daftar_via" id="flexRadioDefault1" required value="Agen" <?php if ($tabungan_umrah->daftar_via == 'Agen') {
                                                                                                                                                                echo 'checked';
                                                                                                                                                            } ?>>
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Agen Perwakilan
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="daftar_via" id="flexRadioDefault2" value="Online" required <?php if ($tabungan_umrah->daftar_via == 'Online') {
                                                                                                                                                                    echo 'checked';
                                                                                                                                                                } ?>>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Online
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-lg-6">
                                        <div class="" id="div_pilihan_paket">
                                            <select class="form-control js-example-basic-single" name="id_paket_keberangkatan" id="id_paket_keberangkatan" style="height:57px;">
                                                <option value="">Target Paket</option>
                                                <?php
                                                foreach ($paket_keberangkatan as $row_paket_keberangkatan) {
                                                ?>
                                                    <option value="<?= $row_paket_keberangkatan->id_paket_keberangkatan ?>" data-harga="<?= $row_paket_keberangkatan->harga_paket ?>" <?php if ($tabungan_umrah->id_paket_keberangkatan == $row_paket_keberangkatan->id_paket_keberangkatan) {
                                                                                                                                                                                            echo 'selected';
                                                                                                                                                                                        } ?>>
                                                        <?= $row_paket_keberangkatan->nama_paket ?> |
                                                        <?= $row_paket_keberangkatan->tanggal_keberangkatan ?> | RP.
                                                        <?= number_format($row_paket_keberangkatan->harga_paket) ?></option>

                                                <?php } ?>
                                            </select>
                                            <input type="hidden" class="form-control" name="harga_paket" id="harga_paket" placeholder="Masukan Kota Tinggal" value="<?= $tabungan_umrah->harga_paket ?>">

                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nominal_pembayaran" id="cleave-numeral" placeholder="Rencana Jumlah Tabungan Awal" required value="<?= $tabungan_umrah->nominal_pembayaran ?>">
                                            <label>Rencana Jumlah Tabungan Awal</label>
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


        var base_url = "<?php echo base_url(); ?>"; // You can use full url here but I prefer like this
        $('#user-table').DataTable({
            "pageLength": 10,
            "serverSide": true,
            "order": [
                [0, "asc"]
            ],
            "ajax": {
                url: base_url + 'JadwalKeberangkatan/getAllJadwalKeberangkatan',
                type: 'POST'
            },
        }); // End of DataTable

        if ($('input[name=gender]:checked').length > 0) {
            // do something here
        }

        $('#inlineCheckbox1').click(function() {
            $('#div_pilihan_paket').fadeOut();
            $('#numeral2').val('');
        });
        $('#inlineCheckbox2').click(function() {
            $('#div_pilihan_paket').fadeOut();
            $('#numeral2').val('');
        });

        $('#inlineCheckbox3').click(function() {
            var x = document.getElementById("inlineCheckbox3").checked;
            // alert(x);

            if (x == true) {
                $('#div_pilihan_paket').fadeIn();
                //Male radio button is checked
            } else {
                $('#div_pilihan_paket').fadeOut();
            }
        });

        // $('#flexRadioDefault2').click(function () {
        //     $('#user_id_agen').val('BDO-000-0000');
        //     $('#user_id_referall').val('BDO-000-0000');
        //     $('#user_id_agen').attr('readonly');
        //     $('#user_id_referall').attr('readonly');

        // });
        // $('#flexRadioDefault1').click(function () {
        //     $('#user_id_agen').val('');
        //     $('#user_id_referall').val('');
        //     $('#user_id_agen').removeAttr('readonly');
        //     $('#user_id_referall').removeAttr('readonly');
        // });


    }); // End Document Ready Function

    $('#kota').on('change', function() {
        var nama_kota = $(this).find(':selected').attr('data-nama');
        $('#nama_kota').val(nama_kota);

    });
    $('#id_paket_keberangkatan').on('change', function() {
        var harga_paket = $(this).find(':selected').attr('data-harga');
        $('#harga_paket').val(harga_paket);

    });
</script>