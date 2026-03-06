<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Epitome</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('user.layouts.header-links')
    @stack('style-link')
    @stack('style')
    @yield('style')

</head>

<body id="top">

    <div id="preloader">
        <div id="loader"></div>
    </div>

    <!-- site header
================================================== -->
    @include('user.layouts.header')
    <!-- end s-header -->


    <!-- intro
================================================== -->
    <section id="intro" class="s-intro target-section">

        <div class="row intro-content">

            <div class="column large-9 mob-full intro-text">
                <h3 id="about-title"></h3>
                <h1 id="about-subtitle">

                </h1>
            </div>

            <div class="intro-scroll">
                <a href="#about" class="intro-scroll-link smoothscroll">
                    Scroll For More
                </a>
            </div>

            <div class="intro-grid"></div>
            <div class="intro-pic" id="about-image"></div>

        </div> <!-- end row -->

    </section> <!-- end intro -->


    <!-- about
================================================== -->
    <section id="about" class="s-about target-section">

        <div class="about-me">

            <div class="row heading-block" data-aos="fade-up">
                <div class="column large-full">
                    <h2 class="section-heading">About Me</h2>
                </div>
            </div>

            <div class="row about-me__content" data-aos="fade-up">
                <div class="column large-full about-me__text">

                    <!-- First paragraph -->
                    <p class="lead" id="about-lead"></p>

                    <!-- Two column layout -->
                    <div class="row">
                        <div class="column large-6 tab-full" id="about-left"></div>
                        <div class="column large-6 tab-full" id="about-right"></div>
                    </div>

                </div>
            </div>

            <div class="row about-me__buttons">
                <div class="column large-4 tab-full" data-aos="fade-up">
                    <a href="{{route('user.contact')}}" class="btn btn--stroke full-width">Hire Me</a>
                </div>
                <div class="column large-4 tab-full" data-aos="fade-up">
                    <a href="{{route('user.about')}}" class="btn btn--stroke full-width">Learn More</a>
                </div>
                <div class="column large-4 tab-full" data-aos="fade-up">
                    <a href="javascript:void(0);" id="downloadResumeBtn" class="btn btn--primary full-width">
                        Download CV
                    </a>
                </div>
            </div>

        </div> <!-- end about-me -->

        <div class="about-experience">

            <div class="row heading-block" data-aos="fade-up">
                <div class="column large-full">
                    <h2 class="section-heading">Work & Education</h2>
                </div>
            </div>

            <div class="row about-experience__timeline">

                <div class="column large-half tab-full" data-aos="fade-up">
                    <div class="timeline">

                        <div class="timeline__icon-wrap">
                            <span class="timeline__icon timeline__icon--work"></span>
                        </div>

                        <div class="timeline__block">
                            <div class="timeline__bullet"></div>
                            <div class="timeline__header">
                                <p class="timeline__timeframe">July 2018 - Present</p>
                                <h3 class="item-title">Awesome Studio</h3>
                                <h5>Lead Designer</h5>
                            </div>
                            <div class="timeline__desc">
                                <p>Lorem ipsum Occaecat do esse ex et dolor culpa nisi ex in magna consectetur nisi
                                    cupidatat laboris esse eiusmod deserunt aute do quis velit esse sed Ut proident
                                    cupidatat nulla esse cillum laborum occaecat nostrud sit dolor incididunt amet est
                                    occaecat nisi.</p>
                            </div>
                        </div>

                        <div class="timeline__block">
                            <div class="timeline__bullet"></div>
                            <div class="timeline__header">
                                <p class="timeline__timeframe">July 2017 - June 2018</p>
                                <h3 class="item-title">Super Cool Agency</h3>
                                <h5>Frontend Developer</h5>
                            </div>
                            <div class="timeline__desc">
                                <p>Lorem ipsum Occaecat do esse ex et dolor culpa nisi ex in magna consectetur nisi
                                    cupidatat laboris esse eiusmod deserunt aute do quis velit esse sed Ut proident
                                    cupidatat nulla esse cillum laborum occaecat nostrud sit dolor incididunt amet est
                                    occaecat nisi.</p>
                            </div>
                        </div>

                        <div class="timeline__block">
                            <div class="timeline__bullet"></div>
                            <div class="timeline__header">
                                <p class="timeline__timeframe">March 2016 - June 2017</p>
                                <h3 class="item-title">Epic Design Studio</h3>
                                <h5>Frontend Developer</h5>
                            </div>
                            <div class="timeline__desc">
                                <p>Lorem ipsum Occaecat do esse ex et dolor culpa nisi ex in magna consectetur nisi
                                    cupidatat laboris esse eiusmod deserunt aute do quis velit esse sed Ut proident
                                    cupidatat nulla esse cillum laborum occaecat nostrud sit dolor incididunt amet est
                                    occaecat nisi.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="column large-half tab-full" data-aos="fade-up">
                    <div class="timeline">

                        <div class="timeline__icon-wrap">
                            <span class="timeline__icon timeline__icon--education"></span>
                        </div>

                        <div class="timeline__block">
                            <div class="timeline__bullet"></div>
                            <div class="timeline__header">
                                <p class="timeline__timeframe">July 2011 - June 2015</p>
                                <h3 class="item-title">University of Life</h3>
                                <h5>Master Degree</h5>
                            </div>
                            <div class="timeline__desc">
                                <p>Lorem ipsum Occaecat do esse ex et dolor culpa nisi ex in magna consectetur nisi
                                    cupidatat laboris esse eiusmod deserunt aute do quis velit esse sed Ut proident
                                    cupidatat nulla esse cillum laborum occaecat nostrud sit dolor incididunt amet est
                                    occaecat nisi.</p>
                            </div>
                        </div>

                        <div class="timeline__block">
                            <div class="timeline__bullet"></div>
                            <div class="timeline__header">
                                <p class="timeline__timeframe">July 2009 - June 2011</p>
                                <h3 class="item-title">State Design University</h3>
                                <h5>Bachelor Degree</h5>
                            </div>
                            <div class="timeline__desc">
                                <p>Lorem ipsum Occaecat do esse ex et dolor culpa nisi ex in magna consectetur nisi
                                    cupidatat laboris esse eiusmod deserunt aute do quis velit esse sed Ut proident
                                    cupidatat nulla esse cillum laborum occaecat nostrud sit dolor incididunt amet est
                                    occaecat nisi.</p>
                            </div>
                        </div>

                        <div class="timeline__block">
                            <div class="timeline__bullet"></div>
                            <div class="timeline__header">
                                <p class="timeline__timeframe">July 2005 - June 2009</p>
                                <h3 class="item-title">School of Hard Knocks</h3>
                                <h5>Bachelor Degree</h5>
                            </div>
                            <div class="timeline__desc">
                                <p>Lorem ipsum Occaecat do esse ex et dolor culpa nisi ex in magna consectetur nisi
                                    cupidatat laboris esse eiusmod deserunt aute do quis velit esse sed Ut proident
                                    cupidatat nulla esse cillum laborum occaecat nostrud sit dolor incididunt amet est
                                    occaecat nisi.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div> <!-- end about-experience -->

    </section> <!-- end s-about -->


    <!-- services
================================================== -->
    <section id="services" class="s-services ss-dark target-section">

        <div class="shadow-overlay"></div>

        <div class="row heading-block heading-block--center" data-aos="fade-up">
            <div class="column large-full">
                <h2 class="section-heading section-heading--centerbottom">Capabilities</h2>

                <p class="section-desc">
                    My passion and goal is to help you make your business standout.
                </p>
            </div>
        </div> <!-- end heading-block -->

        <div class="row services-list block-large-1-3 block-medium-1-2 block-tab-full" id="services-container">
        </div> <!-- end services-list -->

        <div class="row" data-aos="fade-up" style="text-align: center; margin-top: 6rem;">
            <div class="column large-full">
                <a href="{{ route('user.services') }}" class="btn btn--stroke">View All Services</a>
            </div>
        </div>

    </section> <!-- end s-services -->


    <!-- CTA
================================================== -->
    <section class="s-cta ss-dark">

        <div class="row heading-block heading-block--center" data-aos="fade-up">
            <div class="column large-full">
                <h2 class="section-desc">
                    Need a great reliable web hosting?
                </h2>
            </div>
        </div> <!-- end heading-block -->

        <div class="row cta-content" data-aos="fade-up">
            <div class="column large-full">
                <p>
                    We highly recommend <a href="https://www.dreamhost.com/r.cgi?287326">DreamHost</a>.
                    Powerful web and Wordpress hosting. Guaranteed.
                    Starting at $2.95 per month.
                </p>

                <a href="https://www.dreamhost.com/r.cgi?287326" class="btn full-width">Get Started</a>
            </div>
        </div> <!-- end ad-content -->

    </section> <!-- end s-cta -->


    <!-- works
================================================== -->
    <section id="works" class="s-works target-section">

        <div class="row heading-block heading-block--center" data-aos="fade-up">
            <div class="column large-full">
                <h2 class="section-heading section-heading--centerbottom">Selected Works</h2>
                <p class="section-desc">
                    Here are some of my selected works I have done lately. Feel free to
                    check them out.
                </p>
            </div>
        </div> <!-- end heading-block -->

        <div class="masonry-wrap">

            <div class="masonry">
                <div class="grid-sizer"></div>

                <div class="masonry__brick" data-aos="fade-up">
                    <div class="item-folio">
                        <div class="item-folio__thumb">
                            <a href="{{ asset('assets/user/images/portfolio/gallery/g-city-building.jpg') }}"
                                class="thumb-link" title="Shutterbug" data-size="1050x700">
                                <img src="{{ asset('assets/user/images/portfolio/city-building.jpg') }}"
                                    srcset="{{ asset('assets/user/images/portfolio/city-building.jpg') }} 1x, {{ asset('assets/user/images/portfolio/city-building@2x.jpg') }} 2x"
                                    alt="">
                            </a>
                            <a href="https://www.behance.net/" class="item-folio__project-link" title="Project link"
                                target="_blank"></a>
                        </div>

                        <div class="item-folio__text">
                            <h4 class="item-folio__title">
                                City Building
                            </h4>
                            <p class="item-folio__cat">
                                Branding
                            </p>
                        </div>

                        <div class="item-folio__caption">
                            <p>Vero molestiae sed aut natus excepturi. Et tempora numquam. Temporibus iusto quo.Unde
                                dolorem corrupti neque nisi.</p>
                        </div>
                    </div>
                </div> <!-- end masonry__brick -->


            </div> <!-- end masonry -->

        </div> <!-- end masonry-wrap -->

        {{-- <div class="row" data-aos="fade-up" style="text-align: center; margin-top: 6rem;">
            <div class="column large-full">
                <a href="{{ route('user.works') }}" class="btn btn--stroke">View All Works</a>
            </div>
        </div> --}}

    </section> <!-- end s-work -->


    <!-- testimonies
================================================== -->
    {{-- <section class="s-testimonials">

        <div class="row testimonials" data-aos="fade-up">

            <div class="column large-full testimonials__slider" id="testimonial-container">
            </div> <!-- end testimonials__slider -->

        </div> <!-- end testimonials -->

    </section> <!-- end s-testimonials --> --}}


    <!-- contact
================================================== -->
    <section id="contact" class="s-contact ss-dark target-section">

        <div class="row heading-block" data-aos="fade-up">
            <div class="column large-full">
                <h2 class="section-heading">Get In Touch</h2>
            </div>
        </div>

        <div class="row contact-main" data-aos="fade-up">
            <div class="column large-full">
                <p class="contact-email">
                    <a href="mailto:#0">hello@epitome.com</a>
                </p>

                <p class="section-desc">
                    I'm happy to connect, listen and help. Let's work together and build
                    something awesome. Let's turn your idea to an even greater product.
                    <a href="mailto:#0">Email Me</a>.
                </p>
            </div>
        </div>

        <div class="row contact-infos" data-aos="fade-up" data-aos-anchor=".contact-main">

            <div class="column large-5 medium-full contact-phone">
                <h4>Call Me</h4>
                <a href="tel:197-543-2345">+197 543 2345</a>
            </div>

            <div class="column large-7 medium-full contact-social">
                <h4>Social</h4>
                <ul>
                    <li><a href="#0" title="Facebook">Facebook</a></li>
                    <li><a href="#0" title="Twitter">Twitter</a></li>
                    <li><a href="#0" title="Instagram">Instagram</a></li>
                </ul>
            </div>

        </div> <!-- end contact-infos -->

    </section> <!-- end s-contact -->


    <!-- footer
================================================== -->
    @include('user.layouts.footer')

    <!-- photoswipe background
================================================== -->
    <div aria-hidden="true" class="pswp" role="dialog" tabindex="-1">

        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">

            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div><button class="pswp__button pswp__button--close"
                        title="Close (Esc)"></button> <button class="pswp__button pswp__button--share"
                        title="Share"></button> <button class="pswp__button pswp__button--fs"
                        title="Toggle fullscreen"></button> <button class="pswp__button pswp__button--zoom"
                        title="Zoom in/out"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>

        </div>

    </div><!-- end photoSwipe background -->

    @include('user.layouts.footer-links')
    <script>
        $(document).ready(function () {

            $.ajax({
                url: "/about-data",
                type: "GET",
                success: function (response) {

                    if (response.status && response.data.description) {

                        let description = response.data.description;

                        // split complete description into two line breaks
                        let paragraphs = description.split("\n\n");

                        $("#about-lead").text(paragraphs[0]);
                        // Remove first paragraph
                        paragraphs.shift();

                        console.log(paragraphs);
                        let half = Math.ceil(paragraphs.length / 2);

                        let leftSide = paragraphs.slice(0, half);
                        let rightSide = paragraphs.slice(half);
                        let leftHtml = "";
                        let rightHtml = "";

                        leftSide.forEach(function (para) {
                            leftHtml += `<p>${para}</p>`;
                        });

                        rightSide.forEach(function (para) {
                            rightHtml += `<p>${para}</p>`;
                        });
                        $('#about-title').html(response.data.title);
                        $('#about-subtitle').html(response.data.subtitle);
                        $("#about-left").html(leftHtml);
                        $("#about-right").html(rightHtml);
                        $("#about-image").css(
                "background-image",
    "url(/storage/" + response.data.profile_image + ")"
);
                    }

                }
            });

            $('#downloadResumeBtn').click(function (e) {
                e.preventDefault();

                $.ajax({
                    url: "/download-resume",
                    type: "GET",
                    xhrFields: {
                        responseType: 'blob'
                    },

                    success: function (data, status, xhr) {

                        // Create blob
                        let blob = new Blob([data], { type: 'application/pdf' });

                        // Create temporary link
                        let link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = "resume.pdf";

                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    },

                    error: function () {
                        alert('PDF not found');
                    }
                });
            });

            $.ajax({
                url: "{{ route('testimonials.data') }}",
                method: "GET",
                success: function (response) {

                    if (response.status && response.data.length > 0) {
                        let html = "";

                        response.data.forEach(function (testimonial) {
                            html += `
                             <div class="testimonials__slide">
                                <p>${testimonial.message}</p>
                                <div class="testimonials__info">
                                    <img src="/storage/testimonials/${testimonial.client_image}" 
                                    class="testimonials__avatar">
                                <cite class="testimonials__cite">
                                <strong>${testimonial.client_name}</strong>
                                <span>${testimonial.designation ?? ''}</span>
                                </cite>
                            </div>
                        </div>
                        `;
                        });

                        $('#testimonial-container').html(html);

                        if ($('.testimonials__slider').hasClass('slick-initialized')) {
                            $('.testimonials__slider').slick('unslick');
                        }

                        $('.testimonials__slider').slick({
                            dots: true,
                            arrows: false,
                            autoplay: true,
                            autoplaySpeed: 3000
                        });
                    }
                }
            });

            $.ajax({
                url: "{{ route('services.data') }}",
                method: "GET",
                success: function (response) {

                    if (response.status && response.data.length > 0) {
                        let html = "";

                        response.data.forEach(function (services) {
                            html += `
                                <div class="column item-service" data-aos="fade-up">
                                    <div class="item-service__content">
                                    <h4 class="item-title">${services.title}</h4>
                                    <p>
                                        ${services.description}
                                    </p>
                                    </div>
                                </div>
                            ` });

                        $('#services-container').html(html);
                    }
                }
            });
        });
    </script>
</body>

</html>