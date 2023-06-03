import "./style/tailwind.css";
import "./style/style.css";
import StickySidebar from "../node_modules/sticky-sidebar";

export function clickSearch () {
    document.getElementById('search-input')?.blur();
}

export function switchDark() {
    if (localStorage.theme === 'light') {
        localStorage.theme = 'dark'
    } else if (localStorage.theme === 'dark') {
        localStorage.theme = 'light'
    } else {
        localStorage.theme = 'light'
    }
    loadTheme()
}

export function loadTheme() {
    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
    } else {
        document.documentElement.classList.remove('dark')
    }
}

loadTheme()

window.onload = () => {
    new StickySidebar("#sidebar-right", {
        innerWrapperSelector: ".sidebar__right__inner",
    });

    Array.from(document.getElementsByClassName("nav-li")).forEach((element: Element) => {
        element.addEventListener('mouseover', () => {
            const span: Element = element.getElementsByTagName("span")[0]
            span.classList.add('!block')
        })
        element.addEventListener('mouseout', () => {
            const span: Element = element.getElementsByTagName("span")[0]
            span.classList.remove('!block')
        })
    })
};

/**
 * 返回顶部
 */
export function backtop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

