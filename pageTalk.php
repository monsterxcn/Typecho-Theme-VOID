<?php
/** 
 * Talk 自言
 *
 * @package custom
 *  
 * @author      Monst.x
 * @version     2020-04-12 0.1
 * 
*/ 
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$parameter = array(
    'parentId'      => $this->hidden ? 0 : $this->cid,
    'parentContent' => $this->row,
    'respondId'     => $this->respondId,
    'commentPage'   => $this->request->filter('int')->commentPage,
    'allowComment'  => $this->allow('comment')
);
$this->widget('VOID_Widget_Comments_Archive', $parameter)->to($comments);

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
                    </div>
                    
                    <div class="social-button" 
                        data-url="<?php $this->permalink(); ?>"
                        data-title="<?php Contents::title($this); ?>" 
                        data-excerpt="<?php $this->fields->excerpt(); ?>"
                        data-img="<?php $this->fields->banner(); ?>" 
                        data-twitter="<?php if($setting['twitterId']!='') echo $setting['twitterId']; else $this->author(); ?>"
                        data-weibo="<?php if($setting['weiboId']!='') echo $setting['weiboId']; else $this->author(); ?>"
                        <?php if($this->fields->banner != '') echo 'data-image="'.$this->fields->banner.'"';?>>
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
                        }
                        $(item).wrap('<div class="bili-player"></div>');
                    });
                })();
                </script>

            </section>
        </div> <!--end .contents-wrap-->
    </div>
    <!--评论区总是开启且只有管理员可见评论框-->
    <div class="comments-container float-up">
        <section id="comments" class="container">
            <!--评论框-->
            <?php if($this->allow('comment')): ?>
                <?php $this->header('commentReply=0&description=0&keywords=0&generator=0&template=0&pingback=0&xmlrpc=0&wlw=0&rss2=0&rss1=0&antiSpam=0&atom'); ?>
                <div id="<?php $this->respondId(); ?>" class="respond">
                    <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form">
                        <?php if($this->user->hasLogin()): ?>
                        <p id="logged-in" 
                            data-name="<?php $this->user->screenName(); ?>" 
                            data-url="<?php $this->user->url(); ?>" 
                            data-email="<?php $this->user->mail(); ?>" ><?php _e('登录身份: '); ?>
                            <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>
                            . <a no-pjax href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                        </p>
                        <p style="margin-top:0">
                            <textarea aria-label="评论输入框" class="input-area" rows="5" name="text" id="textarea" 
                                placeholder="在这里输入你的评论..." 
                                style="resize:none;"><?php $this->remember('text'); ?></textarea>
                        </p>
                        <p class="comment-buttons">
                            <span class="OwO" aria-label="表情按钮" role="button"></span>
                            <?php if(Utils::isPluginAvailable('CommentToMail') || Utils::isPluginAvailable('Mailer')): ?>
                            <span class="comment-mail-me">
                                <input aria-label="有回复时通知我" name="receiveMail" type="checkbox" value="yes" id="receiveMail" checked />
                                <label for="receiveMail">有回复时通知我</label>
                            </span>
                            <?php endif; ?>
                            <button id="comment-submit-button" type="submit" class="submit btn btn-normal">提交评论</button>
                        </p>
                        <?php else: ?>
                            <p style="background: repeating-linear-gradient(145deg,#f2f2f2,#f2f2f2 15px,#fff 0,#fff 30px);padding: 20px 40px 20px 40px;position: relative;text-align: center;"><b>Monst.x 的碎碎念</b></p>
                        <?php endif; ?>
                    </form>
                </div>
            <?php endif; ?>
        
            <!--历史评论-->
            <h3 class="comment-separator">
                <div class="comment-tab-current" id="pjax-container">
                    <span class="comment-num">
                        <?php $this->commentsNum('这里还没有碎碎念呢 >.<', '已有 1 条碎碎念', '已有 <span class="num">%d</span> 条碎碎念'); ?>
                    </span>
                </div>
            </h3>
            <?php if ($comments->have()): ?>
                <?php $comments->listComments(array(
                'before'        =>  '<div class="comment-list" id="pjax-container">',
                'after'         =>  '</div>',
                'avatarSize'    =>  64,
                'dateFormat'    =>  'Y-m-d H:i'
                )); ?>
                <?php $comments->pageNav('<span aria-label="评论上一页">←</span>', '<span aria-label="评论下一页">→</span>', 1, '...', 'wrapClass=pager&prevClass=prev&nextClass=next'); ?>
            <?php endif; ?>
        </section>
    </div>

</main>

<?php 
if(!Utils::isPjax()){
    $this->need('includes/footer.php');
} 
?>