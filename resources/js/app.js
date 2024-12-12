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
    trickleSpeed: 200,
    minimum: 0.08,
    easing: "ease",
    speed: 500,
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

function stopAllProgress() {
    NProgress.done();
    activeAjaxCalls = 0;
}

document.addEventListener("DOMContentLoaded", () => {
    // Memulai progress saat halaman mulai dimuat
    startProgress();

    // Menangani klik pada link untuk memulai progress bar
    document.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", (e) => {
            const href = link.getAttribute("href");
            const currentURL = window.location.href.split("#")[0];

            // Menggunakan regex untuk mencocokkan pola URL ekspor PDF
            const isPDFExport = /\/diagnosis\/\d+\/export/.test(href);

            if (
                href &&
                href !== "#" &&
                !href.startsWith("#") &&
                !href.startsWith(currentURL) &&
                !href.startsWith("javascript:") &&
                !href.startsWith("tel:") &&
                !href.startsWith("mailto:") &&
                link.getAttribute("target") !== "_blank" &&
                !isPDFExport
            ) {
                startProgress();
            } else if (isPDFExport) {
                // Pastikan NProgress dihentikan untuk unduhan PDF
                stopAllProgress();
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
    const url = args[0] instanceof Request ? args[0].url : args[0];
    const isPDFExport = /\/diagnosis\/\d+\/export/.test(url);

    if (!isPDFExport) {
        activeAjaxCalls++;
        NProgress.start();
    }

    return originalFetch.apply(this, args).finally(() => {
        if (!isPDFExport) {
            activeAjaxCalls--;
            if (activeAjaxCalls === 0) {
                NProgress.done();
            }
        }
    });
};

// Untuk XMLHttpRequest
const originalXHR = window.XMLHttpRequest;
window.XMLHttpRequest = function () {
    const xhr = new originalXHR();
    const originalOpen = xhr.open;

    xhr.open = function (method, url, ...args) {
        const isPDFExport = /\/diagnosis\/\d+\/export/.test(url);

        if (!isPDFExport) {
            activeAjaxCalls++;
            NProgress.start();
        }

        xhr.addEventListener("loadend", () => {
            if (!isPDFExport) {
                activeAjaxCalls--;
                if (activeAjaxCalls === 0) {
                    NProgress.done();
                }
            }
        });

        return originalOpen.apply(xhr, [method, url, ...args]);
    };

    return xhr;
};

// Untuk Axios (jika digunakan)
if (window.axios) {
    axios.interceptors.request.use((config) => {
        const isPDFExport = /\/diagnosis\/\d+\/export/.test(config.url);

        if (!isPDFExport) {
            activeAjaxCalls++;
            NProgress.start();
        }
        return config;
    });

    axios.interceptors.response.use(
        (response) => {
            const isPDFExport = /\/diagnosis\/\d+\/export/.test(
                response.config.url
            );

            if (!isPDFExport) {
                activeAjaxCalls--;
                if (activeAjaxCalls === 0) {
                    NProgress.done();
                }
            }
            return response;
        },
        (error) => {
            const isPDFExport =
                error.config &&
                /\/diagnosis\/\d+\/export/.test(error.config.url);

            if (!isPDFExport) {
                activeAjaxCalls--;
                if (activeAjaxCalls === 0) {
                    NProgress.done();
                }
            }
            return Promise.reject(error);
        }
    );
}
