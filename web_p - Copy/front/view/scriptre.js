const reviewsData = [
    {
        id: 1,
        name: "John Doe",
        job: "Software Developer",
        img: "https://randomuser.me/api/portraits/men/1.jpg", // John Doe's image URL
        text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam auctor, odio ut bibendum facilisis, mi sapien laoreet ipsum, nec elementum felis arcu a risus.",
    },
    {
        id: 2,
        name: "Mike Smith",
        job: "UX Designer",
        img: "https://randomuser.me/api/portraits/men/2.jpg", // Mike Smith's image URL
        text: "Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Ut ac massa a nulla scelerisque fringilla a id augue.",
    },
    {
        id: 3,
        name: "Alex Johnson",
        job: "Data Scientist",
        img: "https://randomuser.me/api/portraits/men/3.jpg", // Alex Johnson's image URL
        text: "Sed at mauris nec mi suscipit gravida. Fusce eu ante augue. Suspendisse sit amet ultrices dolor, a tincidunt elit. Proin vel neque vel odio consectetur malesuada.",
    },
    {
        id: 4,
        name: "David Brown",
        job: "Product Manager",
        img: "https://randomuser.me/api/portraits/men/4.jpg", // David Brown's image URL
        text: "Duis ut dui auctor, convallis velit sit amet, tristique nulla. Phasellus hendrerit ligula et odio accumsan, eu fermentum odio mattis. Aliquam erat volutpat.",
    },
    {
        id: 5,
        name: "Chris Miller",
        job: "Marketing Specialist",
        img: "https://randomuser.me/api/portraits/men/5.jpg", // Chris Miller's image URL
        text: "Integer consequat tincidunt neque, sit amet congue velit euismod a. Ut id mi ut ligula eleifend interdum. Sed tincidunt purus id justo sagittis euismod.",
    }
];


const imgElement = document.getElementById("person-img");
const authorElement = document.getElementById("review-author");
const jobElement = document.getElementById("review-job");
const infoElement = document.getElementById("review-info");

const prevBtnElement = document.querySelector(".prev-review-btn");
const nextBtnElement = document.querySelector(".next-review-btn");
const randomBtnElement = document.querySelector(".random-review-btn");

let currentReview = 0;

window.addEventListener("DOMContentLoaded", function () {
    showReview(currentReview);
});

function showReview(review) {
    const currentReviewData = reviewsData[review];
    imgElement.src = currentReviewData.img;
    authorElement.textContent = currentReviewData.name;
    jobElement.textContent = currentReviewData.job;
    infoElement.textContent = currentReviewData.text;
}

nextBtnElement.addEventListener("click", function () {
    currentReview++;
    if (currentReview > reviewsData.length - 1) {
        currentReview = 0;
    }
    showReview(currentReview);
});

prevBtnElement.addEventListener("click", function () {
    currentReview--;
    if (currentReview < 0) {
        currentReview = reviewsData.length - 1;
    }
    showReview(currentReview);
});

randomBtnElement.addEventListener("click", function () {
    currentReview = Math.floor(Math.random() * reviewsData.length);
    showReview(currentReview);
});