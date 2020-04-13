<?php
/**
 * comments.php
 * 
 * 评论区
 * 
 * @author      熊猫小A
 * @version     2020-04-10 0.1
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$setting = $GLOBALS['VOIDSetting'];
$parameter = array(
    'parentId'      => $this->hidden ? 0 : $this->cid,
    'parentContent' => $this->row,
    'respondId'     => $this->respondId,
    'commentPage'   => $this->request->filter('int')->commentPage,
    'allowComment'  => $this->allow('comment')
);
$this->widget('VOID_Widget_Comments_Archive', $parameter)->to($comments);
?>

<div class="comments-container float-up">
    <section id="comments" class="container">
        <!--评论框-->
        <?php if($this->allow('comment')): ?>
            <?php $this->header('commentReply=1&description=0&keywords=0&generator=0&template=0&pingback=0&xmlrpc=0&wlw=0&rss2=0&rss1=0&antiSpam=0&atom'); ?>
            <div id="<?php $this->respondId(); ?>" class="respond">
                <div class="cancel-comment-reply" role=button>
                    <?php $comments->cancelReply(); ?>
                </div>
                <h3 id="response" class="widget-title text-left">添加新评论</h3>
                <?php if(!empty($setting['commentNotification'])): ?>
                    <p class="comment-notification notice"><?php echo $setting['commentNotification']; ?></p>
                <?php endif; ?>
                <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form">
                    <?php if($this->user->hasLogin()): ?>
                    <p id="logged-in" 
                        data-name="<?php $this->user->screenName(); ?>" 
                        data-url="<?php $this->user->url(); ?>" 
                        data-email="<?php $this->user->mail(); ?>" ><?php _e('登录身份: '); ?>
                        <a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>
                        . <a no-pjax href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a>
                    </p>
                    <?php else: ?>
                        <div class="comment-info-input">
                        <input aria-label="称呼(必填)" type="text" name="author" id="author" required placeholder="称呼(必填)" value="<?php $this->remember('author'); ?>" />
                        <input aria-label="电子邮件<?php echo Helper::options()->commentsRequireMail? '(必填，将保密)' : '(选填)' ?>" 
                            type="email" name="mail" id="mail" 
                            placeholder="电子邮件<?php echo Helper::options()->commentsRequireMail? '(必填，将保密)' : '(选填)' ?>" 
                            <?php echo Helper::options()->commentsRequireMail? 'required' : '' ?>
                            value="<?php $this->remember('mail'); ?>" />
                        <input aria-label="网站<?php echo Helper::options()->commentsRequireURL? '(必填)' : '(选填)' ?>" type="url" name="url" id="url" 
                            <?php echo Helper::options()->commentsRequireURL? 'required' : '' ?>
                            placeholder="网站<?php echo Helper::options()->commentsRequireURL? '(必填)' : '(选填)' ?>"  
                            value="<?php $this->remember('url'); ?>" />
                        </div>
                        <!-- 移动端快速评论自动隐藏，否则 input 繁杂难看，中间的 display:none input 用于对齐 -->
                        <div class="comment-info-input comment-fast">
                        <input aria-label=" GitHub 账号快速评论" type="text" id="githubNum" for="githubNum" placeholder=" GitHub 账号快速评论" value="<?php $this->remember('githubNum'); ?>" style="margin-right:2px;" />
                        <input style="display:none;">
                        <input aria-label=" QQ 账号快速评论" type="text" id="qqNum" for="qqNum" placeholder=" QQ 账号快速评论" value="<?php $this->remember('qqNum'); ?>" style="margin-left:2px;" />
                        </div>
                    <?php endif; ?>
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
                </form>
            </div>

            <!-- GitHub&QQ 账号快速评论 -->
            <script>
                function isEmpty(obj) {
                    return typeof obj == "undefined" || obj == null || obj == "";
                }
                $(document).on("input propertychange", "#githubNum", function (event) {
                    event.preventDefault();
                    let oldVal = $(this).val();
                    let github = window.setTimeout(function () {
                        let newVal = $("#githubNum").val();
                        if (newVal.length > 0 && oldVal === $("#githubNum").val()) {
                            $.ajax({
                                url: 'https://api.github.com/users/' + newVal,
                                dataType: 'jsonp',
                                scriptCharset: "GBK",
                                contentType: "text/html; charset=GBK",
                                success: function (data) {
                                    // console.log(data);
                                    let personal = data["data"];
                                    $('#author').val(isEmpty(personal["name"]) ? personal["login"] : personal["name"]);
                                    $('#url').val(isEmpty(personal["blog"]) ? personal["html_url"] : personal["blog"]);
                                    $('#mail').val(isEmpty(personal["email"]) ? "null@example.com" : personal["email"]);
                                }
                            })
                        }
                    // 500ms 发起一次请求
                    }, 500);
                });
                $(document).on("input propertychange", "#qqNum", function (event) {
                    event.preventDefault();
                    let oldVal = $(this).val();
                    let qq = window.setTimeout(function () {
                        let newVal = $("#qqNum").val();
                        if (newVal.length > 0 && oldVal === $("#qqNum").val() && !newVal.isNaN) {
                            $.ajax({
                                url: '<?php Utils::indexTheme('/libs/Qinfo.php'); ?>?qNum=' + newVal,
                                dataType: 'jsonp',
                                jsonpCallback: 'portraitCallBack',
                                scriptCharset: "GBK",
                                contentType: "text/html; charset=GBK",
                                success: function (data) {
                                    // console.log(data);
                                    $('#author').val(isEmpty(data["nickname"]) ? "Mysterio" : data["nickname"]);
                                    $('#url').val("https://user.qzone.qq.com/");
                                    $('#mail').val(isEmpty(data["email"]) ? "null@example.com" : data["email"]);
                                }
                            })
                        }
                    // 500ms 发起一次请求
                    }, 500);
                });
            </script>

        <?php endif; ?>
        
        <!--历史评论-->
        <h3 class="comment-separator">
            <div class="comment-tab-current" id="pjax-container">
                <?php if($this->allow('comment')): ?>
                    <span class="comment-num">
                        <?php $this->commentsNum('这里还没有评论呢 >.<', '已有 1 条评论', '已有 <span class="num">%d</span> 条评论'); ?>
                    </span>
                <?php else :?>
                    <span class="comment-num">此处评论被关闭啦 ~</span>
                <?php endif;?>
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