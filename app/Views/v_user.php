<div class="col-md-12">
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
            <div class="tabel-responsiv">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr class="text-center">
                            <th>NIP</th>
                            <th>Nama User</th>
                            <th>Password</th>
                            <th width="10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $key => $value): ?>
                        <tr>
                            <td><?= $value['user_id'] ?></td>
                            <td><?= $value['username'] ?></td>
                            <td><?= $value['password'] ?></td>

                            <td class="text-center">
                                <div class="btn btn-warning btn-sm btn-flat" data-toggle="modal"
                                    data-target="#edit-data<?= $value['user_id'] ?>"><i class="fas fa-pencil-alt"></i>
                                </div>&nbsp;

                                <a href="<?= base_url("user/hapusdata/".$value['user_id']) ?>"
                                    onclick="javascript: return confirm('Anda Yakin Hapus User ?')"
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
            <form action="<?= base_url('user/tambahdata') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="text" name="user_id" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control">
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
<?php foreach($user as $key => $value ):?>
<div class="modal fade" id="edit-data<?= $value['user_id'] ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data <?= $subjudul ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/updatedata/' . $value['user_id']) ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">NIP</label>
                        <input name="user_id" value="<?= $value['user_id'] ?>" class="form-control"
                        placeholder="NIP" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama User</label>
                        <input name="username" value="<?= $value['username'] ?>" class="form-control" placeholder="Nama User"
                        required>
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input name="password" value="<?= $value['password'] ?>" class="form-control" placeholder="Password"
                        required>
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