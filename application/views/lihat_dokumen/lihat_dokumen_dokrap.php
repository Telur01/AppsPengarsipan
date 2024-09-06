<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col" style="font-size: 14px">
            <!-- Tampilkan detail dokumen di sini -->
            <?php if ($document) : ?>
                <p class="h5 mb-4 text-gray-800"> Detail Dokumentasi Rapat</p>
                <hr class="sidebar-divider">
                <div class="row">
                    <div class="col-sm-2">
                        <p>Waktu Kegiatan</p>
                    </div>
                    <div class="col">
                        :
                        <?php echo $document['waktu']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <p>Nama Kegiatan</p>
                    </div>
                    <div class="col">
                        :
                        <?php echo $document['nama']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <p>Tempat Kegiatan</p>
                    </div>
                    <div class="col">
                        :
                        <?php echo $document['tempat']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <p>Peserta Kegiatan</p>
                    </div>
                    <div class="col">
                        :
                        <?php echo $document['peserta']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <p>keterangan</p>
                    </div>
                    <div class="col">
                        :
                        <?php echo $document['keterangan']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col bg-primary text-light text-lg-center mb-5 pt-2">
                        <p>Dokument/files</p>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-content-center mb-4" >
                    <!-- card Foto Kegiatan -->
                    <?php if ($document['foto_kegiatan']) : ?>
                        <div class="col-md-2">
                            <div class="card text-center" style="height: 16rem" style="height: 16rem">
                                <div class="card-body">
                                    <i class="far fa-image fa-lg mb-4"></i>
                                    <br>
                                    <?= $document['foto_kegiatan'] ?>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalFotoKegiatan">
                                        <i class="far fa-eye mr-2"></i> Lihat
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Card Daftar Hadir -->
                    <?php if ($document['daftar_hadir']) : ?>
                        <div class="col-md-2">
                            <div class="card text-center" style="height: 16rem" style="height: 16rem">
                                <div class="card-body">
                                    <i class="far fa-file-pdf fa-lg mb-4"></i>
                                    <br>
                                    <?= $document['daftar_hadir'] ?>
                                </div>
                                <div class="card-footer">

                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalDaftarHadir">
                                        <i class="far fa-eye mr-2"></i> Lihat
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Card Notulen -->
                    <?php if ($document['notulen']) : ?>
                        <div class="col-md-2">
                            <div class="card text-center" style="height: 16rem">
                                <div class="card-body">
                                    <i class="far fa-file-pdf fa-lg mb-4"></i>
                                    <br>
                                    <?= $document['notulen'] ?>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalNotulen">
                                        <i class="far fa-eye mr-2"></i> Lihat
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Card Berita Acara -->
                    <?php if ($document['berita_acara']) : ?>
                        <div class="col-md-2">
                            <div class="card text-center" style="height: 16rem">

                                <div class="card-body">
                                    <i class="far fa-file-pdf fa-lg mb-4"></i>
                                    <br>
                                    <?= $document['berita_acara'] ?>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalBeritaAcara">
                                        <i class="far fa-eye mr-2"></i> Lihat
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Card Surat Undangan -->
                    <?php if ($document['surat_undangan']) : ?>
                        <div class="col-md-2">
                            <div class="card text-center" style="height: 16rem">

                                <div class="card-body">
                                    <i class="far fa-file-pdf fa-lg mb-4"></i>
                                    <br>
                                    <?= $document['surat_undangan'] ?>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalSuratUndangan">
                                        <i class="far fa-eye mr-2"></i> Lihat
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

<!-- Modal Foto Kegiatan -->
<div class="modal fade" id="modalFotoKegiatan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center align-content-center ">
                <?php if ($document['foto_kegiatan']) : ?>
                    <img src="<?php echo base_url('assets/document/data_dokumentasi/' . $document['foto_kegiatan']); ?>" alt="Foto Kegiatan" class="img-fluid">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal Daftar Hadir-->
<div class="modal fade" id="modalDaftarHadir" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($document['daftar_hadir']) : ?>
                    <embed src="<?php echo base_url('assets/document/data_dokumentasi/' . $document['daftar_hadir']); ?>" type="application/pdf" width="100%" height="600px">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Notulen-->
<div class="modal fade" id="modalNotulen" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($document['notulen']) : ?>
                    <embed src="<?php echo base_url('assets/document/data_dokumentasi/' . $document['notulen']); ?>" type="application/pdf" width="100%" height="600px">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Berita Acara-->
<div class="modal fade" id="modalBeritaAcara" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($document['berita_acara']) : ?>
                    <embed src="<?php echo base_url('assets/document/data_dokumentasi/' . $document['berita_acara']); ?>" type="application/pdf" width="100%" height="600px">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal Surat Undangan-->
<div class="modal fade" id="modalSuratUndangan" tabindex="-1" role="dialog" aria-labelledby="modalFotoKegiatanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($document['surat_undangan']) : ?>
                    <embed src="<?php echo base_url('assets/document/data_dokumentasi/' . $document['surat_undangan']); ?>" type="application/pdf" width="100%" height="600px">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
                