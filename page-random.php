<?php
/**
 * 随机文章
 *
 * @package custom
 */
if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
}

$randomPost = [
  "title" => getOptions()->siteUrl,
  "url" => getOptions()->title,
];
$this->widget("Widget_Post_Random", [])->to($random);
if ($random->have()) {
  while ($random->next()) {
    $randomPost = [
      "title" => $random->title,
      "url" => $random->permalink,
    ];
    break;
  }
}
?>
<html lang="zh">
<meta charset="UTF-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="refresh" content="2;url=<?php echo $randomPost["url"]; ?>"> 
    <title><?php $this->title(); ?></title>
    <script src="<?php $this->options->themeUrl("/assets/dist/jasmine.iife.js?v=" . getThemeVersion()); ?>"></script>
<style>
body{background-color:#f5f5f4;color:#000}.dark body{background-color:#0a0c19;color:rgb(229,229,229 )}.loader{height:20px;width:250px;position:absolute;top:0;bottom:0;left:0;right:0;margin:auto}.loader--dot{animation-name:loader;animation-timing-function:ease-in-out;animation-duration:3s;animation-iteration-count:infinite;height:20px;width:20px;border-radius:100%;background-color:black;position:absolute;border:2px solid white}.loader--dot:first-child{background-color:#8cc759;animation-delay:0.5s}.loader--dot:nth-child(2){background-color:#8c6daf;animation-delay:0.4s}.loader--dot:nth-child(3){background-color:#ef5d74;animation-delay:0.3s}.loader--dot:nth-child(4){background-color:#f9a74b;animation-delay:0.2s}.loader--dot:nth-child(5){background-color:#60beeb;animation-delay:0.1s}.loader--dot:nth-child(6){background-color:#fbef5a;animation-delay:0s}.loader--text{position:absolute;top:200%;left:0;right:0;margin:auto;text-align:center}.loader--text:after{content:"正在跳转，请稍后.";font-weight:bold;animation-name:loading-text;animation-duration:3s;animation-iteration-count:infinite}@keyframes loader{15%{transform:translateX(0)}45%{transform:translateX(230px)}65%{transform:translateX(230px)}95%{transform:translateX(0)}}@keyframes loading-text{0%{content:"正在跳转，请稍后."}25%{content:"正在跳转，请稍后.."}50%{content:"正在跳转，请稍后..."}75%{content:"正在跳转，请稍后...."}}
</style>
<body>
<div class='container'>
  <div class='loader'>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--dot'></div>
    <div class='loader--text'></div>
  </div>
</div>


</body>

</html>

