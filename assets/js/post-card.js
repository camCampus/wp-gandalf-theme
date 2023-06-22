jQuery(document).ready(function ($) {
    $('.card-post-class').click(function (el) {
        window.location.href = el.currentTarget.children['post-card-link'].href;
    })

    var ctaLink = $('.content-wrap').children();

    ctaLink.each(function (i,e)  {
        if (e['attributes'][0]['nodeValue'] === 'cta-link' && i % 2 !== 0) {
            e['style']['flex-direction'] = 'row-reverse';
        }

    })
})

