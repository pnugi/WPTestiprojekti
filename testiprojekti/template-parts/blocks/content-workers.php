<?php 
$workers = new WP_Query(array(
    'posts_per_page' => 40,
    'post_type' => 'workers'
));

?>
<!-- Header -->
<section class="mb-12 pb-6">
<div class="grid grid-cols-12 pt-12 pb-6">
    <div class="col-start-2 -ml-4 ">
        <hr class="border-t-2 rounded-full border-primary-500 mt-8 mr-4">
    </div>
    <header class="col-start-3 col-span-9 font-sora">
        <p class="text-3xl text-white text-slate mb-2 mt-4">Tutustu tekijöihin</p>
    </header>
</div>

<div class="grid grid-cols-12">
        <!-- Category selections -->
        <div class="col-start-1 ml-6 md:ml-12 lg:ml-0 lg:col-start-2 lg:col-end-3 text-white text-xs">
            <button id="btnAll">All</button>
            <button id="btnDesign">Designers</button>
            <button id="btnDev">Developers</button>
            <button id="btnStrat">Strategists</button>
            <button id="btnPm">Project management</button>
        </div>
        <!-- Persons -->
        <div class="col-start-4 col-end-12 lg:col-start-3 lg:col-end-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php

            while($workers->have_posts()){
            $workers->the_post(); ?>
                <div class="worker">
                    <div class="text-white flex flex-col">
                        <img src="<?php the_field('worker_image', get_the_ID())['url']?>" alt="">
                        <span class=""><?php the_field('worker_name', get_the_ID())?></span>
                        <small class="mb-2"><?php the_field('worker_titles', get_the_ID())?></small>
                        <small><?php the_field('worker_competence', get_the_ID())?></small>
                        <span id="profession" ><?php the_field('worker_profession', get_the_ID())?></span>
                    </div>
                </div>

            <?php } 
            ?>


        </div>
        </div>
</div>
</section>

<script>
 document.getElementById('btnAll').addEventListener('click', showPersons);
 document.getElementById('btnDesign').addEventListener('click', showPersons);
 document.getElementById('btnDev').addEventListener('click', showPersons);
 document.getElementById('btnStrat').addEventListener('click', showPersons);
 document.getElementById('btnPm').addEventListener('click', showPersons);
 


 function showPersons(){
    const workers = document.querySelectorAll('.worker');
    let profession = document.getElementById(profession);
    for(let i=0;i < workers.length; i++){
    if(workers[i].profession.textContent.includes('designer')){
       worker[i].style.display = "none";
    }
    else{
    worker[i].style.display = "block";
    }
}
}



/*  function showDesigners(){
     if(profession.textContent.includes('designer')){
         worker.classList.add('visible');
         console.log('pressed');
     } else{
         worker.classList.add('invisible');
     }
 } */

</script>

<!-- profession.innerHTML -->