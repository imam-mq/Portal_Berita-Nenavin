
<?php $__env->startSection('content'); ?>
	<body class="font-[Poppins] pb-[72px]">
    <nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center mt-[30px]">
			<div class="flex items-center gap-4">
				<!-- Logo -->
				<a href="#" class="flex shrink-0">
					<img src="assets/images/logos/logo_nenavin_1.png" 
						class="w-auto max-w-[80px] sm:max-w-[100px] md:max-w-[120px] lg:max-w-[150px] h-auto" 
						alt="logo" />
				</a>

				<!-- Garis Border -->
				<div class="hidden sm:block border border-[#E8EBF4] h-8 sm:h-10 md:h-12 lg:h-16 xl:h-20 2xl:h-24 w-px"></div>

				<!-- Form Pencarian -->
				<form method="GET" action="<?php echo e(route('front.search')); ?>" 
					class="w-full sm:w-[300px] md:w-[400px] lg:w-[450px] flex items-center rounded-full border border-[#E8EBF4] p-3 sm:p-[12px_20px] gap-2 sm:gap-[10px] focus-within:ring-2 focus-within:ring-[#FF6B18] transition-all duration-300">
					<?php echo csrf_field(); ?>
					<button type="submit" class="w-4 h-4 sm:w-5 sm:h-5 flex shrink-0 focus:outline-none">
						<img src="assets/images/icons/search-normal.svg" alt="icon" />
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
					<a href="<?php echo e(route('front.shop')); ?>" class="rounded-full border border-[#EEF0F7] p-[12px_22px] font-semibold text-black transition-all duration-300 hover:text-[#FFD700]">
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

        <nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-4 mt-[30px]">
			<div class="category-container flex overflow-x-auto space-x-4 px-4 py-2" style="scrollbar-width: none; -ms-overflow-style: none;">
				<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<a href="<?php echo e(route('front.category', $category->slug)); ?>" 
						class="flex-shrink-0 bg-white rounded-full px-4 py-2 shadow flex items-center gap-2 font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
						<div class="w-6 h-6 flex shrink-0">
							<img src="<?php echo e(Storage::url($category->icon)); ?>" alt="icon" class="w-6 h-6">
						</div>
						<span><?php echo e($category->name); ?></span>
					</a>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</nav>

        <section id="Featured" class="mt-[30px]">
            <div class="main-carousel w-full">
                <div class="featured-news-card relative w-full h-[550px] flex shrink-0 overflow-hidden">
                    <img src="assets/images/thumbnails/th-featured-1.png" class="thumbnail absolute w-full h-full object-cover" alt="Nenavin Promo" />
                    <div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10"></div>
                    </div>
                </div>
            </div>
		</section>

        <section id="Up-to-date" class="max-w[1130px] mx-auto flex flex-col items center justify-center mt-10 px-4">
            <div class="text-center">
                <h2 class="font-poppins font-bold text-3xl sm:text-4xl text-green-600 tracking-wide drop-shadow-lg">
                    Shop
                </h2>
            </div>
        </section>

        <div class="flex flex-wrap justify-center gap-6 p-6">
            <!-- Kartu Produk -->
            <div class="bg-lime-300 border-2 border-lime-400 rounded-2xl p-4 w-72 text-center shadow-lg">
                <img src="assets/images/thumbnails/Sari_Nanas_1.png" alt="Produk 1" class="w-full rounded-lg">
                <h3 class="font-bold text-lg mt-3">Keuntungan Beli 1 Botol :</h3>
                <ul class="text-left mt-2 text-sm space-y-1">
                <li class="flex items-center"><span class="text-green-600">✔</span> Potongan Ongkir</li>
                <li class="flex items-center"><span class="text-green-600">✔</span> Gratis Gelas 1 botol</li>
                <li class="flex items-center"><span class="text-green-600">✔</span> Dapat e-book</li>
                <li class="flex items-center"><span class="text-red-600">✘</span> Gratis Ongkir</li>
                <li class="flex items-center"><span class="text-red-600">✘</span> Gratis Packing Rapi</li>
                </ul>
                <button class="mt-4 bg-green-600 text-white font-bold py-2 px-4 rounded-lg flex items-center justify-center w-full">
                Pesan Sekarang <span class="ml-2">📲</span>
                </button>
            </div>

            <!-- Kartu Produk 2 -->
            <div class="bg-lime-300 border-2 border-lime-400 rounded-2xl p-4 w-72 text-center shadow-lg">
                <img src="assets/images/thumbnails/Sari_Nanas_2.png" alt="Produk 2" class="w-full rounded-lg">
                <h3 class="font-bold text-lg mt-3">Keuntungan Beli 2 Botol :</h3>
                <ul class="text-left mt-2 text-sm space-y-1">
                <li class="flex items-center"><span class="text-green-600">✔</span> Potongan Ongkir</li>
                <li class="flex items-center"><span class="text-green-600">✔</span> Gratis Gelas 1 botol</li>
                <li class="flex items-center"><span class="text-green-600">✔</span> Dapat e-book</li>
                <li class="flex items-center"><span class="text-green-600">✔</span> Gratis Ongkir</li>
                <li class="flex items-center"><span class="text-green-600">✔</span> Gratis Packing Rapi</li>
                </ul>
                <button class="mt-4 bg-green-600 text-white font-bold py-2 px-4 rounded-lg flex items-center justify-center w-full">
                Pesan Sekarang <span class="ml-2">📲</span>
                </button>
            </div>

            <!-- Kartu Produk 3 -->
            <div class="bg-lime-300 border-2 border-lime-400 rounded-2xl p-4 w-72 text-center shadow-lg">
                <img src="assets/images/thumbnails/Sari_Nanas_3.png" alt="Produk 3" class="w-full rounded-lg">
                <h3 class="font-bold text-lg mt-3">Keuntungan Beli 3 Botol :</h3>
                <ul class="text-left mt-2 text-sm space-y-1">
                <li class="flex items-center"><span class="text-green-600">✔</span> Potongan Ongkir</li>
                <li class="flex items-center"><span class="text-green-600">✔</span> Gratis Baju Kaos</li>
                <li class="flex items-center"><span class="text-green-600">✔</span> Dapat e-book</li>
                <li class="flex items-center"><span class="text-green-600">✔</span> Gratis Packing Rapi</li>
                <li class="flex items-center"><span class="text-green-600">✔</span> Gratis Ongkir</li>
                </ul>
                <button class="mt-4 bg-green-600 text-white font-bold py-2 px-4 rounded-lg flex items-center justify-center w-full">
                Pesan Sekarang <span class="ml-2">📲</span>
                </button>
            </div>
        </div>
	</body>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('after-styles'); ?>
<!-- CSS -->
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('after-scripts'); ?>
<script src="<?php echo e(asset('customjs/two-lines-text.js')); ?>"></script>
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
		<!-- JavaScript -->
		<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
		<!-- Flickity CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.min.css">

		<!-- jQuery (jika diperlukan) -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

		<!-- Flickity JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.3.0/flickity.pkgd.min.js"></script>

		<script src="customjs/carousel.js"></script>
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
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\belajarbaru\resources\views/front/shop.blade.php ENDPATH**/ ?>