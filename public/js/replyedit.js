"use strict";

const deleteButton = document.getElementById("deleteButton");
const confirmResult = document.getElementById("confirmResult");

deleteButton.addEventListener("click", () => {
    if (confirm("本当に削除しますか？")) {
        confirmResult.value = true;
    }
});
