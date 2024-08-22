// close button
var closeButton = document.getElementById('cross-btn');
var notificationBar = document.getElementById('notifiction-bar');

function hideNotificationBar() {
    notificationBar.style.display = 'none';
}

if (closeButton) {
    closeButton.addEventListener('click', hideNotificationBar);
}

// navigation
function togglefunction() {
    var nav = document.getElementById('site-navigation');
    nav.classList.toggle('active-nav');
    console.log('active');
}

// Hero slider
jQuery(document).ready(function($) {
    $('.custom_slider_1').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });
});


// CPT support slider
jQuery(document).ready(function($) {
    $('.custom_slider_2').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            }
        ]
    });
});
