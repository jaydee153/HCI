const { createApp } = Vue;
createApp({
    methods:{
        login_student:function(e){
            e.preventDefault();

            const data = new FormData(e.currentTarget);
            data.append("method","login_student");
            axios.post('includes/model-stud.php',data)
            .then(function(r){
                if(r.data == 1){
                    alert("You have successfully logged in ");
                    window.location.href ="student/userDashboard.php";
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
}).mount('#login-student');