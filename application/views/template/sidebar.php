<?php
$segment1 = $this->uri->segment(1);
$segment2 = ($this->uri->segment(2) != null) ? '/' . $this->uri->segment(2) : "";
$segment = $segment1 . $segment2;
?>
<div class="app-menu navbar-menu">
  <!-- LOGO -->
  <div class="navbar-brand-box">
    <!-- Dark Logo-->
    <a href="<?= site_url("Dashboard") ?>" class="logo logo-dark">
      <span class="logo-sm">
        <img src="<?= base_url() ?>assets/images/logo-alyusro.png" alt="" height="22">
      </span>
      <span class="logo-lg">
        <img src="<?= base_url() ?>assets/images/logo-alyusro.png" alt="" height="17">
      </span>
    </a>
    <!-- Light Logo-->
    <a href="<?= site_url("Dashboard") ?>" class="logo logo-light">
      <span class="logo-sm pt-2 pb-2">
        <img class="mt-3 mb-2" src="<?= base_url() ?>assets/images/logo-alyusro.png" alt="" height="20">
      </span>
      <span class="logo-lg pt-2 pb-2">
        <img class="mt-4 mb-3" src="<?= base_url() ?>assets/images/logo-alyusro.png" alt="" height="75">
      </span>
    </a>
    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
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
          <a class="nav-link menu-link <?php active_class($this->uri->segment(1), 'Dashboard') ?>" href="<?= base_url() ?>Dashboard" role="button">
            <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
          </a>
        </li> <!-- end Dashboard Menu -->
        <li class="menu-title"><span data-key="t-menu">Modul Master</span></li>
        <li class="nav-item">
          <a class="nav-link menu-link <?php active_class($this->uri->segment(1), 'User') ?>" href="<?= base_url() ?>User" role="button" aria-expanded="false">
            <i class=" ri-user-line"></i> <span data-key="t-dashboards">User</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link menu-link <?php active_class($this->uri->segment(1), 'JadwalKeberangkatan') ?>" href="<?= base_url() ?>JadwalKeberangkatan" role="button" aria-expanded="false">
            <i class=" ri-calendar-check-line"></i> <span data-key="t-dashboards">Jadwal Keberangkatan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link menu-link <?php active_class($this->uri->segment(1), 'SubsidiAgen') ?>" href="<?= base_url() ?>SubsidiAgen" role="button" aria-expanded="false">
            <i class=" ri-money-dollar-box-line"></i> <span data-key="t-dashboards">Subsidi Perwakilan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link menu-link <?php active_class($this->uri->segment(1), 'InformasiText') ?>" href="<?= base_url() ?>InformasiText" role="button" aria-expanded="false">
            <i class=" ri-article-line"></i> <span data-key="t-dashboards">Informasi Text</span>
          </a>
        </li>


        <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Modul Utama</span></li>

        <li class="nav-item">
          <a class="nav-link menu-link" href="tables-datatables.html#sidebarAdministrasi" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
            <i class=" ri-article-line"></i> <span data-key="t-authentication">Administrasi</span>
          </a>
          <div class="collapse menu-dropdown <?php show_class("administrasi", $segment) ?>" id="sidebarAdministrasi">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="<?= base_url() ?>SuratPernyataanKeberangkatan" class="nav-link <?php active_class($this->uri->segment(1), 'SuratPernyataanKeberangkatan') ?>" role="button" aria-expanded="false"> Surat Pernyataan Keberangkatan
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>SuratPengajuanUjroh" class="nav-link <?php active_class($this->uri->segment(1), 'SuratPengajuanUjroh') ?>" role="button" aria-expanded="false"> Surat Pengajuan Ujroh
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Donasi/Daftar" class="nav-link" role="button" aria-expanded="false"> Surat Pembatalan Program 8+1
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link collapse" href="tables-datatables.html#sidebarPendaftaran" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
            <i class=" ri-survey-line"></i> <span data-key="t-authentication">Pendaftaran</span>
          </a>
          <div class="collapse menu-dropdown <?php show_class("pendaftaran", $segment) ?>" id="sidebarPendaftaran">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="<?= base_url() ?>UmrahTerjadwal/Daftar" class="nav-link <?php active_class($this->uri->segment(1) . '/' . $this->uri->segment(2), "UmrahTerjadwal/Daftar") ?>" role="button" aria-expanded="false">
                  Umrah Terjadwal
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>TabunganUmrah/Daftar" class="nav-link <?php active_class($this->uri->segment(1) . '/' . $this->uri->segment(2), "TabunganUmrah/Daftar") ?>" role="button" aria-expanded="false"> Tabungan Umrah
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Donasi/Daftar" class="nav-link <?php active_class($this->uri->segment(1) . '/' . $this->uri->segment(2), "Donasi/Daftar") ?>" role="button" aria-expanded="false"> Donasi
                </a>
              </li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link menu-link" href="tables-datatables.html#sidebarValidasi" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
            <i class=" ri-checkbox-circle-line"></i> <span data-key="t-authentication">Validasi</span>
          </a>
          <div class="collapse menu-dropdown <?php show_class("validasi", $segment) ?>" id="sidebarValidasi">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="<?= base_url() ?>Validasi/Pembayaran" class="nav-link <?php active_class($this->uri->segment(1) . '/' . $this->uri->segment(2), "Validasi/Pembayaran") ?>" role="button" aria-expanded="false"> Pembayaran
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Validasi/Kelengkapan" class="nav-link <?php active_class($this->uri->segment(1) . '/' . $this->uri->segment(2), "Validasi/Kelengkapan") ?>" role="button" aria-expanded="false"> Kelengkapan Umrah
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Validasi/Manifestasi" class="nav-link <?php active_class($this->uri->segment(1) . '/' . $this->uri->segment(2), "Validasi/Manifestasi") ?>" role="button" aria-expanded="false"> Manifestasi Umrah
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link menu-link" href="tables-datatables.html#sidebarListing" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAuth">
            <i class=" ri-file-list-3-line"></i> <span data-key="t-authentication">Listing</span>
          </a>
          <div class="collapse menu-dropdown <?php show_class("listing", $segment) ?>" id="sidebarListing">
            <ul class="nav nav-sm flex-column">
              <li class="nav-item">
                <a href="<?= base_url() ?>UmrahTerjadwal/Listing" class="nav-link <?php active_class($this->uri->segment(1) . '/' . $this->uri->segment(2), "UmrahTerjadwal/Listing") ?>" role="button" aria-expanded="false"> Umrah Terjadwal
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>TabunganUmrah/Listing" class="nav-link <?php active_class($this->uri->segment(1) . '/' . $this->uri->segment(2), "TabunganUmrah/Listing") ?>" role="button" aria-expanded="false"> Tabungan Umrah
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Agen/Listing" class="nav-link <?php active_class($this->uri->segment(1) . '/' . $this->uri->segment(2), "Agen/Listing") ?>" role="button" aria-expanded="false"> Perwakilan
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Laskar/Listing" class="nav-link <?php active_class($this->uri->segment(1) . '/' . $this->uri->segment(2), "Laskar/Listing") ?>" role="button" aria-expanded="false"> Agen
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>UmrahTerjadwal/ListingJemaah" class="nav-link <?php active_class($this->uri->segment(1) . '/' . $this->uri->segment(2), "UmrahTerjadwal/ListingJemaah") ?>" role="button" aria-expanded="false"> Database Jemaah
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Donasi/Listing" class="nav-link <?php active_class($this->uri->segment(1) . '/' . $this->uri->segment(2), "Donasi/Listing") ?>" role="button" aria-expanded="false"> Donasi
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link menu-link" href="tables-datatables.html#sidebarKeuangan" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarKeuangan">
            <i class=" ri-money-dollar-box-line"></i> <span data-key="t-keuangan">Keuangan</span>
          </a>
          <div class="collapse menu-dropdown <?php show_class("keuangan", $segment) ?>" id="sidebarKeuangan">
            <ul class="nav nav-sm flex-column">

              <li class="nav-item">
                <a href="<?= base_url() ?>Validasi/HistoryPembayaran" class="nav-link <?php active_class($this->uri->segment(1) . '/' . $this->uri->segment(2), "Validasi/HistoryPembayaran") ?>" data-key="t-history-pembayaran"> History Pembayaran
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url() ?>Invoice/" class="nav-link <?php active_class($this->uri->segment(1), "Invoice") ?>" data-key="t-invoice"> Invoice
                </a>
              </li>
              <li class="nav-item">
                <a href="https://akunting.alyusrobandung.com/login" class="nav-link" data-key="t-analytics"> Keuangan Perusahaan
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