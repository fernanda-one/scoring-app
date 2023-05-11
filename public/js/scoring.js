const form = document.getElementById("form");
const input = document.getElementById("input-message");
form.addEventListener("submit", function (event) {
    event.preventDefault();
    const userInput = input.value;
    console.log(userInput);

    axios.post("/score-event", {
        message: userInput,
    });
});

const channel = Echo.channel("public.ring.1");
channel
    .subscribed(() => {
        console.log("anda terhubung");
    })
    .listen(".ring", (event) => {
        console.log(event);
        const score = event.message;
        // console.log(s);/

        const span = document.getElementById("score");
        span.textContent = score;
    });
