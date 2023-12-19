<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="<?= base_url() ?>assets/images/logo-alyusro.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="<?= base_url() ?>assets/images/logo-alyusro.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.html" class="logo logo-light">
            <span class="logo-sm pt-2 pb-2">
                <img class="mt-3 mb-2" src="<?= base_url() ?>assets/images/logo-alyusro.png" alt="" height="20">
            </span>
            <span class="logo-lg pt-2 pb-2">
                <img class="mt-4 mb-3" src="<?= base_url() ?>assets/images/logo-alyusro.png" alt="" height="75">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">

                <li class="menu-title"><span data-key="t-menu">Modul Dashboard</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?=base_url()?>Dashboard" role="button">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li> <!-- end Dashboard Menu -->
                <li class="menu-title"><span data-key="t-menu">Modul Master</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?=base_url()?>User" role="button" aria-expanded="false">
                        <i class=" ri-user-line"></i> <span data-key="t-dashboards">User</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?=base_url()?>JadwalKeberangkatan" role="button"
                        aria-expanded="false">
                        <i class=" ri-calendar-check-line"></i> <span data-key="t-dashboards">Jadwal
                            Keberangkatan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="<?=base_url()?>SubsidiAgen" role="button"
                        aria-expanded="false">
                        <i class=" ri-money-dollar-box-line"></i> <span data-key="t-dashboards">Subsidi Perwakilan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link " href="<?=base_url()?>InformasiText" role="button"
                        aria-expanded="false">
                        <i class=" ri-article-line"></i> <span data-key="t-dashboards">Informasi Text</span>
                    </a>
                </li>
                <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Modul Utama</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="tables-datatables.html#sidebarPendaftaran"
                        data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class=" ri-survey-line"></i> <span data-key="t-authentication">Pendaftaran</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarPendaftaran">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?=base_url()?>UmrahTerjadwal/Daftar" class="nav-link " role="button"
                                    aria-expanded="false"> Umrah Terjadwal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=base_url()?>TabunganUmrah/Daftar" class="nav-link " role="button"
                                    aria-expanded="false"> Tabungan Umrah
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="<?=base_url()?>Agen/Daftar" class="nav-link" role="button"
                                    aria-expanded="false"> Agen
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a href="<?=base_url()?>Donasi/Daftar" class="nav-link" role="button"
                                    aria-expanded="false"> Donasi
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="tables-datatables.html#sidebarValidasi"
                        data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class=" ri-checkbox-circle-line"></i> <span data-key="t-authentication">Validasi</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarValidasi">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?=base_url()?>Validasi/Pembayaran" class="nav-link" role="button"
                                    aria-expanded="false"> Pembayaran
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=base_url()?>Validasi/Kelengkapan" class="nav-link" role="button"
                                    aria-expanded="false"> Kelengkapan Umrah
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=base_url()?>Validasi/Manifestasi" class="nav-link" role="button"
                                    aria-expanded="false"> Manifestasi Umrah
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="tables-datatables.html#sidebarListing" data-bs-toggle="collapse"
                        role="button" aria-expanded="false" aria-controls="sidebarAuth">
                        <i class=" ri-file-list-3-line"></i> <span data-key="t-authentication">Listing</span>
                    </a>
                    <div class="collapse menu-dropdown show" id="sidebarListing">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="<?=base_url()?>UmrahTerjadwal/Listing " class="nav-link active" role="button"
                                    aria-expanded="false"> Umrah Terjadwal
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=base_url()?>TabunganUmrah/Listing" class="nav-link" role="button"
                                    aria-expanded="false"> Tabungan Umrah
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=base_url()?>Agen/Listing" class="nav-link" role="button"
                                    aria-expanded="false"> Perwakilan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=base_url()?>Laskar/Listing" class="nav-link" role="button"
                                    aria-expanded="false"> Agen
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=base_url()?>UmrahTerjadwal/ListingJemaah" class="nav-link" role="button"
                                    aria-expanded="false"> Database Jemaah
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=base_url()?>Donasi/Listing" class="nav-link" role="button"
                                    aria-expanded="false"> Donasi
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="tables-datatables.html#sidebarKeuangan"
                        data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarKeuangan">
                        <i class=" ri-money-dollar-box-line"></i> <span data-key="t-keuangan">Keuangan</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarKeuangan">
                        <ul class="nav nav-sm flex-column">
                            
                            <li class="nav-item">
                                <a href="<?=base_url()?>Validasi/HistoryPembayaran" class="nav-link"
                                    data-key="t-history-pembayaran"> History Pembayaran
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?=base_url()?>Invoice/" class="nav-link" data-key="t-invoice"> Invoice
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="https://akunting.alyusrobandung.com/login" class="nav-link" data-key="t-analytics">
                                    Keuangan Perusahaan
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
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
                        <h4 class="mb-sm-0">Edit Data Jemaah</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Listing</a></li>
                                <li class="breadcrumb-item active">Edit Data Jemaah </li>
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
                            <h5 class="card-title mb-0" style="float:left">Form Edit Data Jemaah</h5>
                            <!-- <button type="button" class="btn btn-primary" style="float:right" name="button" data-bs-toggle="modal" data-bs-target="#addJadwalKeberangkatan">Tambah Jadwal</button> -->
                        </div>
                        <div class="card-body">
                            <form action="<?=base_url()?>/UmrahTerjadwal/editAction" method="post"
                                class="needs-validation" novalidate enctype="multipart/form-data">
                                <div class="row g-3">


                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nama"
                                                placeholder="Masukan Nama Lengkap" required value="<?=$jemaah->nama?>">
                                            <label>Nama Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nik" placeholder="Masukan NIK"
                                                required value="<?=$jemaah->nik_jemaah?>" readonly>
                                            <label>NIK</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Masukan Email" required value="<?=$jemaah->email?>">
                                            <label>Email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="tempat_lahir"
                                                placeholder="Masukan Tempat Lahir" required value="<?=$jemaah->tempat_lahir?>">
                                            <label>Tempat Lahir</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control flatpickr_form" name="tanggal_lahir"
                                                placeholder="Masukan Tanggal Lahir" value="<?=$jemaah->tanggal_lahir?>">
                                            <label>Tanggal Lahir</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <!-- <input type="text" class="form-control" name="pekerjaan"
                                                placeholder="Masukan Pekerjaan" required> -->
                                            <!-- <label>Pekerjaan</label> -->
                                            <select class="form-control js-example-basic-single" name="pekerjaan" id="pekerjaan"
                                            style="height:57px;">
                                            <option value="">Pekerjaan</option>
                                           
                                            <option value="PNS" data-nama="PNS" <?php if($jemaah->pekerjaan=="PNS"){echo 'selected';}?> >PNS</option>
                                            <option value="TENTARA" data-nama="TENTARA" <?php if($jemaah->pekerjaan=="TENTARA"){echo 'selected';}?>>TENTARA</option>
                                            <option value="KEPOLISIAN" data-nama="KEPOLISIAN" <?php if($jemaah->pekerjaan=="KEPOLISIAN"){echo 'selected';}?>>KEPOLISIAN</option>
                                            <option value="KARYAWAN BUMN" data-nama="KARYAWAN BUMN" <?php if($jemaah->pekerjaan=="KARYAWAN BUMN"){echo 'selected';}?>>KARYAWAN BUMN</option>
                                            <option value="TEKNIK SIPIL" data-nama="TEKNIK SIPIL" <?php if($jemaah->pekerjaan=="TEKNIK SIPIL"){echo 'selected';}?>>TEKNIK SIPIL</option>
                                            <option value="PENGUSAHA" data-nama="PENGUSAHA" <?php if($jemaah->pekerjaan=="PENGUSAHA"){echo 'selected';}?>>PENGUSAHA</option>
                                            <option value="KARYAWAN SWASTA" data-nama="KARYAWAN SWASTA" <?php if($jemaah->pekerjaan=="KARYAWAN SWASTA"){echo 'selected';}?>>KARYAWAN SWASTA</option>
                                            <option value="BURUH HARIAN LEPAS" data-nama="BURUH HARIAN LEPAS" <?php if($jemaah->pekerjaan=="BURUH HARIAN LEPAS"){echo 'selected';}?>>BURUH HARIAN LEPAS</option>
                                            <option value="SENIMAN" data-nama="SENIMAN" <?php if($jemaah->pekerjaan=="SENIMAN"){echo 'selected';}?>>SENIMAN</option>
                                            <option value="KEDOKTERAN" data-nama="KEDOKTERAN" <?php if($jemaah->pekerjaan=="KEDOKTERAN"){echo 'selected';}?>>KEDOKTERAN</option>
                                            <option value="PEDAGANG" data-nama="PEDAGANG" <?php if($jemaah->pekerjaan=="PEDAGANG"){echo 'selected';}?>>PEDAGANG</option>
                                            <option value="PETANI" data-nama="PETANI" <?php if($jemaah->pekerjaan=="PETANI"){echo 'selected';}?>>PETANI</option>
                                            <option value="PETERNAK" data-nama="PETERNAK" <?php if($jemaah->pekerjaan=="PETERNAK"){echo 'selected';}?>>PETERNAK</option>
                                            <option value="MENGURUS RUMAH TANGGA" data-nama="MENGURUS RUMAH TANGGA" <?php if($jemaah->pekerjaan=="MENGURUS RUMAH TANGGA"){echo 'selected';}?>>MENGURUS RUMAH TANGGA</option>
                                            <option value="PENSIUNAN" data-nama="PENSIUNAN" <?php if($jemaah->pekerjaan=="PENSIUNAN"){echo 'selected';}?>>PENSIUNAN</option>
                                            <option value="LAINNYA" data-nama="LAINNYA" <?php if($jemaah->pekerjaan=="LAINNYA"){echo 'selected';}?>>LAINNYA</option>

                                        </select>
                                    
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <!-- Inline Radios -->
                                        <div class="box-radio">
                                            <label for="">Jenis Kelamin :</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="inlineRadio1" value="Laki-Laki" required <?php if($jemaah->jenis_kelamin=="Laki-Laki"){echo 'checked';}?>>
                                                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_kelamin"
                                                    id="inlineRadio2" value="Perempuan" required <?php if($jemaah->jenis_kelamin=="Perempuan"){echo 'checked';}?>>
                                                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <!-- Inline Radios -->
                                        <div class="box-radio">
                                            <label for="">Status :</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_pernikahan"
                                                    id="inlineRadioMenikah" value="Menikah" required <?php if($jemaah->status_pernikahan=="Menikah"){echo 'checked';}?>>
                                                <label class="form-check-label" for="inlineRadioMenikah">Menikah</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status_pernikahan"
                                                    id="inlineRadioLajang" value="Lajang" required <?php if($jemaah->status_pernikahan=="Lajang"){echo 'checked';}?>>
                                                <label class="form-check-label" for="inlineRadioLajang">Lajang</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <!-- <div class="form-floating"> -->
                                        <select class="form-control js-example-basic-single" name="kota" id="kota"
                                            style="height:57px;">
                                            <option value="">Kota Tinggal</option>
                                            <?php
                                                  foreach ($kota as $row_kota) {
                                                ?>
                                            <option value="<?=$row_kota->kode_kota?>"
                                                data-nama="<?=$row_kota->nama_kota?>" <?php if($jemaah->kota==$row_kota->nama_kota){echo 'selected';}?>><?=$row_kota->kode_kota?> |
                                                <?=$row_kota->nama_kota?></option>

                                            <?php } ?>
                                        </select>
                                        <input type="hidden" class="form-control" name="nama_kota" id="nama_kota"
                                            placeholder="Masukan Kota Tinggal" value="<?=$jemaah->kota?>">
                                        <!-- </div> -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <textarea name="alamat" class="form-control" rows="8" cols="80"
                                                placeholder="Masukan Alamat Lengkap" required ><?=$jemaah->alamat?></textarea>
                                            <label>Alamat Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="no_telp"
                                                placeholder="Masukan Nomor Telephon" required value="<?=$jemaah->no_telp?>">
                                            <label>No HP/Whatsapp</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <textarea name="riwayat_penyakit" class="form-control" rows="8" cols="80"
                                                placeholder="Masukan Riwayat Penyakit" required ><?=$jemaah->riwayat_penyakit?></textarea>
                                            <label>Riwayat Penyakit</label>
                                        </div>
                                    </div>


                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nama_bank"
                                                placeholder="Nama Bank" required value="<?=$jemaah->nama_bank?>">
                                            <label>Nama Bank</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="no_rekening"
                                                placeholder="No Rekening" required value="<?=$jemaah->no_rekening?>">
                                            <label>No Rekening</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="atas_nama"
                                                placeholder="Atas Nama" required value="<?=$jemaah->atas_nama?>">
                                            <label>Atas Nama</label>
                                        </div>
                                    </div>



                                    <div class="col-lg-4">
                                        <select class="form-control js-example-basic-single" name="user_id_agen" id="user_id_agen"
                                        style="height:57px;" required>
                                            <option value="">ID Perwakilan</option>
                                            <option value="BDO-000-000" <?php if($jemaah->user_id_agen=="BDO-000-000"){echo 'selected';}?>>BDO-000-0000</option>
                                            <?php
                                                foreach ($agen as $row_agen) {
                                                ?>
                                            <option value="<?=$row_agen->user_id_agen?>"
                                                data-nama="<?=$row_agen->nama_agen?>" <?php if($jemaah->user_id_agen==$row_agen->user_id_agen){echo 'selected';}?>><?=$row_agen->user_id_agen?> |
                                                <?=$row_agen->nama_agen?></option>

                                            <?php } ?>
                                        </select>
        
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control js-example-basic-single" name="user_id_referall" id="user_id_referall"
                                        style="height:57px;" required>
                                            <option value="">ID Agen</option>
                                            <option value="BDO-000-000" <?php if($jemaah->user_id_referall=="BDO-000-000"){echo 'selected';}?>>BDO-000-0000</option>
                                            <?php
                                                foreach ($laskar as $row_laskar) {
                                                ?>
                                            <option value="<?=$row_laskar->user_id_laskar?>"
                                                data-nama="<?=$row_laskar->nama_laskar?>" <?php if($jemaah->user_id_referall==$row_laskar->user_id_laskar){echo 'selected';}?>><?=$row_laskar->user_id_laskar?> |
                                                <?=$row_laskar->nama_laskar?></option>

                                            <?php } ?>
                                        </select>

                                    </div>
                                    <div class="col-lg-4">
                                        <!-- Inline Radios -->
                                        <div class="box-radio">

                                            <label for="">Jenis Ujroh :</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_ujroh"
                                                    id="inlineRadio3" value="Ujroh" checked required <?php if($jemaah->jenis_ujroh=="Ujroh"){echo 'checked';}?>>
                                                <label class="form-check-label" for="inlineRadio3">Ujroh</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_ujroh"
                                                    id="inlineRadio4" value="Paket A" required <?php if($jemaah->jenis_ujroh=="Paket A"){echo 'checked';}?>>
                                                <label class="form-check-label" for="inlineRadio4">Paket A</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jenis_ujroh"
                                                    id="inlineRadio5" value="Paket B" required <?php if($jemaah->jenis_ujroh=="Paket B"){echo 'checked';}?>>
                                                <label class="form-check-label" for="inlineRadio5">Paket B</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-8">
                                        <!-- <label class="">Harap Upload Foto KTP Asli</label> -->
                                        <input class="form-control form-ktp" name="ktp" type="file" required value="<?=$jemaah->ktp_jemaah?>">

                                    </div>

                                    <div class="col-lg-4">
                                        <div class="box-radio">

                                            <label for="">Mendaftar Via :</label><br>
                                            <div class="form-check mb-2 form-check-inline">
                                                <input class="form-check-input" type="radio" name="daftar_via"
                                                    id="flexRadioDefault1" required value="Agen" required <?php if($jemaah->daftar_via=="Agen"){echo 'checked';}?> >
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                    Agen Perwakilan
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="daftar_via"
                                                    id="flexRadioDefault2" value="Online" required <?php if($jemaah->daftar_via=="Online"){echo 'checked';}?>>
                                                <label class="form-check-label" for="flexRadioDefault2">
                                                    Online
                                                </label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating" id="div_pilihan_paket">
                                            <select class="form-control js-example-basic-single"
                                                name="paket_keberangkatan" id="paket_keberangkatan"
                                                style="height:57px;">
                                                <option value="">Pilih Paket Keberangkatan</option>
                                                <option value="">Belum Memilih Paket</option>
                                                <?php
                                              foreach ($paket_keberangkatan as $row_paket_keberangkatan) {
                                            ?>
                                                <option value="<?=$row_paket_keberangkatan->id_paket_keberangkatan?>" data-harga="<?=number_format($row_paket_keberangkatan->harga_paket)?>" <?php if($jemaah->id_paket_keberangkatan==$row_paket_keberangkatan->id_paket_keberangkatan){echo 'selected';}?>>
                                                    <?=$row_paket_keberangkatan->nama_paket?> |
                                                    <?=$row_paket_keberangkatan->tanggal_keberangkatan?> | RP.
                                                    <?=number_format($row_paket_keberangkatan->harga_paket)?>
                                                </option>
  
                                                <?php } ?>
                                            </select>
  
                                        </div>
                                      </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="nominal_custom"
                                                id="cleave-numeral" placeholder="Masukan Nominal Custom" value="<?=$jemaah->nominal_pembayaran?>">
                                            <label>Nominal Pembayaran</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="box-radio" style="height:100%;">

                                            <label class="">Pembayaran Awal Yang Di Pilih :</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input " name="nominal_pembayaran" type="radio"
                                                    id="inlineCheckbox1" value="2700000" required <?php if($jemaah->nominal_pembayaran=="2700000"){echo 'checked';}?>>
                                                <label class="form-check-label" for="inlineCheckbox1">Pendaftaran Awal |
                                                    Rp.2,700,000</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="nominal_pembayaran" type="radio"
                                                    id="inlineCheckbox2" value="10200000" required <?php if($jemaah->nominal_pembayaran=="10200000"){echo 'checked';}?>>
                                                <label class="form-check-label" for="inlineCheckbox2">Booking Tiket
                                                    Pesawat | Rp.10,200,000</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="nominal_pembayaran" type="radio"
                                                    id="inlineCheckbox3" value="full_paket" required <?php if($jemaah->nominal_pembayaran==$jemaah->harga_paket){echo 'checked';}?>>
                                                <label class="form-check-label" for="inlineCheckbox3">Full Paket</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="nominal_pembayaran" type="radio"
                                                    id="inlineCheckbox4" value="nominal_custom" required <?php if($jemaah->nominal_pembayaran!="2700000" && $jemaah->nominal_pembayaran!="10200000" && $jemaah->nominal_pembayaran!=$jemaah->harga_paket){echo 'checked';}?>>
                                                <label class="form-check-label" for="inlineCheckbox4">Nominal Custom</label>
                                            </div>

                                        </div>
                                    </div>


                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-info"
                                                style="width:100%;">Submit</button>
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
    <!-- End Page-content -->



    <script>

        $(document).ready(function (e) {


            var base_url = "<?php echo base_url();?>"; // You can use full url here but I prefer like this
            $('#user-table').DataTable({
                "pageLength": 10,
                "serverSide": true,
                "order": [[0, "asc"]],
                "ajax": {
                    url: base_url + 'JadwalKeberangkatan/getAllJadwalKeberangkatan',
                    type: 'POST'
                },
            }); // End of DataTable

            if ($('input[name=gender]:checked').length > 0) {
                // do something here
            }

            $('#inlineCheckbox1').click(function () {
                $('#cleave-numeral').prop('readonly',true);
                $('#cleave-numeral').val('2,700,000');
                // $('#numeral2').val('');
            });
            $('#inlineCheckbox2').click(function () {
                $('#cleave-numeral').prop('readonly',true);
                // $('#numeral2').val('');
                $('#cleave-numeral').val('10,200,000');
            });
            $('#inlineCheckbox3').click(function () {
                var harga_paket = $('#paket_keberangkatan').find(':selected').attr('data-harga');
                if(harga_paket==""){
                    var t;
                    Swal.fire(
                    {
                        title:"Oops!!",
                        html:"Harap Pilih Paket Keberangkatan Terlebih Dahulu!",
                        icon:"error",
                        timer:4000,
                        timerProgressBar:!0,
                        showCloseButton:!0,
                        didOpen:function(){
                        Swal.showLoading(),
                        t=setInterval(function(){
                            var t=Swal.getHtmlContainer();!t||(t=t.querySelector("b"))&&(t.textContent=Swal.getTimerLeft())
                        },100)},
                            onClose:function(){
                            clearInterval(t)
                            }
                    }).then(function(t){
                        t.dismiss===Swal.DismissReason.timer&&console.log("I was closed by the timer")
                    })

                }
                $('#cleave-numeral').prop('readonly',true);
                $('#cleave-numeral').val(harga_paket);
                // $('#numeral2').val('');
            });
            $('#inlineCheckbox4').click(function () {
                $('#cleave-numeral').removeAttr('readonly');
                $('#numeral2').val('');
            });

            $('#inlineCheckbox3').click(function () {
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

        $('#kota').on('change', function () {
            var nama_kota = $(this).find(':selected').attr('data-nama');
            $('#nama_kota').val(nama_kota);

        });
        $('#paket_keberangkatan').on('change', function () {
            var harga_paket = $(this).find(':selected').attr('data-harga');
            $('#cleave-numeral').val(harga_paket);           
            // $('#nama_kota').val(nama_kota);
        
        });

    </script>