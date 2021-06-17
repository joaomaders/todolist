<template>
    <div class="todo-list--container">
        <div class="heading">
            <h2 id="title">Todo List</h2>
            <p class="subtitle">by
                <a href="https://www.linkedin.com/in/joaomaders/" target="_blank" slot="activator">
                    João Mathias Maders
                </a>
            </p>

            <add-item-form
                v-on:reloadlist="getList()"
            />
        </div>
        <list-view
            :items="items"
            v-on:reloadlist="getList()"
        />

    </div>
</template>

<script>
    import addItemForm from './addItemForm.vue';
    import listView from './listView.vue';

    export default {
        components: {
            addItemForm,
            listView
        },
        data: function () {
            return {
                items: []
            }
        },
        methods: {
            getList () {
                axios.get('api/items')
                .then( response => {
                    this.items = response.data
                })
                .catch( error => {
                    console.log( error );
                });
            }
        },
        created () {
            this.getList();
        }
    }
</script>

<style scoped lang="scss">
    $background: #fdfdfd;
    $green: #00ce25;

    .todo-list--container {
        width: min(90vw, 500px);
        margin: auto;
        border-radius: 60px;
        .heading {
            margin-top: 3rem;
            background: $background;
            padding: 5px 10px 20px 10px;
            border-radius: 8px;
        }
        #title {
            font-size: 1.75rem;
            text-align: center;
            margin-bottom: 0px;
        }
        .subtitle {
            opacity: .6;
            font-size: .7rem;
            text-align: center;
            margin-top: 0px;
            margin-bottom: 30px;
            a {
                text-decoration: none;
                color: inherit;
                &:hover {
                    cursor: pointer;
                    color: $green;
                }
            }
        }
    }
</style>
