<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group Chat</title>
    <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script>
</head>
<body>
    <h1>Group Chat</h1>

    <input type="text" id="username" placeholder="Enter your username"><br>
    <input type="text" id="group" placeholder="Enter group name"><br>
    <button id="joinGroupBtn">Join Group</button><br><br>

    <input type="text" id="messageInput" placeholder="Type a message">
    <button id="sendMessageBtn">Send Message</button>

    <div id="chat"></div>

    <script>
        const socket = io('https://rummyculture.winzy.app');

        // Join a group
        document.getElementById('joinGroupBtn').addEventListener('click', () => {
            const username = document.getElementById('username').value;
            const group = document.getElementById('group').value;

            if (username && group) {
                socket.emit('joinGroup', { username, group });
            }
        });

        // Send a message to the group
        document.getElementById('sendMessageBtn').addEventListener('click', () => {
            const group = document.getElementById('group').value;
            const message = document.getElementById('messageInput').value;

            if (group && message) {
                socket.emit('groupMessage', { group, message });
            }
        });

        // Display messages
        socket.on('message', (data) => {
            const chat = document.getElementById('chat');
            const messageElement = document.createElement('p');
            messageElement.textContent = `${data.sender}: ${data.text}`;
            chat.appendChild(messageElement);
        });
    </script>
</body>
</html>
