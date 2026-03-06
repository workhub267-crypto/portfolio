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
            background: linear-gradient(to bottom, #050505 0%, #0c0c0c 100%);
            color: rgba(255, 255, 255, 0.6);
            position: relative;
        }

        .services-hero {
            margin-bottom: 10rem;
            text-align: center;
        }

        .services-hero h1 {
            color: #ffffff;
            font-family: "Frank Ruhl Libre", serif;
            font-size: clamp(4.8rem, 8vw, 10rem);
            line-height: 1.1;
            margin-top: 0;
            margin-bottom: 2.4rem;
            letter-spacing: -0.02em;
        }

        .services-hero .subheading {
            font-family: "Roboto", sans-serif;
            font-weight: 500;
            font-size: 1.4rem;
            text-transform: uppercase;
            letter-spacing: .4rem;
            color: #cf1767;
            margin-bottom: 2rem;
            display: block;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 4rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .service-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 4rem;
            border-radius: 12px;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .service-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(207, 23, 103, 0.3);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        .service-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 0;
            background-color: #cf1767;
            transition: all 0.4s ease;
        }

        .service-card:hover::before {
            height: 100%;
        }

        .service-card h3 {
            color: #ffffff;
            font-family: "Frank Ruhl Libre", serif;
            font-size: 2.8rem;
            margin-bottom: 2rem;
        }

        .service-card p {
            font-size: 1.7rem;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.6);
        }

        .s-header {
            background-color: rgba(5, 5, 5, 0.85) !important;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.03);
        }

        @media screen and (max-width: 800px) {
            .s-services-page {
                padding-top: 15rem;
            }

            .services-grid {
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