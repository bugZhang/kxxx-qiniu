=== 七牛云存储CDN加速插件 ===
Contributors: JerryZhang
Donate link: http://images.kelenews.com/1503039339786-01.jpeg
Tags: CDN, 七牛, qiniu
Requires at least: 4.6
Tested up to: 4.7
Stable tag: 4.3
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

最简单的七牛CDN扩展

== Description ==

七牛云存储的WordPress扩展，实现简单的链接转换功能，本地链接自动转为CDN链接。
1.编辑保存文字时将会把远程图片（非本网站域名下的图片）抓取保存到本地，并且把文章中的远程图片链接转换为本地链接
2.前台展示内容时会自动把本地图片地址转换为cdn链接地址

== Installation ==

1. 下载此仓库文件，上传到 `/wp-content/plugins/plugin-name` 下
2. 在WordPress后台激活插件
3. 把在七牛云平台申请的加速域名配置到选项

== Screenshots ==

1. 七牛云存储 扩展插件

== Changelog ==

= 1.0 =
* 第一版暂时只实现最简单的链接转换功能，接下来逐步完善

== Arbitrary section ==

待实现功能：
1. 未接入cdn之前的文章中远程图片链接转为cdn链接
2. 编辑文章时可选是否需要拉取远程图片，可配置关键词不抓取
3. ……

 == Upgrade Notice ==

刚开始学习写plugin，自测通过没有问题，不过不能保证完全没有bug，有问题或者新的需求请不吝赐教，email：zjk6700@mail.com
