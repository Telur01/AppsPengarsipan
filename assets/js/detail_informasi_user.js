
$(document).ready(function() {
    // Menampilkan hanya 'accountInfo' saat halaman dimuat
    $(".information").hide();
    $("#AccountInfo").show();

    $(".nav-link").click(function() {
        var target = $(this).data("target");
        
        // Menyembunyikan semua elemen 'information' kecuali yang sesuai dengan data-target
        $(".information").hide();
        
        // Menampilkan elemen dengan id yang sesuai dengan data-target
        $("#" + target).show();
    });
});

