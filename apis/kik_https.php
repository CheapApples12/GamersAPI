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
        die('{"error":"request is malformed: username not provided"}');
    }
    
    $r = clear(unm(urldecode($_REQUEST["username"])));
    
    if ($r == "") {
        http_response_code(406);
        header("Content-type: text/json");
        die('{"error":"request is malformed: username not provided"}');
    }
    
    $i = get_kik($r);
    
    if ($i == "" || $r == "NO_NAME_GENERIC") {
        if (isset($_REQUEST["cache"])) {
            if ($_REQUEST["cache"] == "1") {
                session_cache_limiter("none");
                header("Cache-control: max-age=" . strtotime("+2 days", time()));
                header("Expires: " . strtotime("+2 days", time()));
            } else {
                header("Expires: 0");
                header("Pragma: no-cache");
            }
        } else {
            header("Expires: 0");
            header("Pragma: no-cache");
        }
        
        $img = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAbIAAAGyCAMAAAC2rbEuAAACW1BMVEXa2t3Pz9JcXWHY2NtjZGhtbnJfYGRpam7W1tlhYmZub3N+f4JgYWVlZmrU1Ndqa2/Q0NNmZ2twcXXR0dTFxchkZWmQkJRyc3fMzM9xcnZ0dXmRkZXIyMt6e37BwcSNjZF9foJ3eHyDhIe+vsLNzdB4eXyQkZSSkpaTk5fGxsl5en5rbHBnaGySk5aqq65/gIScnaC5ub2xsbStrbBvcHS6ur7Ly86Gh4uGhop/gIOIiY2DhIioqKuMjJClpqmLjJC/v8O4uLuNjpKWlpqamp6RkpW3t7p2d3uurrGdnaGzs7aJiY2VlpmgoaS7u76ur7KkpKipqayzs7e5ubyKi491dnmio6aXmJuBgoabnJ+fn6PAwMS1tbh5en2EhYiqqq19foGjo6e7u7+hoaWAgYWam56Zmp2lpamEhYnCwsV7fH98fYGBgoWMjZGAgYSPkJN3eHuXl5uPj5OjpKd6e392d3q+vsFiY2ebm5+cnKCVlZl1dnq9vcCFhomIiIygoKSKio6dnqGen6K6ur22trqHiIymp6q0tLevsLOWl5q1tbmCg4d8fYCLi4+nqKupqq2rrK+srbCmpqq/v8K8vMCTlJeOjpKnp6ufoKO8vL+YmJyZmZ2oqayUlJi2trmhoqWxsbWwsLSHh4t4eX2kpaienqK4uLyvr7K3t7uFhoqCg4atrrGysrWYmZzAwMPZ2dzHx8rOztHDw8bKys2srK/T09Z+f4NdXmJbXGDX19qUlZhzdHi9vcGOj5LS0tWioqbV1dheX2NsbXF7fIDJycy0tLiJio7ExMdoaW1vmC1aAAALFElEQVR4XuzPRxGEQAAAMPyL2Uov15ss3hi44ZE4SPMfAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAEG+XXFMJayjfV+7iSQNM6X2dP/3yu49Hw+O5tfVUAXb27vw7qvoMA/iTO5PJAtkJIRAgQEACyKLsVlkX2YRCoaIsKgVZC4otdaGCrUqrtuqxVm1P9/30dBJCnGcOEBMIkj+rP3C8IRKSmeTeme879/n8C8+59/t+17f38roxcz0OqW/5zjtwgKSXHH0uzgw17K1GXsmzbz2XYFZS03fFkB8SW7KhhCNR8k4auSefTK2gz/nQpOWtYo5O1a9iyBnZfcrj6DV+jpyQ9EfXGJCvixA66T7cx+CcPxdDqCT9xDwGa1MrwiPJD+cycD3bkwiJzJjIUExrQxik+jTDkjiXRODkO3GGaEwLgiUtCxiu+j8jSHK5nqG72ImgSPdK5kLJIgRDmhqZIw91IwBy+zxzpvwfGDVZyJyaOL8tiVGQ5MvMubKGFWsP3y7CSEjpQeaLN/n5amRLOl9hPpUdLUVWpHsO86x4NbIgpc3Mu575yJjEnqYLtiNT8jjd8CYyI3vpiieRCdno0RU91zE8aTpPd/RVYzgS+xFdcgrDkSP0mSgbZbVHt3iLMBRJl9M1FUsxBPmM7nk9hgeS9jI66AgeSKbSRd6zeABZmqKTFqcxOJlFn4lKX6p76KiydgxGDtNZj2MwspjO8npxP3mDtPWZyWw6LLUU95EquuwX+DY5TqdVpJEZHR9w91CBLKPbVuBbZC7dlurCAFJE183HALKLrpuOAeQLuq4CA0gzndeGe0kxnfdr3EsS9JlYZ5Rquq8c95ApNKAa/WQLDdiIfrKTBnyMfvISDdiGfjKeBlxAP/keDZiIfnKBBtSjnyygBZ3wyWRacAc+mUgLnoJPFtOCXfBJMS24CmMU2d9gjCK7BGMU2ToYo8huwBhF9lMYo8guwCfltOAx+KSWFjwNnzTQggXwyR5a0AyfnKUFt+CTObRgMnzyPi2YCZ+MoQXT4JMfWPvK5D1a8Ff45BgtOACfLKMFc+CTlSrydVo4DK/AJ6dpwQn45FNa8D5s0c0XnoRPJtGCMfDJBmv7ZfKQtV1peVhnP8KgyJbDGEW2FcYoslUwRuXHpzBGkU2CMZqX/Qbh0uqHLispsi/gk1m04CjCpcjUSFWbL/tgjCL7Cb4hHcW0YN4S3CUvjqUR47shQPuXtKN8CmRKDS1J7EfU/ayMtnhXEW1LemjOI4iy3jjtSdxBdCVn0qJraUTW87TpTURVVz1titchovbRqs2IplgfrSqJqZ2SCeqy9AHtmoUoStbQripE0Tha1oIIukrL3kUEzaZl+/QIkjWr1JrHmhWIoHm0rAERlKIxqvJpWh+iJ0nTahA9aZpWoa/MAI1lcVp2DRF0k5ad0FTammOIoIO0bBsi6Pu07LuIoPm07HNE0Gpa1oUISidoVyMi6RbtehmRtJ527UAk/Y9mpboQTVU0Rl05Z2tWZs0VGlVWiaiaSZvGI7IepU3jEFmxm7ToICLsEC26ggiLLaY9XyPSPqE59dWItrW05hAirquGtqi7I3bQlEQbZCoteRSC9CbaMRsCoKWGVpyIQQDgeoI2lFfjLvl5ihbMnYBvyH89uq+vF/3kcoquK2nCvWR/gm4rXoqBZMlYuqy2HfdTZtYSkxlxumpPHQYjxyvoppmdGJyMq6GLJlfiQaS1xlpi0hqnaxqGTkzO0DU7MSRZQ9dMwJAkFqdb9mAYspVuuYRhyJ/ollYMQ7oTdMliGKM/4zMYljxFh3jtGJ4U0x3TkQF5hu7YjwxIu0dX9MWQCXmMrliPjMgbdESiCJmRA9ausct+OsHrQKakkS54GxmTj6xdY5dYsbVptDzCvPPakA2Zxnw7g6zIdeZZWRGyI8eYXwuRJWlKMZ9KupEtOWKtCbGka5k/y2GLKpB4EUZCJll7p0oqS5gfJzFC8oLHfKhowUjJQubDHzBikjxprZuctNcw1zbFMBqyxmNu1XdgdOQccyr1AkZLZjGXPsSoSWwFc+d3CIB0NjJXliURBJkwl7nRXIpgSEcJc+FWN4IivX0M35wgE5O2eQzbtEqYoo6CPZ0IlvQxXK8jYPKetVsuspnhmo+Ayb8YrjsImLQzVKkYgiZxhqkWgZMDpg8uqs+ZlvB1dOf3CJxcZZjWIHCyyFqNL1OsvSAsTQxTJwInHQxTJQInbQxTHYzRWNYLY/QUyG4ETtYzTNsROJnJMDUjaNJKmhrMJPklw9WcRKDkkrHndOQJz1TjCSk9zVxY1olgyPVy5kbJRgRA0tuYOze6MVrStIe5VHsHoyLJd8qYW4nPYhg5aT3A3Ls2BSMk6Vd7mA/ea90YCZlRy3y5uRtZk8oNzKcP6pAd+WUJ86vmn8iCFP2F+XdqKTIkyd/G6YKxh2PIhFw5S1c0zMCwpPs1jw4504WhybtVdEvNDgxBJkyne8b04gEk9tVYuiixOY3ByKIGuqr8Nu4jbf+hy05ewQBS93CKjpvaDp+k98bpvrK/l+Iu2VJMG6p2QAAcv0U7zmo5BB2raMuytogHtjZFa7yVbQrMGm9rREMbdzpFq7y3pyBy1iygbZO3JBEhpYcaaV/xi5WIiN51FSwMZbPGofDFtqxgIZnzZBoFrf3VEhaaipc6ULB2H/NYkH54O4kCVPfHchauqs3tKDA/vtjDwpb69yIUjs6PGxgF5V/VoSAcvzGWUZG4OAPWpf/P3r21VBWEYRxvr3bb1O0hbVupZVqhlEVpVKht7WhRWIZgJYSJJEQYBYodMOhwURd1EdFN1geITlr6dNimEebH6tKLwpxZM/OuaT+/r/CHWfDyzprGamSX8k6vbzrtuVaA7BMfq/R1s/7o2QBZavKMhwPI6VcrkM2K7hZ7tuFWlkS2Sxz0aAB5YBAEABsfeXE+zjxeuOJMeemZyM99u1NYQED8UKRHWRNX/xxL0WwmsldnfjUF+BsKHkRyo//blUUCUP/tyF00Wo/F0dZ7UQrW1ot/o963kVlIrMHS0IVIrPf8nMOSUdAlvigSK5uCCpqqKBUd1qfjUEWpFrkx1vBX6KBbPUJnYit0UaZU4EwciEMfpV64Ph0r2xEOXXb7YmtnEmFR3OFl+eIamEAnXL1Ycr8eZlBRn5PrfBUwh7qX2x93VMMkmrR9OK7eBrOoZMLuZywXplHBsMViAwHMo9lj1q45V8AOGrE0ohqFLfTFSrIq2EOHLRSrhU10x3ixbthFacPFjsM22mG02GlYR0GDwWJ9Aeyj5Htzc8V5uEDrVpraGciHG1RlKNlOuEKNRop1BPAKP2exeviFn7NR+IWTq01wihKhd+Xa4RY1hSz2Gq7R01DFZnLgGlWHSnYO7lGYvYLNSbhHOSHmVjchgVr0F4NTkEDl2sk+Qga16SbbAhnUqllsHEIoMa2X7Dqk0EWtYoW5kEK7tZI9hxzq0Ek2CL9w4/tzEnJojc7+ACRRTD3ZG3iGiztDkERdysWmA0iieeVkDZBFys+PZOAZDkDyIIuaVZc+AsiiH4rJeiCNCtWSPYFnuBxXB2nU4ttMmE6qJSuBNNqnliwX0mhIqVgpxNEqpWQbII+UloZfQh4p3TRrhDwa9+1vOqT0rOAI5FHDf/0nP44/9kMefVdJNgd5dF4l2V7IoxsqyZohjy6pJOuHPHqokmwS8mhMJVk+5NEz35JRnW/JaLtvyajWt2R0xLdk9LsdODQCAABBAIjLuD/BymzOYCDo+YkB0S3suF7hiNeC9JbWrndCYwAAAABJRU5ErkJggg==";
        $data = explode(",", $img);
        echo base64_decode($data[1]);
    } else {
        if (isset($_REQUEST["cache"])) {
            if ($_REQUEST["cache"] == "1") {
                session_cache_limiter("none");
                header("Cache-control: max-age=" . strtotime("+2 days", time()));
                header("Expires: " . strtotime("+2 days", time()));
            } else {
                header("Expires: 0");
                header("Pragma: no-cache");
            }
        } else {
            header("Expires: 0");
            header("Pragma: no-cache");
        }
        
        $img = file_get_contents($i);
        echo $img;
    }
    
    header("Content-Type: image/png");
    
    function get_kik($username) {
        $html = file_get_contents_curl("https://kik.me/" . $username);
        
        $doc = new DOMDocument();
        @$doc->loadHTML($html);
        $nodes = $doc->getElementsByTagName("title");
        
        $title = $nodes->item(0)->nodeValue;
        $metas = $doc->getElementsByTagName("link");
        
        for ($i = 0; $i < $metas->length; $i++) {
            $meta = $metas->item($i);
            if($meta->getAttribute("rel") == "kik-icon") {
                $kik = $meta->getAttribute("href");
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
        $string = str_replace(" ", "_", $string);
        return preg_replace("/[^A-Za-z0-9_-]/", "", $string);
    }
    
    function clear($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        return $data;
    }
?>
