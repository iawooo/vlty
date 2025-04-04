document.addEventListener("DOMContentLoaded", function () {
    var e = document.querySelectorAll(".joe_config__aside .item"),
        t = document.querySelector(".joe_config__notice"),
        s = document.querySelector(".joe_config > form"),
        n = document.querySelectorAll(".joe_content");
    if (e.forEach(function (o) {
        o.addEventListener("click", function () {
            e.forEach(function (e) {
                e.classList.remove("active")
            }), o.classList.add("active");
            var c = o.getAttribute("data-current");
            sessionStorage.setItem("joe_config_current", c), "joe_notice" === c ? (t.style
                .display = "block", s.style.display = "none") : (t.style.display = "none", s
                    .style.display = "block"), n.forEach(function (e) {
                        e.style.display = "none";
                        var t = e.classList.contains(c);
                        t && (e.style.display = "block")
                    })
        })
    }), sessionStorage.getItem("joe_config_current")) {
        var o = sessionStorage.getItem("joe_config_current");
        "joe_notice" === o ? (t.style.display = "block", s.style.display = "none") : (s.style.display = "block",
            t.style.display = "none"), e.forEach(function (e) {
                var t = e.getAttribute("data-current");
                t === o && e.classList.add("active")
            }), n.forEach(function (e) {
                e.classList.contains(o) && (e.style.display = "block")
            })
    } else e[0].classList.add("active"), t.style.display = "block", s.style.display = "none";
    if ($('[data-current="joe_code"]').hasClass('active')) {
        sessionStorage.setItem("joe_config_current", 'joe_notice');
        // sessionStorage.removeItem("joe_config_current");
    }
});
