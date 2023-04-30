const aside = document.querySelector(".mobile-nav");
const mobileButton = document.querySelector(".mobile-nav-button");

const mobileCLass = "show-mobile-nav";

function toggleHideAside(targetClass) {
  aside.classList.contains(targetClass)
    ? aside.classList.remove(targetClass)
    : aside.classList.add(targetClass);
}

mobileButton.addEventListener("click", () => toggleHideAside(mobileCLass));
