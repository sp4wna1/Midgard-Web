function onCheck(points, position) {
    let checkBox = document.getElementById("checkbox-bounty" + position);
    let selectedCounter = document.getElementById("selected-counter");
    let value = parseInt(selectedCounter.value);

    checkBox.onchange = function () {
        if (this.checked) {
            value = value + points;
        } else {
            value = value - points;
        }

        selectedCounter.value = value;
    };
}