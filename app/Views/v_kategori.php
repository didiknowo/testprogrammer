<div class="container">
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
                                <th>ID Kategori</th>
                                <th>Kategori</th>
                                <th>Status</th>
                                <th width="10%">Aksi</th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach($kategori as $key => $value ): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['kategori_id'] ?></td>
                                <td><?= $value['kategori'] ?></td>
                                <td><?= $value['status'] ?></td>

                                <td class="text-center">
                                    <div class="btn btn-warning btn-sm btn-flat" data-toggle="modal"
                                        data-target="#edit-data<?= $value['kategori_id'] ?>"><i class="fas fa-pencil-alt"></i>
                                    </div>&nbsp;

                                    <a href="<?= base_url("ManajemenKategori/hapusdata/".$value['kategori_id']) ?>"
                                        onclick="javascript: return confirm('Anda Yakin Hapus Kategori ?')"
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
            <form action="<?= base_url('manajemenKategori/tambahdata') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Kategori</label>
                        <input type="text" name="kategori_id" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" name="kategori" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="checkbox" name="status" value="1" class="form-control">
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
<?php foreach($kategori as $key => $value ):?>
<div class="modal fade" id="edit-data<?= $value['kategori_id'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('manajemenKategori/updatedata/' . $value['kategori_id']) ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">ID Kategori</label>
                        <input name="kategori_id" value="<?= $value['kategori_id'] ?>" class="form-control"
                            placeholder="ID Kategori" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <input name="kategori" value="<?= $value['kategori'] ?>" class="form-control"
                            placeholder="Kategori" required>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>                     
                        <input type="checkbox" name="status" <?php if($value['status'] == 1) echo 'checked="checked"'; ?> value="1" 
                            class="form-control" placeholder="status">
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
