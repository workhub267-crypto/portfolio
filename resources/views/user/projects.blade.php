<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Works - Epitome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('user.layouts.header-links')

    <style>
        .s-works-page {
            padding-top: 20rem;
            padding-bottom: 12rem;
            background: #050505;
            color: rgba(255, 255, 255, 0.6);
            position: relative;
            overflow: hidden;
        }

        .works-hero {
            margin-bottom: 8rem;
            text-align: center;
        }

        .works-hero h1 {
            color: #ffffff;
            font-family: "Frank Ruhl Libre", serif;
            font-size: clamp(4.8rem, 8vw, 10rem);
            line-height: 1.1;
            margin-top: 0;
            margin-bottom: 2.4rem;
            letter-spacing: -0.02em;
        }

        .works-hero .subheading {
            font-family: "Roboto", sans-serif;
            font-weight: 600;
            font-size: 1.4rem;
            text-transform: uppercase;
            letter-spacing: .5rem;
            color: #cf1767;
            margin-bottom: 2rem;
            display: block;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            gap: 5rem;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .project-card {
            background: rgba(255, 255, 255, 0.02);
            border-radius: 30px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            display: flex;
            flex-direction: column;
            cursor: pointer;
        }

        .project-card:hover {
            transform: translateY(-15px);
            border-color: rgba(207, 23, 103, 0.3);
            box-shadow: 0 50px 100px rgba(0, 0, 0, 0.6);
        }

        .project-image-box {
            width: 100%;
            height: 300px;
            background: linear-gradient(45deg, #111 0%, #222 100%);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .project-image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }

        .project-card:hover .project-image-box img {
            transform: scale(1.1);
        }

        /* Overlay for items without images */
        .project-placeholder {
            font-size: 10rem;
            color: rgba(255, 255, 255, 0.03);
            font-family: "Frank Ruhl Libre", serif;
            font-weight: 900;
            position: absolute;
        }

        .project-content {
            padding: 4rem;
            flex-grow: 1;
        }

        .project-category {
            font-family: "Roboto", sans-serif;
            font-size: 1.2rem;
            text-transform: uppercase;
            letter-spacing: 0.2rem;
            color: #cf1767;
            margin-bottom: 1.5rem;
            display: block;
        }

        .project-card h3 {
            color: #ffffff;
            font-size: 3.2rem;
            font-family: "Frank Ruhl Libre", serif;
            margin-bottom: 2rem;
            line-height: 1.2;
        }

        .project-desc {
            font-size: 1.7rem;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.4);
            margin-bottom: 3rem;
        }

        .project-tech {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: auto;
        }

        .tech-pill {
            background: rgba(255, 255, 255, 0.05);
            padding: 0.6rem 1.4rem;
            border-radius: 50px;
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .project-links {
            position: absolute;
            top: 2rem;
            right: 2rem;
            display: flex;
            gap: 1.5rem;
            z-index: 10;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.4s ease;
        }

        .project-card:hover .project-links {
            opacity: 1;
            transform: translateY(0);
        }

        .link-icon {
            width: 4.5rem;
            height: 4.5rem;
            background: #ffffff;
            color: #000;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            transition: all 0.3s ease;
        }

        .link-icon:hover {
            background: #cf1767;
            color: #ffffff;
            transform: scale(1.1);
        }

        .status-badge {
            position: absolute;
            top: 2rem;
            left: 2rem;
            padding: 0.5rem 1.5rem;
            border-radius: 4px;
            font-size: 1.1rem;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.1rem;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.2);
            z-index: 5;
        }

        @media screen and (max-width: 800px) {
            .projects-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body id="top">
    <div id="preloader">
        <div id="loader"></div>
    </div>

    @include('user.layouts.header')

    <main class="s-works-page">
        <div class="row works-hero" data-aos="fade-up">
            <div class="column large-full">
                <span class="subheading">Selected Works</span>
                <h1>My Projects</h1>
            </div>
        </div>

        <div class="projects-grid" id="projects-container">
            <!-- Loaded via AJAX -->
        </div>
    </main>

    @include('user.layouts.footer')
    @include('user.layouts.footer-links')

    <script>
        $(document).ready(function () {
            $.ajax({
                url: "{{ route('projects.data') }}",
                type: "GET",
                success: function (response) {
                    if (response.status && response.data.length > 0) {
                        let html = "";
                        response.data.forEach(function (project, index) {
                            let techStack = project.tech_stack ? project.tech_stack.split(',') : [];
                            let techHtml = "";
                            techStack.forEach(t => {
                                techHtml += `<span class="tech-pill">${t.trim()}</span>`;
                            });

                            let statusClass = project.status === 'completed' ? 'text-success' : 'text-warning';

                            html += `
                                <div class="project-card" data-aos="fade-up" data-aos-delay="${index * 100}">
                                    <div class="status-badge">${project.status}</div>
                                    <div class="project-links">
                                        ${project.github_link ? `<a href="${project.github_link}" target="_blank" class="link-icon"><i class="fab fa-github"></i></a>` : ''}
                                        ${project.live_link ? `<a href="${project.live_link}" target="_blank" class="link-icon"><i class="fas fa-external-link-alt"></i></a>` : ''}
                                    </div>
                                    <div class="project-image-box">
                                        ${project.image ? `<img src="/storage/${project.image}" alt="${project.title}">` : `<div class="project-placeholder">WORKS</div>`}
                                    </div>
                                    <div class="project-content">
                                        <span class="project-category">${techStack[0] || 'Project'}</span>
                                        <h3>${project.title}</h3>
                                        <p class="project-desc">${project.description}</p>
                                        <div class="project-tech">
                                            ${techHtml}
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                        $('#projects-container').html(html);
                    }
                }
            });
        });
    </script>
</body>

</html>