<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socket.io Group Chat</title>
    <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script>
</head>
<body>
    <h1>Group Chat</h1>
    <div>
        <select id="groupSelect">
            <option value="group1">Group 1</option>
            <option value="group2">Group 2</option>
            <option value="group3">Group 3</option>
        </select>
        <button onclick="joinGroup()">Join Group</button>
    </div>
    <div>
        <input type="text" id="messageInput" placeholder="Type a message">
        <button onclick="sendMessage()">Send Message</button>
    </div>
    <div id="chatBox"></div>

    <script>
        const socket = io('https://rummyculture.winzy.app');  // Connect to the server

        // Listen for messages from the server
        socket.on('message', (msg) => {
            const chatBox = document.getElementById('chatBox');
            chatBox.innerHTML += `<p>${msg}</p>`;
        });

        // Function to join a selected group
        function joinGroup() {
            const group = document.getElementById('groupSelect').value;
            socket.emit('joinGroup', group);  // Emit event to join group
        }

        // Function to send a message to the group
        function sendMessage() {
            const message = document.getElementById('messageInput').value;
            const group = document.getElementById('groupSelect').value;
            socket.emit('sendMessage', { group, message });  // Emit event to send message to group
        }
    </script>
</body>
</html>
