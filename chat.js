let lastId = 0;

async function fetchMessages() {
    const res = await fetch(`fetch.php?last_id=${lastId}`);
    const messages = await res.json();
    messages.forEach(msg => {
        lastId = msg.id;
        const div = document.createElement("div");
        div.textContent = `${msg.username}: ${msg.message}`;
        document.getElementById("chat-box").appendChild(div);
    });
}

document.getElementById("send-btn").addEventListener("click", async () => {
    const input = document.getElementById("msg-input");
    if (!input.value.trim()) return;
    await fetch("send.php", {
        method: "POST",
        body: new URLSearchParams({ message: input.value })
    });
    input.value = "";
});

document.getElementById("msg-input").addEventListener("keydown", (e) => {
    if (e.key === "Enter") {
        document.getElementById("send-btn").click();
        e.target.focus();
    }
});

setInterval(fetchMessages, 2000);
fetchMessages();