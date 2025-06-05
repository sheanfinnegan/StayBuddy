@extends('layouts.app')

@section('content')
    <div class="z-[0]" id="map"></div>
    <div class="fullnav w-fit pr-7 flex justify-between absolute top-0 left-0 z-10">
        <div
            class="nav w-fit pl-5 pt-7 pb-7 flex flex-col gap-4 items-center bg-putih shadow-[2px_3px_5px_rgba(0,0,0,0.25)] h-fit ">
            <div class="flex flex-row gap-2 items-center">
                <div class="img-container w-[30%]">
                    <img class="w-[160px]" src="{{ asset('assets/LogoStayBuddy.png') }}" alt="logo">
                </div>
                <div class="flex flex-col gap-[5px] w-[55%]">
                    <div class="search relative">
                        <input type="text"
                            class="text-[10px] bg-white border-2 border-maroon px-3 py-[2.5px] rounded-2xl w-full pr-6"
                            name="search" id="search" placeholder="Cari Lokasi...">
                        <img src="{{ asset('assets/search.png') }}" alt=""
                            class="searchIcon w-[10px] absolute right-3 top-2.5">
                    </div>

                    <div class="flex flex-row gap-2 items-center w-full">
                        <select name="price" id="price"
                            class="text-[10px] w-[50%] bg-white border-2 border-maroon pl-1 pr-3 py-[1px] rounded-2xl">
                            <option value="" disabled selected hidden>Harga</option>
                            <option value="u1">
                                < 1 Juta</option>
                            <option value="b12">1 - 2 Juta</option>
                            <option value="b2-3">2 - 3 Juta</option>
                            <option value="m3">> 3 Juta</option>
                        </select>
                        <select name="jenisSewa" id="jenisSewa"
                            class="text-[10px] w-[50%] bg-white border-2 border-maroon pl-1 pr-3 py-[1px] rounded-2xl">
                            <option value="" disabled selected hidden>Durasi</option>
                            <option value="bulanan">Bulanan</option>
                            <option value="tahunan">Tahunan</option>
                        </select>
                    </div>

                </div>
            </div>
            <div class="w-full text-center hidden dropArrow">
                <button>
                    <img class="dropDown w-[27px]" src="{{ asset('assets/Dropdown.png') }}" alt="">
                </button>
            </div>
        </div>

    </div>
    <div class="absolute top-0 right-0 z-10 flex items-center pr-5">
        <img src="{{ asset('assets/Profile.png') }}" alt=""
            class="w-[75px] pt-3 hover:scale-[1.1] animation-all duration-100">
    </div>
    {{-- <div class="bg-[url('/public/assets/maps.png')] w-full h-[100vh]  bg-cover bg-center"></div> --}}

    <div class="homeResult opacity-0 absolute top-[115px] left-7 z-50">
        <h1 class="text-maroon font-popReg text-[18px] pl-1">Result</h1>
        <div
            class="homeList max-w-[300px] flex flex-col gap-2 mt-[7px] h-[350px] overflow-auto pl-1 pt-[2px] custom-scroll">
            {{-- <div id="1"
                class="homeCardContainer flex flex-col gap-5 bg-white border-2 border-maroon rounded-xl px-4 py-3 shadow-[2px_3px_5px_rgba(0,0,0,0.25)]  max-w-[285px] hover:scale-[1.01] duration-100 hover:cursor-pointer">
                <div class="homeCard flex flex-col gap-2 items-center">
                    <div class="homeInfo1 flex gap-[7px] items-center">
                        <div class="homeTitle w-[65%]">
                            <h1 class="text-[15px] font-popReg text-maroon mb-[1px]">Kos Bu Hani - 0.5 km</h1>
                            <div class="flex flex-row gap-1 items-center font-popReg text-[10px] text-[rgba(0,0,0,0.35)]">
                                <p class="rating">4.3</p>
                                <x-star-rating :rating="4.3" />
                                <p class="review">(500)</p>
                            </div>
                            <p class="text-[10px] font-nunitoBold text-[rgba(0,0,0,0.35)]">Jl. Raya Jungle Land Avenue No.
                                68, Babakan Madang</p>
                        </div>
                        <div class="homeImage w-[35%]">
                            <img class="w-full" src="{{ asset('assets/homeTest.png') }}" alt="">
                        </div>

                    </div>
                    <div
                        class="homeInfo2 w-full font-nunitoBold text-[9px] text-[rgba(0,0,0,0.35)] flex gap-4 items-center justify-start">
                        <div class="homePrice">
                            Rp. 20 Juta/bulan (5 pax)
                        </div>
                        <div class="homeStatus flex gap-1 items-center">
                            <div class="w-[7px] h-[7px] rounded-full bg-[rgba(0,0,0,0.35)]"></div>
                            <p>Available (4 Waiting List)</p>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>

    <div class="homeDetail absolute top-0 left-[37%] h-full hidden items-center w-fit z-20 duration-200">


    </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        //map
        const map = L.map('map', {
            center: [-6.2, 106.8166], // Jakarta
            zoom: 15, // Lebih dekat
            zoomControl: false,
            scrollWheelZoom: true,
            touchZoom: 'center' // Dua jari pinch zoom lebih halus
        });
        L.control.zoom({
            position: 'bottomright'
        }).addTo(map);

        L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
            maxZoom: 19,
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);

        var customIcon = L.icon({
            iconUrl: 'assets/iconOrang.png', // path ke icon di folder public
            iconSize: [40, 40],
            iconAnchor: [16, 32],
            popupAnchor: [0, -32]
        });

        var lastMarker = null;
        var lastCircle = null;

        let dropArrow = document.querySelector('.dropArrow');
        let nav = document.querySelector('.nav');
        let marker = [];

        map.on('dblclick', function(e) {
            // nav.classList.add('h-screen');
            // nav.classList.remove('h-fit');
            // hapus marker dan lingkaran lama kalau ada
            if (dropArrow.classList.contains('hidden')) {
                dropArrow.classList.remove('hidden');
                nav.classList.remove('pb-7');
                nav.classList.add('pb-3');
            }

            if (lastMarker) {
                map.removeLayer(lastMarker);
            }
            if (lastCircle) {
                map.removeLayer(lastCircle);
            }

            if (marker) {
                marker.forEach(m => map.removeLayer(m));
            }
            marker = [];

            // buat marker baru
            lastMarker = L.marker(e.latlng, {
                    icon: customIcon
                })
                .addTo(map)
                .bindPopup('Mencari Homestay Terdekat...', {
                    className: 'custom-popup'
                })
                .openPopup();


            // buat lingkaran merah transparan radius 5000 meter (5 km)
            lastCircle = L.circle(lastMarker.getLatLng(), {
                color: 'red', // warna garis pinggir
                fillColor: 'red', // warna isi
                weight: 1.5, // ketebalan garis pinggir
                fillOpacity: 0.2, // transparansi isi (0 = transparan penuh, 1 = solid)
                radius: 300 // radius dalam meter
            }).addTo(map);

            fetch(`/ajax/search-nearby?lat=${e.latlng.lat}&lng=${e.latlng.lng}&radius=300`)
                .then(res => res.json())
                .then(data => {
                    // data.results adalah array tempat-tempat dari backend
                    // bisa bikin marker baru untuk tiap tempat
                    const results = data.results;

                    // Update popup info marker

                    // Clear results container
                    resultsContainer.innerHTML = '';

                    if (results.length === 0) {
                        resultsContainer.innerHTML = '<p>Tidak ada hasil.</p>';
                        return;
                    }

                    // Simpan markers hasil pencarian untuk nanti bisa dihapus
                    marker = [];

                    // Render marker dan results
                    results.forEach(item => {
                        // Tambah marker ke map
                        const mark = L.marker([item.geocodes.main.latitude, item.geocodes.main
                                .longitude
                            ])
                            .addTo(map)
                            .bindPopup(item.name);
                        marker.push(mark);
                    });

                    // Render results list
                    resultsContainer.innerHTML = results.map(item => {
                        const categoryName = item.categories?.[0]?.name || 'Kategori tidak diketahui';
                        return `
        <div id="${item.fsq_id}"
            class="homeCardContainer flex flex-col gap-5 bg-white border-2 border-maroon rounded-xl px-4 py-3 shadow-[2px_3px_5px_rgba(0,0,0,0.25)] max-w-[285px] hover:scale-[1.01] duration-100 hover:cursor-pointer">
            <div class="homeCard flex flex-col gap-2 items-center">
                <div class="homeInfo1 flex gap-[7px] items-center">
                    <div class="homeTitle w-[65%]">
                        <h1 class="text-[15px] font-popReg text-maroon mb-[1px]">${item.name}</h1>
                        <div class="flex flex-row gap-1 items-center font-popReg text-[10px] text-[rgba(0,0,0,0.35)]">
                            <p class="rating">4.3</p>
                            <x-star-rating :rating="4.3" />
                            <p class="review">(500)</p>
                        </div>
                        <p class="text-[10px] font-nunitoBold text-[rgba(0,0,0,0.35)]">${item.location.formatted_address}</p>
                    </div>
                    <div class="homeImage w-[35%]">
                        <img class="w-full" src="{{ asset('assets/homeTest.png') }}" alt="">
                    </div>
                </div>
                <div class="homeInfo2 w-full font-nunitoBold text-[9px] text-[rgba(0,0,0,0.35)] flex gap-4 items-center justify-start">
                    <div class="homePrice">${categoryName}</div>
                    <div class="homeStatus flex gap-1 items-center">
                        <div class="w-[7px] h-[7px] rounded-full bg-[rgba(0,0,0,0.35)]"></div>
                        <p>Available (4 Waiting List)</p>
                    </div>
                </div>
            </div>
        </div>`;
                    }).join('');

                    if (nav.classList.contains('h-fit')) {
                        nav.classList.add('h-screen');
                        nav.classList.remove('h-fit');
                        result.classList.remove('opacity-0');
                        result.classList.add('opacity-100');
                        dropDown.src = "{{ asset('assets/Dropup.png') }}";
                    }
                })
                .catch(err => {
                    lastMarker.getPopup().setContent('Gagal mencari tempat').openOn(map);
                    resultsContainer.innerHTML = '<p>Gagal memuat data.</p>';
                });



        });

        //handle search
        const input = document.getElementById('search');
        const resultsContainer = document.querySelector('.homeList');
        console.log(resultsContainer);
        const searchIcon = document.querySelector('.searchicon');
        let markersLayer = L.layerGroup().addTo(map); // Layer khusus marker supaya gampang clear

        function doSearch() {

            // nav.classList.add('h-screen');
            // nav.classList.remove('h-fit');

            if (lastMarker) {
                map.removeLayer(lastMarker);
            }
            if (lastCircle) {
                map.removeLayer(lastCircle);
            }

            if (marker) {
                marker.forEach(m => map.removeLayer(m));
            }
            marker = [];
            const query = input.value.trim();
            console.log(query);
            if (!query) {
                resultsContainer.innerHTML = '';
                markersLayer.clearLayers(); // hapus marker lama juga
                return;
            }

            fetch(`/ajax/search-location?query=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    const results = data.results;
                    console.log(results);
                    markersLayer.clearLayers(); // hapus marker lama dulu // pastikan results adalah array
                    if (!results || results.length === 0) {
                        resultsContainer.innerHTML = '<p>Tidak ada hasil.</p>';
                        return;
                    }

                    resultsContainer.innerHTML = results.map(item => {
                        const categoryName = item.categories?.[0]?.name || 'Kategori tidak diketahui';
                        const photos = item.photos || []; // asumsi: sudah merge data di backend


                        const imageHtml = photos.length >
                            0 ?
                            `<img class="w-full h-[65px] object-cover" src="${photos[0].url}" alt="${item.name}">` :
                            `<img class="w-full h-fit" src="/assets/homeTest.png" alt="Default image">`;

                        return `
            <div data-fsq-id="${item.details.fsq_id}"
                class="homeCardContainer flex flex-col gap-5 bg-white border-2 border-maroon rounded-xl px-4 py-3 shadow-[2px_3px_5px_rgba(0,0,0,0.25)] max-w-[285px] hover:scale-[1.01] duration-100 hover:cursor-pointer">
                <div class="homeCard flex flex-col gap-2 items-center">
                    <div class="homeInfo1 flex gap-[7px] items-center">
                        <div class="homeTitle w-[65%]">
                            <h1 class="text-[15px] font-popReg text-maroon mb-[1px]">${item.name}</h1>
                            <div class="flex flex-row gap-1 items-center font-popReg text-[10px] text-[rgba(0,0,0,0.35)]">
                                <p class="rating">4.3</p>
                                <x-star-rating :rating="4.3" />
                                <p class="review">(500)</p>
                            </div>
                            <p class="text-[10px] font-nunitoBold text-[rgba(0,0,0,0.35)]">
                                ${item.location?.formatted_address ?? 'Alamat tidak tersedia'}
                            </p>
                        </div>
                        <div class="homeImage w-[35%]">
                            ${imageHtml}
                        </div>
                    </div>
                    <div class="homeInfo2 w-full font-nunitoBold text-[9px] text-[rgba(0,0,0,0.35)] flex gap-4 items-center justify-start">
                        <div class="homePrice">${categoryName}</div>
                        <div class="homeStatus flex gap-1 items-center">
                            <div class="w-[7px] h-[7px] rounded-full bg-[rgba(0,0,0,0.35)]"></div>
                            <p>Available (4 Waiting List)</p>
                        </div>
                    </div>
                </div>
            </div>
            `;
                    }).join('');



                    // Tambahkan marker di peta per hasil search
                    results.forEach(place => {
                        const lat = place.details.geocodes?.main?.latitude;
                        const lng = place.details.geocodes?.main?.longitude;

                        if (lat && lng) {
                            mark = L.marker([lat, lng]).addTo(markersLayer);
                            mark.bindPopup(
                                `<strong>${place.name}</strong><br>${place.location?.formatted_address ?? ''}`
                            );
                            marker.push(mark);
                        }
                    });

                    // Optional: Zoom peta ke semua marker
                    const group = new L.featureGroup(markersLayer.getLayers());
                    map.fitBounds(group.getBounds().pad(0.5));

                    if (nav.classList.contains('h-fit')) {
                        nav.classList.add('h-screen');
                        nav.classList.remove('h-fit');
                        result.classList.remove('opacity-0');
                        result.classList.add('opacity-100');
                        dropDown.src = "{{ asset('assets/Dropup.png') }}";
                    }

                    let listHome = document.querySelectorAll(".homeCardContainer")
                    if (dropArrow.classList.contains('hidden')) {
                        dropArrow.classList.remove('hidden');
                        nav.classList.remove('pb-7');
                        nav.classList.add('pb-3');

                    }
                    listHome.forEach(home => {
                        home.addEventListener("click", () => {
                            let id = home.getAttribute("data-fsq-id");
                            let item = results.find(i => i.details.fsq_id === id);
                            renderHomeDetail(item);







                        })
                    });



                });

        }

        // Event enter dan click icon (sama seperti sebelumnya)
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                doSearch();
            }
        });

        function renderHomeDetail(home) {
            let homeDetail = document.querySelector('.homeDetail');
            homeDetail.classList.remove('hidden');
            homeDetail.classList.add('flex');
            let photos = home.photos?.slice(0, 5) || [];
            homeDetail.innerHTML = `
            <div
            class="homeDetailCard bg-white border-2 border-maroon rounded-xl px-6 py-3 shadow-[3px_6px_5px_rgba(0,0,0,0.25)] w-[265px] h-[450px]">
            <div class="maxCon w-full h-[420px] mt-1 overflow-auto custom-scroll">
                <div class="w-full max-w-xl mx-auto mb-2">
                    <!-- Main Image -->
                    <img id="mainImage" class="w-full h-[128px] object-cover" src="${home.photos?.[0]?.url || asset('assets/homeTest.png')}"
                        alt="Main Image">

                    <!-- Thumbnail Images -->
                    <div class="flex justify-start mt-1 gap-1">
                        ${photos.map((photo, index) => `
                                            <img class="thumb w-[42px] h-10 object-cover cursor-pointer ${index === 0 ? 'opacity-100 border-1 border-yellow-400' : 'opacity-50'}"
                                                src="${photo.url || asset('assets/hs-' + (index + 1) + '.png')}" alt="">
                                        `).join('')}
                       
                    </div>
                </div>
                <div class="homeTitle w-full">
                    <h1 class="text-[16px] font-popB text-maroon mb-[1px]">${home.name}</h1>
                    <div class="flex flex-row gap-1 items-center font-popReg text-[10px] text-[rgba(0,0,0,0.35)]">
                        <p class="rating">4.3</p>
                        <x-star-rating :rating="4.3" />
                        <p class="review">(500)</p>
                    </div>
                    <p class="text-[10px] text-[rgba(0,0,0,0.35)]">${home.location.formatted_address}</p>
                </div>

                <div class="w-full flex flex-col items-center mt-1">
                    <div
                        class="tabControl flex gap-2 text-[10px] text-maroon font-nunitoBold w-full justify-center relative">
                        <p class="tab cursor-pointer" data-tab="overview">Overview</p>
                        <p class="tab cursor-pointer" data-tab="review">Reviews</p>
                        <!-- Underline -->
                        <div id="underline"
                            class="absolute bottom-[-3px] h-[2px] bg-gray-400 transition-all duration-300 left-0">
                        </div>
                    </div>
                </div>

                <div class="tabArea">

                </div>

            </div>

        </div>

            `
            let tabs = null;
            setTimeout(() => {
                tabs = document.querySelectorAll(".tab");
                console.log(tabs);

                let tabContent = document.querySelector(".tabArea")
                renderTab("overview", tabContent, tabs);
                tabs.forEach((tab) => {
                    tab.addEventListener("click", () => {
                        // const tabRect = tab.getBoundingClientRect();
                        // const parentRect = tab.parentElement.getBoundingClientRect();
                        renderTab(tab.dataset.tab, tabContent, tabs, home);
                    });
                });

                const mainImage = document.getElementById("mainImage");
                const thumbnails = document.querySelectorAll(".thumb");
                let currentIndex = 0;
                let autoSlide;

                const updateMainImage = (index) => {
                    currentIndex = index;
                    mainImage.src = thumbnails[index].src;

                    thumbnails.forEach((thumb, i) => {
                        if (i === index) {
                            thumb.classList.add("opacity-100", "border-yellow-400", "border-1");
                            thumb.classList.remove("opacity-50");
                        } else {
                            thumb.classList.remove("opacity-100", "border-yellow-400", "border-1");
                            thumb.classList.add("opacity-50");
                        }
                    });
                };

                const startAutoSlide = () => {
                    autoSlide = setInterval(() => {
                        currentIndex = (currentIndex + 1) % thumbnails.length;
                        updateMainImage(currentIndex);
                    }, 5000);
                };

                thumbnails.forEach((thumb, index) => {
                    thumb.addEventListener("click", () => {
                        clearInterval(autoSlide); // stop current interval
                        updateMainImage(index);
                        startAutoSlide(); // restart auto-slide after manual click
                    });
                });

                // Start on page load
                updateMainImage(currentIndex);
                startAutoSlide();


            }, 0);

        }



        function renderTab(tab, tabContent, tabs, home) {
            // Render konten
            tabContent.innerHTML = tab === "overview" ? renderOverview(home) : renderReview(home);

            // Geser underline
            const tabEl = [...tabs].find(t => t.dataset.tab === tab);
            const underline = document.getElementById("underline");
            underline.style.width = tabEl.offsetWidth + "px";
            underline.style.left = tabEl.offsetLeft + "px";
        }

        function renderOverview() {
            return `
        <div class="container">
                        <p class="price text-[11px] text-maroon mt-2">Mulai dari</p>
                        <p class="priceInfo font-popB text-red-600 text-[14px]">Rp. 20 Juta /bulan</p>
                        <p class="contact text-maroon font-popB text-[14px] mt-2">Contact</p>
                        <p class="contactInfo text-maroon text-[12px]">+62 81228831149</p>
                        <p class="facTitle text-maroon font-popB text-[14px] mt-2">Facility</p>
                        <div class="facilities w-full flex gap-4 text-[11px] mt-2  text-maroon">
                            <div class="leftFac w-[55%] gap-3 flex flex-col">
                                <div class="area flex items-center gap-2.5">
                                    <ion-icon class="text-[17px] text-black" name="business-outline"></ion-icon>
                                    <p>50.0 m(sq)</p>
                                </div>
                                <div class="bedrooms flex items-center gap-2.5">
                                    <ion-icon class="text-[17px] text-black" name="bed-outline"></ion-icon>
                                    <p>5 bedroom(s)</p>
                                </div>
                                <div class="ac flex items-center gap-2.5">
                                    <ion-icon class="text-[17px] text-black" name="snow-outline"></ion-icon>
                                    <p>Air Conditioning</p>
                                </div>
                                <div class="bathrooms flex items-center gap-2.5">
                                    <ion-icon class="text-[17px] text-black" name="color-fill-outline"></ion-icon>
                                    <p>5 bathroom(s)</p>
                                </div>
                                <div class="kitchen flex items-center gap-2.5">
                                    <ion-icon class="text-[17px] text-black" name="restaurant-outline"></ion-icon>
                                    <p>Kitchen</p>
                                </div>
                            </div>
                            <div class="rightFac w-[45%] gap-3 flex flex-col">
                                <div class="capacity flex items-center gap-2.5">
                                    <ion-icon class="text-[17px] text-black" name="people-outline"></ion-icon>
                                    <p>5 pax</p>
                                </div>
                                <div class="hotWater flex items-center gap-2.5">
                                    <ion-icon class="text-[17px] text-black" name="thermometer-outline"></ion-icon>
                                    <p>Hot Water</p>
                                </div>
                                <div class="refri flex items-center gap-2.5">
                                    <ion-icon class="text-[17px] text-black" name="cube-outline"></ion-icon>
                                    <p>Refrigerator</p>
                                </div>
                                <div class="wifi flex items-center gap-2.5">
                                    <ion-icon class="text-[17px] text-black" name="wifi-outline"></ion-icon>
                                    <p>Wi-Fi</p>
                                </div>
                                <div class="tv flex items-center gap-2.5">
                                    <ion-icon class="text-[17px] text-black" name="tv-outline"></ion-icon>
                                    <p>Smart TV</p>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="waitList w-full mt-5">
                        <div
                            class="buddies flex justify-between w-full border-black px-2 py-1 items-center border-t-[0.5px]">
                            <div class="profile">
                                <div class="flex items-center">
                                <!-- Contoh 3 avatar kosong -->
                                <div class="flex -space-x-4">
                                    <div class="w-7 h-7 rounded-full border border-gray-400 bg-white"></div>
                                    <div class="w-7 h-7 rounded-full border border-gray-400 bg-white"></div>
                                    <div class="w-7 h-7 rounded-full border border-gray-400 bg-white"></div>

                                    <!-- Lingkaran dengan ikon user-plus -->
                                    <div class="w-7 h-7 rounded-full border border-gray-400 bg-white flex items-center justify-center">
                                    <i class="fas fa-user-plus text-black text-[10px]"></i>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <p class="font-nunitoBold text-[12px]">Buddies 1</p>
                            <p class="font-popReg text-maroon text-[14px]">3/4</p>
                        </div>
                        
                        <div
                            class="makeWL flex justify-center gap-1 w-full border-black  py-3 items-center border-t-[0.5px]">
                            <ion-icon class="font-bold" name="add-outline"></ion-icon>
                            <p class="font-nunitoBold text-[10px]">Make new group for Buddies</p>
                        </div>
                    </div>
        `

        }

        function renderReview(home) {
            let reviewsHTML = '';
            home.reviews.forEach(review => {
                reviewsHTML += `
            <div class="rev flex gap-2 items-center mt-2 w-full py-1">
                <div class="img">
                    <ion-icon class="text-[20px]" name="person-circle-outline"></ion-icon>
                </div>

                <div class="info flex flex-col text-[10px]">
                    <div class="upperRev flex gap-1 font-nunitoBold">
                        <p class="Username">Anonymous</p>
                        <p>-</p>
                        <p>4.9</p>
                    </div>
                    <p>${review}</p>
                </div>
            </div>
        `;
            });
            return reviewsHTML;
            //     return `
        // <div class="rev flex gap-2 items-center mt-2 w-full py-1">
        //                 <div class="img">
        //                     <ion-icon class="text-[20px]" name="person-circle-outline"></ion-icon>
        //                 </div>
        //                 <div class="info flex flex-col text-[10px]">
        //                     <div class="upperRev flex gap-1 font-nunitoBold">
        //                         <p class="Username">Anonymous</p>
        //                         <p>-</p>
        //                         <p>4.9</p>
        //                     </div>
        //                     <p>${home}</p>
        //                 </div>
        //             </div>


        //     `

        }



        let dropDown = document.querySelector('.dropDown');
        let result = document.querySelector('.homeResult');
        dropDown.addEventListener('click', function() {
            // let nav = document.querySelector('nav');
            if (nav.classList.contains('h-fit')) {
                nav.classList.add('h-screen');
                nav.classList.remove('h-fit');
                result.classList.remove('opacity-0');
                result.classList.add('opacity-100');
                dropDown.src = "{{ asset('assets/Dropup.png') }}";
            } else {
                result.classList.remove('opacity-100');
                result.classList.add('opacity-0');
                nav.classList.remove('h-screen');
                nav.classList.add('h-fit');

                dropDown.src = "{{ asset('assets/Dropdown.png') }}";
            }
        });




        // inspirasi
        // const listHome = document.querySelectorAll('.home');
        // const homeDetail = document.getElementById('homeDetail');
        // const homeContent = document.getElementById('homeContent');

        // let currentActiveId = null;

        // listHome.forEach(home => {
        //     home.addEventListener('click', () => {
        //         const homeId = home.getAttribute('data-id');

        //         // Kalau klik rumah yang sama → toggle hide
        //         if (currentActiveId === homeId) {
        //             homeDetail.classList.toggle('hidden');
        //             currentActiveId = homeDetail.classList.contains('hidden') ? null : homeId;
        //             return;
        //         }

        //         // Klik rumah berbeda → tampilkan baru
        //         currentActiveId = homeId;
        //         homeDetail.classList.remove('hidden');
        //         homeContent.textContent = `Konten untuk rumah ${homeId}`; // bisa diganti render data
        //     });
        // });

        // let home1 = document.getElementById("1")
        // let homeD = document.querySelector(".homeDetail")
        // home1.addEventListener("click", () => {
        //     if (homeD.classList.contains("opacity-0")) {
        //         homeD.classList.remove('opacity-0');
        //         homeD.classList.add('opacity-100');
        //     } else {
        //         homeD.classList.remove('opacity-100');
        //         homeD.classList.add('opacity-0');
        //     }
        // })
    </script>
@endsection
