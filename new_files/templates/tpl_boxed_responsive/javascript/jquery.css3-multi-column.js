/* CSS3MultiColumn - a javascript implementation of the CSS3 multi-column module
 * v1.02 beta - Jan 08 2008
 * Copyright (c) 2005 Cdric Savarese <pro@4213miles.com>
 * Copyright (c) 2012 Gabriel Saldana <gabriel@gabrielsaldana.org>
 * This software is licensed under the CC-GNU LGPL <http: *creativecommons.org/licenses/LGPL/2.1/>
 
 * For additional information, see : http: *www.csscripting.com/
 
 * Supported Properties:
 * column-count
 * column-width
 * column-gap
 * column-rule
 
 * Unsupported Properties:
 * column-rule-width (use column-rule instead)
 * column-rule-style (use column-rule instead)
 * column-rule-color (use column-rule instead)
 * column-span
 * column-width-policy
 * column-space-distribution 
 */
function CSS3MultiColumn(){function loadStylesheets(){if(document.styleSheets){for(var e=0;e<document.styleSheets.length;e++){cssCache[document.styleSheets[e].href]=false}for(var e=0;e<document.styleSheets.length;e++){loadCssCache(document.styleSheets[e],"parseStylesheets")}}else if(document.getElementsByTagName){var t=document.getElementsByTagName("link");for(var e=0;e<t.length;e++){cssCache[t[e].href]=false}for(var e=0;e<t.length;e++){loadCssCache(t[e],"parseStylesheets")}}}function loadCssCache(s,callback){if(s.href&&s.cssText){cssCache[s.href]=s.cssText;eval(callback)()}if(s.href&&typeof XMLHttpRequest!="undefined"){var xmlhttp=new XMLHttpRequest;xmlhttp.onreadystatechange=function(){if(xmlhttp.readyState==4){if(typeof xmlhttp.status=="undefined"||xmlhttp.status==200||xmlhttp.status==304){cssCache[s.href]=xmlhttp.responseText;eval(callback)()}}};if(window.XDomainRequest){xmlhttp=new window.XDomainRequest;xmlhttp.onload=function(){cssCache[s.href]=xmlhttp.responseText;eval(callback)()}}xmlhttp.open("GET",s.href,true);xmlhttp.send()}}function parseStylesheets(){var e=true;for(var t in cssCache){if(cssCache[t]!=false)parseStylesheet(cssCache[t]);else e=false}if(e){processElements()}}function parseStylesheet(e){var t=new ut.getPseudoCssRules("column-count",e);for(var n=0;t&&n<t.cssRules.length;n++){if(!pseudoCSSRules[t.cssRules[n].selectorText])pseudoCSSRules[t.cssRules[n].selectorText]=new Object;pseudoCSSRules[t.cssRules[n].selectorText]["column-count"]=t.cssRules[n].value}t=new ut.getPseudoCssRules("column-width",e);for(var n=0;t&&n<t.cssRules.length;n++){if(!pseudoCSSRules[t.cssRules[n].selectorText])pseudoCSSRules[t.cssRules[n].selectorText]=new Object;pseudoCSSRules[t.cssRules[n].selectorText]["column-width"]=t.cssRules[n].value}t=new ut.getPseudoCssRules("column-gap",e);for(var n=0;t&&n<t.cssRules.length;n++){if(!pseudoCSSRules[t.cssRules[n].selectorText])pseudoCSSRules[t.cssRules[n].selectorText]=new Object;pseudoCSSRules[t.cssRules[n].selectorText]["column-gap"]=t.cssRules[n].value}t=new ut.getPseudoCssRules("column-rule",e);for(var n=0;t&&n<t.cssRules.length;n++){if(!pseudoCSSRules[t.cssRules[n].selectorText])pseudoCSSRules[t.cssRules[n].selectorText]=new Object;pseudoCSSRules[t.cssRules[n].selectorText]["column-rule"]=t.cssRules[n].value}}function processElements(){if(!documentReady)return;for(var e in pseudoCSSRules){debug(e+" cc:"+pseudoCSSRules[e]["column-count"]+" cw:"+pseudoCSSRules[e]["column-width"]+" cr:"+pseudoCSSRules[e]["column-rule"]+" cg:"+pseudoCSSRules[e]["column-gap"]);var t=ut.cssQuery(e);for(var n=0;n<t.length;n++){processElement(t[n],pseudoCSSRules[e]["column-count"],pseudoCSSRules[e]["column-width"],pseudoCSSRules[e]["column-gap"],pseudoCSSRules[e]["column-rule"])}}}function processElement(e,t,n,r,i){var s;var o;var u=0;if(e.clientWidth&&e.clientWidth!=0){var a;if(e.currentStyle){a=parseInt(e.currentStyle.paddingLeft.replace(/[\D]*/gi,""))+parseInt(e.currentStyle.paddingRight.replace(/[\D]*/gi,""))}else if(document.defaultView&&document.defaultView.getComputedStyle){a=parseInt(document.defaultView.getComputedStyle(e,"").getPropertyValue("padding-left").replace(/[\D]*/gi,""))+parseInt(document.defaultView.getComputedStyle(e,"").getPropertyValue("padding-left").replace(/[\D]*/gi,""))}if(isNaN(a))a=0;o=(e.clientWidth-a).toString()+"px"}else if(e.scrollWidth){var f;var a;if(e.currentStyle){a=parseInt(e.currentStyle.paddingLeft.replace(/[\D]*/gi,""))+parseInt(e.currentStyle.paddingRight.replace(/[\D]*/gi,""))}else if(document.defaultView&&document.defaultView.getComputedStyle){a=parseInt(document.defaultView.getComputedStyle(e,"").getPropertyValue("padding-left").replace(/[\D]*/gi,""))+parseInt(document.defaultView.getComputedStyle(e,"").getPropertyValue("padding-left").replace(/[\D]*/gi,""))}if(isNaN(a))a=0;if(e.currentStyle){f=parseInt(e.currentStyle.borderLeftWidth.replace(/[\D]*/gi,""))+parseInt(e.currentStyle.borderRightWidth.replace(/[\D]*/gi,""))}else if(document.defaultView&&document.defaultView.getComputedStyle){f=parseInt(document.defaultView.getComputedStyle(e,"").getPropertyValue("border-left-width").replace(/[\D]*/gi,""))+parseInt(document.defaultView.getComputedStyle(e,"").getPropertyValue("border-right-width").replace(/[\D]*/gi,""))}if(isNaN(f))f=0;o=(e.scrollWidth-a-f).toString()+"px"}else o="99%";var l=parseInt(o.replace(/[\D]*/gi,""));if(!n||n=="auto")s=o.replace(/[\d]*/gi,"");else s=n.replace(/[\d]*/gi,"");if(!s)s="px";if(!r){if(s=="%")r=1;else r=15}else{r=parseInt(r.replace(/[\D]*/gi,""))}if(i&&i!="none"){r=Math.floor(r/2);u=r+parseInt(i.substring(i.search(/\d/),i.search(/\D/)))}if(!n||n=="auto"){n=(l-(r+u)*(t-1))/t}else{n=parseInt(n.replace(/[\D]*/gi,""));if(!t||t=="auto"){t=Math.floor(l/(n+r))}}n-=1;var c=document.createElement("div");var h=e.parentNode;c=h.insertBefore(c,e);var p=h.removeChild(e);p=c.appendChild(p);c.className=p.className;p.className="";p.id=ut.randomId();p.style.width=n.toString()+s;if(typeof p.style.styleFloat!="undefined")p.style.styleFloat="left";if(typeof p.style.cssFloat!="undefined")p.style.cssFloat="left";var d=Math.floor(p.offsetHeight/t)+14;if(!c.id)c.id=ut.randomId();var v=1;for(var m=1;m<t&&p&&v<t+5;m++){bestSplitPoint=null;secondSplitPoint=null;secondSplitBottom=0;findSplitPoint(p,d*m,c);if(isDebug)bestSplitPoint.style.border="1px solid #00FF00";if(bestSplitPoint&&!isElementSplitable(bestSplitPoint)){d=getElementRelativeTop(bestSplitPoint,c)+bestSplitPoint.offsetHeight+10;m=1;debug("reset new Height = "+d+" relativetop="+getElementRelativeTop(bestSplitPoint,c)+" offsetHeight= "+bestSplitPoint.offsetHeight)}else if(!bestSplitPoint){debug("No split point found with "+d)}v++}debug("<table><tr><td>Avail. Width</td><td>"+l+"</td><td>Units</td><td>"+s+"</td></tr><tr><td>column_width</td><td>"+n+"</td><td>column_count</td><td>"+t+"</td></tr><tr><td>column_gap</td><td>"+r+"</td><td>column_rule</td><td>"+i+"</td></tr><tr><td>New Height</td><td>"+d+"</td><td></td><td></td></tr></table>");for(var m=1;m<t&&p;m++){bestSplitPoint=null;secondSplitPoint=null;secondSplitBottom=0;findSplitPoint(p,d,c);if(bestSplitPoint&&isElementSplitable(bestSplitPoint)&&p.id!=bestSplitPoint.id){var g=bestSplitPoint;if(isDebug)secondSplitPoint.style.border="1px dotted #00F"}else{var g=secondSplitPoint}if(!g){debug("<hr />No split point found for "+p.tagName+" "+d);return}if(isDebug)g.style.border="1px solid #F00";var y=p.cloneNode(false);y.id=ut.randomId();p.parentNode.insertBefore(y,p.nextSibling);y.style.paddingLeft=r+s;if(i&&i!="none"){y.style.borderLeft=i;p.style.paddingRight=r+s}if(document.all&&!window.opera)p.style.height=d+"px";p.style.minHeight=d+"px";var b=createNodeAncestors(g,p,y,"append");var w=g;while(w&&w.id!=p.id){var E=w.nextSibling;while(E){moveNode(E,p,y);E=w.nextSibling}w=w.parentNode}var S=splitElement(g,d-getElementRelativeTop(g,c),p,y);var h=g.parentNode;while(h&&h.id!=p.id){var x=h.firstChild;while(x){if(x.nodeType==1&&x.childNodes.length==0||x.nodeType==3&&x.nodeValue.replace(/[\u0020\u0009\u000A]*/,"")==""){h.removeChild(x);x=h.firstChild}else{x=x.nextSibling}}h=h.parentNode}if(S){g=p.lastChild;if(g&&document.defaultView&&document.defaultView.getComputedStyle(g,"").getPropertyValue("text-align")=="justify"||g.currentStyle&&g.currentStyle.textAlign=="justify"){var T=document.createTextNode(" "+S.replace(/./g," "));var N=document.createElement("span");g.appendChild(N);N.style.lineHeight="1px";N.appendChild(T)}}p=y}if(p){if(document.all&&!window.opera)p.style.height=d+"px";p.style.minHeight=d+"px"}var C=document.createElement("div");C.style.clear="left";C.appendChild(document.createTextNode(" "));c.appendChild(C);if(navigator.userAgent.toLowerCase().indexOf("safari")+1)c.innerHTML+=" "}function findSplitPoint(e,t,n){if(e.nodeType==1){var r=getElementRelativeTop(e,n);var i=r+e.offsetHeight;if(r<t&&i>t){bestSplitPoint=e;if(isElementSplitable(e)){for(var s=0;s<e.childNodes.length;s++){findSplitPoint(e.childNodes[s],t,n)}}return}if(i<=t&&i>=secondSplitBottom){secondSplitBottom=i;secondSplitPoint=e}}return}function isElementSplitable(e){if(e.tagName){var t=e.tagName.toUpperCase();for(var n=0;n<splitableTags.length;n++)if(t==splitableTags[n])return true}return false}function splitElement(e,t,n,r){var i=e.lastChild;while(i){if(i.nodeType==3){var s="dummmy";var o="";while(e.offsetHeight>t+2&&s!=""){s=stripOneLine(i);o=s+o}if(o!=""){var u=createNodeAncestors(i,n,r,"insertBefore");u.insertBefore(document.createTextNode(o),u.firstChild)}if(i.nodeValue==""){i.parentNode.removeChild(i)}else break}else{var u=createNodeAncestors(i,n,r,"insertBefore");u.insertBefore(i.parentNode.removeChild(i),u.firstChild)}i=e.lastChild}return s}function stripOneLine(e){while(e&&e.nodeType!=3)e=e.firstChild;if(!e)return;var t=e.parentNode;var n=t.offsetHeight;if(!n){return""}var r=e.nodeValue;var i=e.nodeValue.lastIndexOf(" ");while(i!=-1&&t.offsetHeight==n){e.nodeValue=e.nodeValue.substr(0,i);i=e.nodeValue.lastIndexOf(" ");if(i==-1)i=e.nodeValue.lastIndexOf("\n")}if(t.offsetHeight==n)e.nodeValue="";return r.substr(e.nodeValue.length)}function createNodeAncestors(e,t,n,r){var i=new Array;var s=n;var o=e.parentNode;while(o&&o.id!=t.id){i[i.length]=o;if(!o.id)o.id=ut.randomId();o=o.parentNode}for(var u=i.length-1;u>=0;u--){for(var a=0;a<s.childNodes.length&&(s.childNodes[a].nodeType==3||!s.childNodes[a].className.match(i[u].id+"-css3mc"));a++);if(a==s.childNodes.length){if(r=="append")s=s.appendChild(document.createElement(i[u].tagName));else s=s.insertBefore(document.createElement(i[u].tagName),s.firstChild);s.className=i[u].className+" "+i[u].id+"-css3mc";s.style.marginTop="0";s.style.paddingTop="0";if(s.tagName.toUpperCase()=="OL"&&e.nodeType==1&&e.tagName.toUpperCase()=="LI"){var f=e.previousSibling;var l=0;while(f){if(f.nodeType==1&&f.tagName.toUpperCase()=="LI")l++;f=f.previousSibling}s.setAttribute("start",l)}}else{s=s.childNodes[a];if(s.tagName.toUpperCase()=="OL"&&(s.start==-1||s.start==1)&&e.nodeType==1&&e.tagName.toUpperCase()=="LI"){var f=e.previousSibling;var l=0;while(f){if(f.nodeType==1&&f.tagName.toUpperCase()=="LI")l++;f=f.previousSibling}s.setAttribute("start",l)}}}return s}function moveNode(e,t,n){var r=createNodeAncestors(e,t,n,"append");var i=r.appendChild(e.parentNode.removeChild(e));if(r.id==n.id&&i.nodeType==1){i.style.paddingTop="0px";i.style.marginTop="0px"}return i}function getElementRelativeTop(e,t){var n=0;if(e.offsetParent){while(e.offsetParent){n+=e.offsetTop;e=e.offsetParent}}var r=0;if(t.offsetParent){while(t.offsetParent){r+=t.offsetTop;t=t.offsetParent}}return n-r}var cssCache=new Object;var splitableTags=new Array("P","DIV","SPAN","BLOCKQUOTE","ADDRESS","PRE","A","EM","I","STRONG","B","CITE","OL","UL","LI");var pseudoCSSRules=new Object;var ut=new CSS3Utility;var debug=ut.debug;if(document.location.search.match("mode=debug"))var isDebug=true;else var isDebug=false;var bestSplitPoint=null;var secondSplitPoint=null;var secondSplitBottom=0;var documentReady=false;ut.XBrowserAddEventHandler(window,"load",function(){documentReady=true;processElements()});loadStylesheets()}function CSS3Utility(){this.handlerList=new Array}CSS3Utility.prototype.cssQuery=function(){function d(e,t){if(!e)return[];var n=arguments.callee.caching&&!t;t=t?t.constructor==Array?t:[t]:[document];h=false;var r=m(e).split(",");var i=[];for(var s in r){e=g(r[s]);var o=0,u,a,f="",l=t;while(o<e.length){u=e[o++];a=e[o++];f+=u+a;l=n&&p[f]?p[f]:T(l,u,a);if(n)p[f]=l}i=i.concat(l)}return i}function m(e){return e.replace(o,u).replace(x.ALL,x.ID).replace(i,s)}function g(e){if(t.test(e))e=" "+e;return e.match(n)||[]}function w(e){return b.test(e)?e:"'"+e+"'"}function E(e){return b.test(e)?e.slice(1,-1):e}function x(e,t,n){this.id=S.length;var r="element.";switch(e.toLowerCase()){case"id":r+="id";break;case"class":r+="className";break;default:r+="getAttribute('"+e+"')"}switch(t){case"=":r+="=="+w(n);break;case"~=":r="/(^|\\s)"+E(n)+"(\\s|$)/.test("+r+")";break;case"|=":r="/(^|-)"+E(n)+"(-|$)/.test("+r+")";break}_(S,new Function("element","return "+r))}function T(e,t,n){var i="";if(r.test(n)){n=n.split("|");i=n[0];n=n[1]}var s=[],o;switch(t){case" ":for(o in e){if(typeof e[o]=="function")continue;var u=N(e[o],n,i);for(var a=0;a<u.length;a++){if(M(u[a])&&(!i||L(u[a],i)))_(s,u[a])}}break;case">":for(o in e){var u=e[o].childNodes;for(var a=0;a<u.length;a++)if(C(u[a],n,i))_(s,u[a])}break;case"+":for(o in e){var f=O(e[o]);if(f&&C(f,n,i))_(s,f)}break;case"~":for(o in e){var f=e[o];while(f=O(f)){if(f&&C(f,n,i))_(s,f)}}break;case".":n=new RegExp("(^|\\s)"+n+"(\\s|$)");for(o in e)if(n.test(e[o].className))_(s,e[o]);break;case"#":for(o in e)if(e[o].id==n)_(s,e[o]);break;case"@":n=S[n];for(o in e)if(n(e[o]))_(s,e[o]);break;case":":n=y[n];for(o in e)if(n(e[o]))_(s,e[o]);break}return s}function C(e,t,n){if(n&&!L(e,n))return false;return t=="*"?M(e):h?e.tagName==t:e.tagName==t.toUpperCase()}function L(e,t){return e[k]==t}function A(e){while((e=e.previousSibling)&&!M(e))continue;return e}function O(e){while((e=e.nextSibling)&&!M(e))continue;return e}function M(e){return Boolean(e.nodeType==a&&e.tagName!="!")}function _(e,t){e[e.length]=t}var e="1.0.1";var t=/^[^>\+~\s]/;var n=/[\s>\+~:@#\.]|[^\s>\+~:@#\.]+/g;var r=/\|/;var i=/([\s>\+~\,]|^)([\.:#@])/g;var s="$1*$2";var o=/^\s+|\s*([\+\,>\s;:])\s*|\s+$/g;var u="$1";var a=1;var f=3;var l=9;var c=/MSIE/.test(navigator.appVersion),h;var p={};d.caching=false;d.reset=function(){p={}};d.toString=function(){return"function cssQuery() {\n  [version "+e+"]\n}"};var v=c?function(e){if(e.nodeType!=l)e=e.document;return e.mimeType=="XML Document"}:function(e){if(e.nodeType==l)e=e.documentElement;return e.localName!="HTML"};var y={link:function(e){for(var t=0;t<document.links;t++){if(document.links[t]==e)return true}},visited:function(e){},"first-child":function(e){return!A(e)},"last-child":function(e){return!O(e)},root:function(e){var t=e.ownerDocument||e.document;return Boolean(e==t.documentElement)},empty:function(e){for(var t=0;t<e.childNodes.length;t++){if(M(e.childNodes[t])||e.childNodes[t].nodeType==f)return false}return true}};var b=/([\'\"])[^\1]*\1/;var S=[];x.prototype.toString=function(){return x.PREFIX+this.id};x.PREFIX="@";x.ALL=/\[([^~|=\]]+)([~|]?=?)([^\]]+)?\]/g;x.ID=function(e,t,n,r){return new x(t,n,r)};var N=c?function(e,t){return t=="*"&&e.all?e.all:e.getElementsByTagName(t)}:function(e,t,n){return n?e.getElementsByTagNameNS("*",t):e.getElementsByTagName(t)};var k=c?"scopeName":"prefix";if("i".replace(/i/,function(){return""})){var D=String.prototype.replace;var P=function(e,t){var n,r="",i=this;while(n=e.exec(i)){r+=i.slice(0,n.index)+t(n[0],n[1],n[2],n[3],n[4]);i=i.slice(n.lastIndex)}return r+i};String.prototype.replace=function(e,t){this.replace=typeof t=="function"?P:D;return this.replace(e,t)}}return d}();CSS3Utility.prototype.XBrowserAddEventHandler=function(target,eventName,handlerName){if(!target)return;if(target.addEventListener){target.addEventListener(eventName,function(e){eval(handlerName)(e)},false)}else if(target.attachEvent){target.attachEvent("on"+eventName,function(e){eval(handlerName)(e)})}else{var originalHandler=target["on"+eventName];if(originalHandler){target["on"+eventName]=function(e){originalHandler(e);eval(handlerName)(e)}}else{target["on"+eventName]=eval(handlerName)}}var l=this.handlerList.length;this.handlerList[l]=new Array(2);this.handlerList[l][0]=target.id;this.handlerList[l][1]=eventName};CSS3Utility.prototype.getPseudoCssRules=function(e,t){this.cssRules=new Array;var n=e.replace("-","-")+"[\\s]*:[\\s]*([^;}]*)[;}]";var r="$";var i=new RegExp(n,"g");var s=i.exec(t);var o=0;while(s){var u=t.substr(0,t.substr(0,t.indexOf(s[0])).lastIndexOf("{"));var a=u.substr(u.lastIndexOf("}")+1).replace(/^\s*|\s*$/g,"");this.cssRules[o]=new Object;this.cssRules[o].selectorText=a;this.cssRules[o].property=e;this.cssRules[o].value=s[1].replace(/(\r?\n)*/g,"");o++;s=i.exec(t)}};CSS3Utility.prototype.randomId=function(){var e="";for(var t=0;t<6;t++)e+=String.fromCharCode(97+Math.floor(Math.random()*24));return e};CSS3Utility.prototype.debug=function(e){var t=document.getElementById("debugOutput");if(typeof t!="undefined"&&t){t.innerHTML+=e}};var css3MC=new CSS3MultiColumn;