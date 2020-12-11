<template>
  <div class="container">
    <div class="card">
        <div class="card">
            <div class="card-header">
                <h4>User info</h4>
            </div>
            <div class="card-body" v-for="(user, index) in initState" :key="index">
                <b>{{  user.name }}</b> <br>
                <b>{{  user.email }}</b> <br>
                <b>{{  user.created_at }}</b>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
import mixin from '../mixin/index.js'
export default {
    name: "UserInfo",
    data() {
        return {
           initState: [],
        }
    },
    mixins: [mixin],
    created() {
        console.log(this.initState);
    }
}
</script>

<style>

</style>
