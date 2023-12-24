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
                        <h4 class="mb-sm-0">History Pebayaran</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Listing</a></li>
                                <li class="breadcrumb-item active">History Pembayaran</li>
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
                            <h5 class="card-title mb-0" style="float:left">Data History Pembayaran</h5>
                        </div>
                        <div class="card-body  table-responsive">
                            <table id="user-table" class="table nowrap align-middle" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Tujuan</th>
                                        <th>No Registrasi</th>
                                        <th>Nama Jemaah</th>
                                        <th>Jumlah</th>
                                        <th>Nomor Rekening</th>
                                        <!-- <th>Action</th> -->
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
                url: base_url + 'Validasi/getAllHistoryPembayaran',
                type: 'POST'
            },
        }); // End of DataTable


    }); // End Document Ready Function
</script>