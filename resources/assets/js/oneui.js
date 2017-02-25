/*!
* OneUI - v3.1.0 - Auto-compiled on 2017-01-16 - Copyright 2017 
* @author pixelcave
*/
+function(a) {
    a.fn.extend({
        slimScroll: function(b) {
            var c = a.extend({
                width: "auto",
                height: "250px",
                size: "7px",
                color: "#000",
                position: "right",
                distance: "1px",
                start: "top",
                opacity: .4,
                alwaysVisible: !1,
                disableFadeOut: !1,
                railVisible: !1,
                railColor: "#333",
                railOpacity: .2,
                railDraggable: !0,
                railClass: "slimScrollRail",
                barClass: "slimScrollBar",
                wrapperClass: "slimScrollDiv",
                allowPageScroll: !1,
                wheelStep: 20,
                touchScrollStep: 200,
                borderRadius: "7px",
                railBorderRadius: "7px"
            }, b);
            return this.each(function() {
                function d(b) {
                    if (i) {
                        b = b || window.event;
                        var d = 0;
                        b.wheelDelta && (d = -b.wheelDelta / 120),
                        b.detail && (d = b.detail / 3),
                        a(b.target || b.srcTarget || b.srcElement).closest("." + c.wrapperClass).is(r.parent()) && e(d, !0),
                        b.preventDefault && !q && b.preventDefault(),
                        q || (b.returnValue = !1)
                    }
                }
                function e(a, b, d) {
                    q = !1;
                    var e = a
                      , f = r.outerHeight() - u.outerHeight();
                    b && (e = parseInt(u.css("top")) + a * parseInt(c.wheelStep) / 100 * u.outerHeight(),
                    e = Math.min(Math.max(e, 0), f),
                    e = 0 < a ? Math.ceil(e) : Math.floor(e),
                    u.css({
                        top: e + "px"
                    })),
                    o = parseInt(u.css("top")) / (r.outerHeight() - u.outerHeight()),
                    e = o * (r[0].scrollHeight - r.outerHeight()),
                    d && (e = a,
                    a = e / r[0].scrollHeight * r.outerHeight(),
                    a = Math.min(Math.max(a, 0), f),
                    u.css({
                        top: a + "px"
                    })),
                    r.scrollTop(e),
                    r.trigger("slimscrolling", ~~e),
                    g(),
                    h()
                }
                function f() {
                    n = Math.max(r.outerHeight() / r[0].scrollHeight * r.outerHeight(), 30),
                    u.css({
                        height: n + "px"
                    });
                    var a = n == r.outerHeight() ? "none" : "block";
                    u.css({
                        display: a
                    })
                }
                function g() {
                    f(),
                    clearTimeout(l),
                    o == ~~o ? (q = c.allowPageScroll,
                    p != o && r.trigger("slimscroll", 0 == ~~o ? "top" : "bottom")) : q = !1,
                    p = o,
                    n >= r.outerHeight() ? q = !0 : (u.stop(!0, !0).fadeIn("fast"),
                    c.railVisible && v.stop(!0, !0).fadeIn("fast"))
                }
                function h() {
                    c.alwaysVisible || (l = setTimeout(function() {
                        c.disableFadeOut && i || j || k || (u.fadeOut("slow"),
                        v.fadeOut("slow"))
                    }, 1e3))
                }
                var i, j, k, l, m, n, o, p, q = !1, r = a(this);
                if (r.parent().hasClass(c.wrapperClass)) {
                    var s = r.scrollTop()
                      , u = r.siblings("." + c.barClass)
                      , v = r.siblings("." + c.railClass);
                    if (f(),
                    a.isPlainObject(b)) {
                        if ("height"in b && "auto" == b.height) {
                            r.parent().css("height", "auto"),
                            r.css("height", "auto");
                            var w = r.parent().parent().height();
                            r.parent().css("height", w),
                            r.css("height", w)
                        } else
                            "height"in b && (w = b.height,
                            r.parent().css("height", w),
                            r.css("height", w));
                        if ("scrollTo"in b)
                            s = parseInt(c.scrollTo);
                        else if ("scrollBy"in b)
                            s += parseInt(c.scrollBy);
                        else if ("destroy"in b)
                            return u.remove(),
                            v.remove(),
                            void r.unwrap();
                        e(s, !1, !0)
                    }
                } else if (!(a.isPlainObject(b) && "destroy"in b)) {
                    c.height = "auto" == c.height ? r.parent().height() : c.height,
                    s = a("<div></div>").addClass(c.wrapperClass).css({
                        position: "relative",
                        overflow: "hidden",
                        width: c.width,
                        height: c.height
                    }),
                    r.css({
                        overflow: "hidden",
                        width: c.width,
                        height: c.height
                    });
                    var v = a("<div></div>").addClass(c.railClass).css({
                        width: c.size,
                        height: "100%",
                        position: "absolute",
                        top: 0,
                        display: c.alwaysVisible && c.railVisible ? "block" : "none",
                        "border-radius": c.railBorderRadius,
                        background: c.railColor,
                        opacity: c.railOpacity,
                        zIndex: 90
                    })
                      , u = a("<div></div>").addClass(c.barClass).css({
                        background: c.color,
                        width: c.size,
                        position: "absolute",
                        top: 0,
                        opacity: c.opacity,
                        display: c.alwaysVisible ? "block" : "none",
                        "border-radius": c.borderRadius,
                        BorderRadius: c.borderRadius,
                        MozBorderRadius: c.borderRadius,
                        WebkitBorderRadius: c.borderRadius,
                        zIndex: 99
                    })
                      , w = "right" == c.position ? {
                        right: c.distance
                    } : {
                        left: c.distance
                    };
                    v.css(w),
                    u.css(w),
                    r.wrap(s),
                    r.parent().append(u),
                    r.parent().append(v),
                    c.railDraggable && u.bind("mousedown", function(b) {
                        var c = a(document);
                        return k = !0,
                        t = parseFloat(u.css("top")),
                        pageY = b.pageY,
                        c.bind("mousemove.slimscroll", function(a) {
                            currTop = t + a.pageY - pageY,
                            u.css("top", currTop),
                            e(0, u.position().top, !1)
                        }),
                        c.bind("mouseup.slimscroll", function(a) {
                            k = !1,
                            h(),
                            c.unbind(".slimscroll")
                        }),
                        !1
                    }).bind("selectstart.slimscroll", function(a) {
                        return a.stopPropagation(),
                        a.preventDefault(),
                        !1
                    }),
                    v.hover(function() {
                        g()
                    }, function() {
                        h()
                    }),
                    u.hover(function() {
                        j = !0
                    }, function() {
                        j = !1
                    }),
                    r.hover(function() {
                        i = !0,
                        g(),
                        h()
                    }, function() {
                        i = !1,
                        h()
                    }),
                    r.bind("touchstart", function(a, b) {
                        a.originalEvent.touches.length && (m = a.originalEvent.touches[0].pageY)
                    }),
                    r.bind("touchmove", function(a) {
                        q || a.originalEvent.preventDefault(),
                        a.originalEvent.touches.length && (e((m - a.originalEvent.touches[0].pageY) / c.touchScrollStep, !0),
                        m = a.originalEvent.touches[0].pageY)
                    }),
                    f(),
                    "bottom" === c.start ? (u.css({
                        top: r.outerHeight() - u.outerHeight()
                    }),
                    e(0, !0)) : "top" !== c.start && (e(a(c.start).position().top, null , !0),
                    c.alwaysVisible || u.hide()),
                    window.addEventListener ? (this.addEventListener("DOMMouseScroll", d, !1),
                    this.addEventListener("mousewheel", d, !1)) : document.attachEvent("onmousewheel", d)
                }
            }),
            this
        }
    }),
    a.fn.extend({
        slimscroll: a.fn.slimScroll
    })
}(jQuery),
function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : a(jQuery)
}(function(a) {
    "use strict";
    var b, c = function(b, d) {
        this.$element = b,
        this.options = a.extend({}, c.DEFAULTS, this.$element.data(), d),
        this.enabled = !0,
        this.startClientY = 0,
        this.$element.on(c.CORE.wheelEventName + c.NAMESPACE, this.options.selector, a.proxy(c.CORE.handler, this)),
        this.options.touch && (this.$element.on("touchstart" + c.NAMESPACE, this.options.selector, a.proxy(c.CORE.touchHandler, this)),
        this.$element.on("touchmove" + c.NAMESPACE, this.options.selector, a.proxy(c.CORE.handler, this)))
    }
    ;
    c.NAME = "ScrollLock",
    c.VERSION = "2.1.0",
    c.NAMESPACE = ".scrollLock",
    c.ANIMATION_NAMESPACE = c.NAMESPACE + ".effect",
    c.DEFAULTS = {
        strict: !1,
        strictFn: function(a) {
            return a.prop("scrollHeight") > a.prop("clientHeight")
        },
        selector: !1,
        animation: !1,
        touch: "ontouchstart"in window
    },
    c.CORE = {
        wheelEventName: "onmousewheel"in window ? "ActiveXObject"in window ? "wheel" : "mousewheel" : "DOMMouseScroll",
        animationEventName: ["webkitAnimationEnd", "mozAnimationEnd", "MSAnimationEnd", "oanimationend", "animationend"].join(c.ANIMATION_NAMESPACE + " ") + c.ANIMATION_NAMESPACE,
        handler: function(b) {
            var d, e, f, g;
            if (this.enabled && !b.ctrlKey && (d = a(b.currentTarget),
            this.options.strict !== !0 || this.options.strictFn(d))) {
                b.stopPropagation();
                var h = d.scrollTop()
                  , i = d.prop("scrollHeight")
                  , j = d.prop("clientHeight")
                  , k = b.originalEvent.wheelDelta || -1 * b.originalEvent.detail || -1 * b.originalEvent.deltaY
                  , l = 0;
                "wheel" === b.type ? (e = d.height() / a(window).height(),
                l = b.originalEvent.deltaY * e) : this.options.touch && "touchmove" === b.type && (k = b.originalEvent.changedTouches[0].clientY - this.startClientY),
                ((f = k > 0 && h + l <= 0) || k < 0 && h + l >= i - j) && (b.preventDefault(),
                l && d.scrollTop(h + l),
                g = f ? "top" : "bottom",
                this.options.animation && setTimeout(c.CORE.animationHandler.bind(this, d, g), 0),
                d.trigger(a.Event(g + c.NAMESPACE)))
            }
        },
        touchHandler: function(a) {
            this.startClientY = a.originalEvent.touches[0].clientY
        },
        animationHandler: function(a, b) {
            var d = this.options.animation[b]
              , e = this.options.animation.top + " " + this.options.animation.bottom;
            a.off(c.ANIMATION_NAMESPACE).removeClass(e).addClass(d).one(c.CORE.animationEventName, function() {
                a.removeClass(d)
            })
        }
    },
    c.prototype.toggleStrict = function() {
        this.options.strict = !this.options.strict
    }
    ,
    c.prototype.enable = function() {
        this.enabled = !0
    }
    ,
    c.prototype.disable = function() {
        this.enabled = !1
    }
    ,
    c.prototype.destroy = function() {
        this.disable(),
        this.$element.off(c.NAMESPACE),
        this.$element = null ,
        this.options = null
    }
    ,
    b = a.fn.scrollLock,
    a.fn.scrollLock = function(b) {
        return this.each(function() {
            var d = a(this)
              , e = "object" == typeof b && b
              , f = d.data(c.NAME);
            (f || "destroy" !== b) && (f || d.data(c.NAME, f = new c(d,e)),
            "string" == typeof b && f[b]())
        })
    }
    ,
    a.fn.scrollLock.defaults = c.DEFAULTS,
    a.fn.scrollLock.noConflict = function() {
        return a.fn.scrollLock = b,
        this
    }
}),
!function(a) {
    a.fn.appear = function(b, c) {
        var d = a.extend({
            data: void 0,
            one: !0,
            accX: 0,
            accY: 0
        }, c);
        return this.each(function() {
            var c = a(this);
            if (c.appeared = !1,
            !b)
                return void c.trigger("appear", d.data);
            var e = a(window)
              , f = function() {
                if (!c.is(":visible"))
                    return void (c.appeared = !1);
                var a = e.scrollLeft()
                  , b = e.scrollTop()
                  , f = c.offset()
                  , g = f.left
                  , h = f.top
                  , i = d.accX
                  , j = d.accY
                  , k = c.height()
                  , l = e.height()
                  , m = c.width()
                  , n = e.width();
                h + k + j >= b && b + l + j >= h && g + m + i >= a && a + n + i >= g ? c.appeared || c.trigger("appear", d.data) : c.appeared = !1
            }
              , g = function() {
                if (c.appeared = !0,
                d.one) {
                    e.unbind("scroll", f);
                    var g = a.inArray(f, a.fn.appear.checks);
                    g >= 0 && a.fn.appear.checks.splice(g, 1)
                }
                b.apply(this, arguments)
            }
            ;
            d.one ? c.one("appear", d.data, g) : c.bind("appear", d.data, g),
            e.scroll(f),
            a.fn.appear.checks.push(f),
            f()
        })
    }
    ,
    a.extend(a.fn.appear, {
        checks: [],
        timeout: null ,
        checkAll: function() {
            var b = a.fn.appear.checks.length;
            if (b > 0)
                for (; b--; )
                    a.fn.appear.checks[b]()
        },
        run: function() {
            a.fn.appear.timeout && clearTimeout(a.fn.appear.timeout),
            a.fn.appear.timeout = setTimeout(a.fn.appear.checkAll, 20)
        }
    }),
    a.each(["append", "prepend", "after", "before", "attr", "removeAttr", "addClass", "removeClass", "toggleClass", "remove", "css", "show", "hide"], function(b, c) {
        var d = a.fn[c];
        d && (a.fn[c] = function() {
            var b = d.apply(this, arguments);
            return a.fn.appear.run(),
            b
        }
        )
    })
}(jQuery),
!function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : a("object" == typeof exports ? require("jquery") : jQuery)
}(function(a) {
    function b(a, b) {
        return a.toFixed(b.decimals)
    }
    var c = function(b, d) {
        this.$element = a(b),
        this.options = a.extend({}, c.DEFAULTS, this.dataOptions(), d),
        this.init()
    }
    ;
    c.DEFAULTS = {
        from: 0,
        to: 0,
        speed: 1e3,
        refreshInterval: 100,
        decimals: 0,
        formatter: b,
        onUpdate: null ,
        onComplete: null
    },
    c.prototype.init = function() {
        this.value = this.options.from,
        this.loops = Math.ceil(this.options.speed / this.options.refreshInterval),
        this.loopCount = 0,
        this.increment = (this.options.to - this.options.from) / this.loops
    }
    ,
    c.prototype.dataOptions = function() {
        var a = {
            from: this.$element.data("from"),
            to: this.$element.data("to"),
            speed: this.$element.data("speed"),
            refreshInterval: this.$element.data("refresh-interval"),
            decimals: this.$element.data("decimals")
        }
          , b = Object.keys(a);
        for (var c in b) {
            var d = b[c];
            "undefined" == typeof a[d] && delete a[d]
        }
        return a
    }
    ,
    c.prototype.update = function() {
        this.value += this.increment,
        this.loopCount++,
        this.render(),
        "function" == typeof this.options.onUpdate && this.options.onUpdate.call(this.$element, this.value),
        this.loopCount >= this.loops && (clearInterval(this.interval),
        this.value = this.options.to,
        "function" == typeof this.options.onComplete && this.options.onComplete.call(this.$element, this.value))
    }
    ,
    c.prototype.render = function() {
        var a = this.options.formatter.call(this.$element, this.value, this.options);
        this.$element.text(a)
    }
    ,
    c.prototype.restart = function() {
        this.stop(),
        this.init(),
        this.start()
    }
    ,
    c.prototype.start = function() {
        this.stop(),
        this.render(),
        this.interval = setInterval(this.update.bind(this), this.options.refreshInterval)
    }
    ,
    c.prototype.stop = function() {
        this.interval && clearInterval(this.interval)
    }
    ,
    c.prototype.toggle = function() {
        this.interval ? this.stop() : this.start()
    }
    ,
    a.fn.countTo = function(b) {
        return this.each(function() {
            var d = a(this)
              , e = d.data("countTo")
              , f = !e || "object" == typeof b
              , g = "object" == typeof b ? b : {}
              , h = "string" == typeof b ? b : "start";
            f && (e && e.stop(),
            d.data("countTo", e = new c(this,g))),
            e[h].call(e)
        })
    }
}),
!function(a) {
    "function" == typeof define && define.amd ? define(["jquery"], a) : a("object" == typeof module && module.exports ? require("jquery") : jQuery)
}(function(a) {
    function b(b) {
        var c = {}
          , d = /^jQuery\d+$/;
        return a.each(b.attributes, function(a, b) {
            b.specified && !d.test(b.name) && (c[b.name] = b.value)
        }),
        c
    }
    function c(b, c) {
        var d = this
          , f = a(this);
        if (d.value === f.attr(h ? "placeholder-x" : "placeholder") && f.hasClass(n.customClass))
            if (d.value = "",
            f.removeClass(n.customClass),
            f.data("placeholder-password")) {
                if (f = f.hide().nextAll('input[type="password"]:first').show().attr("id", f.removeAttr("id").data("placeholder-id")),
                b === !0)
                    return f[0].value = c,
                    c;
                f.focus()
            } else
                d == e() && d.select()
    }
    function d(d) {
        var e, f = this, g = a(this), i = f.id;
        if (!d || "blur" !== d.type || !g.hasClass(n.customClass))
            if ("" === f.value) {
                if ("password" === f.type) {
                    if (!g.data("placeholder-textinput")) {
                        try {
                            e = g.clone().prop({
                                type: "text"
                            })
                        } catch (c) {
                            e = a("<input>").attr(a.extend(b(this), {
                                type: "text"
                            }))
                        }
                        e.removeAttr("name").data({
                            "placeholder-enabled": !0,
                            "placeholder-password": g,
                            "placeholder-id": i
                        }).bind("focus.placeholder", c),
                        g.data({
                            "placeholder-textinput": e,
                            "placeholder-id": i
                        }).before(e)
                    }
                    f.value = "",
                    g = g.removeAttr("id").hide().prevAll('input[type="text"]:first').attr("id", g.data("placeholder-id")).show()
                } else {
                    var j = g.data("placeholder-password");
                    j && (j[0].value = "",
                    g.attr("id", g.data("placeholder-id")).show().nextAll('input[type="password"]:last').hide().removeAttr("id"))
                }
                g.addClass(n.customClass),
                g[0].value = g.attr(h ? "placeholder-x" : "placeholder")
            } else
                g.removeClass(n.customClass)
    }
    function e() {
        try {
            return document.activeElement
        } catch (a) {}
    }
    var f, g, h = !1, i = "[object OperaMini]" === Object.prototype.toString.call(window.operamini), j = "placeholder"in document.createElement("input") && !i && !h, k = "placeholder"in document.createElement("textarea") && !i && !h, l = a.valHooks, m = a.propHooks, n = {};
    j && k ? (g = a.fn.placeholder = function() {
        return this
    }
    ,
    g.input = !0,
    g.textarea = !0) : (g = a.fn.placeholder = function(b) {
        var e = {
            customClass: "placeholder"
        };
        return n = a.extend({}, e, b),
        this.filter((j ? "textarea" : ":input") + "[" + (h ? "placeholder-x" : "placeholder") + "]").not("." + n.customClass).not(":radio, :checkbox, [type=hidden]").bind({
            "focus.placeholder": c,
            "blur.placeholder": d
        }).data("placeholder-enabled", !0).trigger("blur.placeholder")
    }
    ,
    g.input = j,
    g.textarea = k,
    f = {
        get: function(b) {
            var c = a(b)
              , d = c.data("placeholder-password");
            return d ? d[0].value : c.data("placeholder-enabled") && c.hasClass(n.customClass) ? "" : b.value
        },
        set: function(b, f) {
            var g, h, i = a(b);
            return "" !== f && (g = i.data("placeholder-textinput"),
            h = i.data("placeholder-password"),
            g ? (c.call(g[0], !0, f) || (b.value = f),
            g[0].value = f) : h && (c.call(b, !0, f) || (h[0].value = f),
            b.value = f)),
            i.data("placeholder-enabled") ? ("" === f ? (b.value = f,
            b != e() && d.call(b)) : (i.hasClass(n.customClass) && c.call(b),
            b.value = f),
            i) : (b.value = f,
            i)
        }
    },
    j || (l.input = f,
    m.value = f),
    k || (l.textarea = f,
    m.value = f),
    a(function() {
        a(document).delegate("form", "submit.placeholder", function() {
            var b = a("." + n.customClass, this).each(function() {
                c.call(this, !0, "")
            });
            setTimeout(function() {
                b.each(d)
            }, 10)
        })
    }),
    a(window).bind("beforeunload.placeholder", function() {
        var b = !0;
        try {
            "javascript:void(0)" === document.activeElement.toString() && (b = !1)
        } catch (a) {}
        b && a("." + n.customClass).each(function() {
            this.value = ""
        })
    }))
}),
!function(a) {
    var b = !1;
    if ("function" == typeof define && define.amd && (define(a),
    b = !0),
    "object" == typeof exports && (module.exports = a(),
    b = !0),
    !b) {
        var c = window.Cookies
          , d = window.Cookies = a();
        d.noConflict = function() {
            return window.Cookies = c,
            d
        }
    }
}(function() {
    function a() {
        for (var a = 0, b = {}; a < arguments.length; a++) {
            var c = arguments[a];
            for (var d in c)
                b[d] = c[d]
        }
        return b
    }
    function b(c) {
        function d(b, e, f) {
            var g;
            if ("undefined" != typeof document) {
                if (arguments.length > 1) {
                    if (f = a({
                        path: "/"
                    }, d.defaults, f),
                    "number" == typeof f.expires) {
                        var h = new Date;
                        h.setMilliseconds(h.getMilliseconds() + 864e5 * f.expires),
                        f.expires = h
                    }
                    try {
                        g = JSON.stringify(e),
                        /^[\{\[]/.test(g) && (e = g)
                    } catch (a) {}
                    return e = c.write ? c.write(e, b) : encodeURIComponent(e + "").replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent),
                    b = encodeURIComponent(b + ""),
                    b = b.replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent),
                    b = b.replace(/[\(\)]/g, escape),
                    document.cookie = b + "=" + e + (f.expires ? "; expires=" + f.expires.toUTCString() : "") + (f.path ? "; path=" + f.path : "") + (f.domain ? "; domain=" + f.domain : "") + (f.secure ? "; secure" : "")
                }
                b || (g = {});
                for (var i = document.cookie ? document.cookie.split("; ") : [], j = /(%[0-9A-Z]{2})+/g, k = 0; k < i.length; k++) {
                    var l = i[k].split("=")
                      , m = l.slice(1).join("=");
                    '"' === m.charAt(0) && (m = m.slice(1, -1));
                    try {
                        var n = l[0].replace(j, decodeURIComponent);
                        if (m = c.read ? c.read(m, n) : c(m, n) || m.replace(j, decodeURIComponent),
                        this.json)
                            try {
                                m = JSON.parse(m)
                            } catch (a) {}
                        if (b === n) {
                            g = m;
                            break
                        }
                        b || (g[n] = m)
                    } catch (a) {}
                }
                return g
            }
        }
        return d.set = d,
        d.get = function(a) {
            return d.call(d, a)
        }
        ,
        d.getJSON = function() {
            return d.apply({
                json: !0
            }, [].slice.call(arguments))
        }
        ,
        d.defaults = {},
        d.remove = function(b, c) {
            d(b, "", a(c, {
                expires: -1
            }))
        }
        ,
        d.withConverter = b,
        d
    }
    return b(function() {})
});

var App = function() {
    var a, b, c, d, e, f, g, h, i, j, k = function() {
        a = jQuery("html"),
        b = jQuery("body"),
        c = jQuery("#page-container"),
        d = jQuery("#sidebar"),
        e = jQuery("#sidebar-scroll"),
        f = jQuery("#side-overlay"),
        g = jQuery("#side-overlay-scroll"),
        h = jQuery("#header-navbar"),
        i = jQuery("#main-container"),
        j = jQuery("#page-footer"),
        jQuery('[data-toggle="tooltip"], .js-tooltip').tooltip({
            container: "body",
            animation: !1
        }),
        jQuery('[data-toggle="popover"], .js-popover').popover({
            container: "body",
            animation: !0,
            trigger: "hover"
        }),
        jQuery('[data-toggle="tabs"] a, .js-tabs a').click(function(a) {
            a.preventDefault(),
            jQuery(this).tab("show")
        }),
        jQuery(".form-control").placeholder()
    }
    , l = function() {
        var b;
        i.length && (m(),
        jQuery(window).on("resize orientationchange", function() {
            clearTimeout(b),
            b = setTimeout(function() {
                m()
            }, 150)
        })),
        n("init"),
        c.hasClass("header-navbar-fixed") && c.hasClass("header-navbar-transparent") && jQuery(window).on("scroll", function() {
            jQuery(this).scrollTop() > 20 ? c.addClass("header-navbar-scroll") : c.removeClass("header-navbar-scroll")
        }),
        jQuery('[data-toggle="layout"]').on("click", function() {
            var b = jQuery(this);
            o(b.data("action")),
            a.hasClass("no-focus") && b.blur()
        })
    }
    , m = function() {
        var a = jQuery(window).height()
          , b = h.outerHeight()
          , d = j.outerHeight();
        c.hasClass("header-navbar-fixed") ? i.css("min-height", a - d) : i.css("min-height", a - (b + d))
    }
    , n = function(a) {
        var b = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        if ("init" === a) {
            n();
            var h;
            jQuery(window).on("resize orientationchange", function() {
                clearTimeout(h),
                h = setTimeout(function() {
                    n()
                }, 150)
            })
        } else
            b > 991 && c.hasClass("side-scroll") ? (jQuery(d).scrollLock("disable"),
            jQuery(f).scrollLock("disable"),
            e.length && !e.parent(".slimScrollDiv").length ? e.slimScroll({
                height: d.outerHeight(),
                color: "#fff",
                size: "5px",
                opacity: .35,
                wheelStep: 15,
                distance: "2px",
                railVisible: !1,
                railOpacity: 1
            }) : e.add(e.parent()).css("height", d.outerHeight()),
            g.length && !g.parent(".slimScrollDiv").length ? g.slimScroll({
                height: f.outerHeight(),
                color: "#000",
                size: "5px",
                opacity: .35,
                wheelStep: 15,
                distance: "2px",
                railVisible: !1,
                railOpacity: 1
            }) : g.add(g.parent()).css("height", f.outerHeight())) : (jQuery(d).scrollLock("enable"),
            jQuery(f).scrollLock("enable"),
            e.length && e.parent(".slimScrollDiv").length && (e.slimScroll({
                destroy: !0
            }),
            e.attr("style", "")),
            g.length && g.parent(".slimScrollDiv").length && (g.slimScroll({
                destroy: !0
            }),
            g.attr("style", "")))
    }
    , o = function(a) {
        var b = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        switch (a) {
        case "sidebar_pos_toggle":
            c.toggleClass("sidebar-l sidebar-r");
            break;
        case "sidebar_pos_left":
            c.removeClass("sidebar-r").addClass("sidebar-l");
            break;
        case "sidebar_pos_right":
            c.removeClass("sidebar-l").addClass("sidebar-r");
            break;
        case "sidebar_toggle":
            b > 991 ? c.toggleClass("sidebar-o") : c.toggleClass("sidebar-o-xs");
            break;
        case "sidebar_open":
            b > 991 ? c.addClass("sidebar-o") : c.addClass("sidebar-o-xs");
            break;
        case "sidebar_close":
            b > 991 ? c.removeClass("sidebar-o") : c.removeClass("sidebar-o-xs");
            break;
        case "sidebar_mini_toggle":
            b > 991 && c.toggleClass("sidebar-mini");
            break;
        case "sidebar_mini_on":
            b > 991 && c.addClass("sidebar-mini");
            break;
        case "sidebar_mini_off":
            b > 991 && c.removeClass("sidebar-mini");
            break;
        case "side_overlay_toggle":
            c.toggleClass("side-overlay-o");
            break;
        case "side_overlay_open":
            c.addClass("side-overlay-o");
            break;
        case "side_overlay_close":
            c.removeClass("side-overlay-o");
            break;
        case "side_overlay_hoverable_toggle":
            c.toggleClass("side-overlay-hover");
            break;
        case "side_overlay_hoverable_on":
            c.addClass("side-overlay-hover");
            break;
        case "side_overlay_hoverable_off":
            c.removeClass("side-overlay-hover");
            break;
        case "header_fixed_toggle":
            c.toggleClass("header-navbar-fixed");
            break;
        case "header_fixed_on":
            c.addClass("header-navbar-fixed");
            break;
        case "header_fixed_off":
            c.removeClass("header-navbar-fixed");
            break;
        case "side_scroll_toggle":
            c.toggleClass("side-scroll"),
            n();
            break;
        case "side_scroll_on":
            c.addClass("side-scroll"),
            n();
            break;
        case "side_scroll_off":
            c.removeClass("side-scroll"),
            n();
            break;
        default:
            return !1
        }
    }
    , p = function() {
        jQuery('[data-toggle="nav-submenu"]').on("click", function(b) {
            var c = jQuery(this)
              , d = c.parent("li");
            return d.hasClass("open") ? d.removeClass("open") : (c.closest("ul").find("> li").removeClass("open"),
            d.addClass("open")),
            a.hasClass("no-focus") && c.blur(),
            !1
        })
    }
    , q = function() {
        r(!1, "init"),
        jQuery('[data-toggle="block-option"]').on("click", function() {
            r(jQuery(this).closest(".block"), jQuery(this).data("action"))
        })
    }
    , r = function(a, b) {
        var c = "si si-size-fullscreen"
          , d = "si si-size-actual"
          , e = "si si-arrow-up"
          , f = "si si-arrow-down";
        if ("init" === b)
            jQuery('[data-toggle="block-option"][data-action="fullscreen_toggle"]').each(function() {
                var a = jQuery(this);
                a.html('<i class="' + (jQuery(this).closest(".block").hasClass("block-opt-fullscreen") ? d : c) + '"></i>')
            }),
            jQuery('[data-toggle="block-option"][data-action="content_toggle"]').each(function() {
                var a = jQuery(this);
                a.html('<i class="' + (a.closest(".block").hasClass("block-opt-hidden") ? f : e) + '"></i>')
            });
        else {
            var g = a instanceof jQuery ? a : jQuery(a);
            if (g.length) {
                var h = jQuery('[data-toggle="block-option"][data-action="fullscreen_toggle"]', g)
                  , i = jQuery('[data-toggle="block-option"][data-action="content_toggle"]', g);
                switch (b) {
                case "fullscreen_toggle":
                    g.toggleClass("block-opt-fullscreen"),
                    g.hasClass("block-opt-fullscreen") ? jQuery(g).scrollLock("enable") : jQuery(g).scrollLock("disable"),
                    h.length && (g.hasClass("block-opt-fullscreen") ? jQuery("i", h).removeClass(c).addClass(d) : jQuery("i", h).removeClass(d).addClass(c));
                    break;
                case "fullscreen_on":
                    g.addClass("block-opt-fullscreen"),
                    jQuery(g).scrollLock("enable"),
                    h.length && jQuery("i", h).removeClass(c).addClass(d);
                    break;
                case "fullscreen_off":
                    g.removeClass("block-opt-fullscreen"),
                    jQuery(g).scrollLock("disable"),
                    h.length && jQuery("i", h).removeClass(d).addClass(c);
                    break;
                case "content_toggle":
                    g.toggleClass("block-opt-hidden"),
                    i.length && (g.hasClass("block-opt-hidden") ? jQuery("i", i).removeClass(e).addClass(f) : jQuery("i", i).removeClass(f).addClass(e));
                    break;
                case "content_hide":
                    g.addClass("block-opt-hidden"),
                    i.length && jQuery("i", i).removeClass(e).addClass(f);
                    break;
                case "content_show":
                    g.removeClass("block-opt-hidden"),
                    i.length && jQuery("i", i).removeClass(f).addClass(e);
                    break;
                case "refresh_toggle":
                    g.toggleClass("block-opt-refresh"),
                    jQuery('[data-toggle="block-option"][data-action="refresh_toggle"][data-action-mode="demo"]', g).length && setTimeout(function() {
                        g.removeClass("block-opt-refresh")
                    }, 2e3);
                    break;
                case "state_loading":
                    g.addClass("block-opt-refresh");
                    break;
                case "state_normal":
                    g.removeClass("block-opt-refresh");
                    break;
                case "close":
                    g.hide();
                    break;
                case "open":
                    g.show();
                    break;
                default:
                    return !1
                }
            }
        }
    }
    , s = function() {
        jQuery(".form-material.floating > .form-control").each(function() {
            var a = jQuery(this)
              , b = a.parent(".form-material");
            setTimeout(function() {
                a.val() && b.addClass("open")
            }, 150),
            a.on("change", function() {
                a.val() ? b.addClass("open") : b.removeClass("open")
            })
        })
    }
    , t = function() {
        var a = jQuery("#css-theme")
          , b = !!c.hasClass("enable-cookies");
        if (b) {
            var d = !!Cookies.get("colorTheme") && Cookies.get("colorTheme");
            d && ("default" === d ? a.length && a.remove() : a.length ? a.attr("href", d) : jQuery("#css-main").after('<link rel="stylesheet" id="css-theme" href="' + d + '">')),
            a = jQuery("#css-theme")
        }
        jQuery('[data-toggle="theme"][data-theme="' + (a.length ? a.attr("href") : "default") + '"]').parent("li").addClass("active"),
        jQuery('[data-toggle="theme"]').on("click", function() {
            var c = jQuery(this)
              , d = c.data("theme");
            jQuery('[data-toggle="theme"]').parent("li").removeClass("active"),
            jQuery('[data-toggle="theme"][data-theme="' + d + '"]').parent("li").addClass("active"),
            "default" === d ? a.length && a.remove() : a.length ? a.attr("href", d) : jQuery("#css-main").after('<link rel="stylesheet" id="css-theme" href="' + d + '">'),
            a = jQuery("#css-theme"),
            b && Cookies.set("colorTheme", d, {
                expires: 7
            })
        })
    }
    , u = function() {
        jQuery('[data-toggle="scroll-to"]').on("click", function() {
            var a = jQuery(this)
              , b = a.data("target")
              , d = a.data("speed") ? a.data("speed") : 1e3
              , e = h.length && c.hasClass("header-navbar-fixed") ? h.outerHeight() : 0;
            jQuery("html, body").animate({
                scrollTop: jQuery(b).offset().top - e
            }, d)
        })
    }
    , v = function() {
        jQuery('[data-toggle="class-toggle"]').on("click", function() {
            var b = jQuery(this);
            jQuery(b.data("target").toString()).toggleClass(b.data("class").toString()),
            a.hasClass("no-focus") && b.blur()
        })
    }
    , w = function() {
        var a = new Date
          , b = jQuery(".js-year-copy");
        2016 === a.getFullYear() ? b.html("2016") : b.html("2016-" + a.getFullYear().toString().substr(2, 2))
    }
    , x = function(a) {
        var c = jQuery("#page-loader");
        return "show" === a ? c.length ? c.fadeIn(250) : b.prepend('<div id="page-loader"></div>') : "hide" === a && c.length && c.fadeOut(250),
        !1
    }
    , y = function() {
        var a = c.prop("class");
        c.prop("class", ""),
        window.print(),
        c.prop("class", a)
    }
    , z = function() {
        jQuery(".js-table-sections").each(function() {
            var a = jQuery(this);
            jQuery(".js-table-sections-header > tr", a).on("click", function(b) {
                var c = jQuery(this)
                  , d = c.parent("tbody");
                d.hasClass("open") || jQuery("tbody", a).removeClass("open"),
                d.toggleClass("open")
            })
        })
    }
    , A = function() {
        jQuery(".js-table-checkable").each(function() {
            var a = jQuery(this);
            jQuery("thead input:checkbox", a).on("click", function() {
                var b = jQuery(this).prop("checked");
                jQuery("tbody input:checkbox", a).each(function() {
                    var a = jQuery(this);
                    a.prop("checked", b),
                    B(a, b)
                })
            }),
            jQuery("tbody input:checkbox", a).on("click", function() {
                var a = jQuery(this);
                B(a, a.prop("checked"))
            }),
            jQuery("tbody > tr", a).on("click", function(a) {
                if ("checkbox" !== a.target.type && "button" !== a.target.type && "a" !== a.target.tagName.toLowerCase() && !jQuery(a.target).parent("label").length) {
                    var b = jQuery("input:checkbox", this)
                      , c = b.prop("checked");
                    b.prop("checked", !c),
                    B(b, !c)
                }
            })
        })
    }
    , B = function(a, b) {
        b ? a.closest("tr").addClass("active") : a.closest("tr").removeClass("active")
    }
    , C = function() {
        jQuery('[data-toggle="appear"]').each(function() {
            var b = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth
              , c = jQuery(this)
              , d = c.data("class") ? c.data("class") : "animated fadeIn"
              , e = c.data("offset") ? c.data("offset") : 0
              , f = a.hasClass("ie9") || b < 992 ? 0 : c.data("timeout") ? c.data("timeout") : 0;
            c.appear(function() {
                setTimeout(function() {
                    c.removeClass("visibility-hidden").addClass(d)
                }, f)
            }, {
                accY: e
            })
        })
    }
    , D = function() {
        jQuery('[data-toggle="countTo"]').each(function() {
            var a = jQuery(this)
              , b = a.data("after")
              , c = a.data("before")
              , d = a.data("speed") ? a.data("speed") : 1500
              , e = a.data("interval") ? a.data("interval") : 15;
            a.appear(function() {
                a.countTo({
                    speed: d,
                    refreshInterval: e,
                    onComplete: function() {
                        b ? a.html(a.html() + b) : c && a.html(c + a.html())
                    }
                })
            })
        })
    }
    , E = function() {
        jQuery('[data-toggle="slimscroll"]').each(function() {
            var a = jQuery(this)
              , b = a.data("height") ? a.data("height") : "200px"
              , c = a.data("size") ? a.data("size") : "5px"
              , d = a.data("position") ? a.data("position") : "right"
              , e = a.data("color") ? a.data("color") : "#000"
              , f = !!a.data("always-visible")
              , g = !!a.data("rail-visible")
              , h = a.data("rail-color") ? a.data("rail-color") : "#999"
              , i = a.data("rail-opacity") ? a.data("rail-opacity") : .3;
            a.slimScroll({
                height: b,
                size: c,
                position: d,
                color: e,
                alwaysVisible: f,
                railVisible: g,
                railColor: h,
                railOpacity: i
            })
        })
    }
    , F = function() {
        jQuery(".js-gallery").each(function() {
            jQuery(this).magnificPopup({
                delegate: "a.img-link",
                type: "image",
                gallery: {
                    enabled: !0
                }
            })
        }),
        jQuery(".js-gallery-advanced").each(function() {
            jQuery(this).magnificPopup({
                delegate: "a.img-lightbox",
                type: "image",
                gallery: {
                    enabled: !0
                }
            })
        })
    }
    , G = function() {
        CKEDITOR.disableAutoInline = !0,
        jQuery("#js-ckeditor-inline").length && CKEDITOR.inline("js-ckeditor-inline"),
        jQuery("#js-ckeditor").length && CKEDITOR.replace("js-ckeditor")
    }
    , H = function() {
        jQuery(".js-summernote-air").summernote({
            airMode: !0
        }),
        jQuery(".js-summernote").summernote({
            height: 350,
            minHeight: null ,
            maxHeight: null
        })
    }
    , I = function() {
        jQuery(".js-slider").each(function() {
            var a = jQuery(this)
              , b = !!a.data("slider-arrows") && a.data("slider-arrows")
              , c = !!a.data("slider-dots") && a.data("slider-dots")
              , d = a.data("slider-num") ? a.data("slider-num") : 1
              , e = !!a.data("slider-autoplay") && a.data("slider-autoplay")
              , f = a.data("slider-autoplay-speed") ? a.data("slider-autoplay-speed") : 3e3;
            a.slick({
                arrows: b,
                dots: c,
                slidesToShow: d,
                autoplay: e,
                autoplaySpeed: f
            })
        })
    }
    , J = function() {
        jQuery(".js-datepicker").add(".input-daterange").datepicker({
            weekStart: 1,
            autoclose: !0,
            todayHighlight: !0
        })
    }
    , K = function() {
        jQuery(".js-colorpicker").each(function() {
            var a = jQuery(this)
              , b = a.data("colorpicker-mode") ? a.data("colorpicker-mode") : "hex"
              , c = !!a.data("colorpicker-inline");
            a.colorpicker({
                format: b,
                inline: c
            })
        })
    }
    , L = function() {
        jQuery(".js-masked-date").mask("99/99/9999"),
        jQuery(".js-masked-date-dash").mask("99-99-9999"),
        jQuery(".js-masked-phone").mask("(999) 999-9999"),
        jQuery(".js-masked-phone-ext").mask("(999) 999-9999? x99999"),
        jQuery(".js-masked-taxid").mask("99-9999999"),
        jQuery(".js-masked-ssn").mask("999-99-9999"),
        jQuery(".js-masked-pkey").mask("a*-999-a999"),
        jQuery(".js-masked-time").mask("99:99")
    }
    , M = function() {
        jQuery(".js-tags-input").tagsInput({
            height: "36px",
            width: "100%",
            defaultText: "Add tag",
            removeWithBackspace: !0,
            delimiter: [","]
        })
    }
    , N = function() {
        jQuery(".js-select2").select2()
    }
    , O = function() {
        hljs.initHighlightingOnLoad()
    }
    , P = function() {
        jQuery(".js-notify").on("click", function() {
            var a = jQuery(this)
              , b = a.data("notify-message")
              , c = a.data("notify-type") ? a.data("notify-type") : "info"
              , d = a.data("notify-from") ? a.data("notify-from") : "top"
              , e = a.data("notify-align") ? a.data("notify-align") : "right"
              , f = a.data("notify-icon") ? a.data("notify-icon") : ""
              , g = a.data("notify-url") ? a.data("notify-url") : "";
            jQuery.notify({
                icon: f,
                message: b,
                url: g
            }, {
                element: "body",
                type: c,
                allow_dismiss: !0,
                newest_on_top: !0,
                showProgressbar: !1,
                placement: {
                    from: d,
                    align: e
                },
                offset: 20,
                spacing: 10,
                z_index: 1033,
                delay: 5e3,
                timer: 1e3,
                animate: {
                    enter: "animated fadeIn",
                    exit: "animated fadeOutDown"
                }
            })
        })
    }
    , Q = function() {
        jQuery(".js-draggable-items > .draggable-column").sortable({
            connectWith: ".draggable-column",
            items: ".draggable-item",
            dropOnEmpty: !0,
            opacity: .75,
            handle: ".draggable-handler",
            placeholder: "draggable-placeholder",
            tolerance: "pointer",
            start: function(a, b) {
                b.placeholder.css({
                    height: b.item.outerHeight(),
                    "margin-bottom": b.item.css("margin-bottom")
                })
            }
        })
    }
    , R = function() {
        jQuery(".js-pie-chart").easyPieChart({
            barColor: jQuery(this).data("bar-color") ? jQuery(this).data("bar-color") : "#777777",
            trackColor: jQuery(this).data("track-color") ? jQuery(this).data("track-color") : "#eeeeee",
            lineWidth: jQuery(this).data("line-width") ? jQuery(this).data("line-width") : 3,
            size: jQuery(this).data("size") ? jQuery(this).data("size") : "80",
            animate: 750,
            scaleColor: !!jQuery(this).data("scale-color") && jQuery(this).data("scale-color")
        })
    }
    , S = function() {
        jQuery(".js-maxlength").each(function() {
            var a = jQuery(this);
            a.maxlength({
                alwaysShow: !!a.data("always-show"),
                threshold: a.data("threshold") ? a.data("threshold") : 10,
                warningClass: a.data("warning-class") ? a.data("warning-class") : "label label-warning",
                limitReachedClass: a.data("limit-reached-class") ? a.data("limit-reached-class") : "label label-danger",
                placement: a.data("placement") ? a.data("placement") : "bottom",
                preText: a.data("pre-text") ? a.data("pre-text") : "",
                separator: a.data("separator") ? a.data("separator") : "/",
                postText: a.data("post-text") ? a.data("post-text") : ""
            })
        })
    }
    , T = function() {
        jQuery(".js-datetimepicker").each(function() {
            var a = jQuery(this);
            a.datetimepicker({
                format: !!a.data("format") && a.data("format"),
                useCurrent: !!a.data("use-current") && a.data("use-current"),
                locale: moment.locale("" + (a.data("locale") ? a.data("locale") : "")),
                showTodayButton: !!a.data("show-today-button") && a.data("show-today-button"),
                showClear: !!a.data("show-clear") && a.data("show-clear"),
                showClose: !!a.data("show-close") && a.data("show-close"),
                sideBySide: !!a.data("side-by-side") && a.data("side-by-side"),
                inline: !!a.data("inline") && a.data("inline"),
                icons: {
                    time: "si si-clock",
                    date: "si si-calendar",
                    up: "si si-arrow-up",
                    down: "si si-arrow-down",
                    previous: "si si-arrow-left",
                    next: "si si-arrow-right",
                    today: "si si-size-actual",
                    clear: "si si-trash",
                    close: "si si-close"
                }
            })
        })
    }
    , U = function() {
        jQuery(".js-rangeslider").each(function() {
            var a = jQuery(this);
            a.ionRangeSlider({
                input_values_separator: ";"
            })
        })
    }
    , V = function() {
        jQuery(".js-simplemde").each(function() {
            var a = jQuery(this);
            new SimpleMDE({
                element: a[0]
            })
        })
    }
    ;
    return {
        init: function(a) {
            switch (a) {
            case "uiInit":
                k();
                break;
            case "uiLayout":
                l();
                break;
            case "uiNav":
                p();
                break;
            case "uiBlocks":
                q();
                break;
            case "uiForms":
                s();
                break;
            case "uiHandleTheme":
                t();
                break;
            case "uiToggleClass":
                v();
                break;
            case "uiScrollTo":
                u();
                break;
            case "uiYearCopy":
                w();
                break;
            case "uiLoader":
                x("hide");
                break;
            default:
                k(),
                l(),
                p(),
                q(),
                s(),
                t(),
                v(),
                u(),
                w(),
                x("hide")
            }
        },
        layout: function(a) {
            o(a)
        },
        loader: function(a) {
            x(a)
        },
        blocks: function(a, b) {
            r(a, b)
        },
        initHelper: function(a) {
            switch (a) {
            case "print-page":
                y();
                break;
            case "table-tools":
                z(),
                A();
                break;
            case "appear":
                C();
                break;
            case "appear-countTo":
                D();
                break;
            case "slimscroll":
                E();
                break;
            case "magnific-popup":
                F();
                break;
            case "ckeditor":
                G();
                break;
            case "summernote":
                H();
                break;
            case "slick":
                I();
                break;
            case "datepicker":
                J();
                break;
            case "colorpicker":
                K();
                break;
            case "tags-inputs":
                M();
                break;
            case "masked-inputs":
                L();
                break;
            case "select2":
                N();
                break;
            case "highlightjs":
                O();
                break;
            case "notify":
                P();
                break;
            case "draggable-items":
                Q();
                break;
            case "easy-pie-chart":
                R();
                break;
            case "maxlength":
                S();
                break;
            case "datetimepicker":
                T();
                break;
            case "rangeslider":
                U();
                break;
            case "simplemde":
                V();
                break;
            default:
                return !1
            }
        },
        initHelpers: function(a) {
            if (a instanceof Array)
                for (var b in a)
                    App.initHelper(a[b]);
            else
                App.initHelper(a)
        }
    }
}()
  , OneUI = App;
jQuery(function() {
    "undefined" == typeof angular && App.init()
});
