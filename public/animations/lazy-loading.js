
document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll('.fade-in-section');

    const observerOptions = {
        threshold: 0.3 /* Trigger when at least 10% of the section is visible */
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target); // Stop observing once the element has been animated
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        observer.observe(section);
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll('.fade-self');

    const observerOptions = {
        threshold: 0.0 /* Trigger when at least 10% of the section is visible */
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target); // Stop observing once the element has been animated
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        observer.observe(section);
    });
});


document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll('.fade-strong-bottom');

    const observerOptions = {
        threshold: 0.5 /* Trigger when at least 10% of the section is visible */
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target); // Stop observing once the element has been animated
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        observer.observe(section);
    });
});



document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll('.fade-strong-left');

    const observerOptions = {
        threshold: 0.5 /* Trigger when at least 10% of the section is visible */
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target); // Stop observing once the element has been animated
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        observer.observe(section);
    });
});


document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll('.fade-strong-right');

    const observerOptions = {
        threshold: 0.5 /* Trigger when at least 10% of the section is visible */
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target); // Stop observing once the element has been animated
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        observer.observe(section);
    });
});






// document.addEventListener("DOMContentLoaded", function() {
//     window.addEventListener("load", function() {
//         const loader = document.getElementById('loader');
        
        
//         setTimeout(() => {
//             loader.classList.add('fade-out'); // 
//             document.getElementById('main-content').style.display = 'block';
//         }, 500);
//     });
// });

document.addEventListener("DOMContentLoaded", function() {
    window.addEventListener("load", function() {
        const loader = document.getElementById('loader');

        // Function to disable scroll
        function disableScroll() {
            document.body.style.overflow = 'hidden';
        }

        // Function to enable scroll
        function enableScroll() {
            document.body.style.overflow = '';
        }

        // Function to check if all content is loaded
        function isContentLoaded() {
            // Check if all images are loaded
            const images = document.getElementsByTagName('img');
            return Array.from(images).every(img => img.complete);
        }

        // Disable scroll initially
        disableScroll();

        // Start observing the DOM for changes
        const observer = new MutationObserver((mutations) => {
            mutations.forEach(mutation => {
                if (mutation.type === 'childList') {
                    if (isContentLoaded()) {
                        // Fade out the loader and show the main content
                        loader.classList.add('fade-out');
                        enableScroll()
                        // Remove the observer
                        observer.disconnect();
                    }
                }
            });
        });

        // Observe the entire document
        observer.observe(document, { childList: true, subtree: true });

        // Simulate the fade-out effect
        setTimeout(() => {
            enableScroll()
            loader.classList.add('fade-out');
        }, 500);
    });
});


// const circleCursor = document.getElementById('circle-cursor');

//         // Fonction pour déplacer le cercle en fonction de la position de la souris
//         document.addEventListener('mousemove', function(e) {
//             circleCursor.style.transform = `translate(${e.clientX - 2}px, ${e.clientY - 2}px)`;
//         });



// Fonction pour charger une image lorsqu'elle entre dans le viewport