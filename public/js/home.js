'use strict';

const postBtn = document.getElementById('postBtn');
const modal = document.getElementById('modal');
const mask = document.getElementById('mask');


postBtn.addEventListener('click', () => {
  modal.classList.remove("hidden");
  mask.classList.remove("hidden");
})








