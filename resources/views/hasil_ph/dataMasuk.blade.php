@include('hasil_ph.navhas')

<div class="glitch">
    <table id="data-masuk-table" class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ku Tebu</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Chatbot Section -->
<div id="chat-area" class="chat-area" style="margin-top: 160px;">
    <h2>Quick Question</h2>
    <div id="message-container" class="message-container"></div>
    
    <!-- Input section for user to type their message -->
    <div class="message-box">
        <textarea class="frm-textarea" placeholder="Masukkan teks di sini"></textarea>
        <button id="send-btn" class="send-btn">Kirim</button>
    </div>
</div>

@include('hasil_ph.fothas')

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function() {
    $.ajax({
        url: 'http://localhost:8000/api/data-masuk',
        method: 'GET',
        success: function(response) {
            var rows = '';
            response.dataMasuk.forEach(function(data) {
                rows += `
                    <tr>
                        <td>${data.id}</td>
                        <td>${data.kuTebu}</td>
                        <td>
                            <a href="javascript:void(0);" 
                               class="view-document" 
                               data-encrypted-id="${data.encrypted_id}">show</a>
                        </td>
                    </tr>
                `;
            });
            $('#data-masuk-table tbody').html(rows);

            $('.view-document').on('click', function() {
                var encryptedId = $(this).data('encrypted-id');
                var form = document.createElement('form');
                form.method = 'GET';
                form.action = '/data-report';

                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'Id';
                input.value = encryptedId;
                
                form.appendChild(input);
                document.body.appendChild(form);
                form.submit();
            });
        },
        error: function(xhr, status, error) {
            console.error('Terjadi kesalahan:', error);
        }
    });

    // API endpoint
    const apiEndpoint = 'http://localhost:5000/api/chatbot';
    
    // Select elements
    const messageContainer = document.getElementById('message-container');
    
    // Function to create a new text area in a separate div
    function createTextArea(text, isResponse = false) {
        const messageBox = document.createElement('div');
        messageBox.classList.add('message-box');
    
        const newTextArea = document.createElement('textarea');
        newTextArea.classList.add('frm-textarea');
        newTextArea.value = text;
        newTextArea.readOnly = true;  // Disable text area editing after submission
    
        // If it's a response, align it to the right
        if (isResponse) {
            newTextArea.classList.add('response-area');
        }
    
        messageBox.appendChild(newTextArea);
        messageContainer.appendChild(messageBox);
    }
    
    // Function to create an audio element and play the response
    function playAudio(audioUrl) {
        const audioElement = document.createElement('audio');
        audioElement.src = audioUrl;
        audioElement.controls = true;
        audioElement.autoplay = true; // Play the audio automatically when added to the DOM
    
        // Append the audio element to the container
        const audioContainer = document.createElement('div');
        audioContainer.classList.add('audio-container');
        audioContainer.appendChild(audioElement);
        messageContainer.appendChild(audioContainer);
    }
    
    // Function to handle the chatbot API request
    function sendToChatbot(event) {
        event.preventDefault(); // Prevent default form submission behavior
    
        // Get the clicked button and its associated textarea
        const buttonClicked = event.currentTarget;
        const textarea = buttonClicked.previousElementSibling; // Get the textarea before the button
        const userMessage = textarea.value.trim();
    
        // Check if the textarea is empty
        if (!userMessage) return;
    
        // Display the user's message in a new text area aligned to the left (above input)
        createTextArea(userMessage);
    
        // Send user input to the chatbot API
        fetch(apiEndpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ message: userMessage })
        })
        .then(response => response.json())
        .then(data => {
            console.log("Chatbot response:", data);  // Log the response

            // Display the chatbot response in a new text area aligned to the right
            createTextArea(data.response, true);
    
            // Play the audio response if an audio URL is provided
            if (data.audio_url) {
                const audioUrl = `http://localhost:5000/${data.audio_url}`;
                playAudio(audioUrl);
            }
    
            // Create a new empty textarea and button for the next message
            const newMessageBox = document.createElement('div');
            newMessageBox.classList.add('message-box');
        })
        .catch(error => console.error('Error:', error));
    }
    
    // Initial event listener for the "Kirim" button
    document.getElementById('send-btn').addEventListener('click', sendToChatbot);
});
</script>
