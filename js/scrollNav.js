console.log('greetings, this is scrollNav')

//croxoAboutMenuItem	
document.addEventListener("DOMContentLoaded", (event) => {
	let topNav = document.querySelector('.site-navigation');
	const topNavScroll = document.querySelector('.site-navigation--scroll');
	(!!topNav.getBoundingClientRect().height > 0)
		&& (
			topNav = topNav.getBoundingClientRect().bottom,
			document.addEventListener("scroll", () => {
				(window.scrollY > topNav)
					? (!topNavScroll.classList.contains('site-navigation--scroll--show')
							&& topNavScroll.classList.add('site-navigation--scroll--show'))
					: topNavScroll.classList.remove('site-navigation--scroll--show')
			})
		)
});