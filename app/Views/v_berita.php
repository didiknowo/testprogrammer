<div class="col-md-12 ">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $subjudul ?></h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#add-data"><i
                        class="fas fa-plus"></i> Add Data
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <?php 
            if (session()->getFlashdata('pesan')){
                echo ' <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> ';
                echo session()->getFlashdata('pesan');
                echo'</h5></div>';
            }
            if (session()->getFlashdata('gagal')){
                echo ' <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> ';
                echo session()->getFlashdata('gagal');
                echo'</h5></div>';
            }
        ?>
            <div class="table-responsive">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr class="text-center">
                            <th width="5px">NO</th>
                            <th>ID Berita</th>
                            <th>Judul Berita</th>
                            <th>Isi Berita</th>
                            <th>Kategori</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach($berita as $key => $value ): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['berita_id'] ?></td>
                            <td><?= $value['judul_berita'] ?></td>
                            <td><?= $value['isi_berita'] ?></td>
                            <td><?= $value['kategori'] ?></td>

                            <td class="text-center">
                                <div class="btn btn-warning btn-sm btn-flat" data-toggle="modal"
                                    data-target="#edit-data<?= $value['berita_id'] ?>"><i class="fas fa-pencil-alt"></i>
                                </div>&nbsp;

                                <a href="<?= base_url("manajemenBerita/hapusdata/".$value['berita_id']) ?>"
                                    onclick="javascript: return confirm('Anda Yakin Hapus Berita ?')"
                                    class="btn btn-danger btn-sm btn-flat"><i class="fas fa-trash"></i> 
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- Modall Add Data -->
<div class="modal fade" id="add-data">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Data <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('manajemenBerita/tambahdata') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Berita</label>
                        <input type="text" name="berita_id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" name="judul_berita" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Isi Berita</label>
                        <textarea class="form-control" name="isi_berita"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="kategori_id" class="form-control">
                            <option value="">--Pilih Kategori Berita--</option>
                            <?php foreach($kategori as $key => $value ): ?>
                            <option value="<?= $value['kategori_id'] ?>"><?= $value['kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submin" class="btn btn-primary btn-flat">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END Modall Add Data -->

<!-- Modall Edit Data -->
<?php foreach($berita as $key => $value ):?>
<div class="modal fade" id="edit-data<?= $value['berita_id'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('manajemenBerita/updatedata/' . $value['berita_id']) ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">ID Berita</label>
                        <input name="berita_id" value="<?= $value['berita_id'] ?>" class="form-control"
                            placeholder="ID Berita" readonly>
                    </div>
                    <div class="form-group">
                        <label>Judul Berita</label>
                        <input type="text" name="judul_berita" value="<?= $value['judul_berita'] ?>"
                            class="form-control" placeholder="Judul Berita" required>
                    </div>
                    <div class="form-group">
                        <label>Isi Berita</label>
                        <textarea class="form-control" name="isi_berita"><?= $value['isi_berita'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="kategori_id" class="form-control">
                            <option value="">--Pilih Kategori Berita--</option>
                            <?php foreach($kategori as $kat): ?>
                            <option value="<?= $kat['kategori_id'] ?>"
                                <?= $value['kategori_id'] == $kat['kategori_id'] ? 'Selected' : '' ?>>
                                <?= $kat['kategori'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <button type="submin" class="btn btn-primary btn-flat">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<!-- END Modall Edit Data -->