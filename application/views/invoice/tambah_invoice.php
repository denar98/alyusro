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
                        <h4 class="mb-sm-0">Tambah Invoice</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Keuangan</a></li>
                                <li class="breadcrumb-item active">Invoice</li>
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
                            <h5 class="card-title mb-0" style="float:left">Tambah Invoice</h5>
                            <button type="button" class="btn btn-info" style="float:right" name="button"><a href="<?= base_url() ?>Invoice" class="text-white">Lihat Data Invoice</a></button>

                        </div>
                        <div class="card-body table-responsive">
                            <form action="<?= base_url() ?>/Invoice/tambahInvoiceAction" method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                                <div class="row g-3">

                                    <div class="col-lg-12">
                                        <input type="hidden" class="form-control" name="no_reg_umrah_jemaah" id="no_reg_umrah_jemaah" required>
                                        <select class="form-control js-example-basic-single" name="no_registrasi" id="no_registrasi" style="height:57px;">
                                            <option value="">No Registrasi</option>
                                            <?php
                                            foreach ($pendaftaran as $row_pendaftaran) {
                                            ?>
                                                <option value="<?= $row_pendaftaran->no_registrasi ?>" data-nik="<?= $row_pendaftaran->nik ?>">
                                                    <?= $row_pendaftaran->no_registrasi ?>
                                                </option>

                                            <?php } ?>
                                        </select>

                                        <!-- <div class="form-floating">
                                                <input type="text" class="form-control" name="user_id_jemaah" id="user_id_jemaah" placeholder="Masukan ID Jemaah" required>
                                                <label>Nama Jemaah</label>
                                            </div> -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Lengkap" readonly>
                                            <label>Nama Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <textarea name="alamat" id="alamat" class="form-control" rows="8" cols="80" placeholder="Masukan Alamat Lengkap" readonly></textarea>
                                            <label>Alamat Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="user_id_agen" id="user_id_agen" placeholder="ID Agen" readonly>
                                            <label>ID Agen</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="jenis_pembayaran" id="jenis_pembayaran" placeholder="Jenis Pembayaran" readonly>
                                            <input type="hidden" class="form-control" name="jenis_tagihan" id="jenis_tagihan" placeholder="Jenis Pembayaran" readonly>
                                            <label>Jenis Pembayaran</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nama_paket" id="nama_paket" placeholder="Jenis Paket" readonly>
                                            <label>Jenis Paket</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="jumlah_tagihan" id="jumlah_tagihan" placeholder="Jumlah Tagihan" readonly>
                                            <label>Jumlah Tagihan</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nama_bank" id="nama_bank" placeholder="Nama Bank" readonly>
                                            <label>Nama Bank</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="no_rekening" id="no_rekening" placeholder="No Rekening" readonly>
                                            <label>No Rekening</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="atas_nama" id="atas_nama" placeholder="Atas Nama" readonly>
                                            <label>Atas Nama</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="jumlah_pembayaran" id="cleave-numeral2" placeholder="Jumlah Pembayaran" required>
                                            <label>Jumlah Pembayaran</label>
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

        $('#no_registrasi').on('change', function() {
            // var nama_kota = $(this).find(':selected').attr('data-nama');
            var nik = $(this).find(':selected').attr('data-nik');

            var no_registrasi = $(this).val();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('Invoice/getDataInvoice'); ?>",
                data: "no_registrasi=" + no_registrasi,
                success: function(response) {
                    var row = JSON.parse(response);
                    // var kode_kota = row.user_id_jemaah.substr(0, 3);
                    // // alert(kode_kota);
                    var jenis_pembayaran = "-";
                    if (row.jenis_pendataran == 1) {
                        jenis_pembayaran = "Umrah Terjadwal";
                    } else if (row.jenis_pendataran == 2) {
                        jenis_pembayaran = "Tabungan Umrah";
                    } else if (row.jenis_pendataran == 3) {
                        jenis_pembayaran = "Agen";
                    } else if (row.jenis_pendataran == 4) {
                        jenis_pembayaran = "Donasi";
                    }
                    var jumlah_tagihan = row.harga_paket - row.total_saldo_jemaah;
                    console.log(row.jenis_pendataran);
                    $('#nama').val(row.nama);
                    $('#alamat').val(row.alamat);
                    $('#user_id_agen').val(row.user_id_agen_referal);
                    $('#jenis_tagihan').val(row.jenis_pendataran);

                    if (row.jenis_pendataran == 3) {
                        $('#nama_paket').val(row.paket_agen);
                        $('#jumlah_tagihan').val(addCommas(row.nominal_pembayaran));
                        $('#no_rekening').val(row.no_rekening);
                        $('#nama_bank').val(row.nama_bank);
                        $('#atas_nama').val(row.atas_nama);
                    } else {
                        $('#nama_paket').val(row.nama_paket);
                        $('#jumlah_tagihan').val(addCommas(jumlah_tagihan));
                        $('#no_rekening').val(row.no_rekening_umrah);
                        $('#nama_bank').val(row.nama_bank_umrah);
                        $('#atas_nama').val(row.atas_nama_umrah);
                    }
                    $('#jenis_pembayaran').val(jenis_pembayaran);


                }
            });

        });



    }); // End Document Ready Function

    function addCommas(nStr) {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
</script>