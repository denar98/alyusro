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
                        <h4 class="mb-sm-0">User</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Master</a></li>
                                <li class="breadcrumb-item active">User</li>
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
                            <h5 class="card-title mb-0" style="float:left">Data User</h5>
                            <button type="button" class="btn btn-info" style="float:right" name="button" data-bs-toggle="modal" data-bs-target="#addUser">Tambah User</button>
                        </div>
                        <div class="card-body  table-responsive">
                            <table id="user-table" class="table nowrap align-middle" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama User</th>
                                        <th>Email</th>
                                        <th>Hak Akses</th>
                                        <th>Terakhir Login</th>
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


    <!-- Grids in modals -->
    <div class="modal fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>User/addAction">
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="firstName" class="form-label">Nama Jemaah</label>
                                    <select class="form-control form-select" name="id_jemaah" required>
                                        <?php foreach ($jemaah as $jemaah_row) { ?>
                                            <option value="<?= $jemaah_row->id_jemaah ?>"><?= $jemaah_row->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="firstName" class="form-label">Nama User</label>
                                    <input type="text" class="form-control" name="nama_user" placeholder="Masukan Nama User" required>
                                </div>
                            </div><!--end col-->

                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Masukan Email" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="passwordInput" class="form-label">Password</label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" class="form-control pe-5" name="password" placeholder="Masukan Password" id="password-input">
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="passwordInput" class="form-label">Hak Akses</label>
                                    <select class="form-control form-select" name="role" required>
                                        <option value="Admin">Super Admin</option>
                                        <option value="Admin Pendaftaran">Admin</option>
                                        <option value="Agen">Agen</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="Keberangkatan">Keberangkatan</option>
                                        <option value="Keuangan">Keuangan</option>
                                    </select>
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

    <!-- Grids in modals -->
    <div class="modal fade" id="updateUser" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Edit User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?= base_url() ?>User/updateAction">
                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="firstName" class="form-label">Nama Jemaah</label>
                                    <select class="form-control form-select" name="id_jemaah" id="id_jemaah" required>
                                        <?php foreach ($jemaah as $jemaah_row) { ?>
                                            <option value="<?= $jemaah_row->id_jemaah ?>"><?= $jemaah_row->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="firstName" class="form-label">Nama User</label>
                                    <input type="hidden" class="form-control" name="id_user" id="id_user" required>
                                    <input type="text" class="form-control" name="nama_user" id="nama_user" placeholder="Masukan Nama User" required>
                                </div>
                            </div><!--end col-->

                            <div class="col-xxl-12">
                                <div>
                                    <label for="emailInput" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email" required>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="passwordInput" class="form-label">Password</label>
                                    <div class="position-relative auth-pass-inputgroup mb-3">
                                        <input type="password" class="form-control pe-5" name="password" placeholder="Masukan Password" id="password-input-edit">
                                        <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon-edit"><i class="ri-eye-fill align-middle"></i></button>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="passwordInput" class="form-label">Hak Akses</label>
                                    <select class="form-control form-select" name="role" id="role" required>
                                        <option value="Admin">Super Admin</option>
                                        <option value="Admin Pendaftaran">Admin</option>
                                        <option value="Agen">Agen</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="Keberangkatan">Keberangkatan</option>
                                        <option value="Keuangan">Keuangan</option>
                                    </select>
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
                url: base_url + 'User/getAllUser',
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


    function getUser(id_user) {
        var id_user = id_user;
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('User/getUser'); ?>",
            data: "id_user=" + id_user,
            success: function(response) {
                var row = JSON.parse(response);
                $('#nama_user').val(row.nama_user);
                $('#id_jemaah').val(row.id_jemaah);
                $('#id_user').val(row.id_user);
                $('#role').val(row.role);
                $('#email').val(row.email);
            }
        });
    }
</script>