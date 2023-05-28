const { createApp } = Vue;
createApp({
    methods:{
        login:function(e){
            e.preventDefault();

            const data = new FormData(e.currentTarget);
            data.append("method","login");
            axios.post('../includes/model.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("successfully login :)");
                    window.location.href ="../Admin/Dashboard.php";
                }
                else if(r.data == 2){
                    alert("Account is locked");
                }
                else{
                    alert("Username or password is incorrect");
                }
            })
        },
    },

    mounted:function(){
    }
}).mount('#login');
