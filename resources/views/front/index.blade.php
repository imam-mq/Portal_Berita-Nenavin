@extends('front.master')
@section('content')
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
				<form method="GET" action="{{route('front.search')}}" 
					class="w-full sm:w-[300px] md:w-[400px] lg:w-[450px] flex items-center rounded-full border border-[#E8EBF4] p-3 sm:p-[12px_20px] gap-2 sm:gap-[10px] focus-within:ring-2 focus-within:ring-[#FF6B18] transition-all duration-300">
					@csrf
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
					<a href="{{ route('front.shop') }}" class="rounded-full border border-[#EEF0F7] p-[12px_22px] font-semibold text-black transition-all duration-300 hover:text-[#FFD700]">
						Belanja
					</a>
					<a href="{{route('front.seller') }}" class="rounded-full p-[12px_22px] flex gap-[10px] font-bold transition-all duration-300 bg-yellow-400 text-black shadow-md hover:shadow-lg">
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
				@foreach($categories as $category)
					<a href="{{ route('front.category', $category->slug) }}" 
						class="flex-shrink-0 bg-white rounded-full px-4 py-2 shadow flex items-center gap-2 font-semibold transition-all duration-300 border border-[#EEF0F7] hover:ring-2 hover:ring-[#FF6B18]">
						<div class="w-6 h-6 flex shrink-0">
							<img src="{{ Storage::url($category->icon) }}" alt="icon" class="w-6 h-6">
						</div>
						<span>{{ $category->name }}</span>
					</a>
				@endforeach
			</div>
		</nav>
		
		<section id="Featured" class="mt-[30px]">
			<div class="main-carousel w-full">
				@forelse($featured_articles as $article)
				<div class="featured-news-card relative w-full h-[550px] sm:h-[450px] md:h-[400px] lg:h-[500px] flex shrink-0 overflow-hidden">
					<img src="{{ Storage::url($article->thumbnail) }}" class="thumbnail absolute w-full h-full object-cover" alt="icon" />
					<div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10"></div>
					<div class="card-detail max-w-[1130px] w-full mx-auto flex flex-col md:flex-row items-end justify-between pb-10 px-4 sm:px-6 md:px-10 relative z-20">
						<div class="flex flex-col gap-[10px]">
							<p class="text-white text-sm md:text-base">Featured</p>
							<a href="{{ route('front.details', $article->slug) }}" class="font-bold text-2xl md:text-3xl lg:text-4xl leading-[30px] md:leading-[40px] text-white hover:underline transition-all duration-300">
								{{ $article->name }}
							</a>
							<p class="text-white text-xs md:text-sm">{{ $article->created_at->format('M D, Y') }} • {{ $article->category->name }}</p>
						</div>
						<div class="prevNextButtons flex items-center gap-3 md:gap-4 mt-4 md:mt-0">
							<button class="button--previous appearance-none w-8 h-8 md:w-[38px] md:h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
								<img src="assets/images/icons/arrow.svg" alt="arrow" class="w-4 md:w-5">
							</button>
							<button class="button--next appearance-none w-8 h-8 md:w-[38px] md:h-[38px] flex items-center justify-center rounded-full shrink-0 ring-1 ring-white hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 rotate-180">
								<img src="assets/images/icons/arrow.svg" alt="arrow" class="w-4 md:w-5">
							</button>
						</div>
					</div>
				</div>
				@empty
				<p class="text-center text-white">Belum ada data...</p>
				@endforelse
			</div>
		</section>

		<section id="Up-to-date" class="max-w-[1130px] mx-auto flex flex-col gap-6 mt-10 px-4">
			<div class="flex flex-col sm:flex-row sm:justify-between sm:items-center text-center sm:text-left gap-4">
				<h2 class="font-bold text-2xl sm:text-3xl leading-[39px]">
					Latest Hot News <br />
					Good for Curiosity
				</h2>
				<p class="badge-orange rounded-full px-4 py-2 bg-[#FFECE1] font-bold text-sm text-[#FF6B18] w-fit mx-auto sm:mx-0">
					UP TO DATE
				</p>
			</div>

			
			<!-- Grid Responsif -->
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
				@forelse($articles as $article)
				<a href="{{route('front.details', $article->slug)}}" class="card-news">
					<div class="rounded-2xl ring-1 ring-gray-200 p-6 flex flex-col gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300 bg-white shadow-md">
						<div class="w-full h-[200px] rounded-2xl overflow-hidden relative">
							<p class="absolute top-4 left-4 bg-white text-xs font-bold px-4 py-2 rounded-full">
								{{$article->category?->name}}
							</p>
							<img src="{{Storage::url($article->thumbnail)}}" class="object-cover w-full h-full" alt="thumbnail" />
						</div>
						<div class="flex flex-col gap-2">
							<h3 class="font-bold text-lg">{{$article->name}}</h3>
							<p class="text-sm text-gray-500">{{$article->created_at->format('M d, Y')}}</p>
						</div>
					</div>
				</a>
				@empty
				<p class="col-span-full text-center text-gray-500">Belum ada data terbaru...</p>
				@endforelse
			</div>
		</section>

		
		<section id="Best-authors" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px]">
			<div class="flex flex-col text-center gap-3 items-center px-4 sm:px-0">
				<p class="badge-orange rounded-full px-5 py-2 bg-[#FFECE1] font-bold text-sm leading-[21px] text-[#FF6B18] w-fit">Cuka Nanas Nenavin</p>
				<h2 class="font-bold text-[20px] sm:text-[26px] leading-[32px] sm:leading-[39px]">
					Segera Pesan Sekarang Dan Dapatkan Promo <br class="hidden sm:block"/>
					Solusi Turunkan Gejala Diabetes 👇
				</h2>
			</div>
			<!-- <div class="grid grid-cols-6 gap-[30px]">


				@forelse($authors as $author)
				<a href="{{route('front.author', $author->slug)}}" class="card-authors">
					<div class="rounded-[20px] border border-[#EEF0F7] p-[26px_20px] flex flex-col items-center gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
						<div class="w-[70px] h-[70px] flex shrink-0 rounded-full overflow-hidden">
							<img src="{{Storage::url($author->avatar)}}" class="object-cover w-full h-full" alt="avatar" />
						</div>
						<div class="flex flex-col gap-1 text-center">
							<p class="font-semibold">{{$author->name}}</p>
							<p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $author->articles?->count() ?? 0 }} News</p>
						</div>
					</div>
				</a>
				@empty
				<p>belum ada data....</p>
				@endforelse


			</div> -->
		</section>
		<section id="Advertisement" class="max-w-[1130px] mx-auto flex justify-center mt-[70px] px-4">
			<div class="flex flex-col gap-3 shrink-0 w-full sm:w-fit">
				<a href="{{$bannerads->link}}">
					<div class="w-full sm:w-[900px] h-auto flex shrink-0 border border-[#EEF0F7] rounded-2xl overflow-hidden">
						<img src="{{Storage::url($bannerads->thumbnail)}}" class="object-cover w-full h-full sm:h-[120px] aspect-[3/1]" alt="ads" />
					</div>
				</a>
				<p class="font-medium text-sm leading-[21px] text-[#A3A6AE] flex gap-1 justify-center sm:justify-start ">
					Our Advertisement <a href="#" class="w-[18px] h-[18px]"><img src="assets/images/icons/message-question.svg" alt="icon" /></a>
				</p>
			</div>
		</section>
		<section id="Latest-entertainment" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px] px-4">
			<div class="flex flex-col sm:flex-row justify-between items-center text-center sm:text-left">
				<h2 class="font-bold text-[22px] sm:text-[26px] leading-[30px] sm:leading-[39px]">
					Rekomendasi makanan untuk penderita <br class="hidden sm:block" />
					Diabetes
				</h2>
			</div>
			<div class="flex flex-col sm:flex-row justify-between items-center h-fit gap-5">
				<div class="relative w-full md:h-[424px] flex flex-1 rounded-2xl overflow-hidden">
					<img src="{{Storage::url($entertaiment_featured_articles->thumbnail)}}" class="absolute w-full h-full object-cover" alt="icon" />
					<div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10"></div>
					<div class="card-detail w-full flex items-end p-[20px] sm:p-[30px] relative z-20">
						<div class="flex flex-col gap-[10px]">
							<p class="text-white text-sm sm:text-base">Featured</p>
							<a href="details.html" class="font-bold text-[20px] sm:text-[30px] leading-[26px] sm:leading-[36px] text-white hover:underline transition-all duration-300">
								{{$entertaiment_featured_articles->name}}
							</a>
							<p class="text-white text-sm sm:text-base">{{$entertaiment_featured_articles->created_at->format('M D, Y')}}</p>
						</div>
					</div>
				</div>
				<div class="h-[300px] sm:h-[424px] w-full sm:w-1/2 px-4 sm:px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
					<div class="w-full sm:w-[455px] flex flex-col gap-5 shrink-0">
						@forelse($entertaiment_articles as $article)
						<a href="{{route('front.details', $article->slug)}}" class="card py-[2px]">
							<div class="rounded-[20px] border border-[#EEF0F7] p-[10px] sm:p-[14px] flex items-center gap-3 sm:gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
								<div class="w-[90px] sm:w-[130px] h-[70px] sm:h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
									<img src="{{Storage::url($article->thumbnail)}}" class="object-cover w-full h-full" alt="thumbnail" />
								</div>
								<div class="flex flex-col justify-center gap-[4px] sm:gap-[6px]">
									<h3 class="font-bold text-base sm:text-lg leading-[22px] sm:leading-[27px]">{{ substr($article->name, 0, 50) }}...</h3>
									<p class="text-sm leading-[21px] text-[#A3A6AE]">{{$article->created_at->format('M D, Y')}}</p>
								</div>
							</div>
						</a>
						@empty
						<p>Belum ada artikel baru</p>
						@endforelse
					</div>
					<div class="sticky z-10 bottom-0 w-full h-[50px] sm:h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]"></div>
				</div>
			</div>
		</section>


		<section id="Latest-sports" class="max-w-[1130px] mx-auto flex flex-col gap-[30px] mt-[70px] px-4">
			<div class="flex flex-col sm:flex-row justify-between items-center text-center sm:text-left">
				<h2 class="font-bold text-[22px] sm:text-[26px] leading-[30px] sm:leading-[39px]">
					Rekomendasi Olahraga untuk Kesehatan <br class="hidden sm:block" />
					Diabetes
				</h2>
			</div>

			<div class="flex flex-col sm:flex-row justify-between items-center h-fit gap-5">
				{{-- Featured Olahraga --}}
				@if($olahraga_featured_articles)
				<div class="relative w-full md:h-[424px] flex flex-1 rounded-2xl overflow-hidden">
					<img src="{{ Storage::url($olahraga_featured_articles->thumbnail) }}" class="absolute w-full h-full object-cover" alt="icon" />
					<div class="w-full h-full bg-gradient-to-b from-[rgba(0,0,0,0)] to-[rgba(0,0,0,0.9)] absolute z-10"></div>
					<div class="card-detail w-full flex items-end p-[20px] sm:p-[30px] relative z-20">
						<div class="flex flex-col gap-[10px]">
							<p class="text-white text-sm sm:text-base">Featured</p>
							<a href="{{ route('front.details', $olahraga_featured_articles->slug) }}" class="font-bold text-[20px] sm:text-[30px] leading-[26px] sm:leading-[36px] text-white hover:underline transition-all duration-300">
								{{ $olahraga_featured_articles->name }}
							</a>
							<p class="text-white text-sm sm:text-base">{{ $olahraga_featured_articles->created_at->format('M d, Y') }}</p>
						</div>
					</div>
				</div>
				@else
				<p class="text-center text-gray-500">Tidak ada artikel olahraga unggulan.</p>
				@endif

				{{-- Artikel Olahraga Non-Featured --}}
				<div class="h-[300px] sm:h-[424px] w-full sm:w-1/2 px-4 sm:px-5 overflow-y-scroll overflow-x-hidden relative custom-scrollbar">
					<div class="w-full sm:w-[455px] flex flex-col gap-5 shrink-0">
						@forelse($olahraga_articles as $article)
						<a href="{{ route('front.details', $article->slug) }}" class="card py-[2px]">
							<div class="rounded-[20px] border border-[#EEF0F7] p-[10px] sm:p-[14px] flex items-center gap-3 sm:gap-4 hover:ring-2 hover:ring-[#FF6B18] transition-all duration-300">
								<div class="w-[90px] sm:w-[130px] h-[70px] sm:h-[100px] flex shrink-0 rounded-[20px] overflow-hidden">
									<img src="{{ Storage::url($article->thumbnail) }}" class="object-cover w-full h-full" alt="thumbnail" />
								</div>
								<div class="flex flex-col justify-center gap-[4px] sm:gap-[6px]">
									<h3 class="font-bold text-base sm:text-lg leading-[22px] sm:leading-[27px]">{{ substr($article->name, 0, 50) }}...</h3>
									<p class="text-sm leading-[21px] text-[#A3A6AE]">{{ $article->created_at->format('M d, Y') }}</p>
								</div>
							</div>
						</a>
						@empty
						<p class="text-gray-500">Belum ada artikel olahraga baru.</p>
						@endforelse
					</div>
					<div class="sticky z-10 bottom-0 w-full h-[50px] sm:h-[100px] bg-gradient-to-b from-[rgba(255,255,255,0.19)] to-[rgba(255,255,255,1)]"></div>
				</div>
			</div>
		</section>


	</body>
@endsection
@push('after-styles')
<!-- CSS -->
<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
@endpush

@push('after-scripts')
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