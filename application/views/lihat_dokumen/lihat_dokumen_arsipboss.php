<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col" style="font-size: 14px">
            <!-- Tampilkan detail dokumen di sini -->
            <?php if ($document) : ?>
                <p class="h5 mb-4 text-gray-800"> Detail Data Arsip Boss</p>
                <hr class="sidebar-divider">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-sm-3">
                                <p>No. Pendaftaran</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['no_pendaftaran']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p>No. SK Lengkap</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['no_sk_lengkap']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Jenis Izin</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['jenis_izin']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Jenis Layanan</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['jenis_layanan']; ?>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Nama Perusahaan</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['nama_perusahaan']; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-3">
                                <p>Alamat Perusahaan</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['alamat_perusahaan']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Alamat Persil</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['alamat_persil']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Kelurahan</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['kelurahan']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Kecamatan</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['kecamatan']; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Wilayah</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['wilayah']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Peruntukan</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['peruntukan']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Tanggal TTD</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['tanggal_ttd']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Ruang</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['ruang']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Rak</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['rak']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Box</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['box']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Bulan</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['bulan']; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <p>Tahun</p>
                            </div>
                            <div class="col">
                                :
                                <?php echo $document['tahun']; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col bg-primary text-light text-lg-center mb-5 pt-2">
                        <p>Dokument/files</p>
                    </div>
                </div>

                <div class="row">
                    <!-- card Dokumen -->
                    <?php if ($document['file1']) : ?>
                        <div class="col mb-5">
                            <div class="card text-center">
                                <div class="card-header">
                                    Dokumen
                                </div>
                                <div class="card-body">
                                    <i class="far fa-image fa-lg"></i>
                                    <br>
                                    <?= $document['file1'] ?>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalFotoKegiatan">
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

<!-- File 1 -->
<div class="modal fade" id="modalFotoKegiatan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex justify-content-center align-content-center ">
                <?php if ($document['file1']) : ?>
                    <embed src="<?php echo base_url('assets/document/data_arsip_boss/' . $document['file1']); ?>" type="application/pdf" width="100%" height="600px">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
</div>

<!-- File 2-->
<div class="modal fade" id="modalDaftarHadir" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($document['file2']) : ?>
                    <embed src="<?php echo base_url('assets/document/data_arsip_boss/' . $document['file2']); ?>" type="application/pdf" width="100%" height="600px">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- File 3-->
<div class="modal fade" id="modalNotulen" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($document['file3']) : ?>
                    <embed src="<?php echo base_url('assets/document/data_arsip_boss/' . $document['file3']); ?>" type="application/pdf" width="100%" height="600px">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- File 4-->
<div class="modal fade" id="modalBeritaAcara" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($document['file4']) : ?>
                    <embed src="<?php echo base_url('assets/document/data_arsip_boss/' . $document['file4']); ?>" type="application/pdf" width="100%" height="600px">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Mfile 5-->
<div class="modal fade" id="modalSuratUndangan" tabindex="-1" role="dialog" aria-labelledby="modalFotoKegiatanLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($document['file5']) : ?>
                    <embed src="<?php echo base_url('assets/document/data_arsip_boss/' . $document['file5']); ?>" type="application/pdf" width="100%" height="600px">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>