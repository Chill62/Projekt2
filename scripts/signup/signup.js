function selectRole(roleElement) {
    document.querySelectorAll('.social-button').forEach(function(button) {
        button.classList.remove('selected');
    });
    roleElement.classList.add('selected');
}