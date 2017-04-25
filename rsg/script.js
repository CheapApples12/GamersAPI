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

function initJQuery(){if("undefined"==typeof jQuery){if(null===document.getElementById("rsg_btn_jquery")){var e=document.createElement("script");e.type="text/javascript",e.id="rsg_btn_jquery",e.src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js",document.getElementsByTagName("head")[0].appendChild(e)}setTimeout(function(){initJQuery()},500)}else $(function(){initRSG()})}function initRSG(){if(!rsgdone){var e,t,r,a,s,n,i=document.getElementsByClassName("rsg_btn"),o=!1;for(e=0;e<i.length;e++){s=i[e].getAttribute("href"),o=!0,r=s.replace("https://socialclub.rockstargames.com/member/",""),r=r.replace("http://socialclub.rockstargames.com/member/",""),r=r.replace("//socialclub.rockstargames.com/member/",""),r=r.replace("socialclub.rockstargames.com/member/",""),r=decodeURI(r).toLowerCase();var c=i[e].getAttribute("data-compare-lsgov");t="false"==c?"https://gamersapi.herokuapp.com/rsg/intent?username="+encodeURI(r)+"&compare_lsgov=false":"https://gamersapi.herokuapp.com/rsg/intent?username="+encodeURI(r)+"&compare_lsgov=true",a=Math.floor(Date.now()/1e3)+e,n="_rsg-"+a,i[e].setAttribute("href",t),i[e].setAttribute("id",n),i[e].setAttribute("data-username",r),i[e].innerHTML='<div class="rsg_btn_c"><div class="rsg_btn_ico"></div><span>Add '+r+"</span></div>",i[e].addEventListener("click",function(e){var t=this.getAttribute("data-compare-lsgov"),r=this.getAttribute("data-username");return window.open("https://gamersapi.herokuapp.com/rsg/intent?username="+encodeURI(r)+"&compare_lsgov="+t+"&intent=popup","rsgadd","height=525,width=990,resizable=1,toolbar=0,directories=0"),e.preventDefault(),!1}),rsgdone=!0}if(o){var m=document.getElementsByTagName("head")[0],l=document.createElement("link");l.rel="stylesheet",l.type="text/css",l.href="https://gamersapi.herokuapp.com/rsg/stylesheet.css",l.media="all",m.appendChild(l)}}}var rsgdone=!1;initJQuery();
