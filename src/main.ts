import "./style/tailwind.css";
import "../node_modules/github-markdown-css";
import "./style/style.css";
import StickySidebar from "../node_modules/sticky-sidebar";

window.onload = () => {
    new StickySidebar("#sidebar-right", {
        innerWrapperSelector: ".sidebar__right__inner",
    });

    Array.from(document.getElementsByClassName("nav-li")).forEach((element:Element) => {
        element.addEventListener('mouseover', () => {
            const span:Element = element.getElementsByTagName("span")[0]
            span.classList.add('!block')
        })
        element.addEventListener('mouseout', () => {
            const span:Element = element.getElementsByTagName("span")[0]
            span.classList.remove('!block')
        })
    })
};