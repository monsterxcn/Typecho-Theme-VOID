<?php
/**
 * artalk.php
 * 
 * Artalk 评论区
 * 
 * @author      Monst.x
 * @version     2020-04-18 0.1
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
        <!--Artalk Start-->
        <div id="ArtalkComments" class="artalk">
            <?php if($this->allow('comment')): ?>
            <!-- Artalk 评论表单 -->
            <div class="artalk-editor">
                <div class="artalk-editor-header">
                    <input name="nick" placeholder="昵称" class="artalk-nick" type="text" required="required" />
                    <input name="email" placeholder="邮箱" class="artalk-email" type="email" required="required" />
                    <input name="link" placeholder="网址 (https://)" class="artalk-link" type="url" />
                </div>
                <div class="artalk-editor-textarea-wrap">
                    <textarea id="artalk-editor-textarea" class="artalk-editor-textarea" placeholder="来啊，快活啊 (/ω＼)" style="height: 130px;"><?php $this->remember('text'); ?></textarea>
                    <div class="artalk-send-reply"><span class="artalk-text">@Mr.S</span><span class="artalk-cancel" title="取消 AT">×</span></div>
                </div>
                <div class="artalk-editor-plug-wrap"></div>
                <div class="artalk-editor-bottom">
                    <div class="artalk-editor-bottom-part artalk-left artalk-editor-plug-switcher-wrap">
                        <span class="artalk-editor-action artalk-editor-plug-switcher">表情</span>
                        <span class="artalk-editor-action artalk-editor-plug-switcher">预览 <i title="Markdown is supported"><svg class="markdown" viewBox="0 0 16 16" version="1.1" width="16" height="16" aria-hidden="true"><path fill-rule="evenodd" d="M14.85 3H1.15C.52 3 0 3.52 0 4.15v7.69C0 12.48.52 13 1.15 13h13.69c.64 0 1.15-.52 1.15-1.15v-7.7C16 3.52 15.48 3 14.85 3zM9 11H7V8L5.5 9.92 4 8v3H2V5h2l1.5 2L7 5h2v6zm2.99.5L9.5 8H11V5h2v3h1.5l-2.51 3.5z"></path></svg></i></span>
                    </div>
                    <div class="artalk-editor-bottom-part artalk-right">
                        <button type="button" class="artalk-send-btn">发送评论</button>
                    </div>
                </div>
                <div class="artalk-editor-notify-wrap"></div>
            </div>
            <!-- Artalk Form End -->
            <!-- 将 Artalk 评论数据绑定到隐藏表单提交至 Typecho -->
            <form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" style="display:none">
                <input type="text" name="author" id="author" required value="<?php $this->remember('author'); ?>" />
                <input type="email" name="mail" id="mail" required value="<?php $this->remember('mail'); ?>" />
                <input type="url" name="url" id="url"  value="<?php $this->remember('url'); ?>" />
                <textarea name="text" id="textarea"><?php $this->remember('text'); ?></textarea>
                <button id="comment-submit-button" type="submit">提交评论</button>
            </form>
            <!-- Typecho Form End -->
            <?php endif; ?>

            <div class="artalk-list">
                <div class="artalk-list-header">
                    <div class="artalk-comment-count"><span class="artalk-comment-count-num"></span>条评论</div>
                    <div class="artalk-right-action"><span data-action="open-sidebar">通知中心</span></div>
                </div>
                <!-- Artalk Comments Start -->
                <div class="artalk-list-body">
                    <div class="artalk-list-comments-wrap">
                        <!-- A Comment Start -->
                        <div class="artalk-comment-wrap" data-comment-id="">
                            <div class="artalk-comment">
                                <div class="artalk-avatar"><a target="_blank" href=""><img src=""></a></div>
                                <div class="artalk-content">
                                    <div class="artalk-header">
                                        <span class="artalk-nick"><a target="_blank" href="https://monsterx.cn">Mr.S</a></span>
                                        <span class="artalk-badge">管理员</span>
                                        <span class="artalk-date">刚刚</span>
                                        <span class="artalk-ua">Chrome 101</span>
                                    </div>
                                    <div class="artalk-body">
                                        <p>测试评论来一个</p>
                                    </div>
                                    <div class="artalk-footer">
                                        <div class="artalk-comment-actions"><span data-comment-action="reply">回复</span></div>
                                    </div>
                                    <div class="artalk-comment-children"></div>
                                </div>
                            </div>
                        </div>
                        <!-- A Comment End -->

                        <!-- Typecho Comments History -->
                        <?php if ($comments->have()): ?>
                            <?php $comments->listComments(array(
                                'before'        =>  '<div class="artalk-comment-wrap" data-comment-id="">',
                                'after'         =>  '</div>',
                                'avatarSize'    =>  64,
                                'dateFormat'    =>  'Y-m-d H:i'
                            )); ?>
                            <?php $comments->pageNav('<span aria-label="评论上一页">←</span>', '<span aria-label="评论下一页">→</span>', 1, '...', 'wrapClass=pager&prevClass=prev&nextClass=next'); ?>
                        <?php endif; ?>
                        <!-- Typecho Comments History End -->

                    </div>
                </div>
                <!-- Artalk Comments End -->
                <div class="artalk-list-footer">
                    <div class="artalk-copyright">Powered By <a href="https://artalk.js.org" target="_blank" title="qwqcode/Artalk v1.0.2">Artalk</a></div>
                </div>
            </div>
        </div>
        <!--Artalk End-->
    </section>
</div>