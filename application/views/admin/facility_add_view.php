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
                        Facility
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b><i class="fa fa-plus-circle"></i> Add Data Facility</b></h4>
                    <p class="text-muted m-b-30 font-13">Input Facility</p>
                    <p>Fields with * are required.</p>

                    <form class="form-horizontal" role="form" action="<?php echo site_url('admin/facility/savedata'); ?>" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="row">
                        <div class="col-md-12">                                    
                            <div class="form-group">
                                <label class="col-md-3 control-label">Facility Name *</label>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="<?php echo set_value('name'); ?>" name="name" placeholder="Input Facility Name" autocomplete="off" autofocus required>
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
                                        <span>Resolution : 770 x 420 pixel (Landscape)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <a href="<?php echo site_url('admin/facility'); ?>" class="btn btn-warning btn-custom waves-effect waves-light btn-sm"><i class="fa fa-times"></i> Cancel</a>
                    <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Save</button>

                    </form>
                </div>
            </div>
        </div>

        
    </div>
</div>