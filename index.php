<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace for freelancers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        .hero-section {
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            color: white;
            /* Optional: for better text visibility */
            padding: 100px 0;
            /* Adjust padding as needed */
            text-align: center;
            /* Center text */

        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" style="color: white;" href="#">Freelancing</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-secondary" id="login-btn" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-sucess" id="regis-btn" href="register.php">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section" style="background-image: url('assets/Images/Header-2.jpg');">
        <div class="container">
            <h1 style="display: block; background-color:black; border-radius:15px">Marketplace for freelancers</h1>

            <a href="login.php" class="btn btn-primary btn-lg" style="background-color:blue">Get Started</a>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="text-center">About Us</h2>
            <p class="text-center">Welcome to Freelancing, your go-to platform for connecting talented freelancers with businesses and individuals seeking top-quality services. Whether you're looking for creative designers, skilled developers, expert writers, or innovative marketers, our community of professionals is ready to bring your ideas to life.</p>
            <div class="row">
                <div class="col-md-6">
                    <img src="assets/Images/Header-1.jpg" alt="Our Mission" class="img-fluid mb-3">
                    <h3>Our Mission</h3>
                    <p>Our mission is to empower freelancers and businesses by providing a platform where they can connect and collaborate on projects across various industries.</p>
                </div>
                <div class="col-md-6">
                    <img src="assets/Images/Header-2.jpg" alt="Our Vision" class="img-fluid mb-3">
                    <h3>Our Vision</h3>
                    <p>We envision a world where talented individuals can thrive independently, and businesses can find the expertise they need to succeed.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 gradient-background">
        <div class="container">
            <h2 class="text-center">Our Services</h2>
            <div class="row">
                <div class="col-md-4">
                    <img src="assets/Images/Web development.jpg" alt="Web Development" class="img-fluid mb-3">
                    <h3>Web Development</h3>
                    <p>Get top-notch web development services to create stunning websites that engage users and drive business growth.</p>
                </div>
                <div class="col-md-4">
                    <img src="assets/Images/Graphic design.jpg" alt="Graphic Design" class="img-fluid mb-3">
                    <h3>Graphic Design</h3>
                    <p>Our graphic designers are experts in creating visually appealing designs that reflect your brand’s identity.</p>
                </div>
                <div class="col-md-4">
                    <img src="assets/Images/Digital marketing.jpg" alt="Digital Marketing" class="img-fluid mb-3">
                    <h3>Digital Marketing</h3>
                    <p>Boost your online presence with our digital marketing services, including SEO, social media marketing, and PPC.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-5">
        <div class="container">
            <h2 class="text-center">Our Portfolio</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="portfolio-item">
                        <img src="assets/Images/pexels-wildlittlethingsphoto-27178153.jpg" alt="Project 1" class="img-fluid mb-3">
                        <h4>Project 1</h4>
                        <p>A detailed description of the project and the value it provided to the client.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="portfolio-item">
                        <img src="assets/Images/Header-1.jpg" alt="Project 2" class="img-fluid mb-3">
                        <h4>Project 2</h4>
                        <p>A detailed description of the project and the value it provided to the client.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="portfolio-item">
                        <img src="assets/Images/Header-2.jpg" alt="Project 3" class="img-fluid mb-3">
                        <h4>Project 3</h4>
                        <p>A detailed description of the project and the value it provided to the client.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5 gradient-background">
        <div class="container">
            <h2 class="text-center" style="color: black;">What Our Clients Say</h2>
            <div class="row" style="color:black">
                <div class="col-md-4">
                    <div class="testimonial">
                        <img src="assets/Images/Header-3.jpg" alt="John Doe" class="img-fluid rounded-circle mb-3" style="width: 100px; height: 100px;">
                        <p>"Freelancing has been instrumental in finding the right talent for our projects. Highly recommend!"</p>
                        <p><strong>- John Doe, CEO of ABC Corp</strong></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial">
                        <img src="assets/Images/pexels-caio-56759.jpg" alt="Jane Smith" class="img-fluid rounded-circle mb-3" style="width: 100px; height: 100px;">
                        <p>"The platform is easy to use, and the freelancers are top-notch. We've completed several successful projects here."</p>
                        <p><strong>- Jane Smith, Marketing Director</strong></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial">
                        <img src="assets/Images/pexels-sanketgraphy-15547664.jpg" alt="Bob Johnson" class="img-fluid rounded-circle mb-3" style="width: 100px; height: 100px;">
                        <p>"Great experience working with FreelanceHub. The support team is always ready to help."</p>
                        <p><strong>- Bob Johnson, Founder of StartupXYZ</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="text-center">Contact Us</h2>
            <p class="text-center">Have questions? Send us a message!</p>
            <div class="text-center mb-4">
                <img src="assets/Images/contact-us.jpg" alt="Contact Us" class="img-fluid">
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Your Message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Contact Information</h5>
                    <ul class="list-unstyled">
                        <li><strong>Address:</strong> 123 Freelance Street, Suite 456, City, Country</li>
                        <li><strong>Phone:</strong> +123 456 7890</li>
                        <li><strong>Email:</strong> <a href="mailto:info@freelancing.com" class="text-white">info@freelancingcom</a></li>
                        <li><strong>Business Hours:</strong> Mon - Fri, 9:00 AM - 5:00 PM</li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                        <li><a href="#" class="text-white"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#" class="text-white"><i class="fab fa-linkedin-in"></i> LinkedIn</a></li>
                        <li><a href="#" class="text-white"><i class="fab fa-instagram"></i> Instagram</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#home" class="text-white">Home</a></li>
                        <li><a href="#about" class="text-white">About</a></li>
                        <li><a href="login.php" class="text-white">Services</a></li>
                        <li><a href="#portfolio" class="text-white">Portfolio</a></li>
                        <li><a href="#contact" class="text-white">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div><br>
        <hr>
        <p>&copy; 2024 <strong>Freelancing</strong> | All rights reserved.</p>
    </footer>
    <script src="freelance\assets\js\scripts.js"></script>
</body>

</html>