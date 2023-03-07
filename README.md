# Jasmine

🌼 Jasmine，一款 Typecho 主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。

**主题预览**

[南巷清风](https://www.liaocp.cn/)

**主题仓库**

如果觉得主题还不错，请帮忙点个 start 😁。

[Github](https://github.com/liaocp666/Jasmine)  | [Gitee](https://gitee.com/LiaoChunping/Jasmine)

**预览图**

![主题图片](./docs/theme.png)

## 主题亮点

* 响应式设计
* 针对 SEO 优化
* 支持切换夜间模式
* 支持置顶文章显示
* 支持评论 QQ 头像显示
* 支持代码高亮
* 支持随机文章跳转
* 支持文章缩略图设置
* 支持外观设置备份
* 主题更新检测
* ……


## 快速开始

### 环境

* PHP 7+ （建议）
* MySQL（建议）
* Typecho 1.1+（建议）

### 安装

1. 下载主题压缩包 [jasmine.zip](https://github.com/liaocp666/Jasmine/releases)
2. 解压下载文件，并将文件夹重命名为 `jasmine`
3. 上传至 `usr/themes/` 目录下
4. 启用此主题

### 更新

参考[安装](#安装)

## 主题文档

### 站点 LOGO 地址

填入图片地址，如果填入，则显示在左侧边栏上。

### 左边栏菜单

**字段说明**

| 字段名 | 作用 | 备注                                                          |
|----|----|-------------------------------------------------------------|
| name | 名称 | 鼠标悬停，显示的名称                                                  |
| icon | 图标字体 | 使用 [Bootstrap Icons](https://icons.getbootstrap.com/) 图标字体库 |
| url | 链接 | 点击跳转的链接                                                     |
| newTab | 新窗口打开 | true/false                                                  |

**示例**

```json
[
  {
    "name": "首页",
    "icon": "bi bi-house-door-fill",
    "url": "http://localhost/typecho/",
    "newTab": false
  },
  {
    "name": "归档",
    "icon": "bi bi-archive-fill",
    "url": "/",
    "newTab": false
  },
  {
    "name": "标签",
    "icon": "bi bi-tags-fill",
    "url": "/",
    "newTab": false
  },
  {
    "name": "随机",
    "icon": "bi bi-cursor-fill",
    "url": "/",
    "newTab": false
  }
]
```

### 中间头部菜单

填入分类 ID ，使用两个竖杠分隔，例如：3 || 4 || 2。

### 置顶文章

填入文章 ID ，使用两个竖杠分隔，例如：243 || 189 ||  154 || 228。

### 作者介绍

使用简短的话，介绍下自己。填入后。将显示在右侧边栏作者信息区域。

### 建站日期

使用横杠分割年月日，例如：2008-08-08 。

### ICP 备案号

网站备案号。

### 自定义样式

填入 css 代码，不需要添加 &lt;style&gt; 标签。

### 自定义脚本

填入 js 代码，不需要添加 &lt;script&gt; 标签。

### 随机文章

新建独立页面，模板选择`随机文章`。

## 主题贡献

欢迎对主题进行报告错误、修复问题、提高代码质量或提交新功能。

## 赞助支持

您的赞助支持是这个项目维护下去的坚实动力。

| 微信 | 支付宝                       |
|-----------------|---------------------------|
| ![微信](./docs/wxpay.png) | ![支付宝](./docs/alipay.png) |

## 许可协议

* Jasmine 主题使用 [GPL V3.0](https://github.com/liaocp666/theme-jasmine/blob/main/LICENSE) 协议开源。

* 您必需遵守此协议进行二次开发。

* **您可以删除页脚的作者信息。**

* **您必须在页脚保留 Jasmine 主题的名称及其链接。**
