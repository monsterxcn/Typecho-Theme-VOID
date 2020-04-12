<?php
/** 
 * Bgm 追番
 *
 * @package custom
 *  
 * @author      Monst.x
 * @version     2020-04-11 0.1
 * 
*/ 
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

if(!Utils::isPjax()){
    $this->need('includes/head.php');
    $this->need('includes/header.php');
} 
?>

<main id="pjax-container">
    <title hidden>
        <?php Contents::title($this); ?>
    </title>

    <?php $this->need('includes/ldjson.php'); ?>
    <?php $this->need('includes/banner.php'); ?>

    <div class="wrapper container">
        <div class="contents-wrap"> <!--start .contents-wrap-->
            <section id="post" class="float-up">
                <article class="post yue">

                    <div class="articleBody" class="full">
                        <?php $this->content(); ?>
                        
                        <!-- 输出追番 -->
                        <br>&nbsp;<br>
                        <h2 id="我の追番">我の追番</h2><br>
                        <div data-type="watching" class="bgm-collection"></div>
                        
                        <br>&nbsp;<br>
                        <h2 id="我の追完">我の追完</h2><br>
                        <div data-type="watched" data-cate="anime" class="bgm-collection"></div>
                        <br>&nbsp;<br>
                    </div>

                    <div class="social-button" 
                        data-url="<?php $this->permalink(); ?>"
                        data-title="<?php Contents::title($this); ?>" 
                        data-excerpt="<?php $this->fields->excerpt(); ?>"
                        data-img="<?php $this->fields->banner(); ?>" 
                        data-twitter="<?php if($setting['twitterId']!='') echo $setting['twitterId']; else $this->author(); ?>"
                        data-weibo="<?php if($setting['weiboId']!='') echo $setting['weiboId']; else $this->author(); ?>"
                        <?php if($this->fields->banner != '') echo 'data-image="'.$this->fields->banner.'"';?>>
                        <?php if(!empty($setting['reward'])):?>
                            <a data-fancybox="gallery-reward" role=button aria-label="赞赏" data-src="#reward" href="javascript:;" class="btn btn-normal btn-highlight">赏杯咖啡</a>
                            <div hidden id="reward"><img src="<?php echo $setting['reward']; ?>"></div>
                        <?php endif; ?>
                        <?php if($setting['VOIDPlugin']):?>
                            <a role=button 
                                aria-label="为文章点赞" 
                                id="social" 
                                href="javascript:void(0);" onclick="VOID_Vote.vote(this);" 
                                data-item-id="<?php echo $this->cid;?>" 
                                data-type="up"
                                data-table="content"
                                class="btn btn-normal post-like vote-button"
                            >ENJOY <span class="value"><?php echo $this->likes; ?></span>
                            </a>
                        <?php endif; ?>
                        
                        <a aria-label="分享到微博" href="javascript:void(0);" onclick="Share.toWeibo(this);" class="social-button-icon"><i class="voidicon-weibo"></i></a>
                        <a aria-label="分享到Twitter" href="javascript:void(0);" onclick="Share.toTwitter(this);" class="social-button-icon"><i class="voidicon-twitter"></i></a>
                    </div>
                </article>

                <script>
                (function () {
                    $.each($('iframe'), function(i, item){
                        var src = $(item).attr('src');
                        if (typeof src === 'string' && src.indexOf('player.bilibili.com') > -1) {
                            // $(item).addClass('bili-player');
                            if (src.indexOf('&high_quality') < 0) {
                                src += '&high_quality=1'; // 启用高质量
                                $(item).attr('src', src);
                            }
                        }
                        $(item).wrap('<div class="bili-player"></div>');
                    });
                })();
                </script>

            </section>
        </div> <!--end .contents-wrap-->
    </div>
    <!--评论区，可选-->
    <?php $this->need('includes/comments.php'); ?>
</main>

<?php 
if(!Utils::isPjax()){
    $this->need('includes/footer.php');
} 
?>