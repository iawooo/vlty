<?php
$selectors = $this->request->getHeader('x-ajax-selectors');
if (is_string($selectors)) {
	$selectors = json_decode($selectors, true);
	if (in_array('#comment_module>.comment-list', $selectors)) $this->need('module/single/comment.php');
	if (in_array('.joe_detail__leaving', $selectors)) $this->need('module/single/leaving.php');
	if (in_array('joe-hide', $selectors)) {
		if (preg_match('/{hide[^}]*}([\s\S]*?){\/hide}/', $this->content, $content_match)) {
			$content = joe\markdown_hide($content_match[0], $this, $this->user->hasLogin());
			$content = _parseContent($this, $content);
		} else {
			$content = '';
		}
		// $content = '<script type="text/javascript">$(".pay-box").remove();</script>' . $content . joe\commentsAntiSpam($this->respondId);
		$content = '<script type="text/javascript">$(".pay-box").remove();</script>' . $content;
		$content = '<joe-hide>' . $content . '</joe-hide>';
		echo $content;
	}
	if (!in_array('#Joe', $selectors)) exit;
}
if ($this->is('single') && strpos($this->request->getPathInfo(), '/comment-page-1') !== false) {
	$this->response->setStatus(302);
	$url = str_ireplace('/comment-page-1', '', $this->request->getRequestUrl());
	$this->response->redirect($url, true);
	exit;
}
if ($this->is('post') && (joe\detectSpider() || joe\spider_referer()) && isset($_GET['scroll'])) {
	$this->response->setStatus(301);
	$url = str_ireplace('scroll=' . $_GET['scroll'], '', $this->request->getRequestUrl());
	$url = trim($url, '?');
	$url = str_replace(['??', '?&', '&&'], ['?', '?', '&'], $url);
	$this->response->redirect($url, true);
	exit;
}
