document.addEventListener("DOMContentLoaded", (domEvent) => {
	console.log('gretings, this is croxoGalleryGalinheiro')
	if (document.querySelector('.croxo-gallery--galinheiro') && window.innerWidth > 768) {
		const slider = document.querySelector(".croxo-gallery--galinheiro");
		let isDown = false;
		let startX;
		let scrollLeft;
		slider.addEventListener("mousedown", e => {
			isDown = true;
			slider.classList.add("active");
			startX = e.pageX - slider.offsetLeft;
			scrollLeft = slider.scrollLeft;
		});
		slider.addEventListener("mouseleave", () => {
			isDown = false;
			slider.classList.remove("active");
		});
		slider.addEventListener("mouseup", () => {
			isDown = false;
			slider.classList.remove("active");
		});
		slider.addEventListener("mousemove", e => {
			if (!isDown) return;
			e.preventDefault();
			e.stopPropagation();
			e.stopImmediatePropagation();
			const x = e.pageX - slider.offsetLeft;
			const walk = x - startX;
			slider.scrollLeft = scrollLeft - walk;
		});
	}
});