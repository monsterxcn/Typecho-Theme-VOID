<?php
/**
 * head.php
 * 
 * <head>
 * 
 * @author      熊猫小A
 * @version     2020-04-10 0.1
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$setting = $GLOBALS['VOIDSetting']; 
$assetsUrl = (isset($setting['assetsCDN'])) ? $setting['assetsCDN'] : $this->options->themeUrl.'/assets';

if (isset($_POST['void_action'])) {
    if ($_POST['void_action'] == 'getLoginAction') {
        echo $this->options->loginAction;
        exit;
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="HandheldFriendly" content="true">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php 
    $banner = '';
    $description = '';
    if($this->is('post') || $this->is('page')){
        if($this->fields->banner != '')
            $banner=$this->fields->banner;
        if($this->fields->excerpt != '')
            $description = $this->fields->excerpt;
    }else{
        $description = Helper::options()->description;
    }
    ?>
    <title><?php Contents::title($this); ?></title>
    <meta name="author" content="<?php $this->author(); ?>" />
    <meta name="description" content="<?php if($description != '') echo $description; else $this->excerpt(50); ?>" />
    <meta itemprop="name" content="<?php Contents::title($this); ?>">
    <meta itemprop="description" content="<?php if($description != '') echo $description; else $this->excerpt(50); ?>">
    <meta itemprop="image" content="<?php if($banner != '') echo $banner; else echo $setting['defaultBanner']; ?>">
    <meta property="og:title" content="<?php Contents::title($this); ?>" />
    <meta property="og:description" content="<?php if($description != '') echo $description; else $this->excerpt(50); ?>" />
    <meta property="og:site_name" content="<?php Contents::title($this); ?>" />
    <meta property="og:type" content="<?php if($this->is('post') || $this->is('page')) echo 'article'; else echo 'website'; ?>" />
    <meta property="og:url" content="<?php $this->permalink(); ?>" />
    <meta property="og:image" content="<?php if($banner != '') echo $banner; else echo $setting['defaultBanner']; ?>" />
    <meta property="article:published_time" content="<?php echo date('c', $this->created); ?>" />
    <meta property="article:modified_time" content="<?php echo date('c', $this->modified); ?>" />
    <meta name="twitter:title" content="<?php Contents::title($this); ?>" />
    <meta name="twitter:description" content="<?php if($description != '') echo $description; else $this->excerpt(50); ?>" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:image" content="<?php if($banner != '') echo $banner; else echo $setting['defaultBanner']; ?>" />

    <?php if($setting['webManifest'] == 'true'): ?>
    <link rel='manifest' href='/manifest.json'>
    <?php endif; ?>

    <?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=&commentReply=&description=&'); ?>

    <link rel="stylesheet" href="<?php echo $assetsUrl.'/bundle-2457c24936.css'; ?>">
    <link rel="stylesheet" href="<?php echo $assetsUrl.'/VOID-9082fcd1a4.css'; ?>">

    <?php if($setting['VOIDPlugin'] == 'true' && Helper::options()->plugin('VOID')->exswitch == 'true'): ?>
    <link rel="stylesheet" href="<?php Helper::options()->pluginUrl('/VOID/pages/exsearch.css'); ?>">
    <?php endif; ?>
    <?php if($this->template == 'pageBangm.php' && $setting['VOIDPlugin'] == 'true' && Helper::options()->plugin('VOID')->bgmswitch == 'true'): ?>
    <link rel="stylesheet" href="<?php Helper::options()->pluginUrl('/VOID/pages/pandabgm.css'); ?>">
    <?php endif; ?>

    <script src="<?php echo $assetsUrl.'/bundle-header-c49a4a0e11.js'; ?>"></script>

    <?php if($this->fields->artalk != ''): ?>
    <script type="text/javascript" src="<?php echo $assetsUrl.'/artalk.js'; ?>"></script>
    <?php endif; ?>

    <script>
    VOIDConfig = {
        PJAX : <?php echo $setting['pjax'] ? 'true' : 'false'; ?>,
        searchBase : "<?php Utils::index("/search/"); ?>",
        owoBase : "<?php echo $assetsUrl.'/libs/owo/owo.json'; ?>",
        home: "<?php Utils::index("/"); ?>",
        buildTime : "<?php Utils::getBuildTime(); ?>",
        enableMath : <?php echo $setting['enableMath'] ? 'true' : 'false'; ?>,
        enableMermaid : <?php echo $setting['enableMermaid'] ? 'true' : 'false'; ?>,
        enableHitokoto : <?php echo $setting['enableHitokoto'] ? 'true' : 'false'; ?>,
        webManifest : <?php echo $setting['webManifest'] ? 'true' : 'false'; ?>,
        hitokotoApi : "<?php if($setting['hitokotoApi'] != '') echo $setting['hitokotoApi']; else Utils::indexTheme('/libs/Hitokoto.php'); ?>",
        GhinfoApi : "<?php if($setting['GhinfoApi'] != '') echo $setting['GhinfoApi']; else echo "https://api.github.com/users/"; ?>",
        QinfoApi : "<?php if($setting['QinfoApi'] != '') echo $setting['QinfoApi']; else Utils::indexTheme('/libs/Qinfo.php?qNum='); ?>",
        artKey : "<?php $this->permalink(); ?>",
        artServer : "<?php $this->fields->artalk(); ?>",
        lazyload : <?php echo $setting['lazyload'] ? 'true' : 'false'; ?>,
        colorScheme:  <?php echo $setting['colorScheme']; ?>,
        headerMode: <?php echo $setting['headerMode']; ?>,
        followSystemColorScheme: <?php echo $setting['followSystemColorScheme'] ? 'true' : 'false'; ?>,
        VOIDPlugin: <?php echo $setting['VOIDPlugin'] ? 'true' : 'false'; ?>,
        votePath: "<?php Utils::index('/action/void?'); ?>",
        lightBg: "",
        darkBg: "",
        lineNumbers: <?php echo $setting['lineNumbers'] ? 'true' : 'false'; ?>,
        darkModeTime: {
            'start': <?php echo $setting['darkModeTime']['start']; ?>,
            'end': <?php echo $setting['darkModeTime']['end']; ?>
        },
        horizontalBg: <?php echo empty($setting['siteBg']) ? 'false' : 'true'; ?>,
        verticalBg: <?php echo empty($setting['siteBgVertical']) ? 'false' : 'true'; ?>,
        indexStyle: <?php echo $setting['indexStyle']; ?>,
        version: <?php echo $GLOBALS['VOIDVersion'] ?>,
        isDev: true
    }

    <?php if($setting['VOIDPlugin'] == 'true' && Helper::options()->plugin('VOID')->exswitch == 'true'): ?>
    ExSearchConfig = {
        root : "",
        api : "<?php Utils::getExsApi(); ?>"
    }
    <?php endif; ?>

    <?php if($this->template == 'pageBangm.php' && $setting['VOIDPlugin'] == 'true' && Helper::options()->plugin('VOID')->bgmswitch == 'true'): ?>
    var bgmBase = '<?php Utils::index("/PandaBangumi"); ?>';
    <?php endif; ?>
    </script>
    <script src="<?php echo $assetsUrl.'/header-51d24c3baa.js'; ?>"></script>
    
    <style>
        <?php if(!empty($setting['desktopBannerHeight'])): ?>
        @media screen and (min-width: 768px){
            main>.lazy-wrap{min-height: <?php echo $setting['desktopBannerHeight']; ?>vh;}
        }
        <?php endif; ?>
        <?php if(!empty($setting['mobileBannerHeight'])): ?>
        @media screen and (max-width: 768px){
            main>.lazy-wrap{min-height: <?php echo $setting['mobileBannerHeight']; ?>vh;}
        }
        <?php endif; ?>

        <?php if (array_key_exists('src', $setting['brandFont']) && !empty($setting['brandFont']['src'])): ?>
        @font-face {
            font-family: "BrandFont";
            src: url("<?php echo $setting['brandFont']['src']; ?>");
        }
        .brand {
            font-family: BrandFont, sans-serif;
            font-style: <?php echo $setting['brandFont']['style']; ?>!important;
            font-weight: <?php echo $setting['brandFont']['weight']; ?>!important;
        }
        <?php endif; ?>

        <?php if($setting['useFiraCodeFont']): ?>
        .yue code, .yue tt {font-family: "Fira Code", Menlo, Monaco, Consolas, "Courier New", monospace}
        <?php endif; ?>
    </style>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet">
    <?php if(Utils::isSerif($setting)): ?>
    <link id="stylesheet_noto" href="https://fonts.googleapis.com/css?family=Noto+Serif+SC:300,400,700&display=swap&subset=chinese-simplified" rel="stylesheet">
    <?php endif; ?>
    <?php if($setting['useFiraCodeFont']): ?>
    <link href="https://fonts.googleapis.com/css?family=Fira+Code&display=swap" rel="stylesheet">
    <?php endif; ?>

    <?php echo $setting['head']; ?>

    </head>