
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
        <br>

        <section class="bg-yellow-400 py-10 overflow-hidden">
            <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 md:px-6">
                <!-- Text Content -->
                <div class="md:w-1/2 mb-8 md:mb-0 text-center md:text-left animate__animated animate__fadeInLeft animate__slow">
                    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-green-800 leading-tight mb-4">
                        JOIN SEKARANG RESELLER/ <br /> DROPSHIP NENAVIN
                    </h2>
                    <p class="text-green-900 mb-6 text-sm sm:text-base">
                        Ribuan produk sudah terkirim di Indonesia dan juga ribuan produk yang sudah merasakan khasiat nenavin
                    </p>
                    <ul class="mb-6 space-y-3 text-green-900 text-sm sm:text-base">
                        <li class="flex items-center justify-center md:justify-start animate__animated animate__fadeInUp animate__delay-1s">
                            <svg class="w-5 h-5 text-green-700 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586l-3.293-3.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                            Minim Resiko Usaha
                        </li>
                        <li class="flex items-center justify-center md:justify-start animate__animated animate__fadeInUp animate__delay-2s">
                            <svg class="w-5 h-5 text-green-700 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 00-1.414 0L8 12.586l-3.293-3.293a1 1 0 00-1.414 1.414l4 4a1 1 0 001.414 0l8-8a1 1 0 000-1.414z" clip-rule="evenodd" />
                            </svg>
                            Repeat order Tinggi
                        </li>
                    </ul>
                    <a href="#" class="inline-block bg-white text-green-700 font-semibold px-5 py-2.5 rounded shadow hover:bg-green-50 hover:scale-105 transform transition duration-300 animate__animated animate__fadeInUp animate__delay-3s">
                        Daftar Sekarang
                    </a>
                </div>

                <!-- Image -->
                <div class="md:w-1/2 flex justify-center animate__animated animate__fadeInRight animate__slow">
                    <img src="assets/images/thumbnails/Nenavin-Seler.png" alt="Nenavin Pineapple Vinegar" class="w-2/3 md:w-full max-w-xs sm:max-w-sm hover:scale-105 transform transition duration-500" />
                </div>
            </div>
        </section>

        <section id="Up-to-date" class="max-w-[1130px] mx-auto flex flex-col items-center justify-center mt-10 px-4 sm:px-6 relative py-8 text-center">
			<div class="text-center">
				<h2 class="text-base sm:text-lg md:text-xl font-extrabold text-lime-700 drop-shadow-md uppercase leading-snug">
					Mau Untung Banyak Hanya Menjadi Reseller Nenavin ? <br> Gabung Sekarang Juga !!!
				</h2>
			</div>
		</section>

		<section class="max-w-7xl mx-auto px-4 py-10">
			<!--Card-->
			<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
				<!--Card-1-->
				<div class="bg-white rounded-2xl shadow-md p-6 flex flex-col transition-all duration-[1500ms] ease-out hover:shadow-2xl hover:scale-[1.03]">
					<img src="assets/images/thumbnails/Nev-2.png" alt="Social Media" class="w-full h-65 object-contain mb-4 transition-all duration-[1500ms] ease-out hover:scale-110">
					<h3 class="text-lg font-bold mb-2 text-gray-800">Jualan Dengan Posting Di Social Media</h3>
					<p class=" text-sm text-gray-600 mb-4">
						Cara jualan ini merupakan cara yang mudah untuk menjadi jualan online. Kami menyediakan banyak fasilitas.
					</p>
					<ul class="text-sm text-gray-700 mb-4 list-disc list-inside">
						<li>Fitur produk siap social media di android</li>
						<li>Komen promosi yang di update setiap hari</li>
					</ul>
					<div class="mt-auto text-sm text-green-600 font-medium">
						✅ Member &nbsp;&nbsp; ⭕ Non Member
					</div>
				</div>

				<!--Card-2-->
				<div class="bg-white rounded-2xl shadow-md p-6 flex flex-col transition-all duration-[1500ms] ease-out hover:shadow-2xl hover:scale-[1.03]">
					<img src="assets/images/thumbnails/Nev-1.png" alt="Marketpalce" class="w-full h-65 object-contain mb-4 transition-all duration-[1500ms] ease-out hover:scale-110">
					<h3 class="text-lg font-bold mb-2 text-gray-800">Jualan Di Marketpalce</h3>
					<p class="text-sm text-gray-600 mb-4">
						Anda bisa berjualan banyak di Marketpalce yang sudah kami sediakan, seperti shopee, tokped, lazada dan lainnya
					</p>
					<ul class="text-sm text-gray-700 mb-4 list-disc list-inside">
						<li>Ribuan produk siap diposting</li>
						<li>Anda juga bisa mendapatkan produk dengan sistem dropship</li>
					</ul>
					<div class="mt-auto text-sm text-green-600 font-medium">
						✅ Member &nbsp;&nbsp; ⭕ Non Member
					</div>
				</div>

				<!--Card-3-->
				<div class="bg-white rounded-2xl shadow-md p-6 flex flex-col transition-all duration-[1500ms] ease-out hover:shadow-2xl hover:scale-[1.03]">
					<img src="assets/images/thumbnails/Nev-3.png" alt="FB Ads" class="w-full h-65 object-contain mb-4 transition-all duration-[1500ms] ease-out hover:scale-110">
					<h3 class="text-lg font-bold mb-2 text-gray-800">Jualan dengan FB Ads + COD</h3>
					<p class="text-sm text-gray-600 mb-4">
						Bagi anda yang menguasai GB Ads, silahkan gabung bersama kami dengan sistem iklan di training oleh tim profesional!
					</p>
					<ul class="text-sm text-gray-700 mb-4 list-disc list-inside">
						<li>Pilihan Campaign COD Luar & Dalam Negri</li>
						<li>Belajar Optimasi Iklan Sampai Mahir</li>
					</ul>
					<div class="mt-auto text-sm text-green-600 font-medium">
						✅ Member &nbsp;&nbsp; ⭕ Non Member
					</div>
				</div>
			</div>
		</section>

		<section id="Up-to-date" class="max-w-[1130px] mx-auto flex flex-col items-center justify-center mt-10 px-4 sm:px-6 relative py-8 text-center">
			<div class="text-center">
				<h2 class="text-base sm:text-lg md:text-xl font-extrabold text-lime-700 drop-shadow-md uppercase leading-snug">
					Perkenalkan <br> CUKA NANAS NENAVIN !!!
				</h2>
			</div>
		</section>

		<section class="max-w-4xl mx-auto bg-white rounded-xl shadow-md p-6 flex items-center space-x-6 animate__animated animate__fadeInUp">
			<!-- Gambar Produk -->
			<div class="flex space-x-4">
				<img src="assets/images/thumbnails/Nev-2.png" alt="Botol Nenavin" class="w-100 md:w-80">
			</div>

			<!-- Teks Deskripsi -->
			<div class="div class="text-base md:text-xl text-gray-800">
				<p class="mb-7">
				Produk terlaris dari kami yang telah banyak membantu banyak orang dalam mengelola diabetes dan asam urat.
				</p>
				<p>
				Cuka nanas nenavin berhasil terjual lebih dari <strong>10.000 botol per bulannya</strong> dari sejak produk diluncurkan.
				</p>
			</div>
		</section>

		<section id="Up-to-date" class="max-w-[1130px] mx-auto flex flex-col items-center justify-center mt-10 px-4 sm:px-6 relative py-8 text-center">
			<div class="text-center">
				<h2 class="text-base sm:text-lg md:text-xl font-extrabold text-lime-700 drop-shadow-md uppercase leading-snug">
					Kenapa Harus Cuka <br> Nanas Nenavin ?
				</h2>
			</div>
		</section>

		<section class="max-w-4xl mx-auto p-6 space-y-6">
			<!-- Card 1 -->
			<div class="flex flex-col md:flex-row items-center bg-white shadow-md rounded-xl p-4 space-y-4 md:space-y-0 md:space-x-4">
				<img src="https://cdn-icons-png.flaticon.com/512/3879/3879927.png" alt="Demam Tinggi" class="w-16 h-16 rounded-md border-4 border-blue-500" />
				<div>
					<h3 class="text-lg font-bold">Demam Yang Tinggi</h3>
					<p class="text-sm">Cuka nanas termasuk dalam kategori health food sebagai alternatif pengobatan diabetes dan asam urat, sehingga marketnya sangat besar dan banyak orang yang cari.</p>
				</div>
			</div>

			<!-- Card 2 -->
			<div class="flex flex-col md:flex-row items-center bg-white shadow-md rounded-xl p-4 space-y-4 md:space-y-0 md:space-x-4">
				<div class="flex-1">
					<h3 class="text-lg font-bold">Tidak Perlu Modal Yang Besar</h3>
					<p class="text-sm">Anda tidak perlu mengeluarkan uang hingga jutaan rupiah hanya untuk berjualan.</p>
				</div>
				<img src="https://cdn-icons-png.flaticon.com/512/2910/2910768.png" alt="Modal Kecil" class="w-16 h-16 rounded-md" />
			</div>

			<!-- Card 3 -->
			<div class="flex flex-col md:flex-row items-center bg-white shadow-md rounded-xl p-4 space-y-4 md:space-y-0 md:space-x-4">
				<img src="https://cdn-icons-png.flaticon.com/512/2111/2111656.png" alt="Belum Banyak Pesaing" class="w-16 h-16 rounded-md" />
				<div>
					<h3 class="text-lg font-bold">Belum Banyak Pesaing</h3>
					<p class="text-sm">Belum banyak kompetitor yang bermain di produk cuka nanas baik di pasar online maupun offline, sementara permintaan pasar tinggi.</p>
				</div>
			</div>

			<!-- Card 4 -->
			<div class="flex flex-col md:flex-row items-center bg-white shadow-md rounded-xl p-4 space-y-4 md:space-y-0 md:space-x-4">
				<div class="flex-1">
					<h3 class="text-lg font-bold">Repeat Order Tinggi</h3>
					<p class="text-sm">Efek yang cepat dirasakan plus fungsi produk membuat customer ingin order lagi dan lagi.</p>
				</div>
				<img src="https://cdn-icons-png.flaticon.com/512/1087/1087929.png" alt="Repeat Order" class="w-16 h-16 rounded-md" />
			</div>
		</section>

		<section class="py-12 bg-white">
			<div class="max-w-5xl mx-auto px-4 text-center">
				<h2 class="text-xl md:text-2xl font-semibold text-green-700 mb-8">
				Benefit Buat Anda Yang <br /> Ingin Bergabung
				</h2>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-8">
				<!-- Card 1 -->
				<div class="bg-white shadow-md rounded-2xl p-6 transition duration-300 hover:shadow-lg">
					<h3 class="text-lg font-bold text-gray-800 mb-4">Full Support Konten Promosi</h3>
					<img src="assets/images/thumbnails/benefit1.png" alt="Konten Promosi" class="w-full h-55 object-cover rounded-xl mx-auto mb-4">
					<p class="text-gray-600 text-sm md:text-base">
					Anda akan mendapatkan support materi konten untuk digunakan saat promosi produk
					</p>
				</div>

				<!-- Card 2 -->
				<div class="bg-white shadow-md rounded-2xl p-6 transition duration-300 hover:shadow-lg">
					<h3 class="text-lg font-bold text-gray-800 mb-4">Di Bantu Diiklankan <br class="md:hidden" /> Di Media Sosial</h3>
					<img src="assets/images/thumbnails/benefit2.png" alt="Konten Promosi" class="w-full h-55 object-cover rounded-xl mx-auto mb-4">
					<p class="text-gray-600 text-sm md:text-base">
					Kami akan membantu anda dalam melakukan promosi melalui berbagai macam platform berbayar
					</p>
				</div>
				</div>
			</div>
		</section>


        

		


		
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
<?php echo $__env->make('front.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\belajarbaru\resources\views/front/seller.blade.php ENDPATH**/ ?>