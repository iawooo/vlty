# Joe修改版
本主题是继前人易航修改原作者Joe主题后的第二次修改

![release](https://img.shields.io/github/v/release/jd82k/Joe.svg?logo=git)
![license](https://img.shields.io/github/license/jd82k/Joe?logo=GitHub)
![php](https://img.shields.io/badge/PHP-v7.4+-666699.svg?logo=php)
![typecho](https://img.shields.io/badge/Typecho-v1.2.1+-467b96.svg?logo=data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAQAAADZc7J/AAAAIGNIUk0AAHomAACAhAAA+gAAAIDoAAB1MAAA6mAAADqYAAAXcJy6UTwAAAACYktHRAD/h4/MvwAAAAd0SU1FB+gEDQw3Dk+MOQUAAAEKSURBVEjHrZW9boMwFIU/rKjKYD8BHZkhE8+SCd6rz5Opm7cMHcsT2FLULu7gVA1gMOH23AVZOsf3x9xTMEVFS0NDiUFjAIfHMWCxvPPBIo50XAiZuNBxTNFrrlnyb1ypp/Qzt830QODGeXz7c/QoUf/Vvj35cSH3XvS76IFAFwXynV+eCFDtpgcC1YF2Mo+CHMLDd6tosoQ1NAdOK/obBBSlKINXhRYJaIURCZiCL15GR0tTSPfmW4nuBxR+dlM60vAKJ0rA/YPAIBIYFHZyVKzEHHYu8Bys+HcG4UJRwNvuAu5M8VIVr3UQG0vMQmRtsRf9JnPtH811/rqivZ8o0Rg04HF4PtP2/gPrHa+89Wx6HgAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAyNC0wNC0xM1QxMjo1NToxNCswMDowMEXzkBcAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMjQtMDQtMTNUMTI6NTU6MTQrMDA6MDA0riirAAAAKHRFWHRkYXRlOnRpbWVzdGFtcAAyMDI0LTA0LTEzVDEyOjU1OjE0KzAwOjAwY7sJdAAAAABJRU5ErkJggg==)

## 注意事项
1. 版本要求： PHP 7.4 或更高，Typecho 1.2.1 或更高
2. 使用本主题需要开启伪静态（Typecho后台设置启动固定链接）
3. 如果安装了Joe原版主题，需要手动备份原Joe主题的所有设置后删除theme目录下的原主题Joe文件夹，再将本主题的Joe文件夹上传到theme目录，不要图省事简单覆盖
4. 使用主题需要关闭typecho调试功能，即 `__TYPECHO_DEBUG__` 应设为 false ，因为主题的API接口是借用异常捕获来返回的
5. 原Joe主题有重大漏洞，PHP模板文件可以直接被浏览器打开执行，所有使用Joe主题的理论上都应当切换到此版本

## 修改简介：
1. 本仓库代码完全开源，请注意github上有很多打着开源旗号的但是代码很多被压缩的css/js，这并不能叫严格意义上的开源，本仓库开源所有未压缩的源代码（第三方库除外）
2. 继承易航修改的Joe再续前缘版，Joe再续前缘版的修改细节请到 http://blog.bri6.cn/archives/18.html 查看
3. 修复主题php文件可被直接执行的重大漏洞
4. 大部分CDN资源（css、js、图片等）本地化，防止CDN失效，也方便自行整合静态资源CDN
5. 恢复部分被压缩的源代码，保证基本上所有代码全部为可读未压缩的状态
6. 删除无用功能：百度收录，增加声明文章为转载的功能
7. 优化主题配置的默认项，删除无用的默认值
8. 优化文章链接的默认打开方式
9. 去除所有API更新检测接口，更新渠道只有github手动更新，保护您的隐私

## 致谢
1. 感谢原作者Joe https://78.al
2. 感谢修改者易航 http://blog.bri6.cn

## 联系
Telegram 群组: https://t.me/JoeModified