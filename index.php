<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/svg+xml" href="./assets/dist/vite.svg" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>南巷清风</title>
  <link type="text/css" rel="stylesheet" href="./assets/dist/style.css" />
  <script src="https://npm.elemecdn.com/iconify-icon@1.0.7/dist/iconify-icon.min.js"></script>
  <script src="./assets/dist/main.iife.js"></script>
</head>

<body class="bg-stone-100">
  <div class="mx-auto md:max-w-[1200px]">
    <div class="my-16 flex flex-row rounded bg-white">
      <div class="basis-1/12">
        <div class="min-h-screen-lesio sticky top-16 flex flex-col flex-wrap gap-y-8" id="sidebar-left">
          <div></div>
          <div class="flex justify-center">
            <a href="/">
              <img src="https://thirdqq.qlogo.cn/g?b=qq&nk=2964556627&s=100" alt="" width="50" height="50"
                class="rounded" />
            </a>
          </div>
          <div class="flex grow flex-col justify-between">
            <ul class="flex flex-col flex-wrap content-center gap-y-3">
              <li>
                <a href="">
                  <iconify-icon icon="tabler:home"
                    class="rounded px-3 py-2 text-2xl hover:bg-black hover:text-white hover:shadow-lg"></iconify-icon>
                </a>
              </li>
              <li>
                <a href="">
                  <iconify-icon icon="tabler:user-circle"
                    class="rounded px-3 py-2 text-2xl hover:bg-black hover:text-white hover:shadow-lg"></iconify-icon>
                </a>
              </li>
              <li>
                <a href="">
                  <iconify-icon icon="tabler:archive"
                    class="rounded px-3 py-2 text-2xl hover:bg-black hover:text-white hover:shadow-lg"></iconify-icon>
                </a>
              </li>
              <li>
                <a href="">
                  <iconify-icon icon="tabler:link"
                    class="rounded px-3 py-2 text-2xl hover:bg-black hover:text-white hover:shadow-lg"></iconify-icon>
                </a>
              </li>
              <li>
                <a href="">
                  <iconify-icon icon="tabler:arrows-random"
                    class="rounded px-3 py-2 text-2xl hover:bg-black hover:text-white hover:shadow-lg"></iconify-icon>
                </a>
              </li>
              <li></li>
            </ul>
            <ul class="flex flex-col flex-wrap content-center gap-y-2">
              <li>
                <a href="">
                  <iconify-icon icon="tabler:sun-moon"
                    class="rounded px-2 py-1 text-2xl hover:bg-black hover:text-white"></iconify-icon>
                </a>
              </li>
              <li>
                <a href="">
                  <iconify-icon icon="tabler:arrow-bar-to-up"
                    class="rounded px-2 py-1 text-2xl hover:bg-black hover:text-white"></iconify-icon>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="flex basis-8/12 flex-col border-x-2 border-stone-100 px-5">
        <div id="header-menu" class="flex h-24 justify-between sticky top-0 px-5 mx-[-1.25rem] mt-5"
          style="background-color: rgb(255 255 255 / 90%);">
          <ul class="nav flex items-center gap-x-3">
            <li>
              <a href="/" class="active rounded-full px-4 py-1">首页</a>
            </li>
            <li>
              <a href="/" class="rounded-full px-4 py-1 hover:bg-black hover:text-white hover:shadow-lg">技术</a>
            </li>
            <li>
              <a href="/" class="rounded-full px-4 py-1 hover:bg-black hover:text-white">生活</a>
            </li>
            <li>
              <a href="/" class="rounded-full px-4 py-1 hover:bg-black hover:text-white">其它</a>
            </li>
          </ul>
          <ul class="nav flex items-center gap-x-3">
            <li>
              <button>
                <iconify-icon icon="tabler:search"
                  class="rounded px-3 py-2 text-lg hover:bg-black hover:text-white hover:shadow-lg"></iconify-icon>
              </button>
            </li>
          </ul>
        </div>
        <div class="flex flex-wrap gap-y-12 border-y-2 border-stone-100">
          <div class="w-1/2"></div>
          <div class="w-1/2"></div>
          <div class="flex w-1/2 flex-row">
            <a href="/" class="w-[130px]">
              <img src="https://www.liaocp.cn/usr/themes/jasmine/docs/theme.png" alt="" width="130" height="90"
                class="h-[90px] w-[130px] rounded object-fill hover:shadow-lg" />
            </a>
            <div class="mx-3 flex flex-1 flex-col justify-between">
              <h2 class="line-clamp-1 text-lg">
                <a href="/">坚持，让好事发生坚持，让好事发生</a>
              </h2>
              <p class="line-clamp-2 text-neutral-500">
                <a href="/">继承了 NICETHEME 极简主义、少即是多的设计基因aaaaaa</a>
              </p>
            </div>
          </div>
          <div class="flex w-1/2 flex-row">
            <a href="/" class="w-[130px]">
              <img src="https://www.liaocp.cn/usr/themes/jasmine/docs/theme.png" alt="" width="130" height="90"
                class="h-[90px] w-[130px] rounded object-fill" />
            </a>
            <div class="mx-3 flex flex-1 flex-col justify-between">
              <h2 class="text-lg">
                <a href="/">坚持，让好事发生</a>
              </h2>
              <p class="line-clamp-2 text-neutral-500">
                <a href="/">有人说：“世间很多美好的事物，并非是触手可及的。经过了时间有人说：“世间很多美好的事物，并非是触手可及的。经过了时间</a>
              </p>
            </div>
          </div>
          <div class="flex w-1/2 flex-row">
            <a href="/" class="w-[130px]">
              <img src="https://www.liaocp.cn/usr/themes/jasmine/docs/theme.png" alt="" width="130" height="90"
                class="h-[90px] w-[130px] rounded object-fill" />
            </a>
            <div class="mx-3 flex flex-1 flex-col justify-between">
              <h2 class="text-lg">
                <a href="/">坚持，让好事发生</a>
              </h2>
              <p class="line-clamp-2 text-neutral-500">
                <a href="/">有人说：“世间很多美好的事物，并非是触手可及的。经过了时间有人说：“世间很多美好的事物，并非是触手可及的。经过了时间</a>
              </p>
            </div>
          </div>
          <div class="flex w-1/2 flex-row">
            <a href="/" class="w-[130px]">
              <img src="https://www.liaocp.cn/usr/themes/jasmine/docs/theme.png" alt="" width="130" height="90"
                class="h-[90px] w-[130px] rounded object-fill" />
            </a>
            <div class="mx-3 flex flex-1 flex-col justify-between">
              <h2 class="text-lg">
                <a href="/">坚持，让好事发生</a>
              </h2>
              <p class="line-clamp-2 text-neutral-500">
                <a href="/">有人说：“世间很多美好的事物，并非是触手可及的。经过了时间有人说：“世间很多美好的事物，并非是触手可及的。经过了时间</a>
              </p>
            </div>
          </div>
          <div class="w-1/2"></div>
          <div class="w-1/2"></div>
        </div>
        <div class="mx-1 flex flex-col gap-y-12 pb-12 border-b-2 border-stone-100">
          <div></div>
          <div class="flex flex-row">
            <div class="mr-3 flex flex-1 flex-col justify-between gap-y-3">
              <h2 class="line-clamp-1 text-xl">
                <a href="/">坚持，让好事发生坚持，让好事发生</a>
              </h2>
              <p class="line-clamp-2 text-gray-700 text-neutral-500">
                <a href="/">🌼 Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。🌼
                  Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。</a>
              </p>
              <div>
                <a href="/">技术</a>
                <span class="text-neutral-500"> · 03-07</span>
              </div>
            </div>
            <a href="/" class="w-[170px]">
              <img src="https://www.liaocp.cn/usr/themes/jasmine/docs/theme.png" alt="" width="130" height="90"
                class="h-[130px] w-[170px] rounded object-fill" />
            </a>
          </div>
          <div class="flex flex-row">
            <div class="mr-3 flex flex-1 flex-col justify-between gap-y-3">
              <h2 class="line-clamp-1 text-xl">
                <a href="/">坚持，让好事发生坚持，让好事发生</a>
              </h2>
              <p class="line-clamp-2 text-gray-700 text-neutral-500">
                <a href="/">🌼 Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。🌼
                  Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。</a>
              </p>
              <div>
                <a href="/">技术</a>
                <span class="text-neutral-500"> · 03-07</span>
              </div>
            </div>
          </div>
          <div class="flex flex-row">
            <div class="mr-3 flex flex-1 flex-col justify-between gap-y-3">
              <h2 class="line-clamp-1 text-xl">
                <a href="/">坚持，让好事发生坚持，让好事发生</a>
              </h2>
              <p class="line-clamp-2 text-gray-700 text-neutral-500">
                <a href="/">🌼 Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。🌼
                  Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。</a>
              </p>
              <div>
                <a href="/">技术</a>
                <span class="text-neutral-500"> · 03-07</span>
              </div>
            </div>
            <a href="/" class="w-[170px]">
              <img src="https://www.liaocp.cn/usr/themes/jasmine/docs/theme.png" alt="" width="130" height="90"
                class="h-[130px] w-[170px] rounded object-fill" />
            </a>
          </div>
          <div class="flex flex-row">
            <div class="mr-3 flex flex-1 flex-col justify-between gap-y-3">
              <h2 class="line-clamp-1 text-xl">
                <a href="/">坚持，让好事发生坚持，让好事发生</a>
              </h2>
              <p class="line-clamp-2 text-gray-700 text-neutral-500">
                <a href="/">🌼 Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。🌼
                  Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。</a>
              </p>
              <div>
                <a href="/">技术</a>
                <span class="text-neutral-500"> · 03-07</span>
              </div>
            </div>
          </div>
          <div class="flex flex-row">
            <div class="mr-3 flex flex-1 flex-col justify-between gap-y-3">
              <h2 class="line-clamp-1 text-xl">
                <a href="/">坚持，让好事发生坚持，让好事发生</a>
              </h2>
              <p class="line-clamp-2 text-gray-700 text-neutral-500">
                <a href="/">🌼 Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。🌼
                  Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。</a>
              </p>
              <div>
                <a href="/">技术</a>
                <span class="text-neutral-500"> · 03-07</span>
              </div>
            </div>
            <a href="/" class="w-[170px]">
              <img src="https://www.liaocp.cn/usr/themes/jasmine/docs/theme.png" alt="" width="130" height="90"
                class="h-[130px] w-[170px] rounded object-fill" />
            </a>
          </div>
          <div class="flex flex-row">
            <div class="mr-3 flex flex-1 flex-col justify-between gap-y-3">
              <h2 class="line-clamp-1 text-xl">
                <a href="/">坚持，让好事发生坚持，让好事发生</a>
              </h2>
              <p class="line-clamp-2 text-gray-700 text-neutral-500">
                <a href="/">🌼 Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。🌼
                  Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。</a>
              </p>
              <div>
                <a href="/">技术</a>
                <span class="text-neutral-500"> · 03-07</span>
              </div>
            </div>
          </div>
          <div class="flex flex-row">
            <div class="mr-3 flex flex-1 flex-col justify-between gap-y-3">
              <h2 class="line-clamp-1 text-xl">
                <a href="/">坚持，让好事发生坚持，让好事发生</a>
              </h2>
              <p class="line-clamp-2 text-gray-700 text-neutral-500">
                <a href="/">🌼 Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。🌼
                  Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。</a>
              </p>
              <div>
                <a href="/">技术</a>
                <span class="text-neutral-500"> · 03-07</span>
              </div>
            </div>
          </div>
          <div class="flex flex-row">
            <div class="mr-3 flex flex-1 flex-col justify-between gap-y-3">
              <h2 class="line-clamp-1 text-xl">
                <a href="/">坚持，让好事发生坚持，让好事发生</a>
              </h2>
              <p class="line-clamp-2 text-gray-700 text-neutral-500">
                <a href="/">🌼 Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。🌼
                  Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。</a>
              </p>
              <div>
                <a href="/">技术</a>
                <span class="text-neutral-500"> · 03-07</span>
              </div>
            </div>
          </div>
          <div class="flex flex-row">
            <div class="mr-3 flex flex-1 flex-col justify-between gap-y-3">
              <h2 class="line-clamp-1 text-xl">
                <a href="/">坚持，让好事发生坚持，让好事发生</a>
              </h2>
              <p class="line-clamp-2 text-gray-700 text-neutral-500">
                <a href="/">🌼 Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。🌼
                  Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。</a>
              </p>
              <div>
                <a href="/">技术</a>
                <span class="text-neutral-500"> · 03-07</span>
              </div>
            </div>
          </div>
          <div class="flex flex-row">
            <div class="mr-3 flex flex-1 flex-col justify-between gap-y-3">
              <h2 class="line-clamp-1 text-xl">
                <a href="/">坚持，让好事发生坚持，让好事发生</a>
              </h2>
              <p class="line-clamp-2 text-gray-700 text-neutral-500">
                <a href="/">🌼 Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。🌼
                  Jasmine，一款 Typecho
                  主题。专为博客类网站开发，响应式设计，在移动端也有不错体验。主要使用白、灰、黑三种配色，整体简洁、精致、美观。</a>
              </p>
              <div>
                <a href="/">技术</a>
                <span class="text-neutral-500"> · 03-07</span>
              </div>
            </div>
          </div>
        </div>
        <div class="flex">

        </div>
      </div>
      <div class="basis-3/12" id="sidebar-right">
        <div class="sidebar__right__inner flex flex-col px-5 gap-y-8">
          <div></div>
          <div class="flex gap-x-3 border-b-2 border-stone-100 pb-8">
            <img src="https://thirdqq.qlogo.cn/g?b=qq&nk=2964556627&s=100" alt="" width="50" height="50"
              class="rounded">
            <div class="flex flex-col justify-between">
              <p>此间少年</p>
              <p class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">事以密成，语以泄败</p>
            </div>
          </div>
          <div class="flex flex-col justify-start gap-x-3 border-b-2 border-stone-100 gap-y-4 pb-12 mt-4">
            <div class="flex flex-row items-center">
              <iconify-icon icon="tabler:chart-bar" class="rounded pr-1 text-xl font-medium"></iconify-icon>
              <span class="font-medium">热门文章</span>
            </div>
            <ul class="flex flex-col gap-y-3">
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">Jasmine - 简约、美观的博客主题</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">车站最感人的两个地方：出口与入口</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">Typecho 忘记密码找回教程</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">Ubuntu 永久挂载硬盘</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">阳光正好，微风不燥，望天空云卷云舒</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">Jasmine - 简约、美观的博客主题</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">车站最感人的两个地方：出口与入口</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">Typecho 忘记密码找回教程</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">Ubuntu 永久挂载硬盘</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">阳光正好，微风不燥，望天空云卷云舒</a>
              </li>
            </ul>
          </div>
          <div class="flex flex-col justify-start gap-x-3 border-b-2 border-stone-100 gap-y-4 pb-12 mt-4">
            <div class="flex flex-row items-center">
              <iconify-icon icon="tabler:message" class="rounded pr-1 text-xl font-medium"></iconify-icon>
              <span class="font-medium">最新评论</span>
            </div>
            <ul class="flex flex-col gap-y-3">
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">Jasmine - 简约、美观的博客主题</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">车站最感人的两个地方：出口与入口</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">Typecho 忘记密码找回教程</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">Ubuntu 永久挂载硬盘</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">阳光正好，微风不燥，望天空云卷云舒</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">Jasmine - 简约、美观的博客主题</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">车站最感人的两个地方：出口与入口</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">Typecho 忘记密码找回教程</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">Ubuntu 永久挂载硬盘</a>
              </li>
              <li>
                <a href="/" class="line-clamp-2 text-gray-700 text-neutral-500 text-sm">阳光正好，微风不燥，望天空云卷云舒</a>
              </li>
            </ul>
          </div>
          <div class="flex flex-col justify-start gap-x-3 border-b-2 border-stone-100 gap-y-4 pb-12 mt-4">
            <div class="flex flex-row items-center">
              <iconify-icon icon="tabler:bookmarks" class="rounded pr-1 text-xl font-medium"></iconify-icon>
              <span class="font-medium">热门标签</span>
            </div>
            <ul class="flex flex-wrap gap-y-2">
              <li>
                <a href="/"
                  class="text-gray-700 text-neutral-500 text-sm rounded-full px-3 py-1 hover:bg-black hover:text-white">Jasmine</a>
              </li>
              <li>
                <a href="/"
                  class="text-gray-700 text-neutral-500 text-sm rounded-full px-3 py-1 hover:bg-black hover:text-white">微服务</a>
              </li>
              <li>
                <a href="/"
                  class="text-gray-700 text-neutral-500 text-sm rounded-full px-3 py-1 hover:bg-black hover:text-white">编程</a>
              </li>
              <li>
                <a href="/"
                  class="text-gray-700 text-neutral-500 text-sm rounded-full px-3 py-1 hover:bg-black hover:text-white">Linux系统</a>
              </li>
              <li>
                <a href="/"
                  class="text-gray-700 text-neutral-500 text-sm rounded-full px-3 py-1 hover:bg-black hover:text-white">Jasmine</a>
              </li>
              <li>
                <a href="/"
                  class="text-gray-700 text-neutral-500 text-sm rounded-full px-3 py-1 hover:bg-black hover:text-white">微服务</a>
              </li>
              <li>
                <a href="/"
                  class="text-gray-700 text-neutral-500 text-sm rounded-full px-3 py-1 hover:bg-black hover:text-white">编程</a>
              </li>
              <li>
                <a href="/"
                  class="text-gray-700 text-neutral-500 text-sm rounded-full px-3 py-1 hover:bg-black hover:text-white">Linux</a>
              </li>
            </ul>
          </div>
          <div class="flex flex-col justify-start gap-x-3 gap-y-4 pb-12 mt-4">
            <div class="flex flex-row items-center">
              <iconify-icon icon="tabler:chart-arcs" class="rounded pr-1 text-xl font-medium"></iconify-icon>
              <span class="font-medium">关于站长</span>
            </div>
            <ul class="flex flex-col gap-y-3">
              <li class="flex flex-row items-center gap-x-2">
                <iconify-icon icon="tabler:brand-wechat" class="text-gray-800"></iconify-icon>
                <span class="text-gray-700 text-neutral-500 text-sm ">2954556627</span>
              </li>
              <li class="flex flex-row items-center gap-x-2">
                <iconify-icon icon="tabler:brand-qq" class="text-gray-800"></iconify-icon>
                <span class="text-gray-700 text-neutral-500 text-sm ">2954556627</span>
              </li>
              <li class="flex flex-row items-center gap-x-2">
                <iconify-icon icon="tabler:map-pin" class="text-gray-800"></iconify-icon>
                <span class="text-gray-700 text-neutral-500 text-sm ">广州</span>
              </li>
              <li class="flex flex-row items-center gap-x-2">
                <iconify-icon icon="tabler:mail" class="text-gray-800"></iconify-icon>
                <span class="text-gray-700 text-neutral-500 text-sm ">2954556627@qq.com</span>
              </li>
              <li class="flex flex-row items-center gap-x-2">
                <iconify-icon icon="tabler:brand-github" class="text-gray-800"></iconify-icon>
                <span class="text-gray-700 text-neutral-500 text-sm ">Kent Liao</span>
              </li>
              <li class="flex flex-row items-center gap-x-2">
                <iconify-icon icon="tabler:link" class="text-gray-800"></iconify-icon>
                <span class="text-gray-700 text-neutral-500 text-sm ">http://www.liaocp.cn/</span>
              </li>
              <li class="flex flex-row items-center gap-x-2">
                <iconify-icon icon="tabler:copyright" class="text-gray-800"></iconify-icon>
                <span class="text-gray-700 text-neutral-500 text-sm ">CC BY-NC-ND 3.0</span>
              </li>
              <li class="flex flex-row items-center gap-x-2">
                <iconify-icon icon="tabler:briefcase" class="text-gray-800"></iconify-icon>
                <span class="text-gray-700 text-neutral-500 text-sm ">程序员</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="flex flex-col mb-16 text-gray-700 text-neutral-500">
      <div class="flex flex-col items-center">
        <div class="flex flex-row gap-x-1 items-center">
          <iconify-icon icon="tabler:copyright" class="text-gray-800"></iconify-icon>
          <span>2019 - 2023 南巷清风. All Rights Reserved.</span>
        </div>
        <span>Theme Jasmine by Kent Liao</span>
      </div>
    </div>
  </div>
</body>

</html>