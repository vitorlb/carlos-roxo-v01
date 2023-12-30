console.log('greetings, this is aboutMenuItem')

//croxoAboutMenuItem	
document.addEventListener("DOMContentLoaded", (event) => {
	//document.getElementById("croxoAboutMenuItem")
	console.log("DOM fully loaded and parsed");
	console.log(document.getElementById("croxoAboutMenuItem"));
	let aboutMenuItem = null
	!!document.getElementById("croxoAboutMenuItem")
		&& (aboutMenuItem = document.getElementById("croxoAboutMenuItem"))
	!!aboutMenuItem && (
		(aboutMenuItem.closest('.site-navigation')
			?.querySelector('.menu-topnav-container .menu')?.appendChild(aboutMenuItem)),
		(!!aboutMenuItem.querySelector('.menu-item--about__title')
			&& (aboutMenuItem.querySelector('.menu-item--about__title')
				.addEventListener("mouseenter", () => {
					aboutMenuItem.querySelector('.menu-item--about__text')
						?.classList.remove('croxo-color-transparent', 'croxo-background-transparent--deep--imporant', 'p-events-none--deep');
					aboutMenuItem.querySelector('.menu-item--about__text')
						?.classList.add('border-theme-color--important');
				}),
				aboutMenuItem.addEventListener("mouseleave", () => {
					aboutMenuItem.querySelector('.menu-item--about__text')
						?.classList.add('croxo-color-transparent', 'croxo-background-transparent--deep--imporant', 'p-events-none--deep');
					aboutMenuItem.querySelector('.menu-item--about__text')
						?.classList.remove('border-theme-color--important');
				})
			))
	);
});