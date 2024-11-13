<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <script src="https://cdn.socket.io/4.0.0/socket.io.min.js"></script>
    <style>
        body { font-family: Arial, sans-serif; }
        #chatBox, #groupChatBox { border: 1px solid #ccc; padding: 10px; margin-top: 10px; height: 200px; overflow-y: scroll; }
        .user-list { margin-top: 20px; }
        .user { cursor: pointer; padding: 5px; border: 1px solid #ccc; margin: 2px; }
        .user.selected { background-color: #cce5ff; }
    </style>
</head>
<body>
    <h1>Chat Application</h1>
    <div>
        <h2>Private Chat</h2>
        <input type="text" id="receiverId" placeholder="Receiver ID">
        <input type="text" id="privateMessage" placeholder="Type a message">
        <button onclick="sendPrivateMessage()">Send</button>
        <div id="chatBox"></div>
    </div>

    <div>
        <h2>Users</h2>
        <div id="userList" class="user-list"></div>
        <input type="text" id="groupName" placeholder="Group Name">
        <button onclick="createGroup()">Create Group</button>
    </div>

    <div>
        <h2>Group Chat</h2>
        <input type="text" id="groupId" placeholder="Group ID">
        <input type="text" id="groupMessage" placeholder="Type a message">
        <button onclick="joinGroup()">Join Group</button>
        <button onclick="sendGroupMessage()">Send to Group</button>
        <div id="groupChatBox"></div>
    </div>

    <script>
        const socket = io('http://localhost:3001');  // Connect to the server
        let selectedUsers = [];

        // Fetch users when connected
        socket.on('connect', () => {
            socket.emit('getUsers');
        });

        // Listen for user list from the server
        socket.on('userList', (users) => {
            const userList = document.getElementById('userList');
            userList.innerHTML = ''; // Clear the list
            users.forEach(user => {
                const userDiv = document.createElement('div');
                userDiv.className = 'user';
                userDiv.innerText = user.username;
                userDiv.onclick = () => toggleUserSelection(user.id, userDiv);
                userList.appendChild(userDiv);
            });
        });

        function toggleUserSelection(userId, userDiv) {
            if (selectedUsers.includes(userId)) {
                selectedUsers = selectedUsers.filter(id => id !== userId);
                userDiv.classList.remove('selected');
            } else {
                selectedUsers.push(userId);
                userDiv.classList.add('selected');
            }
        }

        // Function to send a private message
        function sendPrivateMessage() {
            const receiverId = document.getElementById('receiverId').value;
            const message = document.getElementById('privateMessage').value;
            socket.emit('sendMessage', { senderId: '1', receiverId: receiverId, message: message }); // Assume sender ID is 1
        }

        // Function to create a group
        function createGroup() {
            const groupName = document.getElementById('groupName').value;
            if (selectedUsers.length > 0) {
                socket.emit('createGroup', { groupName: groupName, userIds: selectedUsers });
                alert(`Group "${groupName}" created with users: ${selectedUsers.join(', ')}`);
            } else {
                alert('Please select users to create a group.');
            }
        }

        // Function to join a group
        function joinGroup() {
            const groupId = document.getElementById('groupId').value;
            socket.emit('joinGroup', { groupId: groupId, userId: '1' }); // Assume user ID is 1
        }

        // Function to send a group message
        function sendGroupMessage() {
            const groupId = document.getElementById('groupId').value;
            const message = document.getElementById('groupMessage').value;
            socket.emit('sendGroupMessage', { groupId: groupId, senderId: '1', message: message }); // Assume sender ID is 1
        }

        // Listen for private messages from the server
        socket.on('message', (msg) => {
            const chatBox = document.getElementById('chatBox');
            chatBox.innerHTML += `<p>${msg.senderId}: ${msg.message}</p>`;
        });

        // Listen for group messages from the server
        socket.on('groupMessage', (msg) => {
            const groupChatBox = document.getElementById('groupChatBox');
            groupChatBox.innerHTML += `<p>${msg.senderId}: ${msg.message}</p>`;
        });
    </script>
</body>
</html>
