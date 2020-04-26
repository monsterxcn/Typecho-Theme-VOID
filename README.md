# Typecho Theme VOID

> ✏ 一款简洁优雅的 Typecho 主题

作为计算机术语时，VOID 的意思是「无类型」。

![](https://img.shields.io/github/workflow/status/monsterxcn/Typecho-Theme-VOID/Build?style=flat-square)  ![](https://img.shields.io/github/downloads/monsterxcn/Typecho-Theme-VOID/total?style=flat-square)  ![](https://img.shields.io/github/v/release/monsterxcn/Typecho-Theme-VOID?style=flat-square)  ![](https://img.shields.io/github/license/monsterxcn/Typecho-Theme-VOID?label=GLWTPL&style=flat-square)

## 特性

> 介绍文章：[VOID：现在可以公开的情报](https://blog.imalan.cn/archives/247/)

> 特色演示：[示例页面](https://blog.imalan.cn/archives/194/)

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

以及其他很多细节，总之用起来还算舒服。

## 更新日志

**2020-04-26**

* 新增：`VOIDCacheRule.js` 自行开启缓存 MathJax
* 修复：Service Worker 缓存 OwO 表情超过 Chrome 空间配额

更多：[change-log.md](https://github.com/monsterxcn/Typecho-Theme-VOID/blob/master/change-log.md)

## 待办清单

- [ ] [MathJax v3](https://github.com/mathjax/MathJax) 支持
- [ ] [MermaidJs](https://github.com/mermaid-js/mermaid) 支持
- [ ] `.theme-dark` 优化
- [ ] CDN 配置优化
- [ ] Links 随机输出
- [ ] Console 统一样式输出版权
- [ ] [Artalk](https://github.com/qwqcode/Artalk) 评论实验性兼容
- [x] Progressive Web Apps
- [x] 网页压缩
- [x] 更丰富的表情
- [x] 静态资源 CDN 设置
- [x] 一言 API
- [x] GitHub&QQ 账号快速评论
- [x] Instantpage v3.0
- [x] 独立页面模板


- [ ] Pjax 下网页压缩 `function` 报错
- [ ] `.macStyleCodeBlock .yue pre::before` 与 `.OwO .OwO-body` `z-index` 层叠布局冲突
- [x] Service Worker 缓存 OwO 表情（需自行开启）
- [x] 在主题中调用插件中产生的 `ExSearchConfig` `$exjson` 地址

## 开发与自定义

**You are on your own.**

> This Is A Fork From [AlanDecode/Typecho-Theme-VOID](https://github.com/AlanDecode/Typecho-Theme-VOID) But Show My Contributions.

> 这个 Fork 仓库是弟弟的练习项目，请到源仓库 PR 。

准备好 NodeJS 环境，然后 clone 这个 repo > 安装依赖 > 打包依赖的 JS&CSS > 你构建的主题。

关于安装 node-sass 出错请参考《 [安装 node-sass 的正确姿势 - Issue #28 - lmk123/blog](https://github.com/lmk123/blog/issues/28) 》

如果你对自己的更改很满意，**欢迎提出 Pull Request**。

```bash
git clone https://github.com/monsterxcn/Typecho-Theme-VOID ./VOID && cd ./VOID

# 使用 cnpm
alias cnpm="npm --registry=https://registry.npm.taobao.org \
--cache=$HOME/.npm/.cache/cnpm \
--disturl=https://npm.taobao.org/mirrors/node \
--userconfig=$HOME/.cnpmrc"

# 安装依赖
cnpm install -g gulp
cnpm install

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


## 鸣谢

[JQuery](https://github.com/jquery/jquery) | [PrismJS](https://prismjs.com/index.html) | [MathJax](https://www.mathjax.org/) | [fancyBox](http://fancyapps.com/fancybox/3/) | [bigfoot.js](http://www.bigfootjs.com/) | [OwO](https://github.com/DIYgod/OwO) | [pjax](https://github.com/defunkt/jquery-pjax) | [yue.css](https://github.com/lepture/yue.css) | [tocbot](https://tscanlin.github.io/tocbot/) | [pangu.js](https://github.com/vinta/pangu.js) | [social](https://github.com/lepture/social) | [Headroom.js](http://wicky.nillia.ms/headroom.js/) | [hypher](https://github.com/bramstein/hypher)

[RAW](https://github.com/AlanDecode/Typecho-Theme-RAW) | [Mirages](https://get233.com/archives/mirages-intro.html) | [handsome](https://www.ihewro.com/archives/489/) | [Card](https://blog.shuiba.co/bitcron-theme-card) | [Casper](https://github.com/TryGhost/Casper) | [Typlog](https://typlog.com/)

## 捐助

**如果本项目对你有所帮助，请考虑捐助 [AlanDecode](https://https://github.com/AlanDecode/Typecho-Theme-VOID)**

## License

MIT © [AlanDecode](https://github.com/AlanDecode)

GLWT © [monsterxcn](https://github.com/monsterxcn)
