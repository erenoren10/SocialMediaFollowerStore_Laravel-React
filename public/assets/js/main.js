var swiper = new Swiper(".servicesSwiper", {
    slidesPerView: 1,
    spaceBetween: 15,
    pagination: {
        el: ".swiper-pagination",
        type: "progressbar",
    },
    navigation: {
        nextEl: ".swiper-button-nextsr",
        prevEl: ".swiper-button-prevsr",
    },
    breakpoints: {
        1920: {
            slidesPerView: 5
        },
        1028: {
            slidesPerView: 5
        },
        480: {
            slidesPerView: 1
        }
    },
});

var swiper = new Swiper(".paketSwiper", {
    slidesPerView: "auto",
    spaceBetween: 20,
    breakpoints: {
        1920: {
            slidesPerView: 4
        },
        1028: {
            slidesPerView: 4
        },
        480: {
            slidesPerView: 2
        }
    },
});

var swiper = new Swiper(".ozelliklerSwiper", {
    slidesPerView: 1,
    spaceBetween: 25,
    loop: true,
    navigation: {
        nextEl: ".swiper-button-nextoz",
        prevEl: ".swiper-button-prevoz",
    },
    breakpoints: {
        1920: {
            slidesPerView: 4
        },
        1028: {
            slidesPerView: 4
        },
        480: {
            slidesPerView: 1
        }
    },
});

var swiper = new Swiper(".markaSwiper", {
    slidesPerView: 1,
    spaceBetween: 20,
    loop: true,
    centeredSlides: true,
    pagination: {
        el: ".swiper-pagination",
        type: "progressbar",
    },
    navigation: {
        nextEl: ".swiper-button-nextc",
        prevEl: ".swiper-button-prevc",
    },
    breakpoints: {
        1920: {
            slidesPerView: 5
        },
        1028: {
            slidesPerView: 5
        },
        480: {
            slidesPerView: 1
        }
    },
});

var swiper = new Swiper(".blogsliderSwiper", {
    pagination: {
        el: ".swiper-pagination",
    },
    navigation: {
        nextEl: ".swiper-button-nextbg",
        prevEl: ".swiper-button-prevbg",
    },
});

var swiper = new Swiper(".blogleftSwiper", {
    loop: true,
    navigation: {
        nextEl: ".swiper-button-nextlft",
        prevEl: ".swiper-button-prevlft",
    },
});

  
function copyText() {
    const textToCopy = document.getElementById('textToCopy');
    const textArea = document.createElement('textarea');
    textArea.value = textToCopy.textContent;


    document.body.appendChild(textArea);
    textArea.select();
    document.execCommand('copy');
    document.body.removeChild(textArea);

    const notificationText = document.getElementById("notification-text");
    document.querySelector(".notification-container").style.display = "block";


    setTimeout(function () {
        closeNotification();
    }, 3000);

}

function copyTextB(elementId) {
    const textToCopy = document.getElementById(elementId);

    const range = document.createRange();
    range.selectNode(textToCopy);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    document.execCommand("copy");
    window.getSelection().removeAllRanges();

    const notificationText = document.getElementById("notification-text");
    document.querySelector(".notification-container").style.display = "block";


    setTimeout(function () {
        closeNotification();
    }, 3000);
}

function closeNotification() {
    document.querySelector(".notification-container").style.display = "none";
}

$('.sub-menu ul').hide();
$(".sub-menu a").click(function () {
    $(this).parent(".sub-menu").children("ul").slideToggle("100");
    $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
});

const mobiluserDiv = document.querySelector('.mobiluser');

const dropUserDiv = document.querySelector('.drop-user');

mobiluserDiv.addEventListener('click', function() {
  dropUserDiv.classList.toggle('active');
});

function showMore() {
    var moreItems = document.querySelectorAll('.col-md-6:nth-child(n+9)');
    moreItems.forEach(function (item) {
        item.style.display = 'block';
    });

    var showMoreBtn = document.getElementById('show-more-btn');
    showMoreBtn.style.display = 'none';

    var showLessBtn = document.getElementById('show-less-btn');
    showLessBtn.style.display = 'inline-block';
}

function showLess() {
    var moreItems = document.querySelectorAll('.col-md-6:nth-child(n+9)');
    moreItems.forEach(function (item) {
        item.style.display = 'none';
    });

    var showLessBtn = document.getElementById('show-less-btn');
    showLessBtn.style.display = 'none';

    var showMoreBtn = document.getElementById('show-more-btn');
    showMoreBtn.style.display = 'inline-block';
}