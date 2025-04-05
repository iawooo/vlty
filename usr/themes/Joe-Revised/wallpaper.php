<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php

/**
 * 壁纸
 *
 * @package custom
 *
 **/

?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<?php $this->need('module/head.php'); ?>
	<link rel="stylesheet" href="<?php joe\theme_url('assets/css/joe.wallpaper.min.css'); ?>">
	<script src="<?= joe\theme_url('sets/js/joe.wallpaper.min.js'); ?>"></script>
</head>

<body>
	<h1 style="display:none"><?php $this->archiveTitle(array('category' => '分类 %s 下的文章', 'search' => '包含关键字 %s 的文章', 'tag' => '标签 %s 下的文章', 'author' => '%s 发布的文章'), '', ' - '); ?><?php $this->options->title(); ?></h1>
	<div id="Joe">
		<?php $this->need('module/header.php'); ?>
		<div class="joe_container">
			<div class="joe_main">
				<div class="joe_wallpaper__type">
					<div class="joe_wallpaper__type-title">壁纸分类</div>
					<ul class="joe_wallpaper__type-list">
						<li class="error">正在拼命加载中...</li>
					</ul>
				</div>
				<div class="joe_wallpaper__list"></div>
				<ul class="joe_wallpaper__pagination"></ul>
			</div>
			<?php $this->need('module/aside.php'); ?>
		</div>
		<?php $this->need('module/footer.php'); ?>
	</div>
</body>

</html>