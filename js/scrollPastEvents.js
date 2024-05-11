console.log('greetings, this is scrollPastEvents')

//croxoAboutMenuItem	
document.addEventListener("DOMContentLoaded", (event) => {
	const siteWrapper = document.querySelector('.croxo-body-wrapper'); 
	const pastEventsList = document.querySelector('#croxoEventsPast'); 
	(!!pastEventsList)
		&& ( 
			siteWrapper.addEventListener("scroll", (e) => {
				const watchPastEventsList = document.querySelector('#croxoEventsPast').getBoundingClientRect().top;
				watchPastEventsList < 200 
					? (!siteWrapper.classList.contains('on-past-list') && siteWrapper.classList.add('on-past-list'))
					: (!!siteWrapper.classList.contains('on-past-list') && siteWrapper.classList.remove('on-past-list'))
			})
		)
});