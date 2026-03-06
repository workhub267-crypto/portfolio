<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>Services - Epitome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('user.layouts.header-links')

    <style>
        .s-services-page {
            padding-top: 20rem;
            padding-bottom: 12rem;
            background: radial-gradient(circle at 50% 100%, #1a1a1a 0%, #050505 100%);
            color: rgba(255, 255, 255, 0.6);
            position: relative;
            overflow: hidden;
        }

        /* Ambient Background Glow */
        .s-services-page::before {
            content: "";
            position: absolute;
            bottom: -20%;
            right: -10%;
            width: 50%;
            height: 50%;
            background: radial-gradient(circle, rgba(207, 23, 103, 0.03) 0%, transparent 70%);
            z-index: 0;
            pointer-events: none;
        }

        .services-hero {
            margin-bottom: 8rem;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .services-hero h1 {
            color: #ffffff;
            font-family: "Frank Ruhl Libre", serif;
            font-size: clamp(4.8rem, 8vw, 10rem);
            line-height: 1.1;
            margin-top: 0;
            margin-bottom: 2.4rem;
            letter-spacing: -0.02em;
            text-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .services-hero .subheading {
            font-family: "Roboto", sans-serif;
            font-weight: 600;
            font-size: 1.4rem;
            text-transform: uppercase;
            letter-spacing: .5rem;
            color: #cf1767;
            margin-bottom: 2rem;
            display: block;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 4rem;
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        .service-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            padding: 5rem 4rem;
            border-radius: 24px;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-12px);
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(207, 23, 103, 0.4);
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.5), 0 0 30px rgba(207, 23, 103, 0.1);
        }

        .service-icon {
            font-size: 4.8rem;
            color: #ffffff;
            margin-bottom: 3rem;
            display: inline-block;
            transition: all 0.4s ease;
        }

        .service-card:hover .service-icon {
            transform: scale(1.15) rotate(5deg);
            filter: drop-shadow(0 0 10px rgba(207, 23, 103, 0.5));
        }

        .service-card h3 {
            color: #ffffff;
            font-family: "Frank Ruhl Libre", serif;
            font-size: 3rem;
            margin-bottom: 2.4rem;
            letter-spacing: -0.01em;
        }

        .service-card p {
            font-size: 1.8rem;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 0;
            flex-grow: 1;
        }

        .service-card .service-num {
            position: absolute;
            top: 3rem;
            right: 4rem;
            font-family: "Roboto", sans-serif;
            font-weight: 900;
            font-size: 5rem;
            color: rgba(255, 255, 255, 0.03);
            line-height: 1;
            transition: color 0.4s ease;
            pointer-events: none;
        }

        .service-card:hover .service-num {
            color: rgba(207, 23, 103, 0.08);
        }

        @media screen and (max-width: 800px) {
            .s-services-page {
                padding-top: 15rem;
            }

            .services-grid {
                grid-template-columns: 1fr;
                gap: 3rem;
            }

            .service-card {
                padding: 4rem 3rem;
            }
        }
    </style>
</head>

<body id="top">
    <div id="preloader">
        <div id="loader"></div>
    </div>

    @include('user.layouts.header')

    <main class="s-services-page">
        <div class="row services-hero" data-aos="fade-up">
            <div class="column large-full">
                <span class="subheading">What I Offer</span>
                <h1>My Services</h1>
            </div>
        </div>

        <div class="services-grid" id="services-page-container">
            <!-- Loaded via AJAX -->
        </div>
    </main>

    @include('user.layouts.footer')
    @include('user.layouts.footer-links')

    <script>
        $(document).ready(function () {
            $.ajax({
                url: "{{ route('services.data') }}",
                method: "GET",
                success: function (response) {
                    if (response.status && response.data.length > 0) {
                        let html = "";
                        response.data.forEach(function (service, index) {
                            html += `
                                <div class="service-card" data-aos="fade-up" data-aos-delay="${index * 100}">
                                    <span class="service-num">${service.service_number || (index + 1).toString().padStart(2, '0')}</span>
                                    <div class="service-icon">
                                        <i class="${service.icon || 'ri-service-line'}"></i>
                                    </div>
                                    <h3>${service.title}</h3>
                                    <p>${service.description}</p>
                                </div>
                            `;
                        });
                        $('#services-page-container').html(html);
                    }
                }
            });
        });
    </script>
</body>

</html>