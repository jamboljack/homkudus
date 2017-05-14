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
<!-- Hapus Data -->
<script>
    function hapusData(room_id) {
        var id = room_id;
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
            window.location.href="<?php echo site_url('admin/room/deletedata'); ?>"+"/"+id
        });
    }
</script>

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
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title"><b>Room List</b></h4>
                    <p>Room Detail List</p>
                    <a href="<?php echo site_url('admin/room/adddata'); ?>">
                        <button type="button" class="btn btn-primary btn-custom waves-effect waves-light btn-sm"><i class="fa fa-plus-circle"></i> Add Data</button>
                    </a>
                    <br><br>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Room</th>
                                <th width="30%">Description</th>
                                <th width="5%">Index</th>
                                <th width="5%">Adult</th>
                                <th width="5%">Children</th>
                                <th width="5%">Image</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach($listData as $r) {
                                $room_id    = $r->room_id;
                                $kata       = $r->room_desc;
                                $kata       = word_limiter($kata, 20);
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $r->room_name; ?></td>
                                <td><?php echo $kata; ?></td>
                                <td><?php echo $r->room_index; ?></td>
                                <td><?php echo $r->room_adult; ?></td>
                                <td><?php echo $r->room_child; ?></td>
                                <td>
                                    <a href="<?php echo site_url('admin/room/listimage').'/'.$room_id; ?>">
                                        <button type="button" class="btn btn-info btn-custom waves-effect waves-light btn-xs" title="Edit Data"><i class="icon-list"></i></button>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('admin/room/editdata').'/'.$room_id; ?>">
                                        <button type="button" class="btn btn-warning btn-custom waves-effect waves-light btn-xs" title="Edit Data"><i class="icon-pencil"></i> Edit
                                        </button>
                                    </a>
                                    <a onclick="hapusData(<?php echo $room_id; ?>)">
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