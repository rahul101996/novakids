<script src="https://cdn.jsdelivr.net/npm/locomotive-scroll@3.5.4/dist/locomotive-scroll.js"></script>
<!-- <script src="./js/script.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<!-- jQuery & Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.9.0/axios.min.js"></script>

<!-- Include AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>

<script type="module">
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/12.3.0/firebase-app.js";
    import {
        getMessaging,
        getToken,
        onMessage
    } from "https://www.gstatic.com/firebasejs/12.3.0/firebase-messaging.js";

    // 🔹 Your Firebase config
    const firebaseConfig = {
        apiKey: "AIzaSyBKFZfyRAX-2lR4RaK0Zflh4kL-1eIVpEc",
        authDomain: "nova-7626d.firebaseapp.com",
        projectId: "nova-7626d",
        storageBucket: "nova-7626d.firebasestorage.app",
        messagingSenderId: "1575656461",
        appId: "1:1575656461:web:668bc868a97b44675a4944",
        measurementId: "G-SXCMSPKFWJ"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const messaging = getMessaging(app);

    const log = (msg) => {
        //   document.getElementById("log").innerText += msg + "\n";
        console.log(msg);
    };

    // 🔹 Register the service worker (classic, not module)
    navigator.serviceWorker.register("firebase-messaging-sw.js")
        .then((registration) => {
            log("Service Worker registered");

            // Get FCM token
            return getToken(messaging, {
                vapidKey: "BK7NN3eBAn6jhm8398O5hW4E9nT_WmayntD04VyR_p_pNY7_vPno4u1qenRkDKVWMDHiu_UeLo8CS_sa7m6WE-s" // 👉 From Firebase Console → Project Settings → Cloud Messaging → Web Push Certificates
            });
        })
        .then(async (token) => {
            if (token) {
                
                let userid = '<?= $_SESSION['userid'] ?>';

                console.log(token)
                console.log(userid)

                let res = await fetch("/api/saveToken", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        token: token,
                        userid: userid
                    })
                });
                let data = await res.json();
                
                console.log(data);

                localStorage.setItem("token", token);


                //   log("FCM Token: " + token);
                //   document.getElementById("tokenBox").value = token;
            } else {
                //   log("No registration token available. Request permission first.");
            }
        })
        .catch((err) => log("Error: " + err));

    // 🔹 Foreground messages
    onMessage(messaging, (payload) => {
        //   log("Message Received: " + JSON.stringify(payload));
        alert("New Notification: " + payload.notification.title);
    });
</script>
<script>
    AOS.init({
        once: true, // Ensures the animation runs only once
    });
</script>

<script>
    // Stop redirection when clicking cart/heart
    document.querySelectorAll('.stop-link').forEach(btn => {
        btn.addEventListener('click', e => {
            e.preventDefault();
            e.stopPropagation();
            // your cart/heart logic goes here
        });
    });
</script>
<script>
    function OpenAccordian(el) {
        const content = el.querySelector('.accordion-content');
        const icon = el.querySelector('.icon-wrapper');

        if (content.classList.contains('max-h-0')) {
            content.classList.remove('max-h-0');
            content.classList.add('max-h-[1000px]'); // Adjust as needed
            icon.classList.add('-rotate-90');
        } else {
            content.classList.remove('max-h-[1000px]');
            content.classList.add('max-h-0');
            icon.classList.remove('-rotate-90');
        }
    }

    <?php if (isset($_SESSION['err']) && !empty($_SESSION['err'])): ?>
        console.log("Error: <?= $_SESSION['err'] ?>");
        $(document).ready(function onDocumentReady() {
            toastr.error("<?= $_SESSION['err'] ?>");
        });
        <?php unset($_SESSION['err']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])): ?>
        console.log("Success: <?= $_SESSION['success'] ?>");
        $(document).ready(function () {
            toastr.success("<?= $_SESSION['success'] ?>");
        });
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>


    $(document).ready(function () {
        $('.home-banner-slider').owlCarousel({
            loop: true,
            items: 1, // Fade effect works best with a single item
            autoplay: true,
            autoplayTimeout: 4000, // Adjust timing as needed
            smartSpeed: 2000, // Smooth transition speed
            animateOut: 'fadeOut', // This adds the fade-out effect
            dots: false,
            nav: false
        });
    });
    $(document).ready(function () {
        $('.testimonial').owlCarousel({
            loop: true,
            items: 1, // Fade effect works best with a single item
            autoplay: true,
            autoplayTimeout: 4000, // Adjust timing as needed
            dots: false,
            nav: false
        });
    });
    $(document).ready(function () {
        $('.testimonial-video').owlCarousel({
            loop: true,
            items: 2, // Fade effect works best with a single item
            autoplay: true,
            autoplayTimeout: 4000, // Adjust timing as needed
            margin: 20,
            autoplayHoverPause: true,


            dots: false,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 2
                }
            }
        });
    });
    $(document).ready(function () {
        $('.PastQuiz').owlCarousel({
            loop: true,
            margin: 15,

            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
    });

    function banner_forward(ele) {
        console.log(ele);
        //   console.log("parent",ele.parentElement)
        let bannerdiv = ele.parentElement.parentElement.parentElement.parentElement.querySelector(".owl-carousel"); // Select the slider directly
        //   console.log(bannerdiv);
        if (bannerdiv) {
            let nextButton = bannerdiv.querySelector(".owl-next");
            if (nextButton) {
                nextButton.click();
            } else {
                console.error("Next button not found");
            }
        } else {
            console.error("Banner slider not found");
        }
    }

    function banner_backward(ele) {
        console.log(ele);
        console.log("parent", ele.parentElement)
        let bannerdiv = ele.parentElement.parentElement.parentElement.parentElement.querySelector(".owl-carousel");
        //   console.log(bannerdiv);
        if (bannerdiv) {
            let prevButton = bannerdiv.querySelector(".owl-prev");
            if (prevButton) {
                prevButton.click();
            } else {
                console.error("Previous button not found");
            }
        } else {
            console.error("Banner slider not found");
        }
    }
    document.addEventListener("DOMContentLoaded", function () {
        const counters = document.querySelectorAll(".count-up");

        const observer = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const target = entry.target;
                        let start = parseInt(target.dataset.start) || 0;
                        let end = target.dataset.end.includes("+") ?
                            parseInt(target.dataset.end) :
                            parseInt(target.dataset.end);
                        let duration = parseInt(target.dataset.duration) || 2000;
                        let suffix = target.dataset.end.includes("+") ? "+" : ""; // Detect "+" or "%"

                        animateCount(target, start, end, duration, suffix);
                        observer.unobserve(target);
                    }
                });
            }, {
            threshold: 0.5
        }
        );

        counters.forEach((counter) => observer.observe(counter));

        function animateCount(element, start, end, duration, suffix) {
            let startTime;

            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                const progress = Math.min((timestamp - startTime) / duration, 1);
                element.textContent = Math.floor(progress * (end - start) + start) + suffix;

                if (progress < 1) {
                    requestAnimationFrame(step);
                }
            }
            requestAnimationFrame(step);
        }
    });

    <?php if (isset($_SESSION['new_order']) && !empty($_SESSION['new_order'])): ?>
        console.log("Error: <?= $_SESSION['new_order'] ?>");
        $(document).ready(async function onDocumentReady() {

            const request = await axios.post("/sendOrderDetailMail", new URLSearchParams({
                id: '<?= $_SESSION['new_order'] ?>',
            }));
            console.log(request, '<?= $_SESSION['new_order'] ?>');
            <?php
            unset($_SESSION['new_order']);
            ?>
        });

    <?php endif; ?>
    <?php if (isset($_SESSION['cancel_order']) && !empty($_SESSION['cancel_order'])): ?>
        console.log("Error: <?= $_SESSION['cancel_order'] ?>");
        $(document).ready(async function onDocumentReady() {

            const request = await axios.post("/sendCancelOrderMail", new URLSearchParams({
                id: '<?= $_SESSION['cancel_order'] ?>',
            }));
            <?php
            unset($_SESSION['cancel_order']);
            ?>

        });

    <?php endif; ?>

    function extractGst(inclusivePrice, gstRate = 18) {
        // Convert to number explicitly
        inclusivePrice = parseFloat(inclusivePrice);
        gstRate = parseFloat(gstRate);

        if (isNaN(inclusivePrice) || isNaN(gstRate)) {
            console.error("Invalid number input:", inclusivePrice, gstRate);
            return {
                base_price: '0.00',
                gst_amount: '0.00',
                total_price: '0.00',
                gst_rate: gstRate
            };
        }

        const basePrice = inclusivePrice * 100 / (100 + gstRate);
        const gstAmount = inclusivePrice - basePrice;

        return {
            base_price: basePrice.toFixed(2),
            gst_amount: gstAmount.toFixed(2),
            total_price: inclusivePrice.toFixed(2),
            gst_rate: gstRate
        };
    }


    const paragraphs = document.querySelectorAll(".section_paragraph");
    const fadeLeft = document.querySelectorAll(".fadeLeft");
    const fadeRight = document.querySelectorAll(".fadeRight");
    const fadeIn = document.querySelectorAll(".fadeIn");
    const fadeDown = document.querySelectorAll(".fadeDown");

    // Function to check visibility and add the relevant class
    function checkVisibility() {
        paragraphs.forEach((paragraph) => {
            if (isInView(paragraph)) {
                paragraph.classList.add("section_paragraph--visible");
            }
        });
        fadeDown.forEach((element) => {
            if (isInView(element)) {
                element.classList.add("Slidedown");
            }
        });
        fadeLeft.forEach((element) => {
            if (isInView(element)) {
                element.classList.add("fadeInLeft");
            }
        });
        fadeRight.forEach((element) => {
            if (isInView(element)) {
                element.classList.add("fadeInRight");
            }
        });
        fadeIn.forEach((element) => {
            if (isInView(element)) {
                element.classList.add("fadeInc");
            }
        });
    }

    // Function to check if an element is in view
    function isInView(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.bottom > 0 &&
            rect.top <
            (window.innerHeight - 50 || document.documentElement.clientHeight - 150)
        );
    }

    // Check visibility on page load and on scroll
    document.addEventListener("DOMContentLoaded", checkVisibility);
    document.addEventListener("scroll", checkVisibility);


    function normalizeKeys(obj) {
        let normalized = {};
        for (let key in obj) {
            normalized[key.toLowerCase()] = obj[key];
        }
        return normalized;
    }

    function deepEqualCaseInsensitive(obj1, obj2) {
        return deepEqual(normalizeKeys(obj1), normalizeKeys(obj2));
    }

    // Deep comparison function (same as before)
    function deepEqual(a, b) {
        if (a === b) return true;
        if (typeof a !== "object" || a === null || typeof b !== "object" || b === null) return false;

        let keysA = Object.keys(a);
        let keysB = Object.keys(b);
        if (keysA.length !== keysB.length) return false;

        for (let key of keysA) {
            if (!keysB.includes(key) || !deepEqual(a[key], b[key])) {
                return false;
            }
        }
        return true;
    }
</script>