'use strict';

const postBtn = document.getElementById('postBtn');
const cancelBtn = document.getElementById('cancelBtn');
const modal = document.getElementById('modal');
const mask = document.getElementById('mask');


postBtn.addEventListener('click', () => {
  modal.classList.remove("hidden");
  mask.classList.remove("hidden");
})

cancelBtn.addEventListener('click', () => {
  modal.classList.add("hidden");
  mask.classList.add("hidden");
})







