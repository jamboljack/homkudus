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

<script type="text/javascript">
    $(document).ready(function () {
        $("#lstRoom").select2({});
    });
</script>

<script language="JavaScript" type="text/JavaScript">
$(document).ready(function(){
    /* Jika AutoFill di Klik */
    $('#fill').click(function(){
        $('.targetAll').val(function(){
            return $('.srcAll').val()
        })

        $('.targetRate').val(function(){
            return $('.srcRate').val()
        })

        $('.targetClose').prop('checked', function(){
            return $('.srcClose').is(':checked')
        })
    })
})
</script>


<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Rate</h4>
                <ol class="breadcrumb">
                    <li>
                        <a href="#">Rate & Allotment</a>
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title"><b><i class="fa fa-inbox"></i> Room Rate & Allotment</b></h4>
                    <p class="text-muted m-b-30 font-13">Setting Room Rate & Allotment</p>

                    <form class="form-horizontal" role="form" action="<?php echo site_url('admin/rateall/search'); ?>" method="post" enctype="multipart/form-data"> 
                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    <div class="row">
                        <div class="col-md-6">                                    
                            <div class="form-group">
                                <label class="col-md-4 control-label">Room Type *</label>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="lstRoom" id="lstRoom" required autofocus>
                                        <option value="">- Choose Room Type -</option>
                                        <?php 
                                        foreach($listRoom as $r) { 
                                        ?>
                                        <option value="<?php echo $r->room_id; ?>" <?php echo set_select('lstRoom', $r->room_id); ?>><?php echo $r->room_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-md-4 control-label">From - To *</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-daterange input-group" id="date-range">
                                            <input type="text" class="form-control" name="from" placeholder="dd-mm-yyyy" value="<?php echo set_value('from'); ?>" required />
                                            <span class="input-group-addon bg-custom b-0 text-white">to</span>
                                            <input type="text" class="form-control" name="to" placeholder="dd-mm-yyyy" value="<?php echo set_value('to'); ?>" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-custom waves-effect waves-light btn-sm"><i class="fa fa-search"></i> Search</button>

                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">                    
                    <h4 class="m-t-0 header-title"><b><i class="fa fa-search"></i> Room Rate & Allotment</b></h4>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="25%">Date</th>
                                <th width="25%">Room Type</th>
                                <th width="10%">Allotment</th>
                                <th width="15%">Rate (IDR)</th>
                                <th width="10%">Close ?</th>
                                <th width="10%">Auto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3">Fill your Rate, Allotment & Status Open/Close, then Click Auto Fill</td>
                                <td>
                                    <input type="text" class="srcAll form-control" value="<?php echo set_value('allotment', 0); ?>" name="allotment" autocomplete="off">
                                </td>                                
                                <td>
                                    <input type="text" class="srcRate form-control" value="<?php echo set_value('rate', 0); ?>" name="rate" autocomplete="off">
                                </td>
                                <td align="center">
                                    <div class="checkbox checkbox-warning">
                                        <input name="close" type="checkbox" value="1" class="srcClose">
                                        <label></label>
                                    </div>
                                </td>
                                <td>
                                    <button id="fill" class="btn btn-danger btn-custom waves-effect waves-light btn-sm">Auto Fill</button>
                                </td>
                            </tr>
                            
                            <form action="<?php echo site_url('admin/rateall/updatedata'); ?>" method="post"> 
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                            <?php
                            if ($Status == 'Cari') {
                                $no = 1;
                                foreach ($listData as $r) {
                                    $rate_id = $r->rate_id;

                                    $Tanggal = $r->rate_date;
                                    if (!empty($Tanggal)) {
                                        $xTgl   = explode("-",$Tanggal);
                                        $thn    = $xTgl[0];
                                        $bln    = $xTgl[1];
                                        $tgl    = $xTgl[2];

                                        $tanggal = $tgl.'-'.$bln.'-'.$thn;
                                    } else {
                                        $tanggal = '';
                                    }
                            ?>
                            <tr>
                                <input type="hidden" name="idrate[<?=$no;?>]" value="<?php echo $rate_id; ?>"/>
                                <td><?php echo $no; ?></td>
                                <td><?php echo getDay($r->rate_date).', '.$tanggal; ?></td>
                                <td><?php echo $r->room_name; ?></td>
                                <td>
                                    <input type="text" class="targetAll form-control" value="<?php echo $r->rate_allotment; ?>" name="allotment[<?=$no;?>]" autocomplete="off">
                                </td>                                
                                <td>
                                    <input type="text" class="targetRate form-control" value="<?php echo $r->rate_price; ?>" name="rate[<?=$no;?>]" autocomplete="off">
                                </td>
                                <td align="center">
                                    <div class="checkbox checkbox-warning">
                                        <input class="targetClose" name="check[<?=$rate_id;?>]" type="checkbox" value="1" <?php if ($r->rate_close == 1) { echo 'checked'; } ?>>
                                        <label></label>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <?php 
                                    $no++;
                                }
                            }
                            ?>
                            <tr>
                                <td colspan="7" align="center">
                                <button type="submit" class="btn btn-info btn-custom waves-effect waves-light btn-sm"><i class="fa fa-floppy-o"></i> Save Change</button>
                                <a href="<?php echo site_url('admin/rateall'); ?>" class="btn btn-warning btn-custom waves-effect waves-light btn-sm"><i class="fa fa-times"></i> Cancel</a>
                                </td>
                            </tr>
                            </form>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>