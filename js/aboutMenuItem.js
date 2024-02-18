console.log('greetings, this is aboutMenuItem')

//croxoAboutMenuItem	
document.addEventListener("DOMContentLoaded", (event) => {
  //document.getElementById("croxoAboutMenuItem")
  document.querySelectorAll('.menu-item--about ')
    .forEach(aboutMenuItem => {
      !!aboutMenuItem && (
        (aboutMenuItem.closest('.site-navigation')
          ?.querySelector('.menu-topnav-container .menu')?.appendChild(aboutMenuItem)),
        (!!aboutMenuItem.querySelector('.menu-item--about__title')
          && (root.style.setProperty('--aboutMenuTextHeightNeg',
            `-${aboutMenuItem.querySelector('.menu-item--about__text')
              ?.getBoundingClientRect().height}px`),
            aboutMenuItem.querySelector('.menu-item--about__title')
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
});