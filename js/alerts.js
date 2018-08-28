let alerts = document.querySelectorAll('.alert');

for(let i = 0; i < alerts.length; i++) {
    
    setTimeout(() => {
        alerts[i].remove();
    }, 3000);
}