@props(['message', 'type'])

<div id="alertMessage" class="alert alert-{{ $type }}"
    style="position: fixed; top: 10px; right: 10px; z-index: 1000; width: 300px; background-color: {{ $type == 'success' ? '#28a745' : '#dc3545' }}; color: white; padding: 15px; border-radius: 5px;">
    {{ $message }}
</div>

<script>
    setTimeout(function() {
        const alertMessage = document.getElementById('alertMessage');
        if (alertMessage) {
            alertMessage.style.display = 'none';
        }
    }, 6000);
</script>
