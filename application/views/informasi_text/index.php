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
                        <h4 class="mb-sm-0">Informasi Text</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                                <li class="breadcrumb-item active">Informasi Text</li>
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
                            <h5 class="card-title mb-0" style="float:left">Informasi Text</h5>
                            <?php if ($informasi_text == "") { ?>
                                <button type="button" class="btn btn-info" style="float:right" name="button" data-bs-toggle="modal" data-bs-target="#addInformasiText">Tambah Informasi</button>

                            <?php } ?>
                        </div>
                        <div class="card-body  table-responsive">
                            <table id="user-table" class="table nowrap align-middle" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Isi Informasi Text</th>
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



    <div class="modal fade" id="addInformasiText" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Tambah Informasi Text</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>InformasiText/addAction">
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">Isi Informasi Text</label>
                                    <textarea name="isi_informasi_text" class="form-control" required></textarea>
                                    <!-- <input type="text" class="form-control" id="cleave-numeral" name="nominal_subsidi_agen"
                                        placeholder="Masukan Subsidi Perwakilan" required> -->
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

    <div class="modal fade" id="updateInformasiText" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit Informasi Text</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>InformasiText/updateAction">
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">Isi Informasi Text</label>
                                    <textarea name="isi_informasi_text" class="form-control" id="isi_informasi_text" required></textarea>
                                    <input type="hidden" class="form-control" id="id_informasi_text" name="id_informasi_text" placeholder="" required>

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
                url: base_url + 'InformasiText/getAllInformasiText',
                type: 'POST'
            },
        }); // End of DataTable


    }); // End Document Ready Function

    function getInformasiText(id_informasi_text) {
        var id_informasi_text = id_informasi_text;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('InformasiText/getInformasiText'); ?>",
            data: "id_informasi_text=" + id_informasi_text,
            success: function(response) {
                var row = JSON.parse(response);
                $('#id_informasi_text').val(row.id_informasi_text);
                $('#isi_informasi_text').val(row.isi_informasi_text);
            }
        });
    }
</script>