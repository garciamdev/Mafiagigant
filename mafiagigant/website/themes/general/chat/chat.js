$(document).ready(function () {
var limit;


    // Function to load shoutout messages
    function loadMessages() {
        $.ajax({
            url: '/themes/general/chat/load_messages.php',
            method: 'GET',
            data: { limit: limit },
            success: function (data) {
                $('#shoutbox-messages').html(data);
            }
        });
    }

    // Load messages when the page loads
    loadMessages();   




   // Function to send a new shoutout
    function sendMessage() {
        var message = $('#message').val();
        if (message !== '') {
            $.ajax({
                url: '/themes/general/chat/submit_message.php',
                method: 'POST',
                data: { message: message },
                success: function () {
                    $('#message').val('');
                    loadMessages(); // Reload messages after sending
                }
            });
        }
    }

    // Handle "Enter" key press to send a message
    $('#message').keypress(function (e) {
        if (e.which === 13) { // 13 is the key code for "Enter"
            sendMessage();
        }
    });

    // Handle clicking the "Send" button to send a message
    $('#send').click(function () {
        sendMessage();
    });





    // Automatically load new messages every 5 seconds
    setInterval(function () {
        loadMessages();
    }, 2000);
});