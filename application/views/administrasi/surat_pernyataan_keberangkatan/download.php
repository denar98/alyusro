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
      <u>Surat Pernyataan Keberangkatan Umrah</u>
    </h3>
    <br />
    <p>
      Saya yang bertanda tangan dibawah ini:
    </p>
    <table>
      <tr>
        <td class="text-nowrap">Nama Lengkap</td>
        <td class="px-3">:</td>
        <td><?= $row->nama ?></td>
      </tr>
      <tr>
        <td class="text-nowrap">NIK</td>
        <td class="px-3">:</td>
        <td><?= $row->nik ?></td>
      </tr>
      <tr>
        <td class="text-nowrap">ID Jamaah</td>
        <td class="px-3">:</td>
        <td><?= $row->user_id_jemaah ?></td>
      </tr>
      <tr>
        <td class="text-nowrap">Tempat, Tanggal Lahir</td>
        <td class="px-3">:</td>
        <td><?= $row->tempat_lahir ?>, <?= tgl_indo($row->tanggal_lahir) ?></td>
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
    <p>Melalui surat ini, saya menyatakan untuk:</p>
    <ol>
      <li>Memilih jadwal keberangkatan umrah pada tanggal 21 Februari 2024</li>
      <li>Melakukan pelunasan paling lambat H-45 sebelum tanggal keberangkatan</li>
      <li>Jika saya membatalkan sebelum H-45 akan dikenakan biaya 10% dari harga umrah</li>
      <li>Jika saya membatalkan 2 minggu sebelum keberangkatan akan dikenakan biaya 50% dari harga umrah</li>
      <li>Jika saya membatalkan 1 minggu sebelum keberangkatan maka pembayaran tidak dapat dikembalikan</li>
      <li>Untuk poin 3 dan 4 akan diproses 1 minggu dari tanggal pengajuan</li>
    </ol>
    <p>Demikian pernyataan ini saya buat dengan sebenar benarnya tanpa paksaan ataupun tekanan dari pihak manapun.</p>
    <div class="text-end">
      <u><?= $row->kota ?>, <?= tgl_indo(date('Y-m-d')) ?></u>
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