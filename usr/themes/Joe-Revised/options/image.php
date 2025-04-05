<?php

if (!defined('__TYPECHO_ROOT_DIR__')) exit;

$JFavicon = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JFavicon',
	NULL,
	'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAMAAABg3Am1AAAAaVBMVEUAAAA2Jyc2Jyc2Jyc2JyfWngc2Jyc2Jyc2Jyc2Jyc2Jyc2JydGMiSSbhU2Jyc2JydvUhs3Jyc2KCg2JyeYchRWPyCmexE2Jyc2JyfurwOKZhfEkQs2Jyd4Who2KCg2KCg2Jyf9ugD3tgL5+sE2AAAAIHRSTlMA6gsW9vuGMcTQtEb9+JNp+6lQKPz7+55y/fv7OvrZXtrXQoIAAAGdSURBVEjHxdXrcoIwEAXgBSJXi4oXVLwcfP+HbAyRQzrtLE6n0+8XagjZsyHKr8VZwg/ZVjRZhKjx10kOk4qiBBD56yMs7RkFABOLU8O6yE84a+uvLwYoYlHc2+M4pmrTZFZQI5llZfBkjIlmzZ9EGLWi8Nns187SZaTJDJan3umAXFQlcOi9NbASRWMX9Oi9BaDVHd+Arh+dgfr7cXU+KIB1T6elLcO7B9GDFv3Ejt+bbRh95Bjg3NNj//rBjiiD6FPeOnnEwQ6Lh0UXQMXoGcbqWQRL4EKqyc4tGbebqWNI/skcxXtfKjYibMP2uQ6ujjbAdefsw0anvil3Vz8lBqPiyzY2ybCGm5D9TFwR1+SqOYrFqg8L58qNwaqZ6jRXpppxWzKbmjOFnTv48pgNq8nY9HOwMxqeP+V0GXnmNAboFqMPG8jF/VDZSbdBobo0iFIXvntNOmgBfNDVjku9TD0DeArop4zXqYcxc2WqGte5h8O+qf8QS8e9+JqwKbXMUW1e2kT+zKYo8remXzGgeeIIlbwlzeU9SSP/5RPis0lhQ1CXpwAAAABJRU5ErkJggg==',
	'网站 Favicon 设置',
	'介绍：用于设置网站 Favicon，一个好的 Favicon 可以给用户一种很专业的观感 <br />
		 格式：图片 URL地址 或 Base64 地址 <br />
		 其他：免费转换 Favicon 网站 <a target="_blank" href="//tool.lu/favicon">tool.lu/favicon</a>'
);
$JFavicon->setAttribute('class', 'joe_content joe_image');
$form->addInput($JFavicon);

$JLogo = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JLogo',
	NULL,
	'data:image/png;base64,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',
	'网站 Logo 设置',
	'介绍：用于设置网站 Logo，一个好的 Logo 能为网站带来有效的流量 <br />
		 格式：图片 URL地址 或 Base64 地址 <br />
		 其他：免费制作 logo 网站 <a target="_blank" href="//www.uugai.com">www.uugai.com</a>'
);
$JLogo->setAttribute('class', 'joe_content joe_image');
$form->addInput($JLogo);

$JThumbnail = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JThumbnail',
	NULL,
	NULL,
	'自定义缩略图',
	'介绍：用于修改主题默认缩略图 <br/>
		 格式：图片地址，一行一个 <br />
		 注意：不填写时，则使用主题内置的默认缩略图'
);
$JThumbnail->setAttribute('class', 'joe_content joe_image');
$form->addInput($JThumbnail);

$JLazyload = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JLazyload',
	NULL,
	joe\theme_url("assets/images/lazyload.jpg"),
	'自定义懒加载图',
	'介绍：用于修改主题默认懒加载图 <br/>
		 格式：图片地址'
);
$JLazyload->setAttribute('class', 'joe_content joe_image');
$form->addInput($JLazyload);

$JDynamic_Background = new Typecho_Widget_Helper_Form_Element_Select(
	'JDynamic_Background',
	array(
		'off' => '关闭（默认）',
		'backdrop1.js' => '效果1',
		'backdrop2.js' => '效果2',
		'backdrop3.js' => '效果3',
		'backdrop4.js' => '效果4',
		'backdrop5.js' => '效果5',
		'backdrop6.js' => '效果6'
	),
	'off',
	'是否开启动态背景图（仅限PC）',
	'介绍：用于设置PC端动态背景<br />
	 注意：如果您填写了下方PC端静态壁纸，将优先展示下方静态壁纸！如需显示动态壁纸，请将PC端静态壁纸设置成空'
);
$JDynamic_Background->setAttribute('class', 'joe_content joe_image');
$form->addInput($JDynamic_Background->multiMode());

$JWallpaper_Background_PC = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JWallpaper_Background_PC',
	NULL,
	NULL,
	'PC端网站背景图片（非必填）',
	'介绍：PC端网站的背景图片，不填写时显示默认的灰色。<br />
		 格式：图片URL地址 或 随机图片api 例如：https://api.btstu.cn/sjbz/?lx=dongman <br />
		 注意：如果需要显示上方动态壁纸，请不要填写此项，此项优先级最高！'
);
$JWallpaper_Background_PC->setAttribute('class', 'joe_content joe_image');
$form->addInput($JWallpaper_Background_PC);

$JWallpaper_Background_WAP = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JWallpaper_Background_WAP',
	NULL,
	NULL,
	'移动端网站背景图片（非必填）',
	'介绍：移动端网站的背景图片，不填写时显示默认的灰色。<br />
		 格式：图片URL地址 或 随机图片api 例如：https://api.btstu.cn/sjbz/?lx=m_dongman'
);
$JWallpaper_Background_WAP->setAttribute('class', 'joe_content joe_image');
$form->addInput($JWallpaper_Background_WAP);

$JWallpaper_Background_Optimal = new Typecho_Widget_Helper_Form_Element_Select(
	'JWallpaper_Background_Optimal',
	[
		'off' => '关闭（默认）',
		'pc' => '仅PC端',
		'wap' => '仅移动端',
		'all' => '全部'
	],
	'off',
	'是否开启自定义背景壁纸优化',
	'介绍：开启后将对自定义背景壁纸模式下没有覆盖到的小地方的样式进行优化'
);
$JWallpaper_Background_Optimal->setAttribute('class', 'joe_content joe_image');
$form->addInput($JWallpaper_Background_Optimal->multiMode());

$JShare_QQ_Image = new Typecho_Widget_Helper_Form_Element_Textarea(
	'JShare_QQ_Image',
	NULL,
	NULL,
	'QQ分享链接图片',
	'介绍：用于修改在QQ内分享时卡片链接显示的图片 <br/>
		 格式：图片地址'
);
$JShare_QQ_Image->setAttribute('class', 'joe_content joe_image');
$form->addInput($JShare_QQ_Image);