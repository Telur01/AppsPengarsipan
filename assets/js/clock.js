function updateClock() {
    const currentTime = new Date();
    const hours = currentTime.getHours();
    const minutes = currentTime.getMinutes();
    const seconds = currentTime.getSeconds();

    const timeString = hours.toString().padStart(2, '0') + ':' +
                      minutes.toString().padStart(2, '0') + ':' +
                      seconds.toString().padStart(2, '0');

    document.getElementById('clock').innerHTML = timeString;
}

// Memanggil fungsi updateClock setiap detik
setInterval(updateClock, 1000);

// Memanggil updateClock agar menampilkan waktu saat halaman dimuat
updateClock();

