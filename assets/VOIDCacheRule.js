/* eslint-disable no-unused-vars */
/* eslint-disable indent */
/* eslint-disable linebreak-style */
'use strict';

(function () {
  'use strict';
  /**
  * Service Worker Toolbox caching
  */

  var cacheVersion = '-toolbox-v1';
  var dynamicVendorCacheName = 'dynamic-vendor' + cacheVersion;
  var staticVendorCacheName = 'static-vendor' + cacheVersion;
  var staticAssetsCacheName = 'static-assets' + cacheVersion;
  var contentCacheName = 'content' + cacheVersion;
  var maxEntries = 200;


  self.importScripts('usr/themes/VOID/assets/sw-toolbox.js');

  self.toolbox.options.debug = false;

  // 缓存本站静态文件
  self.toolbox.router.get('/usr/(.*)', self.toolbox.cacheFirst, {
    cache: {
      name: staticAssetsCacheName,
      maxEntries: maxEntries
    }
  });

  // 缓存 Gravatar 头像
  self.toolbox.router.get('/avatar/(.*)', self.toolbox.cacheFirst, {
    origin: /(secure\.gravatar\.com)/,
    cache: {
      name: staticVendorCacheName,
      maxEntries: maxEntries
    }
  });

  // 缓存 OwO 表情
  // 超过了 Chrome 缓存配额闲置，如果仅考虑 FireFox 可以自行开启
  // https://cdn.jsdelivr.net/gh/monsterxcn/Storage/owoEmoji/[quyin|aru|paopao|qq]/
  // 
  // self.toolbox.router.get('/gh/monsterxcn/Storage/owoEmoji/(.*)', self.toolbox.cacheFirst, {
  //   origin: /(cdn\.jsdelivr\.net)/,
  //   cache: {
  //     name: staticVendorCacheName,
  //     maxEntries: maxEntries
  //   }
  // });

  // 缓存 MathJax
  // 如果引用 MathJax 此处需要自行开启
  // https://cdn.jsdelivr.net/gh/monsterxcn/Storage/MathJax/2.7.8/unpacked/
  // self.toolbox.router.get('/gh/monsterxcn/Storage/MathJax/2.7.8/(.*)', self.toolbox.cacheFirst, {
  //   origin: /(cdn\.jsdelivr\.net)/,
  //     cache: {
  //     name: staticVendorCacheName,
  //     maxEntries: maxEntries
  //   }
  // });

  // 缓存 Google 字体
  self.toolbox.router.get('/(.*)', self.toolbox.cacheFirst, {
    origin: /(fonts\.googleapis\.com)/,
    cache: {
      name: staticVendorCacheName,
      maxEntries: maxEntries
    }
  });
  self.toolbox.router.get('/(.*)', self.toolbox.cacheFirst, {
    origin: /(fonts\.gstatic\.com)/,
    cache: {
      name: staticVendorCacheName,
      maxEntries: maxEntries
    }
  });

  // immediately activate this serviceworker
  self.addEventListener('install', function (event) {
    return event.waitUntil(self.skipWaiting());
  });

  self.addEventListener('activate', function (event) {
    return event.waitUntil(self.clients.claim());
  });

})();