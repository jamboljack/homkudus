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
            var username    = $(this).data('username');
            var name        = $(this).data('name');
            var dept        = $(this).data('dept');
            var email        = $(this).data('email');
            $(".user_username").val(username);
            $(".user_name").val(name);
            $(".user_dept").val(dept);
            $(".user_email").val(email);
        })
    });
</script>

<div id="adddata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Data User</h4> 
            </div>
            
            <form action="<?php echo site_url('admin/users/savedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-body">
                <div class="row"> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label class="control-label">Username</label> 
                            <input type="text" class="form-control" placeholder="Input Username" name="username" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Jangan Pakai Spasi." autocomplete="off" required> 
                        </div> 
                    </div> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label class="control-label">Password</label> 
                            <input type="password" class="form-control" placeholder="Input Password" name="password" autocomplete="off" required>
                        </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label class="control-label">Name</label> 
                            <input type="text" class="form-control" placeholder="Input Name" name="name" autocomplete="off" required>
                        </div> 
                    </div> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label class="control-label">Department</label> 
                            <input type="text" class="form-control" placeholder="Input Department" name="dept" autocomplete="off" required>
                        </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label class="control-label">Email</label> 
                            <input type="email" class="form-control" placeholder="Input Email" name="email" autocomplete="off" required>
                        </div> 
                    </div> 
                    <div class="col-md-6"> 
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
                                <span>Resolution : 200 x 200 pixel (Landscape)</span>
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
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Data Slider</h4> 
            </div>
            
            <form action="<?php echo site_url('admin/users/updatedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <input type="hidden" class="form-control user_username" name="id">

            <div class="modal-body">
                <div class="row"> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label class="control-label">Username</label> 
                            <input type="text" class="form-control user_username" placeholder="Input Username" name="username" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="Jangan Pakai Spasi." autocomplete="off" readonly> 
                        </div> 
                    </div> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label class="control-label">Password</label> 
                            <input type="password" class="form-control" placeholder="Input Password" name="password" autocomplete="off">
                        </div>
                        <span class="help-block"><small>Input if Password Change.</small></span>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label class="control-label">Name</label> 
                            <input type="text" class="form-control user_name" placeholder="Input Name" name="name" autocomplete="off" required>
                        </div> 
                    </div> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label class="control-label">Department</label> 
                            <input type="text" class="form-control user_dept" placeholder="Input Department" name="dept" autocomplete="off" required>
                        </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-6"> 
                        <div class="form-group"> 
                            <label class="control-label">Email</label> 
                            <input type="email" class="form-control user_email" placeholder="Input Email" name="email" autocomplete="off" required>
                        </div> 
                    </div> 
                    <div class="col-md-6"> 
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
                                <span>Resolution : 200 x 200 pixel (Landscape)</span>
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
                <h4 class="page-title">Users</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Users</a>
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title"><b>Users List</b></h4>
                    <p>Users List</p>
                    <button type="button" class="btn btn-primary btn-custom waves-effect waves-light btn-sm" data-toggle="modal" data-target="#adddata"><i class="fa fa-plus-circle"></i> Add Data</button>
                    <br><br>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Username</th>
                                <th>Name</th>
                                <th width="15%">Department</th>
                                <th width="15%">Email</th>
                                <th width="10%">Avatar</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($listData as $r) {
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $r->user_username; ?></td>
                                <td><?php echo $r->user_name; ?></td>
                                <td><?php echo $r->user_dept; ?></td>
                                <td><?php echo $r->user_email; ?></td>
                                <td>
                                    <?php 
                                    if (empty($r->user_avatar)) {
                                    ?>
                                    <img src="<?php echo base_url(); ?>img/avatar.png" width="50%">
                                    <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>img/avatar/<?php echo $r->user_avatar; ?>" width="50%">
                                    <?php } ?>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-xs edit_button" data-toggle="modal" data-target="#editdata" data-username="<?php echo $r->user_username; ?>" data-name="<?php echo $r->user_name; ?>" data-dept="<?php echo $r->user_dept; ?>" data-email="<?php echo $r->user_email; ?>" title="Edit Data"><i class="icon-pencil"></i> Edit
                                    </button>
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