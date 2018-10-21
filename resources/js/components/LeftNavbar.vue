<template>
    <li class="nav-item">
        <a :href="route" class="nav-link">
            <i class="nav-icon fas fa-circle text-warning"></i>
            <p class="teal">
                {{ name }}
            </p>
        </a>
    </li>
</template>

<script>
    export default {
        props: {'name': String, 'route': String},
        name: "LeftNavbar",
        data() {
            return {

            }
        }
    }
</script>

<style scoped>

</style>