<?php
// Verify that the access token belongs to us
// The token must be url-encoded when passed to tokeninfo
$c = curl_init('https://api.amazon.com/auth/o2/tokeninfo?access_token='
. urlencode($_REQUEST['access_token']));
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$r = curl_exec($c);
curl_close($c);
$d = json_decode($r);
print_r($d);
if ($d->aud != 'amzn1.application-oa2-client.ef152a240a7741718b01300dc81d08b8') {
// the access token does not belong to us
header('HTTP/1.1 404 Not Found');
echo 'Page not found';
    echo 'https://api.amazon.com/auth/o2/tokeninfo?access_token='
. urlencode($_REQUEST['access_token']);
    var_dump($r);
exit;
}
// Exchange the access token for user profile
// The token must NOT be url-encoded when passed to profile
$c = curl_init('https://api.amazon.com/user/profile');
curl_setopt($c, CURLOPT_HTTPHEADER, array('Authorization: bearer '
. $_REQUEST['access_token']));
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$r = curl_exec($c);
curl_close($c);
$d = json_decode($r);
return sprintf('%s %s %s', $d->name, $d->email, $d->user_id);

?>