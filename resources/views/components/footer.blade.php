<style>
    .tooltip::before {
        content: "";
        position: absolute;
        bottom: -4px;
        left: 50%;
        transform: translateX(-50%) rotate(45deg);
        width: 8px;
        height: 8px;
        background-color: #ffffff;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
    }
</style>

<!-- Footer -->
<footer class="bg-black">
    <div class="mx-auto w-full max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="relative pb-6 pt-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12">
                <!-- Logo and Description -->
                <div class="text-white">
                    <a href="{{ url('/') }}" class="text-3xl font-bold mr-4 flex items-center gap-2">
                        <img src="{{ asset('assets/images/menpy-logo-dark.png') }}" alt="" class="w-10 h-10">
                        Menpy AI
                    </a>
                    <p class="mt-8 text-sm max-w-xl">
                        Jl. Kyai Moch. Syafei Gg 1 No.2450,
                        RT.04/RW.08,
                        Kebondalem, Purwokerto Lor, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53114</p>
                </div>
                <div class="flex gap-4 justify-start lg:justify-end items-end">
                    <!-- Social Media Icons -->
                    <a href="https://www.facebook.com/" target="_blank"
                        class="group relative h-fit transition-all duration-200 ease-[cubic-bezier(0.68,-0.55,0.265,1.55)] p-2 rounded-full bg-white">
                        <span
                            class="tooltip absolute top-0 left-1/2 -translate-x-1/2 -translate-y-full bg-white text-xs py-1 px-2 rounded-md shadow-md opacity-0 group-hover:opacity-100 group-hover:-top-4 transition-all duration-300 ease-[cubic-bezier(0.68,-0.55,0.265,1.55)] pointer-events-none">Facebook</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M17.525,9H14V7c0-1.032,0.084-1.682,1.563-1.682h1.868v-3.18C16.522,2.044,15.608,1.998,14.693,2 C11.98,2,10,3.657,10,6.699V9H7v4l3-0.001V22h4v-9.003l3.066-0.001L17.525,9z">
                            </path>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/" target="_blank"
                        class="group relative h-fit transition-all duration-200 ease-[cubic-bezier(0.68,-0.55,0.265,1.55)] p-2 rounded-full bg-white">
                        <span
                            class="tooltip absolute top-0 left-1/2 -translate-x-1/2 -translate-y-full bg-white text-xs py-1 px-2 rounded-md shadow-md opacity-0 group-hover:opacity-100 group-hover:-top-4 transition-all duration-300 ease-[cubic-bezier(0.68,-0.55,0.265,1.55)] pointer-events-none">Instagram</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="https://www.twitter.com/" target="_blank"
                        class="group relative h-fit transition-all duration-200 ease-[cubic-bezier(0.68,-0.55,0.265,1.55)] p-2 rounded-full bg-white">
                        <span
                            class="tooltip absolute top-0 left-1/2 -translate-x-1/2 -translate-y-full bg-white text-xs py-1 px-2 rounded-md shadow-md opacity-0 group-hover:opacity-100 group-hover:-top-4 transition-all duration-300 ease-[cubic-bezier(0.68,-0.55,0.265,1.55)] pointer-events-none">X</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path
                                d="M18.901 1.153h3.68l-8.04 9.557L24 22.846h-7.406l-5.8-7.584-6.638 7.584H1.476l8.624-9.824L0 1.153h7.594l5.243 6.932L18.901 1.153Zm-1.264 19.847h2.031L5.523 3.214H3.342L17.637 21Z" />
                        </svg>
                    </a>
                </div>
            </div>

            <hr class="my-8 border-white sm:mx-auto lg:my-8" />

            <!-- Bottom Section -->
            <div
                class="flex flex-col md:flex-row items-center justify-center md:justify-between mt-8 text-white text-xs">
                <span class="text-center">© 2024 <a href="{{ route('home') }}" class="hover:underline">Menpy
                        AI™</a>. All Rights Reserved.</span>
                <div class="flex items-center">
                    <a href="{{ url('/terms') }}" target="_blank" class="text-center hover:underline">Terms</a>
                    <span class="mx-2  text-center">•</span>
                    <a href="{{ url('/privacy') }}" target="_blank" class="text-center hover:underline">Privacy</a>
                </div>
            </div>
        </div>
    </div>
</footer>
