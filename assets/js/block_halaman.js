
function showAccessDeniedAlert(e) {
    // Tampilkan Sweet Alert
    Swal.fire({
        title: 'Akses Diblokir',
        text: 'Bagian Ini Di Kerjakan Oleh Kelompok Lain !',
        icon: 'error',
        showConfirmButton: false,
        timer: 20000 //20detik
    });
    // Mencegah navigasi ke halaman tujuan
    e.preventDefault();
}
