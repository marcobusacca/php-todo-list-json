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
            todoList: [],
            todoItem: '',
        }
    },
    created() {
        // CHIAMATA AXIOS GET OTTENIMENTO DATI DAL SERVER.PHP
        axios.get(this.apiUrl).then((result) => {

            // INSERISCO IL RISULTATO DELLA CHIAMATA AXIOS GET DENTRO LA VARIABILE TODO_LIST
            this.todoList = result.data;
        });
    },
    methods: {
        addItem() {
            // CONTROLLO CHE L'UTENTE ABBIA INSERITO QUALCOSA
            if (this.todoItem !== '') {

                // DEFINISCO IL PARAMETRO DATA DA PASSARE ALLA CHIAMATA AXIOS POST
                const data = {
                    newItem: {
                        text: this.todoItem,
                        done: false
                    }
                };

                // CHIAMATA AXIOS POST INSERIMENTO DATI NEL SERVER.PHP
                axios.post(this.apiUrl, data, {

                    headers: { 'Content-Type': 'multipart/form-data' }

                }).then((result) => {

                    // AGGIORNO LA TODO_LIST
                    this.todoList = result.data;

                    // SVUOTO LA VARIABILE TODO_ITEM
                    this.todoItem = '';
                });
            }
        },
        deleteItem(index) {

            // CANCELLO L'ITEM CLICCATO DALL'ARRAY TODO_LIST
            this.todoList.splice(index, 1);
        },
        doneItem(item) {

            // LA VARIABILE DONE DELL'ITEM CLICCATO è UGUALE A FALSE
            if (item.done === false) {

                // SETTO LA VARIABILE DONE DELL'ITEM CLICCATO SU TRUE
                item.done = true;

            } else { // LA VARIABILE DONE DELL'ITEM CLICCATO è UGUALE A TRUE

                // SETTO LA VARIABILE DONE DELL'ITEM CLICCATO SU FALSE
                item.done = false;
            }
        }
    },
}).mount('#app'); // RICHIAMO IL CONTAINER HTML DOVE APPLICARE LA FUNZIONE CREATE_APP