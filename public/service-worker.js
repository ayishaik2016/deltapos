self.addEventListener("install", event => {
  event.waitUntil(
    caches.open("laravel-pwa-v1").then(cache => {
      return cache.addAll([
        "/",
        "/deltapos/public/assets/css/app.css",
        "/deltapos/public/assets/js/app.js",
        "/deltapos/public/offline" // custom offline page
      ]);
    })
  );
});

self.addEventListener("fetch", event => {
  event.respondWith(
    caches.match(event.request).then(response => {
      return response || fetch(event.request).catch(() => caches.match("/offline"));
    })
  );
});
