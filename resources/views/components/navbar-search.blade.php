<div x-data="searchArticle()">
    <!-- Mobile Search Button -->
    <button type="button" @click="openSearch" class="flex sm:hidden ml-auto p-2 focus:outline-none">
        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="M21 21l-4.35-4.35"></path>
        </svg>
    </button>

    <!-- Mobile Search Modal -->
    <div x-show="isOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-init="$watch('isOpen', value => {
            if (value) {
                document.body.classList.add('overflow-hidden');
                $nextTick(() => $refs.mobileSearchInput.focus());
            } else {
                document.body.classList.remove('overflow-hidden');
            }
        })"
        class="sm:hidden fixed inset-0 z-50 p-4 sm:p-6 md:p-20 backdrop-blur-sm" role="dialog" aria-modal="true"
        style="display: none;">
        <div x-show="isOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="absolute inset-0 bg-gray-500/70 transition-opacity" @click="closeSearch" aria-hidden="true">
        </div>

        <div x-show="isOpen" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100" x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
            class="mx-auto max-w-xl transform divide-y divide-gray-100 overflow-hidden rounded-md bg-white shadow-2xl ring-1 ring-black ring-opacity-5 transition-all">
            <div class="relative">
                <svg class="pointer-events-none absolute top-3.5 left-4 h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                    fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd"
                        d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                        clip-rule="evenodd" />
                </svg>
                <input type="text"
                    class="h-12 w-full border-0 bg-transparent pl-11 pr-4 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm"
                    placeholder="Search..." x-ref="mobileSearchInput" x-model="query"
                    @input.debounce.300ms="performSearch">
                <button @click="closeSearch" class="absolute top-2 right-3 p-1 text-gray-400 hover:text-gray-500">
                    <span class="sr-only">Close</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Loading indicator -->
            <div x-show="isSearching" class="h-40 flex items-center justify-center">
                <svg class="animate-spin h-8 w-8 mx-auto text-gray-500" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                        stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
            </div>

            <!-- No results message -->
            <div x-show="!isSearching && query.length >= 1 && results.length === 0"
                class="h-40 flex items-center justify-center text-gray-500">
                No results found
            </div>

            <!-- Results list -->
            <ul x-show="!isSearching && results.length > 0"
                class="mb-2 max-h-72 scroll-py-2 overflow-y-auto text-sm text-gray-800">
                <template x-for="result in results" :key="result.id">
                    <li>
                        <a :href="'/articles/' + result.id" class="block px-4 py-3 hover:bg-gray-50"
                            @click="closeSearch">
                            <p x-text="result.title" class="font-medium text-gray-900"></p>
                            <p x-text="'Published at: ' + result.created_at" class="text-sm text-gray-500"></p>
                        </a>
                    </li>
                </template>
            </ul>
        </div>
    </div>
</div>

<script>
    function searchArticle() {
        return {
            isOpen: false,
            results: [],
            isSearching: false,
            query: '',
            performSearch() {
                if (this.query.length < 1) {
                    this.results = [];
                    return;
                }

                this.isSearching = true;

                fetch(`/search?search=${this.query}`)
                    .then(response => response.json())
                    .then(data => {
                        this.results = data;
                    })
                    .catch(error => {
                        console.error('Error fetching search results:', error);
                        this.results = [];
                    })
                    .finally(() => {
                        this.isSearching = false;
                    });
            },
            openSearch() {
                this.isOpen = true;
                this.$nextTick(() => {
                    this.$refs.mobileSearchInput.focus();
                });
            },
            closeSearch() {
                this.isOpen = false;
                this.query = '';
                this.results = [];
            }
        }
    }
</script>
