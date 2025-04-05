<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <?php $this->need('module/head.php'); ?>
    <?php if ($this->options->JPrismTheme) : ?>
        <link rel="stylesheet" href="<?php $this->options->JPrismTheme() ?>">
    <?php else : ?>
        <link rel="stylesheet" href="<?= joe\theme_url('assets/libs/prism/prism.min.css'); ?>">
    <?php endif; ?>
    <script src="<?= joe\theme_url('assets/libs/clipboard/clipboard.min.js'); ?>"></script>
    <script src="<?= joe\theme_url('assets/libs/prism/prism.min.js'); ?>"></script>
    <script src="<?= joe\theme_url('assets/js/joe.post_page.min.js'); ?>"></script>
</head>

<body>
    <div id="Joe">
        <?php $this->need('module/header.php'); ?>
        <div class="joe_container">
            <div class="joe_main">
                <div class="joe_detail" data-cid="<?php echo $this->cid ?>">
                    <?php $this->need('module/batten.php'); ?>
                    <?php $this->need('module/article.php'); ?>
                    <?php $this->need('module/handle.php'); ?>
                    <?php $this->need('module/copyright.php'); ?>
                </div>
                <?php $this->need('module/comment.php'); ?>
            </div>
            <?php $this->need('module/aside.php'); ?>
        </div>
        <?php $this->need('module/footer.php'); ?>
    </div>
</body>

</html>