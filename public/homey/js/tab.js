document.getElementById('toggleButton1').addEventListener('click', function() {
    toggleVisibility('myDiv');
});

document.getElementById('toggleButton2').addEventListener('click', function() {
    toggleVisibility('myDiv1');
});

function toggleVisibility(elementId) {
    const element = document.getElementById(elementId);
     element.classList.toggle('hidden');
    element.classList.toggle('visible');
   
}


