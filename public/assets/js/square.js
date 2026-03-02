  new Swiper(".testimonials-slider", {
    slidesPerView: 1.1,
    spaceBetween: 20,
    loop: true,
    autoplay: {
      delay: 3000,
    },
    breakpoints: {
      768: {
        slidesPerView: 2.5,
        spaceBetween: 30,
      },
      1024: {
        slidesPerView: 3.5,
        spaceBetween: 40,
      },
    },
  });

    new Swiper(".myExpertsSlider", {
    slidesPerView: 3.5,
    centeredSlides: true,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 3000,
    },
    breakpoints: {
      320: {
        slidesPerView: 1.2,
        centeredSlides: false
      },
      768: {
        slidesPerView: 2.5,
        centeredSlides: true
      },
      1024: {
        slidesPerView: 3.5,
        centeredSlides: true
      }
    }
  });

  document.querySelectorAll('.faq-question').forEach(button => {
    button.addEventListener('click', () => {
      const item = button.parentElement;
      const allItems = document.querySelectorAll('.faq-item');
      allItems.forEach(faq => {
        if (faq !== item) faq.classList.remove('active');
      });
      item.classList.toggle('active');
    });
  });
