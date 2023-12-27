<?php

function active_class($segment, $urlName)
{
  if ($segment == $urlName) {
    echo "active";
  }
}

function show_class($menu, $urlName)
{
  $menu_administrasi = array(
    "SuratPernyataanKeberangkatan",
    "SuratPernyataanKeberangkatan/index",
    "SuratPernyataanKeberangkatan/new",
    "SuratPernyataanKeberangkatan/edit",
    "SuratPengajuanUjroh",
    "SuratPembatalanProgram",
  );

  $menu_pendaftaran = array(
    "UmrahTerjadwal/Daftar",
    "TabunganUmrah/Daftar",
    "Donasi/Daftar",
  );

  $menu_validasi = array(
    "Validasi/Pembayaran",
    "Validasi/detailPembayaran",
    "Validasi/Kelengkapan",
    "Validasi/detailKelengkapan",
    "Validasi/Manifestasi",
    "Validasi/detailManifestasi",
  );

  $menu_listing = array(
    "UmrahTerjadwal/Listing",
    "UmrahTerjadwal/editListing",
    "UmrahTerjadwal/detailListing",
    "TabunganUmrah/Listing",
    "TabunganUmrah/editListing",
    "TabunganUmrah/detailListing",
    "Agen/Listing",
    "Agen/TambahAgen",
    "Agen/detailAgen",
    "Laskar/Listing",
    "Laskar/detailLaskar",
    "Laskar/TambahLaskar",
    "UmrahTerjadwal/ListingJemaah",
    "Donasi/Listing",
    "Donasi/detailListing",
  );

  $menu_keuangan = array(
    "Validasi/HistoryPembayaran",
    "Invoice",
    "Invoice/detailInvoice",
    "Invoice/tambahInvoice",
  );

  if ($menu == "administrasi" && in_array($urlName, $menu_administrasi)) {
    echo "show";
  } elseif ($menu == "pendaftaran" && in_array($urlName, $menu_pendaftaran)) {
    echo "show";
  } elseif ($menu == "validasi" && in_array($urlName, $menu_validasi)) {
    echo "show";
  } elseif ($menu == "listing" && in_array($urlName, $menu_listing)) {
    echo "show";
  } elseif ($menu == "keuangan" && in_array($urlName, $menu_keuangan)) {
    echo "show";
  }
}
