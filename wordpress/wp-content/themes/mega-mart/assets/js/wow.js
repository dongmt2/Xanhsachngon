/*!
 * jQuery Ripples plugin v0.5.3 / https://github.com/sirxemic/jquery.ripples
 * MIT License
 * @author sirxemic / https://sirxemic.com/
 */
! function(e) {
    /*! WOW wow.js - v1.3.0 - 2016-10-04
     * https://wowjs.uk
     * Copyright (c) 2016 Thomas Grainger; Licensed MIT */
    ! function(a, b) {
        if ("function" == typeof define && define.amd) define(["module", "exports"], b);
        else if ("undefined" != typeof exports) b(module, exports);
        else {
            var c = {
                exports: {}
            };
            b(c, c.exports), a.WOW = c.exports
        }
    }(this, function(a, b) {
        "use strict";

        function c(a, b) {
            if (!(a instanceof b)) throw new TypeError("Cannot call a class as a function")
        }

        function d(a, b) {
            return b.indexOf(a) >= 0
        }

        function e(a, b) {
            for (var c in b)
                if (null == a[c]) {
                    var d = b[c];
                    a[c] = d
                }
            return a
        }

        function f(a) {
            return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(a)
        }

        function g(a) {
            var b = arguments.length <= 1 || void 0 === arguments[1] ? !1 : arguments[1],
                c = arguments.length <= 2 || void 0 === arguments[2] ? !1 : arguments[2],
                d = arguments.length <= 3 || void 0 === arguments[3] ? null : arguments[3],
                e = void 0;
            return null != document.createEvent ? (e = document.createEvent("CustomEvent"), e.initCustomEvent(a, b, c, d)) : null != document.createEventObject ? (e = document.createEventObject(), e.eventType = a) : e.eventName = a, e
        }

        function h(a, b) {
            null != a.dispatchEvent ? a.dispatchEvent(b) : b in (null != a) ? a[b]() : "on" + b in (null != a) && a["on" + b]()
        }

        function i(a, b, c) {
            null != a.addEventListener ? a.addEventListener(b, c, !1) : null != a.attachEvent ? a.attachEvent("on" + b, c) : a[b] = c
        }

        function j(a, b, c) {
            null != a.removeEventListener ? a.removeEventListener(b, c, !1) : null != a.detachEvent ? a.detachEvent("on" + b, c) : delete a[b]
        }

        function k() {
            return "innerHeight" in window ? window.innerHeight : document.documentElement.clientHeight
        }
        Object.defineProperty(b, "__esModule", {
            value: !0
        });
        var l, m, n = function() {
                function a(a, b) {
                    for (var c = 0; c < b.length; c++) {
                        var d = b[c];
                        d.enumerable = d.enumerable || !1, d.configurable = !0, "value" in d && (d.writable = !0), Object.defineProperty(a, d.key, d)
                    }
                }
                return function(b, c, d) {
                    return c && a(b.prototype, c), d && a(b, d), b
                }
            }(),
            o = window.WeakMap || window.MozWeakMap || function() {
                function a() {
                    c(this, a), this.keys = [], this.values = []
                }
                return n(a, [{
                    key: "get",
                    value: function(a) {
                        for (var b = 0; b < this.keys.length; b++) {
                            var c = this.keys[b];
                            if (c === a) return this.values[b]
                        }
                    }
                }, {
                    key: "set",
                    value: function(a, b) {
                        for (var c = 0; c < this.keys.length; c++) {
                            var d = this.keys[c];
                            if (d === a) return this.values[c] = b, this
                        }
                        return this.keys.push(a), this.values.push(b), this
                    }
                }]), a
            }(),
            p = window.MutationObserver || window.WebkitMutationObserver || window.MozMutationObserver || (m = l = function() {
                function a() {
                    c(this, a), "undefined" != typeof console && null !== console && (console.warn("MutationObserver is not supported by your browser."), console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content."))
                }
                return n(a, [{
                    key: "observe",
                    value: function() {}
                }]), a
            }(), l.notSupported = !0, m),
            q = window.getComputedStyle || function(a) {
                var b = /(\-([a-z]){1})/g;
                return {
                    getPropertyValue: function(c) {
                        "float" === c && (c = "styleFloat"), b.test(c) && c.replace(b, function(a, b) {
                            return b.toUpperCase()
                        });
                        var d = a.currentStyle;
                        return (null != d ? d[c] : void 0) || null
                    }
                }
            },
            r = function() {
                function a() {
                    var b = arguments.length <= 0 || void 0 === arguments[0] ? {} : arguments[0];
                    c(this, a), this.defaults = {
                        boxClass: "wow",
                        animateClass: "animated",
                        offset: 0,
                        mobile: !0,
                        live: !0,
                        callback: null,
                        scrollContainer: null,
                        resetAnimation: !0
                    }, this.animate = function() {
                        return "requestAnimationFrame" in window ? function(a) {
                            return window.requestAnimationFrame(a)
                        } : function(a) {
                            return a()
                        }
                    }(), this.vendors = ["moz", "webkit"], this.start = this.start.bind(this), this.resetAnimation = this.resetAnimation.bind(this), this.scrollHandler = this.scrollHandler.bind(this), this.scrollCallback = this.scrollCallback.bind(this), this.scrolled = !0, this.config = e(b, this.defaults), null != b.scrollContainer && (this.config.scrollContainer = document.querySelector(b.scrollContainer)), this.animationNameCache = new o, this.wowEvent = g(this.config.boxClass)
                }
                return n(a, [{
                    key: "init",
                    value: function() {
                        this.element = window.document.documentElement, d(document.readyState, ["interactive", "complete"]) ? this.start() : i(document, "DOMContentLoaded", this.start), this.finished = []
                    }
                }, {
                    key: "start",
                    value: function() {
                        var a = this;
                        if (this.stopped = !1, this.boxes = [].slice.call(this.element.querySelectorAll("." + this.config.boxClass)), this.all = this.boxes.slice(0), this.boxes.length)
                            if (this.disabled()) this.resetStyle();
                            else
                                for (var b = 0; b < this.boxes.length; b++) {
                                    var c = this.boxes[b];
                                    this.applyStyle(c, !0)
                                }
                        if (this.disabled() || (i(this.config.scrollContainer || window, "scroll", this.scrollHandler), i(window, "resize", this.scrollHandler), this.interval = setInterval(this.scrollCallback, 50)), this.config.live) {
                            var d = new p(function(b) {
                                for (var c = 0; c < b.length; c++)
                                    for (var d = b[c], e = 0; e < d.addedNodes.length; e++) {
                                        var f = d.addedNodes[e];
                                        a.doSync(f)
                                    }
                            });
                            d.observe(document.body, {
                                childList: !0,
                                subtree: !0
                            })
                        }
                    }
                }, {
                    key: "stop",
                    value: function() {
                        this.stopped = !0, j(this.config.scrollContainer || window, "scroll", this.scrollHandler), j(window, "resize", this.scrollHandler), null != this.interval && clearInterval(this.interval)
                    }
                }, {
                    key: "sync",
                    value: function() {
                        p.notSupported && this.doSync(this.element)
                    }
                }, {
                    key: "doSync",
                    value: function(a) {
                        if ("undefined" != typeof a && null !== a || (a = this.element), 1 === a.nodeType) {
                            a = a.parentNode || a;
                            for (var b = a.querySelectorAll("." + this.config.boxClass), c = 0; c < b.length; c++) {
                                var e = b[c];
                                d(e, this.all) || (this.boxes.push(e), this.all.push(e), this.stopped || this.disabled() ? this.resetStyle() : this.applyStyle(e, !0), this.scrolled = !0)
                            }
                        }
                    }
                }, {
                    key: "show",
                    value: function(a) {
                        return this.applyStyle(a), a.className = a.className + " " + this.config.animateClass, null != this.config.callback && this.config.callback(a), h(a, this.wowEvent), this.config.resetAnimation && (i(a, "animationend", this.resetAnimation), i(a, "oanimationend", this.resetAnimation), i(a, "webkitAnimationEnd", this.resetAnimation), i(a, "MSAnimationEnd", this.resetAnimation)), a
                    }
                }, {
                    key: "applyStyle",
                    value: function(a, b) {
                        var c = this,
                            d = a.getAttribute("data-wow-duration"),
                            e = a.getAttribute("data-wow-delay"),
                            f = a.getAttribute("data-wow-iteration");
                        return this.animate(function() {
                            return c.customStyle(a, b, d, e, f)
                        })
                    }
                }, {
                    key: "resetStyle",
                    value: function() {
                        for (var a = 0; a < this.boxes.length; a++) {
                            var b = this.boxes[a];
                            b.style.visibility = "visible"
                        }
                    }
                }, {
                    key: "resetAnimation",
                    value: function(a) {
                        if (a.type.toLowerCase().indexOf("animationend") >= 0) {
                            var b = a.target || a.srcElement;
                            b.className = b.className.replace(this.config.animateClass, "").trim()
                        }
                    }
                }, {
                    key: "customStyle",
                    value: function(a, b, c, d, e) {
                        return b && this.cacheAnimationName(a), a.style.visibility = b ? "hidden" : "visible", c && this.vendorSet(a.style, {
                            animationDuration: c
                        }), d && this.vendorSet(a.style, {
                            animationDelay: d
                        }), e && this.vendorSet(a.style, {
                            animationIterationCount: e
                        }), this.vendorSet(a.style, {
                            animationName: b ? "none" : this.cachedAnimationName(a)
                        }), a
                    }
                }, {
                    key: "vendorSet",
                    value: function(a, b) {
                        for (var c in b)
                            if (b.hasOwnProperty(c)) {
                                var d = b[c];
                                a["" + c] = d;
                                for (var e = 0; e < this.vendors.length; e++) {
                                    var f = this.vendors[e];
                                    a["" + f + c.charAt(0).toUpperCase() + c.substr(1)] = d
                                }
                            }
                    }
                }, {
                    key: "vendorCSS",
                    value: function(a, b) {
                        for (var c = q(a), d = c.getPropertyCSSValue(b), e = 0; e < this.vendors.length; e++) {
                            var f = this.vendors[e];
                            d = d || c.getPropertyCSSValue("-" + f + "-" + b)
                        }
                        return d
                    }
                }, {
                    key: "animationName",
                    value: function(a) {
                        var b = void 0;
                        try {
                            b = this.vendorCSS(a, "animation-name").cssText
                        } catch (c) {
                            b = q(a).getPropertyValue("animation-name")
                        }
                        return "none" === b ? "" : b
                    }
                }, {
                    key: "cacheAnimationName",
                    value: function(a) {
                        return this.animationNameCache.set(a, this.animationName(a))
                    }
                }, {
                    key: "cachedAnimationName",
                    value: function(a) {
                        return this.animationNameCache.get(a)
                    }
                }, {
                    key: "scrollHandler",
                    value: function() {
                        this.scrolled = !0
                    }
                }, {
                    key: "scrollCallback",
                    value: function() {
                        if (this.scrolled) {
                            this.scrolled = !1;
                            for (var a = [], b = 0; b < this.boxes.length; b++) {
                                var c = this.boxes[b];
                                if (c) {
                                    if (this.isVisible(c)) {
                                        this.show(c);
                                        continue
                                    }
                                    a.push(c)
                                }
                            }
                            this.boxes = a, this.boxes.length || this.config.live || this.stop()
                        }
                    }
                }, {
                    key: "offsetTop",
                    value: function(a) {
                        for (; void 0 === a.offsetTop;) a = a.parentNode;
                        for (var b = a.offsetTop; a.offsetParent;) a = a.offsetParent, b += a.offsetTop;
                        return b
                    }
                }, {
                    key: "isVisible",
                    value: function(a) {
                        var b = a.getAttribute("data-wow-offset") || this.config.offset,
                            c = this.config.scrollContainer && this.config.scrollContainer.scrollTop || window.pageYOffset,
                            d = c + Math.min(this.element.clientHeight, k()) - b,
                            e = this.offsetTop(a),
                            f = e + a.clientHeight;
                        return d >= e && f >= c
                    }
                }, {
                    key: "disabled",
                    value: function() {
                        return !this.config.mobile && f(navigator.userAgent)
                    }
                }]), a
            }();
        b["default"] = r, a.exports = b["default"]
    });
    new WOW().init();
    "function" == typeof define && define.amd ? define(["jquery"], e) : e("object" == typeof exports ? require("jquery") : jQuery)
}(function(e) {
    "use strict";

    function t(e) {
        return "%" == e[e.length - 1]
    }

    function r() {
        function e(e, t) {
            var i = "OES_texture_" + e,
                o = i + "_linear",
                n = o in r,
                a = [i];
            return n && a.push(o), {
                type: t,
                linearSupport: n,
                extensions: a
            }
        }
        var t = document.createElement("canvas");
        if (h = t.getContext("webgl") || t.getContext("experimental-webgl"), !h) return null;
        var r = {};
        if (["OES_texture_float", "OES_texture_half_float", "OES_texture_float_linear", "OES_texture_half_float_linear"].forEach(function(e) {
                var t = h.getExtension(e);
                t && (r[e] = t)
            }), !r.OES_texture_float) return null;
        var i = [];
        i.push(e("float", h.FLOAT)), r.OES_texture_half_float && i.push(e("half_float", r.OES_texture_half_float.HALF_FLOAT_OES));
        var o = h.createTexture(),
            n = h.createFramebuffer();
        h.bindFramebuffer(h.FRAMEBUFFER, n), h.bindTexture(h.TEXTURE_2D, o), h.texParameteri(h.TEXTURE_2D, h.TEXTURE_MIN_FILTER, h.NEAREST), h.texParameteri(h.TEXTURE_2D, h.TEXTURE_MAG_FILTER, h.NEAREST), h.texParameteri(h.TEXTURE_2D, h.TEXTURE_WRAP_S, h.CLAMP_TO_EDGE), h.texParameteri(h.TEXTURE_2D, h.TEXTURE_WRAP_T, h.CLAMP_TO_EDGE);
        for (var a = null, s = 0; s < i.length; s++)
            if (h.texImage2D(h.TEXTURE_2D, 0, h.RGBA, 32, 32, 0, h.RGBA, i[s].type, null), h.framebufferTexture2D(h.FRAMEBUFFER, h.COLOR_ATTACHMENT0, h.TEXTURE_2D, o, 0), h.checkFramebufferStatus(h.FRAMEBUFFER) === h.FRAMEBUFFER_COMPLETE) {
                a = i[s];
                break
            }
        return a
    }

    function i(e, t) {
        try {
            return new ImageData(e, t)
        } catch (i) {
            var r = document.createElement("canvas");
            return r.getContext("2d").createImageData(e, t)
        }
    }

    function o(e) {
        var t = e.split(" ");
        if (1 !== t.length) return t.map(function(t) {
            switch (e) {
                case "center":
                    return "50%";
                case "top":
                case "left":
                    return "0";
                case "right":
                case "bottom":
                    return "100%";
                default:
                    return t
            }
        });
        switch (e) {
            case "center":
                return ["50%", "50%"];
            case "top":
                return ["50%", "0"];
            case "bottom":
                return ["50%", "100%"];
            case "left":
                return ["0", "50%"];
            case "right":
                return ["100%", "50%"];
            default:
                return [e, "50%"]
        }
    }

    function n(e, t, r) {
        function i(e, t) {
            var r = h.createShader(e);
            if (h.shaderSource(r, t), h.compileShader(r), !h.getShaderParameter(r, h.COMPILE_STATUS)) throw new Error("compile error: " + h.getShaderInfoLog(r));
            return r
        }
        var o = {};
        if (o.id = h.createProgram(), h.attachShader(o.id, i(h.VERTEX_SHADER, e)), h.attachShader(o.id, i(h.FRAGMENT_SHADER, t)), h.linkProgram(o.id), !h.getProgramParameter(o.id, h.LINK_STATUS)) throw new Error("link error: " + h.getProgramInfoLog(o.id));
        o.uniforms = {}, o.locations = {}, h.useProgram(o.id), h.enableVertexAttribArray(0);
        for (var n, a, s = /uniform (\w+) (\w+)/g, u = e + t; null != (n = s.exec(u));) a = n[2], o.locations[a] = h.getUniformLocation(o.id, a);
        return o
    }

    function a(e, t) {
        h.activeTexture(h.TEXTURE0 + (t || 0)), h.bindTexture(h.TEXTURE_2D, e)
    }

    function s(e) {
        var t = /url\(["']?([^"']*)["']?\)/.exec(e);
        return null == t ? null : t[1]
    }

    function u(e) {
        return e.match(/^data:/)
    }
    var h, c = e(window),
        d = r(),
        f = i(32, 32);
    e("head").prepend("<style>.jquery-ripples { position: relative; z-index: 0; }</style>");
    var l = function(t, r) {
        function i() {
            o.step(), requestAnimationFrame(i)
        }
        var o = this;
        this.$el = e(t), this.interactive = r.interactive, this.resolution = r.resolution, this.textureDelta = new Float32Array([1 / this.resolution, 1 / this.resolution]), this.perturbance = r.perturbance, this.dropRadius = r.dropRadius, this.crossOrigin = r.crossOrigin, this.imageUrl = r.imageUrl;
        var n = document.createElement("canvas");
        n.width = this.$el.innerWidth(), n.height = this.$el.innerHeight(), this.canvas = n, this.$canvas = e(n), this.$canvas.css({
            position: "absolute",
            left: 0,
            top: 0,
            right: 0,
            bottom: 0,
            zIndex: -1
        }), this.$el.addClass("jquery-ripples").append(n), this.context = h = n.getContext("webgl") || n.getContext("experimental-webgl"), d.extensions.forEach(function(e) {
            h.getExtension(e)
        }), e(window).on("resize", function() {
            var e = o.$el.innerWidth(),
                t = o.$el.innerHeight();
            e == o.canvas.width && t == o.canvas.height || (n.width = e, n.height = t)
        }), this.textures = [], this.framebuffers = [], this.bufferWriteIndex = 0, this.bufferReadIndex = 1;
        for (var a = 0; a < 2; a++) {
            var s = h.createTexture(),
                u = h.createFramebuffer();
            h.bindFramebuffer(h.FRAMEBUFFER, u), u.width = this.resolution, u.height = this.resolution, h.bindTexture(h.TEXTURE_2D, s), h.texParameteri(h.TEXTURE_2D, h.TEXTURE_MIN_FILTER, d.linearSupport ? h.LINEAR : h.NEAREST), h.texParameteri(h.TEXTURE_2D, h.TEXTURE_MAG_FILTER, d.linearSupport ? h.LINEAR : h.NEAREST), h.texParameteri(h.TEXTURE_2D, h.TEXTURE_WRAP_S, h.CLAMP_TO_EDGE), h.texParameteri(h.TEXTURE_2D, h.TEXTURE_WRAP_T, h.CLAMP_TO_EDGE), h.texImage2D(h.TEXTURE_2D, 0, h.RGBA, this.resolution, this.resolution, 0, h.RGBA, d.type, null), h.framebufferTexture2D(h.FRAMEBUFFER, h.COLOR_ATTACHMENT0, h.TEXTURE_2D, s, 0), this.textures.push(s), this.framebuffers.push(u)
        }
        this.quad = h.createBuffer(), h.bindBuffer(h.ARRAY_BUFFER, this.quad), h.bufferData(h.ARRAY_BUFFER, new Float32Array([-1, -1, 1, -1, 1, 1, -1, 1]), h.STATIC_DRAW), this.initShaders(), this.initTexture(), this.setTransparentTexture(), this.loadImage(), h.clearColor(0, 0, 0, 0), h.blendFunc(h.SRC_ALPHA, h.ONE_MINUS_SRC_ALPHA), this.visible = !0, this.running = !0, this.inited = !0, this.setupPointerEvents(), requestAnimationFrame(i)
    };
    l.DEFAULTS = {
        imageUrl: null,
        resolution: 256,
        dropRadius: 20,
        perturbance: .03,
        interactive: !0,
        crossOrigin: ""
    }, l.prototype = {
        setupPointerEvents: function() {
            function e() {
                return r.visible && r.running && r.interactive
            }

            function t(t, i) {
                e() && r.dropAtPointer(t, r.dropRadius * (i ? 1.5 : 1), i ? .14 : .01)
            }
            var r = this;
            this.$el.on("mousemove.ripples", function(e) {
                t(e)
            }).on("touchmove.ripples, touchstart.ripples", function(e) {
                for (var r = e.originalEvent.changedTouches, i = 0; i < r.length; i++) t(r[i])
            }).on("mousedown.ripples", function(e) {
                t(e, !0)
            })
        },
        loadImage: function() {
            var e = this;
            h = this.context;
            var t = this.imageUrl || s(this.originalCssBackgroundImage) || s(this.$el.css("backgroundImage"));
            if (t != this.imageSource) {
                if (this.imageSource = t, !this.imageSource) return void this.setTransparentTexture();
                var r = new Image;
                r.onload = function() {
                    function t(e) {
                        return 0 == (e & e - 1)
                    }
                    h = e.context;
                    var i = t(r.width) && t(r.height) ? h.REPEAT : h.CLAMP_TO_EDGE;
                    h.bindTexture(h.TEXTURE_2D, e.backgroundTexture), h.texParameteri(h.TEXTURE_2D, h.TEXTURE_WRAP_S, i), h.texParameteri(h.TEXTURE_2D, h.TEXTURE_WRAP_T, i), h.texImage2D(h.TEXTURE_2D, 0, h.RGBA, h.RGBA, h.UNSIGNED_BYTE, r), e.backgroundWidth = r.width, e.backgroundHeight = r.height, e.hideCssBackground()
                }, r.onerror = function() {
                    h = e.context, e.setTransparentTexture()
                }, r.crossOrigin = u(this.imageSource) ? null : this.crossOrigin, r.src = this.imageSource
            }
        },
        step: function() {
            h = this.context, this.visible && (this.computeTextureBoundaries(), this.running && this.update(), this.render())
        },
        drawQuad: function() {
            h.bindBuffer(h.ARRAY_BUFFER, this.quad), h.vertexAttribPointer(0, 2, h.FLOAT, !1, 0, 0), h.drawArrays(h.TRIANGLE_FAN, 0, 4)
        },
        render: function() {
            h.bindFramebuffer(h.FRAMEBUFFER, null), h.viewport(0, 0, this.canvas.width, this.canvas.height), h.enable(h.BLEND), h.clear(h.COLOR_BUFFER_BIT | h.DEPTH_BUFFER_BIT), h.useProgram(this.renderProgram.id), a(this.backgroundTexture, 0), a(this.textures[0], 1), h.uniform1f(this.renderProgram.locations.perturbance, this.perturbance), h.uniform2fv(this.renderProgram.locations.topLeft, this.renderProgram.uniforms.topLeft), h.uniform2fv(this.renderProgram.locations.bottomRight, this.renderProgram.uniforms.bottomRight), h.uniform2fv(this.renderProgram.locations.containerRatio, this.renderProgram.uniforms.containerRatio), h.uniform1i(this.renderProgram.locations.samplerBackground, 0), h.uniform1i(this.renderProgram.locations.samplerRipples, 1), this.drawQuad(), h.disable(h.BLEND)
        },
        update: function() {
            h.viewport(0, 0, this.resolution, this.resolution), h.bindFramebuffer(h.FRAMEBUFFER, this.framebuffers[this.bufferWriteIndex]), a(this.textures[this.bufferReadIndex]), h.useProgram(this.updateProgram.id), this.drawQuad(), this.swapBufferIndices()
        },
        swapBufferIndices: function() {
            this.bufferWriteIndex = 1 - this.bufferWriteIndex, this.bufferReadIndex = 1 - this.bufferReadIndex
        },
        computeTextureBoundaries: function() {
            var e, r = this.$el.css("background-size"),
                i = this.$el.css("background-attachment"),
                n = o(this.$el.css("background-position"));
            if ("fixed" == i ? (e = {
                    left: window.pageXOffset,
                    top: window.pageYOffset
                }, e.width = c.width(), e.height = c.height()) : (e = this.$el.offset(), e.width = this.$el.innerWidth(), e.height = this.$el.innerHeight()), "cover" == r) var a = Math.max(e.width / this.backgroundWidth, e.height / this.backgroundHeight),
                s = this.backgroundWidth * a,
                u = this.backgroundHeight * a;
            else if ("contain" == r) var a = Math.min(e.width / this.backgroundWidth, e.height / this.backgroundHeight),
                s = this.backgroundWidth * a,
                u = this.backgroundHeight * a;
            else {
                r = r.split(" ");
                var s = r[0] || "",
                    u = r[1] || s;
                t(s) ? s = e.width * parseFloat(s) / 100 : "auto" != s && (s = parseFloat(s)), t(u) ? u = e.height * parseFloat(u) / 100 : "auto" != u && (u = parseFloat(u)), "auto" == s && "auto" == u ? (s = this.backgroundWidth, u = this.backgroundHeight) : ("auto" == s && (s = this.backgroundWidth * (u / this.backgroundHeight)), "auto" == u && (u = this.backgroundHeight * (s / this.backgroundWidth)))
            }
            var h = n[0],
                d = n[1];
            h = t(h) ? e.left + (e.width - s) * parseFloat(h) / 100 : e.left + parseFloat(h), d = t(d) ? e.top + (e.height - u) * parseFloat(d) / 100 : e.top + parseFloat(d);
            var f = this.$el.offset();
            this.renderProgram.uniforms.topLeft = new Float32Array([(f.left - h) / s, (f.top - d) / u]), this.renderProgram.uniforms.bottomRight = new Float32Array([this.renderProgram.uniforms.topLeft[0] + this.$el.innerWidth() / s, this.renderProgram.uniforms.topLeft[1] + this.$el.innerHeight() / u]);
            var l = Math.max(this.canvas.width, this.canvas.height);
            this.renderProgram.uniforms.containerRatio = new Float32Array([this.canvas.width / l, this.canvas.height / l])
        },
        initShaders: function() {
            var e = ["attribute vec2 vertex;", "varying vec2 coord;", "void main() {", "coord = vertex * 0.5 + 0.5;", "gl_Position = vec4(vertex, 0.0, 1.0);", "}"].join("\n");
            this.dropProgram = n(e, ["precision highp float;", "const float PI = 3.141592653589793;", "uniform sampler2D texture;", "uniform vec2 center;", "uniform float radius;", "uniform float strength;", "varying vec2 coord;", "void main() {", "vec4 info = texture2D(texture, coord);", "float drop = max(0.0, 1.0 - length(center * 0.5 + 0.5 - coord) / radius);", "drop = 0.5 - cos(drop * PI) * 0.5;", "info.r += drop * strength;", "gl_FragColor = info;", "}"].join("\n")), this.updateProgram = n(e, ["precision highp float;", "uniform sampler2D texture;", "uniform vec2 delta;", "varying vec2 coord;", "void main() {", "vec4 info = texture2D(texture, coord);", "vec2 dx = vec2(delta.x, 0.0);", "vec2 dy = vec2(0.0, delta.y);", "float average = (", "texture2D(texture, coord - dx).r +", "texture2D(texture, coord - dy).r +", "texture2D(texture, coord + dx).r +", "texture2D(texture, coord + dy).r", ") * 0.25;", "info.g += (average - info.r) * 2.0;", "info.g *= 0.995;", "info.r += info.g;", "gl_FragColor = info;", "}"].join("\n")), h.uniform2fv(this.updateProgram.locations.delta, this.textureDelta), this.renderProgram = n(["precision highp float;", "attribute vec2 vertex;", "uniform vec2 topLeft;", "uniform vec2 bottomRight;", "uniform vec2 containerRatio;", "varying vec2 ripplesCoord;", "varying vec2 backgroundCoord;", "void main() {", "backgroundCoord = mix(topLeft, bottomRight, vertex * 0.5 + 0.5);", "backgroundCoord.y = 1.0 - backgroundCoord.y;", "ripplesCoord = vec2(vertex.x, -vertex.y) * containerRatio * 0.5 + 0.5;", "gl_Position = vec4(vertex.x, -vertex.y, 0.0, 1.0);", "}"].join("\n"), ["precision highp float;", "uniform sampler2D samplerBackground;", "uniform sampler2D samplerRipples;", "uniform vec2 delta;", "uniform float perturbance;", "varying vec2 ripplesCoord;", "varying vec2 backgroundCoord;", "void main() {", "float height = texture2D(samplerRipples, ripplesCoord).r;", "float heightX = texture2D(samplerRipples, vec2(ripplesCoord.x + delta.x, ripplesCoord.y)).r;", "float heightY = texture2D(samplerRipples, vec2(ripplesCoord.x, ripplesCoord.y + delta.y)).r;", "vec3 dx = vec3(delta.x, heightX - height, 0.0);", "vec3 dy = vec3(0.0, heightY - height, delta.y);", "vec2 offset = -normalize(cross(dy, dx)).xz;", "float specular = pow(max(0.0, dot(offset, normalize(vec2(-0.6, 1.0)))), 4.0);", "gl_FragColor = texture2D(samplerBackground, backgroundCoord + offset * perturbance) + specular;", "}"].join("\n")), h.uniform2fv(this.renderProgram.locations.delta, this.textureDelta)
        },
        initTexture: function() {
            this.backgroundTexture = h.createTexture(), h.bindTexture(h.TEXTURE_2D, this.backgroundTexture), h.pixelStorei(h.UNPACK_FLIP_Y_WEBGL, 1), h.texParameteri(h.TEXTURE_2D, h.TEXTURE_MAG_FILTER, h.LINEAR), h.texParameteri(h.TEXTURE_2D, h.TEXTURE_MIN_FILTER, h.LINEAR)
        },
        setTransparentTexture: function() {
            h.bindTexture(h.TEXTURE_2D, this.backgroundTexture), h.texImage2D(h.TEXTURE_2D, 0, h.RGBA, h.RGBA, h.UNSIGNED_BYTE, f)
        },
        hideCssBackground: function() {
            var e = this.$el[0].style.backgroundImage;
            "none" != e && (this.originalInlineCss = e, this.originalCssBackgroundImage = this.$el.css("backgroundImage"), this.$el.css("backgroundImage", "none"))
        },
        restoreCssBackground: function() {
            this.$el.css("backgroundImage", this.originalInlineCss || "")
        },
        dropAtPointer: function(e, t, r) {
            var i = parseInt(this.$el.css("border-left-width")) || 0,
                o = parseInt(this.$el.css("border-top-width")) || 0;
            this.drop(e.pageX - this.$el.offset().left - i, e.pageY - this.$el.offset().top - o, t, r)
        },
        drop: function(e, t, r, i) {
            h = this.context;
            var o = this.$el.innerWidth(),
                n = this.$el.innerHeight(),
                s = Math.max(o, n);
            r /= s;
            var u = new Float32Array([(2 * e - o) / s, (n - 2 * t) / s]);
            h.viewport(0, 0, this.resolution, this.resolution), h.bindFramebuffer(h.FRAMEBUFFER, this.framebuffers[this.bufferWriteIndex]), a(this.textures[this.bufferReadIndex]), h.useProgram(this.dropProgram.id), h.uniform2fv(this.dropProgram.locations.center, u), h.uniform1f(this.dropProgram.locations.radius, r), h.uniform1f(this.dropProgram.locations.strength, i), this.drawQuad(), this.swapBufferIndices()
        },
        destroy: function() {
            this.$el.off(".ripples").removeClass("jquery-ripples").removeData("ripples"), this.$canvas.remove(), this.restoreCssBackground()
        },
        show: function() {
            this.visible = !0, this.$canvas.show(), this.hideCssBackground()
        },
        hide: function() {
            this.visible = !1, this.$canvas.hide(), this.restoreCssBackground()
        },
        pause: function() {
            this.running = !1
        },
        play: function() {
            this.running = !0
        },
        set: function(e, t) {
            switch (e) {
                case "dropRadius":
                case "perturbance":
                case "interactive":
                case "crossOrigin":
                    this[e] = t;
                    break;
                case "imageUrl":
                    this.imageUrl = t, this.loadImage()
            }
        }
    };
    var g = e.fn.ripples;
    e.fn.ripples = function(t) {
        if (!d) throw new Error("Your browser does not support WebGL, the OES_texture_float extension or rendering to floating point textures.");
        var r = arguments.length > 1 ? Array.prototype.slice.call(arguments, 1) : void 0;
        return this.each(function() {
            var i = e(this),
                o = i.data("ripples"),
                n = e.extend({}, l.DEFAULTS, i.data(), "object" == typeof t && t);
            (o || "string" != typeof t) && (o ? "string" == typeof t && l.prototype[t].apply(o, r) : i.data("ripples", o = new l(this, n)))
        })
    }, e.fn.ripples.Constructor = l, e.fn.ripples.noConflict = function() {
        return e.fn.ripples = g, this
    }
});