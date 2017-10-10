<div class="row">
  <div class="col-xs-12">
    <div class="clearfix">
<?php 
    if($this->session->flashdata('sukses_tambah') != "") {
        echo '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4> Data Berhasil Disimpan
              </div>';
    }
?>
<?php 
    if($this->session->flashdata('sukses_edit') != "") {
        echo '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4> Data Berhasil Diedit
              </div>';
    }
?>
<?php 
    if($this->session->flashdata('sukses_hapus') != "") {
        echo '<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Sukses</strong></h4> Data Berhasil Dihapus
              </div>';
    }
?>
<?php 
    if($this->session->flashdata('gagal_hapus') != "") {
        echo '<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><strong>Gagal</strong></h4> Data Gagal Dihapus
              </div>';
    }
?>
      <a class="btn btn-primary btn-sm" href="#modal-form" role="button" class="blue" data-toggle="modal">
        <i class="ace-icon fa fa-plus align-top bigger-125"></i>
        Tambah Pegawai
      </a>
      <br>
      <div class="pull-right tableTools-container"></div>
    </div>
    <div class="table-header">
      LIST PEGAWAI
    </div>
    <div id="table-responsive">
      <table id="pegawai" class="table table-striped table-bordered table-hover" width="100%">
        <thead>
          <tr>
            <th width="10px">ID</th>
            <th>Nama Pegawai</th>
            <th>Alamat</th>
            <th width="60px">Aksi</th>
          </tr>
        </thead>

        <tbody>
              
        </tbody>
      </table>
    </div>
  </div>
</div>

                <div id="modal-form" class="modal" tabindex="-1">
                  <div class="modal-dialog">
                    <?php echo form_open('Pegawai/tambah'); ?>
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="blue bigger">Tambah Pegawai</h4>
                      </div>

                      <div class="modal-body">
                        <div class="row">
                          <div class="col-xs-12 col-sm-6">
          
                            <div class="form-group">
                              <label>Nama</label>
                              <div>
                                <input class="form-control" type="text" name="nama_pegawai" placeholder="Nama Pegawai" required />
                                <?php echo form_error('nama_pegawai') ?>
                              </div>
                            </div>

                            <div class="form-group">
                              <label>Alamat</label>
                              <div>
                                <textarea class="form-control" name="alamat_pegawai" placeholder="Alamat Pegawai" rows="4" required></textarea>
                                <?php echo form_error('alamat_pegawai') ?>
                              </div>
                            </div>

                          </div>

                           <div class="col-xs-12 col-sm-6">

                            <div class="form-group">
                              <label>Username</label>
                              <div>
                                <input class="form-control" type="text" name="username" placeholder="Username" required/>
                                <?php echo form_error('username') ?>
                              </div>
                            </div>

                            <div class="form-group">
                              <label>Password</label>
                              <div>
                                <input class="form-control" type="password" name="password" placeholder="Password" required>
                                <?php echo form_error('password') ?>
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <label>Akses</label>
                              <div>
                                <select name="akses_pegawai" class="form-control">
                                  <option value="">--Pilih Akses--</option>
                                  <option value="user">User</option>
                                  <option value="admin">Admin</option>
                                </select>
                                <?php echo form_error('akses_pegawai') ?>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button class="btn btn-sm" data-dismiss="modal">
                          <i class="ace-icon fa fa-times"></i>
                          Batal
                        </button>

                        <button class="btn btn-sm btn-primary" type="submit">
                          <i class="ace-icon fa fa-check"></i>
                          Simpan
                        </button>
                      </div>
                    </div>
                    <?php form_close(); ?>
                  </div>
                </div>


<script type="text/javascript">
  $(document).ready(function(){
    $('#pegawai').DataTable({
      "processing":true,
      "serverSide":true,
      "lengthMenu":[[5,10,25,50,100,-1],[5,10,25,50,100,"All"]],
      "ajax":{
        url : "<?php echo site_url('pegawai/data_server') ?>",
        type : "POST"
      },

      "columnDefs":
      [
        {
          "targets":0,
          "data":"id_pegawai",
          "searchable": false,
        },
        {
          "targets":1,
          "data":"nama_pegawai"
        },
        {
          "targets":2,
          "data":"alamat_pegawai",
          "searchable": false,
        },
        {
          "targets":3,
          "data": null,
          "searchable": false,
          "render":function(data,tipe,full,meta){
            return '<a href="<?php echo site_url("Pegawai/edit/") ?>'+data["id_pegawai"]+'" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>&nbsp;<form action="<?=site_url('Pegawai/hapus/')?>" method="POST" style="display: inline;" accept-charset="utf-8"><input type="text" name="id_pegawai" value='+data["id_pegawai"]+' hidden ><button class="btn btn-danger btn-rounded btn-sm" type="submit" onclick="clicked(event)"><span class="fa fa-trash"></span></button></form>'
          }
        }
      ],
    });
  });
</script>

<script>
    function clicked(e)
    {
        if(!confirm('Anda Yakin?'))e.preventDefault();
    }
</script>