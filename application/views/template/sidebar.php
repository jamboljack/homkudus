<?php 
$uri = $this->uri->segment(2);

if ($uri == 'home') {
    $dashboard      = 'active';
    $hot            = '';
    $hotelfacility  = '';
    $roomfacility   = '';
    $hotel          = '';
    $room           = '';
    $rate           = '';
    $rateall        = '';
    $content        = '';
    $slider         = '';
    $type           = '';
    $restaurant     = '';
    $facility       = '';
    $users          = '';
} elseif ($uri == 'hotelfacility') {
    $dashboard      = '';
    $hot            = 'active subdrop';
    $hotelfacility  = 'active';
    $roomfacility   = '';
    $hotel          = '';
    $room           = '';
    $rate           = '';
    $rateall        = '';
    $content        = '';
    $slider         = '';
    $type           = '';
    $restaurant     = '';
    $facility       = '';
    $users          = '';
} elseif ($uri == 'roomfacility') {
    $dashboard      = '';
    $hot            = 'active subdrop';
    $hotelfacility  = '';
    $roomfacility   = 'active';
    $hotel          = '';
    $room           = '';
    $rate           = '';
    $rateall        = '';
    $content        = '';
    $slider         = '';
    $type           = '';
    $restaurant     = '';
    $facility       = '';
    $users          = '';
} elseif ($uri == 'hotel') {
    $dashboard      = '';
    $hot            = 'active subdrop';
    $hotelfacility  = '';
    $roomfacility   = '';
    $hotel          = 'active';
    $room           = '';
    $rate           = '';
    $rateall        = '';
    $content        = '';
    $slider         = '';
    $type           = '';
    $restaurant     = '';
    $facility       = '';
    $users          = '';
} elseif ($uri == 'room') {
    $dashboard      = '';
    $hot            = '';
    $hotelfacility  = '';
    $roomfacility   = '';
    $hotel          = '';
    $room           = 'active';
    $rate           = '';
    $rateall        = '';
    $content        = '';
    $slider         = '';
    $type           = '';
    $restaurant     = '';
    $facility       = '';
    $users          = '';
} elseif ($uri == 'rateall') {
    $dashboard      = '';
    $hot            = '';
    $hotelfacility  = '';
    $roomfacility   = '';
    $hotel          = '';
    $room           = '';
    $rate           = 'active subdrop';
    $rateall        = 'active';
    $content        = '';
    $slider         = '';
    $type           = '';
    $restaurant     = '';
    $facility       = '';
    $users          = '';
} elseif ($uri == 'slider') {
    $dashboard      = '';
    $hot            = '';
    $hotelfacility  = '';
    $roomfacility   = '';
    $hotel          = '';
    $room           = '';
    $rate           = '';
    $rateall        = '';
    $content        = 'active subdrop';
    $slider         = 'active';
    $type           = '';
    $restaurant     = '';
    $facility       = '';
    $users          = '';
} elseif ($uri == 'type') {
    $dashboard      = '';
    $hot            = '';
    $hotelfacility  = '';
    $roomfacility   = '';
    $hotel          = '';
    $room           = '';
    $rate           = '';
    $rateall        = '';
    $content        = 'active subdrop';
    $slider         = '';
    $type           = 'active';
    $restaurant     = '';
    $facility       = '';
    $users          = '';
} elseif ($uri == 'restaurant') {
    $dashboard      = '';
    $hot            = '';
    $hotelfacility  = '';
    $roomfacility   = '';
    $hotel          = '';
    $room           = '';
    $rate           = '';
    $rateall        = '';
    $content        = 'active subdrop';
    $slider         = '';
    $type           = '';
    $restaurant     = 'active';
    $facility       = '';
    $users          = '';
} elseif ($uri == 'facility') {
    $dashboard      = '';
    $hot            = '';
    $hotelfacility  = '';
    $roomfacility   = '';
    $hotel          = '';
    $room           = '';
    $rate           = '';
    $rateall        = '';
    $content        = 'active subdrop';
    $slider         = '';
    $type           = '';
    $restaurant     = '';
    $facility       = 'active';
    $users          = '';
} elseif ($uri == 'users') {
    $dashboard      = '';
    $hot            = '';
    $hotelfacility  = '';
    $roomfacility   = '';
    $hotel          = '';
    $room           = '';
    $rate           = '';
    $rateall        = '';
    $content        = '';
    $slider         = '';
    $type           = '';
    $restaurant     = '';
    $facility       = '';
    $users          = 'active';
} else {
    $dashboard      = 'active';
    $hot            = '';
    $hotelfacility  = '';
    $roomfacility   = '';
    $hotel          = '';
    $room           = '';
    $rate           = '';
    $rateall        = '';
    $content        = '';
    $slider         = '';
    $type           = '';
    $restaurant     = '';
    $facility       = '';
    $users          = '';
}
?>
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div id="sidebar-menu">
            <ul>
                <li class="text-muted menu-title">Navigation</li>
                <li>
                    <a href="<?php echo base_url(); ?>" class="waves-effect <?php echo $dashboard; ?>"><i class="ti-home"></i> <span> Dashboard </span></a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?php echo $hot; ?>"><i class="fa fa-building"></i> <span> Hotel </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li class="<?php echo $hotelfacility; ?>"><a href="<?php echo site_url('admin/hotelfacility'); ?>">Master Hotel Facility</a></li>
                        <li class="<?php echo $roomfacility; ?>"><a href="<?php echo site_url('admin/roomfacility'); ?>">Master Room Facility</a></li>
                        <li class="<?php echo $hotel; ?>"><a href="<?php echo site_url('admin/hotel'); ?>">Manage Hotel</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/room'); ?>" class="waves-effect <?php echo $room ?>"><i class="md-account-balance"></i> <span> Room </span></a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?php echo $rate; ?>"><i class="fa fa-inbox"></i> <span> Rate </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li class="<?php echo $rateall; ?>"><a href="<?php echo site_url('admin/rateall'); ?>">Rate & Allotment</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?php echo $content; ?>"><i class="fa fa-at"></i> <span> Content Web </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li class="<?php echo $slider; ?>"><a href="<?php echo site_url('admin/slider'); ?>">Slider Image</a></li>
                        <li class="<?php echo $type; ?>"><a href="<?php echo site_url('admin/type'); ?>">Menu Type</a></li>
                        <li class="<?php echo $restaurant; ?>"><a href="<?php echo site_url('admin/restaurant'); ?>">Restaurant Menu</a></li>
                        <li class="<?php echo $facility; ?>"><a href="<?php echo site_url('admin/facility'); ?>">Facility</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('admin/users'); ?>" class="waves-effect <?php echo $users; ?>"><i class="fa fa-users"></i> <span> Users </span></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>