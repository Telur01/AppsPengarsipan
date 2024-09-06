document.getElementById('jenis_filter_form').addEventListener('submit', function (e) {
    e.preventDefault();
    var jenisFilter = document.getElementById('jenis_filter').value;

    // Sembunyikan semua form filter
    document.getElementById('filter_tanggal').style.display = 'none';
    document.getElementById('filter_bulan').style.display = 'none';
    document.getElementById('filter_tahun').style.display = 'none';

    // Tampilkan form filter yang sesuai dengan pilihan jenis filter
    if (jenisFilter === 'tanggal') {
        document.getElementById('filter_tanggal').style.display = 'block';
    } else if (jenisFilter === 'bulan') {
        document.getElementById('filter_bulan').style.display = 'block';
    } else if (jenisFilter === 'tahun') {
        document.getElementById('filter_tahun').style.display = 'block';
    }
});
