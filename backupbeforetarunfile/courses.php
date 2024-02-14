 <?php

  include "header.php";
  $categorySearched = '';
  $coursenameSearched = '';
  if (isset($_GET['category'])) {
    $categorySearched = $_GET['category'];
  }
  if (isset($_GET['course'])) {
    $coursenameSearched = $_GET['course'];
  }
  ?>
 <!-- Sub Header Start -->
 <div class="page-section" style="background:#ebebeb; padding:50px 0 35px;">
   <div class="container">
     <div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="cs-page-title">
           <h1>Available Courses</h1>

         </div>
       </div>
     </div>
   </div>
 </div>
 <!-- Sub Header End -->
 <!-- Breadcrumb Start -->
 <div class="page-section" style="border-bottom:1px solid #f4f4f4;">
   <div class="container">
     <div class="row">
       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <ul class="cs-breadcrumb">
           <li><a href="/">Home</a></li>
           <li><a href="courses">Courses</a></li>
           <?php
            if ($categorySearched != '') {
            ?>
             <li><a href="#"><?php echo  $categorySearched; ?></a></li>
           <?php
            }



            ?>
           <?php
            if ($coursenameSearched != '') {
            ?>
             <li><a href="#"><?php echo  $coursenameSearched; ?></a></li>
           <?php
            }



            ?>
         </ul>
       </div>
     </div>
   </div>
 </div>
 <!-- Breadcrumb End -->
 <!-- Main Start -->
 <div class="main-section" ng-app="myApp" ng-controller="myCtrl" ng-cloak>

   <div class="page-section" id="getcartlistid" ng-click="refreshList()">
     <div class="container">
       <div class="row">
         <!-- <aside class="page-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="cs-find-search">
                    <h6>Find your course</h6>
                    <span>Ranked as one of the world's most</span>
                    <form>
                        <div class="cs-label-area">
									<input id="course-id" type="radio" name="course" />
									<label for="course-id">Course ID</label>
									<input id="course-name" type="radio" name="course" />
									<label for="course-name">Course Name</label>
								</div>
                        <div class="cs-input-area">
                            <div class="cs-input-holder"><i class="icon-search"></i><input type="text" placeholder="Enter Course name" /></div>
                            <select data-placeholder="Select Category" class="chosen-select" tabindex="5">
                                  <option>Select Category</option>
                                  <option>Select Category</option>
                                  <option>Select Category</option>
                                  <option>Select Category</option>
                              </select>
                        </div>
                        <ul class="cs-suggestions-list">
                            <li><i class="icon-keyboard_arrow_right"></i>Order your prospectus</li>
                            <li><i class="icon-keyboard_arrow_right"></i>A-Z courses</li>
                        </ul>
                        <button><i class="icon-search3"></i></button>
                    </form>
                </div>
                <div class="cs-listing-filters">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                          <h6 class="panel-title">
                            <a role="button" data-toggle="collapse"  href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                             Courses Types
                            </a>
                          </h6>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in fade" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                            <div class="cs-select-checklist">
                                <ul class="cs-checkbox-list mCustomScrollbar" data-mcs-theme="dark">
                                   <li>
                                       <div class="checkbox">
                                         <input id="checkbox" type="checkbox" value="Speed">
                                         <label for="checkbox">All Courses</label>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="checkbox">
                                         <input id="checkbox1" type="checkbox" value="bases">
                                         <label for="checkbox1">Skill Bases</label>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="checkbox">
                                         <input id="checkbox2" type="checkbox" value="Speed">
                                         <label for="checkbox2">Open Courses</label>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="checkbox">
                                         <input id="checkbox3" type="checkbox" value="Speed">
                                         <label for="checkbox3">Lectures</label>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="checkbox">
                                         <input id="checkbox4" type="checkbox" value="Speed">
                                         <label for="checkbox4">E-Courses</label>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="checkbox">
                                         <input id="checkbox5" type="checkbox" value="Speed">
                                         <label for="checkbox5">University Course</label>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="checkbox">
                                         <input id="checkbox6" type="checkbox" value="Speed">
                                         <label for="checkbox6">Programs</label>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="checkbox">
                                         <input id="checkbox7" type="checkbox" value="Speed">
                                         <label for="checkbox7">Programs</label>
                                       </div>
                                   </li>
                                   <li>
                                       <div class="checkbox">
                                         <input id="checkbox8" type="checkbox" value="Speed">
                                         <label for="checkbox8">All Courses</label>
                                       </div>
                                   </li>
                                </ul>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                          <h6 class="panel-title">
                            <a role="button" data-toggle="collapse"  href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              Pricing
                            </a>
                          </h6>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse in fade" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            <ul>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox9" type="checkbox" value="Speed">
                                     <label for="checkbox9">All Courses</label>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox10" type="checkbox" value="bases">
                                     <label for="checkbox10">Free Courses</label>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox11" type="checkbox" value="Speed">
                                     <label for="checkbox11">Courses under $50</label>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox12" type="checkbox" value="Speed">
                                     <label for="checkbox12">Courses under $100</label>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox13" type="checkbox" value="Speed">
                                     <label for="checkbox13">Courses under $150</label>
                                   </div>
                               </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                          <h6 class="panel-title">
                            <a role="button" data-toggle="collapse"  href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                              Availability
                            </a>
                          </h6>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse in fade" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                            <ul>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox14" type="checkbox" value="Speed">
                                     <label for="checkbox14">Current</label>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox15" type="checkbox" value="bases">
                                     <label for="checkbox15">Starting Soon</label>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox16" type="checkbox" value="Speed">
                                     <label for="checkbox16">Upcoming</label>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox17" type="checkbox" value="Speed">
                                     <label for="checkbox17">Self-Paced</label>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox18" type="checkbox" value="Speed">
                                     <label for="checkbox18">Archived</label>
                                   </div>
                               </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfoure">
                          <h6 class="panel-title">
                            <a role="button" data-toggle="collapse"  href="#collapsefoure" aria-expanded="false" aria-controls="collapsefoure">
                              Instructional Level
                            </a>
                          </h6>
                        </div>
                        <div id="collapsefoure" class="panel-collapse collapse in fade" role="tabpanel" aria-labelledby="headingfoure">
                          <div class="panel-body">
                            <ul>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox19" type="checkbox" value="Speed">
                                     <label for="checkbox19">Introductory</label>
                                     <span class="cs-values"><em></em><em></em><em></em></span>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox20" type="checkbox" value="bases">
                                     <label for="checkbox20">Intermediate</label>
                                     <span class="cs-values"><em></em><em></em></span>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox21" type="checkbox" value="Speed">
                                     <label for="checkbox21">Advanced</label>
                                     <span class="cs-values"><em></em></span>
                                   </div>
                               </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingfive">
                          <h6 class="panel-title">
                            <a role="button" data-toggle="collapse"  href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                             Degree level
                            </a>
                          </h6>
                        </div>
                        <div id="collapsefive" class="panel-collapse collapse in fade" role="tabpanel" aria-labelledby="headingfive">
                          <div class="panel-body">
                            <ul>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox22" type="checkbox" value="Speed">
                                     <label for="checkbox22">Introductory</label>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox23" type="checkbox" value="bases">
                                     <label for="checkbox23">Intermediate</label>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox24" type="checkbox" value="Speed">
                                     <label for="checkbox24">Advanced</label>
                                   </div>
                               </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingsix">
                          <h6 class="panel-title">
                            <a role="button" data-toggle="collapse"  href="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                              Language 
                            </a>
                          </h6>
                        </div>
                        <div id="collapsesix" class="panel-collapse collapse in fade" role="tabpanel" aria-labelledby="headingsix">
                          <div class="panel-body">
                            <ul>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox25" type="checkbox" value="Speed">
                                     <label for="checkbox25">Introductory</label>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox26" type="checkbox" value="bases">
                                     <label for="checkbox26">Intermediate</label>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox27" type="checkbox" value="Speed">
                                     <label for="checkbox27">Advanced</label>
                                   </div>
                               </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingseven">
                          <h6 class="panel-title">
                            <a role="button" data-toggle="collapse"  href="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                             Duration
                            </a>
                          </h6>
                        </div>
                        <div id="collapseseven" class="panel-collapse collapse in fade" role="tabpanel" aria-labelledby="headingseven">
                          <div class="panel-body">
                            <ul>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox28" type="checkbox" value="Speed">
                                     <label for="checkbox28">Introductory</label>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox29" type="checkbox" value="bases">
                                     <label for="checkbox29">Intermediate</label>
                                   </div>
                               </li>
                               <li>
                                   <div class="checkbox">
                                     <input id="checkbox30" type="checkbox" value="Speed">
                                     <label for="checkbox30">Advanced</label>
                                   </div>
                               </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </aside> -->
         <div class="page-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="row">
             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="cs-sorting-list">
                 <table>
                   <tr>
                     <td style="width: 45%;border:none">
                       <div class="cs-select-holder" style="width: 100%">
                         <select class="chosen-select" tabindex="5" id="categorySearched">
                           <option value="">Select Category</option>
                           <?php

                            foreach ($cuurseData as $PER) {
                              if ($PER['parent_course'] == '0') {


                            ?>
                               <option value="<?php echo  trim($PER['course_name']); ?>" <?php if ( trim($PER['course_name']) ==  trim($categorySearched)) {
                                                                                    echo "selected";
                                                                                  }  ?>><?php echo   getCoursenameAccordingToLevel($PER, $cuurseData); ?></option>
                           <?php
                              }
                            }
                            ?>
                         </select>
                     </td>
                     <td style="width: 45%;border:none">
                       <?php
                        if ($mobile) {
                        ?>
                         <input type="text" style="background-color:white;height: 40px;width: 100%" id="coursenameSearched" placeholder="Course Name" value="<?php echo $coursenameSearched; ?>">

                       <?php
                        } else {
                        ?>
                         <input type="text" style="background-color:white;height: 32px;width: 100%" id="coursenameSearched" placeholder="Course Name" value="<?php echo $coursenameSearched; ?>">

                       <?php
                        }
                        ?>


                     </td>
                     <td style="border:none">

                       <i style="cursor: pointer;margin-top:10px" class="icon-search3" ng-click=redirectToSearchCourse()></i></td>
                   </tr>
                 </table>



               </div>


             </div>
           </div>
           <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" ng-repeat="courseObj in listofSubCourse">
             <div class="cs-courses courses-grid">
               <div class="cs-media">
                 <figure><a href="coursedetails?_id={{courseObj._id}}&name={{courseObj.course_name}}"><img style="height: 272px" src="{{courseObj.serverpath+courseObj.imagepath}}" alt="" /></a></figure>
               </div>
               <div class="cs-text">

                 <div class="cs-rating">
                   <div class="cs-rating-star">
                     <span class="rating-box" style="{{courseObj.ratingstyle}};"></span>
                   </div>
                 </div>
                 <div class="cs-post-title">
                   <h5><a href="coursedetails?_id={{courseObj._id}}&name={{courseObj.course_name}}"> {{courseObj.course_name}}</a></h5>
                 </div>
                 <span class="cs-courses-price"> &#8377; {{courseObj.amount | number : 2}} <del ng-show="courseObj.pre_amount && courseObj.pre_amount>courseObj.amount"><small style="opacity:0.7">&#8377; {{courseObj.pre_amount | number : 2 }}</small></del></span>
                 <div class="cs-post-meta">
                   <span>By
                     <b class="cs-color">{{courseObj.instructor}}</b>

                   </span>
                   <i style="font-size:20px;float:right;cursor:pointer;color:green;" ng-show=" courseObj.alreadypurchased==true" title="Already Purchased" class="icon-check"></i>

                   <i style="font-size:15px;float:right;cursor:pointer" ng-show="courseObj.addedToCart==false && courseObj.alreadypurchased==false" title="Add to cart" ng-click="addtocart(courseObj)" class="icon-cart"></i>
                   <i style="font-size:15px;float:right;color:red;cursor:pointer" ng-show="courseObj.addedToCart==true && courseObj.alreadypurchased==false" ng-click="removefromcart(courseObj)" title="Remove from cart" class="icon-cart"></i>
                 </div>
               </div>
             </div>
           </div>

           <h3 align="center" ng-show="!listofSubCourse">
             <br />

             <img src="assets/the-cube-preloader.gif">
             <br />Loading Courses..
             <br /><br /><br /><br />
           </h3>
           <h3 align="center" ng-show="listofSubCourse.length==0">
             <br /><br /><br />
             No courses found, Try with another keywords !!
             <br /><br /><br /><br />
           </h3>











         </div>
       </div>
     </div>
   </div>
 </div>
 </div>
 <!-- Main End -->
 <?php

  include "footer.php";
  ?>
 <script>
   var app = angular.module('myApp', []);
   app.controller('myCtrl', ['$scope', '$http', function($scope, $http) {
     $scope.listofSubCourse = undefined;



     $scope.removefromcart = function(courseObj) {

       $http({
         method: 'GET',
         url: 'insideapi.php?sub_course_id=' + courseObj._id + '&key=removefromcart',
         data: '',
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded'
         }
       }).then(function(jsondata) {
         $scope.submiting = false;
         if (jsondata.data.status == 'FALSE') {
           $scope.toastermessage = $scope.error = jsondata.data.message;
           $scope.showtoaster('ERROR');
         } else {
           $scope.toastermessage = $scope.suc = jsondata.data.message;
           $scope.showtoaster('SUCCESS');
           courseObj.addedToCart = false;
           $scope.cartList = jsondata.data.cartList;
           $scope.already_purchased_course_id_array = jsondata.data.already_purchased_course_id_array;
           if ($scope.cartList) {
             document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
             document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;
           }

           document.getElementById("cartheaderfunctionid").click();

         }

       });
     }

     $scope.addtocart = function(courseObj) {

       $http({
         method: 'POST',
         url: 'insideapi.php',
         data: 'amount=' + courseObj.amount + '&sub_course_name=' + courseObj.course_name + '&course_id=' + courseObj.parent_course + '&sub_course_id=' + courseObj._id + '&key=addtocart',
         headers: {
           'Content-Type': 'application/x-www-form-urlencoded'
         }
       }).then(function(jsondata) {
         $scope.submiting = false;
         if (jsondata.data.status == 'FALSE') {
           $scope.toastermessage = $scope.error = jsondata.data.message;
           $scope.showtoaster('ERROR');
         } else {
           $scope.toastermessage = $scope.suc = jsondata.data.message;
           $scope.showtoaster('SUCCESS');
           courseObj.addedToCart = true;
           $scope.cartList = jsondata.data.cartList;
           $scope.already_purchased_course_id_array = jsondata.data.already_purchased_course_id_array;
           if ($scope.cartList) {
             document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
             document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;
           }
           document.getElementById("cartheaderfunctionid").click();

         }

       });
     }




     $scope.getMainCourse = function() {

       $http.get(apiurl + 'api/courses_subcourse_both').
       then(function(jsondata) {
         $scope.categorySearched = document.getElementById('categorySearched').value.trim();

        

         $scope.coursenameSearched = document.getElementById('coursenameSearched').value.trim();
         $scope.courseList = jsondata.data;
         $scope.listofSubCourse = [];
         var categorySearched_id = '';
         for (var t = 0; t < $scope.courseList.length; t++) {
           if ($scope.courseList[t].parent_course == '0') {
             if ($scope.categorySearched != undefined && $scope.categorySearched != '') {
               if ($scope.courseList[t].course_name.trim() == $scope.categorySearched) {
                 var categorySearched_id = $scope.courseList[t]._id;
               }
             }
           }


         }
    


         for (var t = 0; t < $scope.courseList.length; t++) {

           $scope.courseList[t].addedToCart = false;
           $scope.courseList[t].alreadypurchased = false;
           if ($scope.cartList) {
             for (var tx = 0; tx < $scope.cartList.length; tx++) {


               if ($scope.cartList[tx].sub_course_id == $scope.courseList[t]._id) {

                 $scope.courseList[t].addedToCart = true;
                 break;
               }



             }
           }
           if ($scope.already_purchased_course_id_array) {
             for (var tx = 0; tx < $scope.already_purchased_course_id_array.length; tx++) {


               if ($scope.already_purchased_course_id_array[tx] == $scope.courseList[t]._id) {

                 $scope.courseList[t].alreadypurchased = true;
                 break;
               }


             }

           }


           if ($scope.courseList[t].parent_course !== '0' && $scope.courseList[t].subjectstatus == 'TRUE' && $scope.courseList[t].imagepath) {

             var rr = ($scope.courseList[t].rating * 100 / 5) + "%";
             $scope.courseList[t].ratingstyle = "width:" + rr;
             if (categorySearched_id == '' || (categorySearched_id == $scope.courseList[t].parent_course)) {
               if ($scope.coursenameSearched != '' && $scope.coursenameSearched != undefined) {


                 if ($scope.courseList[t].course_name.toLowerCase().includes($scope.coursenameSearched.toLowerCase())) {
                   $scope.listofSubCourse.push($scope.courseList[t]);
                 }
               } else {
                 $scope.listofSubCourse.push($scope.courseList[t]);
               }

             }

           }

         }


       }).catch(function(jsondata) {
         console.error("error in posting");
       })

     }
     $scope.refreshList = function() {

       $scope.getCartList('refresh');


     }
     $scope.getCartList = function(type) {
       $scope.cartList = [];
       $scope.already_purchased_course_id_array = [];

       $http.get('insideapi.php?key=cartlist').
       then(function(jsondata) {
         $scope.already_purchased_course_id_array = jsondata.data.already_purchased_course_id_array;

         $scope.cartList = jsondata.data.cartList;
         if ($scope.cartList) {
           document.getElementById("cartlengthid").innerHTML = $scope.cartList.length;
           document.getElementById("cartlengthid2").innerHTML = $scope.cartList.length;
         } else {

         }

         if (type == 'initial') {


           $scope.getMainCourse();
         } else {
           for (var t = 0; t < $scope.listofSubCourse.length; t++) {
             $scope.listofSubCourse[t].addedToCart = false;
             $scope.listofSubCourse[t].alreadypurchased = false;
             for (var tx = 0; tx < $scope.cartList.length; tx++) {


               if ($scope.cartList[tx].sub_course_id == $scope.listofSubCourse[t]._id) {

                 $scope.listofSubCourse[t].addedToCart = true;
                 break;
               }




             }

             for (var tx = 0; tx < $scope.already_purchased_course_id_array.length; tx++) {


               if ($scope.already_purchased_course_id_array[tx] == $scope.listofSubCourse[t]._id) {

                 $scope.listofSubCourse[t].alreadypurchased = true;
                 break;
               }




             }
           }
         }





       }).catch(function(jsondata) {
         console.error("error in posting 1");
         console.error(jsondata);
       })

     }

     $scope.getCartList('initial');

     $scope.redirectToSearchCourse = function() {
       $scope.categorySearched = document.getElementById('categorySearched').value;
       $scope.coursenameSearched = document.getElementById('coursenameSearched').value;

       if (($scope.categorySearched != undefined && $scope.categorySearched != '') || ($scope.coursenameSearched != undefined && $scope.coursenameSearched != '')) {
         if ($scope.categorySearched != undefined && $scope.coursenameSearched != undefined && $scope.categorySearched != '' && $scope.coursenameSearched != '') {
           window.location.href = "courses?category=" + $scope.categorySearched + '&course=' + $scope.coursenameSearched;
         } else {
           if ($scope.categorySearched != '' && $scope.categorySearched != undefined) {
             window.location.href = "courses?category=" + $scope.categorySearched;
           } else {
             window.location.href = "courses?course=" + $scope.coursenameSearched;
           }
         }
       } else {
         return false;
       }
     }
     $scope.showtoaster = function(wht) {
       var x = document.getElementById("snackbar");
       x.innerHTML = $scope.toastermessage;
       x.className = "show";

       if (wht == 'SUCCESS') {
         x.style.backgroundColor = "green";
       } else if (wht == 'WARNING') {
         x.style.backgroundColor = "orange";
       } else {
         x.style.backgroundColor = "red";
       }




       setTimeout(function() {
         x.className = x.className.replace("show", "");
       }, 3000);
     }



   }]);
 </script>