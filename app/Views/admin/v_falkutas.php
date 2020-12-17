<section class="content-header">
    <h1>
        <?= $title ?>
    </h1>
    <br>
</section>
<div class="row">
    <div class="col-sm-12">
        <div class="box box-success box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?= $title ?></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i>Add</button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }

                ?>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px" class="text-center">No</th>
                            <th>Falkutas</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($falkutas as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['falkutas'] ?></td>
                                <td class="text-center">
                                    <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit<?= $value['id_falkutas'] ?>"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete<?= $value['id_falkutas'] ?>"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
    <!-- modal add--->
</div>
<div class="modal fade" id="add">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Falkutas</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('falkutas/add');
                ?>

                <div>
                    <div class="form-group">
                        <label for="Falkutas"></label>
                        <input name="falkutas" class="form-control" placeholder="Falkutas" required>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success btn-flat">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- modal edit--->
<?php foreach ($falkutas as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_falkutas'] ?>">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Falkutas</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('falkutas/edit/' . $value['id_falkutas']);
                    ?>

                    <div>
                        <div class="form-group">
                            <label for="Falkutas"></label>
                            <input name="falkutas" value="<?= $value['falkutas'] ?>" class="form-control" placeholder="Falkutas" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success btn-flat">Simpan</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>

<!-- modal hapus--->
<?php foreach ($falkutas as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_falkutas'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Delete Falkutas</h4>
                </div>
                <div class="modal-body">

                    apakah anda yakin ingin menghapus <b><?= $value['falkutas'] ?>?</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('falkutas/delete/' . $value['id_falkutas']) ?>" class="btn btn-success btn-flat">Delete</a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>