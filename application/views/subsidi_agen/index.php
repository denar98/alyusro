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
                        <h4 class="mb-sm-0">Subsidi Perwakilan</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                                <li class="breadcrumb-item active">Subsidi Perwakilan</li>
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
                            <h5 class="card-title mb-0" style="float:left">Subsidi Perwakilan</h5>
                            <?php if ($subsidi_agen == "") { ?>
                                <button type="button" class="btn btn-info" style="float:right" name="button" data-bs-toggle="modal" data-bs-target="#addJadwalKeberangkatan">Tambah Jadwal</button>

                            <?php } ?>
                        </div>
                        <div class="card-body  table-responsive">
                            <table id="user-table" class="table nowrap align-middle" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Subsidi Perwakilan</th>
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
                    <h5 class="modal-title" id="exampleModalgridLabel">Tambah Subsidi Perwakilan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>SubsidiAgen/addAction">
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">Subsidi Perwakilan</label>
                                    <input type="text" class="form-control" id="cleave-numeral" name="nominal_subsidi_agen" placeholder="Masukan Subsidi Perwakilan" required>
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

    <div class="modal fade" id="updateSubsidiAgen" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit Subsidi Perwakilan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>SubsidiAgen/updateAction">
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">Subsidi Perwakilan</label>
                                    <input type="text" class="form-control nominal_subsidi_agen" id="cleave-numeral2" name="nominal_subsidi_agen" placeholder="Masukan Subsidi Perwakilan" required>
                                    <input type="hidden" class="form-control" id="id_subsidi_agen" name="id_subsidi_agen" placeholder="" required>

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
                url: base_url + 'SubsidiAgen/getAllSubsidiAgen',
                type: 'POST'
            },
        }); // End of DataTable


    }); // End Document Ready Function




    function getSubsidiAgen(id_subsidi_agen) {
        var id_subsidi_agen = id_subsidi_agen;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('SubsidiAgen/getSubsidiAgen'); ?>",
            data: "id_subsidi_agen=" + id_subsidi_agen,
            success: function(response) {
                var row = JSON.parse(response);
                $('#id_subsidi_agen').val(row.id_subsidi_agen);
                $('.nominal_subsidi_agen').val(row.nominal_subsidi_agen);
            }
        });
    }
</script>