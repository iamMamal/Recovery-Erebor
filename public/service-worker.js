const CACHE_NAME = "erebor-offline-cache";

// صفحات یا فایل‌هایی که همیشه میخوای cache بشن
const OFFLINE_URL = "/offline";

self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(CACHE_NAME).then((cache) => {
            return cache.addAll([OFFLINE_URL]);
        })
    );
    self.skipWaiting();
});

self.addEventListener("activate", (event) => {
    event.waitUntil(self.clients.claim());
});

// وقتی آفلاین هستیم، همیشه صفحه offline رو نشون بده
self.addEventListener("fetch", (event) => {
    event.respondWith(
        fetch(event.request)
            .then((response) => response) // اگر آنلاین بود، همون پاسخ اصلی
            .catch(() => caches.match(OFFLINE_URL)) // اگر offline بود یا fetch شکست خورد، صفحه /offline رو بده
    );
});
