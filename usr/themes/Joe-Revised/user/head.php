<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('module/config.php');?>
<meta charset="utf-8" />
<meta name="renderer" content="webkit" />
<meta name="format-detection" content="email=no" />
<meta name="format-detection" content="telephone=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
<meta itemprop="image" content="<?php $this->options->JShare_QQ_Image() ?>" />
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, shrink-to-fit=no, viewport-fit=cover">
<link rel="shortcut icon" href="<?php $this->options->JFavicon() ?>" />
<?php $this->header('keywords=&description=&rss1=&rss2=&atom='); ?>
<link rel="stylesheet" href="<?= joe\theme_url('assets/css/joe.mode.min.css'); ?>">
<link rel="stylesheet" href="<?= joe\theme_url('assets/css/joe.normalize.min.css'); ?>">
<link rel="stylesheet" href="<?= joe\theme_url('assets/css/joe.global.min.css'); ?>">
<link rel="stylesheet" href="<?= joe\theme_url('assets/css/joe.responsive.min.css'); ?>">
<link rel="stylesheet" href="<?= joe\theme_url('assets/libs/qmsg/message.min.css'); ?>">
<link rel="stylesheet" href="<?= joe\theme_url('assets/libs/fancybox/jquery.fancybox.min.css'); ?>" />
<link rel="stylesheet" href="<?= joe\theme_url('assets/libs/animate/animate.min.css'); ?>" />
<link rel="stylesheet" href="<?= joe\theme_url('assets/libs/fontawesome/css/fontawesome.min.css'); ?>">
<link rel="stylesheet" href="<?= joe\theme_url('assets/libs/fontawesome/css/solid.min.css'); ?>">
<link rel="stylesheet" href="<?= joe\theme_url('assets/libs/fontawesome/css/brands.min.css'); ?>">
<link rel="stylesheet" href="<?= joe\theme_url('assets/libs/APlayer/APlayer.min.css'); ?>">
<style>
    button,
    input,
    optgroup,
    select,
    textarea {
        <?php if ($this->options->JCustomFont) : ?>font-family: 'Joe Font';
        <?php else : ?>font-family: 'Helvetica Neue', Helvetica, 'PingFang SC', 'Hiragino Sans GB', 'Microsoft YaHei', '微软雅黑', Arial, sans-serif;
        <?php endif; ?>
    }
</style>
<link href="<?= joe\theme_url('assets/css/joe.user.min.css') ?>" rel="stylesheet" type="text/css" />
<script src="<?= joe\theme_url('assets/libs/jquery/jquery.min.js'); ?>"></script>
<script src="<?= joe\theme_url('assets/libs/smoothscroll/smoothscroll.min.js'); ?>"></script>
<script src="<?= joe\theme_url('assets/libs/lazysizes/lazysizes.min.js'); ?>"></script>
<script src="<?= joe\theme_url('assets/libs/APlayer/APlayer.min.js'); ?>"></script>
<script src="<?= joe\theme_url('assets/libs/color-thief/color-thief.min.js'); ?>"></script>
<script src="<?= joe\theme_url('assets/js/MusicPlayer.min.js'); ?>"></script>
<script src="<?= joe\theme_url('assets/libs/sketchpad/sketchpad.min.js'); ?>"></script>
<script src="<?= joe\theme_url('assets/libs/fancybox/jquery.fancybox.min.js'); ?>"></script>
<script src="<?= joe\theme_url('assets/js/joe.extend.min.js'); ?>"></script>
<script src="<?= joe\theme_url('assets/libs/qmsg/message.min.js'); ?>"></script>
<?php if ($this->options->JAside_3DTag === 'on') : ?>
	<script src="<?= joe\theme_url('assets/libs/svg3dtagcloud/jquery.svg3dtagcloud.min.js'); ?>"></script>
<?php endif; ?>
<script src="<?= joe\theme_url('assets/libs/SmoothScroll-for-websites/SmoothScroll.min.js'); ?>" async></script>
<?php if ($this->options->JCursorEffects && $this->options->JCursorEffects !== 'off') : ?>
	<script src="<?= joe\theme_url('assets/cursor/' . $this->options->JCursorEffects) ?>" async></script>
<?php endif; ?>
<script src="<?= joe\theme_url('assets/js/joe.global.min.js'); ?>"></script>
<script src="<?= joe\theme_url('assets/js/joe.short.min.js'); ?>"></script>
<script>
    $(document).keyup(function(e){
        let key = e.which;
        if(key==13){
            if ($('#login').length > 0) { 
                $('#login').click();
            }
            if ($('#register').length > 0) { 
                $('#register').click();
            }
            if ($('#check').length > 0) { 
                $('#check').click();
            }
        }
    });
</script>
<?php $this->options->JCustomHeadEnd() ?>