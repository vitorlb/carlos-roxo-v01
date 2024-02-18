console.log('Greetings, this is formData');
if (!!document.querySelector('#croxoContactForm')) {
    let fetchedData = null;
    let contactForm = document.querySelector('#croxoContactForm');
    let contactFormCta = document.querySelector('.contact-form-cta');
    let aboutMenuItem = document.querySelectorAll('.menu-item--about');
    let contactTypeButtons = document.querySelectorAll('.croxo-contact-form__contact-types button');
    let contactInputMail = document.querySelector('.croxo-contact-form__contact-input-wrapper.email');
    let contactInputPhone = document.querySelector('.croxo-contact-form__contact-input-wrapper.phone');
    !!(typeof customFormData !== 'undefined')
        && (fetchedData = customFormData);
    !!contactFormCta
        && (contactFormCta.addEventListener('click', () => {
            contactForm.classList.toggle('d-none');
            aboutMenuItem.forEach(e => {
                !e.classList.contains('menu-item--about--disabled')
                    && e.classList.add('menu-item--about--disabled');
            });
        }));
    !!contactForm
        && (
            contactForm.querySelector('.croxo-contact-form__close-btn span').addEventListener('click', () => {
                contactForm.classList.toggle('d-none');
                aboutMenuItem.forEach(e => {
                    e.classList.remove('menu-item--about--disabled');
                });
            })
        );
    (!!contactForm && !!fetchedData)
        && (
            (!!fetchedData) && (contactForm.querySelector('.invisible-input--page-title input').setAttribute('value', customFormData.postTitle)),
            (!!fetchedData) && (contactForm.querySelector('.invisible-input--page-link input').setAttribute('value', customFormData.permalink))
        );
    contactTypeButtons.forEach(e => {
        e.addEventListener('click', () => {
            e.classList.contains('contact-types--inactive')
                && (
                    e.classList.remove('contact-types--inactive'),
                    e.classList.contains('contact-types--phone')
                        ? (
                            contactForm.querySelector('.contact-types--mail').classList.add('contact-types--inactive'),
                            contactInputMail.classList.add('d-none'),
                            contactInputPhone.classList.remove('d-none'))
                        : (
                            contactForm.querySelector('.contact-types--phone').classList.add('contact-types--inactive'),
                            contactInputPhone.classList.add('d-none'),
                            contactInputMail.classList.remove('d-none'))
                )
        })
    })
}

//contactInput