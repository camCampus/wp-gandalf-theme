jQuery(document).ready(function ($) {
    $('.card-post-class').click(function (el) {
        window.location.href = el.currentTarget.children['post-card-link'].href;
    })

    var ctaLink = $('.cta-link-js').children();
    ctaLink.each(function (i, e) {
        if (i % 2 !== 0) {
            e['style']['flex-direction'] = 'row-reverse';
        }
    })

    var ctaLinkHome = $('.content-wrap').children();
    ctaLinkHome.each(function (i,e)  {
        if (e['attributes'][0]['nodeValue'] === 'cta-link' && i % 2 !== 0) {
            e['style']['flex-direction'] = 'row-reverse';
        }
    })


    let cardGallery = $('#card-gallery-content').children();
    let postCardChild = cardGallery[0]['children'];
    for (let i=0; i<postCardChild.length; i++) {
        console.log()
        console.log(postCardChild[i])
    }



})

