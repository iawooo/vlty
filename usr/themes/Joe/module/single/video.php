<meta name="referrer" content="no-referrer">
<div class="joe_detail__article-video">
    <h2 class="title" style="margin-top: 0px;">播放预览</h2>
    <div class="dplayer-video" webkit-playsinline="" playsinline=""></div>
    <h2>剧集列表</h2>
    <div class="featured-video-episode mt10 dplayer-featured">
        <?php
        $video_arr = strpos($this->fields->video, '$') === false ? joe\parse_markdown_link($this->fields->video) : joe\optionMulti($this->fields->video, "\r\n", '$', ['title', 'url', 'description']) ?>
        <?php foreach ($video_arr as $key => $item) :
            $index = $key + 1;
            $video_title = $item['title'] ? $item['title'] : ('第' . $index . '集'); ?>
            <a data-toggle="tooltip" class="switch-video text-ellipsis" data-index="<?= $index ?>" video-url="<?= $item['url'] ?>" data-original-title="<?= $item['description'] ? $item['description'] : $video_title ?>" href="javascript:;"><span class="mr6 badg badg-sm"><?= $index ?></span><i class="episode-active-icon"></i><?= $video_title ?></a>
        <?php endforeach; ?>
    </div>
</div>
<script src="<?= joe\cdn('hls.js/1.5.13/hls.min.js') ?>"></script>
<script src="<?= joe\cdn('dplayer/1.27.0/DPlayer.min.js') ?>"></script>