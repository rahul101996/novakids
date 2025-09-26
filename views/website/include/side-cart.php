<style>
    .cart-sidebar {
        transition: transform 0.3s ease-in-out;
    }

    .cart-sidebar-open {
        transform: translateX(0);
    }

    .cart-sidebar-closed {
        transform: translateX(100%);
    }

    .bg-pink-toast {
        background-color: #4c2e90;
        /* Tailwind's bg-pink-400 */
        color: white;
        /* Optional: text color */

    }
</style>
<div class="w-full bg-black/50 z-[9999] h-[100vh]  fixed top-0 left-0 hidden" id="overlay"></div>

<div class="w-full bg-black/50 z-[9999] h-[100vh]  fixed top-0 left-0 hidden"></div>
<div id="cartSidebar"
    class="cart-sidebar  cart-sidebar-closed fixed top-0 right-0 w-[25%] bg-white shadow-lg h-screen z-[9999] max-md:w-[90%]">
    <div class="h-full flex flex-col shadow-4xl ">
        <form method="post" action="/cart/<?= $_SESSION['language'] ?>" id="cart-sidebar-container"
            class="h-full flex flex-col">

        </form>
    </div>
</div>
<script>
    const cartSidebar = document.getElementById('cartSidebar');
    const openCartBtn = document.getElementById('openCartBtn');
    console.log(openCart)
    const cartModal = document.getElementById('cartModal');
    // const openCartBtn1 = document.getElementById('openCartBtn1');
    // console.log(openCartBtn1);

    const closeCartBtn = document.getElementById('closeCartBtn');
    const cartSidebarContainer = document.getElementById('cart-sidebar-container');
    // const cartSidebarContainers = document.getElementById('cart-sidebar-container1');
    // console.log(cartSidebarContainers);


    async function openCart() {
        document.getElementById('overlay').classList.remove('hidden');
        const response = await axios.post("/api/getCartDataAjax.php");
        console.log(response);
        let ele = `
            <div class="p-4 bg-white shadow flex justify-between sticky top-0 items-center">
                <h2 class="text-xl font-semibold flex items-center">
                                           <img src="/public/images/shopping-bag-black.webp" class="h-7" >

                    &ensp;Cart
                </h2>
<button type="button" id="closeCartBtn" onclick="closeCart()"
    class="text-gray-500 hover:text-gray-700 hover:rotate-[45deg] transition-transform duration-300">
<img src="/public/images/cross.webp" class="h-10" >
</button>
            </div>
            <div class="flex flex-col items-center justify-center w-full h-full">
<img src="/public/images/empty-cart.png" >

            <p class="w-full text-center text-slate-500 font-semibold text-lg h-16 flex flex-col items-center justify-center">
                No Products in the cart.
            </p>
            </div>
            <div class="p-4 bg-white shadow-inner hidden">
                <div class="flex justify-between items-center mb-4">
                    <span class="font-semibold">Subtotal</span>
                    <span class="font-bold text-lg " id="All_Side_Total">INR 0</span>
                </div>
              
                <button class="w-full h-10  flex items-center justify-center gap-2 bg-[#603eae] text-white button_slide slide_right   uppercase">
                    <i class="fa-solid fa-cart-shopping"></i>&ensp;Buy Now
                </button>
            </div>`
        // sideCartBody.innerHTML = "";
        cartSidebarContainer.innerHTML = "";
        // document.getElementById('cart-sidebar-container1').innerHTML = "";

        if (response.data.success) {
            console.log("how")
            if (response.data.cart_count > 0) {
                document.getElementById('cart-count').innerText = response.data.cart_count;

                cartSidebarContainer.innerHTML = response.data.cart_div

            } else {
                cartSidebarContainer.innerHTML = ele
            }

        } else {
            cartSidebarContainer.innerHTML = ele
        }


        let profilecart = document.getElementById('cart-sidebar-container1');
        if (profilecart) {
            profilecart.innerHTML = ele;

        }

        cartSidebar.classList.remove('cart-sidebar-closed');
        cartSidebar.classList.add('cart-sidebar-open');
        setTotal();
        // CheckOffers();

    }

    function closeCart() {
        document.getElementById('overlay').classList.add('hidden');

        cartSidebar.classList.remove('cart-sidebar-open');
        cartSidebar.classList.add('cart-sidebar-closed');
    }

    openCartBtn.addEventListener('click', openCart);
    // openCartBtn1.addEventListener('click', openCart);

    // closeCartBtn.addEventListener('click', closeCart);

    async function deleteCart(ele, cartid) {
        // console.log(ele, cartid);
        // console.log("element le re:", ele);
        const response = await axios.post("/cart/<?= $_SESSION['language'] ?>", new URLSearchParams({
            cartid: cartid,
            "deleteMe": ""
        }))
        console.log(response.data)
        if (response.data.success) {
            console.log(ele, ele.parentElement.parentElement)
            ele.parentElement.parentElement.remove();

            toastr.options = {
                "toastClass": "bg-pink-toast",
                "progressBar": true,
                "positionClass": "toast-bottom-right" // Position the toast at the bottom right
            };

            toastr.success("Product removed from Cart");

            openCart();
            document.getElementById('cart-count').innerText = response.data.totalcart;
            // document.getElementById("myTbody").removeChild
        }
    }

    function setTotal() {
        const totalarray = cartSidebarContainer.querySelectorAll(".total")
        // console.log(totalarray)
        let total = 0;

        totalarray.forEach(element => {
            let amount = element.innerText
            amount = amount.replace('₹', '')
            total += parseInt(amount)
        });
        document.getElementById("All_Side_Total").innerText = '₹' + total
        return total
    }
    async function minus(ele, product_id) {
        console.log("minusing....");
        const row = ele.parentElement;
        const current = row.querySelector(".quantity");
        const selling_price = parseFloat(row.querySelector(".selling_price").value);

        if (parseInt(current.innerText) > 1) {
            current.innerText = parseInt(current.innerText) - 1;
            await addToCartSidebar(product_id, ele, -1);

            const productCard = ele.closest(".product-card");
            const totalElement = productCard.querySelector(".total");
            totalElement.innerText = '₹' + (parseInt(current.innerText) * selling_price).toFixed(2);

            row.querySelector(".quantityo").value = current.innerText;
        } else {
            const cart_id = row.querySelector(".cartid").value;
            const thisEle = ele.closest(".product-card").querySelector(".deleteBut");
            // console.log("This is the element",thisEle, cart_id);
            deleteCart(thisEle, cart_id);
            openCart();
        }

        setTotal();
    }


    async function plus(ele, product_id) {
        const row = ele.parentElement;
        const max = 10;
        const current = row.querySelector(".quantity");
        const selling_price = parseFloat(row.querySelector(".selling_price").value);

        if (parseInt(current.innerText) < max) {
            current.innerText = parseInt(current.innerText) + 1;
            await addToCartSidebar(product_id, ele);

            const productCard = ele.closest('.product-card');
            const totalElement = productCard.querySelector('.total');
            totalElement.innerText = '₹' + (current.innerText * selling_price).toFixed(2);

            row.querySelector(".quantityo").value = current.innerText;
        }

        setTotal();
    }

    async function addToCartSidebar(product_id, ele, quantity = 1) {

        // console.log("hello")
        const request = await axios.post("/books/<?= $_SESSION['language'] ?>", new URLSearchParams({
            product_id: product_id,
            quantity: quantity
        }));
        console.log(request.data)
        if (request.data.success) {
            // window.location.href="cart.php";?
            openCart();
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-bottom-right" // Add a custom class
            };

            toastr.success(request.data.message);
        }
    }
    document.addEventListener('DOMContentLoaded', function() {

        AddToCart();
    });

    function AddToCart() {
        console.log("hello")
        const addToCartBtn = document.querySelectorAll('.addToCartBtn');
        console.log(addToCartBtn);
        if (addToCartBtn) {
            addToCartBtn.forEach(function(btn) {
                btn.addEventListener('click', function(event) {
                    let ee = btn.parentElement
                    console.log(ee);
                    addToCartSidebar(ee.querySelector(".sideProductId").value, btn)


                });
            });
        }
    }
</script>