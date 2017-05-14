<footer id="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="mailchimp">
                        <h4>Social Media</h4>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="social">
                        <div class="social-content">
                            <?php
                            $social = $this->menu_model->select_social()->result();
                            foreach($social as $s) {
                            ?>
                            <a href="http://<?php echo $s->social_url; ?>" target="_blank"><i class="fa fa-<?php echo $s->social_class; ?>"></i></a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer_center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-5">
                    <div class="widget widget_logo">
                        <div class="widget-logo">
                            <div class="img">
                                <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo.png" alt=""></a>
                            </div>
                            <div class="text">
                                <?php $kontak = $this->menu_model->select_kontak()->row(); ?>
                                <p><i class="lotus-icon-location"></i> <?php echo $kontak->contact_address; ?></p>
                                <p><i class="lotus-icon-phone"></i> <?php echo $kontak->contact_phone; ?></p>
                                <p><i class="fa fa-envelope-o"></i> <a href="mailto:<?php echo $kontak->contact_email; ?>"><?php echo $kontak->contact_email; ?></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Page site</h4>
                        <ul>
                            <li><a href="#">Guest Book</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Restaurant</a></li>
                            <li><a href="#">Event</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">ABOUT</h4>
                        <ul>
                            <li><a href="">About</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="">Contact Us</a></li>
                            <li><a href="">Comming Soon</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-4 col-lg-3">
                    <div class="widget widget_tripadvisor">
                        <h4 class="widget-title">Tripadvisor</h4>
                        <div class="tripadvisor">
                        <p>Now with hotel reviews by</p>
                            <img src="images/tripadvisor.png" alt="">
                            <span class="tripadvisor-circle">
                                <i></i>
                                <i></i>
                                <i></i>
                                <i></i>
                                <i class="part"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="footer_bottom">
        <div class="container">
            <p>&copy; 2014 @HOM Kudus by Horison  - All Rights Reserved.</p>
        </div>
    </div>
</footer>