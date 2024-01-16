
    const toggleButton = document.getElementById('toggleButton');
    const body = document.querySelector('body');

    toggleButton.addEventListener('click', function () {
        // Toggle between light and dark mode
        body.classList.toggle('dark-mode');
        body.classList.toggle('light-mode');
    });


    