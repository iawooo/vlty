<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<div class="joe_detail__operate">
    <div class="joe_detail__operate-tags">
        <?php $this->tags('', true, '<a href="javascript: void(0);">暂无标签</a>'); ?>
    </div>
    <div class="joe_detail__operate-share">
        <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="26" height="26">
            <path d="M13.4 512.8c0 276 224 500 500 500s500-224 500-500-224-500-500-500c-276.6 0-500 224-500 500z" fill="#8F7DF6" />
            <path d="M513.4 233.8c13 0 23.8 10.6 23.8 23.8 0 13-10.6 23.8-23.8 23.8-128 0-231.6 103.8-231.6 231.6s103.8 231.6 231.6 231.6S745 640.8 745 513c-.4-13 9.8-24 22.8-24.6 13-.4 24 9.8 24.6 22.8v1.6c0 154-125 279-279 279s-279-125-279-279 125-279 279-279zM657 352.4c-8.6-9.6-7.8-24.4 1.8-33 9-8 22.6-8 31.4.2l40.8 40.8c12.4 12.2 12.4 32.2 0 44.6l-40.8 41c-9.4 8.8-24 8.6-33-.8-8.6-9-8.6-23.2 0-32.2l7-7h-30c-81.8 0-109.6 34.8-109.6 140.2 0 12.8-10.4 23.2-23.2 23.2-12.8 0-23.2-10.4-23.2-23.2 0-130.2 47.6-186.8 156.2-186.8h30l-7.4-7z" fill="#FFF" />
        </svg>
        <div class="reach">
            <a href="https://connect.qq.com/widget/shareqq/index.html?url=<?php $this->permalink() ?>&title=<?php $this->title() ?>&pics=<?php echo joe\getThumbnails($this)[0] ?>" target="_blank" rel="noopener noreferrer" title="分享到QQ">
                <svg class="icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="30" height="30">
                    <path d="M512 73.28A438.72 438.72 0 1 0 950.72 512 438.72 438.72 0 0 0 512 73.28zM759.84 646.4c-9.6 8.16-20.8-6.08-29.76-20.32s-14.88-26.72-16-21.76a158.4 158.4 0 0 1-37.44 70.72c-1.28 1.6 28.8 12.48 37.44 35.68s24 57.6-80 68.8a145.76 145.76 0 0 1-80-16c-16.96-8.32-27.52-16-29.6-16a73.6 73.6 0 0 1-13.28 0 108 108 0 0 1-14.4 0c-1.76 0-22.24 32-113.12 32-70.4 0-88.64-44.32-74.4-68.8s37.76-32 34.4-35.36a192 192 0 0 1-34.4-57.6 98.56 98.56 0 0 1-4.16-13.44c-1.28-4.64-6.56 8.64-13.92 21.76s-14.4 22.72-22.88 22.72a11.52 11.52 0 0 1-6.56-2.4c-20.96-16-19.2-55.2-5.44-93.12s48-75.04 48-83.2c1.28-30.24-3.04-35.2 0-43.2 6.56-17.76 14.72-10.88 14.72-20.16 0-116.32 86.4-210.56 192.96-210.56s192.96 94.24 192.96 210.56c0 4.48 11.68 0 17.12 20.16a196.96 196.96 0 0 1 0 43.2c0 11.04 29.44 24.48 44.8 83.2S768 640 759.84 646.4z" fill="#68A5E1" />
                </svg>
            </a>
            <a href="https://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=<?php $this->permalink() ?>&sharesource=qzone&title=<?php $this->title() ?>&pics=<?php echo joe\getThumbnails($this)[0] ?>" target="_blank" rel="noopener noreferrer" title="分享到QQ空间">
                <svg class="icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="30" height="30">
                    <path d="M512 73.28A438.72 438.72 0 1 0 950.72 512 438.72 438.72 0 0 0 512 73.28zM829.92 432c5.6 16-150.24 146.4-150.24 146.4s2.08 12.64 4.16 22.08c0 0-72.64 2.24-132.32 0-32-1.28-69.12-7.04-69.12-7.04L656 470.24a1005.44 1005.44 0 0 0-125.76-13.6A908 908 0 0 0 380 463.36c-6.4 1.76 44.8 1.6 103.04 6.88 40.8 3.68 94.56 13.44 94.56 13.44l-172.8 128s73.92 4.48 140.32 4.16c74.72 0 142.24-9.92 142.72-8 12.96 56.16 36.96 167.52 28 176-12.16 12.32-185.6-97.6-185.6-97.6S368 785.6 345.92 785.6a3.68 3.68 0 0 1-2.08 0c-10.72-8.8 35.52-206.72 35.52-206.72S222.72 448 229.12 432s208-30.24 208-30.24 74.88-188 92.48-188 92.8 188 92.8 188S824.32 416 829.92 432z" fill="#F5BE3F" />
                </svg>
            </a>
            <a href="http://service.weibo.com/share/share.php?sharesource=weibo&title=分享：<?php $this->title() ?>，原文链接：<?php $this->permalink() ?>&pic=<?php echo joe\getThumbnails($this)[0] ?>" target="_blank" rel="noopener noreferrer" title="分享到新浪微博">
                <svg class="icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="30" height="30">
                    <path d="M480.8 457.76a271.04 271.04 0 0 0-37.28 2.72c-96 13.44-166.72 75.04-157.92 137.44s93.6 101.92 189.6 88.48 166.72-75.04 157.92-137.44c-7.68-54.08-73.12-91.04-152.32-91.2zm-23.36 211.52a122.08 122.08 0 0 1-24 2.4c-48 0-88-27.52-96-68.32-9.28-48 29.44-95.2 86.56-106.24s110.88 18.4 120 66.08-29.44 95.04-86.56 106.08z" fill="#F56467" />
                    <path d="M512 73.28A438.72 438.72 0 1 0 950.72 512 438.72 438.72 0 0 0 512 73.28zm-43.84 666.88c-150.24 0-272-78.56-272-176S378.56 314.72 448 314.72c29.28 0 86.56 21.76 46.4 90.88a246.24 246.24 0 0 0 34.08-10.08c32-9.12 76.96-18.24 107.68 0 51.04 29.6 0 77.12 0 82.4s102.4 5.28 102.4 87.2c.32 96.48-120.16 175.04-270.4 175.04zm213.76-358.88a56 56 0 0 0-47.2-16 16.96 16.96 0 0 1-17.28-14.4 12.16 12.16 0 0 0 0 2.4v-4.8a12.16 12.16 0 0 0 0 2.4 20.48 20.48 0 0 1 17.28-17.28 77.28 77.28 0 0 1 68.32 18.56c32 28.48 18.72 75.68 18.72 75.68a21.28 21.28 0 0 1-20.48 17.28h-1.76a12.48 12.48 0 0 1-12.8-16.8 49.44 49.44 0 0 0-4.8-47.04zm120.16 60.64A29.6 29.6 0 0 1 776 467.84a22.08 22.08 0 0 1-19.68-25.92A139.2 139.2 0 0 0 736 336c-34.88-50.08-109.92-41.28-109.92-41.28A26.24 26.24 0 0 1 599.84 272v2.88-5.6V272a26.56 26.56 0 0 1 26.24-23.52 188.32 188.32 0 0 1 136.16 47.04c58.08 55.04 39.84 146.4 39.84 146.4z" fill="#F56467" />
                    <path d="M459.36 547.04a17.6 17.6 0 1 0 17.6 17.6 17.6 17.6 0 0 0-17.6-17.6zm-44.32 23.2a43.52 43.52 0 0 0-18.4 4.32A32 32 0 0 0 376 613.12a32 32 0 0 0 42.88 9.12 32 32 0 0 0 20.64-38.72 25.76 25.76 0 0 0-24.48-13.28z" fill="#F56467" />
                </svg>
            </a>
            <!-- 
                @杜恒：如果你有海报插件，将下面的注释解开，通过点击下方的图标调用生成海报
                <a href="javascript: void(0);" title="生成海报分享">
                    <svg class="icon" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" width="30" height="30">
                        <path d="M652.48 283.84h52.48q17.6 0 17.6 17.6v52.48q0 17.6-17.6 17.6h-52.48q-17.6 0-17.6-17.6v-52.48q0-17.6 17.6-17.6zM336.48 248.8h17.6v105.28h-17.6zm35.2 0h17.6v105.28h-17.6z" fill="#D7C5B0" />
                        <path d="M512 73.28A438.72 438.72 0 1 0 950.72 512 438.72 438.72 0 0 0 512 73.28zm263.2 596.64A105.12 105.12 0 0 1 669.92 775.2H354.08A105.28 105.28 0 0 1 248.8 669.92V441.76h121.76a157.92 157.92 0 1 0 282.88 0H775.2zM389.12 512A122.88 122.88 0 1 1 512 634.88 122.88 122.88 0 0 1 389.12 512zM775.2 406.72H629.76a158.08 158.08 0 0 0-235.52 0H248.8v-87.68a70.4 70.4 0 0 1 52.64-68v103.04h17.6V248.8H308h5.28a32 32 0 0 1 5.76 0h385.92a70.24 70.24 0 0 1 70.24 70.24z" fill="#D7C5B0" />
                    </svg>
                </a> 
            -->
        </div>
    </div>
</div>