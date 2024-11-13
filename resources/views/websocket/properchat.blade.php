<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private Chat Box</title>
    <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script>
</head>
<body>
    <h1>Private Chat</h1>
    <input type="text" id="username" placeholder="Enter your username"><br>
    <input type="text" id="recipient" placeholder="Enter recipient username"><br>
    <input type="text" id="messageInput" placeholder="Type a message...">
    <button id="sendBtn">Send Private Message</button>

    <div id="chat"></div>

    <script>
        const socket = io('https://rummyculture.winzy.app');

        // Register the user
        document.getElementById('username').addEventListener('change', (e) => {
            const username = e.target.value;
            socket.emit('register', username);
        });

        // Send private message to the recipient
        document.getElementById('sendBtn').addEventListener('click', () => {
            const recipient = document.getElementById('recipient').value;
            const message = document.getElementById('messageInput').value;
            if (recipient && message) {
                socket.emit('privateMessage', { recipient, message });
            }
        });

        // Display incoming messages
        socket.on('message', (data) => {
            const chat = document.getElementById('chat');
            const messageElement = document.createElement('p');
            messageElement.textContent = `${data.sender}: ${data.text}`;
            chat.appendChild(messageElement);
        });
    </script>
</body>
</html>
