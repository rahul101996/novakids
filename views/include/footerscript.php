


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<!-- Summernote -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.js"></script>
<!-- Bootstrap (required by Summernote) -->

<script type="module">
    import { initializeApp } from "https://www.gstatic.com/firebasejs/12.3.0/firebase-app.js";
    import { getMessaging, getToken, onMessage } from "https://www.gstatic.com/firebasejs/12.3.0/firebase-messaging.js";

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

    // const log = (msg) => {
    //   document.getElementById("log").innerText += msg + "\n";
    //   console.log(msg);
    // };

    // 🔹 Register the service worker (classic, not module)
    navigator.serviceWorker.register("firebase-messaging-sw.js")
      .then((registration) => {
        log("Service Worker registered");

        // Get FCM token
        return getToken(messaging, {
          vapidKey: "BK7NN3eBAn6jhm8398O5hW4E9nT_WmayntD04VyR_p_pNY7_vPno4u1qenRkDKVWMDHiu_UeLo8CS_sa7m6WE-s" // 👉 From Firebase Console → Project Settings → Cloud Messaging → Web Push Certificates
        });
      })
      .then((token) => {
        if (token) {
            console.log(tokan)
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
    $(document).ready(function() {
        $('textarea.summernote').summernote({                                                           
            height: 100,
            toolbar: [ 
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'table', 'picture', 'video', 'hr']],
                ['view', ['fullscreen', 'codeview', 'help']],
                ['color', ['color']],                        
                ['height', ['height']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
            ]
        });
    });

   
    <?php if (isset($_SESSION['err']) && !empty($_SESSION['err'])) : ?>
        console.log("Error: <?= $_SESSION['err'] ?>");
        $(document).ready(function onDocumentReady() {
            toastr.error("<?= $_SESSION['err'] ?>");
        });
        <?php unset($_SESSION['err']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['success']) && !empty($_SESSION['success'])) : ?>
        console.log("Error: <?= $_SESSION['success'] ?>");
        $(document).ready(function onDocumentReady() {
            toastr.success("<?= $_SESSION['success'] ?>");
        });
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['print_bill']) && !empty($_SESSION['print_bill'])) : ?>
        $(document).ready(function onDocumentReady() {
            printBill('<?= $_SESSION['print_bill'] ?>')
        });
        <?php unset($_SESSION['print_bill']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['print_bill_ot']) && !empty($_SESSION['print_bill_ot'])) : ?>
        $(document).ready(function onDocumentReady() {
            printBill('<?= $_SESSION['print_bill_ot'] ?>', "ot")
        });
        <?php unset($_SESSION['print_bill_ot']); ?>
    <?php endif; ?>

    


    function setAllSlim(ele = null) {

        if (ele == null) {
            ele = document
        }
        ele.querySelectorAll('select.selectElement').forEach(function(selectElement) {
            new SlimSelect({
                select: selectElement
            });
        });
    }

    function deleteRow(ele) {
        let row = ele.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
    setAllSlim();

    function timeFormat(param) {
        const timeArray = param.split(":");
        let outputTime = "";
        if (timeArray[0] > 12) {
            outputTime = `${timeArray[0] - 12}:${timeArray[1]} PM`;
        } else {
            outputTime = `${timeArray[0]}:${timeArray[1]} AM`;
        }

        return outputTime;
    }

    function convertToAMPM(time) {
        let [hours, minutes, seconds] = time.split(":");

        hours = parseInt(hours, 10);
        let ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes.padStart(2, '0'); // Ensure two digits for minutes
        seconds = seconds.padStart(2, '0'); // Ensure two digits for seconds

        return `${hours}:${minutes} ${ampm}`;
    }

    function formatDate(dateString) {
        if (dateString && dateString.trim() !== "") {
            // Create a Date object from the provided date string
            const date = new Date(dateString);

            // Define options for formatting the date
            const options = {
                day: '2-digit',
                month: 'long',
                year: 'numeric'
            };

            // Format the date to the desired format: "January 05, 2024"
            const formattedDate = date.toLocaleDateString('en-US', options);

            return formattedDate;
        }
        return "";
    }

    function formatDateTime(dateTimeString) {
        if (!dateTimeString || dateTimeString.trim() === "") {
            return "";
        }

        const date = new Date(dateTimeString);

        if (isNaN(date)) {
            return "";
        }

        // Format date
        const dateOptions = {
            day: '2-digit',
            month: 'long',
            year: 'numeric'
        };
        const formattedDate = date.toLocaleDateString('en-US', dateOptions);

        // Extract time and format it
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const seconds = String(date.getSeconds()).padStart(2, '0');
        const time = `${hours}:${minutes}:${seconds}`;
        const formattedTime = convertToAMPM(time);

        return `${formattedDate} at ${formattedTime}`;
    }


    function setSR(table) {
        // let count =1
        console.log(table)
        table.querySelectorAll(".sr").forEach((tr, i) => {
            tr.innerText = i + 1
        })
    }

    // setDateFocus();

    
</script>