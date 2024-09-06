
<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h2>Rekap Data Dokumentasi Rapat</h2>
    <?php if (!empty($tanggal_awal) && !empty($tanggal_akhir)) : ?>
        <p>Periode Tanggal: <?= date('d F Y', strtotime($tanggal_awal)) ?> s/d <?= date('d F Y', strtotime($tanggal_akhir)) ?></p>
    <?php elseif (!empty($bulan) && !empty($tahun)) : ?>
        <p> Periode <br>Bulan : <?= date('F', strtotime("2000-$bulan-01")) ?> <br>Tahun : <?= $tahun ?></p>
    <?php elseif (!empty($tahun)) : ?>
        <p> Periode Tahun : <?= $tahun ?></p>
    <?php endif; ?>

    <table style="width:100%">
        <tr>
            <th>No.</th>
            <th>Waktu Kegiatan</th>
            <th>Nama Kegiatan</th>
            <th>Tempat Kegiatan</th>
            <th>Peserta Kegiatan</th>
            <th>Keterangan</th>
        </tr>
        <?php $no = 1; ?>
        <?php foreach ($data_dokumentasi as $dokrap) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $dokrap['waktu'] ?></td>
                <td><?= $dokrap['nama'] ?></td>
                <td><?= $dokrap['tempat'] ?></td>
                <td><?= $dokrap['peserta'] ?></td>
                <td><?= $dokrap['keterangan'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>