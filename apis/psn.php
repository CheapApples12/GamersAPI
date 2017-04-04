<?php
    //===================================================================================//
    //                                                                                   //
    //  MIT License                                                                      //
    //                                                                                   //
    //  Copyright (c) 2017 Bradley Hodges                                                //
    //                                                                                   //
    //  Permission is hereby granted, free of charge, to any person obtaining a copy     //
    //  of this software and associated documentation files (the "Software"), to deal    //
    //  in the Software without restriction, including without limitation the rights     //
    //  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell        //
    //  copies of the Software, and to permit persons to whom the Software is            //
    //  furnished to do so, subject to the following conditions:                         //
    //                                                                                   //
    //  The above copyright notice and this permission notice shall be included in all   //
    //  copies or substantial portions of the Software.                                  //
    //                                                                                   //
    //  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR       //
    //  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,         //
    //  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE      //
    //  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER           //
    //  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,    //
    //  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE    //
    //  SOFTWARE.                                                                        //
    //                                                                                   //
    //  Downloaded from: https://github.com/CheapApples12/GamersAPI                      //
    //                                                                                   //
    //===================================================================================//
    
    if (!isset($_REQUEST["username"])) {
        http_response_code(406);
        header("Content-type: text/json");
        die('{"error":"request is malformed: psnid not provided"}');
    }
    
    $r = clean(urldecode($_REQUEST["username"]));
    
    $content = file_get_contents("https://my.playstation.com/" . $r);
    
    $doc = new DOMDocument();
    libxml_use_internal_errors(true);
    $doc->loadHTML($content);
    $xpath = new DOMXPath($doc);
    $nodes = $xpath->query("//img[@class='avatar']");
    $src = $nodes->item(0)->getAttribute('src');
    
    header("Content-type: text/json");
    echo "https:$src";
    
    function clear($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        return $data;
    }
    
    function unm($string, $ALLOWSPACE = false) {
        if (!$ALLOWSPACE) {
            $string = str_replace(' ', '_', $string);
        }
        
        return preg_replace('/[^A-Za-z0-9_- ]/', '', $string);
    }
?>
