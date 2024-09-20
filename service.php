

<?php 
include 'includes/header.php'; 
require 'includes/db.php';
?>

<style>
 /* Services Container Styling */
.services-container {
  padding: 60px;
  background: linear-gradient(
    135deg,
    #f58529,
    #dd2a7b,
    #8134af
  ); /* Instagram-inspired gradient */
  text-align: center;
  border-radius: 25px; /* Pronounced round corners */
  overflow: hidden; /* Ensure content stays within rounded corners */
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  position: relative;
  z-index: 1;
  color: #fff; /* Text color for better contrast against gradient */
}

/* Adding a subtle pattern overlay */
.services-container::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: url("path-to-your-pattern-image.png"); /* Optional pattern image or texture */
  opacity: 0.1; /* Adjust opacity for subtlety */
  z-index: -1; /* Place behind the content */
}

/* Services Grid */
.services-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px; /* Increased gap for better spacing */
}

/* Individual Service Card */
.service-card {
  background: #fff;
  border-radius: 25px; /* More pronounced round corners */
  overflow: hidden;
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
  transition: transform 0.3s, box-shadow 0.3s;
  animation: fadeInUp 1s ease-out;
}

/* Image Container */
.service-image {
  width: 250px; /* Increased width */
  height: 250px; /* Increased height to match width */
  overflow: hidden;
  border-radius: 50%; /* Round container */
  position: relative;
  margin: 0 auto; /* Center the container if needed */
}

/* Image */
.service-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  border-radius: 50%; /* Ensure the image itself is round */
  transition: transform 0.3s;
}

/* Service Info */
.service-info {
  padding: 25px; /* Increased padding for better spacing */
  text-align: left;
  border-radius: 20px; /* Round corners of the text area */
  background: rgba(0, 0, 0, 0.8); /* Darker background for better contrast */
  color: #f1f1f1; /* Light text color for readability */
}

/* Service Title */
.service-info h3 {
  font-size: 1.6rem;
  margin-bottom: 15px;
  color: #ffcc00; /* Bright color for text */
  font-family: "Roboto", sans-serif; /* Elegant font */
}

/* Service Description */
.service-info p {
  font-size: 1.1rem;
  color: #ddd; /* Light color for better readability */
  line-height: 1.6;
  margin-bottom: 15px;
  font-family: "Roboto", sans-serif; /* Consistent font family */
}

/* Price Styling */
.price {
  font-weight: 600;
  color: #ffcc00; /* Bright color for emphasis */
  margin-bottom: 10px;
  font-family: "Roboto", sans-serif; /* Consistent font family */
}

/* Author Styling */
.author {
  font-size: 0.95rem;
  color: #ccc; /* Light color for subtlety */
  font-family: "Roboto", sans-serif; /* Consistent font family */
}

/* Hover Effect on Service Card */
.service-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
}

/* Image Zoom Effect on Hover */
.service-card:hover .service-image img {
  transform: scale(1.1); /* Slightly increased scale for zoom effect */
}

/* Keyframe Animation for Fade-In Effect */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Keyframe Animation for Heading Fade-In Effect */
@keyframes fadeInDown {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}


</style>

<!-- Link to the CSS file -->

<div class="services-container">
    <h1 style="margin-bottom:15px;">Explore Freelance Services</h1>
    <div class="services-grid">
        <?php
        // Fetch services from the database
        $stmt = $pdo->prepare("SELECT s.title, s.description, s.price, s.icon, u.username FROM services s JOIN users u ON s.user_id = u.user_id");
        $stmt->execute();
        $services = $stmt->fetchAll();

        // Check if services exist
        if ($services && count($services) > 0) {
            foreach ($services as $service) {
                echo '<div class="service-card">';
                
                // Display the freelancer's icon if available
                $icon = !empty($service['icon']) ? htmlspecialchars($service['icon']) : 'https://via.placeholder.com/100';
                echo '<div class="service-image">';
                echo '<img src="' . $icon . '" alt="Service Image" class="user-icon">'; // Display the icon as the service image
                echo '</div>';
                
                echo '<div class="service-info">';
                echo '<h3>' . htmlspecialchars($service['title']) . '</h3>';
                echo '<p>' . htmlspecialchars($service['description']) . '</p>';
                echo '<p class="price">Price: $' . htmlspecialchars($service['price']) . '</p>';
                echo '<p class="author">Offered by: ' . htmlspecialchars($service['username']) . '</p>';
                echo '</div>';
                
                echo '</div>';
            }
        } else {
            echo "<p>No services available at the moment. Check back later!</p>";
        }
        ?>
    </div>
</div>

<?php include 'includes/footer.php'; ?>