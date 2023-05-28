const { createApp } = Vue;
createApp ({
   data(){
        return{
            name:'',
            email:'',
            address:'',
            password:'',
            admin_id:'',
        }
   },
   methods:{
        register:function(e){
            e.preventDefault();
            var form = e.currentTarget;

            const vue = this;
            var data = new FormData(form);
            data.append("method","register");
            axios.post('includes/model.php',data)
            .then(function(r){
                if(r.data == 0){
                    alert('Successfully Registered');
                    document.querySelector(".adminform").reset();
                }
                else if(r.data == 1){
                    alert('Already Registered');
                }
                else{
                    alert("Please Try Again");
                }
            });
        },
        
   },
   created:function(){
   }
    
}).mount('#register');