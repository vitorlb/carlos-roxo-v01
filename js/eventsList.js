console.log('greetings, this is events list')

document.querySelectorAll('.disco_title__actions-container__post-link')
	.forEach(e => {
		e.addEventListener("mouseenter", () => {
			!e.closest('.disco_title__text-container')?.classList.contains('seemore-hovering')
				&& e.closest('.disco_title__text-container')?.classList.add('seemore-hovering');
		})
		e.addEventListener("mouseleave", () => {
			e.closest('.disco_title__text-container')?.classList.remove('seemore-hovering');
		})
	})