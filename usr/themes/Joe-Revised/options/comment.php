<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

$JCommentStatus = new Typecho_Widget_Helper_Form_Element_Select(
	'JCommentStatus',
	array('on' => '开启（默认）', 'off' => '关闭'),
	'on',
	'开启或关闭全站评论',
	'介绍：用于一键开启关闭所有页面的评论 <br>
		 注意：此处的权重优先级最高 <br>
		 若关闭此项而文章内开启评论，评论依旧为关闭状态'
);
$JCommentStatus->setAttribute('class', 'joe_content joe_comment');
$form->addInput($JCommentStatus->multiMode());

/* 评论发信 */
$JCommentMail = new Typecho_Widget_Helper_Form_Element_Select(
	'JCommentMail',
	array('on' => '开启', 'off' => '关闭（默认）'),
	'off',
	'是否开启评论邮件通知',
	'介绍：开启后评论内容将会进行邮箱通知 <br />
		 注意：此项需要您完整无错的填写邮箱设置！'
);
$JCommentMail->setAttribute('class', 'joe_content joe_comment');
$form->addInput($JCommentMail->multiMode());

$Jcomment_draw = new Typecho_Widget_Helper_Form_Element_Select(
	'Jcomment_draw',
	array('on' => '开启', 'off' => '关闭（默认）'),
	'off',
	'是否启用评论画图模式',
	'介绍：开启后，可以进行画图评论'
);
$Jcomment_draw->setAttribute('class', 'joe_content joe_comment');
$form->addInput($Jcomment_draw->multiMode());

$Jcomment_showPlatform = new Typecho_Widget_Helper_Form_Element_Select(
	'Jcomment_showPlatform',
	array('on' => '开启（默认）', 'off' => '关闭'),
	'on',
	'是否展示评论者设备平台',
	'介绍：开启后，会显示评论者设备平台信息'
);
$Jcomment_showPlatform->setAttribute('class', 'joe_content joe_comment');
$form->addInput($Jcomment_showPlatform->multiMode());

$Jcomment_showBrowser = new Typecho_Widget_Helper_Form_Element_Select(
	'Jcomment_showBrowser',
	array('on' => '开启（默认）', 'off' => '关闭'),
	'on',
	'是否展示评论者浏览器',
	'介绍：开启后，会显示评论者浏览器信息'
);
$Jcomment_showBrowser->setAttribute('class', 'joe_content joe_comment');
$form->addInput($Jcomment_showBrowser->multiMode());

$Jcomment_showGeoIp = new Typecho_Widget_Helper_Form_Element_Select(
	'Jcomment_showGeoIp',
	array('on' => '开启（默认）', 'off' => '关闭'),
	'on',
	'是否展示评论者IPv4归属地',
	'介绍：开启后，会显示评论者IPv4归属地信息，如果评论者使用IPv6来访，会显示未知<br>
		如果网站开启了CDN，请在config.inc.php配置__TYPECHO_IP_SOURCE__字段为对应CDN的真实IP的header头<br>
		例如使用Cloudflare的header头为CF-Connecting-IP'
);
$Jcomment_showGeoIp->setAttribute('class', 'joe_content joe_comment');
$form->addInput($Jcomment_showGeoIp->multiMode());

$JSensitiveWords = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JSensitiveWords',
	NULL,
	'你妈死了 || 傻逼 || 操你妈 || 射你妈一脸',
	'评论敏感词（非必填）',
	'介绍：用于设置评论敏感词汇，如果用户评论包含这些词汇，则将会把评论置为审核状态 <br />
		 例如：你妈死了 || 你妈炸了 || 我是你爹 || 你妈坟头冒烟 （多个使用 || 分隔开）'
);
$JSensitiveWords->setAttribute('class', 'joe_content joe_comment');
$form->addInput($JSensitiveWords);

$JLimitOneChinese = new Typecho_Widget_Helper_Form_Element_Select(
	'JLimitOneChinese',
	array('on' => '开启', 'off' => '关闭（默认）'),
	'off',
	'是否开启评论至少包含一个中文',
	'介绍：开启后如果评论内容未包含一个中文，则将会把评论置为审核状态 <br />
		 其他：用于屏蔽国外机器人刷的全英文垃圾广告信息'
);
$JLimitOneChinese->setAttribute('class', 'joe_content joe_comment');
$form->addInput($JLimitOneChinese->multiMode());

$JTextLimit = new Typecho_Widget_Helper_Form_Element_Text(
	'JTextLimit',
	NULL,
	NULL,
	'限制用户评论最大字符',
	'介绍：如果用户评论的内容超出字符限制，则将会把评论置为审核状态 <br />
		 其他：请输入数字格式，不填写则不限制'
);
$JTextLimit->setAttribute('class', 'joe_content joe_comment');
$form->addInput($JTextLimit->multiMode());