<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo site_url('Home') ?>">Sistem Informasi Kasir</a>
                </li>
                <li class="active">Modal</li>
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
                                                <strong>Sukses</strong> Data Berhasil Disimpan
                                              </div>';
                                    }
                                ?>
                                <?php 
                                    if($this->session->flashdata('sukses_edit') != "") {
                                        echo '<div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <strong>Sukses</strong> Data Berhasil Diedit
                                              </div>';
                                    }
                                ?>
                                <?php 
                                    if($this->session->flashdata('sukses_hapus') != "") {
                                        echo '<div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <strong>Sukses</strong> Data Berhasil Dihapus
                                              </div>';
                                    }
                                ?>
                                <?php 
                                    if($this->session->flashdata('gagal_hapus') != "") {
                                        echo '<div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <strong>Gagal</strong> Data Gagal Dihapus
                                              </div>';
                                    }
                                ?>
                                <a class="btn btn-primary btn-sm" href="#modal-form" role="button" class="blue" data-toggle="modal">
                                  <i class="ace-icon fa fa-plus align-top bigger-125"></i>
                                  Tambah Modal
                                </a>
                                <br>
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <div class="table-header">
                                LIST MODAL
                            </div>
                            <div id="table-responsive">
                                <table id="modal" class="table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="10px">ID</th>
                                            <th>Nama Bahan</th>
                                            <th>Jumlah dan Satuan</th>
                                            <th>Harga Beli</th>
                                            <th>Tanggal Masuk</th>
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
        <?php echo form_open('modal/tambah'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger">Tambah Bahan
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>ID</label>
                            <div>
                                <?php $id = $id_max['id_max']; ?>
                                <input class="form-control" type="text" name="id_modal" value="<?php echo $id+1 ?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nama Bahan</label>
                            <div>
                                <input class="form-control" type="text" name="nama_bahan" placeholder="Nama modal" required autofocus>
                                <?php echo form_error('nama_bahan') ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label>Jumlah</label>
                            <div>
                                <input type="number" class="form-control" name="jumlah_bahan" placeholder="Jumlah Bahan" required></input>
                                <?php echo form_error('jumlah_bahan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-2">
                        <div class="form-group">
                            <label>Satuan</label>
                            <div>
                                <input type="text" class="form-control" name="satuan" placeholder="Satuan" required></input>
                                <?php echo form_error('satuan') ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Harga Jual (Rp)</label>
                            <div>
                                <input type="number" class="form-control" name="harga_beli" placeholder="Harga Beli Bahan" required></input>
                                <?php echo form_error('harga_beli') ?>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <a class="btn btn-sm" data-dismiss="modal">
                    <i class="ace-icon fa fa-times"></i>
                        Batal
                </a>

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
    $('#modal').DataTable({
      "processing":true,
      "serverSide":true,
      "lengthMenu":[[5,10,25,50,100,-1],[5,10,25,50,100,"All"]],
      "ajax":{
        url : "<?php echo site_url('modal/data_server') ?>",
        type : "POST"
      },

      "columnDefs":
      [
        {
          "targets":0,
          "data":"id_modal",
          "searchable": false,
        },
        {
          "targets":1,
          "data":"nama_bahan"
        },
        {
          "targets":2,
          "data": null,
          "render":function(data,tipe,full,meta){
            return data["jumlah_bahan"]+" "+data["satuan"]
          }
        },
        {
          "targets":3,
          "data":"harga_beli"
        },
        {
          "targets":4,
          "data":"tanggal_masuk",
          "searchable": true,
        },
        {
          "targets":5,
          "data": null,
          "searchable": false,
          "render":function(data,tipe,full,meta){
            return '<a href="<?php echo site_url("modal/edit/") ?>'+data["id_modal"]+'" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>&nbsp;<form action="<?=site_url('modal/hapus/')?>" method="POST" style="display: inline;" accept-charset="utf-8"><input type="text" name="id_modal" value='+data["id_modal"]+' hidden ><button class="btn btn-danger btn-rounded btn-sm" type="submit" onclick="clicked(event)"><span class="fa fa-trash"></span></button></form>'
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