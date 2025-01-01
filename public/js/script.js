document.addEventListener("DOMContentLoaded", function () {
    // 1. Sticky Navbar
    const navbar = document.querySelector("nav");
    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            navbar.classList.add("sticky");
        } else {
            navbar.classList.remove("sticky");
        }
    });

    // 2. Smooth Scroll
    const navLinks = document.querySelectorAll(".nav-links a");
    navLinks.forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();
            const targetId = this.getAttribute("href").slice(1);
            const targetElement = document.getElementById(targetId);

            window.scrollTo({
                top: targetElement.offsetTop - navbar.offsetHeight,
                behavior: "smooth"
            });
        });
    });

    // 3. Typewriter Effect in Hero Section
    const heroText = document.querySelector(".hero-content h1");
    const heroTexts = ["SkillUp Course", "Learn and Grow", "Achieve Your Goals"];
    let heroIndex = 0;
    let charIndex = 0;

    function typeWriter() {
        if (charIndex < heroTexts[heroIndex].length) {
            heroText.textContent += heroTexts[heroIndex].charAt(charIndex);
            charIndex++;
            setTimeout(typeWriter, 150);
        } else {
            setTimeout(() => {
                heroText.textContent = "";
                charIndex = 0;
                heroIndex = (heroIndex + 1) % heroTexts.length;
                typeWriter();
            }, 2000);
        }
    }

    typeWriter();

    // 4. Hover Animation for Course Cards
    const courseCards = document.querySelectorAll(".course-card");
    courseCards.forEach(card => {
        card.addEventListener("mouseenter", () => {
            card.style.transform = "scale(1.05)";
            card.style.boxShadow = "0 8px 16px rgba(0, 0, 0, 0.2)";
        });
        card.addEventListener("mouseleave", () => {
            card.style.transform = "scale(1)";
            card.style.boxShadow = "none";
        });
    });

    // Existing Text Animation
    const texts = ["Instruktur Profesional", "Metode TheUP", "Harga Terjangkau"];
    const textContainer = document.getElementById("text-animation");

    let currentIndex = 0;

    function showText() {
        // Clear container and set new text
        textContainer.innerHTML = `<span>${texts[currentIndex]}</span>`;
        const currentText = textContainer.querySelector("span");

        // Animate text opacity
        currentText.style.opacity = "1";

        // Schedule next text after 2 seconds
        setTimeout(() => {
            currentText.style.opacity = "0"; // Fade out
            currentIndex = (currentIndex + 1) % texts.length; // Loop through texts
            setTimeout(showText, 500); // Wait for fade-out transition
        }, 2000); // Display each text for 2 seconds
    }

    // Start animation
    showText();
});
