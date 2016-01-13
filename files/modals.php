<div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true"
ng-app="myApp" ng-controller="myCtrl" >
<div class="modal-content">
  <div class="close-modal" data-dismiss="modal">
    <div class="lr">
      <div class="rl">
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-lg-offset-2">
        <div class="modal-body">
          <h2>Angular JS</h2>
          <hr class="star-primary">
          <p>Below is a simple example showing the use of angular js to fetch the data from MySql database. The data is fetched from database then converted into json data and finally fetched through the help of angular js in view page.</p>
          <hr />
          <center>
            <p>Data fetched from MySql database. You can reload the inserted data without refresh the whole page again and again.</p>
            <div style="border: 1px solid gray;">
              <!-- <button ng-click="clickMe()">Just do it</button> -->
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Book ID</th>
                    <th>Book name</th>
                    <th>Book author</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="row-{{book.id}}" ng-repeat="book in books">
                    <td>{{book.id}}</td>
                    <td>{{book.name}}</td>
                    <td>{{book.author}}</td>
                    <td><button ng-click="deleteBook(book)" id="delete"><i class="fa fa-times"></i> Delete</button></td>
                  </tr>
                </tbody>
              </table>

              <button type="button" class="btn btn-primary" ng-click="refreshData()"><i class="fa fa-refresh"></i> Reload*</button>
              <p>
                *Reload data without refreshing the whole page.
              </p>
            </div>
            <hr />
            <p>Insert Data to MySql database using Angular JS - Also has angular js form validation rule</p>
            <div style="border: 1px solid gray;">
              <form name="frm" novalidate>
                <div class="form-group"> <br />
                  <label for="name" class="control-label">Book Name</label>
                  <input type="text" class="form-control" name="bookname" placeholder="Enter book name" ng-model="book.nametitle" required>
                  <!-- <p class="help-block" ng-show="frm.bookname.$error.required">Required!</p> -->
                  <label for="name" class="control-label">Book Author</label>
                  <input type="text" class="form-control" name="bookauthor" placeholder="Enter book author's name" ng-model="book.author" required>
                  <br />
                  <button type="button" class="btn btn-primary" name="button" id="insert" ng-disabled="frm.$invalid" ng-click="insertData()"><i class="fa fa-database"></i> Insert</button>
                  <p class="help-block" id="successinsert"></p>
                  <p>You can check if the values were inserted in above example.</p>
                </div>
              </form>
            </div>
          </center>
          <br />
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-content">
    <div class="close-modal" data-dismiss="modal">
      <div class="lr">
        <div class="rl">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
          <div class="modal-body">
            <h2>HTML5 and CSS3</h2>
            <hr class="star-primary">
            <img src="assets/img/skills/html5-css3.png" class="img-responsive img-centered" alt="">
            <p>This website uses all the CSS3 properties and it's features. </a>
              <p>HTML5 video is so much popular nowadays, almost every website are trying to approach HTML5 video for better rendering and buffering of videos. Below is some examples of HTML5 new elements.</p>
              <video width="320" height="240" controls>
                <source src="http://www.sample-videos.com/video/mp4/720/big_buck_bunny_720p_1mb.mp4" type="video/mp4">
                  Your browser does not support the video tag.
                </video>
                <!-- HTML5 geolocation api -->
                <hr />
                <p>HTML5 geolocation API</p>

                <button type="button" class="btn btn-primary" onclick="getLocation()">Get Coordinates</button>
                <p>Click the button to get your coordinates.</p>
                <p id="geo"></p>

                <script>
                var x = document.getElementById("geo");

                function getLocation() {
                  if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                  } else {
                    x.innerHTML = "Geolocation is not supported by this browser.";
                  }
                }

                function showPosition(position) {
                  x.innerHTML = "Latitude: " + position.coords.latitude +
                  "<br>Longitude: " + position.coords.longitude;
                }

                function showError(error) {
                  switch(error.code) {
                    case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation."
                    break;
                    case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable."
                    break;
                    case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out."
                    break;
                    case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred."
                    break;
                  }
                }
                </script>
                <!-- End of HTML5 geolocation api -->
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl">
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="modal-body">
                <h2>jQuery</h2>
                <hr class="star-primary">
                <!-- <img src="assets/img/skills/jquery.jpg" class="img-responsive img-centered" alt=""> -->

                <p>
                  Using simple jQuery image slider.
                </p>
                <div class="slider">
                  <img src="assets/img/slide/cat1.jpg" class="img-responsive img-centered" alt="Cats!">
                  <img src="assets/img/slide/cat2.jpg" class="img-responsive img-centered" alt="Cats!">
                  <img src="assets/img/slide/cat3.jpg" class="img-responsive img-centered" alt="Cats!">
                  <img src="assets/img/slide/cat4.jpg" class="img-responsive img-centered" alt="Cats!">
                  <img src="assets/img/slide/cat5.jpg" class="img-responsive img-centered" alt=">:)">
                  <img src="assets/img/slide/cat6.jpg" class="img-responsive img-centered" alt="Cats!">
                </div>
                <hr>
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl">
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="modal-body">
                <h2>Web Service (Weather API Demo)</h2>
                <hr class="star-primary">
                <!-- <img src="assets/img/skills/mobile.png" class="img-responsive img-centered" alt=""> -->
                <p>
                  Extrat weather information for the selected location from <a href="https://wunderground.com">wunderground</a> using weather api provided by the site itself.
                </p>
                <div class="form-group">
                  <label for="sel1">Places list:</label>
                  <select class="form-control"  name="category" id="category">
                    <option value="Kathmandu">Kathmandu</option>
                    <option value="Lalitpur">Lalitpur</option>
                    <option value="Bhaktapur">Bhaktapur</option>
                  </select>
                </div>

                <div class="panel panel-primary weather-data 12u$(xsmall)" style="display: none;">
                  <div class="panel-heading">Weather information of selected location</div>
                  <div class="panel-body temperature-data button fit small"></div>
                </div>
                <p>
                  <button type="button" class="btn btn-primary getWeather"><i class="fa fa-sun-o"></i> Get Weather Info</button>
                  <button type="button" class="btn btn-primary" id="reset"><i class="fa fa-refresh"></i> Reset</button>
                </p>
                <hr />
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl">
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="modal-body">
                <h2>Google OAuth Login Demo</h2>
                <hr class="star-primary">
                <!-- <img src="assets/img/skills/safe.png" class="img-responsive img-centered" alt=""> -->
                <p>
                  You can try this Google OAuth Login API integration by logging in with you google account. It easy and secure at the same time.
                </p>
                <a href="http://localhost/aid77146774_checkpoint2/g_plus_login.php">Login with google</a>
                <hr />
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl">
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <div class="modal-body">
                <h2>Rest Web Service - JSON/XML - Dynamic Interaction </h2>
                <hr class="star-primary">
                <form action="" name="searchForm" id="searchForm" novalidate>
                  <div class="form-group">
                    <label for="sel1">View book by:</label>
                    <select class="form-control"  name="bookby" id="category" required>
                      <option value = "">-- Select an Option --</option>
                      <option value="id">Book Id</option>
                      <option value="name">Book Name</option>
                      <option value="author">Book Author</option>
                      <option value="nameauthor">Book Name and Author</option>
                      <option value="allbooks">Every Books</option>
                    </select>
                  </div>

                  <input type="text" class="form-control" placeholder="Enter book id" id="book_by_id" name="book_by_id" required data-validation-required-message="Please enter book id.">
                  <p class="help-block text-danger"></p>

                  <input type="text" class="form-control" placeholder="Enter Book Name" id="book_by_name" name="book_by_name" required data-validation-required-message="Please enter book name.">
                  <p class="help-block text-danger"></p>

                  <input type="text" class="form-control" placeholder="Enter Book Author" id="book_by_author" name="book_by_author" required data-validation-required-message="Please enter book author.">
                  <p class="help-block text-danger"></p>

                  <input type="text" class="form-control" placeholder="Enter Book Name and Author" id="book_by_name_author" name="book_by_author" required data-validation-required-message="Please enter book name and it's author.">
                  <p class="help-block text-danger"></p>


                  <div class="form-group">
                    <label for="sel1">Select data encoding type:</label>
                    <select class="form-control"  name="xmlorjson" id="dataFormat" required>
                      <option value = "">-- Select an Option --</option>
                      <option value="xml">XML</option>
                      <option value="json">JSON</option>
                    </select>
                  </div>
                  <input type="submit" class="btn btn-primary" value="Search" id="searchBook">
                </form>
                <div id="dataOutput"></div>
                <div id="testtest" name="testtest"></div>
                <hr />
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
