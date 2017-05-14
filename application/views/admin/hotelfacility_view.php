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
            var id      = $(this).data('id');
            var name    = $(this).data('name');
            var kelas    = $(this).data('class');
            $(".facility_id").val(id);
            $(".facility_name").val(name);
            $(".facility_class").val(kelas);
        })
    });
</script>
<!-- Hapus Data -->
<script>
    function hapusData(facility_id) {
        var id = facility_id;
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
            window.location.href="<?php echo site_url('admin/hotelfacility/deletedata'); ?>"+"/"+id
        });
    }
</script>

<div id="adddata" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title"><i class="fa fa-plus-circle"></i> Add Data Hotel Facility</h4> 
            </div>
            
            <form action="<?php echo site_url('admin/hotelfacility/savedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <div class="modal-body">
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Facility Name</label> 
                            <input type="text" class="form-control" placeholder="Input Facility Name" name="name" autocomplete="off" required> 
                        </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Facility Class</label> 
                            <input type="text" class="form-control" placeholder="input Facility Class" name="class" autocomplete="off"> 
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
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Data Hotel Facility</h4> 
            </div>
            
            <form action="<?php echo site_url('admin/hotelfacility/updatedata'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
            <input type="hidden" class="form-control facility_id" name="id">

            <div class="modal-body">
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Facility Name</label> 
                            <input type="text" class="form-control facility_name" placeholder="Facility Name" name="name" autocomplete="off" required> 
                        </div> 
                    </div> 
                </div>
                <div class="row"> 
                    <div class="col-md-12"> 
                        <div class="form-group"> 
                            <label class="control-label">Facility Class</label> 
                            <input type="text" class="form-control facility_class" placeholder="Facility Class" name="class" autocomplete="off"> 
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
                <h4 class="page-title">Hotel</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Hotel</a>
                    </li>
                    <li class="active">
                        Master Hotel Facility
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title"><b>Hotel Facility List</b></h4>
                    <p>Master Hotel Facility</p>
                    <button type="button" class="btn btn-primary btn-custom waves-effect waves-light btn-sm" data-toggle="modal" data-target="#adddata"><i class="fa fa-plus-circle"></i> Add Data</button>
                    <br><br>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Facility Name</th>
                                <th>Facility Class</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($listData as $r) {
                                $facility_id = $r->facility_id;
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $r->facility_name; ?></td>
                                <td><i class="<?php echo $r->facility_class; ?>"></i></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-xs edit_button" data-toggle="modal" data-target="#editdata" data-id="<?php echo $r->facility_id; ?>" data-name="<?php echo $r->facility_name; ?>" data-class="<?php echo $r->facility_class; ?>" title="Edit Data"><i class="icon-pencil"></i> Edit
                                    </button>
                                    <a onclick="hapusData(<?php echo $facility_id; ?>)"><button class="btn btn-danger btn-custom waves-effect waves-light btn-xs" title="Delete Data"><i class="icon-trash"></i> Delete</button>
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