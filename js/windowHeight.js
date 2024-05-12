
console.log('greetings, this is window height');
document.addEventListener("DOMContentLoaded", (event) => {
	root.style.setProperty('--window-height', `${window.innerHeight}px`);
	window.addEventListener("resize", () => {
		root.style.setProperty('--window-height', `${window.innerHeight}px`);
	});
}); 