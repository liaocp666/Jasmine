import "./style/tailwind.css";
import "./style/style.css";
import StickySidebar from "../node_modules/sticky-sidebar";
import Prism from "prismjs";

/**
 * 点击搜索
 */
export function clickSearch() {
  document.getElementById("search-input")?.blur();
}

/**
 * 切换暗黑模式
 */
export function switchDark() {
  if (localStorage.theme === "light") {
    localStorage.theme = "dark";
  } else if (localStorage.theme === "dark") {
    localStorage.theme = "light";
  } else {
    localStorage.theme = "dark";
  }
  loadTheme();
}

/**
 * 加载主题
 */
export function loadTheme() {
  if (
    localStorage.theme === "dark" ||
    (!("theme" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)
  ) {
    document.documentElement.classList.add("dark");
    if (typeof (window as any).CustomThemeCallback === 'function') {
      (window as any).CustomThemeCallback.call(null,"dark");
    }
  } else {
    document.documentElement.classList.remove("dark");
    if (typeof (window as any).CustomThemeCallback === 'function') {
      (window as any).CustomThemeCallback.call(null,"light");
    }
  }
}

loadTheme();
Prism.highlightAll();
console.log("%c Jasmine and Modify By XiaoA ", "background:#000;color:#fff", "https://www.xiaoa.me/");

window.addEventListener('load', function() {
  new StickySidebar("#sidebar-right", {
    innerWrapperSelector: ".sidebar__right__inner",
  });

  Array.from(document.getElementsByClassName("nav-li")).forEach((element: Element) => {
    element.addEventListener("mouseover", () => {
      const span: Element = element.getElementsByTagName("span")[0];
      span.classList.add("!block");
    });
    element.addEventListener("mouseout", () => {
      const span: Element = element.getElementsByTagName("span")[0];
      span.classList.remove("!block");
    });
  });

  // 获取菜单项和下拉菜单
  // 获取所有菜单项
  const menuItems = document.querySelectorAll('.dropdown-menu');
  menuItems.forEach((menuItem) => {
    // 获取当前菜单项的下拉菜单
    const dropdownMenu = menuItem.querySelector('.dropdown-menu-item');

    // 监听菜单项的鼠标悬停事件
    menuItem.addEventListener('mouseenter', () => {
      // 显示下拉菜单
      dropdownMenu?.classList.remove('hidden');
    });
    // 监听菜单项的鼠标离开事件
    menuItem.addEventListener('mouseleave', () => {
      // 隐藏下拉菜单
      dropdownMenu?.classList.add('hidden');
    });
  });

  document.querySelector("#mobile-menus-bg")?.addEventListener("click", () => {
    toggleMobileMenu();
  });
});

/**
 * 返回顶部
 */
export function backtop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

/**
 * 切换移动端菜单
 */
export function toggleMobileMenu() {
  const isHide: boolean = document.querySelector("#mobile-menus")!.classList.contains("!translate-x-0");
  if (isHide) {
    document.querySelector("#mobile-menus-bg")?.classList.add("hidden");
    document.querySelector("#mobile-menus")?.classList.remove("!translate-x-0");
  } else {
    document.querySelector("#mobile-menus-bg")?.classList.remove("hidden");
    document.querySelector("#mobile-menus")?.classList.add("!translate-x-0");
  }
}
