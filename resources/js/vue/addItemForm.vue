<template>
    <div class="add-item">
        <input type="text" v-model="item.name" placeholder="What do you have to do?"/>
        <font-awesome-icon
            icon="plus-square"
            @click="addItem()"
            :class="[ item.name ? 'active' : 'inactive', 'plus']"
        />
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                item: {
                    name: ""
                }
            }
        },
        methods: {
            addItem() {
                if (this.item.name == '') {
                    return;
                }

                axios.post('api/item/store', {
                    item: this.item
                })
                .then( response => {
                    if (response.status == 201 ) {
                        this.item.name = "";
                        this.$emit('reloadlist');
                    }
                })
                .catch (error => {
                    console.log( error );
                });
            }
        }
    }
</script>

<style scoped lang="scss">
    $gray: #e2e2e2;
    $white: #f7f7f7;
    $green: #00ce25;
    $black: #000000;

    .add-item {
        display: flex;
        justify-content: center;
        align-items: center;
        input {
            cursor: pointer;
            width: 100%;
            background: $gray;

            border: $gray 2px solid;
            border-radius: 30px;
            outline: none;

            padding: 5px;
            padding-left: 15px;
            margin-right: 10px;
            &:focus {
                border-color: $green;
            }
        }
        .plus {
            cursor: pointer;
            font-size: 25px;
            &.active {
                color: $green;
            }
            &.inactive {
                color: $gray;
            }
        }
    }
</style>
