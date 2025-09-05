   <?php
               $banner = getData2("SELECT * FROM `tbl_offer_marquee` WHERE 1 ORDER BY `id` DESC LIMIT 1")[0];
?>
   <marquee behavior="scroll" direction="left" class="w-full text-white bg-[#272c6c]" scrollamount="6">
       <div class="w-full text-white bg-[#272c6c] py-3 max-md:py-2 max-md:text-xs">
           <a href="<?= $banner['link'] ?>" class="inline-block">
               <?= $banner['text'] ?>
           </a>
       </div>
   </marquee>