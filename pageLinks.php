<?php
/** 
 * Links 链接
 *
 * @package custom
 *  
 * @author      Monst.x
 * @version     2020-04-12 0.1
 * 
*/ 
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$setting = $GLOBALS['VOIDSetting'];

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
                        
                        <!-- 随机输出友链 -->
                        <br>&nbsp;<br>
                        <h2 id="我の追番">我の后宫</h2><br>
                        <div id="pjax-container"><div class="board-list link-list" id="randomLinks"></div></div>
                        <br>&nbsp;<br>
                    </div>
                    
                    <div class="social-button" 
                        data-url="<?php $this->permalink(); ?>"
                        data-title="<?php Contents::title($this); ?>" 
                        data-site="<?php $this->options->title(); ?>"
                        data-excerpt="<?php $this->fields->excerpt(); ?>"
                        data-img="<?php if($this->fields->banner != '') echo $this->fields->banner(); else echo $setting['defaultBanner']; ?>" 
                        data-twitter="<?php if($setting['twitterId']!='') echo $setting['twitterId']; else $this->author(); ?>"
                        data-weibo="<?php if($setting['weiboId']!='') echo $setting['weiboId']; else $this->author(); ?>">
                        <?php if($setting['VOIDPlugin']):?>
                            <a role=button 
                                aria-label="为文章点赞" 
                                id="social" 
                                href="javascript:void(0);" onclick="VOID_Vote.vote(this);" 
                                data-item-id="<?php echo $this->cid;?>" 
                                data-type="up"
                                data-table="content"
                                class="btn btn-normal post-like vote-button"
                            >「赞」<span class="value" style="display:none;"><?php echo $this->likes; ?></span></a>
                        <?php endif; ?>
                        <?php if(!empty($setting['reward'])):?>
                            <a data-fancybox="gallery-reward" role=button aria-label="赞赏" data-src="#reward" href="javascript:;" class="btn btn-normal btn-highlight">「赏」</a>
                            <div hidden id="reward"><img src="<?php echo $setting['reward']; ?>"></div>
                        <?php endif; ?>
                        
                        <a aria-label="分享到 QQ" href="javascript:void(0);" onclick="Share.toQQ(this);" class="social-button-icon"><i class="voidicon-qq"></i></a>
                        <a aria-label="分享到 Weibo" href="javascript:void(0);" onclick="Share.toWeibo(this);" class="social-button-icon"><i class="voidicon-weibo"></i></a>
                        <a aria-label="分享到 Twitter" href="javascript:void(0);" onclick="Share.toTwitter(this);" class="social-button-icon"><i class="voidicon-twitter"></i></a>
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
                            $(item).wrap('<div class="bili-player"></div>');
                        }
                    });
                })();
                </script>
                <script>
                function randomFunc(){return ( Math.random() - 0.5 );}
                (function () {
                    $.each($('#randomLinks'), function(i, item){
                        var arr = [
                            <?php if(class_exists("Links_Plugin")): ?>
                            <?php Links_Plugin::output('
                            {\'url\': \'{url}\',\'name\': \'{name}\',\'slogan\': \'{description}\',\'logo\': \'{image}\'},',0); ?>
                            <?php endif; ?>
                            {'url': 'https://monsterx.cn/','name': 'Monst.x','slogan': 'Bug Dev','logo': 'https://cdn.monsterx.cn/logo.webp'}
                        ];
                        arr.sort(randomFunc);
                        var sHtml = '';
                        for(var num=0; num<arr.length; num++)
                            sHtml += '<div class="board-item link-item"><div class="board-thumb" data-thumb="' + arr[num].logo + '"><img class="lazyload instant loaded" data-src="' + arr[num].logo + '" src="' + arr[num].logo + '"></div><div class="board-title"><a target="_blank" href="' + arr[num].url + '">' + arr[num].name + '</a></div><div class="board-title description"><small>' + arr[num].slogan + '</small></div></div>';
                        document.getElementById("randomLinks").innerHTML = sHtml;
                        console.log('%c getLinks() %c 后宫以待 ', 'color: #fadfa3; background: #030307; padding:5px 0;','background: #fadfa3; padding:5px 0;');
                    });
                })();
                </script>

            </section>
        </div> <!--end .contents-wrap-->
    </div>
    
    <?php $this->need('includes/comments.php'); ?>
</main>

<?php 
if(!Utils::isPjax()){
    $this->need('includes/footer.php');
} 
?>