<aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
  <div class="widget cs-widget-links">
    <ul>
      <li ng-click="filtercategory('ALL')"  ng-style="categorysearchedfilter=='' && {'color':'#227ebb'} || {'color': ''}">ALL</li>
      <li ng-repeat="obj in  listofcategory" ng-style="categorysearchedfilter==obj.course_name && {'color':'#227ebb'} || {'color': ''}" ng-click="filtercategory(obj._id,obj.course_name)">{{obj.course_name}}</li>

    </ul>
  </div>
  <!-- <div class="widget cs-text-widget">
              <div class="cs-text">
                <h5>CAN'T FIND WHAT YOU'RE LOOKING FOR?</h5>
                <p>Try our extensive database of FAQs or submit your own question...</p>
                <a class="cs-bgcolor" href="#">ASK A QUESTION</a> </div>
            </div> -->
</aside>