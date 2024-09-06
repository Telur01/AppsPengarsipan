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
    <h2>Rekap Data Arsip Boss</h2>
    <?php if (!empty($tanggal_awal) && !empty($tanggal_akhir)) : ?>
        <p>Periode Tanggal: <?= date('d F Y', strtotime($tanggal_awal)) ?> s/d <?= date('d F Y', strtotime($tanggal_akhir)) ?></p>
    <?php elseif (!empty($bulan) && !empty($tahun)) : ?>
        <p> Periode <br>Bulan : <?= date('F', strtotime("2000-$bulan-01")) ?> <br>Tahun : <?= $tahun ?></p>
    <?php elseif (!empty($tahun)) : ?>
        <p> Periode Tahun : <?= $tahun ?></p>
    <?php endif; ?>

    <table style="width:100%">
        <tr>
            <th rowspan="2">No.</th>
            <th rowspan="2">No. Pendaftaran</th>
            <th rowspan="2">No. SK</th>
            <th rowspan="2">No. SK Lengkap</th>
            <th rowspan="2">Jenis Izin</th>
            <th rowspan="2">Jenis Layanan</th>
            <th rowspan="2">Nama Pemohon</th>
            <th rowspan="2">Nama Perusahaan</th>
            <th rowspan="2">Alamat Perusahaan</th>
            <th rowspan="2">Alamat Persil</th>
            <th rowspan="2">Keluruhan</th>
            <th rowspan="2">Kecamatan</th>
            <th rowspan="2">Wilayah</th>
            <th rowspan="2">Peruntukan</th>
            <th rowspan="2">Tanggal Tth</th>
            <th colspan="5" class="text-center">Tempat Penyimpanan</th>
            <th rowspan="2">Date Created</th>
        </tr>
        <tr>
            <th>Ruang</th>
            <th>Rak</th>
            <th>Box</th>
            <th>Bulan</th>
            <th>Tahun</th>
        </tr>

        <?php
        $no = 1;
        foreach ($data_arsip_boss as $arbos) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $arbos['no_pendaftaran'] ?></td>
                <td><?php echo $arbos['no_sk'] ?></td>
                <td><?php echo $arbos['no_sk_lengkap'] ?></td>
                <td><?php echo $arbos['jenis_izin'] ?></td>
                <td><?php echo $arbos['jenis_layanan'] ?></td>
                <td><?php echo $arbos['nama_pemohon'] ?></td>
                <td><?php echo $arbos['nama_perusahaan'] ?></td>
                <td><?php echo $arbos['alamat_perusahaan'] ?></td>
                <td><?php echo $arbos['alamat_persil'] ?></td>
                <td><?php echo $arbos['kelurahan'] ?></td>
                <td><?php echo $arbos['kecamatan'] ?></td>
                <td><?php echo $arbos['wilayah'] ?></td>
                <td><?php echo $arbos['peruntukan'] ?></td>
                <td><?php echo $arbos['tanggal_ttd'] ?></td>
                <td><?php echo $arbos['ruang'] ?></td>
                <td><?php echo $arbos['rak'] ?></td>
                <td><?php echo $arbos['box'] ?></td>
                <td><?php echo $arbos['bulan'] ?></td>
                <td><?php echo $arbos['tahun'] ?></td>
                <td><?php echo $arbos['date_created'] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
</body>

</html>