function removeByPost() {
    if (window.location.href.includes('write-post')) {
        document.querySelectorAll(".removeByPost").forEach(function (element) {
            var tr = element.closest('tr');
            if (tr) {
                tr.style.display = 'none';
            }
        });
    }
}

function removeByPage() {
    if (window.location.href.includes('write-page')) {
        document.querySelectorAll(".removeByPage").forEach(function (element) {
            var tr = element.closest('tr');
            if (tr) {
                tr.style.display = 'none';
            }
        });
    }
}

document.addEventListener("DOMContentLoaded", function () {
    removeByPost();
    removeByPage();
})