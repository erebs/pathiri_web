



document.addEventListener("DOMContentLoaded", function () {
    const testimonials = document.querySelectorAll(".testimonial");
    let currentIndex = 0;

    function showTestimonial(index) {
        testimonials.forEach((testimonial, i) => {
            if (i === index) {
                testimonial.classList.add("activet");
            } else {
                testimonial.classList.remove("activet");
            }
        });
    }

    function nextTestimonial() {
        currentIndex = (currentIndex + 1) % testimonials.length;
        showTestimonial(currentIndex);
    }

    // Show the first testimonial
    showTestimonial(currentIndex);

    // Automatically switch testimonials every 5 seconds
    setInterval(nextTestimonial, 4000);
});


function toggleCartt(){
    document.querySelector('.sidebar').classList.toggle('open-cart');
    }















    let selectedImageContainer = null;

    function selectImage(imageContainerId) {
        if (selectedImageContainer) {
            selectedImageContainer.classList.remove("selected");
        }

        selectedImageContainer = document.getElementById(imageContainerId);
        selectedImageContainer.classList.add("selected");
    }

    function submitSelectedImage() {
        if (selectedImageContainer) {
            const imageAlt = selectedImageContainer.querySelector("img").alt;
            alert(`You selected: ${imageAlt}`);
            // Perform any other actions you need with the selected image here.
        } else {
            alert("Please select an image first.");
        }
    }

    // Automatically select the first image when the page loads
    window.addEventListener("load", function() {
        selectImage("image1-container");
    });

    document.getElementById("image1-container").addEventListener("click", function() {
        selectImage("image1-container");
    });

    document.getElementById("image2-container").addEventListener("click", function() {
        selectImage("image2-container");
    });