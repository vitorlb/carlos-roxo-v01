document.addEventListener("DOMContentLoaded", (domEvent) => {
	console.log('gretings, this is croxoGallery')
	const opcaityVAlue = 'opacity-50'

	!!document.querySelector('.croxo-gallery')
		&& document.querySelectorAll('.croxo-gallery').forEach(e => {
			let currentIndex = null;
			const prevBtn = e.querySelector('.croxo-gallery__lightbox__nav-btns__wrapper__btn.prev-btn')
			const nextBtn = e.querySelector('.croxo-gallery__lightbox__nav-btns__wrapper__btn.next-btn')
			const galleryItems = Array.from(e.querySelectorAll('.croxo-gallery__gallery-item'))
			e.querySelectorAll('.croxo-gallery__gallery-item').forEach((el, i) => {
				el.addEventListener('click', (event) => {
					!e.classList.contains('croxo-gallery--img-focused') && e.classList.add('croxo-gallery--img-focused');
					e.querySelector(':scope .croxo-gallery__lightbox__img-placeholder__img').setAttribute('src', `${event.target.getAttribute("src")}`);
					e.querySelector('.croxo-gallery .croxo-gallery__lightbox')?.classList.remove('d-none');
					currentIndex = i;
					currentIndex == 0 && (
						!prevBtn.classList.contains('opacity-50') && prevBtn.classList.add('opacity-50'),
						!!nextBtn.classList.contains('opacity-50') && nextBtn.classList.remove('opacity-50')
					);
					currentIndex == galleryItems.length - 1 && (
						!nextBtn.classList.contains('opacity-50') && nextBtn.classList.add('opacity-50'),
						!!prevBtn.classList.contains('opacity-50') && prevBtn.classList.remove('opacity-50')
						); 
					(currentIndex > 0 && currentIndex  < galleryItems.length - 1) && (
						!!prevBtn.classList.contains('opacity-50') && prevBtn.classList.remove('opacity-50'),
						!!nextBtn.classList.contains('opacity-50') && nextBtn.classList.remove('opacity-50')
					);
				});
			});
			const closeBtn = e.querySelector('.croxo-gallery__lightbox__close-btn__wrapper__btn');
			const lightBox = e.querySelector('.croxo-gallery__lightbox');
			[closeBtn].forEach(el => {
				el.addEventListener('click', (event) => {
					event.preventDefault(); event.stopPropagation(); event.stopImmediatePropagation();
					currentIndex = null
					e.querySelector(':scope .croxo-gallery__lightbox')?.classList.add('d-none');
					e.classList.remove('croxo-gallery--img-focused'); 
				});
			});
			prevBtn.addEventListener('click', (event) => {
				event.preventDefault(); event.stopPropagation(); event.stopImmediatePropagation();
				currentIndex > 0 && (
					e.querySelector(':scope .croxo-gallery__lightbox__img-placeholder__img')
						.setAttribute('src', `${galleryItems[currentIndex - 1].querySelector('img').getAttribute("src")}`),
					currentIndex = currentIndex - 1
				);
				currentIndex == 0
					? !prevBtn.classList.contains('opacity-50') && prevBtn.classList.add('opacity-50')
					: !!prevBtn.classList.contains('opacity-50') && prevBtn.classList.remove('opacity-50');
					currentIndex < galleryItems.length - 1 && !!nextBtn.classList.contains('opacity-50') && nextBtn.classList.remove('opacity-50');
				});
			nextBtn.addEventListener('click', (event) => {
				event.preventDefault(); event.stopPropagation(); event.stopImmediatePropagation();
				currentIndex < galleryItems.length - 1 && (
					e.querySelector(':scope .croxo-gallery__lightbox__img-placeholder__img')
						.setAttribute('src', `${galleryItems[currentIndex + 1].querySelector('img').getAttribute("src")}`),
					currentIndex = currentIndex + 1
				);
				currentIndex == galleryItems.length - 1
					? !nextBtn.classList.contains('opacity-50') && nextBtn.classList.add('opacity-50')
					: !!nextBtn.classList.contains('opacity-50') && nextBtn.classList.remove('opacity-50');
					currentIndex > 0 && !!prevBtn.classList.contains('opacity-50') && prevBtn.classList.remove('opacity-50');
			});
		});
});