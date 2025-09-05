 <?php
    if (isset($banner) && $banner != null && !empty($banner) && $banner != false) {
    ?>
     <a href="<?= $banner['link'] ?>" class="w-full  flex items-center justify-center relative max-lg:h-[300px] max-md:h-[100px]">
         <img src="/<?= $banner['image'] ?>" alt="">
     </a>
 <?php
    } else {
        $banners = getData2("SELECT * FROM `tbl_home_banner` WHERE 1 ORDER BY `order_no` ASC ");
    ?>

     <div class="w-full flex items-center justify-center relative">
         <div id="forward" onclick="banner_forward(this)"
             class="absolute z-[999] top-[50%] left-[2vw] border bg-white border-white p-2 rounded-full cursor-pointer max-lg:top-[87%] max-md:top-[20%] max-md:left-[5vw]">
             <img src="/public/images/backward-black.png" class="w-[25px] h-[25px] max-md:w-[12px] max-md:h-[12px]"
                 alt="">
         </div>
         <div id="backward" onclick="banner_backward(this)"
             class="absolute z-[999] top-[50%] right-[2vw] border bg-white  border-white p-2 rounded-full cursor-pointer max-lg:top-[87%] max-lg:right-[80vw] max-md:top-[20%]  max-md:right-[5vw]">
             <img src="/public/images/forward-black.png" class="w-[25px] h-[25px] max-md:w-[12px] max-md:h-[12px]"
                 alt="">
         </div>
         <!-- <div class="absolute top-0 left-0 w-full h-full bg-black opacity-50 z-[99]"></div> -->
         <div class="owl-carousel home-banner-slider w-full h-full max-lg:h-[300px] max-md:h-[100px]">
             <?php
                foreach ($banners as $banner) {


                ?>
                 <a href="<?= $banner['link'] ?>" class="w-full h-full flex items-center justify-center relative">
                     <img src="/<?= $banner['image'] ?>" alt="">
                 </a>
             <?php  } ?>



         </div>
     </div>
 <?php } ?>