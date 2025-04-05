<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit;
}
?>
<h1 class="joe_detail__title"><?php $this->title() ?></h1>
<div class="joe_detail__count">
	<div class="joe_detail__count-information">
		<a href="<?php $this->author->permalink(); ?>">
			<img width="38" height="38" class="avatar lazyload" src="<?php joe\getAvatarLazyload(); ?>" data-src="<?php joe\getAvatarByMail($this->author->mail) ?>" alt="<?php $this->author(); ?>" />
		</a>
		<div class="meta ml10">
			<div class="author">
				<a class="link" href="<?php $this->author->permalink(); ?>" title="<?php $this->author(); ?>"><?php $this->author(); ?></a>
			</div>
			<div class="item">
				<span data-toggle="tooltip" data-placement="bottom" title="<?php $this->date('Y年m月d日 H:i') ?> 发布" class="text"><?= joe\dateWord($this->dateWord) ?>发布</span>
				<?= $this->options->JPost_Record_Detection == 'on' ? '<span class="line">/</span><span class="text" id="Joe_Baidu_Record">正在检测是否收录...</span>' : null ?>
			</div>
		</div>
	</div>
</div>
<div class="relative">
	<i class="line-form-line"></i>
	<div class="flex ac single-metabox abs-right">
		<div class="post-metas">
			<item class="meta-comm">
				<svg class="icon" aria-hidden="true">
					<use xlink:href="#icon-comment"></use>
				</svg>
				<?php $this->commentsNum('%d'); ?>
			</item>
			<item class="meta-view">
				<svg class="icon" aria-hidden="true">
					<use xlink:href="#icon-view"></use>
				</svg>
				<span id="Joe_Article_Views"><?php joe\getViews($this); ?></span>
			</item>
			<item class="meta-like">
				<svg class="icon" aria-hidden="true">
					<use xlink:href="#icon-like"></use>
				</svg>
				<?php joe\getAgree($this) ?>
			</item>
		</div>
		<div class="clearfix ml6">
			<?php if ($this->user->uid == $this->authorId) : ?>
				<?php if ($this->is('post')) : ?>
					<a target="_blank" rel="noopener noreferrer" href="<?php $this->options->adminUrl(); ?>write-post.php?cid=<?php echo $this->cid; ?>" title="编辑文章">
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-menu_2"></use>
						</svg>
					</a>
				<?php else : ?>
					<a target="_blank" rel="noopener noreferrer" href="<?php $this->options->adminUrl(); ?>write-page.php?cid=<?php echo $this->cid; ?>" title="编辑页面">
						<svg class="icon" aria-hidden="true">
							<use xlink:href="#icon-menu_2"></use>
						</svg>
					</a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</div>