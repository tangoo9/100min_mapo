<?php
$con=mysqli_connect("db", "mcc", "mxptmxm!", "mcc");  //DB연결
date_default_timezone_set('Asia/Seoul');
mysqli_query($con, "set session character_set_connection=utf8;");
mysqli_query($con, "set session character_set_results=utf8;");
mysqli_query($con, "set session character_set_client=utf8;");
error_reporting(E_ERROR);
$now = date("Y-m-d H:i:s");
function debug() {
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
}
function session_chk() {
    session_start();
    if(!isset($_SESSION['a_no']) || !isset($_SESSION['a_id']) || !isset($_SESSION['a_name']) || !isset($_SESSION['a_tel']) || !isset($_SESSION['a_sort']) || !isset($_SESSION['a_agency']) || $_SESSION['a_sort'] != "admin")
    {
        session_destroy();
        echo '<script type = "text/javascript">alert("다시 로그인 해 주세요.")</script> ';
        echo "<meta http-equiv='refresh' content='0; url=/admin/index'>";
        exit;
    }
}
function session_check_order() {
    session_start();
    if(!isset($_SESSION['a_no']) || !isset($_SESSION['a_id']) || !isset($_SESSION['a_name']) || !isset($_SESSION['a_tel']) || !isset($_SESSION['a_sort']) || !isset($_SESSION['a_agency']) || $_SESSION['a_sort'] != "order")
    {
        session_destroy();
        echo '<script type = "text/javascript">alert("다시 로그인 해 주세요.")</script> ';
        echo "<meta http-equiv='refresh' content='0; url=/order/index'>";
        exit;
    }
}
function session_check_child() {
    session_start();
    if(!isset($_SESSION['p_no']) || !isset($_SESSION['p_id']) || !isset($_SESSION['p_name']) || !isset($_SESSION['p_tel']) || !isset($_SESSION['p_biz_service']) || !isset($_SESSION['p_biz_service_detail']) || $_SESSION['p_biz_check'] != "업체")
    {
        session_destroy();
        echo '<script type = "text/javascript">alert("다시 로그인 해 주세요.")</script> ';
        echo "<meta http-equiv='refresh' content='0; url=/child/index'>";
        exit;
    }
}
function session_check_app() {
    session_start();
    if(!isset($_SESSION['m_no']) || !isset($_SESSION['m_id']) || !isset($_SESSION['m_name']) || !isset($_SESSION['m_tel']) || !isset($_SESSION['m_addr']))
    {
        session_destroy();
        echo '<script type = "text/javascript">alert("로그인이 필요합니다.")</script> ';
        echo "<meta http-equiv='refresh' content='0; url=/app/app-user-login'>";
        exit;
    }
}
function mobile() {
    $useragent=$_SERVER['HTTP_USER_AGENT'];
    if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
    {
        return "m";
    }
    else
    {
        return "c";
    }
}
function make_url($url)
{
    $format = 'xml';
    $version = '2.0.1';
    $login = 'o_4u1upsn74d';
    $appkey = 'R_cf5a5117676940adab975201f7eeb112';

    $bitly = 'http://api.bit.ly/shorten?version='.$version.'&longUrl='.urlencode($url).'&login='.$login.'&apiKey='.$appkey.'&format='.$format;

    $response = file_get_contents($bitly);

    if(strtolower($format) == 'json')
    {
        $json = @json_decode($response,true);
        return $json['results'][$url]['shortUrl'];
    }
    else
    {
        $xml = simplexml_load_string($response);
        return 'https://bit.ly/'.$xml->results->nodeKeyVal->hash;
    }
}
function encrypt($plaintext)
{
    $password = 'qordmlalswhrqothdtltmpxa!0B';
    $password = hash('sha256', $password, true);
    $plaintext = gzcompress($plaintext);
    $iv_source = defined('MCRYPT_DEV_URANDOM') ? MCRYPT_DEV_URANDOM : MCRYPT_RAND;
    $iv = mcrypt_create_iv(32, $iv_source);
    $ciphertext = mcrypt_encrypt('rijndael-256', $password, $plaintext, 'cbc', $iv);
    $hmac = hash_hmac('sha256', $ciphertext, $password, true);
    return base64_encode($ciphertext . $iv . $hmac);
}
function decrypt($ciphertext)
{
    $password = 'qordmlalswhrqothdtltmpxa!0B';
    $ciphertext = @base64_decode($ciphertext, true);
    if ($ciphertext === false) return false;
    $len = strlen($ciphertext);
    if ($len < 64) return false;
    $iv = substr($ciphertext, $len - 64, 32);
    $hmac = substr($ciphertext, $len - 32, 32);
    $ciphertext = substr($ciphertext, 0, $len - 64);
    $password = hash('sha256', $password, true);
    $hmac_check = hash_hmac('sha256', $ciphertext, $password, true);
    if ($hmac !== $hmac_check) return false;
    $plaintext = @mcrypt_decrypt('rijndael-256', $password, $ciphertext, 'cbc', $iv);
    if ($plaintext === false) return false;
    $plaintext = @gzuncompress($plaintext);
    if ($plaintext === false) return false;
    return $plaintext;
}
function sms($phone, $msg){
    $post = [
        'phone' => $phone,
        'msg' => $msg,
        'key'   => 'qordmlalswhrdkdldhxl!!'
    ];

    $ch = curl_init('http://test.paranoid.kr:8101/100min.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_exec($ch);
}
function loc_search($lno) {
    $loc_search = "select l_no, l_name, l_type, c_name from location l
left join code c on l.l_type = c.c_code where l_no = '{$lno}'";
    $loc_result = sqlresult($loc_search)[0];
    $loc_row = sqlrow($loc_search);
        if($loc_row != "1")
            return "";
        else
            return "{$loc_result[l_name]}({$loc_result[c_name]})";
}
function code_search($no) {
    $code_search = "select c_name, c_no, c_code from code where c_code = '{$no}'";
    $code_result = sqlresult($code_search)[0];
    return $code_result[c_name];
}
function status_search($no) {
    global $_SESSION;
    $status = "select * from delivery d
left join code c on c.c_code = d.d_bag_status
left join vehicle v on d.v_no = v.v_no where d_code = '{$no}' order by d_regat desc limit 1";
    return sqlresult($status)[0];
}
/*function post_upload($method){
    global $user, $con;

    $imageKind = array('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
    if ($_POST['image_count'] >= "0" && isset($_POST['image_count'])) {
        switch ($method) {
            case "start":
                $search = "select d_start_image_code as code, d_start_image_cnt as cnt from delivery where d_code = '{$user[d_code]}'";
                break;
            case "finish":
                $search = "select d_finish_image_code as code, d_finish_image_cnt as cnt from delivery where d_code = '{$user[d_code]}'";
                break;
        }
        $image_chk = mysqli_fetch_assoc(mysqli_query($con, $search));
        if ($image_chk['cnt'] > 0 && $image_chk['cnt'] != null) {
            $fn = $image_chk['code'];
            $cnt = $image_chk['cnt'];
        } else {
            $fn = foldername();
            $cnt = 0;
        }

        mkdir('photo/' . $fn, 0777, true);
        $error = "<script>alert(\"사진 업로드 에러\")</script>";

        for ($i = 0; $i < $_POST['image_count']; $i++) {
            $image_id = "image_" . $i;
            $image_file = $cnt + $i + 1 . ".jpg";
            if (isset($_FILES[$image_id]) && !$_FILES[$image_id]['error']) {
                if (in_array($_FILES[$image_id]['type'], $imageKind)) {
                    if (!(move_uploaded_file($_FILES[$image_id]['tmp_name'], 'photo/' . $fn . '/' . $image_file))) {
                        echo $error;
                        exit;
                    }
                } else {
                    echo $error;
                    exit;
                }
            } else {
                echo $error;
                exit;
            }
        }
        $input_cnt = $image_chk['cnt'] + $_POST['image_count'];
        switch ($method) {
            case "start":
                $uploadsql = "update delivery set d_start_image_cnt='{$input_cnt}', d_start_image_code = '{$fn}' where d_code = '{$dNo}'";
                break;
            case "finish":
                $uploadsql = "update delivery set d_finish_image_cnt='{$input_cnt}', d_finish_image_code = '{$fn}' where d_code = '{$dNo}'";
                break;
        }
        echo $uploadsql;

        mysqli_query($con, $uploadsql);
    }
}*/
function diff_time($a, $b){
    $check_time = strtotime($b) - strtotime($a);

    $days = floor($check_time/86400);
    $time = $check_time - ($days*86400);
    $hours = floor($time/3600);
    $time = $time - ($hours*3600);
    $min = floor($time/60);
    $sec = $time - ($min*60);

    if($days==0&&$hours==0&&$min==0)
        return "{$sec}초";
    elseif($days==0&&$hours==0)
        return "{$min}분 {$sec}초";
    elseif($days==0)
        return "{$hours}시간 {$min}분 {$sec}초";
    else
        return "{$days}일 {$hours}시간 {$min}분 {$sec}초";
}
function diff_time_gap($a){
    $days = floor($a/86400);
    $time = $a - ($days*86400);
    $hours = floor($time/3600);
    $time = $time - ($hours*3600);
    $min = floor($time/60);
    $sec = $time - ($min*60);

    if($days==0&&$hours==0&&$min==0)
        return "{$sec}초";
    elseif($days==0&&$hours==0)
        return "{$min}분 {$sec}초";
    elseif($days==0)
        return "{$hours}시간 {$min}분 {$sec}초";
    else
        return "{$days}일 {$hours}시간 {$min}분 {$sec}초";
}
function status_now() {
    global $_SESSION, $user;
    $status = "select * from delivery d
left join code c on c.c_code = d.d_bag_status
left join vehicle v on d.v_no = v.v_no where d_code = '{$_SESSION[dcode]}' and m_no = '{$_SESSION['mno']}' and v.v_no = '{$user['v_no']}' order by d_regat desc limit 1";
    return sqlresult($status)[0];
}
function chat($msg, $url) {
    $curl = curl_init();

    if($url != "")
        $msg = "{\"text\":\"$msg\", \"file_url\":\"$url\"}";
    else
        $msg = "{\"text\":\"$msg\"}";

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://work.100min.co.kr/webapi/entry.cgi?api=SYNO.Chat.External&method=incoming&version=2&token=%22ZWuvfhofoEqZg7dEzrF6rw1JxQJ3q4soekTxmRChcftJqKXcK5fD9GFhiIGlYwYA%22",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "payload=$msg",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded"
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    }
}
function sqlresult($sql){
    global $con;
    $result = mysqli_query($con, $sql);
    if(!$result)
    {
        die(mysqli_error($con));
    }
    $temp = array();
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)){
        $temp[$i] = $row;
        $i++;
    }
    return($temp);
}
function sqlrow($sql){
    global $con;
    $result = mysqli_query($con, $sql);
    if(!$result)
    {
        die(mysqli_error($con));
    }
    $row = mysqli_num_rows($result);
    return($row);
}
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
function foldername($length = 20) {
    global $con;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    $sql = "select * from delivery where d_start_image_code = \"".$randomString."\" or d_finish_image_code = \"".$randomString."\"";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) == "0")
        return $randomString;
    else
        foldername();
}
function alert($msg){

    echo "<script>alert('{$msg}')</script>";
}
function to_update_sql($msg, $submit, $in){
    $msg = array_diff_key($_POST, array("{$submit}" => ""));
    foreach ($msg as $key => $value) {
        if(substr($key , 0, 2) == $in && strpos($key, "no") === false && strpos($key, "_") !== false)
        $query .= "{$key} = '{$value}', ";
    }
    $query = substr($query , 0, -2);
    return $query;
}
function to_insert_sql($msg, $submit, $in){
    $msg = array_diff_key($_POST, array("{$submit}" => ""));
    foreach ($msg as $key => $value) {
        if(substr($key , 0, 1) == $in && strpos($key, "no") === false && strpos($key, "_") !== false){
            $query1 .= "{$key},";
            $query2 .= "'{$value}',";
    }
    }
    $query1 = substr($query1 , 0, -1);
    $query2 = substr($query2 , 0, -1);
    $query = "(".$query1.") values (".$query2.")";
    return $query;
}
function to_insert_sql_exp($msg, $submit, $in){
    $msg = array_diff_key($_POST, array("{$submit}" => ""));
    foreach ($msg as $key => $value) {
        if(substr($key , 0, 1) == $in && strpos($key, "_") !== false){
            $query1 .= "{$key},";
            $query2 .= "'{$value}',";
        }
    }
    $query1 = substr($query1 , 0, -1);
    $query2 = substr($query2 , 0, -1);
    $query = "(".$query1.") values (".$query2.")";
    return $query;
}
function err_msg($msg, $url){
            echo "<script type = 'text/javascript'>alert('{$msg}')</script>";
            echo "<meta http-equiv='refresh' content='0; url={$url}'>";
}
function add_hy($tel)
{
    $tel = preg_replace("/[^0-9]*/s", "", $tel);
    if (substr($tel, 0, 2) == '02')
        return preg_replace("/([0-9]{2})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $tel);
    else if (substr($tel, 0, 2) == '8' && substr($tel, 0, 2) == '15' || substr($tel, 0, 2) == '16' || substr($tel, 0, 2) == '18')
        return preg_replace("/([0-9]{4})([0-9]{4})$/", "\\1-\\2", $tel);
    else
        return preg_replace("/([0-9]{3})([0-9]{3,4})([0-9]{4})$/", "\\1-\\2-\\3", $tel);
}
?>