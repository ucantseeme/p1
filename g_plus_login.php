<?php
session_start();

include("config/config.php");
include("config/autoload.php");
// connect to database
$db = new Db();
$db = Db::connect();
// var_dump($db);die;

########## Google Settings.Client ID, Client Secret from https://console.developers.google.com #############
$client_id = '1062390744510-ae185507cm2i8269jh6pnqpr1k22unj4.apps.googleusercontent.com';
$client_secret = '0vkGTWzlDWUFPetkhnb0WsFh';
$redirect_uri = 'http://localhost/aid77146774_checkpoint2/g_plus_login.php';

require_once "webapi/google-api-php-client-2.0.0-RC4/vendor/autoload.php";
require_once "webapi/google-api-php-client-2.0.0-RC4/src/Google/Client.php";
require_once "webapi/google-api-php-client-2.0.0-RC4/src/Google/Service/Oauth2.php";

// Create Client Request to access Google API

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

$service = new Google_Service_Oauth2($client);

//If code is empty, redirect user to google authentication page for code.
//Code is required to aquire Access Token from google
//Once we have access token, assign token to session variable
//and we can redirect user back to page and login.
if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

//if we have access_token continue, or else get login URL for user
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();
}

//Display user info or display login url as per the info we have.
echo '<div style="margin:20px">';
if (isset($authUrl)){
  // var_dump($authUrl);die;
  //show login url
  echo '<div align="center">';
  echo '<h3>Login with Google -- Demo</h3>';
  echo '<div>Please click login button to connect to Google.</div>';
  echo '<a class="login" href="' . $authUrl . '"><img src="assets/img/google-login-button.png" /></a>';
  echo '</div>';
} else {

  $user = $service->userinfo->get(); //get user info

  //check if user exist in database using COUNT
  $result = $db->query("SELECT COUNT(google_id) as usercount FROM google_users WHERE google_id=$user->id");
  $user_count = $result->fetch_object()->usercount;//will return 0 if user doesn't exist
  // var_dump($user_count);die;
  //show user picture
  echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';

  if($user_count) //if user already exist change greeting text to "Welcome Back"
  {
    echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    session_destroy();
  }
  else //else greeting text "Thanks for registering"
  {
    echo 'Hi '.$user->name.', Thanks for Registering! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
    $stmt = $db->prepare("INSERT INTO google_users (google_id, google_name, google_email, google_link, google_picture_link) VALUES (?,?,?,?,?)");
    $stmt->bind_param('issss', $user->id,  $user->name, $user->email, $user->link, $user->picture);
    $stmt->execute();
    echo $db->error;
  }

  //print user details
  echo '<pre>';
  print_r($user);
  echo '</pre>';
}
echo '</div>';

?>
