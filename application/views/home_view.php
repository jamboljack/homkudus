<section class="section-slider">
    <h1 class="element-invisible">Slider</h1>
    <div id="slider-revolution">
        <ul>
            <?php 
            $slider = $this->home_model->select_slider()->result();
            $no  = 1;
            foreach($slider as $s) {
                if ($no % 2 == 0) {
                    $transisi = 'boxslide';
                } else {
                    $transisi = 'curtain-1';
                }
            ?>
            <li data-transition="<?php echo $transisi; ?>">
                <img src="<?php echo base_url(); ?>img/slider_image/<?php echo $s->slider_image; ?>" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">
                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="100" data-speed="700" data-start="1500" data-easing="easeOutBack">
                </div>
                <!--<div class="tp-caption sfb fadeout slider-caption slider-caption-sub-1" data-x="center" data-y="280" data-speed="700" data-easing="easeOutBack"  data-start="2000"><?php // echo $s->slider_title; ?></div>-->
            </li>
            <?php $no++; } ?> 
        </ul>
    </div>
</section>
<!-- CHECK AVAILABILITY -->
<!--<section class="section-check-availability">
    <div class="container">
        <div class="check-availability">
            <div class="row">
                <div class="col-lg-3">
                    <h2>ROOMS & RATES</h2>
                </div>
                <div class="col-lg-9">
                    <div class="availability-form">
                        <form action="" method="post">
                            <input type="text" class="awe-calendar from" placeholder="Arrival Date">
                            <input type="text" class="awe-calendar to" placeholder="Departure Date">
                            <select class="awe-select">
                                <option value="">Nights</option>
                                <option value="1">1 Night</option>
                                <option value="2">2 Night</option>
                                <option value="3">3 Night</option>
                                <option value="4">4 Night</option>
                                <option value="5">5 Night</option>
                            </select>
                            <div class="vailability-submit">
                                <button class="awe-btn awe-btn-13">BOOK NOW</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- END / CHECK AVAILABILITY -->

<!-- ROOM & SUITES -->
<section class="section-accommo_1 bg-white">
    <div class="container">
        <div class="accomd-modations_1">
            <h2 class="heading">ROOMS & SUITE</h2>
            <div class="accomd-modations-content_1" >
                <div class="accomd-modations-slide_1" >
                    <?php  
                    foreach($listRoom as $r) {
                    ?>
                    <div class="accomd-modations-room_1">                            
                        <div class="img">
                            <a href="<?php echo site_url('room/id/'.$r->room_id.'/'.$r->room_name_seo); ?>"><img src="<?php echo base_url();  ?>img/room_image/<?php echo $r->room_image; ?>" alt=""></a>
                        </div>                        
                        <div class="text">
                            <h2><a href="#"><?php echo $r->room_name; ?></a></h2>
                            <?php echo $r->room_desc; ?>
                            <div class="wrap-price">
                                <p class="price"></p>
                                <a href="#" class="awe-btn awe-btn-default">VIEW DETAIL</a>
                            </div>
                        </div>                            
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ROOMS & RATES --> 

<!-- ABOUT -->
<section class="section-home-about bg-white">
    <div class="container">
        <div class="home-about">
            <div class="row">
                <div class="col-md-6">
                    <div class="img">
                        <a href="#"><img src="images/home/about/img-1.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text">
                        <h2 class="heading">ABOUT US</h2>
                        <span class="box-border"></span>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source</p>
                        <a href="#" class="awe-btn awe-btn-default">READ MORE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END / ABOUT -->

<!-- FACILITIES -->
<section class="section-accomd awe-parallax bg-14">
    <div class="container">
        <div class="accomd-modations">
            <div class="row">
                <div class="col-md-12">
                    <div class="accomd-modations_1">
                        <h2 class="heading">OUR FACILITIES</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="accomd-modations-content owl-single">
                        <div class="row">
                            <?php  
                            foreach($listFacility as $f) {
                            ?>
                            <div class="col-xs-4">
                                <div class="accomd-modations-room">
                                    <div class="img">
                                        <a href="#"><img src="<?php echo base_url();  ?>img/facility_image/<?php echo $f->facility_image; ?>" alt=""></a>
                                    </div>
                                    <div class="text">
                                        <h2><a href="#"><?php echo $f->facility_name; ?></a></h2>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END FACILITIES -->