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
                        <h4 class="mb-sm-0">Validasi Kelengkapan Umrah</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Validasi</a></li>
                                <li class="breadcrumb-item active">Kelengkapan Umrah</li>
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
                            <h5 class="card-title mb-0" style="float:left">Data Validasi Kelengkapan Umrah</h5>
                        </div>
                        <div class="card-body  table-responsive">

                            <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="ui-tabs.html#belum" role="tab">
                                        Belum Di Kirim
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="ui-tabs.html#sebagian" role="tab">
                                        Di Kirim Sebagian
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="ui-tabs.html#dikirim" role="tab">
                                        Di Kirim Semua
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="belum" role="tabpanel">
                                    <div class="d-flex table-responsive">
                                        <div class="flex-grow-1 ms-2">
                                            <table id="belum-table" class="table nowrap align-middle" style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>ID Perwakilan</th>
                                                        <th>ID Jemaah</th>
                                                        <th>Nama Jemaah</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="sebagian" role="tabpanel">
                                    <div class="d-flex table-responsive">
                                        <div class="flex-grow-1 ms-2">
                                            <table id="sebagian-table" class="table nowrap align-middle" style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>ID Perwakilan</th>
                                                        <th>ID Jemaah</th>
                                                        <th>Nama Jemaah</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="dikirim" role="tabpanel">
                                    <div class="d-flex table-responsive">
                                        <div class="flex-grow-1 ms-2">
                                            <table id="dikirim-table" class="table nowrap align-middle" style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th>ID Perwakilan</th>
                                                        <th>ID Jemaah</th>
                                                        <th>Nama Jemaah</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

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
    </div>
</div>
<!-- End Page-content -->


<script>
    $(document).ready(function(e) {

        var base_url = "<?php echo base_url(); ?>"; // You can use full url here but I prefer like this
        $('#belum-table').DataTable({
            "pageLength": 10,
            "serverSide": true,
            "order": [
                [0, "asc"]
            ],
            "ajax": {
                url: base_url + 'Validasi/getValidasiKelengkapan/0',
                type: 'POST'
            },
        }); // End of DataTable
        $('#sebagian-table').DataTable({
            "pageLength": 10,
            "serverSide": true,
            "order": [
                [0, "asc"]
            ],
            "ajax": {
                url: base_url + 'Validasi/getValidasiKelengkapan/1',
                type: 'POST'
            },
        }); // End of DataTable
        $('#dikirim-table').DataTable({
            "pageLength": 10,
            "serverSide": true,
            "order": [
                [0, "asc"]
            ],
            "ajax": {
                url: base_url + 'Validasi/getValidasiKelengkapan/2',
                type: 'POST'
            },
        }); // End of DataTable


    }); // End Document Ready Function
</script>