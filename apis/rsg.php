<?php
    //----------------------------------------------------------------------------------//
    //  MIT License
    //  
    //  Copyright (c) 2017 Bradley Hodges
    //  
    //  Permission is hereby granted, free of charge, to any person obtaining a copy
    //  of this software and associated documentation files (the "Software"), to deal
    //  in the Software without restriction, including without limitation the rights
    //  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    //  copies of the Software, and to permit persons to whom the Software is
    //  furnished to do so, subject to the following conditions:
    //  
    //  The above copyright notice and this permission notice shall be included in all
    //  copies or substantial portions of the Software.
    //  
    //  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    //  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    //  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    //  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    //  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    //  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
    //  SOFTWARE.
    //
    //  Downloaded from: https://github.com/CheapApples12/GamersAPI
    //----------------------------------------------------------------------------------//
    
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
    
    if (strpos($r,'socialclub.rockstargames.com/crew') === false) {
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
