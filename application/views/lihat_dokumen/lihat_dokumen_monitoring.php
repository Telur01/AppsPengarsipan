<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col" style="font-size: 14px">
            <!-- Tampilkan detail dokumen di sini -->
            <?php if ($document) : ?>
                <p class="h5 mb-4 text-gray-900"> Detail Data In-Aktif</p>
                <hr class="sidebar-divider">
                <div class="row">
                    <div class="col-sm-2">
                        <p>Tanggal</p>
                    </div>
                    <div class="col">
                        :
                        <?php echo $document['tanggal']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <p>No. Izin</p>
                    </div>
                    <div class="col">
                        :
                        <?php echo $document['no_izin']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <p>Jenis Izin</p>
                    </div>
                    <div class="col">
                        :
                        <?php echo $document['jenis_izin']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <p>Jenis Layanan</p>
                    </div>
                    <div class="col">
                        :
                        <?php echo $document['jenis_layanan']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <p>Nama Pemohon</p>
                    </div>
                    <div class="col">
                        :
                        <?php echo $document['nama_pemohon']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <p>Nama Perusahan</p>
                    </div>
                    <div class="col">
                        :
                        <?php echo $document['nama_perusahaan']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <p>Alamat Perusahan</p>
                    </div>
                    <div class="col">
                        :
                        <?php echo $document['alamat_perusahaan']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <p>Alamat Persil</p>
                    </div>
                    <div class="col">
                        :
                        <?php echo $document['alamat_persil']; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <p>Peruntukan</p>
                    </div>
                    <div class="col">
                        :
                        <?php echo $document['peruntukan']; ?>
                    </div>
                </div>
                <hr class="sidebar-divider">
                <div class="row">
                    <div class="col bg-primary text-light text-lg-center mb-4 pt-2">
                        <p>Dokument/files</p>
                    </div>
                </div>
                <div class="row">
                    <!-- card Dokumen -->
                    <?php if ($document['document']) : ?>
                        <div class="col mb-5">
                            <div class="card text-center">
                                <div class="card-header">
                                    Dokumen
                                </div>
                                <div class="card-body">
                                    <i class="far fa-image fa-lg"></i>
                                    <br>
                                    <?= $document['document'] ?>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalLihatDokumen">
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
</div>

<!-- Modal lihat dokumen-->
<div class="modal fade" id="modalLihatDokumen" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($document['document']) : ?>
                    <embed src="<?php echo base_url('assets/document/data_monitoring/' . $document['document']); ?>" width="100%" height="600px">
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>