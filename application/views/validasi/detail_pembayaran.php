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
            </div>
            <?php
            $nomor_id = $rows->user_id_jemaah;
            if ($rows->jenis_tagihan == 1) {
              $jenis_tagihan = "Umrah Terjadwal";
            } else if ($rows->jenis_tagihan == 2) {
              $jenis_tagihan = "Tabungan";
            } else if ($rows->jenis_tagihan == 3) {
              $jenis_tagihan = "Daftar Agen";
              $nomor_id = $rows->user_id_agen;
              $paket = $rows->paket_agen;
              $harga_paket = number_format($rows->harga_paket_agen);
            } else if ($rows->jenis_tagihan == 4) {
              $jenis_tagihan = "Donasi	";
            }

            ?>
            <div class="card-body container pt-5">
              <div class="row">
                <div class="col-lg-6">
                  <h2>
                    <?= $rows->no_registrasi ?>
                  </h2>
                </div>
                <div class="col-lg-6">
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
                        <?= $rows->user_id_agen_referal ?>
                      </td>
                    </tr>
                    <tr>
                      <td><b>ID Agen</b></td>
                      <td>:</td>
                      <td>
                        <?= $rows->user_id_referall ?>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Program</b></td>
                      <td>:</td>
                      <td>
                        <?= $jenis_tagihan ?>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="col-lg-6">
                  <table class="table table-nowrap">
                    <tr>
                      <td style="width:30%"><b>Nominal</b></td>
                      <td>:</td>
                      <td>
                        <?= number_format($rows->nominal_tagihan) ?>
                      </td>
                    </tr>
                    <tr>
                      <td><b>No Rekening</b></td>
                      <td>:</td>
                      <td>
                        <?= $rows->no_rekening ?>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Bank</b></td>
                      <td>:</td>
                      <td>
                        <?= $rows->nama_bank ?>
                      </td>
                    </tr>
                    <tr>
                      <td><b>Atas Nama</b></td>
                      <td>:</td>
                      <td>
                        <?= $rows->atas_nama ?>
                      </td>
                    </tr>
                  </table>
                </div>

                <div class="col-lg-12 mt-3 text-end">
                  <!-- <button type="button" class="btn btn-success waves-effect waves-light"><a
                      class="text-white" onclick="printDiv('printDiv')" id="printInvoice">Print Bukti Pembayaran</button> -->
                  <button type="button" class="btn btn-info waves-effect waves-light"><a href="<?= base_url() ?>Validasi/terimaPembayaranAction/<?= $rows->id_tagihan_pembayaran ?>" class="text-white">Sudah Diterima</button>
                  <button type="button" class="btn btn-danger waves-effect waves-light"><a href="<?= base_url() ?>Validasi/Pembayaran" class="text-white">Belum Diterima</a></button>
                  <?php if ($rows->jenis_tagihan == 1) { ?>
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#gantiTabunganModal">Ganti Ketabungan</button>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div><!--end col-->
      </div><!--end row-->


    </div>
    <!-- container-fluid -->
  </div>
  <!-- End Page-content -->

  <!-- Grids in modals -->
  <div class="modal fade" id="gantiTabunganModal" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalgridLabel">Ganti Ketabungan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="post" action="<?= base_url() ?>Validasi/gantiTabunganAction">
            <div class="row g-3">
              <div class="col-xxl-12">
                <div>
                  <label for="firstName" class="form-label">Jumlah Yang Diterima</label>
                  <input type="hidden" class="form-control" name="id_tagihan_pembayaran" value="<?= $rows->id_tagihan_pembayaran ?>" placeholder="Masukan Jumlah Yang Diterima" required>
                  <input type="text" class="form-control" name="nominal_pembayaran" id="cleave-numeral" placeholder="Masukan Jumlah Yang Diterima" required>
                </div>
              </div><!--end col-->
              <div class="col-xxl-12">
                <div>
                  <select class="form-control js-example-basic-single" name="id_paket_keberangkatan" id="id_paket_keberangkatan" style="height:57px;">
                    <option value="">Target Paket</option>
                    <?php
                    foreach ($paket_keberangkatan as $row_paket_keberangkatan) {
                    ?>
                      <option value="<?= $row_paket_keberangkatan->id_paket_keberangkatan ?>" data-harga="<?= $row_paket_keberangkatan->harga_paket ?>"><?= $row_paket_keberangkatan->nama_paket ?>
                        | <?= $row_paket_keberangkatan->tanggal_keberangkatan ?> | RP.
                        <?= number_format($row_paket_keberangkatan->harga_paket) ?></option>

                    <?php } ?>
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

  <div class="card-body" id="printDiv" style="display: none;">
    <div class="container">
      <?php
      $paket = "-";
      $harga_paket = "-";
      $total_tagihan = "0";
      $sisa_pembayaran = "0";
      if ($rows->id_paket_keberangkatan != 0) {

        $paket_rows = $this->db->select('paket_keberangkatan.*')
          ->from('paket_keberangkatan')
          ->where("id_paket_keberangkatan", $rows->id_paket_keberangkatan)
          ->get()->row();

        $paket = $paket_rows->nama_paket;
        $harga_paket = number_format($paket_rows->harga_paket);
        $sisa_pembayaran = $paket_rows->harga_paket - ($rows->nominal_tagihan + $rows->total_saldo_jemaah);
        $total_tagihan =  $paket_rows->harga_paket - $rows->total_saldo_jemaah;
      }

      $nomor_id = $rows->user_id_jemaah;
      $periode = "Non Booking";

      if ($rows->jenis_tagihan == 1) {
        $jenis_tagihan = "Umrah Terjadwal";
      } else if ($rows->jenis_tagihan == 2) {
        $jenis_tagihan = "Tabungan";
      } else if ($rows->jenis_tagihan == 3) {
        $jenis_tagihan = "Daftar Agen";
        $nomor_id = $rows->user_id_agen;
        $paket = $rows->paket_agen;
        $harga_paket = number_format($rows->harga_paket_agen);
        $sisa_pembayaran = $rows->harga_paket_agen - ($rows->nominal_tagihan + $rows->total_saldo_jemaah);
        $total_tagihan =  $rows->harga_paket_agen;
      } else if ($rows->jenis_tagihan == 4) {
        $jenis_tagihan = "Donasi	";
      }


      ?>
      <div class="row">
        <div class="col-lg-4 col-xs-4 col-md-4 text-left">
          <img src="<?= base_url() ?>assets/images/logo-alyusro.png" style="width:65%; margin-right:25px;">
        </div>
        <div class="col-lg-4 col-xs-4 col-md-4 pt-4 text-center">
          <h1 class="mt-3">BUKTI PEMBAYARAN</h1>
        </div>
        <div class="col-lg-4 col-xs-4 col-md-4 text-end">
          <h3 style=" margin-top:30px; ">
            <?= $rows->no_registrasi ?>
          </h3>
          <h3>
            <?= $nomor_id ?>
          </h3>
          <!-- <h3 class="mt-3" style="margin-bottom:3px;">ALYUSRO KHOIR MUBAROK</h3>
                              <h5 class="mb-1">Kerjasama dengan Travel Berizin</h5>
                              <h5>Resmi Kemenag No. U.135/2021</h5> -->
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-lg-6 col-xl-6 col-xs-6 col-md-6 pt-2" style="border:1px solid #000;">
          <table class="table">
            <tr>
              <td>
                <h5>Nama</h5>
              </td>
              <td>
                <h5>:</h5>
              </td>
              <td>
                <h5><?= $rows->nama ?></h5>
              </td>
            </tr>
            <tr>
              <td>
                <h5>No Handphone</h5>
              </td>
              <td>
                <h5>:</h5>
              </td>
              <td>
                <h5><?= $rows->no_telp ?></h5>
              </td>
            </tr>
            <tr>
              <td>
                <h5>Alamat</h5>
              </td>
              <td>
                <h5>:</h5>
              </td>
              <td>
                <h5><?= $rows->alamat ?></h5>
              </td>
            </tr>
            <tr>
              <td>
                <h5>ID Agen</h5>
              </td>
              <td>
                <h5>:</h5>
              </td>
              <td>
                <h5><?= $rows->user_id_agen_referal ?></h5>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-lg-6 col-xl-6 col-xs-6 col-md-6 pt-2" style="border:1px solid #000;">
          <table class="table">
            <tr>
              <td>
                <h5>Paket</h5>
              </td>
              <td>
                <h5>:</h5>
              </td>
              <td>
                <h5><?= $paket ?></h5>
              </td>
            </tr>
            <tr>
              <td>
                <h5>Harga Paket</h5>
              </td>
              <td>
                <h5>:</h5>
              </td>
              <td>
                <h5><?= $harga_paket ?></h5>
              </td>
            </tr>
            <tr>
              <td>
                <h5>Periode</h5>
              </td>
              <td>
                <h5>:</h5>
              </td>
              <td>
                <h5><?= $periode ?></h5>
              </td>
            </tr>
            <tr>
              <td>
                <h5>ID Referal</h5>
              </td>
              <td>
                <h5>:</h5>
              </td>
              <td>
                <h5><?= $rows->user_id_referall ?></h5>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-lg-12 mt-3 mb-2">
          <h5>Telah diterima pembayaran dengan rincian sebagi berikut:</h5>
        </div>
        <div class="col-lg-12 pt-2" style="border:1px solid #000;">

          <table class="table">
            <tbody>
              <tr>
                <th>
                  <h5><b>ID</b></h5>
                </th>
                <th>
                  <h5><b>Tanggal</b></h5>
                </th>
                <th>
                  <h5><b>Untuk Pembayaran</b></h5>
                </th>
                <th>
                  <h5><b>Jumlah</b></h5>
                </th>
                <th>
                  <h5><b>Bayar Dengan</b></h5>
                </th>
                <th>
                  <h5><b>Atas Nama</b></h5>
                </th>
                <th>
                  <h5><b>User</b></h5>
                </th>
                <th>
                  <h5><b>Status</b></h5>
                </th>
              </tr>
              <?php
              $history_rows = $this->db->select('history_pembayaran.*')
                ->from('history_pembayaran')
                ->where("no_reg_umrah_jemaah", $rows->no_registrasi)
                ->get()->result();
              foreach ($history_rows as $history_row) {

                if ($history_row->tujuan_pembayaran == 1) {
                  $tujuan_pembayaran = "Umrah Terjadwal";
                } else if ($history_row->tujuan_pembayaran == 2) {
                  $tujuan_pembayaran = "Tabungan Umrah";
                }
                if ($history_row->tujuan_pembayaran == 3) {
                  $tujuan_pembayaran = "Agen";
                }
                if ($history_row->tujuan_pembayaran == 4) {
                  $tujuan_pembayaran = "Donasi";
                }


              ?>

                <tr>
                  <td>
                    <h5><?= $history_row->id_tagihan_pembayaran ?></h5>
                  </td>
                  <td>
                    <h5>
                      <?= date("d/m/Y", strtotime($history_row->tanggal_pembayaran)) ?>
                    </h5>
                  </td>
                  <td>
                    <h5>
                      <?= $tujuan_pembayaran ?>
                    </h5>
                  </td>
                  <td>
                    <h5>
                      <?= number_format($history_row->jumlah) ?>
                    </h5>
                  </td>
                  <td>
                    <h5>
                      <?= $history_row->nama_bank ?> |
                      <?= $history_row->no_rekening ?>
                    </h5>
                  </td>
                  <td>
                    <h5>
                      <?= $history_row->atas_nama ?>
                    </h5>
                  </td>
                  <td>
                    <h5><?= $history_row->username ?></h5>
                  </td>
                  <td>
                    <h5>Sudah Dibayar</h5>
                  </td>

                </tr>
              <?php } ?>

              <tr>
                <td>
                  <h5><?= $rows->id_tagihan_pembayaran ?></h5>
                </td>
                <td>
                  <h5>
                    <?= date("d/m/Y", strtotime($rows->tanggal)) ?>
                  </h5>
                </td>
                <td>
                  <h5>
                    <?= $jenis_tagihan ?>
                  </h5>
                </td>
                <td>
                  <h5>
                    <?= number_format($rows->nominal_tagihan) ?>
                  </h5>
                </td>
                <td>
                  <h5>
                    <?= $rows->nama_bank ?> |
                    <?= $rows->no_rekening ?>
                  </h5>
                </td>
                <td>
                  <h5>
                    <?= $rows->atas_nama ?>
                  </h5>
                </td>
                <td>
                  <h5><?= $this->session->userdata('nama_user') ?></h5>
                </td>
                <td>
                  <h5>Sudah Dibayar</h5>
                </td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>

            </tbody>
            <tfoot>
              <tr>
                <td colspan="3">
                  <h5><b><i>Subtotal</i></b></h5>
                </td>
                <td>
                  <h5><b><i>
                        <?= number_format($rows->nominal_tagihan) ?>
                      </i></b></h5>
                </td>
                <td colspan="2"></td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="col-lg-12 text-center mt-3">
          <h5 style="float:right">Bandung,
            <?= Date('Y-m-d') ?>
          </h5>
        </div>

        <div class="col-lg-4 col-xs-4 col-md-4 pt-2 mt-1" style="border:1px solid #000;">
          <table class="table">
            <tr>
              <td>
                <h5>Harga Paket</h5>
              </td>
              <td>
                <h5>:</h5>
              </td>
              <td>
                <h5><?= $harga_paket ?></h5>
              </td>
            </tr>
            <tr>
              <td>
                <h5>Sisa Tagihan</h5>
              </td>
              <td>
                <h5>:</h5>
              </td>
              <td>
                <h5><?= number_format($total_tagihan) ?></h5>
              </td>
            </tr>
            <tr>
              <td>
                <h5>Pembayaran</h5>
              </td>
              <td>
                <h5>:</h5>
              </td>
              <td>
                <h5>
                  <?= number_format($rows->nominal_tagihan) ?>
                </h5>
              </td>
            </tr>
            <tr>
              <td>
                <h5>Sisa Pembayaran</h5>
              </td>
              <td>
                <h5>:</h5>
              </td>
              <td>
                <h5><?= number_format($sisa_pembayaran) ?></h5>
              </td>
            </tr>
          </table>
        </div>
        <div class="col-lg-4 col-xs-4 col-md-4 pt-2 mt-1 text-center">
          <h5 class="">Yang Menyetorkan</h5>
          <br><br><br><br><br><br><br><br>
          <h5>(
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            )
          </h5>
        </div>
        <div class="col-lg-4 col-xs-4 col-md-4 pt-2 mt-1 text-center">
          <h5 class="">Yang Menerima</h5>
          <br><br><br><br><br><br><br><br>
          <h5>(
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            )
          </h5>
        </div>
        <div class="col-lg-12 text-center mt-5">
          <h5><i>Note : "Harga dapat berubah sewaktu-waktu tanpa pemberitahuan terlebih dahulu"</i></h5>
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