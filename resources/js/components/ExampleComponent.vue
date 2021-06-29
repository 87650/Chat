<template>
    <div>
<div class="ap">
    <div v-on:click="seg(url.name)" v-for="url in dat" class="img">
        <img class="img" v-bind:src="url.img">

    </div>
    <!-- Default dropend button -->
    <div class="btn-group dropend">
        <button type="button" class="btn btn-secondary dropdown-toggle test" data-bs-toggle="dropdown" aria-expanded="false">
            +
        </button>
        <ul class="dropdown-menu">
            <form @submit.prevent="post">
                <input type="text" name="name" v-model="name">
                <input type="text" name="img" v-model="img">
                <input type="submit">
            </form>
        </ul>
    </div>
</div>
        <div class="window">
            <div class="messages" v-if="mes.channel == chennal" v-for="mes in message">
                {{mes.message}}
            </div>
            <div>
            <form @submit.prevent="posts">
                <input type="text" name="mes" v-model="mes">

                <input type="submit">
            </form>
                </div>
        </div>
    </div>



</template>

<script>
    export default {
        props: [
            'login'
        ],

        data: function (){
            return {
                dat: '',
                timer: '',
                timer1:'',
                name: '',
                img: '',
                message: '',
                mes: '',
                chennal: '',
            }
        },
        created() {
            this.timer = setInterval(this.update, 1000)
            this.timer1 = setInterval(this.update1, 1000)



        },
        methods: {
            update: function (){
                axios.get('/json/channal').then((res) => {
                    this.dat = res.data.body;
                })
            },
            post: function (){
                axios.post('/json/chanal', {name : this.name, img: this.img})
                    .then(response => {
                        console.log(response.data)
                    })
            },
            seg: function (name){
                this.chennal = name;
                alert("test");
            },
            update1: function (){
                axios.get('/json/chanal1').then((res) => {
                    this.message = res.data.message;


                })
            },
            posts: function (){
                axios.post('/json/message', {log: this.login, mes: this.mes, chan: this.chennal})
                    .then(response => {

                    })
            }
        },
        beforeDestroy() {
            clearInterval(this.timer)
        }


    }
</script>
<style>
.ap{
    background: #202225;
    display: flex;
    width: 80px;

    margin: -15px 0 0 0;
    color: black;
    flex-direction:column;
}
.img{
    border-radius:50px;
    width: 40px;
    height: 40px;
    margin: 0 0 0 8px;
}
.test{
    border-radius: 50%;
    width: 20px;
    height: 30px;
    font-size: 20px;

}
.window{
    margin: -30px 0 0 100px;
    display: flex;
    flex-direction:column;


    width: 1400px;
    height: 800px;
}
.messages{

}
.fom{
    margin: 600px 0 0 0;
}
</style>
