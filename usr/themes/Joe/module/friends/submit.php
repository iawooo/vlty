<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
	http_response_code(404);
	exit;
}
?>
<form class="friend_submit">
	<h2>在线提交</h2>
	<input type="hidden" name="routeType" value="friend_submit">
	<div class="input">
		<label class="input-label">网站标题</label>
		<input type="text" placeholder="请输入您的网站标题" name="title">
	</div>
	<div class="input">
		<label class="input-label">网站简介</label>
		<input type="text" placeholder="请输入您的网站简介，可留空" name="description">
	</div>
	<div class="input">
		<label class="input-label">网站地址</label>
		<input type="url" placeholder="请输入您的网站地址" name="url">
	</div>
	<div class="input">
		<label class="input-label">网站图标</label>
		<input type="url" placeholder="请输入您的网站LOGO地址，留空则使用默认图标" name="logo">
	</div>
	<div class="input">
		<!-- <label class="input-label">ＱＱ</label> -->
		<label class="input-label">联系邮箱</label>
		<input type="email" placeholder="请输入您的联系邮箱号<?= Helper::options()->JFriendEmail == 'on' ? '，通过后会邮箱通知您' : null ?>" name="email">
	</div>
	<div class="input">
		<label class="input-label">提交验证</label>
		<div style="display: flex;align-items: center;"><input placeholder="请输入图片中的内容" name="captcha"><img style="cursor: pointer;height: 36px;" src="<?php $this->options->themeUrl('module/captcha.php') ?>" onclick="this.src=this.src+'?d='+Math.random();" data-toggle="tooltip" title="点击刷新"></div>
	</div>
	<div class="button">
		<button class="submit" type="submit">立即提交</button>
		<button type="reset" class="reset">重 置</button>
	</div>
</form>
<script type="text/javascript">
	function HtmlTextContent(string) {
		string = string.replace(/<script.*?<\/script>/gis, "").replace(/<style.*?<\/style>/gis, "");
		let div = document.createElement('div');
		div.innerHTML = string;
		let textContent = div.innerText || div.textContent || "";
		textContent = textContent.replace(/[\r\n]/g, " ").replace(/\s+/g, " ");
		return textContent;
	}
	$(".friend_submit").submit(function(event) {
		event.preventDefault();
		$.ajax({
			url: Joe.BASE_API,
			type: 'POST',
			data: $(this).serialize(),
			dataType: 'json',
			beforeSend() {
				$('.friend_submit .submit').html('<i class="loading mr6"></i>提交中...');
			},
			success(data) {
				$('.friend_submit .submit').html('立即提交');
				if (data.code == 200) {
					autolog.log(data.msg, 'success');
				} else {
					autolog.log(data.msg, 'warn');
				}
			},
			error(xhr, status, error) {
				console.log(xhr);
				$('.friend_submit .submit').html('立即提交');
				autolog.log('提交失败！' + HtmlTextContent(xhr.responseText), 'error');
			}
		});
	});
</script>