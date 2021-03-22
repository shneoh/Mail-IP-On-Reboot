<?PHP

function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}

if(isset($_GET['verified2021'])){
    $user_ip = getUserIP();

    echo $user_ip; // Output IP address [Ex: 177.87.193.134]
}

if(isset($_GET['verified2021']) && isset($_GET['ip'])){
    $msg = "Current IP: " . $_GET['ip'];
    mail('my_email@address.com','Title: ECS-Reboot',$msg);
    //echo "DONE";
}

?>
