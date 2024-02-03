
console.log('so colourfulll');
let root = document.documentElement;
let acidArray = [
	'#fc85ff',
	'#d10000',
	'#333333',
	'#f9d500',
	'#2edb63',
	'#cbfd05',
	'#a784f9',
	'#611de9'
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