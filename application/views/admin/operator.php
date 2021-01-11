<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!-- <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div>/.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- Alert Flash Message -->
            <?= $this->session->flashdata('message'); ?>
            <!-- End of Alert Flash Message-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Operator Administration</h3>
              </div>
              <div class="card-header">
                <a class="btn btn-primary btn-sm" href="#" role="button" data-toggle="modal" data-target="#add_operator"><i class="fas fa-plus"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="operator_table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Fakultas</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no=1;
                    foreach ($operator['data'] as $row) :
                  ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['fakultas']; ?></td>
                    <td>
                        <a class="btn btn-info btn-sm" href="#" role="button"><i class="fas fa-info-circle"></i></a>
                        <a class="btn btn-primary btn-sm" href="#" role="button" data-toggle="modal" data-target="#edit_operator_<?= $row['id_operator']; ?>"><i class="fas fa-pen"></i></a>
                        <a class="btn btn-danger btn-sm" href="#" role="button" data-toggle="modal" data-target="#delete_operator_<?= $row['id_operator']; ?>"><i class="fas fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Fakultas</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Modal Add Operator -->
<div class="modal fade" id="add_operator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('admin/add_operator'); ?>" method="POST">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Operator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="nama" class="col-form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="E.g Zenith Wibawa" required>
        </div>
        <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@operator.com" required>
        </div>
        <label for="jk" class="col-form-label">Jenis Kelamin:</label>
        <div class="form-group">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jk" id="jk1" value=1>
            <label class="form-check-label" for="jk1">Laki - Laki</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jk" id="jk2" value=2>
            <label class="form-check-label" for="jk2">Perempuan</label>
        </div>
        </div>
        <div class="form-group">
            <label for="tgl" class="col-form-label">Date</label>
            <input class="form-control" type="date" name="tgl" id="tgl" required>
        </div> 
        <div class="form-group">
            <label for="department">Fakultas</label>
            <select class="form-control" id="department" name="department">
                <?php foreach ($department['data'] as $row) : ?>
                <option value=<?= $row['id_departemen']; ?>><?= $row['fakultas']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Your password" required>
        </div>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
  </form>
  </div>
</div>
<!-- End of Modal Add Operator -->

<?php foreach ($operator['data'] as $row) : ?>
<!-- Modal Edit Operator -->
<div class="modal fade" id="edit_operator_<?= $row['id_operator']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('admin/edit_operator'); ?>" method="POST">
    <input type="hidden" name="id_user" value="<?= $row['id_user']; ?>">
    <input type="hidden" name="id_operator" value="<?= $row['id_operator']; ?>">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Operator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="nama" class="col-form-label">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email" class="col-form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@operator.com" value="<?= $row['email']; ?>" required>
        </div>
        <label for="jk" class="col-form-label">Jenis Kelamin:</label>
        <div class="form-group">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jk" id="jk1" value=1 <?= ($row['jenis_kelamin']==1) ? 'checked':''; ?>>
            <label class="form-check-label" for="jk1">Laki - Laki</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jk" id="jk2" value=2 <?= ($row['jenis_kelamin']==2) ? 'checked':''; ?>>
            <label class="form-check-label" for="jk2">Perempuan</label>
        </div>
        </div>
        <div class="form-group">
            <label for="tgl" class="col-form-label">Date</label>
            <input class="form-control" type="date" name="tgl" id="tgl" value="<?= $row['tgl_lahir']; ?>" required>
        </div> 
        <div class="form-group">
            <label for="department">Fakultas</label>
            <select class="form-control" id="department" name="department">
                <?php foreach ($department['data'] as $row1) : ?>
                <option value=<?= $row1['id_departemen']; ?> <?= ($row1['id_departemen']==$row['id_departemen']) ? 'selected="selected"':''; ?>><?= $row1['fakultas']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="password" class="col-form-label">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Your password" required>
        </div>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
  </form>
  </div>
</div>
<!-- End of Modal Add Operator -->
<?php endforeach; ?>

<?php foreach ($operator['data'] as $row) : ?>
<!-- Modal Delete Operator -->
<div class="modal fade" id="delete_operator_<?= $row['id_operator']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="<?= base_url('admin/delete_operator'); ?>" method="POST">
    <input type="hidden" name="id_operator" value="<?= $row['id_operator']; ?>">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Operator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="my-auto">Are you sure to delete <strong><?= $row['nama']; ?> (<?= $row['email']; ?>)</strong> ?</p>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
  </form>
  </div>
</div>
<!-- End of Modal Add Operator -->
<?php endforeach; ?>