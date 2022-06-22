"use strict";

const postBtn = document.getElementById("postBtn");
const name = document.getElementById("name");
const modal = document.getElementById("modal");

postBtn.addEventListener("click", () => {
    modal.classList.remove("hidden");
    setTimeout(() => {
      name.focus();
    }, 100);
});