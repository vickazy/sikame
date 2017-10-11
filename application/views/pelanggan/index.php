<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo site_url('Home') ?>">Sistem Informasi Kasir</a>
                </li>
                <li class="active">PELANGGAN</li>
            </ul><!-- /.breadcrumb -->
        </div>

        <div class="page-content">
            <!--Setting-->
              <?php $this->load->view('setting'); ?>
            <!--End Setting-->

            <div class="row">
                <div class="col-xs-12">
                  <!-- PAGE CONTENT BEGINS -->
                  <!--KONTEN-->
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
                                  Tambah Pelanggan
                                </a>
                                <br>
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <div class="table-header">
                                LIST PELANGGAN
                            </div>
                            <div id="table-responsive">
                                <table id="pelanggan" class="table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="10px">ID</th>
                                            <th>Nama Pelanggan</th>
                                            <th>Alamat</th>
                                            <th>Contact Person</th>
                                            <th width="60px">Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                          
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--END KONTEN-->
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div>
</div><!-- /.main-content -->


<!--modal-->
<div id="modal-form" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <?php echo form_open('pelanggan/tambah'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger">Tambah Pelanggan</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>ID</label>
                            <div>
                                <?php $id = $id_p['id_max']; ?>
                                <input class="form-control" type="text" name="id_pelanggan" value="<?php echo $id+1 ?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nama</label>
                            <div>
                                <input class="form-control" type="text" name="nama_pelanggan" placeholder="Nama pelanggan" required />
                                <?php echo form_error('nama_pelanggan') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Contact Person</label>
                            <small class="text-warning">(9999-9999-9999)</small>
                            <div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ace-icon fa fa-phone"></i>
                                    </span>

                                    <input class="form-control input-mask-phone" name="cp_pelanggan" type="text" placeholder="CP Pelanggan" id="form-field-mask-2" required />
                                </div>
                                <?php echo form_error('cp_pelanggan') ?>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Alamat</label>
                            <div>
                                <textarea class="form-control" name="alamat_pelanggan" placeholder="Alamat pelanggan" rows="4" required></textarea>
                                <?php echo form_error('alamat_pelanggan') ?>
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
    $('#pelanggan').DataTable({
      "processing":true,
      "serverSide":true,
      "lengthMenu":[[5,10,25,50,100,-1],[5,10,25,50,100,"All"]],
      "ajax":{
        url : "<?php echo site_url('pelanggan/data_server') ?>",
        type : "POST"
      },

      "columnDefs":
      [
        {
          "targets":0,
          "data":"id_pelanggan",
          "searchable": true,
        },
        {
          "targets":1,
          "data":"nama_pelanggan"
        },
        {
          "targets":2,
          "data":"alamat_pelanggan",
          "searchable": true,
        },
        {
          "targets":3,
          "data":"cp_pelanggan",
          "searchable": true,
        },
        {
          "targets":4,
          "data": null,
          "searchable": false,
          "render":function(data,tipe,full,meta){
            return '<a href="<?php echo site_url("pelanggan/edit/") ?>'+data["id_pelanggan"]+'" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>&nbsp;<form action="<?=site_url('pelanggan/hapus/')?>" method="POST" style="display: inline;" accept-charset="utf-8"><input type="text" name="id_pelanggan" value='+data["id_pelanggan"]+' hidden ><button class="btn btn-danger btn-rounded btn-sm" type="submit" onclick="clicked(event)"><span class="fa fa-trash"></span></button></form>'
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
<script src="<?php echo base_url() ?>assets/js/jquery.maskedinput.min.js"></script>
<script>
    jQuery(function($) {
        $('.input-mask-phone').mask('9999-9999-9999');
    });
</script>