document.querySelectorAll('.language-switcher').forEach(button => {
    button.addEventListener('click', function() {
        const newLocale = this.getAttribute('data-locale');
        
        fetch(`/language/${newLocale}`, {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => {
            if (response.ok) {
                window.location.reload();
            } else {
                console.error('Language switch failed');
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});