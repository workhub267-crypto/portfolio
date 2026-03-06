<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>My Skills - Epitome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('user.layouts.header-links')

    <style>
        .s-skills-page {
            padding-top: 20rem;
            padding-bottom: 12rem;
            background: radial-gradient(circle at 50% 0%, #1a1a1a 0%, #050505 100%);
            color: rgba(255, 255, 255, 0.6);
            position: relative;
            overflow: hidden;
        }

        /* Abstract Background Decor */
        .s-skills-page::before {
            content: "";
            position: absolute;
            top: -10%;
            left: -10%;
            width: 40%;
            height: 40%;
            background: radial-gradient(circle, rgba(207, 23, 103, 0.05) 0%, transparent 70%);
            z-index: 0;
            pointer-events: none;
        }

        .skills-hero {
            margin-bottom: 8rem;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .skills-hero h1 {
            color: #ffffff;
            font-family: "Frank Ruhl Libre", serif;
            font-size: clamp(4.8rem, 8vw, 10rem);
            line-height: 1.1;
            margin-top: 0;
            margin-bottom: 2.4rem;
            letter-spacing: -0.02em;
            text-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .skills-hero .subheading {
            font-family: "Roboto", sans-serif;
            font-weight: 600;
            font-size: 1.4rem;
            text-transform: uppercase;
            letter-spacing: .5rem;
            color: #cf1767;
            margin-bottom: 2rem;
            display: block;
        }

        .skills-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        .skill-item {
            margin-bottom: 2rem;
            background: rgba(255, 255, 255, 0.03);
            padding: 3.5rem;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.07);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            overflow: hidden;
        }

        .skill-item::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(207, 23, 103, 0.05) 0%, transparent 50%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .skill-item:hover {
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(207, 23, 103, 0.4);
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.4), 0 0 20px rgba(207, 23, 103, 0.1);
        }

        .skill-item:hover::after {
            opacity: 1;
        }

        .skill-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            position: relative;
            z-index: 2;
        }

        .skill-title {
            color: #ffffff;
            font-family: "Frank Ruhl Libre", serif;
            font-size: 2.4rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 1.8rem;
        }

        .skill-title i {
            color: #ffffff;
            font-size: 3.2rem;
            transition: transform 0.3s ease;
        }

        .skill-item:hover .skill-title i {
            transform: rotate(10deg) scale(1.1);
        }

        .skill-percentage {
            font-family: "Roboto", sans-serif;
            font-weight: 800;
            color: #ffffff;
            font-size: 1.8rem;
            opacity: 0.9;
        }

        .progress-bar-container {
            width: 100%;
            height: 10px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            z-index: 2;
        }

        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(to right, #cf1767, #ff3b8e);
            border-radius: 20px;
            width: 0;
            position: relative;
            box-shadow: 0 0 15px rgba(207, 23, 103, 0.5);
        }

        .progress-bar-fill::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            animation: shine 2s infinite;
        }

        @keyframes shine {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
            }
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 4rem;
        }

        @media screen and (max-width: 900px) {
            .skills-grid {
                grid-template-columns: 1fr;
                gap: 2.5rem;
            }

            .s-skills-page {
                padding-top: 15rem;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body id="top">
    <div id="preloader">
        <div id="loader"></div>
    </div>

    @include('user.layouts.header')

    <main class="s-skills-page">
        <div class="row skills-hero" data-aos="fade-up">
            <div class="column large-full">
                <span class="subheading">Expertise</span>
                <h1>Technical Skills</h1>
            </div>
        </div>

        <div class="skills-content">
            <div class="skills-grid" id="skills-container">
                <!-- Loaded via AJAX -->
            </div>
        </div>
    </main>

    @include('user.layouts.footer')
    @include('user.layouts.footer-links')

    <script>
        $(document).ready(function () {
            const iconMap = {
                'PHP / Laravel': 'fab fa-laravel',
                'JavaScript / Vue.js': 'fab fa-js-square',
                'HTML5 / CSS3': 'fab fa-html5',
                'MySQL / PostgreSQL': 'fas fa-database',
                'Git / GitHub': 'fab fa-git-alt',
                'Responsive Design': 'fas fa-mobile-alt'
            };

            const defaultIcon = 'fas fa-code';

            $.ajax({
                url: "{{ route('skills.data') }}",
                type: "GET",
                success: function (response) {
                    if (response.status && response.data.length > 0) {
                        let html = "";
                        response.data.forEach(function (skill, index) {
                            let iconClass = iconMap[skill.skill_name] || defaultIcon;
                            html += `
                                <div class="skill-item" data-aos="fade-up" data-aos-delay="${(index + 1) * 100}">
                                    <div class="skill-header">
                                        <h3 class="skill-title"><i class="${iconClass}"></i> ${skill.skill_name}</h3>
                                        <span class="skill-percentage">${skill.proficiency}%</span>
                                    </div>
                                    <div class="progress-bar-container">
                                        <div class="progress-bar-fill" style="width: ${skill.proficiency}%;"></div>
                                    </div>
                                </div>
                            `;
                        });
                        $('#skills-container').html(html);

                        // Trigger animation after insertion
                        setTimeout(() => {
                            $('.progress-bar-fill').each(function () {
                                let width = $(this).attr('style').match(/\d+/)[0];
                                $(this).css('width', width + '%');
                            });
                        }, 100);
                    }
                }
            });
        });
    </script>
</body>

</html>