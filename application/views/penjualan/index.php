<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo site_url('Home') ?>">Sistem Informasi Kasir</a>
                </li>
                <li class="active">PENJUALAN</li>
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
                                <a class="btn btn-primary btn-sm" href="<?php echo site_url('penjualan/tambah') ?>">
                                  <i class="ace-icon fa fa-plus align-top bigger-125"></i>
                                  Tambah Penjualan
                                </a>
                                <br>
                                <div class="pull-right tableTools-container"></div>
                            </div>
                            <div class="table-header">
                                LIST PENJUALAN
                            </div>
                            <div id="table-responsive">
                                <table id="penjualan" class="table table-striped table-bordered table-hover" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="10px">ID</th>
                                            <th>Tanggal Penjualan</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah Barang</th>
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
        <?php echo form_open('penjualan/tambah'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="blue bigger">Tambah Penjualan</h4>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group">
                            <label>ID Faktur</label>
                            <div>
                                <input class="form-control" type="text" name="id_faktur" value="<?php echo $id_p; ?>" readonly/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Jumlah Barang</label>
                            <div>
                                <input class="form-control" type="number" name="jumlah_barang" placeholder="Jumlah Barang" />
                                <?php echo form_error('jumlah_barang') ?>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-12 col-sm-5">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <div>
                                <input class="form-control" type="text" name="id_barang" placeholder="Nama Barang" id="tags">
                                <?php echo form_error('id_barang') ?>
                            </div>
                        </div>

                         <div class="form-group">
                            <label>Nama Pelanggan</label>
                            <div>
                                <input class="form-control" type="text" name="id_pelanggan" placeholder="Nama Pelanggan" id="id_pelanggan">
                                <?php echo form_error('id_pelanggan') ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                         <div class="form-group">
                            <label>Tambah</label>
                            <div>
                                <a class="btn btn-sm btn-success" href="#modal-barang" role="button" data-toggle="modal">
                                    <i class="ace-icon fa fa-plus"></i> Barang
                                </a>
                            </div>
                        </div>
                         <div class="form-group">
                            <label>Tambah</label>
                            <div>
                                <a class="btn btn-sm btn-success" href="#modal-pelanggan" role="button" data-toggle="modal">
                                    <i class="ace-icon fa fa-plus"></i> Pelanggan
                                </a>
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

<!--modal barang-->
<div id="modal-barang" class="modal" tabindex="-1">
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
                                <?php $id = $id_max_barang['id_max']; ?>
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

<!--modal pelanggan-->
<div id="modal-pelanggan" class="modal" tabindex="-1">
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
                                <?php $id = $id_pelanggan['id_max']; ?>
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
    $('#penjualan').DataTable({
      "processing":true,
      "serverSide":true,
      "lengthMenu":[[5,10,25,50,100,-1],[5,10,25,50,100,"All"]],
      "ajax":{
        url : "<?php echo site_url('penjualan/data_server') ?>",
        type : "POST"
      },

      "columnDefs":
      [
        {
          "targets":0,
          "data":"id_faktur",
          "searchable": true,
        },
        {
          "targets":1,
          "data":"tanggal_penjualan"
        },
        {
          "targets":2,
          "data":"nama_barang",
          "searchable": true,
        },
        {
          "targets":3,
          "data":"jumlah_barang",
          "searchable": true,
        },
        {
          "targets":4,
          "data": null,
          "searchable": false,
          "render":function(data,tipe,full,meta){
            return '<a href="<?php echo site_url("penjualan/edit/") ?>'+data["id_penjualan"]+'" class="btn btn-success btn-rounded btn-sm"><span class="fa fa-pencil"></span></a>&nbsp;<form action="<?=site_url('penjualan/hapus/')?>" method="POST" style="display: inline;" accept-charset="utf-8"><input type="text" name="id_penjualan" value='+data["id_penjualan"]+' hidden ><button class="btn btn-danger btn-rounded btn-sm" type="submit" onclick="clicked(event)"><span class="fa fa-trash"></span></button></form>'
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
<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
  <script src="assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery-ui.custom.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/chosen.jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/spinbox.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/daterangepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.knob.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/autosize.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.inputlimiter.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-tag.min.js"></script>

<script type="text/javascript">
    jQuery(function($) {
    
        if(!ace.vars['touch']) {
            $('.chosen-select').chosen({allow_single_deselect:true}); 
            //resize the chosen on window resize
    
            $(window)
            .off('resize.chosen')
            .on('resize.chosen', function() {
                $('.chosen-select').each(function() {
                     var $this = $(this);
                     $this.next().css({'width': $this.parent().width()});
                })
            }).trigger('resize.chosen');
            //resize chosen on sidebar collapse/expand
            $(document).on('settings.ace.chosen', function(e, event_name, event_val) {
                if(event_name != 'sidebar_collapsed') return;
                $('.chosen-select').each(function() {
                     var $this = $(this);
                     $this.next().css({'width': $this.parent().width()});
                })
            });
    
    
            $('#chosen-multiple-style .btn').on('click', function(e){
                var target = $(this).find('input[type=radio]');
                var which = parseInt(target.val());
                if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
                 else $('#form-field-select-4').removeClass('tag-input-style');
            });
        }

        /////////
        $('#modal-form input[type=file]').ace_file_input({
            style:'well',
            btn_choose:'Drop files here or click to choose',
            btn_change:null,
            no_icon:'ace-icon fa fa-cloud-upload',
            droppable:true,
            thumbnail:'large'
        })
        
        //chosen plugin inside a modal will have a zero width because the select element is originally hidden
        //and its width cannot be determined.
        //so we set the width after modal is show
        $('#modal-form').on('shown.bs.modal', function () {
            if(!ace.vars['touch']) {
                $(this).find('.chosen-container').each(function(){
                    $(this).find('a:first-child').css('width' , '210px');
                    $(this).find('.chosen-drop').css('width' , '210px');
                    $(this).find('.chosen-search input').css('width' , '200px');
                });
            }
        })

        $('.input-mask-phone').mask('9999-9999-9999');
    });
</script>

<script>
    var site = "<?php echo site_url();?>";
    $(function(){
        $('#id_barang').autocomplete({
            serviceUrl: site+'penjualan/get_barang',
        });
    });

    //autocomplete
     var availableTags = [
        "ActionScript",
        "AppleScript",
        "Asp",
        "BASIC",
        "C",
        "C++",
        "Clojure",
        "COBOL",
        "ColdFusion",
        "Erlang",
        "Fortran",
        "Groovy",
        "Haskell",
        "Java",
        "JavaScript",
        "Lisp",
        "Perl",
        "PHP",
        "Python",
        "Ruby",
        "Scala",
        "Scheme"
    ];
    $( "#tags" ).autocomplete({
        source: availableTags
    });
</script>