import { initializeApp } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-app.js";
import { getAuth } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-auth.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/10.9.0/firebase-analytics.js";

const firebaseConfig = {
  apiKey: "AIzaSyD6kGcEVl_iZhS-23xh4GlsIIhy-N5D_J8",
  authDomain: "mirai-58d8b.firebaseapp.com",
  projectId: "mirai-58d8b",
  storageBucket: "mirai-58d8b.firebasestorage.app",
  messagingSenderId: "620578527887",
  appId: "1:620578527887:web:e2968475f77be7b065aefa",
  measurementId: "G-DQHWWCXDPP"
};

export const app = initializeApp(firebaseConfig);
export const analytics = getAnalytics(app);
export const auth = getAuth(app);
