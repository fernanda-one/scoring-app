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

const channel = Echo.join("presence.ring.1");
channel
    .here((users) => {
        console.log(users);
        console.log("anda terhubung");
    })
    .joining((user) => {
        console.log({ user }, "joined");
    })
    .leaving((user) => {
        console.log({ user }, "leaved");
    })
    .listen(".ring", (event) => {
        console.log(event);
        const score = event.message;
        // console.log(s);/

        const span = document.getElementById("score");
        span.textContent = score;
    });
