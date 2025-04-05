document.addEventListener("DOMContentLoaded", function () {
    let asideItem = document.querySelectorAll(".joe_config__aside .item");
    let notice = document.querySelector(".joe_config__notice");
    let form = document.querySelector(".joe_config > form");
    let content = document.querySelectorAll(".joe_content");
    asideItem.forEach(function (item) {
        item.addEventListener("click", function () {
            asideItem.forEach(function (item) {
                item.classList.remove("active");
            });
            item.classList.add("active");
            let current = item.getAttribute("data-current");
            sessionStorage.setItem("joe_config_current", current);
            if (current === "joe_notice") {
                notice.style.display = "block";
                form.style.display = "none";
            } else {
                notice.style.display = "none";
                form.style.display = "block";
            }
            content.forEach(function (item) {
                item.style.display = "none";
                if (item.classList.contains(current)) {
                    item.style.display = "block";
                }
            });
        })
    });
    if (sessionStorage.getItem("joe_config_current")) {
        let current = sessionStorage.getItem("joe_config_current");
        if (current === "joe_notice") {
            notice.style.display = "block";
            form.style.display = "none";
        } else {
            notice.style.display = "none";
            form.style.display = "block";
        }
        asideItem.forEach(function (item) {
            if (current === item.getAttribute("data-current")) {
                item.classList.add("active");
            }
        });
        content.forEach(function (item) {
            if (item.classList.contains(current)) {
                item.style.display = "block";
            }
        });
    } else {
        asideItem[0].classList.add("active");
        notice.style.display = "block";
        form.style.display = "none";
    }
    $.ajax({
        url: "https://raw.githubusercontent.com/jd82k/Joe/master/NOTICE",
        type: "get",
        dataType: "html",
        success: function(data){
            notice.innerHTML = data;
        },
        error: function(){
            notice.innerHTML = "请求失败！";
        }
    });
    //模拟form表单提交打开新的页面
    // function open_page(url, param = {}) {
    //     var form = '<form action="' + url + '"  target="_blank"  id="windowOpen" style="display:none">';
    //     if (param) {
    //         for (var key in param) {
    //             form += '<input name="' + key + '" value="' + param[key] + '"/>';
    //         }
    //     }
    //     form += '</form>';
    //     $('body').append(form);
    //     $('#windowOpen').submit();
    //     $('#windowOpen').remove();
    // }
    // function update(type = 'passive') {
    //     $.ajax({
    //         type: "post",
    //         url: `${Joe.service_domain}update`,
    //         data: {
    //             title: Joe.title,
    //             version: Joe.version,
    //             domain: Joe.domain,
    //             logo: Joe.logo,
    //             favicon: Joe.Favicon
    //         },
    //         dataType: "json",
    //         beforeSend: () => {
    //             if (type == 'active') {
    //                 layer.load(1, {
    //                     shade: [0.3, '#fff'] //0.1透明度的白色背景
    //                 });
    //             }
    //         },
    //         success: (data) => {
    //             layer.closeAll();
    //             if (data.update) {
    //                 var btn = JSON.stringify(data.btn);
    //                 btn = JSON.parse(btn);
    //                 layer.confirm(data.msg, {
    //                     btn: btn
    //                 }, function () {
    //                     open_page(data.download, data.param);
    //                 })
    //             } else {
    //                 if (type == 'active') {
    //                     layer.msg(data.msg);
    //                 }
    //             }
    //         },
    //         error: () => {
    //             layer.closeAll();
    //             layer.msg('请求错误，请检查您的网络');
    //         }
    //     });
    // }
    // update();
    // $('#update').click(() => {
    //     update('active');
    // });
});