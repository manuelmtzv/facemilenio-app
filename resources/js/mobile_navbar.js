const aside = document.querySelector(".admin-aside");
const mobileButton = document.querySelector(".mobile-nav");

function toggleHideAside() {
  aside.classList.contains("show-aside")
    ? aside.classList.remove("show-aside")
    : aside.classList.add("show-aside");
}

mobileButton.addEventListener("click", () => toggleHideAside());
