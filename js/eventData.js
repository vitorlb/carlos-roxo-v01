console.log('Greetings, this is eventData');
if (!!document.querySelector('#croxoEventForm')) {
    let croxoEventForm = document.querySelector('#croxoEventForm');
    let contactFormCtas = document.querySelectorAll('.croxo-galinheiro--main-wrapper .croxo-events-list-item .disco_title__actions-container__apply-link');
    let eventDetailCta = document.querySelector('.croxo-custom-post-type .ctp-header-wrapper__calendar-wrapper .ctp-header-wrapper__calendar-wrapper__apply-link');
    let aboutMenuItem = document.querySelectorAll('.menu-item--about');
    let contactTypeButtons = document.querySelectorAll('.croxo-contact-form__contact-types button');
    let contactInputMail = document.querySelector('.croxo-contact-form__contact-input-wrapper.email');
    let contactInputPhone = document.querySelector('.croxo-contact-form__contact-input-wrapper.phone');
    const stickyHeader = croxoEventForm.closest('.croxo-body-wrapper').querySelector('.site-navigation--scroll');
    const footer = croxoEventForm.closest('.croxo-body-wrapper').querySelector('footer');
    contactFormCtas.forEach(contactFormCta => {
        contactFormCta.addEventListener('click', () => {
            if (!!contactFormCta.closest(".croxo-galinheiro--main-wrapper--home")) {
                let appliedEvent = contactFormCta.closest(".disco_title__text-container")?.querySelector('.disco_title__paragraph span')?.innerHTML;
                let eventLink = contactFormCta.closest(".disco_title__text-container")?.querySelector('.disco_title__actions-container__post-link')?.href;
                !!appliedEvent && (document.cookie = `applied_event=${appliedEvent}`); 
                !!eventLink && (document.cookie = `event_link=${eventLink}`); 
            }
            croxoEventForm.classList.toggle('d-none');
            aboutMenuItem.forEach(e => {
                !e.classList.contains('menu-item--about--disabled')
                    && e.classList.add('menu-item--about--disabled');
            });
            [stickyHeader, footer].forEach(e => {
                !e.classList.contains('transparent--important') && e.classList.add('transparent--important');
            })
        });
    });

    croxoEventForm.querySelector('.croxo-contact-form__close-btn span').addEventListener('click', () => {
        aboutMenuItem.forEach(e => {
            e.classList.remove('menu-item--about--disabled');
        });
        [stickyHeader, footer].forEach(e => {
            e.classList.remove('transparent--important');
        });
    });

    contactTypeButtons.forEach(e => {
        e.addEventListener('click', (event) => {
            event.preventDefault();
            e.classList.contains('contact-types--inactive')
                && (
                    e.classList.remove('contact-types--inactive'),
                    e.classList.contains('contact-types--phone')
                        ? (
                            croxoEventForm.querySelector('.contact-types--mail').classList.add('contact-types--inactive'),
                            contactInputMail.classList.add('d-none'),
                            contactInputPhone.classList.remove('d-none'))
                        : (
                            croxoEventForm.querySelector('.contact-types--phone').classList.add('contact-types--inactive'),
                            contactInputPhone.classList.add('d-none'),
                            contactInputMail.classList.remove('d-none'))
                )
        })
    });

    if (!!eventDetailCta) {
        eventDetailCta.addEventListener('click', () => {
            croxoEventForm.classList.toggle('d-none');
            aboutMenuItem.forEach(e => {
                !e.classList.contains('menu-item--about--disabled')
                    && e.classList.add('menu-item--about--disabled');
            });
        });
    }
}
