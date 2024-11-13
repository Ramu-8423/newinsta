<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Socket.IO Test</title>
    <script src="https://cdn.socket.io/4.5.0/socket.io.min.js"></script> <!-- Use the correct Socket.IO version -->
</head>
<body>
    <h1>Socket.IO WebSocket Test</h1>
    <button id="sendButton">Send Message to Server</button>
    <p id="serverResponse"></p>
   <h1 id="connectMessage"></h1>
    <script>
        const socket = io('https://rummyculture.winzy.app'); // Change this to your server's URL in production
        
        socket.on("connect",()=>{
            console.log('connecetd to server');
            document.getElementById('connectMessage').innerText = "hello connected to server";
            socket.emit("clientEvent",{message:"nessage from client side"});
            socket.on("serverEvent",(arg)=>{
                document.getElementById('serverResponse').innerText = arg.message;
            })
        });

        // Event listener for the button
        // document.getElementById('sendButton').addEventListener('click', () => {
        //     socket.emit('clientEvent', { message: 'Hello from client!' });
        // });

        // Listen for events from the server
        // socket.on('serverEvent', (data) => {
        //     console.log('Received from server:', data.message);
        //     document.getElementById('serverResponse').innerText = data.message;
        // });

        // Connection event
        // socket.on('connect', (arg) => {
        //     console.log('Connected to server');
        //     document.getElementById('connectMessage').innerText = arg.message;
        // });

        // Error handling
        // socket.on('connect_error', (err) => {
        //     console.error('Connection Error:', err);
        // });

        // Disconnection event
        // socket.on('disconnect', () => {
        //     console.log('Disconnected from server');
        // });
    </script>
</body>
</html>
