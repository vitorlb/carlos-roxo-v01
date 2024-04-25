
console.log('greetings, this is window height');
document.addEventListener("DOMContentLoaded", (event) => {
	root.style.setProperty('--window-height', `${window.innerHeight}px`);
	window.addEventListener("resize", () => {
		console.log('resizing');
		root.style.setProperty('--window-height', `${window.innerHeight}px`);
	});
}); 