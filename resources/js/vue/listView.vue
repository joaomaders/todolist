<template>
    <div>
        <div v-for="(item, index) in items" :key="index">
            <list-item
                :item="item"
                class="item"
                v-on:itemchanged="$emit('reloadlist')"
            />
        </div>
    </div>
</template>

<script>
    import listItem from "./listItem";

    export default {
        props: ['items'],
        components: {
            listItem
        }
    }
</script>

<style scoped lang="scss">
    $white: #f7f7f7;

    .item {
        background: $white;
        padding: 5px;
        margin-top: 15px;
    }
</style>
