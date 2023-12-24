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
                        <h4 class="mb-sm-0">Jadwal Keberangkatan</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                                <li class="breadcrumb-item active">Jadwal Keberangkatan</li>
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
                            <h5 class="card-title mb-0" style="float:left">Data Jadwal Keberangkatan</h5>
                            <button type="button" class="btn btn-info" style="float:right" name="button" data-bs-toggle="modal" data-bs-target="#addJadwalKeberangkatan">Tambah Jadwal</button>
                        </div>
                        <div class="card-body  table-responsive">
                            <table id="user-table" class="table nowrap align-middle" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Jadwal</th>
                                        <th>Paket</th>
                                        <th>Harga Paket</th>
                                        <th>Nominal Ujroh</th>
                                        <th>Jumlah Kuota</th>
                                        <th>Sisa Kuota</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div><!--end col-->
            </div><!--end row-->


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->



    <div class="modal fade" id="addJadwalKeberangkatan" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Tambah Jadwal Keberangkatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>JadwalKeberangkatan/addAction">
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="firstName" class="form-label">Tanggal Keberangkatan</label>
                                    <input type="text" class="form-control flatpickr_form" name="tanggal_keberangkatan" placeholder="Masukan Nama Tanggal Keberangkatan" required>
                                </div>
                            </div><!--end col-->

                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">Paket</label>
                                    <input type="text" class="form-control" name="nama_paket" placeholder="Masukan Nama Paket" required>
                                </div>
                            </div><!--end col-->

                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">Harga Paket</label>
                                    <input type="text" class="form-control" id="cleave-numeral" name="harga_paket" placeholder="Masukan Harga Paket" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">Nominal Ujroh</label>
                                    <input type="text" class="form-control" id="cleave-numeral3" name="nominal_ujroh" placeholder="Masukan Nominal Ujroh" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">Kuota Paket</label>
                                    <input type="text" class="form-control" name="kuota_paket" placeholder="Masukan Kuota" required>
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

    <div class="modal fade" id="updateJadwalKeberangkatan" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit Jadwal Keberangkatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>JadwalKeberangkatan/updateAction">
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="firstName" class="form-label">Tanggal Keberangkatan</label>
                                    <input type="text" class="form-control flatpickr_form" id="tanggal_keberangkatan" name="tanggal_keberangkatan" placeholder="Masukan Nama Tanggal Keberangkatan" required>
                                    <input type="hidden" class="form-control" id="id_paket_keberangkatan" name="id_paket_keberangkatan" placeholder="Masukan Nama Tanggal Keberangkatan" required>
                                </div>
                            </div><!--end col-->

                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">Paket</label>
                                    <input type="text" class="form-control" name="nama_paket" id="nama_paket" placeholder="Masukan Nama Paket" required>
                                </div>
                            </div><!--end col-->

                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">Harga Paket</label>
                                    <input type="text" class="form-control harga_paket" id="cleave-numeral2" name="harga_paket" placeholder="Masukan Harga Paket" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">Nominal Ujroh</label>
                                    <input type="text" class="form-control nominal_ujroh" id="cleave-numeral4" name="nominal_ujroh" placeholder="Masukan Nominal Ujroh" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">Kuota Paket</label>
                                    <input type="text" class="form-control" name="kuota_paket" id="kuota_paket" placeholder="Masukan Kuota" required>
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
                url: base_url + 'JadwalKeberangkatan/getAllJadwalKeberangkatan',
                type: 'POST'
            },
        }); // End of DataTable


    }); // End Document Ready Function


    $("#password-addon").click(function() {
        var type = $('#password-input').attr('type');
        if (type == "password") {
            $('#password-input').attr('type', 'text');
        } else {
            $('#password-input').attr('type', 'password');
        }
    });


    function getJadwalKeberangkatan(id_paket_keberangkatan) {
        var id_paket_keberangkatan = id_paket_keberangkatan;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('JadwalKeberangkatan/getJadwalKeberangkatan'); ?>",
            data: "id_paket_keberangkatan=" + id_paket_keberangkatan,
            success: function(response) {
                var row = JSON.parse(response);
                $('#tanggal_keberangkatan').val(row.tanggal_keberangkatan);
                $('#id_paket_keberangkatan').val(row.id_paket_keberangkatan);
                $('#nama_paket').val(row.nama_paket);
                $('.harga_paket').val(row.harga_paket);
                $('.nominal_ujroh').val(row.nominal_ujroh);
                $('#kuota_paket').val(row.jumlah_kuota);
            }
        });
    }
</script>