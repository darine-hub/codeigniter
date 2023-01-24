
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-app.js";
  import { getMessaging, getToken ,onBackgroundMessage} from "https://www.gstatic.com/firebasejs/9.16.0/firebase-messaging.js";
  

  const firebaseConfig = {

    apiKey: "AIzaSyDIw79w1kgz7ANmumTn4k1fUOei3vojjCA",
    authDomain: "chat-firebase-b7112.firebaseapp.com",
    projectId: "chat-firebase-b7112",
    storageBucket: "chat-firebase-b7112.appspot.com",
    messagingSenderId: "690613127922",
    appId: "1:690613127922:web:1fbfa55cbde72027805e6b",
    measurementId: "G-DCCXR26XLN"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);

  const messaging = getMessaging(app);
 

getToken(messaging, {vapidKey: "BNW5tRr8sOtpqtb3432NL3qA4fl0BJUgQ9AOPJfUO4Zt8r4V5-RG2ETczc4Ev8vgQwM8OqNmpbx9AAQ5voJuYtQ"}).then((token) => {
      console.log(token)
    });
    



onBackgroundMessage((data)=>{
  console.log('onBackgroundMessage: ',data)

});

onBackgroundMessage((data)=>{
  console.log('onBackgroundMessage: ',data)

}); 
