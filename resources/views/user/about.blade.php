<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>About Me - Epitome</title>
    <meta name="description" content="Learn more about my professional journey, skills, and experience.">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('user.layouts.header-links')

    <style>
        .s-about-page {
            padding-top: 20rem;
            padding-bottom: 12rem;
            background: radial-gradient(circle at 0% 0%, #1a1a1a 0%, #050505 100%);
            color: rgba(255, 255, 255, 0.6);
            position: relative;
            overflow: hidden;
        }

        .about-hero {
            margin-bottom: 10rem;
            text-align: center;
        }

        .about-hero h1 {
            color: #ffffff;
            font-family: "Frank Ruhl Libre", serif;
            font-size: clamp(4.8rem, 8vw, 10rem);
            line-height: 1.1;
            margin-top: 0;
            margin-bottom: 2.4rem;
            letter-spacing: -0.02em;
            text-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .about-hero .subheading {
            font-family: "Roboto", sans-serif;
            font-weight: 600;
            font-size: 1.4rem;
            text-transform: uppercase;
            letter-spacing: .5rem;
            color: #cf1767;
            margin-bottom: 2rem;
            display: block;
        }

        .about-content-wrap {
            font-size: 1.8rem;
            line-height: 2;
            max-width: 1200px;
            margin: 0 auto;
        }

        .about-content-wrap p.lead {
            font-family: "Lora", serif;
            font-size: clamp(2.2rem, 3vw, 3rem);
            line-height: 1.6;
            color: #ffffff;
            margin-bottom: 8rem;
            text-align: center;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.9;
        }

        .timeline-section {
            background-color: #050505;
            padding-top: 15rem;
            padding-bottom: 15rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .section-header-inner {
            margin-bottom: 10rem;
        }

        .section-header-inner h2 {
            font-family: "Frank Ruhl Libre", serif;
            color: #ffffff;
            font-size: 5.4rem;
            margin-bottom: 0;
            position: relative;
            padding-bottom: 3rem;
            letter-spacing: -0.01em;
        }

        .section-header-inner h2::after {
            content: "";
            display: block;
            height: 4px;
            width: 100px;
            background: linear-gradient(90deg, #cf1767, transparent);
            position: absolute;
            bottom: 0;
            left: 0;
        }

        /* Timeline Overrides for Dark mode */
        .timeline::before {
            background-color: rgba(207, 23, 103, 0.2) !important;
            width: 2px !important;
        }

        .timeline__icon-wrap {
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            background-color: #0c0c0c !important;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .timeline__icon {
            filter: invert(1) brightness(2);
        }

        .timeline__bullet {
            background-color: #cf1767 !important;
            box-shadow: 0 0 15px rgba(207, 23, 103, 0.6);
        }

        .timeline__block {
            background: rgba(255, 255, 255, 0.02);
            padding: 4rem !important;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            margin-bottom: 4rem;
            backdrop-filter: blur(10px);
            transition: all 0.4s ease;
        }

        .timeline__block:hover {
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(207, 23, 103, 0.3);
            transform: translateX(10px);
        }

        .timeline__header h3.item-title {
            color: #ffffff !important;
            font-size: 2.8rem;
            margin-bottom: 1rem;
            font-family: "Frank Ruhl Libre", serif;
        }

        .timeline__header h5 {
            color: #ffffff !important;
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            letter-spacing: 0.2rem;
            font-size: 1.3rem;
            margin-bottom: 2rem;
            font-weight: 700;
        }

        .timeline__timeframe {
            color: rgba(255, 255, 255, 0.4) !important;
            font-size: 1.3rem;
            margin-bottom: 0.5rem !important;
            font-weight: 500;
        }

        .btn-container {
            margin-top: 10rem;
            text-align: center;
        }

        .btn--primary {
            background: linear-gradient(135deg, #cf1767 0%, #ff3b8e 100%);
            border: none;
            box-shadow: 0 10px 30px rgba(207, 23, 103, 0.3);
            border-radius: 5px;
            padding: 2rem 4rem;
            transition: all 0.3s ease;
        }

        .btn--primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(207, 23, 103, 0.5);
        }

        /* Header backdrop */
        .s-header {
            background-color: rgba(5, 5, 5, 0.9) !important;
            backdrop-filter: blur(20px);
        }

        .timeline__desc {
            color: white;
        }

        /* Responsive */
        @media screen and (max-width: 800px) {
            .s-about-page {
                padding-top: 15rem;
            }

            .timeline__block {
                padding: 3rem !important;
                margin-left: 2rem;
            }

            .timeline__block:hover {
                transform: none;
            }
        }
    </style>
</head>

<body id="top">

    <div id="preloader">
        <div id="loader"></div>
    </div>

    <!-- site header
    ================================================== -->
    @include('user.layouts.header')

    <!-- about page content
    ================================================== -->
    <main class="s-about-page">

        <div class="row about-hero" data-aos="fade-up">
            <div class="column large-full">
                <span class="subheading">Professional Profile</span>
                <h1 id="about-display-title">About Me</h1>
            </div>
        </div>

        <div class="row about-content-wrap">
            <div class="column large-full" data-aos="fade-up">
                <!-- Main Intro -->
                <p class="lead" id="about-lead-text">
                    <!-- Loaded via AJAX -->
                </p>

                <!-- Detailed Bio -->
                <div class="row">
                    <div class="column large-6 tab-full" id="about-detail-left">
                        <!-- Loaded via AJAX -->
                    </div>
                    <div class="column large-6 tab-full" id="about-detail-right">
                        <!-- Loaded via AJAX -->
                    </div>
                </div>

                <div class="btn-container" data-aos="fade-up">
                    <a href="javascript:void(0);" id="aboutDownloadBtn" class="btn btn--primary">
                        Download My CV
                    </a>
                </div>
            </div>
        </div>

    </main>

    <!-- experience & education
    ================================================== -->
    <section class="timeline-section">

        <div class="row section-header-inner" data-aos="fade-up">
            <div class="column large-full">
                <h2>Work & Education</h2>
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
                            <p>Directing creative strategy and visual identity for diverse client projects. Specializing
                                in crafting high-impact digital experiences that blend aesthetic beauty with functional
                                excellence. Leading a team of talented designers to deliver award-winning products.</p>
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
                            <p>Developed responsive and interactive user interfaces using modern web technologies.
                                Collaborated closely with designers to translate complex mockups into pixel-perfect,
                                performant code.</p>
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
                            <p>Advanced studies in Design Thinking and User Experience Research. Focused on the
                                intersection of human psychology and digital interfaces, developing a deep understanding
                                of user behavior and interaction patterns.</p>
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
                            <p>Foundation in Visual Communication and Graphic Design. Mastered the principles of
                                typography, color theory, and layout, while gaining hands-on experience with
                                industry-standard design tools.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <!-- footer
    ================================================== -->
    @include('user.layouts.footer')
    @include('user.layouts.footer-links')

    <script>
        $(document).ready(function () {
            // Fetch About Data
            $.ajax({
                url: "{{ route('about.data') }}",
                type: "GET",
                success: function (response) {
                    if (response.status && response.data.description) {
                        let description = response.data.description;
                        let paragraphs = description.split("\n\n");

                        $("#about-lead-text").text(paragraphs[0]);
                        paragraphs.shift();

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

                        $('#about-display-title').html(response.data.title || "About Me");
                        $("#about-detail-left").html(leftHtml);
                        $("#about-detail-right").html(rightHtml);
                    }
                }
            });

            // Resume Download
            $('#aboutDownloadBtn').click(function (e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('download.resume') }}",
                    type: "GET",
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success: function (data, status, xhr) {
                        let blob = new Blob([data], { type: 'application/pdf' });
                        let link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = "resume.pdf";
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    },
                    error: function () {
                        alert('Resume not found');
                    }
                });
            });
        });
    </script>

</body>

</html>