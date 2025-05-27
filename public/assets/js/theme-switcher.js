// Update theme switcher to work with toggle switch
document.getElementById('darkModeToggle')?.addEventListener('change', function() {
    const newTheme = this.checked ? 'dark' : 'light';
    const themeIcon = document.getElementById('themeIcon');
    
    fetch('/theme/switch', {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (response.ok) {
            // Update UI immediately
            document.body.classList.remove('light-theme', 'dark-theme');
            document.body.classList.add(`${newTheme}-theme`);
            
            // Update navbar class
            document.querySelector('.navbar').classList.remove('navbar-light', 'navbar-dark');
            document.querySelector('.navbar').classList.add(`navbar-${newTheme}`);
            
            // Update icon
            themeIcon.classList.remove('fa-sun', 'fa-moon');
            themeIcon.classList.add(newTheme === 'dark' ? 'fa-sun' : 'fa-moon');
            
            // Update theme stylesheet
            const themeLink = document.querySelector('link[href*="light.css"], link[href*="dark.css"]');
            themeLink.href = themeLink.href.replace(
                newTheme === 'dark' ? 'light' : 'dark', 
                newTheme
            );
        }
    })
    .catch(error => console.error('Error:', error));
});