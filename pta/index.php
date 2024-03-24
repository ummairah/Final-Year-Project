<?php include "config.php" ?>

<html>

<body style="background-color: #f0f0f0;" class="bg-body-tertiary">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg" style="background-color: #c8e6c9;">
        <div class="container">
            <a class="navbar-brand" href="index.php"><img src="icon/logo_new.ico" alt="" width="140" height="120"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutus">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#example">Example </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#location">Our Location</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact Us</a>
                    </li>
                    &nbsp;
                    <li class="nav-item">
                        <button class="btn btn-success"><a href="login_user.php" style="text-decoration: none; color: white;"> Book Now </a></button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- image with text overlay -->
    <div style="position: relative;">
        <img src="https://img.freepik.com/premium-photo/carpet-cleaning-vacuum-cleaner_266247-56.jpg?w=826" class="banner">

        <!-- Text overlay -->
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; color: lightgray; font-size: 75px; font-weight: bold;">
            <div>Welcome To</div>
            <div>Inviron</div>
        </div>

        <!-- Down arrow animation -->
        <div class="down-arrow" style="position: absolute; bottom: 20px; left: 50%; transform: translateX(-50%); display: flex; flex-direction: column; align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16" style="margin-bottom: 5px;">
                <path d="M8 14a.5.5 0 0 1-.354-.854L8 14zm.354-12.646a.5.5 0 0 1 .707 0L8 1.293 7.646.939a.5.5 0 0 1 .707 0z" />
                <path fill-rule="evenodd" d="M8 16a8 8 0 1 1 0-16A8 8 0 0 1 8 16zM1 8a7 7 0 0 1 13.994-.179L15 8l-.006.156A7 7 0 0 1 1 8zM8 2a6 6 0 1 0 0 12A6 6 0 0 0 8 2z" />
            </svg>
        </div>
    </div>


    <!-- about content -->
    <br><br><br>
    <div class="card col-10 mx-auto text-center" style="width: 75%; margin-top: 20px;" id="aboutus">
        <br>
        <h2 class="card-title text-success"> About Us </h2>
        <div class="card-body text-justify">
            Inviron Malaysia Sdn Bhd, a distinguished company established in 1984, has been a trailblazer in the industry, specializing in providing comprehensive care and top-notch cleaning services tailored specifically for carpets and textured surfaces. With an unwavering commitment to excellence, Inviron has consistently set the benchmark, earning a reputation for delivering unparalleled service quality and customer satisfaction throughout its illustrious journey spanning several decades.
        </div>
    </div>


    <!-- content -->
    <br><br>
    <h1 class="text-center" id="services">
        <small class="text-success">Services</small>
    </h1>
    <br>
    <div class="card-group">
        <div class="card text-center">
            <img src="images/services_carpet.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-title">Carpet</h4>
                <h5 class="card-title"><b><i>RM0.25 per sqft</i></b></h5>
                <p class="card-text text-justify">Inviron offers professional carpet cleaning services starting as low as <b>RM 0.25 per square foot</b>, providing an affordable solution for maintaining pristine and hygienic carpets. Additionally, for small carpets, the pricing is negotiable, ensuring flexibility to meet your specific needs and budget.</p>
            </div>
        </div>
        <div class="card text-center">
            <img src="images/services_office.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-title">Office Chair</h4>
                <h5 class="card-title"><b><i>RM 20 per unit</i></b></h5>
                <p class="card-text text-justify">Elevate your office environment with our Office Chair Cleaning Package, priced at just <b>RM20 per unit</b>. Say goodbye to dust, stains, and allergens as our professional cleaning service works its magic. We go beyond the surface, ensuring a thorough cleanse while preserving the quality of your office chairs.</p>
            </div>
        </div>
        <div class="card text-center">
            <img src="images/services_sofa.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-title">Sofa</h4>
                <h5 class="card-title"><b><i>RM 120 per unit</i></b></h5>
                <p class="card-text text-justify">
                    Transform your living space with our Sofa Cleaning Package, available at a remarkable price of <b> RM120 per unit. </b> Indulge in the luxury of a professionally cleaned sofa that not only looks stunning but also contributes to a healthier home environment.
                    Our dedicated team ensures the removal of dirt, stains, and allergens, revitalizing your sofa and bringing back its original charm</p>
            </div>
        </div>
    </div>

    <!-- image gallery -->
    <br><br>

    <script>
        $(document).on("click", '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>

    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)" id="example">
        <h2 class="text-center"> Example </h2>
        <div class="container">
            <div class="row justify-content-center" style="margin: 15px;">
                <a data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                    <img src="images/01.jpg" style="width: 100%; max-height: 300px; object-fit: cover;" class="img-fluid rounded">
                </a>
                <a data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                    <img src="images/02.jpg" style="width: 100%; max-height: 300px; object-fit: cover;" class="img-fluid rounded">
                </a>
            </div>
            <div class="row justify-content-center" style="margin: 15px;">
                <a data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                    <img src="images/03.jpg" style="width: 100%; max-height: 300px; object-fit: cover;" class="img-fluid rounded">
                </a>
                <a data-toggle="lightbox" data-gallery="gallery" class="col-md-4">
                    <img src="images/04.jpg" style="width: 100%; max-height: 300px; object-fit: cover;" class="img-fluid rounded">
                </a>
            </div>
        </div>

        <br>
        <!-- geolocation -->
        <br>
        <h2 class="text-center" id="location"> Our Location </h2>
        <br>
        <div class="container text-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7984.32539524816!2d101.57259858735243!3d3.1913118679100902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc45876891a465%3A0x76328a7ab23616a9!2sMegamas%20Creation!5e0!3m2!1sen!2smy!4v1706066826991!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>


        <!-- Footer -->
        <br><br>
        <footer class="text-center text-lg-start bg-body-tertiary text-muted" id="contact">
            <br><br>
            <!-- Section: Links  -->
            <section class="">
                <div class="container text-center text-md-start mt-5">
                    <!-- Grid row -->
                    <div class="row mt-3">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                            <!-- Content -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Inviron Sdn Bhd
                            </h6>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">
                                Links
                            </h6>
                            <p>
                                <a href="#services" class="text-reset">Services</a>
                            </p>
                            <p>
                                <a href="#example" class="text-reset">Example</a>
                            </p>

                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                            <!-- Links -->
                            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                            <p>50G Pusat Perniagaan
                                Megamas,
                                Jalan Gelen K, Seksyen U19,
                                40000 Sungai Buloh,
                                Selangor</p>
                            <p id="copy-link">
                                fms@invironmalaysia.com
                            </p>

                            <p><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg> +03-61445522 </p>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                </div>
            </section>
            <br><br>
            <!-- Section: Links  -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: seagreen; color: white">
                © 2023 Copyright:
                <a class="text-reset fw-bold" href="index.php">Inviron Sdn Bhd</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
</body>

<script>
    const copyLink = document.getElementById('copy-link');

    copyLink.addEventListener('click', () => {
        // Create a new textarea element
        const textarea = document.createElement('textarea');
        textarea.value = 'fms@invironmalaysia.com';
        document.body.appendChild(textarea);

        // Select the text inside the textarea and copy it to clipboard
        textarea.select();
        document.execCommand('copy');

        // Remove the textarea from the DOM
        document.body.removeChild(textarea);

        // Show a success message
        alert('Text copied to clipboard!');
    });
</script>

</html>