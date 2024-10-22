<h1 align="center">Typecho Theme VOID</h1>

<div align="center">

✏ 一款简洁优雅的 Typecho 主题

</div></br>

<div align="center">

![Build](https://img.shields.io/github/workflow/status/monsterxcn/Typecho-Theme-VOID/Build?style=flat-square)  ![Download](https://img.shields.io/github/downloads/monsterxcn/Typecho-Theme-VOID/total?style=flat-square)  ![Release](https://img.shields.io/github/v/release/monsterxcn/Typecho-Theme-VOID?style=flat-square)  ![License](https://img.shields.io/github/license/monsterxcn/Typecho-Theme-VOID?label=GLWTPL&style=flat-square)

</div></br>


作为计算机术语时，VOID 的意思是「无类型」。了解原版 VOID 主题请查看《[VOID：现在可以公开的情报](https://blog.imalan.cn/247/)》、原 GitHub 仓库 [AlanDecode/Typecho-Theme-VOID](https://github.com/AlanDecode/Typecho-Theme-VOID)。本主题结构、使用方式与原主题相同，可以 **切换 nightly 分支下载仓库** 作为主题使用。

本仓库二次开发起点为原仓库 Commit [4931ecb](https://github.com/AlanDecode/Typecho-Theme-VOID/commit/4931ecb4e3ce21761afaf2fc9f2e414311d2b20a) on Mar 18, 2020，主要针对一些 **自用需求** ，请谨慎将本主题投入生产环境。我会及时同步原仓库重要 commit 。另外发布版本图一乐，请不要在意 Release 版本号。如果你使用了本主题且发现 Bug 请提出 issues 帮助改进，谢谢。

## 特性

<details><summary>原始特性</summary><br>

* 响应式设计
* PJAX 无刷新体验
* AJAX 评论
* 前台无跳转登陆（兼容 PJAX）
* 自动夜间模式
* 优秀的可读性
* 衬线、非衬线两种文字风格
* 代码高亮（浅色暗色两种风格，随主题切换）
* Mac 风格代码块（可开启或关闭）
* 代码行号
* 站点样式设置面板（日夜转换、字体、字号）
* MathJax 公式
* 表情解析（文章、评论可用）
* 图片排版（可用作相册）
* 图片懒加载
* 灵活的头图设置
* 文章目录解析
* 完整的结构化数据支持
* 够用的后台设置与丰富的高级设置

</details>

<details><summary>插件功能</summary><br>

* 浏览量统计
* 文章点赞
* 文章字数统计
* 评论投票与自动折叠
* 访客互动展示

</details>

相比 AlanDecode 版本，我尝试 新增/调整 了以下功能：

 - 新增：MermaidJS v8.5.0 支持，丰富的图表写作体验
 - 新增：Artalk v1.0.6 支持，简洁的自托管评论系统
 - 新增：InstantPage v3.0 支持，据说用它体验更佳
 - 新增：Progressive Web Apps 支持，现在可以更方便的启用 PWA
 - 新增：GitHub & QQ 账号快速评论，参考 Krait [博文](https://krait.cn/major/1888.html) 实现更方便的评论
 - 新增：静态资源单独 CDN 配置，将静态文件上传至 CDN 分离加速
 - 新增：主题设置数据备份，参考 QQdie [博文](https://qqdie.com/archives/typecho-templates-backup-and-restore.html) 实现高级设置再也不用反复设置辣
 - 新增：网页 HTML 压缩，一个默认不开启的可有可无的功能
 - 新增：独立页面模板，方便起见还是写点独立页面模板放着吧
 - 新增：OwO 表情扩展，除了蛆音娘还有一些 QQ 表情
 - 调整：Console 统一样式输出版权，写的不是很优雅但 ~~求求你们不要在我的控制台拉五颜六色的屎了~~
 - 调整：MathJax 升级，v3.x 版本重构暂时无法兼容只升级至最新 v2.7.8
 - 调整：友情链接解析格式，还是加上链接描述比较舒服
 - 调整：文章目录，即使设置了目录也默认不展开目录
 - 调整：社交分享图标，现在赞赏和社交图标在文章末尾两边站
 - 调整：返回顶部按钮，现在小屏幕也可以一键到达顶部
 - 调整：一言，弃用功能重新回归
 - 调整：Pjax，修复了子评论错误显示为上一条评论和博主标志显示的问题
 - 调整：样式，主题色彩、非单栏首页 banner 固定为满屏、单栏首页新样式、首页回归圆角卡片、友情链接和追番卡片圆角、夜间样式、部分字体灰度显示等
 - 插件：集成 PandaBangumi 和 ExSearch 功能

## 更新动态

### 2020-07-01

* 修复：时间轴显示未发布文章 [commit fb8b7e6](https://github.com/AlanDecode/Typecho-Theme-VOID/commit/fb8b7e6af1cb40e627cb77d0a2c2b936c37372d3)

历史更新动态 [change-log.md](https://github.com/monsterxcn/Typecho-Theme-VOID/blob/master/change-log.md)

## 使用指北

<details><summary>下载安装后样式不对？</summary><br>

仓库中的是未压缩的源代码，包含大量实际使用中不需要的文件，并且可能无法直接使用。请一定通过这两个链接下载主题：[发布版](https://github.com/monsterxcn/Typecho-Theme-VOID/releases) | [开发版](https://github.com/monsterxcn/Typecho-Theme-VOID/archive/nightly.zip)。注意其中发布版是下载 VOID-x.x.x.zip 这个压缩包，而不是 Source code，发布版压缩包中包含了当前最新的主题文件和插件文件。

如果不是上面的问题，请检查你的 CDN 地址配置结尾是否含 `/` 如果含有请删去。

如果不介意 Bug 可以直接从命令行安装主题：

```bash
cd /path/to/wwwroot/usr/themes
git clone https://github.com/monsterxcn/Typecho-Theme-VOID.git -b nightly ./VOID
# 如使用国内服务器拉取代码太慢可使用码云仓库极速克隆
# git clone https://gitee.com/monsterxcn/Typecho-Theme-VOID.git -b nightly ./VOID
chmod -R 777 VOID/*

# 后续小版本更新主题可以直接运行：
cd /path/to/wwwroot/usr/themes/VOID
# 拉取失败可尝试撤销所有本地修改
# git reset --hard HEAD
git pull origin nightly
```

</details>

<details><summary>为什么页面空白？</summary><br>

* 首先检查是否有插件重复引入了 JQuery，若有，在插件设置页面关闭。
* 另外，推荐使用 PHP 7.0 及以上版本搭配 MySQL 数据库。PHP 5.6 或者更低版本以及其它数据库可能出现未知问题（并且我不会去修复）。

</details>

<details><summary>为什么表情包 404？</summary><br>

上一个版本的 OwO 表情全部存储于 GitHub 仓库使用 JsDelivr 加速，但是由于仓库同时存储其他文件体积过大 JsDelivr CDN 失效，所以此版本以后的 OwO 依旧存储于主题文件夹 assets/libs/owo/biaoqing 文件夹下。请检查以下文件中表情路径是否正确：

 - assets\libs\owo\owo.json `表情包名.container.icon`
 - libs\Contents.php `L227` `L237` `L247` `L257`

使用本地文件时，应该使用以下示例

```
# assets\libs\owo\owo.json
{
    "泡泡": {
        "type": "image",
        "container": [
            {
                "icon": "<img class=\"biaoqing\" data-src=\"/usr/themes/VOID/assets/libs/owo/biaoqing/paopao/E591B5E591B5_2x.png\">",
                "data": "::(呵呵)",
                "text": "呵呵"
            }
        ]
    }
}

# libs\Contents.php
    /**
     * 阿鲁表情回调函数
     * 
     * @return string
     */
    private static function parseAruBiaoqingCallback($match)
    {
        return '<img class="biaoqing" src="/usr/themes/VOID/assets/libs/owo/biaoqing/aru/'. str_replace('%', '', urlencode($match[1])) . '_2x.png">';
    }
```

默认的静态资源 CDN 设置对 OwO 表情无法生效，需要 **自行修改** 这两个文件进行。如果你不明白怎么修改请忽略。另外主题 biaoqing 文件夹中还包含很多主题未启用的表情包，喜欢折腾可以自行搭配自己喜欢的表情包组。

</details>

<details><summary>如何开启文章点赞？</summary><br>

点赞功能依赖配套插件，请上传插件并启用。前往 https://github.com/monsterxcn/Typecho-Plugin-VOID 获取插件。

</details>

<details><summary>如何开启文章浏览量统计？</summary><br>

浏览量统计功能依赖配套插件，请上传插件并启用。前往 https://github.com/monsterxcn/Typecho-Plugin-VOID 获取插件。

</details>

<details><summary>如何开启文章字数统计？</summary><br>

字数统计功能依赖配套插件，请上传插件并启用。前往 https://github.com/monsterxcn/Typecho-Plugin-VOID 获取插件。

</details>

<details><summary>如何开启即时搜索？</summary><br>

即时搜索功能依赖配套插件，请上传插件并启用。注意第一次保存插件设置后按照提示重建索引。前往 https://github.com/monsterxcn/Typecho-Plugin-VOID 获取插件。

</details>

<details><summary>如何开启追番展示？</summary><br>

追番展示功能依赖配套插件，请上传插件并启用。注意按照插件提示填写 [Bangumi](https://bgm.tv) 用户 ID 并选择解析方式。前往 https://github.com/monsterxcn/Typecho-Plugin-VOID 获取插件。

</details>

<details><summary>如何开启 Artalk 评论？</summary><br>

Artalk 是一款简洁有趣的可拓展自托管评论系统，需要配合 Artalk 的后端程序（如 [Artalk-API-PHP](https://github.com/qwqcode/Artalk-API-PHP) ）使用，请在开启评论前搭建好自己的后端程序。

新建文章或页面，在自定义字段中填入 `artalk` 和你的 Artalk 后端 `/public` 文件夹可访问地址即可开启 Artalk 评论，快来尝试这款有趣的评论系统吧。

</details>

<details><summary>友情链接排版</summary><br>

新建独立页面，然后如此书写：

```
[links]
[(熊猫小 A )+(熊猫小 A 的博客)](https://www.imalan.cn)+(https://secure.gravatar.com/avatar/1741a6eef5c824899e347e4afcbaa75d?s=200&r=G&d=)
[(名称)+(描述)](链接)+(图标)
[/links]
```

文章中、独立页面中都可以通过该语法插入类似的展示块。在某些 Typecho 版本中 HTML 会被转义后输出，请使用 `!!!` 包裹以上代码，例如：

```
!!!
[links]
···
[/links]
!!!
```

`!!!` 需要单独占一行。

</details>

<details><summary>图集排版</summary><br>

在文章中，使用 `[photos][/photos]` 包起来的图片可显示在同一行。例如：

```
[photos]
![](https://cdn.imalan.cn/img/post/2018-10-26/IMG_0073.jpeg)
![](https://cdn.imalan.cn/img/post/2018-10-26/IMG_0053.jpeg)
[/photos]

[photos]
![](https://cdn.imalan.cn/img/post/2018-10-26/IMG_0039.jpeg)
![](https://cdn.imalan.cn/img/post/2018-10-26/IMG_0051.jpeg)
![](https://cdn.imalan.cn/img/post/2018-10-26/IMG_0005.jpeg)
[/photos]
```

在某些 Typecho 版本中 HTML 会被转义后输出，请使用 `!!!` 包裹以上代码，例如：

```
!!!
[photos]
···
[/photos]
!!!
```

`!!!` 需要单独占一行。

</details>

<details><summary>Mermaid 图表排版</summary><br>

主题设置中启用 MermaidJS 后在文章中，使用 `[mermaid][/mermaid]` 包起来的代码可显示为相应图表。例如：

```
[mermaid]
graph TD;
    A-->B;
    A-->C;
    B-->D;
    C-->D;
[/mermaid]

[mermaid]
gantt
dateFormat  YYYY-MM-DD
title Adding GANTT diagram to mermaid
excludes weekdays 2014-01-10

section A section
Completed task            :done,    des1, 2014-01-06,2014-01-08
Active task               :active,  des2, 2014-01-09, 3d
Future task               :         des3, after des2, 5d
Future task2               :         des4, after des3, 5d
[/mermaid]
```

在某些 Typecho 版本中 HTML 会被转义后输出，请使用 `!!!` 包裹以上代码，例如：

```
!!!
[mermaid]
···
[/mermaid]
!!!
```

`!!!` 需要单独占一行。

MermaidJS 按照页面从上向下的顺序依次渲染图表，请务必保证前面的 Mermaid 图表语法格式正确，否则后面的图表无法显示。此外，使用实验性 Mermaid 图表（比如 Git 图）可能导致渲染异常，这不是主题的问题，请检查你的图表语法和 MermaidJS 版本是否兼容。本主题使用的 MermaidJS 为 8.5.0 版本，包含了 Class diagram，Git graph，Entity Relationship Diagram 等图表的实验性兼容。更多关于 MermaidJS 的问题请先参考 [官方文档](https://mermaid-js.github.io/mermaid/#/README) 检查，然后欢迎提出 issue 帮助主题更好的兼容 MermaidJS。

</details>

<details><summary>其他增强的 Markdown 语法</summary><br>

* 注音语法：`{{文本:zhu yin}}`，会渲染为：<ruby>文本<rp> (</rp><rt>zhu yin</rt><rp>)</rp></ruby>

  **注音语法的增强 Markdown 写法已经移除，但 HTML 写法依旧可用**

* notice 提示块：`[notice]提示内容[/notice]`

</details>

## 开发指北

<details><summary><b>You are on your own.</b></summary><br>

> This Is A Fork From [AlanDecode/Typecho-Theme-VOID](https://github.com/AlanDecode/Typecho-Theme-VOID) But Show My Contributions.

指引：安装 NodeJS 环境 > clone repo > 安装依赖 > 打包依赖的 JavaScript & CSS > 你构建的主题。以下是我的一些未必有用的提示：

 - 关于安装 node-sass 出错请参考《 [安装 node-sass 的正确姿势 - Issue #28 - lmk123/blog](https://github.com/lmk123/blog/issues/28) 》
 - 如果需要你可以尝试将 nodejs 升级至 latest 版本
 - 如果需要你可以尝试在主题仓库根目录下执行 `rm -rf node-modules package-lock.json` 后再安装依赖
 - 如果你对自己的更改很满意或者有很妙的修改想法，**欢迎提出 Pull Request 或 Issues**

```bash
git clone https://github.com/monsterxcn/Typecho-Theme-VOID ./VOID && cd ./VOID

# 安装依赖
npm install -g gulp
npm install

# 打包依赖的 JS 和 CSS
gulp dev

# 构建主题，生成的主题位于 ./build 目录下
gulp build

# 主题的样式是用 SCSS 写的
# 使用喜欢的方式编译 SCSS，或者使用这个
gulp sass

# 监听 SCSS 更改然后实时编译。
# 尽请添加自己想要的功能，满意后就提交代码。然后：
gulp build
```

</details>

## 鸣谢

[jquery](https://github.com/jquery/jquery) | [prism](https://github.com/PrismJS/prism/) | [MathJax-src](https://github.com/mathjax/MathJax-src) | [fancybox](https://github.com/fancyapps/fancybox) | [bigfoot](http://github.com/pxldot/bigfoot) | [OwO](https://github.com/DIYgod/OwO) | [jquery-pjax](https://github.com/defunkt/jquery-pjax) | [yue.css](https://github.com/lepture/yue.css) | [tocbot](https://github.com/tscanlin/tocbot) | [pangu.js](https://github.com/vinta/pangu.js) | [social](https://github.com/lepture/social) | [headroom.js](https://github.com/WickyNilliams/headroom.js) | [hypher](https://github.com/bramstein/hypher) | [Artalk](https://github.com/qwqcode/Artalk) | [mermaid](https://github.com/mermaid-js/mermaid)

[RAW](https://github.com/AlanDecode/Typecho-Theme-RAW) | [Mirages](https://get233.com/archives/mirages-intro.html) | [Handsome](https://www.ihewro.com/archives/489/) | [Card](https://blog.shuiba.co/bitcron-theme-card) | [Casper](https://github.com/TryGhost/Casper) | [Typlog](https://typlog.com/)

## 捐助

**如果本项目对你有所帮助，请考虑捐助 [AlanDecode](https://https://github.com/AlanDecode/Typecho-Theme-VOID)**

## License

MIT © [AlanDecode](https://github.com/AlanDecode)

GLWT © [monsterxcn](https://github.com/monsterxcn)
