
console.log('so colourfulll');
let root = document.documentElement;
let acidArray = [
	'#cbfd05',
	'#00ff02',
	'#a784f9',
	'#611de9',
	'#ff35ff'
];
let acidColor = '#ff35ff';
//TODO: avoid repeated colors using while 
document.addEventListener("DOMContentLoaded", (event) => {
	root.style.setProperty('--acid-color', `${acidColor}`);
	document.querySelectorAll('.listen-theme-color').forEach(e => {
		e.addEventListener('mouseenter', (event) => {
			let randomize = acidArray[Math.floor(Math.random() * acidArray.length)];
			do {
				randomize = acidArray[Math.floor(Math.random() * acidArray.length)];
			}
			while (randomize == acidColor);
			acidColor = randomize;
			root.style.setProperty('--acid-color', `${acidColor}`);
			console.log('enter', acidColor);
		});
	});
}); 