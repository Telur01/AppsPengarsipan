
    function validateImage() {
        var fileInput = document.getElementById('input_image');

        // memeriksa apakah ada file yang di pilih
        if (fileInput.files.length === 0) {
            return;
        }

        // mendapatkan file yang di pilih
        var selectedFile = fileInput.files[0];

        // Memeriksa jenis file
        if (!selectedFile.type.startsWith('image/')) {
            fileInput.value = ''; // Reset input file
            Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'File harus berjenis Image',
            });
        }

        // Memerika ukuran file 
        if (selectedFile.size > 2 * 1024 * 1024) { // 2MB in bytes
            fileInput.value = ''; // Reset input file
            Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'Ukuran file gambar tidak boleh lebih dari 2MB.',
            });
        }
    }

    function validateDocument(fileType) {
        var fileInput = document.getElementById('input_document_' + fileType);

        // memeriksa apakah ada file yang di pilih
        if (fileInput.files.length === 0) {
            return;
        }

        // mendapatkan file
        var selectedFile = fileInput.files[0];

        // memeriksa jenis file
        if (!selectedFile.type.startsWith('application/pdf')) {
            fileInput.value = ''; // Reset input file
            Swal.fire({
                icon: 'info',
                text: 'File harus berformat PDF.',
            });
        }

        // memeriksa ukuran file
        if (selectedFile.size > 2 * 1024 * 1024) { // 2MB in bytes
            fileInput.value = ''; // Reset input file
            Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'Ukuran file PDF tidak boleh lebih dari 2MB.',
            });
        }
    }
