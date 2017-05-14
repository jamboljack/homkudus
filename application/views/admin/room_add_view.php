<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Room</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Room</a>
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b><i class="fa fa-plus-circle"></i> Add Data Room</b></h4>
                    <p class="text-muted m-b-30 font-13">Input Room Detail, Faciity & Room Amenities</p>
                    <p>Fields with * are required.</p>

                    <form class="form-horizontal" role="form" action="<?php echo site_url('admin/room/savedata'); ?>" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="row">
                        <div class="col-md-6">                                    
                            <div class="form-group">
                                <label class="col-md-3 control-label">Room Name *</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" value="<?php echo set_value('name'); ?>" name="name" placeholder="Input Room Name" autocomplete="off" autofocus required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Room Size *</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php echo set_value('size'); ?>" name="size" placeholder="Input Room Size" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Room Index *</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="<?php echo set_value('index', 0); ?>" name="index" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Adult</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="<?php echo set_value('adult', 0); ?>" name="adult" placeholder="Input Room Size" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Children</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" value="<?php echo set_value('child', 0); ?>" name="child" autocomplete="off">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Description</label>
                                <div class="col-md-9">
                                    <textarea class="summernote" name="desc" rows="10"><?php echo set_value('desc'); ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Change Image</label> 
                                <div class="col-md-9">
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
                                        <span>Resolution : 900 x 500 pixel (Landscape)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <?php
                            $no = 0;
                            foreach($listFacility as $f) { 
                                $facility_id = $f->facility_id;
                            ?>
                            <div class="checkbox checkbox-primary">
                                <input type="hidden" name="id[]" value="<?php echo $facility_id; ?>"/>
                                <input type="checkbox" value="1" name="check[<?=$facility_id;?>]">
                                <label ><?php echo $f->facility_name; ?></label>
                            </div> 
                            <?php 
                                $no++;
                                if ($no % 30 == 0) {
                                    echo '</div><div class="col-md-3">';
                                }
                            } 
                            ?>                                
                        </div>
                    </div> 

                    <a href="<?php echo site_url('admin/room'); ?>" class="btn btn-warning btn-custom waves-effect waves-light btn-sm"><i class="fa fa-times"></i> Cancel</a>
                    <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Save</button>

                    </form>
                </div>
            </div>
        </div>

        
    </div>
</div>