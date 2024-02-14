<!-- Footer Start -->
<footer id="footer">
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
                                <i class="icon-light-bulb "></i>
                                <p>6330 South 3000 East, Suite 700 Salt Lake City, UT 84121</p>
                            </li>
                            <li>
                                <i class="icon-phone3"></i>
                                <p>800 123 456 789</p>
                            </li>
                            <li>
                                <i class="icon-mail"></i>
                                <p><a href="mailto:info@canvaslms.com">info@canvaslms.com</a></p>
                            </li>
                            <li>
                                <i class="icon-pin"></i>
                                <p>08:00 to 07:40</p>
                            </li>
                            

                          
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget widget-categores">
                        <div class="widget-section-title">
                            <h6 style="color:#fff !important">Student & Staff</h6>
                        </div>
                        <ul>
                            <li><a href="#">Student portal</a></li>
                            <li><a href="#">Staff portal</a></li>
                            <li><a href="#">Find a member of staff</a></li>
                            <li><a href="#">Greenwich VIP</a></li>
                            <li><a href="#">IT & library services</a></li>
                            <li><a href="#">Greenwich Connect</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="widget widget-useful-links">
                        <div class="widget-section-title">
                            <h6 style="color:#fff !important">Useful links</h6>
                        </div>
                        <ul>
                            <li><a href="#">Accessibility</a></li>
                            <li><a href="#">Privacy and cookies</a></li>
                            <li><a href="#">Freedom of Information</a></li>
                            <li><a href="#">Legal information</a></li>
                            <li><a href="#">Terms & conditions</a></li>
                            <li><a href="#">Copyright</a></li>
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
    if ($PER['parent_course'] == '0' and $PER['upper_level_id']=='') {


?>
     <li>    <a href="courses?category=<?php echo $PER['course_name']; ?>"><?php echo   getCoursenameAccordingToLevel($PER, $cuurseData); ?></a> </li>
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
                                    <a href="/"><img src="assets/images/footer-logo.png" style="width: 250px" alt="" /></a>
                                </figure>
                            </div>
                        </div>
                        <div class="footer-nav">
                            <ul>
                                <li><a href="about-us">About</a></li>
                                <li><a href="#"> Teach on D pathshala</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Blog</a></li> <li><a href="#">Help</a></li>
                                <li><a href="#">Affiliate Program</a></li>
                                <li><a href="#">Terms</a></li>
                                <li><a href="#">Priva policycy</a></li>
                                <li><a href="sitemap">Site Map</a></li>
                                <li><a href="courses">Courses</a></li>
                            </ul>
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
                        <p>© 2020 <a class="cs-color" href="/"><?php echo $website;?></a>. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="cs-social-media">
                        <ul>
                            

                            <li>         <a href="https://www.facebook.com/dpathshalalive" class="pl-0 pr-3"><span class="icon-facebook"></span></a></li>
                          
                            <li>   <a href="https://www.instagram.com/dpathshalalive/" class="pl-3 pr-3"><span class="icon-instagram"></span></a></li>
                            <li>   <a href="https://www.linkedin.com/company/dpathshalalive" class="pl-3 pr-3"><span class="icon-linkedin"></span></a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


</footer>
<!-- Footer End -->
</div>
<div id="snackbar"></div>


</div>
 
<script src="assets/scripts/responsive.menu.js"></script> <!-- Slick Nav js -->
<script src="assets/scripts/chosen.select.js"></script> <!-- Chosen js -->
<script src="assets/scripts/slick.js"></script> <!-- Slick Slider js -->
<script src="assets/scripts/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/scripts/jquery.mobile-menu.min.js"></script><!-- Side Menu js -->
<script src="assets/scripts/counter.js"></script><!-- Counter js -->

<!-- Put all Functions in functions.js -->
<script src="assets/scripts/functions.js"></script>


</body>

<!-- Mirrored from chimpgroup.com/themeforest/smart-study/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 01 Apr 2020 15:24:47 GMT -->

</html>

