<?php
/*$this->load->library('curl');
$url = "http://api.openweathermap.org/data/2.5/forecast?id=1639215&APPID=c1ea451958c5681548913c6c10cadb82";          
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
//execute the session
$curl_response = curl_exec($curl);
//finish off the session
curl_close($curl);
$curl_jason = json_decode($curl_response, true);
print_r($curl_jason);
/*$url="http://api.openweathermap.org/data/2.5/forecast?id=524901&APPID=66eab0940d7e33246c82ba1cccf38ca0";
$json=file_get_contents($url);
$data=json_decode($json,true);
$kel=$data['main']['temp'];
$cel=$kel-273.15;
echo 'Celsious= '.$cel;
$f=((($kel*9)/5)-459.67);
echo '<br>Farenhite='.$f;
*/
$kontak = $this->menu_model->select_kontak()->row();
?>
<header id="header" class="header-v2">
    <div class="header_top">
        <div class="container">
            <div class="header_left float-left">
                <span><i class="lotus-icon-location"></i> <?php echo $kontak->contact_address; ?></span>
                <span><i class="lotus-icon-phone"></i> <?php echo $kontak->contact_phone; ?></span>
            </div>
            <div class="header_right float-right">
                <span class="login-register">
                    <a href="login.html">Login</a>
                    <a href="register.html">Register</a>
                </span>
            </div>
        </div>
    </div>    
    <div class="header_content" id="header_content">
        <div class="container">        
            <div class="header_logo">
                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo.png" alt=""></a>
            </div>
            <nav class="header_menu">
                <ul class="menu">
                    <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                    <li><a href="<?php echo site_url('room'); ?>">Rooms</a></li>
                    <li>
                        <a href="<?php echo site_url('facilities'); ?>">Facilities <span class="fa fa-caret-down"></span></a>
                        <ul class="sub-menu">
                            <?php 
                            $listFacility = $this->menu_model->select_facility()->result(); 
                            foreach($listFacility as $r) {
                            ?>
                            <li><a href="<?php echo site_url('facility/id/'.$r->facility_id.'/'.$r->facility_name_seo); ?>"><?php echo $r->facility_name; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <li><a href="<?php echo site_url('attractions'); ?>">Attractions</a></li>
                    <li><a href="<?php echo site_url('gallery'); ?>">Gallery</a></li>
                    <li><a href="<?php echo site_url('about'); ?>">About Us</a></li>
                    <li><a href="<?php echo site_url('contact'); ?>">Contact Us</a></li>
                </ul>
            </nav>        
            <span class="menu-bars">
                <span></span>
            </span>
        </div>
    </div>
</header>