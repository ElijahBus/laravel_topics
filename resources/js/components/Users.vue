<template>
  <div class="container">
      <div class="card">
          <div class="card-header">
              <h4>====</h4>
          </div>
            <div id="v-for-object">
                <div class="card-body" v-for="(users, index) in initState" :key="index">
                    <div v-for="user in users" :key="user.id">
                        <b>{{ user.name }}</b> <br>
                        <b>{{ user.email }}</b>
                        <hr>
                    </div>
                </div>
            </div>
      </div>
  </div>
</template>

<script>
import mixin from '../mixin'

export default {
    name: "Users",
    data() {
        return {
            initState: []
        }
    },
    mixins: [mixin],
    created() {
        console.log('component created');

        // this.initStateProxy = new Proxy(this.users, {
        //     get: (target, prop) => {
        //         return prop in target ? target[prop] : undefined
        //     },

        //     set: (target, prop, value) => {
        //         return target[prop] = value;
        //     }
        // })
        // this.initStateProxy.initState = this.initState;

        // console.log(this.initStateProxy.initState);

        // for (const id in this.initStateProxy.initState) {
        //     if (this.initStateProxy.initState.hasOwnProperty(id)) {
        //         const element = this.initStateProxy.initState[id];
        //         console.log('id: ', id);
        //     }
        // }

        console.log(this.initState);


    }
}
</script>

<style>

</style>
