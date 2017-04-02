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
    
    $r = clear(urldecode($_REQUEST["username"]));
    
    if ($r == "") {
        http_response_code(406);
        header("Content-type: text/json");
        die('{"error":"request is malformed: username not provided"}');
    }
    
    $kik_r = file_get_contents("https://kik.me/" . unm($r));
    $kik_r_a = explode('<h1 class="display-name">', $kik_r);
    $kik_r_b = explode("</h1>" , $kik_r_a[1]);
    
    $kik_i = get_kik($r);
    
    if ($kik_i == "") {
        http_response_code(406);
        header("Content-type: text/json");
        die('{"error":"request is malformed: account does not exist"}');
    }
    
    header("Content-type: text/json");
    echo '{"username":"' . $r . '", "display_name":"' . clear($kik_r_b [0]) . '", "avatar":"' . $kik_i . '", "avatar_ssl":"https://gamersapi.herokuapp.com/apis/kik_https.php?username=' . $r . '"}';
        
    function get_kik($username) {
        $html = file_get_contents_curl("https://kik.me/" . $username);
        
        $doc = new DOMDocument();
        @$doc->loadHTML($html);
        $nodes = $doc->getElementsByTagName('title');
        
        $title = $nodes->item(0)->nodeValue;
        $metas = $doc->getElementsByTagName('link');
        
        for ($i = 0; $i < $metas->length; $i++) {
            $meta = $metas->item($i);
            if($meta->getAttribute('rel') == 'kik-icon') {
                $kik = $meta->getAttribute('href');
            }
        }
        
        $kik = str_replace("thumb.jpg", "orig.jpg", $kik);
        return $kik;
    }
    
    function file_get_contents_curl($url) {
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        
        $data = curl_exec($ch);
        curl_close($ch);
        
        return $data;
    }
    
    function unm($string) {
        $string = str_replace(' ', '_', $string);
        return preg_replace('/[^A-Za-z0-9_-]/', '', $string);
    }
    
    function clear($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        return $data;
    }
?>
