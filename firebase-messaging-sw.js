// ✅ Use compat SDK in Service Worker
importScripts("https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js");
importScripts("https://www.gstatic.com/firebasejs/8.10.1/firebase-messaging.js");

firebase.initializeApp({
  apiKey: "AIzaSyBKFZfyRAX-2lR4RaK0Zflh4kL-1eIVpEc",
  authDomain: "nova-7626d.firebaseapp.com",
  projectId: "nova-7626d",
  storageBucket: "nova-7626d.firebasestorage.app",
  messagingSenderId: "1575656461",
  appId: "1:1575656461:web:668bc868a97b44675a4944",
  measurementId: "G-SXCMSPKFWJ"
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage((payload) => {
  console.log("Received background message ", payload);

  const notificationTitle = payload.notification.title;
  const notificationOptions = {
    body: payload.notification.body,
    icon: "/icon.png"
  };

  self.registration.showNotification(notificationTitle, notificationOptions);
});
