<template>
    <div>
        <tool-bar></tool-bar>
        <router-view></router-view>
        <app-footer></app-footer>
    </div>
</template>

<script>
import ToolBar from './ToolBar'
import AppFooter from './AppFooter'
import Login from './login/Login'
export default {
    components: { ToolBar, AppFooter, Login },
}
</script>

<style>

</style>