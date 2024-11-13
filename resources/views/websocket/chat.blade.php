<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Box</title>
    <style>
        #chat {
            border: 1px solid #ccc;
            width: 300px;
            height: 400px;
            overflow-y: auto;
            padding: 10px;
        }
        #messageInput {
            width: 80%;
            padding: 10px;
        }
        #sendBtn {
            padding: 10px;
        }
    </style>
    <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script>
</head>
<body>
    <h1>Chat Box</h1>
    <div id="chat"></div>
    <input type="text" id="messageInput" placeholder="Type a message...">
    <button id="sendBtn">Send</button>

    <script>
        const socket = io('https://rummyculture.winzy.app');

        // Reference to chat div and message input
        const chat = document.getElementById('chat');
        const messageInput = document.getElementById('messageInput');
        const sendBtn = document.getElementById('sendBtn');
        
        socket.on("connect",(socket)=>{
            console.log(`connected to the server your id is`);
        });

        // When the client sends a message
        sendBtn.addEventListener('click', () => {
            const message = messageInput.value;
            if (message.trim() !== '') {
                socket.emit("chatMessage", message);
                messageInput.value = '';  // Clear input after sending
            }
        });

        // Display incoming messages
        socket.on("message", (data) => {
            const messageElement = document.createElement('p');
            messageElement.textContent = `${data.userId}: ${data.text}`;
            chat.appendChild(messageElement);
            // Auto scroll to the latest message
            chat.scrollTop = chat.scrollHeight;
        });
    </script>
</body>
</html>
