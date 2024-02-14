<!-- Footer Start -->
<footer id="footer">

<?php
if($whereiamrightnow=='OUT'  and !$mobile){
    ?>

     
<a  href="https://wa.me/+918802010213/?text=Please help me to purchase this course !">

<img src="<?php echo $server;?>whatsApp.png" style="position: fixed;
    right: 0px;
    bottom: 0;
    max-width: 10%;">
</a>
<?php

}
?>
<?php
if($whereiamrightnow=='OUT'  and $mobile){
    ?>

   
<a  href="https://wa.me/+918802010213/?text=Please help me to purchase this course !">

<img src="<?php echo $server;?>whatsApp.png" style="position: fixed;
    right: 0px;
    bottom: 0;
    max-width: 16%;">
</a>
<?php

}
?>

    <div class="cs-footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget widget-text">
                        <div class="widget-section-title">
                            <h6 style="color:#fff !important">Contact us</h6>
                        </div>
                        <ul>

                            <li>
                                <i class="icon-phone3" style="font-size:20px"></i>
                                <p><?php echo $mobileq; ?></p>
                            </li>
                            <li>
                                <i class="icon-mail" style="font-size:20px"></i>
                                <p><a href="mailto:<?php echo $emailUniversal; ?>"><?php echo $emailUniversal; ?></a></p>
                            </li>
                        </ul>
                        <br/>
                        <div class="widget-section-title">
                            <h6 style="color:#fff !important">Social Media</h6>
                        </div>
                        <ul>
                            <li>
                                <i class="icon-facebook" style="font-size:20px"></i>
                                <p><a href="https://www.facebook.com/dpathshalalive">&nbsp;Facebook</a></p>
                            </li>

                            <li>
                                <i class="icon-instagram" style="font-size:20px"></i>
                                <p><a href="https://www.instagram.com/dpathshalalive">Instagram</a></p>
                            </li>


                            <li>
                                <i class="icon-linkedin" style="font-size:20px"></i>
                                <p><a href="https://www.linkedin.com/company/dpathshalalive">Linkedin</a></p>
                            </li>

                            <li>
                                <i class="icon-twitter" style="font-size:20px"></i>
                                <p><a href="https://twitter.com/dpathshalalive">Twitter</a></p>
                            </li>






                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget widget-useful-links">
                        <div class="widget-section-title">
                            <h6 style="color:#fff !important">Useful links</h6>
                        </div>
                        <ul>

                            <li><a href="<?php echo $server;?>about-us">About</a></li>
                           
                            <li><a href="<?php echo $server;?>faqs">FAQs</a></li>


                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget widget-useful-links">
                        <div class="widget-section-title">
                            <h6 style="color:#fff !important">Useful links</h6>
                        </div>
                        <ul>


                            <li><a href="<?php echo $server;?>affiliatelogin">Affiliate Program</a></li>
                            <li><a href="<?php echo $server;?>Terms-of-Use">Term of use</a></li>
                            <li><a href="<?php echo $server;?>Terms-and-Conditions">Terms and Conditions</a></li>
                            <li><a href="<?php echo $server;?>Privacy-Policy">Privacy Policy</a></li>

                            <li><a href="<?php echo $server;?>sitemap">Site Map</a></li>
                            <li><a href="<?php echo $server;?>courses">Courses</a></li>

                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget widget-useful-links">
                        <div class="widget-section-title">
                            <h6 style="color:#fff !important">Course Categories</h6>
                        </div>
                        <ul>
                            <?php

                            foreach ($cuurseData as $PER) {
                                if ($PER['parent_course'] == '0' and $PER['upper_level_id'] == '') {


                            ?>
                                    <li> <a href="<?php echo $server;?>courses?category=<?php echo $PER['course_name']; ?>"><?php echo   getCoursenameAccordingToLevel($PER, $cuurseData); ?></a> </li>
                            <?php
                                }
                            }
                            ?>


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-footer-logo-holder center">
                    <div class="cs-footer-nav">
                        <div class="cs-logo">
                            <div class="cs-media">
                                <figure>
                                    <a href="/"><img src="<?php echo $server;?>assets/images/footer-logo.png" style="width: 250px" alt="" /></a>
                                </figure>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cs-copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="copyright-text">
                        <p>© 2020 <a class="cs-color" href="/"><?php echo $website; ?></a>. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="cs-social-media">
                        <ul>


                            <li> <a href="https://www.facebook.com/dpathshalalive" class="pl-0 pr-3"><span class="icon-facebook"></span></a></li>

                            <li> <a href="https://www.instagram.com/dpathshalalive/" class="pl-3 pr-3"><span class="icon-instagram"></span></a></li>
                            <li> <a href="https://www.linkedin.com/company/dpathshalalive" class="pl-3 pr-3"><span class="icon-linkedin"></span></a> </li>
                            <li> <a href="https://www.twitter.com/dpathshalalive" class="pl-3 pr-3"><span class="icon-twitter"></span></a> </li>





                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


</footer>
<!-- Footer End -->
</div>
<div id="snackbar"  ></div>


</div>
<div id="snackbarM"  ></div>
<div id="snackbarM2"  ></div>



</div>

<?php
                          if ($mobile) {
                          ?>
<input type="hidden" id="ismobile" value="YES">

                         <?php
                          } else {
                          ?>
<input type="hidden" id="ismobile" value="NO">

                         <?php
                          }
                          ?>

<script src="<?php echo $server;?>assets/scripts/responsive.menu.js"></script> <!-- Slick Nav js -->
<script src="<?php echo $server;?>assets/scripts/chosen.select.js"></script> <!-- Chosen js -->
<script src="<?php echo $server;?>assets/scripts/slick.js"></script> <!-- Slick Slider js -->
<script src="<?php echo $server;?>assets/scripts/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="<?php echo $server;?>assets/scripts/jquery.mobile-menu.min.js"></script><!-- Side Menu js -->
<script src="<?php echo $server;?>assets/scripts/counter.js"></script><!-- Counter js -->

<!-- Put all Functions in functions.js -->
<script src="<?php echo $server;?>assets/scripts/functions.js"></script>


</body>

<!-- Mirrored from chimpgroup.com/themeforest/smart-study/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Apr 2020 15:24:47 GMT -->

</html>