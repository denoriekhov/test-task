<template>
    <div class="container">
        <div class="row justify-content-center">
           <div class="col">
               <form>
                   <div class="form-group">
                       <input
                           type="text"
                           class="form-control"
                           id="query"
                           placeholder="Type a query here.."
                           :value="query"
                           @input="handleQuery"
                       />
                   </div>
               </form>
           </div>
        </div>
        <br />
        <div class="row">
            <div class="col">
                <table class="w-100">
                    <thead>
                        <tr>
                            <th class="text-uppercase">id</th>
                            <th class="text-uppercase">url</th>
                            <th class="text-uppercase">position</th>
                            <th class="text-uppercase">date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in items">
                            <td>{{item.id}}</td>
                            <td>{{item.url}}</td>
                            <td>{{item.position}}</td>
                            <td>{{item.scanned_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    let timer;
    export default {
        data() {
            return {
                query: '',
                items: []
            };
        },
        mounted() {
            this.find(this.query);
        },
        methods: {
            handleQuery(e) {
                this.query = e.target.value
            },
            async find(query) {
                try {
                    const {data} = await axios.get(`/api/result?query=${query}`);
                    this.items = data;
                } catch (e) {
                    this.items = [];
                }

            }
        },
        watch: {
            query: function (val) {
                clearTimeout(timer);
                timer = setTimeout(() => {
                    this.find(val)
                }, 300);
            }
        }
    }
</script>
<style lang="scss" scoped>
    .container {
        margin: 15px auto;
    }
</style>
