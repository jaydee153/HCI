const { createApp } = Vue;
createApp({
    data(){
        return{
            student_id : '',
            last_name : '',
            first_name : '',
            course : '',
            year_sec : '',
            email : '',
            address : '',
            status : '',
            studs : [],
            search: [],
            id:0
        }
    },
    methods:{
      
        students: function(e) {
          e.preventDefault();
          var form = e.currentTarget;
      
          const vue = this;
          var data = new FormData(form);
          data.append("method", "students");
          axios.post('../includes/model.php', data)
            .then(function(r) {
              if (r.data == 0) {
                alert('You have added a student successfully');
                vue.getStudents();
                document.querySelector(".studentform").reset();
              } else if (r.data == 1) {
                alert('Student already exists');
              } else {
                alert("Please input all the fields");
              }
            })
        },
        getStudents:function(){
          var data = new FormData();
          const vue = this;
          data.append('method','getStudents');
          axios.post('../includes/model.php',data)
          .then(function(r){
              vue.studs = [];
              for(var v of r.data){
                  vue.studs.push({
                      student_id : v.student_id,
                      last_name : v.last_name,
                      first_name : v.first_name,
                      course : v.course,
                      year_sec : v.year_sec,
                      email : v.email,
                      address : v.address,
                      status : v.status,
                      id : v.id
                  })
              }
          })
        },
        searchStud: function(search) {
          var data = new FormData();
          const vue = this;
          data.append('method','getStudents');
          axios.post('../includes/model.php',data)
            .then(function(r) {
              vue.studs = [];
              for (var v of r.data) {
                  if (v.student_id.toString().includes(search.toString()) ||
                  v.last_name.toLowerCase().includes(search.toLowerCase()) ||
                  v.first_name.toLowerCase().includes(search.toLowerCase()) ||
                  v.course.toLowerCase().includes(search.toLowerCase()) ||
                  v.year_sec.toLowerCase().includes(search.toLowerCase()) ||
                  v.email.toLowerCase().includes(search.toLowerCase()) ||
                  v.address.toLowerCase().includes(search.toLowerCase()) ||
                  v.status.toString().includes(search.toString())) {
                    vue.studs.push({
                      student_id : v.student_id,
                      last_name : v.last_name,
                      first_name : v.first_name,
                      course : v.course,
                      year_sec : v.year_sec,
                      email : v.email,
                      address : v.address,
                      status : v.status,
                  })
                }
              }
          })
        },

        
        dropStud:function(id){
          if(confirm("Are you Sure you Want to delete This STUDENT?")){
            var data = new FormData();
            const vue = this;
            data.append("method","dropStud");
            data.append("id",id);
            axios.post('../includes/model.php',data)
            .then(function(r){
              vue.getStudents();
            })
          }
        },
        getStudById:function(id){
          var data = new FormData();
          const vue = this;
          data.append('method','getStudById');
          data.append("id",id);
          axios.post('../includes/model.php',data)
          .then(function(r){
            console.log(r.data);
            for(var v of r.data){
              vue.id = v.id;
              vue.student_id = v.student_id;
              vue.email = v.email;
              vue.status = v.status;

            }
          })
        },
        updateStud:function(e){
          e.preventDefault();
          var form = e.currentTarget;
          const vue = this;
          var data = new FormData(form);
          data.append("method","updateStud");
          data.append("id",this.id);
          axios.post('../includes/model.php',data)
          .then(function(r){
            if(r.data == 1){
              alert('Student Successfully Update');
              vue.getStudents();
              document.querySelector(".studform").reset();
            }
          });
        },
      },
      created:function(){
        this. getStudents();
      },
      mounted:function(){

      }
}).mount('#students-app');