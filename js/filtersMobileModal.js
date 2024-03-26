console.log('Evenin! Meh name is Mobile Modal');

document.addEventListener("DOMContentLoaded", (event) => {
	if (window.innerWidth < 768) {
		let filtersWrapper = document.querySelector('.post-type-filter');
		let filtersHost = document.querySelector('.croxo-mobile-filters-modal__wrapper');
		let filtersButton = document.querySelector('.croxo-work-filters__mobile-btns button');
		let closeButton = document.querySelector('.post-type-filter__top-bar__btn-wrapper.top-bar__btn-wrapper--close button');
		(filtersWrapper && filtersHost)
			&& filtersHost.appendChild(filtersWrapper);
		let filtersWrapperHeight = (!!filtersWrapper && filtersWrapper.getBoundingClientRect().height);
		!!filtersWrapperHeight
			&& (root.style.setProperty('--filters-height', `-${filtersWrapperHeight}px`));
		!!filtersHost
			&& (filtersHost.parentElement.classList.remove('transparent'));
		!!filtersButton
			&& (filtersButton.addEventListener('click', () => {
				!filtersHost.classList.contains('transition-all-550')
					&& filtersHost.classList.add('transition-all-550');
				filtersHost.classList.toggle('is-active');
			}));
		!!closeButton
			&& (closeButton.addEventListener('click', () => {
				filtersHost.classList.remove('is-active');
			}));
	}
}); 