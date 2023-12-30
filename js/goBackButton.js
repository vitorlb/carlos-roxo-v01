console.log('this is go back btn');

document.addEventListener("DOMContentLoaded", (event) => {
    document.querySelectorAll('.croxo-go-back-btn').forEach(e => {
        e.addEventListener('click', (event) => {
            event.preventDefault();
            window.history.go(-1); 
        })
    }) 
});