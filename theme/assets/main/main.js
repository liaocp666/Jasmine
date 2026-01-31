function changeBsTheme() {
    var dataBsTheme = localStorage.getItem('data-bs-theme')
    if ('light' == dataBsTheme) {
        dataBsTheme = 'dark'
    } else {
        dataBsTheme = 'light'
    }
    document.body.setAttribute('data-bs-theme', dataBsTheme)
    localStorage.setItem("data-bs-theme", dataBsTheme);
}

function clickSearchIcon(idName) {
    document.querySelector('#' + idName).focus()
    return false
}

function generateToc() {
    var toc = document.getElementById('toc');
    if (!toc) {
        return false;
    }
    var postContent = document.getElementById('post-content');
    if (!postContent) {
        return false;
    }
    var headings = postContent.querySelectorAll('h1, h2, h3, h4, h5, h6')
    if (!headings || headings.length === 0) {
        return false;
    }
    var tocContent = document.getElementById('toc-content');
    if (!tocContent) {
        return false;
    }

    var lastLevel = 0;
    var lastMaginLeft = 0;

    var tocList = document.createElement('ul');
    tocList.classList.add('list-group', 'list-group-flush')
    headings.forEach(function (item, index) {
        var titleId = 'title-' + index;
        item.id = titleId;

        var listItem = document.createElement('li');
        var link = document.createElement('a');
        listItem.classList.add('list-group-item');
        link.textContent = item.textContent;
        link.setAttribute('href', '#' + titleId);
        link.classList.add('link-body-emphasis')

        var level = parseInt(item.tagName.charAt(1));
        if (lastLevel === 0) {
            lastLevel = level;
        }
        var levelMargin = 20;
        if (level <= lastLevel) {
            var l = (lastLevel - level) * 20
            lastMaginLeft = lastMaginLeft - l
            if (lastMaginLeft < 0) {
                lastMaginLeft = 0
            }
        } else {
            lastMaginLeft = lastMaginLeft + (level - lastLevel) * 20
        }
        link.style.display = 'block'
        link.style.marginLeft = lastMaginLeft + 'px'
        listItem.append(link)
        tocContent.append(listItem)
        lastLevel = level;
    })
}

function commentRemember(name, elName) {
    let value = "";
    let nameEQ = name + "=";
    let cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i];
        while (cookie.charAt(0) == ' ') {
            cookie = cookie.substring(1, cookie.length);
        }
        if (cookie.includes(nameEQ)) {
            value = cookie.substring(nameEQ.length, cookie.length);
        }
    }
    if (value == "" || !value.includes('=')) {
        return false;
    }
    document.getElementById(elName).value = decodeURIComponent(value.split('=')[1])
}

window.addEventListener('DOMContentLoaded', function () {
    generateToc();
    hljs.highlightAll();
    var tables = document.querySelectorAll('#post-content table');
    tables.forEach(function (table) {
        table.classList.add('table');
        table.classList.add('table-bordered');
        table.classList.add('table-striped');
    });
    var tablegroups = document.querySelectorAll('#post-content tbody');
    tablegroups.forEach(function (tbody) {
        tbody.classList.add('table-group-divider');
    });
    commentRemember("remember_author", "author")
    commentRemember("remember_mail", "mail")
    commentRemember("remember_url", "url")
})