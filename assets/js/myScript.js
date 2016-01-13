$(document).ready(function(){
  // Check if username is already regetered in database
  $("#uname").keyup(function(){
    // alert("keyup");
    var username = $("#uname").val();
    // alert(username);
    $.ajax({
      url:"http://localhost/aid77146774_checkpoint2/webapi/checkunameapi.php?u="+username,
      type:"GET",
      success:function(result){
        if(result == "exists"){
          $("#userexists").html("Username already exists.");
          $(".register").prop('disabled', true); // disable button
          // alert("ajax success = exists");
        }else{
          $("#userexists").html("");
        }
      },
      error:function(result){
      }
    })
  });

  // keyups functions for checking password match
  $("#password1").keyup(validate);
  $("#password2").keyup(validate);
  $("#password2").keydown(removeValidate);
  $("#name1").mousedown(removeValidate);
  $("#user_captcha").keyup(checkCaptcha);

  // Initialize WYSIWYG editor for message/textare of contact section
  $('#summernote').summernote({
    height: 120,                 // set editor height
    minHeight: null,             // set minimum height of editor
    maxHeight: null,             // set maximum height of editor
    focus: true                  // set focus to editable area after initializing summernote
  });

  // Select JSON or XML to view data by id/name/author in json or xmal format
  $('select[name=bookby]').change(function(e){
    if ($('select[name=bookby]').val() == 'id'){
      $('#book_by_id').show();
    }else{
      $('#book_by_id').hide();
    }
    if ($('select[name=bookby]').val() == 'name'){
      $('#book_by_name').show();
    }else{
      $('#book_by_name').hide();
    }
    if ($('select[name=bookby]').val() == 'author'){
      $('#book_by_author').show();
    }else{
      $('#book_by_author').hide();
    }
    if ($('select[name=bookby]').val() == 'nameauthor'){
      $('#book_by_name').show();
      $('#book_by_author').show();
    }
  });

  $('#searchForm').submit(function(event) {
    // Stop form from submitting normally
    event.preventDefault();

    var $bookid = $('#book_by_id').val();
    var $bookname = $('#book_by_name').val();
    var $bookauthor = $('#book_by_author').val();
    var $dataFormat = $('#dataFormat').val();
    // alert("0 " + $bookid + "1 " + $bookname + "2 " + $bookauthor + "3 " + $dataFormat);

    // http://localhost/aid77146774_checkpoint2/webapi/json.php
    // ?data_format=xml&author=randy%20blythe&name=Dark%20Days:%20A%20Memoir

    // $.ajax({
    //   type: "GET",
    //   url: "http://localhost/aid77146774_checkpoint2/webapi/json.php?data_format="+$dataFormat,
    //   data: {},
    //   dataType:'json',
    //   success:function(data){
    //     console.log(data);
    //     $("#testtest").append(data);
    //   }
    //
    // });

    if($dataFormat=="xml" && $bookid == "" && $bookname == "" && $bookauthor == ""){
      window.open("http://localhost/aid77146774_checkpoint2/webapi/jsonxml.php?data_format=xml",'_blank');
    }else if($dataFormat=="json"  && $bookid == "" && $bookname == "" && $bookauthor == ""){
      window.open("http://localhost/aid77146774_checkpoint2/webapi/jsonxml.php?data_format=json",'_blank');
    }else if($bookid != "" && $dataFormat=="xml"){
      window.open("http://localhost/aid77146774_checkpoint2/webapi/jsonxml.php?data_format=xml&id="+$bookid,'_blank');
    }else if($bookname != "" && $dataFormat=="xml" && $bookauthor == ""){
      window.open("http://localhost/aid77146774_checkpoint2/webapi/jsonxml.php?data_format=xml&name="+$bookname,'_blank');
    }else if($bookauthor != "" && $dataFormat=="xml" && $bookname == ""){
      window.open("http://localhost/aid77146774_checkpoint2/webapi/jsonxml.php?data_format=xml&author="+$bookauthor,'_blank');
    }else if($bookname != "" && $bookauthor != "" && $dataFormat=="xml"){
      window.open("http://localhost/aid77146774_checkpoint2/webapi/jsonxml.php?data_format=xml&author="+$bookauthor+"&name="+$bookname,'_blank');
    }else if($bookid != "" && $dataFormat=="json"){
      window.open("http://localhost/aid77146774_checkpoint2/webapi/jsonxml.php?data_format=json&id="+$bookid,'_blank');
    }else if($bookname != "" && $dataFormat=="json"  && $bookauthor == ""){
      window.open("http://localhost/aid77146774_checkpoint2/webapi/jsonxml.php?data_format=json&name="+$bookname,'_blank');
    }else if($bookauthor != "" && $dataFormat=="json"  && $bookname == ""){
      window.open("http://localhost/aid77146774_checkpoint2/webapi/jsonxml.php?data_format=json&author="+$bookauthor,'_blank');
    }else if($bookname != "" && $bookauthor != "" && $dataFormat=="json"){
      window.open("http://localhost/aid77146774_checkpoint2/webapi/jsonxml.php?data_format=json&author="+$bookauthor+"&name="+$bookname,'_blank');
    }

  });
})

// Check if password and confirm password is matching or not
function validate() {
  var password1 = $("#password1").val();
  var password2 = $("#password2").val();

  if(password1 == password2) {
    $("#validate-status").html('Valid Passwords').css('color', 'green');
    $(".register").prop('disabled', false); // enable button
  }else{
    $("#validate-status").html("Passwords not matching.").css('color', 'red');
    $(".register").prop('disabled', true); // disable button
  }
}

function removeValidate(){
  var password1 = $("#password1").val();
  var password2 = $("#password2").val();

  if(password1 == password2) {
    $("#validate-status").html('');
  }
}
var captacha_sum = $("#captacha_sum").val();
function checkCaptcha(){

  var user_entered_sum = $("#user_captcha").val();
  // alert(captacha_sum + "  " + user_entered_sum);
  if(captacha_sum == user_entered_sum){
    $("#captcha_result").html("Correct!").css("color", "green");
    $(".register").prop('disabled', false); // enable button
  }else{
    $("#captcha_result").html("Wrong! Please enter correct value.").css("color", "red");
    $(".register").prop('disabled', true); // disable button
  }
}

// For google map integration in about section
function displayMap() {
  // document.getElementById('map').style.display="block";
  // document.getElementById('showmap').style.display="none";
  // document.getElementById('hidemap').style.display="block";
  $("#map").css('display', 'block');
  $("#showmap").hide();
  $("#hidemap").css('display', 'block');
  initialize();
}

function hideMap() {
  // document.getElementById('map').style.display="none";
  // document.getElementById('showmap').style.display="block";
  // document.getElementById('hidemap').style.display="none";
  $("#map").hide();
  $("#showmap").css('display', 'block');
  $("#hidemap").hide();
  $("#clearmarker").hide();
}

function clearMarker(){
  // Clears markers made by user clicks
  $("#showmap").hide();
  initialize();
}

function initialize() {
  var map = new google.maps.Map(document.getElementById('map'), {
    // Adding google map controls
    zoom: 12,
    center: {lat: 27.692134027, lng: 85.3195180},
    mapTypeControl: true,
    mapTypeControlOptions: {
      style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
      position: google.maps.ControlPosition.TOP_CENTER
    },
    zoomControl: true,
    zoomControlOptions: {
      position: google.maps.ControlPosition.LEFT_CENTER
    },
    scaleControl: true,
    streetViewControl: true,
    streetViewControlOptions: {
      position: google.maps.ControlPosition.LEFT_TOP
    }
  });

  // Adds an event listener for the map
  map.addListener('click', function(e) {
    placeMarkerAndPanTo(e.latLng, map);
  });
}

// Creates a marker when the user clicks on the map at the clicked location
function placeMarkerAndPanTo(latLng, map) {
  var marker = new google.maps.Marker({
    position: latLng,
    map: map
  });
  map.panTo(latLng);
  // Display Clear Marker Instances button
  $("#clearmarker").css('display', 'block');
}

google.maps.event.addDomListener(window, 'load', initialize);
// Remove click listeners from map instance.
google.maps.event.clearListeners(map, 'click');
// End of google map integration

// Angular js script
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $http){
  var books = [];

  $scope.refreshData = function(){
    // $http.get("http://192.168.1.4/class/jsonapi.php")
    $http.get("http://localhost/aid77146774_checkpoint2/webapi/bookapi.php")
    .then(function(response){
      console.log(response);
      books = response.data;
      console.log(books);
      $scope.books = books;
    });
  }

  // $http.get("http://192.168.1.4/class/jsonapi.php")
  $http.get("http://localhost/aid77146774_checkpoint2/webapi/bookapi.php")
  .then(function(response){
    console.log(response);
    books = response.data;
    console.log(books);
    $scope.books = books;
  });

  $scope.testData = "testing";
  $scope.clickMe = function(){
    alert("hey there!");
  }

  $scope.deleteBook = function(book){
    // console.log(book.id);

    $("#row-"+book.id).remove();

    // $http.get("http://192.168.1.4/class/apiController.php?id="+book.id)
    $http.get("http://localhost/aid77146774_checkpoint2/webapi/api_controller.php?action=delete&id="+book.id)
    .then(function(response){
      console.log(response);
    });
  }

  $scope.insertData = function(){
    $http.post("http://localhost/aid77146774_checkpoint2/webapi/api_controller.php?action=insert",
    {'bookname':$scope.book.nametitle, 'bookauthor':$scope.book.author})
    .success(function(data, status, headers, config){
      console.log("Values inserted to book");
      $("#successinsert").html("<i class='fa fa-check'></i> Inserted Successfully!").css('color', 'green').fadeOut(6000);
    });
  }
});
// End of angular js script

//Google custom search integration
(function() {
  var cx = '006631932180415859341:sb5ynuf8tt4';
  var gcse = document.createElement('script');
  gcse.type = 'text/javascript';
  gcse.async = true;
  gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
  '//cse.google.com/cse.js?cx=' + cx;
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(gcse, s);
})();
// End of Google custom search integration

//For weather api extract
jQuery(document).ready(function($) {
  $(".getWeather").click(function(e){
    e.preventDefault();
    var localplace = $("#category option:selected").val();
    $.ajax({
      url : "http://api.wunderground.com/api/ea4f2541fea9888e/geolookup/conditions/forecast/q/NEPAL/"+localplace+".json",
      dataType : "json",
      success : function(parsed_json) {
        var location = parsed_json['location']['city'];
        var lat = parsed_json['location']['lat'];
        var lan = parsed_json['location']['lon'];
        var temp_f = parsed_json['current_observation']['temp_f'];
        var temp_c = parsed_json['current_observation']['temp_c'];
        var wind_string = parsed_json['current_observation']['wind_string'];
        var icon_url = parsed_json.forecast.txt_forecast.forecastday[1].icon_url;
        var title = parsed_json.forecast.txt_forecast.forecastday[1].title;
        var fcttext_metric = parsed_json.forecast.txt_forecast.forecastday[1].fcttext_metric;
        // console.log(test);
        $(".weather-data ").show('slow');
        var html = "Current Temprature in " + location + " is: " + temp_f + "F / " + temp_c + "C <br/>Latitude: " + lat + "<br />Longitude " + lan + "<br /> Wind Condition: " + wind_string + " <br /><img src='" + icon_url + "' /><br />" + title + "<br />" + fcttext_metric;
        $(".temperature-data").html(html);
        // alert("Current temperature in " + location + " is: " + temp_f);
      }
    });
  });
  $("#reset").click(function(){
    $("#category").val("Select location");
    $(".weather-data").css('display', 'none');
  });
});
// End of weather api extract

// jQuery slider initialize
$(function($) {
  $('.slider').sss({
    slideShow : true, // Set to false to prevent SSS from automatically animating.
    startOn : 0, // Slide to display first. Uses array notation (0 = first slide).
    transition : 400, // Length (in milliseconds) of the fade transition.
    speed : 3500, // Slideshow speed in milliseconds.
    showNav : true // Set to false to hide navigation arrows.
  });
});
