import "./bootstrap";

import Alpine from "alpinejs";

import NProgress from "nprogress";

import "nprogress/nprogress.css";

// Alpine
window.Alpine = Alpine;

Alpine.start();

// NProgress
window.NProgress = NProgress;

// Konfigurasi awal NProgress
NProgress.configure({
    showSpinner: false,
    trickleSpeed: 200, // Diperlambat sedikit
    minimum: 0.08, // Nilai minimum progress
    easing: "ease", // Efek easing
    speed: 500, // Kecepatan animasi
});

// Fungsi untuk memulai progress dengan increment yang lebih natural
function startProgress() {
    NProgress.start();

    // Increment manual untuk simulasi loading yang lebih natural
    const incrementInterval = setInterval(() => {
        if (NProgress.status < 0.7) {
            // Berhenti di 70% dan menunggu halaman selesai
            NProgress.inc(0.05);
        }
    }, 300);

    // Cleanup interval ketika halaman selesai loading
    window.addEventListener(
        "load",
        () => {
            clearInterval(incrementInterval);
            NProgress.done();
        },
        { once: true }
    );
}

document.addEventListener("DOMContentLoaded", () => {
    // Memulai progress saat halaman mulai dimuat
    startProgress();

    // Menangani klik pada link untuk memulai progress bar
    document.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", (e) => {
            const href = link.getAttribute("href");
            const currentURL = window.location.href.split("#")[0];

            if (
                href &&
                href !== "#" &&
                !href.startsWith("#") &&
                !href.startsWith(currentURL) &&
                !href.startsWith("javascript:") &&
                !href.startsWith("tel:") &&
                !href.startsWith("mailto:") &&
                link.getAttribute("target") !== "_blank"
            ) {
                startProgress();
            }
        });
    });

    // Menangani form submissions
    document.querySelectorAll("form").forEach((form) => {
        form.addEventListener("submit", () => {
            startProgress();
        });
    });
});

// Handle AJAX requests
let activeAjaxCalls = 0;

// Untuk Fetch API
const originalFetch = window.fetch;
window.fetch = function (...args) {
    activeAjaxCalls++;
    NProgress.start();

    return originalFetch.apply(this, args).finally(() => {
        activeAjaxCalls--;
        if (activeAjaxCalls === 0) {
            NProgress.done();
        }
    });
};

// Untuk XMLHttpRequest
const originalXHR = window.XMLHttpRequest;
window.XMLHttpRequest = function () {
    const xhr = new originalXHR();
    const originalOpen = xhr.open;

    xhr.open = function () {
        activeAjaxCalls++;
        NProgress.start();

        xhr.addEventListener("loadend", () => {
            activeAjaxCalls--;
            if (activeAjaxCalls === 0) {
                NProgress.done();
            }
        });

        return originalOpen.apply(xhr, arguments);
    };

    return xhr;
};

// Untuk Axios (jika digunakan)
if (window.axios) {
    axios.interceptors.request.use((config) => {
        activeAjaxCalls++;
        NProgress.start();
        return config;
    });

    axios.interceptors.response.use(
        (response) => {
            activeAjaxCalls--;
            if (activeAjaxCalls === 0) {
                NProgress.done();
            }
            return response;
        },
        (error) => {
            activeAjaxCalls--;
            if (activeAjaxCalls === 0) {
                NProgress.done();
            }
            return Promise.reject(error);
        }
    );
}
