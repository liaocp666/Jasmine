<?php

use Typecho\Common;
use Typecho\Widget\Helper\Form\Element\Text;
use Typecho\Widget\Helper\Form\Element\Textarea;
use Typecho\Widget\Helper\Form\Element\Radio;
use Utils\Helper;
use Widget\Notice;
use Widget\Options;

if (!defined("__TYPECHO_ROOT_DIR__")) {
  exit();
}

/**
 * 主题配置
 * @param $form
 * @return void
 */
function themeConfig($form)
{
  echo '<div class="update-check message success"><h2>欢迎使用 Jasmine ！</h2><br/><a href="https://github.com/liaocp666/Jasmine" target="_blank">主题仓库</a> | <a href="https://www.liaocp.cn/archives/272.html" target="_blank">主题文档</a></div>';

  echo '<br/><div id="jasmine-check-update" class="update-check message success">正在检查更新……</div>';
  echo '<script>var jasmineVersion = "' . getThemeVersion() . '"</script>';
  echo '<script src="' . Helper::options()->themeUrl . '/core/check_update.js"></script>';

  $themeColor = new Radio(
    "themeColor",
    [
      "0" => _t("厚黑"),
      "1" => _t("瓷青"),
      "2" => _t("流金"),
      "3" => _t("淡蓝"),
      "4" => _t("朱红"),
    ],
    "0",
    _t("选择主题颜色配置"),
    _t("")
  );
  $form->addInput($themeColor);

  $icon = new Text(
    "icon",
    null,
    null,
    _t("站点 ICON 地址"),
    _t("在这里填入一个图片 URL 地址, 以在浏览器标签栏显示一个 ICON，默认值为站点路径下 /favicon.ico")
  );
  $form->addInput($icon);

  $logoUrl = new Text(
    "logoUrl",
    null,
    null,
    _t("站点 LOGO 地址"),
    _t("在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO")
  );
  $form->addInput($logoUrl);

  $logoText = new Text(
    "logoText",
    null,
    null,
    _t("站点 LOGO 鼠标悬停时显示内容"),
    _t("在这里填入一个文字, 以使鼠标悬停在网站标题 LOGO 时显示该文字，默认值为网站标题名")
  );
  $form->addInput($logoText);

  $leftSidebarMenu = new Textarea(
    "leftSidebarMenu",
    null,
    null,
    "左边栏菜单",
    '参考文档：<a href="https://github.com/liaocp666/Jasmine/wiki/%E8%AE%BE%E7%BD%AE%E6%96%87%E6%A1%A3#%E5%B7%A6%E8%BE%B9%E6%A0%8F%E8%8F%9C%E5%8D%95" target="_blank">《左边栏菜单》</a>'
  );
  $form->addInput($leftSidebarMenu);

  $switchDarkIconDesktop = new Text(
    "switchDarkIconDesktop",
    null,
    null,
    "桌面切换深浅模式按钮图标",
    '参考：<a href="https://github.com/liaocp666/Jasmine/wiki/%E8%AE%BE%E7%BD%AE%E6%96%87%E6%A1%A3#%E5%B7%A6%E8%BE%B9%E6%A0%8F%E8%8F%9C%E5%8D%95" target="_blank">《左边栏菜单》</a>，填入一个icon值'
  );
  $form->addInput($switchDarkIconDesktop);

  $switchDarkIconPhone = new Text(
    "switchDarkIconPhone",
    null,
    null,
    "手机切换深浅模式按钮图标",
    '参考：<a href="https://github.com/liaocp666/Jasmine/wiki/%E8%AE%BE%E7%BD%AE%E6%96%87%E6%A1%A3#%E5%B7%A6%E8%BE%B9%E6%A0%8F%E8%8F%9C%E5%8D%95" target="_blank">《左边栏菜单》</a>，填入一个icon值'
  );
  $form->addInput($switchDarkIconPhone);

  $middleTopCategoryIds = new Text(
    "middleTopCategoryIds",
    null,
    null,
    "中间头部菜单",
    "填入下列分类括号中的数字，格式：数字 || 数字 || 数字 （中间使用两个竖杠分隔）<br/>" . getCategoryies()
  );
  $form->addInput($middleTopCategoryIds);

  $shuoshuoCategoryId = new Text(
    "shuoshuoCategoryId",
    null,
    null,
    "说说分类",
    "填入下列分类括号中的数字<br/>" . getCategoryies()
  );
  $form->addInput($shuoshuoCategoryId);

  $stickyPost = new Text(
    "stickyPost",
    null,
    null,
    "置顶文章",
    "格式：文章的ID || 文章的ID || 文章的ID （中间使用两个竖杠分隔）"
  );
  $form->addInput($stickyPost);

  /*   $pjaxLoadPage = new Radio(
    "pjaxLoadPage",
    [
      "0" => _t("关闭"),
      "1" => _t("开启"),
    ],
    "0",
    _t("开启无刷新加载页面"),
    _t("默认为关闭")
  );
  $form->addInput($pjaxLoadPage);
 */
  $authorAvatar = new Text("authorAvatar", null, null, "作者头像", "填写图片地址，用于显示右侧作者头像");
  $form->addInput($authorAvatar);

  $authorRecommend = new Text("authorRecommend", null, null, "作者介绍", "使用简短的话，介绍下自己");
  $form->addInput($authorRecommend);

  $authorTag = new Text("authorTag", null, null, "作者标签", "与自己有关的标签，多个使用英文逗号分割");
  $form->addInput($authorTag);

  $startDate = new Text("startDate", null, null, "建站日期", "格式：2008-08-08");
  $form->addInput($startDate);

  $qq = new Text("qq", null, null, "QQ", "填入 QQ 相关文字或 HTML 代码，用于侧边栏显示");
  $form->addInput($qq);

  $wx = new Text("wx", null, null, "微信", "填入微信相关文字或 HTML 代码，用于侧边栏显示");
  $form->addInput($wx);

  $location = new Text("location", null, null, "地点", "填入地点相关文字或 HTML 代码，用于侧边栏显示");
  $form->addInput($location);

  $email = new Text("email", null, null, "邮箱", "填入邮箱相关文字或 HTML 代码，用于侧边栏显示");
  $form->addInput($email);

  $career = new Text("career", null, null, "职业", "填入职业相关文字或 HTML 代码，用于侧边栏显示");
  $form->addInput($career);

  $github = new Text("github", null, null, "Github", "填入 Github 相关文字或 HTML 代码，用于侧边栏显示");
  $form->addInput($github);

  $link = new Text("link", null, null, "链接", "填入链接相关文字或 HTML 代码，用于侧边栏显示");
  $form->addInput($link);

  $cc = new Text(
    "cc",
    null,
    null,
    "知识共享",
    '填入<a href="https://creativecommons.org/" target="_blank">知识共享协议</a>相关文字或 HTML 代码，用于侧边栏显示'
  );
  $form->addInput($cc);

  $icpCode = new Text("icpCode", null, null, "ICP 备案号", "网站备案号");
  $form->addInput($icpCode);

  $customStyle = new Textarea("customStyle", null, null, "自定义样式", "不需要添加 &lt;style&gt; 标签");
  $form->addInput($customStyle);

  $customScript = new Textarea("customScript", null, null, "自定义脚本", "不需要添加 &lt;script&gt; 标签");
  $form->addInput($customScript);

  backupThemeData();
}

/**
 * 备份主题数据
 * @return void
 */
function backupThemeData()
{
  $name = "jasmine";
  $db = Typecho_Db::get();
  if (isset($_POST["type"])) {

    if ($_POST["type"] == "创建备份") {
      $value = $db->fetchRow(
        $db
          ->select()
          ->from("table.options")
          ->where("name = ?", "theme:" . $name)
      )["value"];
      if (
        $db->fetchRow(
          $db
            ->select()
            ->from("table.options")
            ->where("name = ?", "theme:" . $name . "_backup")
        )
      ) {

        $db->query(
          $db
            ->update("table.options")
            ->rows(["value" => $value])
            ->where("name = ?", "theme:" . $name . "_backup")
        );
        Notice::alloc()->set("备份更新成功", "success");
        Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
        ?>
                <?php
      } else {
         ?>
                <?php if ($value) {

                  $db->query(
                    $db
                      ->insert("table.options")
                      ->rows(["name" => "theme:" . $name . "_backup", "user" => "0", "value" => $value])
                  );
                  Notice::alloc()->set("备份成功", "success");
                  Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
                  ?>
                    <?php
                }
      }
    }
    if ($_POST["type"] == "还原备份") {
      if (
        $db->fetchRow(
          $db
            ->select()
            ->from("table.options")
            ->where("name = ?", "theme:" . $name . "_backup")
        )
      ) {

        $_value = $db->fetchRow(
          $db
            ->select()
            ->from("table.options")
            ->where("name = ?", "theme:" . $name . "_backup")
        )["value"];
        $db->query(
          $db
            ->update("table.options")
            ->rows(["value" => $_value])
            ->where("name = ?", "theme:" . $name)
        );
        Notice::alloc()->set("备份还原成功", "success");
        Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
        ?>
                <?php
      } else {

        Notice::alloc()->set("无备份数据，请先创建备份", "error");
        Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
        ?>
                <?php
      } ?>
            <?php
    }
    ?>
        <?php if ($_POST["type"] == "删除备份") {
          if (
            $db->fetchRow(
              $db
                ->select()
                ->from("table.options")
                ->where("name = ?", "theme:" . $name . "_backup")
            )
          ) {

            $db->query($db->delete("table.options")->where("name = ?", "theme:" . $name . "_backup"));
            Notice::alloc()->set("删除备份成功", "success");
            Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
            ?>
                <?php
          } else {

            Notice::alloc()->set("无备份数据，无法删除", "success");
            Options::alloc()->response->redirect(Common::url("options-theme.php", Options::alloc()->adminUrl));
            ?>
                <?php
          } ?>
            <?php
        } ?>
        <?php
  }
  ?>

    </form>
    <?php echo '<br/><div class="message error">请先保存设置，再创建备份！<br/><br/><form class="backup" action="?jasmine_backup" method="post">
    <input type="submit" name="type" class="btn primary" value="创建备份" />
    <input type="submit" name="type" class="btn primary" value="还原备份" />
    <input type="submit" name="type" class="btn primary" value="删除备份" /></form></div>';
}

/**
 * 输出所有分类
 * @return void
 */
function getCategoryies()
{
  $db = Typecho_Db::get();
  $prow = $db->fetchAll(
    $db
      ->select()
      ->from("table.metas")
      ->where("type = ?", "category")
  );
  $text = "";
  foreach ($prow as $item) {
    $text .= $item["name"] . "(" . $item["mid"] . ")" . "&nbsp;&nbsp;&nbsp;&nbsp;";
  }
  return $text;
}
