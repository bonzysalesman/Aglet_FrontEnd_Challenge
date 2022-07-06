/*! modernizr 3.3.1 (Custom Build) | MIT *
 * https://modernizr.com/download/?-applicationcache-audio-backgroundsize-borderimage-borderradius-boxshadow-canvas-canvastext-cssanimations-csscolumns-cssgradients-cssreflections-csstransforms-csstransforms3d-csstransitions-flexbox-fontface-generatedcontent-geolocation-hashchange-history-hsla-indexeddb-inlinesvg-input-inputtypes-localstorage-multiplebgs-opacity-postmessage-rgba-sessionstorage-smil-svg-svgclippaths-textshadow-video-webgl-websockets-websqldatabase-webworkers-addtest-mq-setclasses-shiv !*/
! function(e, t, n) {
    function r(e) {
        var t = x.className,
            n = Modernizr._config.classPrefix || "";
        if (T && (t = t.baseVal), Modernizr._config.enableJSClass) {
            var r = new RegExp("(^|\\s)" + n + "no-js(\\s|$)");
            t = t.replace(r, "$1" + n + "js$2")
        }
        Modernizr._config.enableClasses && (t += " " + n + e.join(" " + n), T ? x.className.baseVal = t : x.className = t)
    }

    function a(e, t) {
        return typeof e === t
    }

    function o() {
        var e, t, n, r, o, i, s;
        for (var c in w)
            if (w.hasOwnProperty(c)) {
                if (e = [], t = w[c], t.name && (e.push(t.name.toLowerCase()), t.options && t.options.aliases && t.options.aliases.length))
                    for (n = 0; n < t.options.aliases.length; n++) e.push(t.options.aliases[n].toLowerCase());
                for (r = a(t.fn, "function") ? t.fn() : t.fn, o = 0; o < e.length; o++) i = e[o], s = i.split("."), 1 === s.length ? Modernizr[s[0]] = r : (!Modernizr[s[0]] || Modernizr[s[0]] instanceof Boolean || (Modernizr[s[0]] = new Boolean(Modernizr[s[0]])), Modernizr[s[0]][s[1]] = r), b.push((r ? "" : "no-") + s.join("-"))
            }
    }

    function i(e, t) {
        if ("object" == typeof e)
            for (var n in e) k(e, n) && i(n, e[n]);
        else {
            e = e.toLowerCase();
            var a = e.split("."),
                o = Modernizr[a[0]];
            if (2 == a.length && (o = o[a[1]]), "undefined" != typeof o) return Modernizr;
            t = "function" == typeof t ? t() : t, 1 == a.length ? Modernizr[a[0]] = t : (!Modernizr[a[0]] || Modernizr[a[0]] instanceof Boolean || (Modernizr[a[0]] = new Boolean(Modernizr[a[0]])), Modernizr[a[0]][a[1]] = t), r([(t && 0 != t ? "" : "no-") + a.join("-")]), Modernizr._trigger(e, t)
        }
        return Modernizr
    }

    function s() {
        return "function" != typeof t.createElement ? t.createElement(arguments[0]) : T ? t.createElementNS.call(t, "http://www.w3.org/2000/svg", arguments[0]) : t.createElement.apply(t, arguments)
    }

    function c(e, t) {
        return !!~("" + e).indexOf(t)
    }

    function l() {
        var e = t.body;
        return e || (e = s(T ? "svg" : "body"), e.fake = !0), e
    }

    function d(e, n, r, a) {
        var o, i, c, d, u = "modernizr",
            f = s("div"),
            p = l();
        if (parseInt(r, 10))
            for (; r--;) c = s("div"), c.id = a ? a[r] : u + (r + 1), f.appendChild(c);
        return o = s("style"), o.type = "text/css", o.id = "s" + u, (p.fake ? p : f).appendChild(o), p.appendChild(f), o.styleSheet ? o.styleSheet.cssText = e : o.appendChild(t.createTextNode(e)), f.id = u, p.fake && (p.style.background = "", p.style.overflow = "hidden", d = x.style.overflow, x.style.overflow = "hidden", x.appendChild(p)), i = n(f, e), p.fake ? (p.parentNode.removeChild(p), x.style.overflow = d, x.offsetHeight) : f.parentNode.removeChild(f), !!i
    }

    function u(e) {
        return e.replace(/([a-z])-([a-z])/g, function(e, t, n) {
            return t + n.toUpperCase()
        }).replace(/^-/, "")
    }

    function f(e, t) {
        return function() {
            return e.apply(t, arguments)
        }
    }

    function p(e, t, n) {
        var r;
        for (var o in e)
            if (e[o] in t) return n === !1 ? e[o] : (r = t[e[o]], a(r, "function") ? f(r, n || t) : r);
        return !1
    }

    function m(e) {
        return e.replace(/([A-Z])/g, function(e, t) {
            return "-" + t.toLowerCase()
        }).replace(/^ms-/, "-ms-")
    }

    function g(t, r) {
        var a = t.length;
        if ("CSS" in e && "supports" in e.CSS) {
            for (; a--;)
                if (e.CSS.supports(m(t[a]), r)) return !0;
            return !1
        }
        if ("CSSSupportsRule" in e) {
            for (var o = []; a--;) o.push("(" + m(t[a]) + ":" + r + ")");
            return o = o.join(" or "), d("@supports (" + o + ") { #modernizr { position: absolute; } }", function(e) {
                return "absolute" == getComputedStyle(e, null).position
            })
        }
        return n
    }

    function h(e, t, r, o) {
        function i() {
            d && (delete H.style, delete H.modElem)
        }
        if (o = a(o, "undefined") ? !1 : o, !a(r, "undefined")) {
            var l = g(e, r);
            if (!a(l, "undefined")) return l
        }
        for (var d, f, p, m, h, v = ["modernizr", "tspan", "samp"]; !H.style && v.length;) d = !0, H.modElem = s(v.shift()), H.style = H.modElem.style;
        for (p = e.length, f = 0; p > f; f++)
            if (m = e[f], h = H.style[m], c(m, "-") && (m = u(m)), H.style[m] !== n) {
                if (o || a(r, "undefined")) return i(), "pfx" == t ? m : !0;
                try {
                    H.style[m] = r
                } catch (y) {}
                if (H.style[m] != h) return i(), "pfx" == t ? m : !0
            }
        return i(), !1
    }

    function v(e, t, n, r, o) {
        var i = e.charAt(0).toUpperCase() + e.slice(1),
            s = (e + " " + W.join(i + " ") + i).split(" ");
        return a(t, "string") || a(t, "undefined") ? h(s, t, r, o) : (s = (e + " " + D.join(i + " ") + i).split(" "), p(s, t, n))
    }

    function y(e, t, r) {
        return v(e, n, n, t, r)
    }
    var b = [],
        x = t.documentElement,
        T = "svg" === x.nodeName.toLowerCase();
    T || ! function(e, t) {
        function n(e, t) {
            var n = e.createElement("p"),
                r = e.getElementsByTagName("head")[0] || e.documentElement;
            return n.innerHTML = "x<style>" + t + "</style>", r.insertBefore(n.lastChild, r.firstChild)
        }

        function r() {
            var e = b.elements;
            return "string" == typeof e ? e.split(" ") : e
        }

        function a(e, t) {
            var n = b.elements;
            "string" != typeof n && (n = n.join(" ")), "string" != typeof e && (e = e.join(" ")), b.elements = n + " " + e, l(t)
        }

        function o(e) {
            var t = y[e[h]];
            return t || (t = {}, v++, e[h] = v, y[v] = t), t
        }

        function i(e, n, r) {
            if (n || (n = t), u) return n.createElement(e);
            r || (r = o(n));
            var a;
            return a = r.cache[e] ? r.cache[e].cloneNode() : g.test(e) ? (r.cache[e] = r.createElem(e)).cloneNode() : r.createElem(e), !a.canHaveChildren || m.test(e) || a.tagUrn ? a : r.frag.appendChild(a)
        }

        function s(e, n) {
            if (e || (e = t), u) return e.createDocumentFragment();
            n = n || o(e);
            for (var a = n.frag.cloneNode(), i = 0, s = r(), c = s.length; c > i; i++) a.createElement(s[i]);
            return a
        }

        function c(e, t) {
            t.cache || (t.cache = {}, t.createElem = e.createElement, t.createFrag = e.createDocumentFragment, t.frag = t.createFrag()), e.createElement = function(n) {
                return b.shivMethods ? i(n, e, t) : t.createElem(n)
            }, e.createDocumentFragment = Function("h,f", "return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&(" + r().join().replace(/[\w\-:]+/g, function(e) {
                return t.createElem(e), t.frag.createElement(e), 'c("' + e + '")'
            }) + ");return n}")(b, t.frag)
        }

        function l(e) {
            e || (e = t);
            var r = o(e);
            return !b.shivCSS || d || r.hasCSS || (r.hasCSS = !!n(e, "article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")), u || c(e, r), e
        }
        var d, u, f = "3.7.3",
            p = e.html5 || {},
            m = /^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,
            g = /^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,
            h = "_html5shiv",
            v = 0,
            y = {};
        ! function() {
            try {
                var e = t.createElement("a");
                e.innerHTML = "<xyz></xyz>", d = "hidden" in e, u = 1 == e.childNodes.length || function() {
                    t.createElement("a");
                    var e = t.createDocumentFragment();
                    return "undefined" == typeof e.cloneNode || "undefined" == typeof e.createDocumentFragment || "undefined" == typeof e.createElement
                }()
            } catch (n) {
                d = !0, u = !0
            }
        }();
        var b = {
            elements: p.elements || "abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video",
            version: f,
            shivCSS: p.shivCSS !== !1,
            supportsUnknownElements: u,
            shivMethods: p.shivMethods !== !1,
            type: "default",
            shivDocument: l,
            createElement: i,
            createDocumentFragment: s,
            addElements: a
        };
        e.html5 = b, l(t), "object" == typeof module && module.exports && (module.exports = b)
    }("undefined" != typeof e ? e : this, t);
    var w = [],
        S = {
            _version: "3.3.1",
            _config: {
                classPrefix: "",
                enableClasses: !0,
                enableJSClass: !0,
                usePrefixes: !0
            },
            _q: [],
            on: function(e, t) {
                var n = this;
                setTimeout(function() {
                    t(n[e])
                }, 0)
            },
            addTest: function(e, t, n) {
                w.push({
                    name: e,
                    fn: t,
                    options: n
                })
            },
            addAsyncTest: function(e) {
                w.push({
                    name: null,
                    fn: e
                })
            }
        },
        Modernizr = function() {};
    Modernizr.prototype = S, Modernizr = new Modernizr, Modernizr.addTest("applicationcache", "applicationCache" in e), Modernizr.addTest("geolocation", "geolocation" in navigator), Modernizr.addTest("history", function() {
        var t = navigator.userAgent;
        return -1 === t.indexOf("Android 2.") && -1 === t.indexOf("Android 4.0") || -1 === t.indexOf("Mobile Safari") || -1 !== t.indexOf("Chrome") || -1 !== t.indexOf("Windows Phone") ? e.history && "pushState" in e.history : !1
    }), Modernizr.addTest("postmessage", "postMessage" in e), Modernizr.addTest("svg", !!t.createElementNS && !!t.createElementNS("http://www.w3.org/2000/svg", "svg").createSVGRect);
    var C = !1;
    try {
        C = "WebSocket" in e && 2 === e.WebSocket.CLOSING
    } catch (E) {}
    Modernizr.addTest("websockets", C), Modernizr.addTest("localstorage", function() {
        var e = "modernizr";
        try {
            return localStorage.setItem(e, e), localStorage.removeItem(e), !0
        } catch (t) {
            return !1
        }
    }), Modernizr.addTest("sessionstorage", function() {
        var e = "modernizr";
        try {
            return sessionStorage.setItem(e, e), sessionStorage.removeItem(e), !0
        } catch (t) {
            return !1
        }
    }), Modernizr.addTest("websqldatabase", "openDatabase" in e), Modernizr.addTest("webworkers", "Worker" in e);
    var k;
    ! function() {
        var e = {}.hasOwnProperty;
        k = a(e, "undefined") || a(e.call, "undefined") ? function(e, t) {
            return t in e && a(e.constructor.prototype[t], "undefined")
        } : function(t, n) {
            return e.call(t, n)
        }
    }(), S._l = {}, S.on = function(e, t) {
        this._l[e] || (this._l[e] = []), this._l[e].push(t), Modernizr.hasOwnProperty(e) && setTimeout(function() {
            Modernizr._trigger(e, Modernizr[e])
        }, 0)
    }, S._trigger = function(e, t) {
        if (this._l[e]) {
            var n = this._l[e];
            setTimeout(function() {
                var e, r;
                for (e = 0; e < n.length; e++)(r = n[e])(t)
            }, 0), delete this._l[e]
        }
    }, Modernizr._q.push(function() {
        S.addTest = i
    }), Modernizr.addTest("audio", function() {
        var e = s("audio"),
            t = !1;
        try {
            (t = !!e.canPlayType) && (t = new Boolean(t), t.ogg = e.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/, ""), t.mp3 = e.canPlayType('audio/mpeg; codecs="mp3"').replace(/^no$/, ""), t.opus = e.canPlayType('audio/ogg; codecs="opus"') || e.canPlayType('audio/webm; codecs="opus"').replace(/^no$/, ""), t.wav = e.canPlayType('audio/wav; codecs="1"').replace(/^no$/, ""), t.m4a = (e.canPlayType("audio/x-m4a;") || e.canPlayType("audio/aac;")).replace(/^no$/, ""))
        } catch (n) {}
        return t
    }), Modernizr.addTest("canvas", function() {
        var e = s("canvas");
        return !(!e.getContext || !e.getContext("2d"))
    }), Modernizr.addTest("canvastext", function() {
        return Modernizr.canvas === !1 ? !1 : "function" == typeof s("canvas").getContext("2d").fillText
    }), Modernizr.addTest("video", function() {
        var e = s("video"),
            t = !1;
        try {
            (t = !!e.canPlayType) && (t = new Boolean(t), t.ogg = e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/, ""), t.h264 = e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/, ""), t.webm = e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/, ""), t.vp9 = e.canPlayType('video/webm; codecs="vp9"').replace(/^no$/, ""), t.hls = e.canPlayType('application/x-mpegURL; codecs="avc1.42E01E"').replace(/^no$/, ""))
        } catch (n) {}
        return t
    }), Modernizr.addTest("webgl", function() {
        var t = s("canvas"),
            n = "probablySupportsContext" in t ? "probablySupportsContext" : "supportsContext";
        return n in t ? t[n]("webgl") || t[n]("experimental-webgl") : "WebGLRenderingContext" in e
    }), Modernizr.addTest("multiplebgs", function() {
        var e = s("a").style;
        return e.cssText = "background:url(https://),url(https://),red url(https://)", /(url\s*\(.*?){3}/.test(e.background)
    }), Modernizr.addTest("rgba", function() {
        var e = s("a").style;
        return e.cssText = "background-color:rgba(150,255,150,.5)", ("" + e.backgroundColor).indexOf("rgba") > -1
    }), Modernizr.addTest("inlinesvg", function() {
        var e = s("div");
        return e.innerHTML = "<svg/>", "http://www.w3.org/2000/svg" == ("undefined" != typeof SVGRect && e.firstChild && e.firstChild.namespaceURI)
    });
    var _ = function() {
        function e(e, t) {
            var a;
            return e ? (t && "string" != typeof t || (t = s(t || "div")), e = "on" + e, a = e in t, !a && r && (t.setAttribute || (t = s("div")), t.setAttribute(e, ""), a = "function" == typeof t[e], t[e] !== n && (t[e] = n), t.removeAttribute(e)), a) : !1
        }
        var r = !("onblur" in t.documentElement);
        return e
    }();
    S.hasEvent = _, Modernizr.addTest("hashchange", function() {
        return _("hashchange", e) === !1 ? !1 : t.documentMode === n || t.documentMode > 7
    });
    var P = s("input"),
        N = "autocomplete autofocus list placeholder max min multiple pattern required step".split(" "),
        z = {};
    Modernizr.input = function(t) {
        for (var n = 0, r = t.length; r > n; n++) z[t[n]] = !!(t[n] in P);
        return z.list && (z.list = !(!s("datalist") || !e.HTMLDataListElement)), z
    }(N);
    var R = "search tel url email datetime date month week time datetime-local number range color".split(" "),
        $ = {};
    Modernizr.inputtypes = function(e) {
        for (var r, a, o, i = e.length, s = "1)", c = 0; i > c; c++) P.setAttribute("type", r = e[c]), o = "text" !== P.type && "style" in P, o && (P.value = s, P.style.cssText = "position:absolute;visibility:hidden;", /^range$/.test(r) && P.style.WebkitAppearance !== n ? (x.appendChild(P), a = t.defaultView, o = a.getComputedStyle && "textfield" !== a.getComputedStyle(P, null).WebkitAppearance && 0 !== P.offsetHeight, x.removeChild(P)) : /^(search|tel)$/.test(r) || (o = /^(url|email)$/.test(r) ? P.checkValidity && P.checkValidity() === !1 : P.value != s)), $[e[c]] = !!o;
        return $
    }(R);
    var A = S._config.usePrefixes ? " -webkit- -moz- -o- -ms- ".split(" ") : ["", ""];
    S._prefixes = A, Modernizr.addTest("cssgradients", function() {
        for (var e, t = "background-image:", n = "gradient(linear,left top,right bottom,from(#9f9),to(white));", r = "", a = 0, o = A.length - 1; o > a; a++) e = 0 === a ? "to " : "", r += t + A[a] + "linear-gradient(" + e + "left top, #9f9, white);";
        Modernizr._config.usePrefixes && (r += t + "-webkit-" + n);
        var i = s("a"),
            c = i.style;
        return c.cssText = r, ("" + c.backgroundImage).indexOf("gradient") > -1
    }), Modernizr.addTest("opacity", function() {
        var e = s("a").style;
        return e.cssText = A.join("opacity:.55;"), /^0.55$/.test(e.opacity)
    }), Modernizr.addTest("hsla", function() {
        var e = s("a").style;
        return e.cssText = "background-color:hsla(120,40%,100%,.5)", c(e.backgroundColor, "rgba") || c(e.backgroundColor, "hsla")
    });
    var O = "CSS" in e && "supports" in e.CSS,
        L = "supportsCSS" in e;
    Modernizr.addTest("supports", O || L);
    var M = {}.toString;
    Modernizr.addTest("svgclippaths", function() {
        return !!t.createElementNS && /SVGClipPath/.test(M.call(t.createElementNS("http://www.w3.org/2000/svg", "clipPath")))
    }), Modernizr.addTest("smil", function() {
        return !!t.createElementNS && /SVGAnimate/.test(M.call(t.createElementNS("http://www.w3.org/2000/svg", "animate")))
    });
    var B = function() {
        var t = e.matchMedia || e.msMatchMedia;
        return t ? function(e) {
            var n = t(e);
            return n && n.matches || !1
        } : function(t) {
            var n = !1;
            return d("@media " + t + " { #modernizr { position: absolute; } }", function(t) {
                n = "absolute" == (e.getComputedStyle ? e.getComputedStyle(t, null) : t.currentStyle).position
            }), n
        }
    }();
    S.mq = B;
    var j = S.testStyles = d;
    j('#modernizr{font:0/0 a}#modernizr:after{content:":)";visibility:hidden;font:7px/1 a}', function(e) {
        Modernizr.addTest("generatedcontent", e.offsetHeight >= 7)
    });
    var F = function() {
        var e = navigator.userAgent,
            t = e.match(/applewebkit\/([0-9]+)/gi) && parseFloat(RegExp.$1),
            n = e.match(/w(eb)?osbrowser/gi),
            r = e.match(/windows phone/gi) && e.match(/iemobile\/([0-9])+/gi) && parseFloat(RegExp.$1) >= 9,
            a = 533 > t && e.match(/android/gi);
        return n || a || r
    }();
    F ? Modernizr.addTest("fontface", !1) : j('@font-face {font-family:"font";src:url("https://")}', function(e, n) {
        var r = t.getElementById("smodernizr"),
            a = r.sheet || r.styleSheet,
            o = a ? a.cssRules && a.cssRules[0] ? a.cssRules[0].cssText : a.cssText || "" : "",
            i = /src/i.test(o) && 0 === o.indexOf(n.split(" ")[0]);
        Modernizr.addTest("fontface", i)
    });
    var I = "Moz O ms Webkit",
        D = S._config.usePrefixes ? I.toLowerCase().split(" ") : [];
    S._domPrefixes = D;
    var W = S._config.usePrefixes ? I.split(" ") : [];
    S._cssomPrefixes = W;
    var q = function(t) {
        var r, a = A.length,
            o = e.CSSRule;
        if ("undefined" == typeof o) return n;
        if (!t) return !1;
        if (t = t.replace(/^@/, ""), r = t.replace(/-/g, "_").toUpperCase() + "_RULE", r in o) return "@" + t;
        for (var i = 0; a > i; i++) {
            var s = A[i],
                c = s.toUpperCase() + "_" + r;
            if (c in o) return "@-" + s.toLowerCase() + "-" + t
        }
        return !1
    };
    S.atRule = q;
    var V = {
        elem: s("modernizr")
    };
    Modernizr._q.push(function() {
        delete V.elem
    });
    var H = {
        style: V.elem.style
    };
    Modernizr._q.unshift(function() {
        delete H.style
    });
    var U = S.testProp = function(e, t, r) {
        return h([e], n, t, r)
    };
    Modernizr.addTest("textshadow", U("textShadow", "1px 1px")), S.testAllProps = v;
    var G, J = S.prefixed = function(e, t, n) {
        return 0 === e.indexOf("@") ? q(e) : (-1 != e.indexOf("-") && (e = u(e)), t ? v(e, t, n) : v(e, "pfx"))
    };
    try {
        G = J("indexedDB", e)
    } catch (E) {}
    Modernizr.addTest("indexeddb", !!G), G && Modernizr.addTest("indexeddb.deletedatabase", "deleteDatabase" in G), S.testAllProps = y, Modernizr.addTest("cssanimations", y("animationName", "a", !0)), Modernizr.addTest("backgroundsize", y("backgroundSize", "100%", !0)), Modernizr.addTest("borderimage", y("borderImage", "url() 1", !0)), Modernizr.addTest("boxshadow", y("boxShadow", "1px 1px", !0)), Modernizr.addTest("borderradius", y("borderRadius", "0px", !0)),
        function() {
            Modernizr.addTest("csscolumns", function() {
                var e = !1,
                    t = y("columnCount");
                try {
                    (e = !!t) && (e = new Boolean(e))
                } catch (n) {}
                return e
            });
            for (var e, t, n = ["Width", "Span", "Fill", "Gap", "Rule", "RuleColor", "RuleStyle", "RuleWidth", "BreakBefore", "BreakAfter", "BreakInside"], r = 0; r < n.length; r++) e = n[r].toLowerCase(), t = y("column" + n[r]), ("breakbefore" === e || "breakafter" === e || "breakinside" == e) && (t = t || y(n[r])), Modernizr.addTest("csscolumns." + e, t)
        }(), Modernizr.addTest("flexbox", y("flexBasis", "1px", !0)), Modernizr.addTest("cssreflections", y("boxReflect", "above", !0)), Modernizr.addTest("csstransforms", function() {
            return -1 === navigator.userAgent.indexOf("Android 2.") && y("transform", "scale(1)", !0)
        }), Modernizr.addTest("csstransforms3d", function() {
            var e = !!y("perspective", "1px", !0),
                t = Modernizr._config.usePrefixes;
            if (e && (!t || "webkitPerspective" in x.style)) {
                var n, r = "#modernizr{width:0;height:0}";
                Modernizr.supports ? n = "@supports (perspective: 1px)" : (n = "@media (transform-3d)", t && (n += ",(-webkit-transform-3d)")), n += "{#modernizr{width:7px;height:18px;margin:0;padding:0;border:0}}", j(r + n, function(t) {
                    e = 7 === t.offsetWidth && 18 === t.offsetHeight
                })
            }
            return e
        }), Modernizr.addTest("csstransitions", y("transition", "all", !0)), o(), r(b), delete S.addTest, delete S.addAsyncTest;
    for (var Z = 0; Z < Modernizr._q.length; Z++) Modernizr._q[Z]();
    e.Modernizr = Modernizr
}(window, document);