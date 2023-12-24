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
            <h4 class="mb-sm-0">Validasi Manifestasi Umrah</h4>

            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Validasi</a></li>
                <li class="breadcrumb-item active">Detail Manifestasi Umrah</li>
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
              <h5 class="card-title mb-0" style="float:left">Detail Data Manifestasi Umrah</h5>
              <button type="button" class="btn btn-info" style="float:right" name="button" onclick="printDiv('printDiv')" id="printManifestasi">Print Manifestasi</button>
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

            if ($rows->status_manifestasi == 0) {
              $status = "Belum Lengkap";
              $status_warna = "danger";
            } else if ($rows->status_manifestasi == 1) {
              $status = "Sudah Lengkap";
              $status_warna = "warning";
            } else if ($rows->status_manifestasi == 2) {
              $status = "Siap Berangkat";
              $status_warna = "success";
            }
            ?>
            <div class="card-body container pt-5">
              <form action="<?= base_url() ?>/Validasi/updateManifestasiAction" method="post">
                <div class="row">
                  <div class="col-lg-6">
                    <h2>
                      <?= $nomor_id ?>
                    </h2>
                  </div>
                  <div class="col-lg-6">
                    <h2 class="text-<?= $status_warna ?>">
                      <?= $status ?>
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
                  <div class="col-lg-6">
                    <div class="form-floating mt-2">
                      <select class="form-control js-example-basic-single" name="id_paket_keberangkatan" id="paket_keberangkatan" style="height:57px;" <?php if ($rows->total_saldo_jemaah < 10200000) {
                                                                                                                                                          echo "disabled";
                                                                                                                                                        }
                                                                                                                                                        if ($rows->status_booking == "Booking") {
                                                                                                                                                          echo "disabled";
                                                                                                                                                        } ?>>
                        <option value="null">Pilih Paket Keberangkatan</option>
                        <?php
                        foreach ($paket_keberangkatan as $row_paket_keberangkatan) {
                        ?>
                          <option value="<?= $row_paket_keberangkatan->id_paket_keberangkatan ?>" data-tanggal="<?= $row_paket_keberangkatan->tanggal_keberangkatan ?>" <?php if ($row_paket_keberangkatan->id_paket_keberangkatan == $rows->id_paket_keberangkatan) {
                                                                                                                                                                          echo "selected";
                                                                                                                                                                        } ?>><?= $row_paket_keberangkatan->nama_paket ?> |
                            <?= $row_paket_keberangkatan->tanggal_keberangkatan ?> | RP.
                            <?= number_format($row_paket_keberangkatan->harga_paket) ?></option>

                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-floating">
                      <input type="hidden" class="form-control mt-2" name="total_saldo_jemaah" placeholder="Tanggal Keberangkatan" value="<?= $rows->total_saldo_jemaah ?>">
                      <input type="text" class="form-control mt-2" name="tanggal_keberangkatan" id="tanggal_keberangkatan" placeholder="Tanggal Keberangkatan" <?php
                                                                                                                                                                if ($rows->total_saldo_jemaah < 10200000) {
                                                                                                                                                                  echo '';
                                                                                                                                                                } ?> readonly>
                      <label>Tanggal Keberangkatan</label>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <h3 class="mt-4 mb-4">Validasi Manifestasi Umrah</h3>
                  </div>
                  <div class="col-lg-3">
                    <!-- Base Example -->

                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" name="paspor" id="paspor" value="1" <?php
                                                                                                          if ($rows->paspor == 1) {
                                                                                                            echo 'checked="checked"';
                                                                                                          } ?> <?php if ($rows->status_booking == "Booking") {
                                                                                                                  echo "disabled";
                                                                                                                } ?> <?php if ($this->session->userdata('role') != 'Admin') {
                                                                                                                        echo "disabled";
                                                                                                                      } ?>>
                      <label class="form-check-label" for="paspor">
                        Paspor (nama 2/3 suku kata)
                      </label>
                    </div>

                  </div>
                  <div class="col-lg-3">
                    <!-- Base Example -->
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" name="vaksin_meningitis" id="vaksin_meningitis" value="1" <?php if ($rows->vaksin_meningitis == 1) {
                                                                                                                                  echo 'checked="checked"';
                                                                                                                                } ?> <?php if ($rows->status_booking == "Booking") {
                                                                                                                                        echo "disabled";
                                                                                                                                      } ?> <?php if ($this->session->userdata('role') != 'Admin') {
                                                                                                                                              echo "disabled";
                                                                                                                                            } ?>>
                      <label class="form-check-label" for="vaksin_meningitis">
                        Vaksin Meningitis
                      </label>
                    </div>

                  </div>
                  <div class="col-lg-3">

                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" name="vaksin_covid" id="vaksin_covid" value="1" <?php if ($rows->vaksin_covid == 1) {
                                                                                                                        echo 'checked="checked"';
                                                                                                                      } ?> <?php if ($rows->status_booking == "Booking") {
                                                                                                                              echo "disabled";
                                                                                                                            } ?> <?php if ($this->session->userdata('role') != 'Admin') {
                                                                                                                                    echo "disabled";
                                                                                                                                  } ?>>
                      <label class="form-check-label" for="vaksin_covid">
                        Vaksin Covid-19
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-3">
                    <?php if ($rows->status_pernikahan == "Menikah") { ?>
                      <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" name="surat_nikah" id="surat_nikah" value="1" <?php if ($rows->surat_nikah == 1) {
                                                                                                                        echo 'checked="checked"';
                                                                                                                      } ?> <?php if ($rows->status_booking == "Booking") {
                                                                                                                              echo "disabled";
                                                                                                                            } ?> <?php if ($this->session->userdata('role') != 'Admin') {
                                                                                                                                    echo "disabled";
                                                                                                                                  } ?>>
                        <label class="form-check-label" for="surat_nikah">
                          Surat Nikah
                        </label>
                      </div>
                    <?php } ?>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" name="fotocopy_ktp" id="fotocopy_ktp" value="1" <?php if ($rows->fotocopy_ktp == 1) {
                                                                                                                        echo 'checked="checked"';
                                                                                                                      } ?> <?php if ($rows->status_booking == "Booking") {
                                                                                                                              echo "disabled";
                                                                                                                            } ?> <?php if ($this->session->userdata('role') != 'Admin') {
                                                                                                                                    echo "disabled";
                                                                                                                                  } ?>>
                      <label class="form-check-label" for="fotocopy_ktp">
                        Fotokopi KTP & KK
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-12 text-end mt-3">
                    <hr>
                    <input type="hidden" class="form-control" name="id_manifestasi_umrah" value="<?= $rows->id_manifestasi_umrah ?>">
                    <input type="hidden" class="form-control" name="no_reg_umrah_jemaah" value="<?= $rows->no_reg_umrah_jemaah ?>">
                    <?php
                    if ($this->session->userdata('role') == 'Admin') {
                    ?>

                      <?php if ($rows->status_booking != "Booking") { ?>
                        <button type="submit" class="btn btn-info waves-effect waves-light">Update Manifestasi</button>
                        <button type="button" class="btn btn-success waves-effect waves-light"><a href="<?= base_url() ?>Validasi/submitManifestasiAction/<?= $rows->id_manifestasi_umrah ?>" class="text-white">Submit Manifestasi</a></button>
                      <?php } ?>
                    <?php } ?>
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
                <div class="col-lg-6">
                  <h2>
                    <?= $nomor_id ?>
                  </h2>
                </div>
                <div class="col-lg-6">
                  <h2 class="text-<?= $status_warna ?>">
                    <?= $status ?>
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
                  <h3 class="mt-4 mb-4">Validasi Manifestasi Umrah</h3>
                </div>
                <div class="col-lg-3">
                  <!-- Base Example -->

                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="paspor" id="paspor" value="1" <?php
                                                                                                        if ($rows->paspor == 1) {
                                                                                                          echo 'checked="checked"';
                                                                                                        } ?>>
                    <label class="form-check-label" for="paspor">
                      Paspor (nama 2/3 suku kata)
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="vaksin_covid" id="vaksin_covid" value="1" <?php if ($rows->vaksin_covid == 1) {
                                                                                                                      echo 'checked="checked"';
                                                                                                                    } ?>>
                    <label class="form-check-label" for="vaksin_covid">
                      Vaksin Covid-19
                    </label>
                  </div>
                </div>
                <div class="col-lg-3">
                  <!-- Base Example -->
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="vaksin_meningitis" id="vaksin_meningitis" value="1" <?php if ($rows->vaksin_meningitis == 1) {
                                                                                                                                echo 'checked="checked"';
                                                                                                                              } ?>>
                    <label class="form-check-label" for="vaksin_meningitis">
                      Vaksin Meningitis
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="pas_foto_4_6" id="pas_foto_4_6" value="1" <?php if ($rows->pas_foto_4_6 == 1) {
                                                                                                                      echo 'checked="checked"';
                                                                                                                    } ?>>
                    <label class="form-check-label" for="pas_foto_4_6">
                      Pas Foto 4x6 = 5 pcs
                    </label>
                  </div>
                </div>
                <div class="col-lg-3">
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="pas_foto_3_4" id="pas_foto_3_4" value="1" <?php if ($rows->pas_foto_3_4 == 1) {
                                                                                                                      echo 'checked="checked"';
                                                                                                                    } ?>>
                    <label class="form-check-label" for="pas_foto_3_4">
                      Pas Foto 3x4 = 5 pcs
                    </label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="tiket_pesawat" id="tiket_pesawat" value="1" <?php if ($rows->tiket_pesawat == 1) {
                                                                                                                        echo 'checked="checked"';
                                                                                                                      } ?>>
                    <label class="form-check-label" for="tiket_pesawat">
                      Tiket Pesawat
                    </label>
                  </div>
                </div>
                <div class="col-lg-3">
                  <?php if ($rows->status_pernikahan == "Menikah") { ?>
                    <div class="form-check mb-2">
                      <input class="form-check-input" type="checkbox" name="surat_nikah" id="surat_nikah" value="1" <?php
                                                                                                                    if ($rows->surat_nikah == 1) {
                                                                                                                      echo 'checked="checked"';
                                                                                                                    } ?>>
                      <label class="form-check-label" for="surat_nikah">
                        Surat Nikah
                      </label>
                    </div>
                  <?php } ?>
                  <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="fotocopy_ktp" id="fotocopy_ktp" value="1" <?php if ($rows->fotocopy_ktp == 1) {
                                                                                                                      echo 'checked="checked"';
                                                                                                                    } ?>>
                    <label class="form-check-label" for="fotocopy_ktp">
                      Fotokopi KTP & KK
                    </label>
                  </div>
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

  $(document).ready(function(e) {
    $(".flatpickr_form").flatpickr();

    var tanggal_keberangkatan = $('#paket_keberangkatan').find(':selected').attr('data-tanggal');
    $('#tanggal_keberangkatan').val(tanggal_keberangkatan);

  });

  $('#paket_keberangkatan').on('change', function() {
    var tanggal_keberangkatan = $(this).find(':selected').attr('data-tanggal');
    $('#tanggal_keberangkatan').val(tanggal_keberangkatan);
  });
</script>