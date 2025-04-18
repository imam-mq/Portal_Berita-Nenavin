
<?php $__env->startSection('content'); ?>
	<body class="font-[Poppins]">
		<nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center mt-[30px]">
			<div class="flex items-center gap-4">
				<!-- Logo -->
				<a href="#" class="flex shrink-0">
					<img src="<?php echo e(asset('assets/images/logos/logo_nenavin_1.png')); ?>" class="w-auto max-w-[80px] sm:max-w-[100px] md:max-w-[120px] lg:max-w-[150px] h-auto" alt="logo" />
				</a>

				<!-- Garis Border -->
				<div class="hidden sm:block border border-[#E8EBF4] h-8 sm:h-10 md:h-12 lg:h-16 xl:h-20 2xl:h-24 w-px"></div>

				<!-- Form Pencarian -->
				<form method="GET" action="<?php echo e(route('front.search')); ?>" class="w-full sm:w-[300px] md:w-[400px] lg:w-[450px] flex items-center rounded-full border border-[#E8EBF4] p-3 sm:p-[12px_20px] gap-2 sm:gap-[10px] focus-within:ring-2 focus-within:ring-[#FF6B18] transition-all duration-300">
					<?php echo csrf_field(); ?>
					<button type="submit" class="w-4 h-4 sm:w-5 sm:h-5 flex shrink-0 focus:outline-none">
						<img src="<?php echo e(asset('assets/images/icons/search-normal.svg')); ?>" alt="icon" />
					</button>
					<input type="text" name="keyword" 
						class="appearance-none outline-none w-full font-semibold placeholder:font-normal placeholder:text-[#A3A6AE] text-sm sm:text-base" 
						placeholder="Search hot trendy news today..." />
				</form>
			</div>

			<div class="relative">
				<!-- Tombol Hamburger -->
				<button id="menuToggle" class="lg:hidden flex flex-col gap-1 p-3 border border-gray-300 rounded-md focus:outline-none">
					<span class="block w-6 h-[2px] bg-black transition-all duration-300"></span>
					<span class="block w-6 h-[2px] bg-black transition-all duration-300"></span>
					<span class="block w-6 h-[2px] bg-black transition-all duration-300"></span>
				</button>

				<!-- Menu Navigasi (Desktop) -->
				<div id="menuDesktop" class="hidden lg:flex items-center gap-3">
					<a href="#" class="rounded-full border border-[#EEF0F7] p-[12px_22px] font-semibold text-black transition-all duration-300 hover:text-[#FFD700]">
						Belanja
					</a>
					<a href="#" class="rounded-full p-[12px_22px] flex gap-[10px] font-bold transition-all duration-300 bg-yellow-400 text-black shadow-md hover:shadow-lg">
						<div class="w-6 h-6 flex shrink-0">
							<img src="assets/images/icons/favorite-chart.svg" alt="icon">
						</div>
						<span>Reseller</span>
					</a>
				</div>

				<!-- Overlay -->
				<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

				<!-- Menu Navigasi (Mobile) -->
				<div id="mobileMenu" class="fixed top-0 right-0 w-full sm:w-[85%] h-full[90%] bg-[#c5841f] text-white flex flex-col items-center justify-start pt-20 hidden z-50 transition-transform transform translate-x-full">
					<!-- Tombol Close -->
					<button id="closeMenu" class="absolute top-5 right-5 text-white text-2xl focus:outline-none">✖</button>

					<!-- Menu List -->
					<nav class="mt-5 flex flex-col gap-4 text-center w-full">
						<a href="#" class="block w-full px-6 py-3 text-lg font-semibold  transition">Belanja</a>
						<a href="#" class="block w-full px-6 py-3 text-lg font-semibold  transition">Reseller</a>
					</nav>
				</div>
			</div>
		</nav>
		<nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center mt-[30px] px-4">
			<div class="category-container flex overflow-x-auto space-x-4 px-4 py-2 scrollbar-hide" 
				style="scrollbar-width: none; -ms-overflow-style: none; scroll-behavior: smooth;">
				
				<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<a href="<?php echo e(route('front.category', $item_category->slug)); ?>" 
					class="flex-shrink-0 bg-white rounded-full px-4 py-2 md:p-[12px_22px] shadow flex items-center gap-2 md:gap-[10px] font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] whitespace-nowrap">
					<div class="w-6 h-6 flex shrink-0">
						<img src="<?php echo e(Storage::url($item_category->icon)); ?>" alt="icon" class="w-6 h-6 object-contain">
					</div>
					<span class="text-sm md:text-base"><?php echo e($item_category->name); ?></span>
				</a>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</nav>

		<header class="flex flex-col items-center gap-[30px] mt-[50px] px-4">
			<div id="Headline" class="max-w-[1130px] mx-auto flex flex-col gap-4 items-center text-center">
				<p class="w-fit text-[#A3A6AE] text-sm md:text-base">
					<?php echo e($articleNews->created_at->format('M D, Y')); ?> • <?php echo e($articleNews->category->name); ?>

				</p>
				<h1 id="Title" class="font-bold text-[32px] md:text-[46px] leading-[40px] md:leading-[60px] text-center two-lines">
					<?php echo e($articleNews->name); ?>

				</h1>
			</div>
			<div class="w-full h-[250px] md:h-[400px] lg:h-[500px] flex shrink-0 overflow-hidden rounded-lg">
				<img src="<?php echo e(Storage::url($articleNews->thumbnail)); ?>" class="object-cover w-full h-full" alt="cover thumbnail">
			</div>
		</header>

		<section id="Article-container" class="max-w-[1130px] mx-auto flex flex-col lg:flex-row gap-10 lg:gap-20 mt-[50px] px-4">
			<!-- Bagian Konten Artikel -->
			<article id="Content-wrapper" class="w-full lg:w-[calc(100%-320px)] leading-relaxed text-[#333] text-lg">
				<?php echo $articleNews->content; ?>

			</article>

			<!-- Sidebar -->
			<aside class="side-bar flex flex-col w-full lg:w-[300px] shrink-0 gap-10">
				<!-- Iklan Pertama -->
				<div class="ads flex flex-col gap-3 w-full">
					<a href="<?php echo e($square_ads_1->link); ?>" class="block rounded-lg overflow-hidden shadow-lg transition-all hover:shadow-xl">
						<img src="<?php echo e(Storage::url($square_ads_1->thumbnail)); ?>" class="object-cover w-full h-auto rounded-lg" alt="ads" />
					</a>
					<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1 items-center">
						Our Advertisement 
						<a href="#" class="w-[18px] h-[18px]">
							<img src="<?php echo e(asset('assets/images/icons/message-question.svg')); ?>" alt="icon" />
						</a>
					</p>
				</div>

				<!-- Iklan Kedua -->
				<div class="ads flex flex-col gap-3 w-full">
					<?php if($square_ads_2): ?>
						<a href="<?php echo e($square_ads_2->link); ?>" class="block rounded-lg overflow-hidden shadow-lg transition-all hover:shadow-xl">
							<img src="<?php echo e(Storage::url($square_ads_2->thumbnail)); ?>" class="object-cover w-full h-auto rounded-lg" alt="ads" />
						</a>
					<?php else: ?>
						<p class="text-sm text-gray-500 text-center">Tidak ada iklan tersedia.</p>
					<?php endif; ?>

					<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1 items-center">
						Our Advertisement 
						<a href="<?php echo e($bannerads->link); ?>" class="w-[18px] h-[18px]">
							<img src="<?php echo e(asset('assets/images/icons/message-question.svg')); ?>" alt="icon" />
						</a>
					</p>
				</div>
			</aside>
		</section>

		<section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px] px-4">
			<div class="flex flex-col gap-3 w-full max-w-[900px]">
				<a href="<?php echo e($bannerads->link); ?>" class="block rounded-2xl overflow-hidden shadow-lg transition-all hover:shadow-xl">
					<div class="w-full h-[100px] md:h-[120px] flex items-center justify-center border border-[#EEF0F7] rounded-2xl bg-gray-100">
						<img src="<?php echo e(Storage::url($bannerads->thumbnail)); ?>" class="object-cover w-full h-full" alt="ads" />
					</div>
				</a>
				<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1 justify-center">
					Our Advertisement 
					<a href="#" class="w-[18px] h-[18px]">
						<img src="<?php echo e(asset('assets/images/icons/message-question.svg')); ?>" alt="icon" />
					</a>
				</p>
			</div>
		</section>

		<section id="Up-to-date" class="w-full flex justify-center mt-[70px] py-[50px] bg-[#F9F9FC] px-4">
			<div class="max-w-[1130px] mx-auto flex flex-col gap-[30px]">
				<div class="flex justify-between items-center">
					<h2 class="font-bold text-[26px] leading-[39px]">
						Other News You <br class="hidden sm:block" />
						Might Be Interested
					</h2>
				</div>

				<!-- Grid untuk Artikel -->
				<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[20px] md:gap-[30px]">
					<?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
					<a href="<?php echo e(route('front.details', $article->slug)); ?>" class="group">
						<div
							class="flex flex-col gap-4 p-[20px] md:p-[26px_20px] transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[20px] overflow-hidden bg-white shadow-md hover:shadow-lg">
							
							<!-- Thumbnail -->
							<div class="thumbnail-container h-[180px] md:h-[200px] relative rounded-[20px] overflow-hidden">
								<div class="badge absolute left-4 top-4 bg-white rounded-[50px] px-3 py-1 text-xs font-bold uppercase">
									<?php echo e($article->category->name); ?>

								</div>
								<img src="<?php echo e(Storage::url($article->thumbnail)); ?>" alt="thumbnail photo"
									class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" />
							</div>

							<!-- Text Content -->
							<div class="flex flex-col gap-[6px]">
								<h3 class="text-md md:text-lg leading-[27px] font-bold group-hover:text-[#FF6B18] transition-colors">
									<?php echo e(Str::limit($article->name, 50, '...')); ?>

								</h3>
								<p class="text-xs md:text-sm leading-[21px] text-[#A3A6AE]">
									<?php echo e($article->created_at->format('M d, Y')); ?>

								</p>
							</div>
						</div>
					</a>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
					<p class="text-center text-gray-500 col-span-full">Belum Ada Artikel Lainnya</p>
					<?php endif; ?>
				</div>
			</div>
		</section>


	<script src="js/two-lines-text.js"></script>
</body>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('after-styles'); ?>
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('after-scripts'); ?>
<script src="js/two-lines-text.js"></script>
<script src="https://cdn.tailwindcss.com"></script>
	<script>
			document.addEventListener("DOMContentLoaded", function () {
			const menuToggle = document.getElementById("menuToggle");
			const mobileMenu = document.getElementById("mobileMenu");
			const closeMenu = document.getElementById("closeMenu");
			const overlay = document.getElementById("overlay");

			menuToggle.addEventListener("click", () => {
				mobileMenu.classList.toggle("hidden");
				mobileMenu.classList.toggle("translate-x-full");
				overlay.classList.toggle("hidden");
			});

			closeMenu.addEventListener("click", () => {
				mobileMenu.classList.add("hidden");
				mobileMenu.classList.add("translate-x-full");
				overlay.classList.add("hidden");
			});

			overlay.addEventListener("click", () => {
				mobileMenu.classList.add("hidden");
				mobileMenu.classList.add("translate-x-full");
				overlay.classList.add("hidden");
			});
		});

			document.addEventListener("DOMContentLoaded", function () {
			const categoryContainer = document.querySelector(".category-container");

			let isDown = false;
			let startX;
			let scrollLeft;

			categoryContainer.addEventListener("mousedown", (e) => {
				isDown = true;
				categoryContainer.classList.add("active");
				startX = e.pageX - categoryContainer.offsetLeft;
				scrollLeft = categoryContainer.scrollLeft;
			});

			categoryContainer.addEventListener("mouseleave", () => {
				isDown = false;
				categoryContainer.classList.remove("active");
			});

			categoryContainer.addEventListener("mouseup", () => {
				isDown = false;
				categoryContainer.classList.remove("active");
			});

			categoryContainer.addEventListener("mousemove", (e) => {
				if (!isDown) return;
				e.preventDefault();
				const x = e.pageX - categoryContainer.offsetLeft;
				const walk = (x - startX) * 2; // Sesuaikan kecepatan scroll
				categoryContainer.scrollLeft = scrollLeft - walk;
			});
		});
	</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\belajarbaru\resources\views/front/details.blade.php ENDPATH**/ ?>