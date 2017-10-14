<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo site_url('Home') ?>">Sistem Informasi Kasir</a>
                </li>
                <li class="active">Barang</li>
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
                                  Tambah Barang
                                </a>
                                <a class="btn btn-primary btn-sm" href="#modal-log" role="button" class="blue" data-toggle="modal">
                                  <i class="ace-icon fa fa-plus align-top bigger-125"></i>
                                  Log Stok
                                </a>
                                <br>
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <div class="table-header">
                                LIST Barang
                            </div>
                            <div id="table-responsive">
                                <table id="barang" class="table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="10px">ID</th>
                                            <th>Nama Barang</th>
                                            <th>Ukuran</th>
                                            <th>Stok</th>
                                            <th>Harga Jual</th>
                                            <th>Jenis</th>
                                            <th>Keterangan</th>
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
        <?php echo form_open('Barang/tambah'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger">Tambah Barang
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>ID</label>
                            <div>
                                <?php $id = $id_max['id_max']; ?>
                                <input class="form-control" type="text" name="id_barang" value="<?php echo $id+1 ?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Nama Barang</label>
                            <div>
                                <textarea class="form-control" name="nama_barang" placeholder="Nama Barang" required autofocus></textarea>
                                <?php echo form_error('nama_barang') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Ukuran Barang</label>
                            <div>
                                <input class="form-control" type="text" name="ukuran_barang" placeholder="Ukuran Barang" required></input>
                                <?php echo form_error('ukuran_barang') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Stok Barang</label>
                            <div>
                                <input class="form-control" type="text" name="stok_barang" placeholder="Stok Barang" required></input>
                                <?php echo form_error('stok_barang') ?>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label>Jenis Barang</label>
                            <div>
                                <select class="form-control" name="id_jenis_barang">
                                    
                                    <?php foreach ($jenis_barang as $key): ?>
                                        <option value='<?php echo $key['id_jenis_barang'];?>'>
                                            <?php echo $key['nama_jenis_barang']; ?>   
                                        </option>
                                    <?php endforeach ?>
                                    
                                </select>
                                <?php echo form_error('id_jenis_barang') ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Desain</label>
                            <select name="id_desain" class="form-control">
                                <?php foreach ($desain as $key): ?>
                                    <option value='<?php echo $key['id_desain'];?>'>
                                        <?php echo $key['nama_desain']; ?>   
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <?php echo form_error('id_desain') ?>
                        </div>

                        <div class="form-group">
                            <label>Harga Jual (Rp)</label>
                            <div>
                                <input type="number" class="form-control" name="harga_jual_barang" placeholder="Harga Jual Barang" required></input>
                                <?php echo form_error('harga_jual_barang') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Keterangan Barang</label>
                            <div>
                                <textarea class="form-control" name="keterangan_barang" placeholder="Keterangan Barang" required></textarea>
                                <?php echo form_error('keterangan_barang') ?>
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

<div id="modal-log" class="modal" tabindex="-1">
    <div class="modal-dialog">
        <?php echo form_open('Barang/tambah'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger">Log Stok
            </div>

            <div class="modal-body">
                <?php $no = 1; ?>
                <?php foreach ($stok as $key): ?>
                    <p><?php echo $no.". Barang ".$key['nama_barang']." sisa stok ".$key['stok_barang']." pada ".$key['tanggal_update']. " oleh ".$key['nama_pegawai'] ?></p>

                <?php $no++; endforeach ?>
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
    $('#barang').DataTable({
      "processing":true,
      "serverSide":true,
      "lengthMenu":[[5,10,25,50,100,-1],[5,10,25,50,100,"All"]],
      "ajax":{
        url : "<?php echo site_url('barang/data_server') ?>",
        type : "POST"
      },

      "columnDefs":
      [
        {
          "targets":0,
          "data":"id_barang",
          "searchable": false,
        },
        {
          "targets":1,
          "data":"nama_barang"
        },
        {
          "targets":2,
          "data":"ukuran_barang"
        },
        {
          "targets":3,
          "data":"stok_barang"
        },
        {
          "targets":4,
          "data":"harga_jual_barang",
          "searchable": false,
        },
        {
          "targets":5,
          "data":"nama_jenis_barang",
        },
        {
          "targets":6,
          "data":"keterangan_barang",
          "searchable": false,
        },
        {
          "targets":7,
          "data": null,
          "searchable": false,
          "render":function(data,tipe,full,meta){
            return '<a href="<?php echo site_url("Barang/edit/") ?>'+data["id_barang"]+'" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>&nbsp;<form action="<?=site_url('Barang/hapus/')?>" method="POST" style="display: inline;" accept-charset="utf-8"><input type="text" name="id_barang" value='+data["id_barang"]+' hidden ><button class="btn btn-danger btn-rounded btn-sm" type="submit" onclick="clicked(event)"><span class="fa fa-trash"></span></button></form>'
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