<?php

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit;
}

$JFooterTabbar = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'JFooterTabbar',
	NULL,
	NULL,
	'移动端底部Tab导航',
	'介绍：在移动端固定显示在最底部的tab导航按钮，支持排序和添加删除，注意开启后按钮不宜过多 | <a target="_blank" href="http://blog.bri6.cn/archives/232.html">查看官网教程</a>'
);
$JFooterTabbar->setAttribute('class', 'joe_content joe_footer');
$form->addInput($JFooterTabbar->multiMode());

$JFooterMode = new \Typecho\Widget\Helper\Form\Element\Select(
	'JFooterMode',
	['commercial' => '详细（默认）', 'simple' => '简约'],
	'commercial',
	'底栏模式',
	'介绍：简约模式下面两个设置可以设置，详细模式除了下面两个所有都可以设置'
);
$JFooterMode->setAttribute('class', 'joe_content joe_footer');
$form->addInput($JFooterMode->multiMode());

$JFooter_Left = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'JFooter_Left',
	NULL,
	'2021 - ' . date('Y') . ' © <a href="http://blog.bri6.cn">易航博客</a>丨技术支持：<a href="http://blog.bri6.cn" target="_blank">易航</a>',
	'自定义底部栏左侧内容（非必填）',
	'介绍：用于修改全站底部左侧内容（wap端上方） <br>
		 例如：<style style="display:inline">2021 - ' . date('Y') . ' © <a href="{站点链接}">{站点标题}</a>丨技术支持：<a href="http://blog.bri6.cn" target="_blank">易航</a></style>'
);
$JFooter_Left->setAttribute('class', 'joe_content joe_footer');
$form->addInput($JFooter_Left);

$JFooter_Right = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'JFooter_Right',
	NULL,
	'<a href="http://blog.bri6.cn/feed/" target="_blank">RSS</a>' . PHP_EOL . '<a href="http://blog.bri6.cn/sitemap.xml" target="_blank" style="margin-left: 15px">MAP</a>' . PHP_EOL . '<a href="https://beian.miit.gov.cn/#/Integrated/index" target="_blank" style="margin-left: 15px">冀ICP备2021010323号</a>',
	'自定义底部栏右侧内容（非必填）',
	'介绍：用于修改全站底部右侧内容（wap端下方） <br>
	例如：' . htmlentities('<a href="http://blog.bri6.cn/feed/" target="_blank">RSS</a>') . '<br>' . htmlentities('<a href="http://blog.bri6.cn/sitemap.xml" target="_blank" style="margin-left: 15px">MAP</a>') . '<br>' . htmlentities('<a href="https://beian.miit.gov.cn/#/Integrated/index" target="_blank" style="margin-left: 15px">冀ICP备2021010323号</a>')
);
$JFooter_Right->setAttribute('class', 'joe_content joe_footer');
$form->addInput($JFooter_Right);

$JFooterCenter1 = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'JFooterCenter1',
	NULL,
	str_replace('||', "\r\n", '<a href="/friend.html">友链申请</a>||<a href="/">免责声明</a>||<a target="_blank" href="https://wpa.qq.com/msgrd?v=3&uin=2136118039&site=qq&menu=yes">广告合作</a>||<a href="/about.html">关于我们</a>'),
	'底部栏中间第一行（建议为友情链接，或者站内链接）',
	'示例：<br>' . str_replace('||', '<br>', htmlentities('<a href="/friend.html">友链申请</a>||<a href="/">免责声明</a>||<a target="_blank" href="https://wpa.qq.com/msgrd?v=3&uin=2136118039&site=qq&menu=yes">广告合作</a>||<a href="/about.html">关于我们</a>'))
);
$JFooterCenter1->setAttribute('class', 'joe_content joe_footer');
$form->addInput($JFooterCenter1);

$JFooterCenter2 = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'JFooterCenter2',
	NULL,
	'<a href="http://blog.bri6.cn/feed/" target="_blank">RSS</a>
<a href="http://blog.bri6.cn/sitemap.xml" target="_blank" style="margin-left:5px;margin-right: 5px;">MAP</a>
<a href="http://beian.miit.gov.cn/" class="icp" target="_blank" rel="nofollow">冀ICP备2021010323号</a>
<br>
Copyright © 2022 - ' . date('Y') . ' · <a href="http://blog.bri6.cn">易航博客</a>
<br>
技术支持：<a href="http://blog.bri6.cn" target="_blank">易航</a>',
	'底部栏中间第二行（建议为版权提醒，备案号等）',
	'示例：<br>' . str_replace('||', '<br>', htmlentities('<a href="http://blog.bri6.cn/feed/" target="_blank">RSS</a>||<a href="http://blog.bri6.cn/sitemap.xml" target="_blank" style="margin-left:5px;margin-right: 5px;">MAP</a>||<a href="http://beian.miit.gov.cn/" class="icp" target="_blank" rel="nofollow">冀ICP备2021010323号</a>||<br>||Copyright © 2022 - ' . date('Y') . ' · <a href="http://blog.bri6.cn">易航博客</a>||<br>||技术支持：<a href="http://blog.bri6.cn" target="_blank">易航</a>'))
);
$JFooterCenter2->setAttribute('class', 'joe_content joe_footer');
$form->addInput($JFooterCenter2);

$JFooterLeftText = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'JFooterLeftText',
	NULL,
	'易航博客，一名编程爱好者的博客，博客主要用来记录与分享编程、学习中的知识点。',
	'底部栏左侧内容（非必填）'
);
$JFooterLeftText->setAttribute('class', 'joe_content joe_footer');
$form->addInput($JFooterLeftText);

$JFooterContactWechatImg = new \Typecho\Widget\Helper\Form\Element\Text(
	'JFooterContactWechatImg',
	NULL,
	'https://shp.qpic.cn/collector/2136118039/527b463f-2e22-4a7c-b4fe-d709c7cd81b2/0',
	'底部栏中间微信联系二维码（非必填）',
);
$JFooterContactWechatImg->setAttribute('class', 'joe_content joe_footer');
$form->addInput($JFooterContactWechatImg);

$JFooterContactQQ = new \Typecho\Widget\Helper\Form\Element\Text(
	'JFooterContactQQ',
	NULL,
	'2136118039',
	'底部栏中间QQ联系账号（非必填）',
);
$JFooterContactQQ->setAttribute('class', 'joe_content joe_footer');
$form->addInput($JFooterContactQQ);

$JFooterContactWeiBo = new \Typecho\Widget\Helper\Form\Element\Text(
	'JFooterContactWeiBo',
	NULL,
	'https://wpa.qq.com/msgrd?v=3&uin=2136118039&site=qq&menu=yes',
	'底部栏中间微博链接（非必填）',
);
$JFooterContactWeiBo->setAttribute('class', 'joe_content joe_footer');
$form->addInput($JFooterContactWeiBo);

$JFooterContactEmail = new \Typecho\Widget\Helper\Form\Element\Text(
	'JFooterContactEmail',
	NULL,
	'2136118039@qq.com',
	'底部栏中间邮箱联系账号（非必填）',
);
$JFooterContactEmail->setAttribute('class', 'joe_content joe_footer');
$form->addInput($JFooterContactEmail);

$JFooterMiniImg = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'JFooterMiniImg',
	NULL,
	'扫码加QQ群 || https://www.lequxiang.com.cn/view.php/ab5c4bad5d98a61de393ba054415bca3.png
扫码加微信 || https://www.lequxiang.com.cn/view.php/ab5c4bad5d98a61de393ba054415bca3.png',
	'底部栏右侧图片（非必填）',
	'介绍：一行一个，||用来分割<br>
	格式：显示文字 || 显示图片
	示例：<br>
	扫码加QQ群 || https://www.lequxiang.com.cn/view.php/ab5c4bad5d98a61de393ba054415bca3.png<br>
	扫码加微信 || https://www.lequxiang.com.cn/view.php/ab5c4bad5d98a61de393ba054415bca3.png'
);
$JFooterMiniImg->setAttribute('class', 'joe_content joe_footer');
$form->addInput($JFooterMiniImg);

$JFcodeCustomizeCode = new \Typecho\Widget\Helper\Form\Element\Textarea(
	'JFcodeCustomizeCode',
	NULL,
	NULL,
	'页脚自定义HTML（非必填）',
	'最底部额外的自定义代码'
);
$JFcodeCustomizeCode->setAttribute('class', 'joe_content joe_footer');
$form->addInput($JFcodeCustomizeCode);

$JBirthDay = new \Typecho\Widget\Helper\Form\Element\Text(
	'JBirthDay',
	NULL,
	date('Y/n/j H:i:s'),
	'网站成立日期（两种模式通用）',
	'介绍：用于显示当前站点已经运行了多少时间。<br>
		 注意：填写时务必保证填写正确！例如：2021/1/1 00:00:00 <br>
		 其他：不填写则不显示，若填写错误，则不会显示计时'
);
$JBirthDay->setAttribute('class', 'joe_content joe_footer');
$form->addInput($JBirthDay);
