<?php

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit;
}

if ($this->is('index') && ($this->options->JFriendsSpiderHide != 'on' || !joe\detectSpider())) {
	$db = Typecho_Db::get();
	$friends = $db->fetchAll($db->select()->from('table.friends')->where('status = ?', 1)->where("FIND_IN_SET('index_bottom',position)")->order('order', Typecho_Db::SORT_DESC));
	if (sizeof($friends) > 0) : ?>
		<?php
		$friends_page = $db->fetchRow($db->select()->from('table.contents')->where('type = ?', 'page')->where('template = ?', 'friends.php')->where('status = ?', 'publish')->limit(1));
		if ($friends_page) {
			$friends_page_pathinfo = Typecho\Router::url('page', $friends_page);
			$friends_page_url = Typecho\Common::url($friends_page_pathinfo, $this->options->index);
		} else {
			$friends_page_url = null;
		}
		?>
		<div class="container fluid-widget">
			<div class="links-widget mb20">
				<div class="box-body notop">
					<div class="title-theme">友情链接<?= $friends_page_url ? '<div class="pull-right em09 mt3"><a href="' . $friends_page_url . '" class="muted-2-color"><i class="fa fa-angle-right fa-fw"></i>申请友链</a></div>' : null ?></div>
				</div>
				<div class="links-box links-style-simple zib-widget">
					<?php
					if ($this->options->JFriends_shuffle == 'on') shuffle($friends);
					$friends = array_values($friends);
					foreach ($friends as $key => $item) echo '<a rel="' . $item['rel'] . '" target="_blank" class="' . ($key ? 'icon-spot' : null) . '" data-trigger="hover" data-toggle="popover" data-placement="top" data-content="' . ($item['description'] ?? '暂无简介') . '" referrer="unsafe-url" href="' . $item['url'] . '" data-original-title="' . $item['title'] . '">' . $item['title'] . '</a>';
					if ($friends_page_url) echo '<a class="icon-spot" href="' . $friends_page_url . '">查看更多</a>';
					?>
				</div>
			</div>
		</div>
<?php endif;
}

?>