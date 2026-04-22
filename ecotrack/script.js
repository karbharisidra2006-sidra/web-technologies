window.onload = function () {
    let inputs = document.querySelectorAll("input");

    inputs.forEach(input => {
        input.addEventListener("input", calculate);
    });

    function calculate() {
        let t = document.getElementById("travel").value || 0;
        let e = document.getElementById("electricity").value || 0;
        let f = document.getElementById("food").value || 0;

        let total = (t * 0.12) + (e * 0.82) + (f * 2);

        document.getElementById("result").innerText = total.toFixed(2);
    }
};