"use strict";

// RICHIAMO FUNZIONE CREATE_APP VUE.JS E LA INSERISCO IN UNA CONSTANTE
const { createApp } = Vue;

// UTILIZZO FUNZIONE CREATE_APP
createApp({
    // DEFINIZIONE DATA CON L'OGGETTO RETURN
    data() {
        return {
            // VARIABILI VUE.JS
            apiUrl: 'server.php',
        }
    },
    created() {
        axios.get(this.apiUrl).then((result) => { });
    },
}).mount('#app'); // RICHIAMO IL CONTAINER HTML DOVE APPLICARE LA FUNZIONE CREATE_APP