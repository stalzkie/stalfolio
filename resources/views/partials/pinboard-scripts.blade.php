@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        console.log("✅ Pinboard script is running!");

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

        // Handle pin updates
        document.querySelectorAll('.update-pin').forEach(button => {
            console.log("🔵 Update button bound");

            button.addEventListener('click', function () {
                const form = button.closest('form');
                const container = form.closest('.rounded-[15px]');
                const paragraph = container?.querySelector('[contenteditable]');
                const messageInput = form.querySelector('.updated-message');

                if (!paragraph || !messageInput) {
                    alert("Could not find the editable paragraph or input.");
                    return;
                }

                const updatedMessage = paragraph.textContent.trim();
                console.log("✏️ Updated Message:", updatedMessage);

                if (!updatedMessage) {
                    alert("Message cannot be empty.");
                    return;
                }

                messageInput.value = updatedMessage;
                form.submit();
            });
        });

        // Handle add pin form submission
        const pinForm = document.querySelector('#pin-modal form');
        if (pinForm) {
            pinForm.addEventListener('submit', () => {
                modal.classList.add('hidden');
                setTimeout(() => {
                    location.reload();
                }, 500);
            });
        }
    });
</script>
@endpush
