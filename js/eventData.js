console.log('Greetings, this is eventData');
if (!!document.querySelector('#croxoEventForm')) {
    let croxoEventForm = document.querySelector('#croxoEventForm');
    let contactFormCtas = document.querySelectorAll('.croxo-galinheiro--main-wrapper .croxo-events-list-item .disco_title__actions-container__apply-link');
    let eventDetailCta = document.querySelector('.croxo-custom-post-type .ctp-header-wrapper__calendar-wrapper .ctp-header-wrapper__calendar-wrapper__apply-link');
    let aboutMenuItem = document.querySelectorAll('.menu-item--about');
    let contactTypeButtons = document.querySelectorAll('.croxo-contact-form__contact-types button');
    let contactInputMail = document.querySelector('.croxo-contact-form__contact-input-wrapper.email');
    let contactInputPhone = document.querySelector('.croxo-contact-form__contact-input-wrapper.phone');

    contactFormCtas.forEach(contactFormCta => {
        contactFormCta.addEventListener('click', () => {
            let itemTitle = contactFormCta.closest('.croxo-events-list-item').querySelector('.disco_title__paragraph span').innerHTML;
            let itemUrl = contactFormCta.closest('.croxo-events-list-item').querySelector('.disco_title__paragraph a').href;
            !!itemTitle && croxoEventForm.querySelector('.invisible-input--page-title input').setAttribute('value', itemTitle);
            !!itemUrl && croxoEventForm.querySelector('.invisible-input--page-link input').setAttribute('value', itemUrl);

            croxoEventForm.classList.toggle('d-none');
            aboutMenuItem.forEach(e => {
                !e.classList.contains('menu-item--about--disabled')
                    && e.classList.add('menu-item--about--disabled');
            });
        });
    });

    croxoEventForm.querySelector('.croxo-contact-form__close-btn span').addEventListener('click', () => {
        croxoEventForm.classList.toggle('d-none');
        aboutMenuItem.forEach(e => {
            e.classList.remove('menu-item--about--disabled');
        });
    });

    contactTypeButtons.forEach(e => {
        e.addEventListener('click', () => {
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
            let itemTitle = eventDetailCta.closest('.croxo-custom-post-type').querySelector('.ctp-header-wrapper__text-info-wrapper .entry-title').innerHTML;
            let itemUrl = window.location.href;
            !!itemTitle && croxoEventForm.querySelector('.invisible-input--page-title input').setAttribute('value', itemTitle);
            !!itemUrl && croxoEventForm.querySelector('.invisible-input--page-link input').setAttribute('value', itemUrl);

            croxoEventForm.classList.toggle('d-none');
            aboutMenuItem.forEach(e => {
                !e.classList.contains('menu-item--about--disabled')
                    && e.classList.add('menu-item--about--disabled');
            });
        });
    }
}

//.croxo-custom-post-type .ctp-header-wrapper__calendar-wrapper .ctp-header-wrapper__calendar-wrapper__apply-link

//contactInput