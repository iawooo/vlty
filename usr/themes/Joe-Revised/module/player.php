<?php
if (isset($_SERVER['HTTP_REFERER'])) {
    if (stripos($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST']) === false) {
    	exit;
    }
} else {
	exit;
}
function removeXSS(?string $val): string
{
	// remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
	// this prevents some character re-spacing such as <java\0script>
	// note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
	$val = preg_replace('/([\x00-\x08]|[\x0b-\x0c]|[\x0e-\x19])/', '', $val);

	// straight replacements, the user should never need these since they're normal characters
	// this prevents like <IMG SRC=&#X40&#X61&#X76&#X61&#X73&#X63&#X72&#X69&#X70&#X74&#X3A&#X61&#X6C&#X65&#X72&#X74&#X28&#X27&#X58&#X53&#X53&#X27&#X29>
	$search = 'abcdefghijklmnopqrstuvwxyz';
	$search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$search .= '1234567890!@#$%^&*()';
	$search .= '~`";:?+/={}[]-_|\'\\';

	for ($i = 0; $i < strlen($search); $i++) {
		// ;? matches the ;, which is optional
		// 0{0,7} matches any padded zeros, which are optional and go up to 8 chars

		// &#x0040 @ search for the hex values
		$val = preg_replace('/(&#[xX]0{0,8}' . dechex(ord($search[$i])) . ';?)/i', $search[$i], $val);
		// &#00064 @ 0{0,7} matches '0' zero to seven times
		$val = preg_replace('/(&#0{0,8}' . ord($search[$i]) . ';?)/', $search[$i], $val); // with a ;
	}

	// now the only remaining whitespace attacks are \t, \n, and \r
	$ra1 = ['javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script',
			'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base'];
	$ra2 = [
		'onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy',
		'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint',
		'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick',
		'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged',
		'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave',
		'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish',
		'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup',
		'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter',
		'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel',
		'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange',
		'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete',
		'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop',
		'onsubmit', 'onunload'
	];
	$ra = array_merge($ra1, $ra2);

	$found = true; // keep replacing as long as the previous round replaced something
	while ($found == true) {
		$val_before = $val;
		for ($i = 0; $i < sizeof($ra); $i++) {
			$pattern = '/';
			for ($j = 0; $j < strlen($ra[$i]); $j++) {
				if ($j > 0) {
					$pattern .= '(';
					$pattern .= '(&#[xX]0{0,8}([9ab]);)';
					$pattern .= '|';
					$pattern .= '|(&#0{0,8}([9|10|13]);)';
					$pattern .= ')*';
				}
				$pattern .= $ra[$i][$j];
			}
			$pattern .= '/i';
			$replacement = substr($ra[$i], 0, 2) . '<x>' . substr($ra[$i], 2); // add in <> to nerf the tag
			$val = preg_replace($pattern, $replacement, $val); // filter out the hex tags

			if ($val_before == $val) {
				// no replacements were made, so exit the loop
				$found = false;
			}
		}
	}

	return $val;
}
function safeUrl($url)
{
	$params = parse_url(str_replace(["\r", "\n", "\t", ' '], '', $url));

	/** 禁止非法的协议跳转 */
	if (isset($params['scheme'])) {
		if (!in_array($params['scheme'], ['http', 'https'])) {
			return '';
		}
	}

	$params = array_map(function ($string) {
		$string = str_replace(['%0d', '%0a'], '', strip_tags($string));
		return preg_replace([
			"/\(\s*(\"|')/i",           //函数开头
			"/(\"|')\s*\)/i",           //函数结尾
		], '', $string);
	}, $params);

	return (isset($params['scheme']) ? $params['scheme'] . '://' : null)
	. (isset($params['user']) ? $params['user']
		. (isset($params['pass']) ? ':' . $params['pass'] : null) . '@' : null)
	. ($params['host'] ?? null)
	. (isset($params['port']) ? ':' . $params['port'] : null)
	. ($params['path'] ?? null)
	. (isset($params['query']) ? '?' . $params['query'] : null)
	. (isset($params['fragment']) ? '#' . $params['fragment'] : null);
}

?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<meta charset="UTF-8" />
	<meta name="renderer" content="webkit" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no, viewport-fit=cover" />
	<title>M3U8 - Player</title>
	<style>
		* {
			margin: 0;
			padding: 0;
			-webkit-tap-highlight-color: transparent;
			outline: none;
			text-decoration: none;
		}

		html,
		body,
		#dplayer {
			width: 100%;
			height: 100%;
		}
	</style>
</head>

<body>
	<div id="dplayer"></div>
	<script src="../assets/libs/hls/hls.min.js"></script>
	<script src="../assets/libs/DPlayer/DPlayer.min.js"></script>
	<script>
		window.videoPlayer = new DPlayer({
			container: document.getElementById('dplayer'), // 播放器容器元素
			autoplay: <?= isset($_GET['autoplay']) && ($_GET['autoplay'] == "true" || $_GET['autoplay'] == "1")  ? 'true' : 'false' ?>, // 视频自动播放
			theme: '<?= isset($_GET['theme']) ? removeXSS($_GET['theme']) : '#409eff' ?>', // 主题色
			// lang: '', // 可选值: 'en', 'zh-cn', 'zh-tw'
			preload: '<?= (isset($_GET['pic']) && $_GET['pic'] != 'null') ? 'metadata' : 'auto' ?>', // 视频预加载，可选值: 'none', 'metadata', 'auto'
			loop: <?= isset($_GET['loop']) && ($_GET['loop'] == "true" || $_GET['loop'] == "1") ? 'true' : 'false' ?>, // 视频循环播放
			screenshot: <?= isset($_GET['screenshot']) && ($_GET['screenshot'] == "true" || $_GET['screenshot'] == "1") ? 'true' : 'false' ?>, // 开启截图，如果开启，视频和视频封面需要允许跨域
			airplay: true, // 在 Safari 中开启 AirPlay
			chromecast: true, // 开启chromecast
			volume: 1, // 默认音量，请注意播放器会记忆用户设置，用户手动设置音量后默认音量即失效
			playbackSpeed: [2.00, 1.75, 1.50, 1.25, 1.00, 0.75, 0.50, 0.25], // 可选的播放速率，可以设置成自定义的数组
			video: {
				url: '<?= isset($_GET['url']) ? safeUrl($_GET['url']) : 'null' ?>',
				pic: '<?= isset($_GET['pic']) ? safeUrl($_GET['pic']) : 'null' ?>',
			}
		})
	</script>
</body>

</html>