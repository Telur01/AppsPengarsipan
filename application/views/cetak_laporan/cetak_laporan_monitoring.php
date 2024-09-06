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
    <h2>Rekap Data Monitoring Izin Terbit</h2>
    <?php if (!empty($tanggal_awal) && !empty($tanggal_akhir)) : ?>
        <p>Periode Tanggal: <?= date('d F Y', strtotime($tanggal_awal)) ?> s/d <?= date('d F Y', strtotime($tanggal_akhir)) ?></p>
    <?php elseif (!empty($bulan) && !empty($tahun)) : ?>
        <p> Periode <br>Bulan : <?= date('F', strtotime("2000-$bulan-01")) ?> <br>Tahun : <?= $tahun ?></p>
    <?php elseif (!empty($tahun)) : ?>
        <p> Periode Tahun : <?= $tahun ?></p>
    <?php endif; ?>

    <table style="width:100%">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>No. Izin</th>
            <th>Jenis izin</th>
            <th>Jenis Layanan</th>
            <th>Nama Pemohon</th>
            <th>Nama Perusahaan</th>
            <th>Alamat Perusahaan</th>
            <th>Alamat Persil</th>
            <th>Peruntukan</th>
        </tr>

        <?php
        $no = 1;
        foreach ($data_monitoring as $monitoring) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $monitoring['tanggal'] ?></td>
                <td><?php echo $monitoring['no_izin'] ?></td>
                <td><?php echo $monitoring['jenis_izin'] ?></td>
                <td><?php echo $monitoring['jenis_layanan'] ?></td>
                <td><?php echo $monitoring['nama_pemohon'] ?></td>
                <td><?php echo $monitoring['nama_perusahaan'] ?></td>
                <td><?php echo $monitoring['alamat_perusahaan'] ?></td>
                <td><?php echo $monitoring['alamat_persil'] ?></td>
                <td><?php echo $monitoring['peruntukan'] ?></td>
            </tr>
        <?php endforeach; ?>

    </table>
</body>

</html>