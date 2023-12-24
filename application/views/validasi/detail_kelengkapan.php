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
            <h4 class="mb-sm-0">Validasi Pebayaran</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Validasi</a></li>
                <li class="breadcrumb-item active">Detail Tagihan Pembayaran</li>
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
              <h5 class="card-title mb-0" style="float:left">Detail Data Validasi Pembayaran</h5>
              <button type="button" class="btn btn-info" style="float:right" name="button" onclick="printDiv('printDiv')" id="printKelengkapan">Print Kelengkapan</button>
            </div>
            <?php
            if ($rows->jenis_umrah == 1) {
              $jenis_umrah = "Umrah Terjadwal";
            } else if ($rows->jenis_umrah == 2) {
              $jenis_umrah = "Tabungan Umrah";
            }

            if ($rows->user_id_jemaah == '-') {
              $nomor_id = $rows->no_reg_umrah_jemaah;
            } else {
              $nomor_id = $rows->user_id_jemaah;
            }
            ?>
            <div class="card-body container pt-5">
              <form action="<?= base_url() ?>/Validasi/updateKelengkapanAction" method="post">
                <div class="row">
                  <div class="col-lg-12">
                    <h2>
                      <?= $nomor_id ?>
                    </h2>
                  </div>
                  <div class="col-lg-6">
                    <h4>
                      <?= $rows->nama ?>
                    </h4>
                    <h6>
                      <?= $rows->jenis_kelamin ?>
                    </h6>
                  </div>
                  <!-- <div class="col-lg-3">
                                        <h4>Laki-Laki</h4> -->
                  <!-- </div> -->
                  <div class="col-lg-6">
                    <h4>
                      <?= $rows->alamat ?>
                    </h4>
                    <h6>
                      <?= $rows->kota ?>
                    </h6>
                  </div>
                  <div class="cold-lg-12">
                    <hr>
                  </div>
                  <div class="col-lg-6">
                    <table class="table table-nowrap">
                      <tr>
                        <td style="width:30%"><b>Tanggal Reg</b></td>
                        <td>:</td>
                        <td>
                          <?= date("d/m/Y", strtotime($rows->tanggal_daftar)) ?>
                        </td>
                      </tr>
                      <tr>
                        <td><b>ID Perwakilan</b></td>
                        <td>:</td>
                        <td>
                          <?= $rows->user_id_agen ?>
                        </td>
                      </tr>
                      <tr>
                        <td><b>ID Agen</b></td>
                        <td>:</td>
                        <td>
                          <?= $rows->user_id_referall ?>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-6">
                    <table class="table table-nowrap">
                      <tr>
                        <td style="width:30%"><b>ID Jemaah</b></td>
                        <td>:</td>
                        <td>
                          <?= $rows->user_id_jemaah ?>
                        </td>
                      </tr>
                      <tr>
                        <td style="width:30%"><b>Nominal</b></td>
                        <td>:</td>
                        <td>
                          <?= number_format($rows->total_saldo_jemaah) ?>
                        </td>
                      </tr>
                      <tr>
                        <td><b>Program</b></td>
                        <td>:</td>
                        <td>
                          <?= $jenis_umrah ?>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-lg-12">
                    <h3 class="mt-4 mb-4">Validasi Kelengkapan Umrah</h3>
                  </div>
                  <div class="col-lg-4">
                    <!-- Base Example -->
                    <?php if ($rows->jenis_kelamin != "Laki-Laki") { ?>
                      <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="mukena_bergo" id="mukena_bergo" value="1" <?php if ($rows->mukena_bergo == 1) {
                                                                                                                          echo 'checked="checked"';
                                                                                                                        } ?> <?php if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keberangkatan') {
                                                                                                                                echo "disabled";
                                                                                                                              } ?>>
                        <label class="form-check-label" for="mukena_bergo">
                          Mukena & Bergo
                        </label>
                      </div>
                    <?php } else { ?>
                      <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="seragam_batik" id="seragam_batik" value="1" <?php if ($rows->seragam_batik == 1) {
                                                                                                                            echo 'checked="checked"';
                                                                                                                          } ?> <?php if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keberangkatan') {
                                                                                                                                  echo "disabled";
                                                                                                                                } ?>>
                        <label class="form-check-label" for="seragam_batik">
                          Seragam Batik
                        </label>
                      </div>
                    <?php } ?>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" name="sejadah" id="sejadah" value="1" <?php
                                                                                                            if ($rows->sejadah == 1) {
                                                                                                              echo 'checked="checked"';
                                                                                                            } ?> <?php if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keberangkatan') {
                                                                                                                    echo "disabled";
                                                                                                                  } ?>>
                      <label class="form-check-label" for="sejadah">
                        Sejadah
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" name="tas_paspor" id="tas_paspor" value="1" <?php
                                                                                                                  if ($rows->tas_paspor == 1) {
                                                                                                                    echo 'checked="checked"';
                                                                                                                  } ?> <?php if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keberangkatan') {
                                                                                                                          echo "disabled";
                                                                                                                        } ?>>
                      <label class="form-check-label" for="tas_paspor">
                        Tas Paspor
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" name="buku_doa" id="buku_doa" value="1" <?php
                                                                                                              if ($rows->buku_doa == 1) {
                                                                                                                echo 'checked="checked"';
                                                                                                              } ?> <?php if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keberangkatan') {
                                                                                                                      echo "disabled";
                                                                                                                    } ?>>
                      <label class="form-check-label" for="buku_doa">
                        Buku Doa
                      </label>
                    </div>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" name="souvenir" id="souvenir" value="1" <?php
                                                                                                              if ($rows->souvenir == 1) {
                                                                                                                echo 'checked="checked"';
                                                                                                              } ?> <?php if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keberangkatan') {
                                                                                                                      echo "disabled";
                                                                                                                    } ?>>
                      <label class="form-check-label" for="souvenir">
                        Souvenir
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <!-- Base Example -->

                    <div class="form-check mb-2">

                      <input class="form-check-input" type="checkbox" name="koper_bagasi_cabin" id="koper_bagasi_cabin" value="1" <?php if ($rows->koper_bagasi_cabin == 1) {
                                                                                                                                    echo 'checked="checked"';
                                                                                                                                  } ?> <?php if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keberangkatan') {
                                                                                                                                          echo "disabled";
                                                                                                                                        } ?>>
                      <label class="form-check-label" for="koper_bagasi_cabin">
                        Koper Bagasi & Kabin
                      </label>
                    </div>

                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" name="syal" id="syal" value="1" <?php
                                                                                                      if ($rows->syal == 1) {
                                                                                                        echo 'checked="checked"';
                                                                                                      } ?> <?php if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keberangkatan') {
                                                                                                              echo "disabled";
                                                                                                            } ?>>
                      <label class="form-check-label" for="syal">
                        Syal
                      </label>
                    </div>
                    <div class="form-check mb-2">

                      <input class="form-check-input" type="checkbox" name="tas_sandal" id="tas_sandal" value="1" <?php
                                                                                                                  if ($rows->tas_sandal == 1) {
                                                                                                                    echo 'checked="checked"';
                                                                                                                  } ?> <?php if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keberangkatan') {
                                                                                                                          echo "disabled";
                                                                                                                        } ?>>
                      <label class="form-check-label" for="tas_sandal">
                        Tas Sandal
                      </label>
                    </div>
                    <div class="form-check mb-2">

                      <input class="form-check-input" type="checkbox" name="sabuk" id="sabuk" value="1" <?php
                                                                                                        if ($rows->sabuk == 1) {
                                                                                                          echo 'checked="checked"';
                                                                                                        } ?> <?php if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keberangkatan') {
                                                                                                                echo "disabled";
                                                                                                              } ?>>
                      <label class="form-check-label" for="sabuk">
                        Sabuk
                      </label>
                    </div>
                    <?php if ($rows->jenis_kelamin == "Laki-Laki") { ?>
                      <div class="form-check mb-2">

                        <input class="form-check-input" type="checkbox" name="baju_koko" id="baju_koko" value="1" <?php
                                                                                                                  if ($rows->baju_koko == 1) {
                                                                                                                    echo 'checked="checked"';
                                                                                                                  } ?> <?php if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keberangkatan') {
                                                                                                                          echo "disabled";
                                                                                                                        } ?>>
                        <label class="form-check-label" for="baju_koko">
                          Baju Koko
                        </label>
                      </div>
                    <?php } else { ?>
                      <div class="form-check mb-2">

                        <input class="form-check-input" type="checkbox" name="kerudung" id="kerudung" value="1" <?php
                                                                                                                if ($rows->kerudung == 1) {
                                                                                                                  echo 'checked="checked"';
                                                                                                                } ?> <?php if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keberangkatan') {
                                                                                                                        echo "disabled";
                                                                                                                      } ?>>
                        <label class="form-check-label" for="kerudung">
                          Kerudung
                        </label>
                      </div>
                    <?php } ?>
                  </div>
                  <div class="col-lg-4">
                    <input type="hidden" class="form-control" name="id_kelengkapan" value="<?= $rows->id_kelengkapan ?>">
                    <input type="hidden" class="form-control" name="no_reg_umrah_jemaah" value="<?= $rows->no_reg_umrah_jemaah ?>">
                    <div class="form-floating">
                      <input type="text" class="form-control" name="petugas_pengirim" placeholder="Petugas Pengirim" value="<?= $rows->petugas_pengirim ?>" <?php if ($this->session->userdata('role') != 'Admin' && $this->session->userdata('role') != 'Keberangkatan') {
                                                                                                                                                              echo "disabled";
                                                                                                                                                            } ?>>
                      <label>Petugas Pengirim</label>
                    </div>
                    <?php
                    if ($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Keberangkatan') {
                    ?>
                      <button type="submit" class="btn btn-info waves-effect waves-light mt-4">Update Kelengkapan</button>
                      <button type="button" class="btn btn-danger waves-effect waves-light mt-4"><a href="<?= base_url() ?>Validasi/Kelengkapan" class="text-white">Belum Diterima</a></button>
                    <?php }  ?>
                    <!-- Base Example -->
                  </div>
                  <!-- <div class="col-lg-6 mt-3">
                                      </div>
                                      <div class="col-lg-6 mt-3 text-end">
                                        <button type="button" class="btn btn-info waves-effect waves-light"><a href="<?= base_url() ?>Validasi/updateKelengkapanAction/<?= $rows->id_kelengkapan ?>" class="text-white">Update Kelengkapan</button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light"><a href="<?= base_url() ?>Validasi/Pembayaran" class="text-white">Belum Diterima</a></button>
                                      </div> -->

                </div>
              </form>
            </div>
            <div class="card-body container pt-5" id="printDiv" style="display: none">
              <div class="row">
                <div class="col-lg-12">
                  <h2>
                    <?= $nomor_id ?>
                  </h2>
                </div>
                <div class="col-lg-6">
                  <h4>
                    <?= $rows->nama ?>
                  </h4>
                  <h6>
                    <?= $rows->jenis_kelamin ?>
                  </h6>
                </div>
                <!-- <div class="col-lg-3">
                                      <h4>Laki-Laki</h4> -->
                <!-- </div> -->
                <div class="col-lg-6">
                  <h4>
                    <?= $rows->alamat ?>
                  </h4>
                  <h6>
                    <?= $rows->kota ?>
                  </h6>
                </div>
                <div class="cold-lg-12">
                  <hr>
                </div>
                <div class="col-lg-6">
                  <table class="table table-nowrap">
                    <tr>
                      <td style="width:30%"><b>Tanggal Reg</b></td>
                      <td>:</td>
                      <td>
                        <?= date("d/m/Y", strtotime($rows->tanggal_daftar)) ?>
                      </td>
                    </tr>
                    <tr>
                      <td><b>ID Agen</b></td>
                      <td>:</td>
                      <td>
                        <?= $rows->user_id_agen ?>
                      </td>
                    </tr>
                    <tr>
                      <td><b>ID Referal</b></td>
                      <td>:</td>
                      <td>
                        <?= $rows->user_id_referall ?>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="col-lg-6">
                  <table class="table table-nowrap">
                    <tr>
                      <td style="width:30%"><b>ID Jemaah</b></td>
                      <td>:</td>
                      <td>
                        <?= $rows->user_id_jemaah ?>
                      </td>
                    </tr>
                    <tr>
                      <td style="width:30%"><b>Nominal</b></td>
                      <td>:</td>
                      <td>
                        <?= number_format($rows->total_saldo_jemaah) ?>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Program</b></td>
                      <td>:</td>
                      <td>
                        <?= $jenis_umrah ?>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="col-lg-12">
                  <h3 class="mt-4 mb-4">Validasi Kelengkapan Umrah</h3>
                </div>
                <div class="col-lg-3">
                  <!-- Base Example -->
                  <?php if ($rows->jenis_kelamin != "Laki-Laki") { ?>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" name="mukena_bergo" id="mukena_bergo" value="1" <?php if ($rows->mukena_bergo == 1) {
                                                                                                                        echo 'checked="checked"';
                                                                                                                      } ?>>
                      <label class="form-check-label" for="mukena_bergo">
                        Mukena & Bergo
                      </label>
                    </div>
                  <?php } else { ?>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" name="seragam_batik" id="seragam_batik" value="1" <?php if ($rows->seragam_batik == 1) {
                                                                                                                          echo 'checked="checked"';
                                                                                                                        } ?>>
                      <label class="form-check-label" for="seragam_batik">
                        Seragam Batik
                      </label>
                    </div>
                  <?php } ?>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="sejadah" id="sejadah" value="1" <?php
                                                                                                          if ($rows->sejadah == 1) {
                                                                                                            echo 'checked="checked"';
                                                                                                          } ?>>
                    <label class="form-check-label" for="sejadah">
                      Sejadah
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="tas_paspor" id="tas_paspor" value="1" <?php
                                                                                                                if ($rows->tas_paspor == 1) {
                                                                                                                  echo 'checked="checked"';
                                                                                                                } ?>>
                    <label class="form-check-label" for="tas_paspor">
                      Tas Paspor
                    </label>
                  </div>

                </div>
                <div class="col-lg-3">
                  <!-- Base Example -->

                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="buku_doa" id="buku_doa" value="1" <?php
                                                                                                            if ($rows->buku_doa == 1) {
                                                                                                              echo 'checked="checked"';
                                                                                                            } ?>>
                    <label class="form-check-label" for="buku_doa">
                      Buku Doa
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="souvenir" id="souvenir" value="1" <?php
                                                                                                            if ($rows->souvenir == 1) {
                                                                                                              echo 'checked="checked"';
                                                                                                            } ?>>
                    <label class="form-check-label" for="souvenir">
                      Souvenir
                    </label>
                  </div>


                </div>
                <div class="col-lg-3">
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="koper_bagasi_cabin" id="koper_bagasi_cabin" value="1" <?php if ($rows->koper_bagasi_cabin == 1) {
                                                                                                                                  echo 'checked="checked"';
                                                                                                                                } ?>>
                    <label class="form-check-label" for="koper_bagasi_cabin">
                      Koper Bagasi & Kabin
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="bantal_leher" id="bantal_leher" value="1" <?php if ($rows->bantal_leher == 1) {
                                                                                                                      echo 'checked="checked"';
                                                                                                                    } ?>>
                    <label class="form-check-label" for="bantal_leher">
                      Bantal Leher
                    </label>
                  </div>
                </div>
                <div class="col-lg-3">

                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="kain_ihrom" id="kain_ihrom" value="1" <?php
                                                                                                                if ($rows->kain_ihrom == 1) {
                                                                                                                  echo 'checked="checked"';
                                                                                                                } ?>>
                    <label class="form-check-label" for="kain_ihrom">
                      Kain Ihrom
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="syal" id="syal" value="1" <?php
                                                                                                    if ($rows->syal == 1) {
                                                                                                      echo 'checked="checked"';
                                                                                                    } ?>>
                    <label class="form-check-label" for="syal">
                      Syal
                    </label>
                  </div>
                </div>
                <div class="col-lg-3">

                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="tas_sandal" id="tas_sandal" value="1" <?php
                                                                                                                if ($rows->tas_sandal == 1) {
                                                                                                                  echo 'checked="checked"';
                                                                                                                } ?>>
                    <label class="form-check-label" for="tas_sandal">
                      Tas Sandal
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="sabuk" id="sabuk" value="1" <?php
                                                                                                      if ($rows->sabuk == 1) {
                                                                                                        echo 'checked="checked"';
                                                                                                      } ?>>
                    <label class="form-check-label" for="sabuk">
                      Sabuk
                    </label>
                  </div>
                </div>
                <div class="col-lg-3">
                  <?php if ($rows->jenis_kelamin != "Laki-Laki") { ?>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" name="kerudung" id="kerudung" value="1" <?php
                                                                                                              if ($rows->kerudung == 1) {
                                                                                                                echo 'checked="checked"';
                                                                                                              } ?>>
                      <label class="form-check-label" for="kerudung">
                        Kerudung
                      </label>
                    </div>
                  <?php } else { ?>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" name="baju_koko" id="baju_koko" value="1" <?php
                                                                                                                if ($rows->baju_koko == 1) {
                                                                                                                  echo 'checked="checked"';
                                                                                                                } ?>>
                      <label class="form-check-label" for="baju_koko">
                        Baju Koko
                      </label>
                    </div>
                  <?php } ?>
                </div>
                <div class="col-lg-12 mt-3">
                  <h5>Petugas Pengirim : <?= $rows->petugas_pengirim ?></h5>
                </div>

                <!-- <div class="col-lg-6 mt-3">
                                    </div>
                                    <div class="col-lg-6 mt-3 text-end">
                                      <button type="button" class="btn btn-info waves-effect waves-light"><a href="<?= base_url() ?>Validasi/updateKelengkapanAction/<?= $rows->id_kelengkapan ?>" class="text-white">Update Kelengkapan</button>
                                      <button type="button" class="btn btn-danger waves-effect waves-light"><a href="<?= base_url() ?>Validasi/Pembayaran" class="text-white">Belum Diterima</a></button>
                                    </div> -->

              </div>
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

    var base_url = "<?php echo base_url(); ?>"; // You can use full url here but I prefer like this
    $('#user-table').DataTable({
      "pageLength": 10,
      "serverSide": true,
      "order": [
        [0, "asc"]
      ],
      "ajax": {
        url: base_url + 'Validasi/getAllValidasiPembayaran',
        type: 'POST'
      },
    }); // End of DataTable


  }); // End Document Ready Function




  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;
    document.body.innerHTML = printContents;
    $("table.bordered tr td").css({
      'padding': '3',
      'border': '1px solid #000'
    });
    $("table.bordered tr th").css({
      'padding': '3',
      'border': '1px solid #000'
    });
    $("p").css('margin', '0');
    window.print();

    document.body.innerHTML = originalContents;
  }
</script>