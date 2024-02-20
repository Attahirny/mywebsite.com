// Show the loading icon when the page starts loading
window.addEventListener('load', function() {
    const loading = document.getElementById('loading');
    loading.style.display = 'block';
});

// Hide the loading icon when the page has finished loading
window.addEventListener('DOMContentLoaded', function() {
    const loading = document.getElementById('loading');
    loading.style.display = 'none';
});
const socket = io.connect('http://localhost:3000');

socket.on('data', function(data) {

	const print = document.getElementById('print');
	print.innerText = data;
});
