"use strict";

const postBtn = document.getElementById("postBtn");
const cancelBtn = document.getElementById("cancelBtn");
const name = document.getElementById("name");
const modal = document.getElementById("modal");
const mask = document.getElementById("mask");

postBtn.addEventListener("click", () => {
    modal.classList.remove("hidden");
    setTimeout(() => {
      name.focus();
    }, 100);
});

cancelBtn.addEventListener("click", () => {
    modal.classList.add("hidden");
});
