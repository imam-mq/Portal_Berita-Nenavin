@extends('front.master')
@section('content')
<body class="font-[Poppins] pb-[83px]">
		<nav id="Navbar" class="max-w-[1130px] mx-auto flex justify-between items-center mt-[30px]">
			<div class="flex items-center gap-4">
				<!-- Logo -->
				<a href="#" class="flex shrink-0">
					<img src="{{asset('assets/images/logos/logo_nenavin_1.png')}}" class="w-auto max-w-[80px] sm:max-w-[100px] md:max-w-[120px] lg:max-w-[150px] h-auto" alt="logo" />
				</a>

				<!-- Garis Border -->
				<div class="hidden sm:block border border-[#E8EBF4] h-8 sm:h-10 md:h-12 lg:h-16 xl:h-20 2xl:h-24 w-px"></div>

				<!-- Form Pencarian -->
				<form method="GET" action="{{route('front.search')}}" class="w-full sm:w-[300px] md:w-[400px] lg:w-[450px] flex items-center rounded-full border border-[#E8EBF4] p-3 sm:p-[12px_20px] gap-2 sm:gap-[10px] focus-within:ring-2 focus-within:ring-[#FF6B18] transition-all duration-300">
					@csrf
					<button type="submit" class="w-4 h-4 sm:w-5 sm:h-5 flex shrink-0 focus:outline-none">
						<img src="{{asset('assets/images/icons/search-normal.svg')}}" alt="icon" />
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
		<nav id="Category" class="max-w-[1130px] mx-auto flex justify-center items-center gap-3 mt-5">
			<div class="category-container flex overflow-x-auto space-x-3 px-3 py-2" style="scrollbar-width: none; -ms-overflow-style: none;">
				@foreach($categories as $item_category)
					<a href="{{ route('front.category', $item_category->slug) }}" 
						class="flex-shrink-0 bg-white rounded-full p-[8px_18px] flex items-center gap-[8px] font-medium text-sm transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] shadow">
						<div class="w-5 h-5 flex shrink-0">
							<img src="{{ Storage::url($item_category->icon) }}" alt="icon" class="w-5 h-5">
						</div>
						<span>{{ $item_category->name }}</span>
					</a>
				@endforeach
			</div>
		</nav>

		<section id="Category-result" class="max-w-[1130px] mx-auto flex items-center flex-col gap-[30px] mt-[70px] px-4">
			<h1 class="text-3xl md:text-4xl leading-[40px] md:leading-[45px] font-bold text-center">
				Explore Our <br />
				{{$category->name}} News
			</h1>
			
			<div id="search-cards" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[20px] md:gap-[30px] w-full">
				@forelse($category->news as $news)
					<a href="{{route('front.details', $news->slug)}}" class="card w-full">
						<div class="flex flex-col gap-4 p-5 transition-all duration-300 ring-1 ring-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18] rounded-[15px] overflow-hidden bg-white">
							
							<!-- Thumbnail -->
							<div class="thumbnail-container h-[180px] sm:h-[200px] relative rounded-[15px] overflow-hidden">
								<div class="badge absolute left-4 top-4 flex p-[6px_14px] bg-white rounded-full shadow-sm">
									<p class="text-xs leading-[16px] font-bold uppercase">{{$news->category->name}}</p>
								</div>
								<img src="{{Storage::url($news->thumbnail)}}" alt="thumbnail photo" class="w-full h-full object-cover" />
							</div>

							<!-- News Content -->
							<div class="flex flex-col gap-2">
								<h3 class="text-base sm:text-lg leading-[24px] sm:leading-[27px] font-bold">
									{{ substr($news->name, 0, 50) }}....
								</h3>
								<p class="text-xs sm:text-sm leading-[18px] sm:leading-[21px] text-[#A3A6AE]">
									{{$news->created_at->format('M D, Y')}}
								</p>
							</div>
						</div>
					</a>
				@empty
					<p class="text-center text-gray-500">Belum Ada Artikel Terkait Kategori Berikut</p>
				@endforelse
			</div>
		</section>

		<section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px] px-4">
			<div class="flex flex-col gap-3 shrink-0 w-full md:w-fit">
				<a href="{{$bannerads->link}}">
					<div class="w-full md:w-[950px] h-auto flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
						<img src="{{Storage::url($bannerads->thumbnail)}}" class="object-contain w-full h-full" alt="ads" />
					</div>
				</a>
			</div>
		</section>

</body>
@endsection

@push('after-scripts')
<script src="https://cdn.tailwindcss.com"></script>
<script src="{{asset('customjs/two-lines-text.js')}}"></script>
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
@endpush