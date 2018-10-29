<template>
    <div class="container">
        <h6 class="dropdown-header">New Messages: <span class="badge badge-primary p-2">{{GetMessage.length}}</span></h6>
        
        <div v-for="(Message,index) in GetMessage">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" @click="Go(Message.id)" :class="{'bg-success':Message.done_read}">
              <strong>{{Message.name_contact}} {{ Message.lastname_contact }}</strong>
              <span class="small float-right text-muted ml-2">{{Message.created_at}}</span>
              <div class="dropdown-message small" style="max-width: 250px; overflow: hidden;">{{Message.message_contact}}!</div>
            </a>
        </div>
    </div>
</template>

<script>
    import io from 'socket.io-client';
    var socket = io('http://notifications.oo:3000/');
    export default {
        data(){
            return{
                GetMessage:[],
            }
        },
        mounted() {
            axios.get('/admin/get-message' ).then( (res) => {
                this.GetMessage = res.data['data']; 
            });

            socket.on('message',  function(data){

            this.GetMessage.unshift(data);
            // this.$toastr('success',  'تم اضافة بيانات المستخرج', 'Done')
            // console.log(this.Notification);
                }.bind(this));
            console.log('Component mounted.')
        },
        methods:{
            Go:function($id){
                 axios.get('/admin/get-message/'+$id ).then( (res) => {
                    this.GetMessage.splice($id);
                // this.GetMessage = res.data['data']; 
            });
            }
        }
    }
</script>