
console.log('greeting, this is header size');
window.addEventListener("load", (event) => {
	let logoSpan = document.querySelector('.croxo-iconstitulo_site_2');
	!logoSpan && (logoSpan = document.querySelector('.croxo-iconsgalinhierocriativo-title'));
	if (window.innerWidth < 768 && !!logoSpan) {
		let logoContainer = logoSpan?.closest('.site-title');
		let logoSpanWidth = logoSpan.clientWidth;
		let logoContainerWidth = logoContainer.clientWidth;
		let currentFontSize = parseInt(window.getComputedStyle(logoSpan, null).getPropertyValue('font-size'));
			const matchSize = Math.round((logoContainerWidth / logoSpanWidth) * currentFontSize);
			logoSpan.style.fontSize = `${matchSize}px`;
			setTimeout(() => {
				logoSpan.classList.remove('transparent')
			}, 350);
	} else {
		logoSpan.classList.remove('transparent')
	}
});