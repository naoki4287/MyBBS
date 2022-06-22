"use strict";

const deleteBtn = document.getElementById("deleteBtn");
const confirmResult = document.getElementById("confirmResult");

deleteBtn.addEventListener("click", () => {
    if (confirm("本当に削除しますか？")) {
        confirmResult.value = true;
    }
});
