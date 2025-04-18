<script>
    document.addEventListener('livewire:load', function () {
        Livewire.hook('message.sent', () => {
            document.body.classList.add('overflow-hidden');
        });
        Livewire.hook('message.received', () => {
            document.body.classList.remove('overflow-hidden');
        });
    });
</script>
