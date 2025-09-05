


<script src="https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Bootstrap (required by Summernote) -->


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