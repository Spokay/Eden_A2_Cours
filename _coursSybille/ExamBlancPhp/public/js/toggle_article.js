
// arrows to toggle the article display
let togglers = document.querySelectorAll('.article-toggler');


for (let i = 0; i < togglers.length; i++) {
    // events listeners creation
    togglers[i].addEventListener('click', displayToggle);
}

function displayToggle(){
    // toggle classes to the closest article elements to hide
    let thumbnail = this.closest(".article").querySelector("div.to-hide");
    let text = this.closest(".article").querySelector("p.to-hide");
    let div = this.closest(".article").querySelector("div:not(.article-thumbnail)");
    let arrow = this.querySelector("i");
    arrow.classList.toggle("fa-chevron-circle-up");
    div.classList.toggle("max-width");
    thumbnail.classList.toggle("display-none");
    thumbnail.classList.toggle("displayed");
    text.classList.toggle("display-none");
    text.classList.toggle("displayed");
}


