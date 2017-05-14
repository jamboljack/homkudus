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
        $(document).on("click",'.edit_social', function(e) {
            var id          = $(this).data('id');
            var name        = $(this).data('name');
            var kelas       = $(this).data('class');
            var url         = $(this).data('url');
            $(".social_id").val(id);
            $(".social_name").val(name);
            $(".social_class").val(kelas);
            $(".social_url").val(url);
        })
    });
</script>

<script>
    function hapusDataSocial(social_id) {
        var id = social_id;
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
            window.location.href="<?php echo site_url('admin/hotel/deletedatasocial'); ?>"+"/"+id
        });
    }
</script>

<div id="adddata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Data Social Media</h4> 
            </div>
            
            <form action="<?php echo site_url('admin/hotel/savedatasocial'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-body">
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Social Media Name</label> 
                            <input type="text" class="form-control" placeholder="Input Social Media Name" name="name" required> 
                        </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Social Media Class</label> 
                            <select class="form-control" name="lstClass" required>
                                <option value="">- Choose Class -</option>
                                <option value="fa fa-facebook">Facebook</option>
                                <option value="fa fa-twitter">Twitter</option>
                                <option value="fa fa-pinterest">Path</option>
                                <option value="fa fa-instagram">Instagram</option>
                                <option value="fa fa-google-plus">Google Plus</option>
                            </select>
                        </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">URL</label> 
                            <input type="text" class="form-control" placeholder="Input URL" name="url" required> 
                        </div> 
                    </div> 
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button> 
                    <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Save</button> 
                </div> 
            </div>
            </form>

        </div>
    </div>
</div>

<div id="editdatasocial" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Data Social Media</h4> 
            </div>
            
            <form action="<?php echo site_url('admin/hotel/updatedatasocial'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <input type="hidden" class="form-control social_id" name="id">

            <div class="modal-body">
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Social Media Name</label> 
                            <input type="text" class="form-control social_name" placeholder="Input Social Media Name" name="name" required> 
                        </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Social Media Class</label> 
                            <select class="form-control social_class" name="lstClass" required>
                                <option value="">- Choose Class -</option>
                                <option value="fa fa-facebook">Facebook</option>
                                <option value="fa fa-twitter">Twitter</option>
                                <option value="fa fa-pinterest">Path</option>
                                <option value="fa fa-instagram">Instagram</option>
                                <option value="fa fa-google-plus">Google Plus</option>
                            </select>
                        </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">URL</label> 
                            <input type="text" class="form-control social_url" placeholder="Input URL" name="url" required> 
                        </div> 
                    </div> 
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button> 
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
                <h4 class="page-title">Hotel</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Hotel</a>
                    </li>
                    <li class="active">
                        Manage Hotel
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12"> 
                <ul class="nav nav-tabs tabs">
                    <li class="active tab">
                        <a href="#hotel-info" data-toggle="tab" aria-expanded="false"> 
                            <span class="visible-xs"><i class="fa fa-home"></i></span> 
                            <span class="hidden-xs">Hotel Information</span> 
                        </a> 
                    </li> 
                    <li class="tab"> 
                        <a href="#additional" data-toggle="tab" aria-expanded="false"> 
                            <span class="visible-xs"><i class="fa fa-user"></i></span> 
                            <span class="hidden-xs">Additional Information</span> 
                        </a> 
                    </li> 
                    <li class="tab"> 
                        <a href="#social-media" data-toggle="tab" aria-expanded="true"> 
                            <span class="visible-xs"><i class="fa fa-envelope-o"></i></span> 
                            <span class="hidden-xs">Social Media</span> 
                        </a> 
                    </li> 
                    <li class="tab"> 
                        <a href="#tripadvisor" data-toggle="tab" aria-expanded="false"> 
                            <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                            <span class="hidden-xs">TripAdvisor Widget</span> 
                        </a> 
                    </li> 
                    <li class="tab"> 
                        <a href="#hotel-facility" data-toggle="tab" aria-expanded="false"> 
                            <span class="visible-xs"><i class="fa fa-cog"></i></span> 
                            <span class="hidden-xs">Hotel Facility</span> 
                        </a> 
                    </li> 
                </ul> 
                <div class="tab-content"> 
                    <div class="tab-pane active" id="hotel-info"> 
                        <form class="form-horizontal" role="form" action="<?php echo site_url('admin/hotel/updatedatahotel'); ?>" method="post"> 
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <p>Fields with * are required.</p>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Hotel Name *</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="<?php echo $detail->contact_name; ?>" name="name" placeholder="Input Hotel Name" autocomplete="off" autofocus required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Star Rating *</label>
                                                <div class="col-md-5">
                                                    <input type="number" class="form-control" value="<?php echo $detail->contact_star; ?>" name="star"autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Address *</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="<?php echo $detail->contact_address; ?>" name="address" placeholder="Input Address" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">City *</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="<?php echo $detail->contact_city; ?>" name="city" placeholder="Input City" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">ZIP Code *</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="<?php echo $detail->contact_zipcode; ?>" name="zipcode" placeholder="Input ZIP Code" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Phone *</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="<?php echo $detail->contact_phone; ?>" name="phone" placeholder="Input Phone" autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Fax *</label>
                                                <div class="col-md-9">
                                                        <input type="text" class="form-control" value="<?php echo $detail->contact_fax; ?>" name="fax" placeholder="Input Fax" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Email *</label>
                                                <div class="col-md-9">
                                                    <input type="email" class="form-control" value="<?php echo $detail->contact_email; ?>" name="email" placeholder="Input Email" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Website *</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="<?php echo $detail->contact_web; ?>" name="website" placeholder="Input Website" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Room *</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="<?php echo $detail->contact_room; ?>" name="room" placeholder="Input Room Inventory" autocomplete="off" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Tax & Service</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="lstTax" required>
                                                        <option value="">- Choose One -</option>
                                                        <option value="I" <?php if ($detail->contact_tax=='I') { echo 'selected'; } ?>>Include Tax & Service</option>
                                                        <option value="E" <?php if ($detail->contact_tax=='E') { echo 'selected'; } ?>>Exclude Tax & Service</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Max Stay</label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" value="<?php echo $detail->contact_maxstay; ?>" name="maxstay" placeholder="Input Max Stay (Days)" autocomplete="off" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <div class="row">                                    
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">Description *</label>
                                                <div class="col-md-10">
                                                    <textarea class="summernote" name="desc" rows="10"><?php echo $detail->contact_desc; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Submit</button> 
                        
                        </form>
                    </div> 
                    <div class="tab-pane" id="additional">
                        <form class="form-inline" role="form" action="<?php echo site_url('admin/hotel/updatedataadditional'); ?>" method="post"> 
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <p>About Stay</p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="checkbox checkbox-primary">
                                                    <input type="checkbox" value="1" name="chkLate" <?php if ($detail->contact_late_ci==1) { echo 'checked'; } ?>>
                                                    <label >Late Check-In</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox checkbox-primary">
                                                    <input type="checkbox" value="1" name="chkTransport" <?php if ($detail->contact_transport==1) { echo 'checked'; } ?>>
                                                    <label >Airport Transfer</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox checkbox-primary">
                                                    <input type="checkbox" value="1" name="chkSmooking" <?php if ($detail->contact_smooking==1) { echo 'checked'; } ?>>
                                                    <label >Smooking</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="checkbox checkbox-primary">
                                                    <input type="checkbox" value="1" name="chkNonSmooking" <?php if ($detail->contact_nonsmooking==1) { echo 'checked'; } ?>>
                                                    <label >Non Smooking</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Submit</button> 

                        </form>
                    </div> 
                    <div class="tab-pane" id="social-media">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <button type="button" class="btn btn-primary btn-custom waves-effect waves-light btn-sm" data-toggle="modal" data-target="#adddata"><i class="fa fa-plus-circle"></i> Add Data</button>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-striped m-0">
                                                <thead>
                                                    <tr>
                                                        <th width="5%">No</th>
                                                        <th>Social Media Name</th>
                                                        <th>Social Media Class</th>
                                                        <th>URL</th>
                                                        <th width="15%">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach($listSocial as $r) {
                                                        $social_id = $r->social_id;
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $no; ?></th>
                                                        <td><?php echo $r->social_name; ?></td>
                                                        <td><?php echo $r->social_class; ?></td>
                                                        <td><?php echo $r->social_url; ?></td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-xs edit_social" data-toggle="modal" data-target="#editdatasocial" data-id="<?php echo $r->social_id; ?>" data-name="<?php echo $r->social_name; ?>" data-class="<?php echo $r->social_class; ?>" data-url="<?php echo $r->social_url; ?>" title="Edit Data"><i class="icon-pencil"></i> Edit
                                                            </button>
                                                            <a onclick="hapusDataSocial(<?php echo $social_id; ?>)">
                                                                <button class="btn btn-danger btn-custom waves-effect waves-light btn-xs" title="Delete Data"><i class="icon-trash"></i> Delete</button>
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
                    </div>
                    <div class="tab-pane" id="tripadvisor">
                        <form class="form-horizontal" role="form" action="<?php echo site_url('admin/hotel/updatedatatripadvisor'); ?>" method="post"> 
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">
                                    <p>Short Script TripAdvisor</p>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <textarea class="form-control" rows="10" name="tripdesc"><?php echo $detail->contact_tripadvisor; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Submit</button> 

                        </form>  
                    </div>
                    <div class="tab-pane" id="hotel-facility">
                        <form class="form-horizontal" role="form" action="<?php echo site_url('admin/hotel/updatedatafacility'); ?>" method="post"> 
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                        <div class="row">
                            <div class="col-sm-12">
                                <p>Facilities</p>
                                <div class="card-box">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <?php 
                                            $no = 0;
                                            foreach($listFacility as $f) { 
                                                $facility_id = $f->facility_id;
                                            ?>
                                                <div class="checkbox checkbox-primary">
                                                    <input type="hidden" name="id[]" value="<?php echo $facility_id; ?>"/>
                                                    <input type="checkbox" value="1" name="check[<?=$facility_id;?>]" <?php if ($f->facility_check == 1) { echo 'checked'; } ?>>
                                                    <label ><?php echo $f->facility_name; ?></label>
                                                </div>                                            
                                            <?php
                                                $no++;

                                                if ($no % 20 == 0) {
                                                    echo '</div><div class="col-md-3">';
                                                }
                                            }  
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Submit</button> 

                        </form>
                    </div> 
                </div> 
            </div>
        </div>
        
    </div>
</div>