<template>
    <div class="item">
        <input type="checkbox"
            @change="updateCheck()"
            v-model="item.completed"
        >
        <span :class="[item.completed ? 'completed' : '', 'item-text']"> {{ item.name }} </span>
        <button
            @click="removeItem()"
            class="trachcan"
        >
            <font-awesome-icon icon="trash" />
        </button>
    </div>
</template>

<script>
    export default {
        props: ['item'],
        methods: {
            updateCheck() {
                axios.put('api/item/' + this.item.id, {
                    item: this.item
                })
                .then( response => {
                    if( response.status == 200) {
                        this.$emit('itemchanged');
                    }
                })
                .catch(error => {
                    console.log( error );
                });
            },
            removeItem () {
                let confirmation = confirm("Do you really want to remove " + "'" + this.item.name + "' ?");

                if ( confirmation ) {
                    axios.delete( 'api/item/' + this.item.id )
                    .then( response => {
                        if (response.status == 200) {
                            this.$emit('itemchanged');
                        }
                    })
                    .catch( error => {
                        console.log( error );
                    });
                }
            }
        }
    }
</script>

<style scoped lang="scss">
    $background: #f7f7f7;
    $trash-icon-color: red;

    .item {
        border-radius: 8px;
        display: flex;
        justify-content: center;
        align-items: center;
        input {
            cursor: pointer;
        }
        .item-text {
            width: 100%;
            margin-left: 15px;
            &.completed {
                text-decoration: line-through;
                opacity: 0.3;
            }
        }
        .trachcan {
            cursor: pointer;
            background: $background;
            color: $trash-icon-color;
            border: none;
            outline: none;
        }
    }

</style>
