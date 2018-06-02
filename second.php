
<?php
 session_start();
require_once("twitteroauth/twitteroauth.php"); //Path to twitteroauth library
 


$consumerkey = "CPqSm2uqyLJJ3IzuIFEGwtlnL";
$consumersecret = "6qPrdGuKRSwabNbSZjczdncp3bqht8zKXGziqedKxqgX4kIYIc";
$accesstoken = "3179275620-eXRotFalJIUeQ4pAtyaXLnsDlGWLjn1NJrmqL2m";
$accesstokensecret = "hKUimj72qFiVnNWN7RoEQvpSqJK4pPgmXdTzjxPDsJF0D";
 
function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
  $connection = new TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
  return $connection;
}
 $value1 = $_POST['value'];
 $value2 = $_POST['value4'];
 
$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
$tweets = $connection->get("https://api.twitter.com/1.1/search/tweets.json?q=&geocode=28.619570,77.088104,1.6km&lang=en&result_type=recent");
 
$json = json_encode($tweets);
$pl=json_decode($json,true);

$ar1 =array();
$ar2 =array();
$t=0;
for($i=0;$i<7;$i++)
{
if($pl['statuses'][$i]['geo']!== null)
 { $lati =  $pl['statuses'][$i]['geo']['coordinates'][0];
 $long =  $pl['statuses'][$i]['geo']['coordinates'][1];
  $mar[$t] = $pl['statuses'][$i]['user']['name'];
  $mark[$t] =$pl['statuses'][$i]['text'];
   echo $mar[$t];
  $ar1[$t] = $lati;
  $ar2[$t] = $long;
  $t++;
  }
 }

?>
<script>
var users = <?php echo json_encode($ar1); ?>;
var u = <?php echo json_encode($t);?>;
for (var u in users) 
{
   console.log(users[u]);
   }
</script>