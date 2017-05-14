<!-- Notifikasi -->
<?php
if ($this->session->flashdata('notification')) { ?>
<script>
    swal({
        title: "Done",
        text: "<?php echo $this->session->flashdata('notification'); ?>",
        timer: 2000,
        showConfirmButton: false,
        type: 'success'
    });
</script>
<? } ?>
<!-- Edit Data -->
<script type="text/javascript">
    $(function() {
        $(document).on("click",'.edit_button', function(e) {
            var id          = $(this).data('id');
            var type        = $(this).data('type');
            var name        = $(this).data('name');
            var desc        = $(this).data('desc');
            var price       = $(this).data('price');
            var pricedisc   = $(this).data('pricedisc');
            var disc        = $(this).data('disc');
            $(".restaurant_id").val(id);
            $(".type_id").val(type);
            $(".restaurant_name").val(name);
            $(".restaurant_desc").val(desc);
            $(".restaurant_price").val(price);
            $(".restaurant_pricedisc").val(pricedisc);
            $(".restaurant_disc").val(disc);
        })
    });
</script>
<!-- Hapus Data -->
<script>
    function hapusData(restaurant_id) {
        var id = restaurant_id;
        swal({
            title: 'Are You Sure ?',
            text: 'This Data will be Deleted !',type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            closeOnConfirm: true
        }, function() {
            window.location.href="<?php echo site_url('admin/restaurant/deletedata'); ?>"+"/"+id
        });
    }
</script>

<div id="adddata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Data Restaurant Menu</h4> 
            </div>
            
            <form action="<?php echo site_url('admin/restaurant/savedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-body">
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Type</label> 
                            <select class="form-control" name="lstType" required>
                                <option value="">- Choose Type -</option>
                                <?php foreach($listType as $t) { ?>
                                <option value="<?php echo $t->type_id; ?>"><?php echo $t->type_name; ?></option>
                                <?php } ?>
                            </select>
                        </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Menu Name</label> 
                            <input type="text" class="form-control" placeholder="Input Menu Name" name="name" autocomplete="off" required> 
                        </div> 
                    </div> 
                </div>                
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Description</label> 
                            <textarea class="form-control" name="desc" autocomplete="off" required></textarea>
                        </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label class="control-label">Price (Default/IDR)</label> 
                            <input type="text" value="<?php echo set_value('price',0); ?>" class="form-control" name="price" autocomplete="off" required> 
                        </div> 
                    </div>
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label class="control-label">Price (Disc/IDR)</label> 
                            <input type="text" value="<?php echo set_value('pricedisc',0); ?>" class="form-control" name="pricedisc" autocomplete="off"> 
                        </div> 
                    </div>
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label class="control-label">Discount (%)</label> 
                            <input type="text" class="form-control" placeholder="Ex. 20%" name="disc" autocomplete="off">
                        </div> 
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="control-label">Change Image</label> 
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="<?php echo base_url(); ?>img/noimage.png" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                <div>
                                    <span class="btn btn-blue btn-file">
                                    <span class="fileupload-new"><i class="icon-paper-clip"></i> Browse</span>
                                    <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                        <input type="file" class="default" name="userfile" />
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix margin-top-10">
                                <span class="label label-danger">NOTE !</span>
                                <span>Resolution : 270 x 190 pixel (Landscape)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-warning btn-custom waves-effect btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button> 
                    <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Save</button> 
                </div> 
            </div>
            </form>

        </div>
    </div>
</div>

<div id="editdata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Data Restaurant Menu</h4> 
            </div>
            
            <form action="<?php echo site_url('admin/restaurant/updatedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <input type="hidden" class="form-control restaurant_id" name="id">

            <div class="modal-body">
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Type</label> 
                            <select class="form-control type_id" name="lstType" required>
                                <option value="">- Choose Type -</option>
                                <?php foreach($listType as $t) { ?>
                                <option value="<?php echo $t->type_id; ?>"><?php echo $t->type_name; ?></option>
                                <?php } ?>
                            </select>
                        </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Menu Name</label> 
                            <input type="text" class="form-control restaurant_name" placeholder="Input Menu Name" name="name" autocomplete="off" required> 
                        </div> 
                    </div> 
                </div>                
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Description</label> 
                            <textarea class="form-control restaurant_desc" name="desc" autocomplete="off" required></textarea>
                        </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label class="control-label">Price (Default/IDR)</label> 
                            <input type="text" value="<?php echo set_value('price',0); ?>" class="form-control restaurant_price" name="price" autocomplete="off" required> 
                        </div> 
                    </div>
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label class="control-label">Price (Disc/IDR)</label> 
                            <input type="text" value="<?php echo set_value('pricedisc',0); ?>" class="form-control restaurant_pricedisc" name="pricedisc" autocomplete="off"> 
                        </div> 
                    </div>
                    <div class="col-md-4"> 
                        <div class="form-group"> 
                            <label class="control-label">Discount (%)</label> 
                            <input type="text" class="form-control restaurant_disc" placeholder="Ex. 20%" name="disc" autocomplete="off">
                        </div> 
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-12"> 
                        <div class="form-group">
                            <label class="control-label">Change Image</label> 
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img src="<?php echo base_url(); ?>img/noimage.png" alt="" />
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                <div>
                                    <span class="btn btn-blue btn-file">
                                    <span class="fileupload-new"><i class="icon-paper-clip"></i> Browse</span>
                                    <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                        <input type="file" class="default" name="userfile" />
                                    </span>
                                </div>
                            </div>
                            <div class="clearfix margin-top-10">
                                <span class="label label-danger">NOTE !</span>
                                <span>Resolution : 270 x 190 pixel (Landscape)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-warning btn-custom waves-effect btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button> 
                    <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Update</button> 
                </div> 
            </div>
            </form>

        </div>
    </div>
</div>

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Content Web</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Content Web</a>
                    </li>
                    <li class="active">
                        Restaurant Menu
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title"><b>Restaurant Menu List</b></h4>
                    <p>Restaurant Menu List</p>
                    <button type="button" class="btn btn-primary btn-custom waves-effect waves-light btn-sm" data-toggle="modal" data-target="#adddata"><i class="fa fa-plus-circle"></i> Add Data</button>
                    <br><br>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Menu Name</th>
                                <th width="10%">Type</th>
                                <th width="10%">Price</th>
                                <th width="10%">Disc</th>
                                <th width="20%">Image</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($listData as $r) {
                                $restaurant_id = $r->restaurant_id;
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $r->restaurant_name; ?></td>
                                <td><?php echo $r->type_name; ?></td>
                                <td><?php echo number_format($r->restaurant_price_insert, 0, '.', ','); ?></td>
                                <td><?php echo $r->restaurant_disc; ?></td>
                                <td>
                                    <img src="<?php echo base_url(); ?>img/restaurant_image/<?php echo $r->restaurant_image; ?>" width="100%">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-xs edit_button" data-toggle="modal" data-target="#editdata" data-id="<?php echo $r->restaurant_id; ?>" data-type="<?php echo $r->type_id; ?>" data-name="<?php echo $r->restaurant_name; ?>" data-desc="<?php echo $r->restaurant_desc; ?>" data-price="<?php echo $r->restaurant_price_insert; ?>" data-pricedisc="<?php echo $r->restaurant_price_delete; ?>" data-disc="<?php echo $r->restaurant_disc; ?>" title="Edit Data"><i class="icon-pencil"></i> Edit
                                    </button>
                                    <a onclick="hapusData(<?php echo $restaurant_id; ?>)"><button class="btn btn-danger btn-custom waves-effect waves-light btn-xs" title="Delete Data"><i class="icon-trash"></i> Delete</button>
                                    </a>
                                </td>
                            </tr>
                            <?php
                                $no++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>