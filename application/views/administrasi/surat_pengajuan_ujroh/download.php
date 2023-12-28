<!DOCTYPE html>
<html lang="en" style="margin: 0px;">

<head>
  <title><?= $title; ?>/</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
    footer {
      position: fixed;
      bottom: 10px;
      left: 0px;
      right: 0px;
    }
  </style>
</head>

<body>
  <img src="<?= base_url() ?>assets/images/header-pdf.jpg" class="w-100" alt="">
  <div class="px-5 mt-5">
    <h3 class="text-center text-uppercase">
      <u>Surat Pengajuan Ujroh</u>
    </h3>
    <br />
    <p>
      Saya yang bertanda tangan dibawah ini:
    </p>
    <table>
      <tr>
        <td class="text-nowrap">Nama Lengkap Perwakilan</td>
        <td class="px-3">:</td>
        <td><?= $row->nama_agen ?></td>
      </tr>
      <tr>
        <td class="text-nowrap">NIK</td>
        <td class="px-3">:</td>
        <td><?= $row->nik_agen ?></td>
      </tr>
      <tr>
        <td class="text-nowrap">ID Perwakilan</td>
        <td class="px-3">:</td>
        <td><?= $row->user_id_agen ?></td>
      </tr>
      <tr>
        <td class="text-nowrap">Tempat, Tanggal Lahir</td>
        <td class="px-3">:</td>
        <td><?= $row->tempat_lahir_agen ?>, <?= tgl_indo($row->tanggal_lahir_agen) ?></td>
      </tr>
      <tr>
        <td class="text-nowrap">Alamat</td>
        <td class="px-3">:</td>
        <td><?= $row->alamat_agen ?></td>
      </tr>
      <tr>
        <td class="text-nowrap">Nomor Handphone</td>
        <td class="px-3">:</td>
        <td><?= $row->no_telp_agen ?></td>
      </tr>
    </table>
    <br />
    <p>Melalui surat ini, saya mengajukan ujroh sebesar Rp. <?= number_format($row->price) ?> untuk jamaah dibawah ini:</p>
    <table>
      <tr>
        <td class="text-nowrap">Nama Lengkap Jemaah</td>
        <td class="px-3">:</td>
        <td><?= $row->nama ?></td>
      </tr>
      <tr>
        <td class="text-nowrap">NIK</td>
        <td class="px-3">:</td>
        <td><?= $row->nik ?></td>
      </tr>
      <tr>
        <td class="text-nowrap">ID Perwakilan</td>
        <td class="px-3">:</td>
        <td><?= $row->jemaah_id_jemaah ?></td>
      </tr>
      <tr>
        <td class="text-nowrap">Tempat, Tanggal Lahir</td>
        <td class="px-3">:</td>
        <td><?= $row->tempat_lahir_jemaah ?>, <?= tgl_indo($row->tanggal_lahir_jemaah) ?></td>
      </tr>
      <tr>
        <td class="text-nowrap">Alamat</td>
        <td class="px-3">:</td>
        <td><?= $row->alamat ?></td>
      </tr>
      <tr>
        <td class="text-nowrap">Nomor Handphone</td>
        <td class="px-3">:</td>
        <td><?= $row->no_telp ?></td>
      </tr>
    </table>
    <br />
    <p>Demikian pernyataan ini saya buat dengan sebenar benarnya tanpa paksaan ataupun tekanan dari pihak manapun.</p>
    <div class="text-end">
      <u><?= $row->kota_agen ?>, <?= tgl_indo(date('Y-m-d')) ?></u>
    </div>
    <div class="fst-italic mt-5">
      <small class="fw-bold">
        *Disclaimer: Dokumen ini tidak memerlukan tanda tangan karena dicetak secara elektronik.
      </small>
    </div>
  </div>
  <footer>
    <img src="<?= base_url() ?>assets/images/footer-pdf.jpg" alt="" class="mt-5 w-100">
  </footer>
</body>

</html>