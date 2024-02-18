console.log('greetings, this is events list')

document.querySelectorAll('.disco_title__actions-container__post-link')
	.forEach(e => {
		e.addEventListener("mouseenter", () => {
			!e.closest('.disco_title__text-container')?.classList.contains('seemore-hovering')
				&& e.closest('.disco_title__text-container')?.classList.add('seemore-hovering');
		})
		e.addEventListener("mouseleave", () => {
			e.closest('.disco_title__text-container')?.classList.remove('seemore-hovering');
		});
	}); 

document.querySelectorAll('.croxo-galinheiro--main-wrapper')
	.forEach(e => {
		let pastEvent = e.querySelector('.croxo-galinheiro--main-wrapper__events-list__past');
		e.querySelector('.croxo-galinheiro--main-wrapper__events-list__future__title-container__slide-to-past')?.addEventListener('click', () => {
			!!pastEvent && pastEvent.scrollIntoView();
		});
	});

document.querySelectorAll('.croxo-galinheiro--main-wrapper .croxo-events-list-item')
	.forEach(e => {
		let mainWrapper = e.closest('.croxo-galinheiro--main-wrapper');
		let imgContainer = mainWrapper.querySelector('.croxo-galinheiro--main-wrapper__img-container__wrapper');
		let imgContainerImg = mainWrapper.querySelector('.croxo-galinheiro--main-wrapper__img-container img');
		e.querySelector('.disco_title__paragraph a').addEventListener('mouseenter', () => {
			if (mainWrapper) {
				if (imgContainer.classList.contains('d-none')) { imgContainerImg.src = e.getAttribute('thumb-path'); }
				if (imgContainer && !!e.getAttribute('thumb-path')) {
					if (imgContainer.classList.contains('d-none')) {
						imgContainer.classList.remove('d-none');
					} else {
						imgContainer.classList.add('anim-popout');
					}
					setTimeout(() => {
						imgContainer.classList.remove('anim-popout');
						if (!imgContainer.classList.contains('d-none')) { imgContainerImg.src = e.getAttribute('thumb-path'); }
						imgContainer.classList.add('anim-popin');
					}, 350);
				}
			}
		})
	});