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
        die('{"error":"request is malformed: username not provided, or is invalid."}');
    }
    
    if (isset($_REQUEST["compare_lsgov"])) {
        if ($_REQUEST["compare_lsgov"] == "true") {
            $cmpr = true;
            
            $lsgov_response = file_get_contents("https://api.lsgov.net/rsg_btn/" . clear(properencode(urldecode($_REQUEST["username"]))));
            if (strlen($lsgov_reponse) < 1) {
                echo '<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" xmlns:fb="http://ogp.me/ns/fb#"><head> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> <meta http-equiv="Content-Language" content="en-US"/> <meta http-equiv="X-UA-Compatible" content="IE=edge"/> <meta name="viewport" content="width=device-width, initial-scale=1"/> <meta name="robots" content="NOINDEX, NOFOLLOW"/> <title>Add ' . urldecode($_REQUEST["username"]) . ' on the Rockstar Games Socialclub!</title> <link rel="apple-touch-icon-precomposed" sizes="152x152" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-152x152-precomposed.png"> <link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-144x144-precomposed.png"> <link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-120x120-precomposed.png"> <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-114x114-precomposed.png"> <link rel="apple-touch-icon-precomposed" sizes="76x76" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-76x76-precomposed.png"> <link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-72x72-precomposed.png"> <link rel="apple-touch-icon-precomposed" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-57x57-precomposed.png"> <link rel="shortcut icon" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-precomposed.png"> <link rel="shortcut icon" href="https://cdn.sc.rockstargames.com/favicon.ico"> <script type="text/javascript" data-cfasync="false" src="https://secure.advenacs.com/embed.php?type=hidden&fw=false" data-verificationcode="A/Q37eU/ebyKrOiGBibcoau0W4HAogD72K2OtgIOFhY="></script> <noscript> <meta http-equiv="refresh" content="0; url=https://www.advenacs.com/interstitial/noscript?ref=lsgov.net&typeref=jsdisable&t=validate"/> </noscript> <style>.rsg_add_body_block,.rsg_add_header_c{background-color:#000}.rsg_add_body_block,.rsg_add_body_block_a{text-decoration:none;display:inline-block}body{margin:0;font-family:Segoe UI,Arial,sans-serif}.rsg_add_header_inner{max-width:1024px;padding:7px 15px;margin:0 auto;color:#fff}.rsg_add_header_logo{height:21px;width:21px;display:inline-block;background-image:url(https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-precomposed.png);background-size:20px;background-repeat:no-repeat;background-position:center center}.rsg_add_header_text{display:inline-block;line-height:21px;vertical-align:top;padding-left:3px;font-size:14px;font-weight:400}.rsg_add_header_text span{font-weight:600;color:#fcaf17}.rsg_add_body_inner{max-width:1024px;margin:0 auto;padding:15px;text-align:center}.rsg_add_body_header{font-weight:400;font-size:18px}.rsg_add_body_block{max-width:300px;width:100%;color:#fff;margin-right:15px;transform:scale(1);margin-top:20px;transition:all ease .4s;-webkit-transition:all ease .4s;box-shadow:0 0 5px transparent}.rsg_add_body_block:hover{transform:scale(1.1);transition:all ease .4s;-webkit-transition:all ease .4s;box-shadow:0 0 5px rgba(0,0,0,.42)}.rsg_add_body_block_userimg{width:100%;height:100px;position:relative;overflow:hidden}.rsg_add_body_block_bg_blurit{width:calc(100% + 25px);height:125px;position:absolute;top:-12px;left:-12px;background-size:cover;background-position:Center center;filter:blur(7px);-webkit-filter):blur(7px)}.rsg_add_body_block_bg_userimg_img{position:relative;z-index:2;height:60px;width:60px;margin:21px auto 0;border-radius:2px;background-size:cover;background-position:center center}.rsg_add_body_block_medium{padding:15px;font-weight:600}</style><script>function redir(o){var n=o.getAttribute("data-goto");win=window.open(n,"_blank"),win.focus(),window.close(),rsgadd.close()}</script></head><body> <div class="rsg_add_header_c"> <div class="rsg_add_header_inner"> <div class="rsg_add_header_logo"></div><div class="rsg_add_header_text">Connect with <span>' . urldecode($_REQUEST["username"]) . '</span></div></div></div><div class="rsg_add_body_c"> <div class="rsg_add_body_inner"> <div class="rsg_add_body_header">How would you like to connect with ' . urldecode($_REQUEST["username"]) . '?</div><a href="javascript:void(0)" data-goto="https://www.lsgov.net/jobs/user/' . $lsgov_response . '" class="rsg_add_body_block_a" onclick="redir(this)"> <div class="rsg_add_body_block"> <div class="rsg_add_body_block_userimg"> <div class="rsg_add_body_block_bg_blurit" style="background-image:url(https://www.lsgov.net/assets/images/bluelogo.png)"></div><div class="rsg_add_body_block_bg_userimg_img" style="background-image:url(https://www.lsgov.net/assets/images/bluelogo.png)"></div></div><div class="rsg_add_body_block_medium">Connect on the San Andreas Government Website</div></div></a> <a href="javascript:void(0)" data-goto="https://socialclub.rockstargames.com/member/' . clear(properencode(urldecode($_REQUEST["username"]))) . '" class="rsg_add_body_block_a" onclick="redir(this)"> <div class="rsg_add_body_block"> <div class="rsg_add_body_block_userimg"> <div class="rsg_add_body_block_bg_blurit" style="background-image:url(https://a.rsg.sc/n/' . clear($_REQUEST["username"]) . '/l)"></div><div class="rsg_add_body_block_bg_userimg_img" style="background-image:url(https://a.rsg.sc/n/' . clear($_REQUEST["username"]) . '/l)"></div></div><div class="rsg_add_body_block_medium">Connect on the Rockstar Games Socialclub</div></div></a> </div></div></body></html>';
            } else {
                $cmpr = false;
            }
        } else {
            $cmpr = false;
        }
    } else {
        $cmpr = false;
    }
    
    if (!$cmpr) { 
        echo '<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US" xmlns:fb="http://ogp.me/ns/fb#"><head> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> <meta http-equiv="Content-Language" content="en-US"/> <meta http-equiv="X-UA-Compatible" content="IE=edge"/> <meta name="viewport" content="width=device-width, initial-scale=1"/> <meta name="robots" content="NOINDEX, NOFOLLOW"/> <title>Add ' . urldecode($_REQUEST["username"]) . ' on the Rockstar Games Socialclub!</title> <link rel="apple-touch-icon-precomposed" sizes="152x152" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-152x152-precomposed.png"> <link rel="apple-touch-icon-precomposed" sizes="144x144" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-144x144-precomposed.png"> <link rel="apple-touch-icon-precomposed" sizes="120x120" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-120x120-precomposed.png"> <link rel="apple-touch-icon-precomposed" sizes="114x114" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-114x114-precomposed.png"> <link rel="apple-touch-icon-precomposed" sizes="76x76" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-76x76-precomposed.png"> <link rel="apple-touch-icon-precomposed" sizes="72x72" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-72x72-precomposed.png"> <link rel="apple-touch-icon-precomposed" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-57x57-precomposed.png"> <link rel="shortcut icon" href="https://cdn.sc.rockstargames.com/images/icons/apple-touch-icon-precomposed.png"> <link rel="shortcut icon" href="https://cdn.sc.rockstargames.com/favicon.ico"> <script type="text/javascript" data-cfasync="false" src="https://secure.advenacs.com/embed.php?type=hidden&fw=false" data-verificationcode="A/Q37eU/ebyKrOiGBibcoau0W4HAogD72K2OtgIOFhY="></script><noscript><meta http-equiv="refresh" content="0; url=https://www.advenacs.com/interstitial/noscript?ref=lsgov.net&typeref=jsdisable&t=validate"/></noscript><style>body{margin:0;font-family:Segoe UI,Arial,sans-serif;background-color:#000;padding:15px;color:#fcaf17;text-align:center;font-size:15px;font-weight:600;line-height:calc(100vh - 30px);box-sizing:border-box;overflow:hidden}</style><script>window.onload=function(){var win=window.open("https://socialclub.rockstargames.com/member/' . clear(properencode(urldecode($_REQUEST["username"]))) . '", "_blank"); win.focus(); window.close(); rsgadd.close();};</script></head><body><p>Please wait...</p></body></html>';
    }
    
    function clear($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        return $data;
    }
    
    function properencode($str) {
        $str = str_replace(' ', '%20', $str);
        $str = str_replace('+', '%20', $str);
        return $str;
    }
?>
