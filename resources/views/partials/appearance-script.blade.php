{{-- Apply the stored appearance before first paint to avoid a flash of the wrong theme. --}}
<script>
    (function () {
        var appearance = localStorage.getItem('appearance') || 'system';
        var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

        if (appearance === 'dark' || (appearance === 'system' && prefersDark)) {
            document.documentElement.classList.add('dark');
        }
    })();
</script>
