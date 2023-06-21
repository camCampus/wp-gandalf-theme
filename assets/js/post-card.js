
jQuery(document).ready(function ($) {
    $('.card-post-class').click(function (el) {
        window.location.href = el.currentTarget.children[6].href;
    })
})

