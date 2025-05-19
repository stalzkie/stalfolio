<script>
    const modal = document.getElementById('pin-modal');
    const addPinBtn = document.getElementById('add-pin-btn');
    const cancelPin = document.getElementById('cancel-pin');

    // Open modal
    if (addPinBtn) {
        addPinBtn.addEventListener('click', () => modal.classList.remove('hidden'));
    }

    // Close modal
    if (cancelPin) {
        cancelPin.addEventListener('click', () => modal.classList.add('hidden'));
    }

    // Handle pin updates (revised logic)
    document.querySelectorAll('.update-pin').forEach(button => {
        button.addEventListener('click', function () {
            const form = button.closest('form');
            const wrapper = form.closest('div');
            const paragraph = wrapper.querySelector('[contenteditable]');
            const messageInput = form.querySelector('.updated-message');

            if (!paragraph || !messageInput) {
                alert("Could not find the editable paragraph or input.");
                return;
            }

            const updatedMessage = paragraph.textContent.trim();

            if (!updatedMessage) {
                alert("Message cannot be empty.");
                return;
            }

            messageInput.value = updatedMessage;
            form.submit();
        });
    });

    // Handle add pin form submission (force reload after submit)
    const pinForm = document.querySelector('#pin-modal form');
    if (pinForm) {
        pinForm.addEventListener('submit', () => {
            modal.classList.add('hidden'); // Close modal
            setTimeout(() => {
                location.reload(); // Reload the page after a slight delay
            }, 500);
        });
    }
</script>
