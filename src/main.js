var carousel = document.getElementById("reviews-carousel");
var count = carousel.childElementCount;
carousel.style.width = count * 100 + "vw";
carousel.style.right = (-count / 2) * 100 + 50 + "vw";
var index = 0;

document.getElementById("btn-left").addEventListener("click", function () {
    index--;
    if (index < 0) {
        index = count - 1;
    }
    updateCarousel();
});
document.getElementById("btn-right").addEventListener("click", function () {
    index++;
    if (index > count - 1) {
        index = 0;
    }
    updateCarousel();
});

function updateCarousel() {
    carousel.style.right = (index - count / 2) * 100 + 50 + "vw";
}

document.getElementById("contactForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch("mail.php", {
        method: "POST",
        body: formData,
    })
        .then((res) => res.text())
        .then((data) => {
            document.getElementById("response").innerText = data;
            console.log(data);
        })
        .catch((error) => {
            document.getElementById("response").innerText =
                "Error sending message.";
        });
});
