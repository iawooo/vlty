<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

$JCommentMailHost = new Typecho_Widget_Helper_Form_Element_Text(
	'JCommentMailHost',
	NULL,
	NULL,
	'邮箱服务器地址',
	'例如：smtp.qq.com'
);
$JCommentMailHost->setAttribute('class', 'joe_content joe_mail');
$form->addInput($JCommentMailHost->multiMode());

$JCommentSMTPSecure = new Typecho_Widget_Helper_Form_Element_Select(
	'JCommentSMTPSecure',
	array('ssl' => 'ssl（默认）', 'tsl' => 'tsl'),
	'ssl',
	'加密方式',
	'介绍：用于选择登录鉴权加密方式'
);
$JCommentSMTPSecure->setAttribute('class', 'joe_content joe_mail');
$form->addInput($JCommentSMTPSecure->multiMode());

$JCommentMailPort = new Typecho_Widget_Helper_Form_Element_Text(
	'JCommentMailPort',
	NULL,
	'465',
	'邮箱服务器端口号',
	'例如：465'
);
$JCommentMailPort->setAttribute('class', 'joe_content joe_mail');
$form->addInput($JCommentMailPort->multiMode());

$JCommentMailFromName = new Typecho_Widget_Helper_Form_Element_Text(
	'JCommentMailFromName',
	NULL,
	Helper::options()->title,
	'发件人昵称',
	'例如：帅气的象拔蚌'
);
$JCommentMailFromName->setAttribute('class', 'joe_content joe_mail');
$form->addInput($JCommentMailFromName->multiMode());

$JCommentMailAccount = new Typecho_Widget_Helper_Form_Element_Text(
	'JCommentMailAccount',
	NULL,
	NULL,
	'发件人邮箱',
	'例如：123456@qq.com'
);
$JCommentMailAccount->setAttribute('class', 'joe_content joe_mail');
$form->addInput($JCommentMailAccount->multiMode());

$JCommentMailPassword = new Typecho_Widget_Helper_Form_Element_Text(
	'JCommentMailPassword',
	NULL,
	NULL,
	'邮箱授权码',
	'介绍：这里填写的是邮箱生成的授权码 <br>
		 获取方式（以QQ邮箱为例）：<br>
		 QQ邮箱 > 设置 > 账户 > IMAP/SMTP服务 > 开启 <br>
		 其他：这个可以百度一下开启教程，有图文教程'
);
$JCommentMailPassword->setAttribute('class', 'joe_content joe_mail');
$form->addInput($JCommentMailPassword->multiMode());