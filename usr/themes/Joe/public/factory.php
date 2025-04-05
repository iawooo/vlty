<?php

if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit;
}

require_once JOE_ROOT . 'public/phpmailer.php';
require_once JOE_ROOT . 'public/smtp.php';

/* 加强评论拦截功能 */
Typecho_Plugin::factory('Widget_Feedback')->comment = array('Intercept', 'message');
class Intercept
{
	public static function waiting($text)
	{
		// 判断用户输入是否大于字符
		if (Helper::options()->JTextLimit && strlen($text) > Helper::options()->JTextLimit) {
			Typecho\Cookie::set('__typecho_remember_text', $text);
			throw new Typecho\Widget\Exception(_t('评论的内容超出 ' . Helper::options()->JTextLimit . ' 字符限制！'));
		}

		// 判断评论是否至少包含一个中文
		if (Helper::options()->JLimitOneChinese == "on" && preg_match("/[\x{4e00}-\x{9fa5}]/u", $text) == 0) {
			Typecho\Cookie::set('__typecho_remember_text', $text);
			throw new Typecho\Widget\Exception(_t('评论至少包含一个中文！'));
		}

		// 判断评论内容是否包含敏感词
		if (Helper::options()->JSensitiveWords && joe\checkSensitiveWords(Helper::options()->JSensitiveWords, $text)) return true;

		return false;
	}
	public static function message($comment)
	{
		if (Helper::options()->JCommentStatus == 'off') {
			throw new Typecho\Widget\Exception(_t('叼毛 不要想着强制评论！'));
			return false;
		}
		if (Helper::options()->JcommentLogin == 'on' && !is_numeric(USER_ID)) {
			throw new Typecho\Widget\Exception(_t('叼毛 老老实实登录评论！'));
			return false;
		}

		// 用户输入内容画图模式
		if (preg_match('/\{!\{(.*)\}!\}/', $comment['text'], $matches) && Helper::options()->JcommentDraw == 'on') {
			// 如果判断是否有双引号，如果有双引号，则禁止评论
			if (strpos($matches[1], '"') !== false || _checkXSS($matches[1])) {
				$comment['status'] = 'waiting';
			} else {
				$comment_md5 = md5($matches[1]);
				$save_comment_path = '/usr/uploads/draw-comment/' . $comment_md5 . '.webp';
				$save_comment = joe\draw_save($matches[1], __TYPECHO_ROOT_DIR__ . $save_comment_path);
				if ($save_comment) {
					$comment['text'] = '{!{' . $save_comment_path . '}!}';
				} else {
					throw new Typecho_Exception(_t('画图图片保存失败！'));
					return false;
				}
			}
		} else if (self::waiting($comment['text'])) {
			$comment['status'] = 'waiting';
		}

		// Typecho_Cookie::delete('__typecho_remember_text');
		return $comment;
	}
}

/* 邮件通知 */
if (Helper::options()->JCommentMail === 'on' && joe\email_config()) {
	if (isset($_SESSION['JOE_SEND_MAIL_TIME'])) {
		if (time() - $_SESSION['JOE_SEND_MAIL_TIME'] >= 180) {
			Typecho_Plugin::factory('Widget_Feedback')->finishComment = array('Email', 'send');
		}
	} else {
		Typecho_Plugin::factory('Widget_Feedback')->finishComment = array('Email', 'send');
	}
}

class Email
{
	public static function send($comment)
	{
		$text = $comment->text;
		$text = _parseReply($text);
		$text = preg_replace('/\{!\{([^\"]*)\}!\}/', '<img referrerpolicy="no-referrer" rel="noreferrer" style="max-width: 100%;vertical-align: middle;" src="' . trim(Helper::options()->siteUrl, '/') . '$1"/>', $text);
		/* 如果是博主发的评论 */
		if ($comment->authorId == $comment->ownerId) {
			/* 发表的评论是回复别人 */
			if ($comment->parent != 0) {
				$db = Typecho_Db::get();
				$parentInfo = $db->fetchRow($db->select('mail')->from('table.comments')->where('coid = ?', $comment->parent));
				$parentMail = $parentInfo['mail'];
				/* 被回复的人不是自己时，发送邮件 */
				if ($parentMail != $comment->mail) {
					$text = CommentLink($text, $comment->permalink, '回复');
					joe\send_email('您在 [' . $comment->title . '] 的评论有了新的回复！', '博主：[ ' . $comment->author . ' ] 在《 <a style="color: #12addb;text-decoration: none;" href="' . substr($comment->permalink, 0, strrpos($comment->permalink, "#")) . '" target="_blank">' . $comment->title . '</a> 》上回复了您:', $text, $parentMail);
					$_SESSION['JOE_SEND_MAIL_TIME'] = time();
				}
			}
			/* 如果是游客发的评论 */
		} else {
			/* 如果是直接发表的评论，不是回复别人，那么发送邮件给博主 */
			if ($comment->parent == 0) {
				$db = Typecho_Db::get();
				$authoInfo = $db->fetchRow($db->select()->from('table.users')->where('uid = ?', $comment->ownerId));
				$authorMail = $authoInfo['mail'];
				if ($authorMail) {
					$text = CommentLink($text, $comment->permalink, '评论');
					joe\send_email('您的文章 [' . $comment->title . '] 收到一条新的评论！', $comment->author . ' [' . $comment->ip . '] 在您的《 <a style="color: #12addb;text-decoration: none;" href="' . substr($comment->permalink, 0, strrpos($comment->permalink, "#")) . '" target="_blank">' . $comment->title . '</a> 》上发表评论:', $text, $authorMail);
					$_SESSION['JOE_SEND_MAIL_TIME'] = time();
				}
				/* 如果发表的评论是回复别人 */
			} else {
				$db = Typecho_Db::get();
				$parentInfo = $db->fetchRow($db->select('mail')->from('table.comments')->where('coid = ?', $comment->parent));
				$parentMail = $parentInfo['mail'];
				/* 被回复的人不是自己时，发送邮件 */
				if ($parentMail != $comment->mail) {
					$text = CommentLink($text, $comment->permalink, '回复');
					joe\send_email('您在 [' . $comment->title . '] 的评论有了新的回复！', $comment->author . ' 在《 <a style="color: #12addb;text-decoration: none;" href="' . substr($comment->permalink, 0, strrpos($comment->permalink, "#")) . '" target="_blank">' . $comment->title . '</a> 》上回复了您:', $text, $parentMail);
					$_SESSION['JOE_SEND_MAIL_TIME'] = time();
				}
			}
		}
	}
}

function CommentLink($text, $link, $type)
{
	$text = $text . '<br><a style="display:block;color: #12addb;text-decoration: none;text-align:right;" href="' . str_replace('#', '?scroll=', $link) . '" target="_blank">查看' . $type . '</a>';
	return $text;
}


/* 加强后台编辑器功能 */
if (Helper::options()->JEditor !== 'off') {
	Typecho_Plugin::factory('admin/write-post.php')->richEditor  = array('Editor', 'Edit');
	Typecho_Plugin::factory('admin/write-post.php')->option  = array('Editor', 'labelSelection');
	Typecho_Plugin::factory('admin/write-page.php')->richEditor  = array('Editor', 'Edit');
}

class Editor
{
	public static function Edit()
	{
?>
		<link rel="stylesheet" href="<?= joe\theme_url('assets/plugin/twitter-bootstrap/3.4.1/css/tooltip.css', false); ?>">
		<link rel="stylesheet" href="<?= joe\cdn('aplayer/1.10.1/APlayer.min.css') ?>">

		<!-- Prism.css -->
		<link rel="stylesheet" href="<?= joe\cdn('prism-themes/1.9.0/'  . Helper::options()->JPrismTheme) ?>">
		<link href="<?= joe\cdn('prism/1.9.0/plugins/line-numbers/prism-line-numbers.min.css') ?>" rel="stylesheet">

		<link rel="stylesheet" href="<?= joe\theme_url('assets/css/joe.mode.css') ?>">
		<link rel="stylesheet" href="<?= joe\theme_url('assets/typecho/write/css/joe.write.css', false) ?>">

		<!-- 自定义CSS样式 -->
		<style>
			<?php Helper::options()->JCustomCSS(); ?>
		</style>
		<!-- 自定义CSS样式 -->

		<script>
			window.JoeConfig = {
				uploadAPI: `<?php Helper::security()->index('/action/upload'); ?>`,
				emojiAPI: `<?php Helper::options()->themeUrl('assets/typecho/write/json/emoji.json') ?>`,
				expressionAPI: `<?php Helper::options()->themeUrl('assets/json/joe.owo.json') ?>`,
				characterAPI: `<?php Helper::options()->themeUrl('assets/typecho/write/json/character.json') ?>`,
				playerAPI: `<?php Helper::options()->JCustomPlayer ? Helper::options()->JCustomPlayer() : Helper::options()->themeUrl('module/player.php?url=') ?>`,
				autoSave: <?php Helper::options()->autoSave(); ?>,
				themeURL: `<?php Helper::options()->themeUrl(); ?>`,
				JOwOAssetsUrl: `<?= empty(Helper::options()->JOwOAssetsUrl) ? '' : (Helper::options()->JOwOAssetsUrl . '/') ?>`,
				JStaticAssetsUrl: `<?= empty(Helper::options()->JStaticAssetsUrl) ? '' : (Helper::options()->JOwOAssetsUrl . '/') ?>`,
				canPreview: false
			}
		</script>
		<script src="<?= joe\cdn('aplayer/1.10.1/APlayer.min.js') ?>"></script>

		<!-- Prism.js -->
		<script src="<?= joe\cdn('prism/1.9.0/prism.min.js') ?>"></script>
		<script src="<?= joe\cdn('prism/1.9.0/plugins/autoloader/prism-autoloader.min.js') ?>"></script>
		<script>
			Prism.plugins.autoloader.languages_path = '<?php Helper::options()->themeUrl('assets/plugin/prism/1.9.0/components/') ?>';
		</script>
		<script src="<?= joe\cdn('prism/1.9.0/plugins/line-numbers/prism-line-numbers.min.js') ?>"></script>

		<script src="<?= joe\theme_url('assets/plugin/twitter-bootstrap/3.4.1/js/tooltip.js', false); ?>"></script>
		<script src="<?= joe\theme_url('assets/plugin/layer/3.7.0/layer.js', false) ?>"></script>
		<script src="<?= joe\theme_url('assets/typecho/write/parse/parse.min.js', false) ?>"></script>
		<script src="<?= joe\theme_url('assets/typecho/write/dist/CodeMirror.js', false) ?>"></script>
		<script src="<?= joe\theme_url('assets/typecho/write/js/tools.js') ?>"></script>
		<script src="<?= joe\theme_url('assets/typecho/write/js/actions.js') ?>"></script>
		<script src="<?= joe\theme_url('assets/typecho/write/js/create.js', false) ?>"></script>
		<script src="<?= joe\theme_url('assets/typecho/write/js/index.js') ?>"></script>
		<script src="<?= joe\theme_url('assets/js/joe.function.js'); ?>"></script>
		<script src="<?= joe\theme_url('assets/js/joe.short.js') ?>"></script>
	<?php
	}

	public static function labelSelection()
	{
	?>
		<section class="typecho-post-option">
			<style>
				.tagshelper {
					list-style: none;
					border: 1px solid #D9D9D6;
					padding: 6px;
					max-height: 240px;
					overflow: auto;
					background-color: #FFF;
					border-radius: 2px;
				}

				.tagshelper a {
					cursor: pointer;
					padding: 0px 6px;
					margin: 2px 0;
					display: inline-block;
					border-radius: 2px;
					text-decoration: none;
					transition: 0.1s;
				}

				.tagshelper a:hover {
					background: #ccc;
					color: #fff;
				}
			</style>
			<label for="token-input-tags" class="typecho-label"><?php _e('标签选择'); ?></label>
			<ul class="tagshelper">
				<?php
				Typecho_Widget::widget('Widget_Metas_Tag_Cloud')->to($tags);
				if ($tags->have()) {
					$i = 0;
					while ($tags->next()) {
						echo "<a onclick=\"$('#tags').tokenInput('add', {id: '" . $tags->name . "', tags: '" . $tags->name . "'});\">", $tags->name, "</a>";
						$i++;
					}
				}
				?>
			</ul>
		</section>
<?php
	}
}
