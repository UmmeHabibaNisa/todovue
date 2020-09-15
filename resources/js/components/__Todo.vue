<template>
    <section>
        <div class="container">
            <form>
                <div class="form-group">
                    <h1></h1><br>
                    <label class="input-group-text" for="exampleInputPassword1">Make your list</label>
                    <input style="margin-top:5px" type="text" name="message" class="form-control"
                           id="exampleInputPassword1" placeholder="what do u want to do today?"
                           v-model="title">
                    <button v-show="!edit" style="margin-top:10px" type="button" class="btn btn-primary"
                            v-on:click="insertTodo">Submit
                    </button>
                    <button v-show="edit" style="margin-top:10px" type="button" class="btn btn-primary">Update</button>
                </div>
                <ul class="list-group list-group-flush">
                    <div v-for="(todo,index) in list" class="form-check" :key="todo.index">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" v-model="todo.complete" :id="index">
                        <li style="margin-top:10px" :for="index"><span>{{todo.title}}</span>
                            <!-- <div v-for=" todo in something">
                                 <span v-show="!todo.edit">{{listdata.message}}</span>
                                 <input type="text" v-model="listdata.message" v-show="listdata.message">
                             </div>-->
                            <button v-show="!todo.edit" style="margin:5px;" type="button"
                                    class="btn btn-secondary" v-on:click="editTodo(todo)">Edit
                            </button>

                            <button type="button" class="btn btn-info"
                                    @click="deleteTodo(index)">Delete
                            </button>
                        </li>

                    </div>
                </ul>

            </form>

        </div>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
              integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
              crossorigin="anonymous">

    </section>
</template>

<script>

    export default {
        name: 'App',
        data() {
            return {
                title: '',
                title2: 'demo test',
                edit: false,
                // listdata : [
                //     {
                //         title: '',
                //         complete: ''
                //     }
                // ]
                list: [],
            }

        },
        // computed:{
        //     something(){
        //         let _listdata = [];
        //         for (let i=0, listdata; listdata = this.listdata[i]; i++){
        //             listdata.edit = false;
        //             _listdata.push(listdata);
        //         }
        //         return _listdata;
        //     }
        // },
        methods: {
            /*        saveTodo(index, todo) {
                if (this.edit) {
                    this.listdata.splice(this.listdata.indexOf(todo), 1);
                    this.listdata.push({
                        message: this.message,
                        complete: false,
                        //console.log(this.message);
                    });
                    this.edit = false;
                } else {
                    this.listdata.push({
                        message: this.message,
                        complete: false,
                    });
                }

                this.message = '';
            },*/
            insertTodo() {
                if(this.edit){


                }
                else{
                    axios
                        .post("/api/todo", {title: this.title})
                        .then(response => [console.log(response)])
                        .catch(err => {
                            console.log(err);
                        })

                }

                /*  .finally(() => {
                      this.getTodo();
                  });*/
            },
            getTodoData() {
                axios.get("/api/todo").then(response => {
                    this.list = response.data.data;
                }).catch(err => {
                    console.log(err);
                })
            },
            deleteTodo(index) {
                /*let comp = this;*/
                axios.delete(this.index).then(response => {
                    this.index = response.data;
                });
            },
              /*deleteTodo(index) {
                this.listdata.splice(index, 1);
            },*/
            editTodo(todo) {
                this.edit = true;
                this.title = todo.title
            }
        },
        mounted() {
            this.getTodoData();
        }
    }

</script>

<style lang="scss">

</style>
