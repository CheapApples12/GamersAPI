<?php
    function _title($url) {
        $str = file_get_contents($url);
        if(strlen($str)>0){
            $str = trim(preg_replace('/\s+/', ' ', $str));
            preg_match("/\<title\>(.*)\<\/title\>/i",$str,$title);
            return $title[1];
        }
    }
    
    function clear($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        return $data;
    }
    
    $r = clear(urldecode($_REQUEST["url"]));
    
    if ($r == "") {
        http_response_code(406);
        header("Content-type: text/json");
        die('{"error":"request is malformed: url not provided"}');
    }
    
    if (strpos($r,'socialclub.rockstargames.com/crew') !== false) {
        http_response_code(406);
        header("Content-type: text/json");
        die('{"error":"request is malformed: url not correct"}');
    }
    
    $url = str_replace("Rockstar Games Social Club - Crew : ", "", _title($r));
    if ($url == "" || $url == "Rockstar Games Social Club") {
        http_response_code(444);
        header("Content-type: text/json");
        die('{"error":"crew does not exist"}');
    } else {
        header("Content-type: text/json");
        echo '{"crew_name":"' . $url . '"}';
    }
?>
