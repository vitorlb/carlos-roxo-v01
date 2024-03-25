console.log('greetings, this is scrollNav')

//croxoAboutMenuItem	
document.addEventListener("DOMContentLoaded", (event) => {
	const siteWrapper = document.querySelector('.croxo-body-wrapper'); 
	const topNavScroll = document.querySelector('.site-navigation--scroll');
	let topNav = document.querySelector('.site-navigation');
	(!!topNav.getBoundingClientRect().height > 0)
		&& (
			topNav = topNav.getBoundingClientRect().bottom,
			siteWrapper.addEventListener("scroll", () => {
				let currentScrollPosit = siteWrapper.querySelector('#site-header').getBoundingClientRect().top;
				(currentScrollPosit < -topNav)
					? (!topNavScroll.classList.contains('site-navigation--scroll--show')
						&& topNavScroll.classList.add('site-navigation--scroll--show'))
					: topNavScroll.classList.remove('site-navigation--scroll--show')
			})
		)
});