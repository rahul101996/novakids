<!DOCTYPE html>
<html lang="en">

<?php
include $_SERVER['DOCUMENT_ROOT'] . "/views/include/header.php";

?>

<body class="bg-[#1a1a1a] overflow-hidden">

    <div class="flex">
        <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/views/include/sidebar.php";

        $date = date('Y-m-d');

        ?>

        <main class="flex-1 md:ml-[16.5rem] md:mt-[3.7rem] bg-[#f1f1f1] rounded-tr-3xl  h-[92vh] overflow-y-scroll">
            <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/views/include/navbar.php";
            ?>
            <div class="w-[85%]">
                <div class="flex items-center my-6">
                    <button class="text-gray-500 hover:text-gray-700">
                        <span class="material-icons">arrow_back</span>
                    </button>
                    <h1 class="text-2xl font-semibold ml-2">Payment GateWay</h1>
                </div>
            </div>
            <div class="w-[83%]">
                <div class="card card-primary card-outline card-tabs mt-2">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Cashfree</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Razorpay</a>
                            </li>

                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                <form action="" method="POST" class="col-md-12 row" enctype="multipart/form-data">
                                    <div class=" flex flex-col w-[50%] ">
                                        <div class="form-group ">
                                            <label for="category" class="form-label">Cashfree Key ID<span class="text-red-500">*</span></label>
                                            <input type="text" id="cashfreekeyid" value="<?= (!empty($payment_gateway) ? $payment_gateway[0]['keyid'] : "") ?>" name="cashfreekeyid" class="form-control" placeholder="Cashfree Key ID" required>
                                        </div>

                                        <div class="form-group  ">
                                            <label for="category" class="form-label">Cashfree Secret Key <span class="text-red-500">*</span></label>
                                            <input type="text" id="category" value="<?= (!empty($payment_gateway) ? $payment_gateway[0]['secretkey'] : "") ?>" name="cashfreesecretkey" class="form-control" placeholder="Cashfree Secret Key" required>
                                        </div>
                                        <div class="form-group  ">
                                            <label for="category" class="form-label">Activation<span class="text-red-500">*</span></label>
                                            <input type="checkbox" name="display" value="2" <?= (!empty($payment_gateway[0]['status']) && $payment_gateway[0]['status'] == 1) ? 'checked' : "" ?> class="display">
                                        </div>
                                        <div class="form-group mb-3 col-sm-6">
                                            <?php
                                            if (empty($editData)) {
                                            ?>
                                                <button type="submit" name="cashfree" class="btn btn-primary">Submit</button>
                                            <?php
                                            } else {
                                            ?>
                                                <input type="hidden" value="<?= $editData["img"] ?>" name="oldimg">
                                                <button type="submit" name="cashfree" class="btn btn-primary">Update</button>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class=" flex flex-col w-[50%] items-center justify-center ">
                                        <img src="/public/logos/Cashfree-Dark.svg" class="w-[70%] object-cover" alt="">
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade w-full" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                <form action="" method="POST" class="col-md-12 row" enctype="multipart/form-data">
                                    <div class=" flex flex-col w-[50%] ">
                                        <div class="form-group ">
                                            <label for="category" class="form-label">Razorpay Key ID<span class="text-red-500">*</span></label>
                                            <input type="text" id="razorpaykeyid" value="<?= (!empty($payment_gateway) ? $payment_gateway[1]['keyid'] : "") ?>" name="razorpaykeyid" class="form-control" placeholder="Razorpay Key ID" required>
                                        </div>

                                        <div class="form-group  hidden">
                                            <label for="category" class="form-label">Razorpay Secret Key <span class="text-red-500">*</span></label>
                                            <input type="text" id="razorpaysecretkey" value="<?= (!empty($payment_gateway) ? $payment_gateway[1]['secretkey'] : "") ?>" name="razorpaysecretkey" class="form-control" placeholder="Razorpay Secret Key" required>
                                        </div>
                                        <div class="form-group  ">
                                            <label for="category" class="form-label">Activation<span class="text-red-500">*</span></label>
                                            <input type="checkbox" name="display" value="1" <?= (!empty($payment_gateway[1]['status']) && $payment_gateway[1]['status'] == 1) ? 'checked' : "" ?> class="display">
                                        </div>
                                        <div class="form-group mb-3 col-sm-6">
                                            <?php
                                            if (empty($editData)) {
                                            ?>
                                                <button type="submit" name="razorpay" class="btn btn-primary">Submit</button>
                                            <?php
                                            } else {
                                            ?>
                                                <input type="hidden" value="<?= $editData["img"] ?>" name="oldimg">
                                                <button type="submit" name="razorpay" class="btn btn-primary">Update</button>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class=" flex flex-col w-[50%] items-center justify-center">
                                        <img src="/public/logos/razorpay.png" class="w-[70%] object-cover" alt="">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </main>
    </div>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . "/views/include/footer.php";
    ?>
    <script>
        document.querySelectorAll('.display').forEach(checkbox => {
            checkbox.addEventListener('change', async function() {
                if (this.checked) {
                    // Uncheck all other checkboxes
                    document.querySelectorAll('.display').forEach(otherCheckbox => {
                        if (otherCheckbox !== this) {
                            otherCheckbox.checked = false;
                        }
                    });
                    console.log(this.value);
                    let id = this.value;
                    const request = await axios.post("/api/payment-gateway", new URLSearchParams({
                        id: id
                    }));
                    console.log(request.data)
                    if (request.data.success) {

                        toastr.options = {
                            "toastClass": "bg-pink-toast",
                            "progressBar": true,
                            "positionClass": "toast-bottom-right" // Add a custom class
                        };

                        toastr.success('Payment Gateway Changed successfully');
                    }
                }
            });
        });
    </script>
</body>

</html>