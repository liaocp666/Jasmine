import "./style/tailwind.css";
import "../node_modules/github-markdown-css"
import "./style/style.css";

import StickySidebar from "../node_modules/sticky-sidebar";

const onScroll = () => {
    const headerMenu = document.getElementById("header-menu") as HTMLFormElement;
    if (window.scrollY > 0) {
        headerMenu.classList.add("border-b");
        headerMenu.classList.add("py-0");
    } else {
        headerMenu.classList.remove("border-b");
        headerMenu.classList.remove("py-0");
    }
};

window.addEventListener("scroll", onScroll);

window.onload = () => {
    new StickySidebar('#sidebar-right', {
        innerWrapperSelector: '.sidebar__right__inner'
    })
};