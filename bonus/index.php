<?php
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CDN CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <!-- Collegamento a "style.css" -->
        <link rel="stylesheet" href="./css/style.css">

        <!-- Vue.js CDN -->
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

        <!-- Axios CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Collegamento a "script.js" -->
        <script defer type="text/javascript" src="./js/script.js"></script>

        <!-- Head Title -->
        <title>php-todo-list-json-bonus</title>
    </head>
    <body>
        <!-- Page Wrapper -->
        <div class="wrapper bg-body-secondary d-flex justify-content-center">
            <!-- App Container -->
            <div id="app">
                <!-- Main -->
                <main>
                    <!-- Main Container -->
                    <div class="container my-5">
                        <!-- Main Row -->
                        <div class="row">
                            <!-- Title Col -->
                            <div class="col-12 text-center my-3">
                                <h1 class="display-1">Todo List</h1>
                            </div>
                            <!-- Todo List Col -->
                            <div class="col-12 my-3" v-if="todoList.length !== 0">
                                <!-- Todo List -->
                                <ul class="list-group border border-2 rounded-2">
                                    <li class="list-group-item d-flex justify-content-between" v-for="(item, index) in todoList">
                                        <span :class="item.done ? 'text-decoration-line-through' : ''" v-text="item.text" @click="doneItem(index)"></span>
                                        <button class="btn btn-sm btn-outline-danger" @click="deleteItem(index)">Elimina</button>
                                    </li>
                                </ul>
                            </div>
                            <!-- Input Col -->
                            <div class="col-12 input-group my-3">
                                <!-- Input New Todo Item -->
                                <input type="text" name="newItem" placeholder="Inserisci un nuovo elemento" class="form-control" v-model="todoItem" @keyup.enter="addItem">
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-success" @click="addItem">Inserisci</button>
                            </div>
                        </div>
                    </div>
                </main>
                <!-- Fine Main -->
            </div>
        </div>
    </body>
</html>