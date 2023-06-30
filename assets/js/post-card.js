jQuery(document).ready(function ($) {

    const baseUrl = "http://localhost:10004"


    $('.card-post-class').click(function (el) {
        window.location.href = el.currentTarget.children['post-card-link'].href;
    })

    var ctaLink = $('.cta-link-js').children();
    ctaLink.each(function (i, e) {
        console.log()
        e = e['children'][1]
        if (i % 2 !== 0) {
            e['style']['flex-direction'] = 'row-reverse';
            e['style']['border-left'] = 'none';
            e['children'][1]['style']['border-right'] = '2px solid black';
        }
    })

    var ctaLinkHome = $('.content-wrap').children();
    ctaLinkHome.each(function (i, e) {
        if (e['attributes'][0]['nodeValue'] === 'cta-link' && i % 2 !== 0) {
            e['style']['flex-direction'] = 'row-reverse';
        }
    })


    let cardGallery = $('#card-gallery-content').children();
    let masterContainer = $('.article-main-content').children()
    let container = $('<div></div>').addClass('row-card');

    cardGallery.append(container)

    $.each(masterContainer, (index, card) => {

        if (index !== 0 && index % 3 === 0) {
            let newDiv = $('<div></div>').addClass('row-card')
            cardGallery.append(newDiv)
        }

        cardGallery.children().last().append(card);
    })

    $('#contact-cta-btn').click(() => {
        window.location.href = baseUrl + '/contact'
    })
})
