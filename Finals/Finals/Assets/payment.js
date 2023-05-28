const { createApp } = Vue;
createApp({
    data(){
        return{
            student_id: '',
            allPayment: [],
            allPayment2: [],
            invoice: [],
            invoiceid: [],
            search: [],
            searchs: [],
            last_name: '',
            first_name : '',
            course: '',
            paymentType: '',
            amount: '',
            date: '',
            payment_id:0
        }
    },
    methods:{
        payments:function(e){
            e.preventDefault();
            var form = e.currentTarget;

            const vue = this;
            var data = new FormData(form);
            data.append("method","payments");
            axios.post('../includes/model-stud.php',data)
            .then(function(r){
                if(r.data == "insertPayment"){
                    vue.getpay();
                    document.querySelector(".payms").reset();
                }
            });
        },
        getAllPayment:function(){
            var data = new FormData();
            const vue = this;
            data.append("method","allPayment");
            axios.post('../includes/backendRouter.php',data)
            .then(function(r){
                vue.allPayment = [];
                for(var v of r.data){
                    vue.allPayment.push({
                        student_id: v.student_id,
                        payment_id: v.payment_id,
                        last_name: v.last_name,
                        first_name: v.first_name,
                        course: v.course,
                        year_sec: v.year_sec,
                        email: v.email,
                        address: v.address,
                        paymentType: v.paymentType,
                        amount: v.amount,
                        status: v.status
                    })
                }
            })
        },
        getpay:function(){
            var data = new FormData();
            const vue = this;
            data.append("method","getpay");
            axios.post('../includes/backendRouter.php',data)
            .then(function(r){
                vue.allPayment2 = [];
                for(var v of r.data){
                    vue.allPayment2.push({
                        paymentType: v.paymentType,
                        amount: v.amount,
                        status: v.status
                    })
                }
            })
        },
        approveStatus:function(id){
            const vue = this;
            var data = new FormData();
            data.append("method","updateStatus");
            data.append("userId",id);
            axios.post('../includes/backendRouter.php',data)
            .then(function(r){
                if(r.data == 'Updated!'){
                    vue.getpay();
                    vue.getAllPayment();
                }
            })
        },
        RequestDecline:function(id){
            if(confirm("Are you sure you want to DECLINE this")){
                const vue = this;
                var data = new FormData();
                data.append("method","declineStatus");
                data.append("userId",id);
                axios.post('../includes/backendRouter.php',data)
                .then(function(r){
                    if(r.data == 'Decline!'){
                        vue.getpay();
                        vue.getAllPayment();
                    }
                })
            }
        },
        searchReceipt:function(search){
            var data = new FormData();
            const vue = this;
            data.append('method','allPayment');
            axios.post('../includes/backendRouter.php', data)
              .then(function(r) {
                vue.invoice = [];
                for (var v of r.data) {
                  if (v.student_id.toString().includes(search.toString()) ||
                    v.last_name.toLowerCase().includes(search.toLowerCase()) ||
                    v.first_name.toLowerCase().includes(search.toLowerCase()) ||
                    v.course.toLowerCase().includes(search.toLowerCase()) ||
                    v.year_sec.toLowerCase().includes(search.toLowerCase())) {
                    vue.invoice.push({
                      student_id: v.student_id,
                      last_name: v.last_name,
                      first_name: v.first_name,
                      year_sec: v.year_sec,
                      course: v.course,
                    //   paymentType: v.paymentType,
                    //   amount: v.amount,
                    //   status: v.status
                    })
                  }
                }
            })
        },
        searchPay:function(search) {
            var data = new FormData();
            const vue = this;
            data.append('method', 'allPayment');
            axios.post('../includes/backendRouter.php', data)
              .then(function(r) {
                vue.allPayment = [];
                for (var v of r.data) {
                  if (v.student_id.toString().includes(search.toString()) ||
                    v.last_name.toLowerCase().includes(search.toLowerCase()) ||
                    v.first_name.toLowerCase().includes(search.toLowerCase()) ||
                    v.course.toLowerCase().includes(search.toLowerCase()) ||
                    v.paymentType.toString().includes(search.toString()) ||
                    v.amount.toString().includes(search.toString()) ||
                    v.status.toString().includes(search.toString())) {
                    vue.allPayment.push({
                      student_id: v.student_id,
                      last_name: v.last_name,
                      first_name: v.first_name,
                      course: v.course,
                      paymentType: v.paymentType,
                      amount: v.amount,
                      status: v.status
                    })
                  }
                }
            })
        },
        getInvoice:function(){
            var data = new FormData();
            const vue = this;
            data.append("method","allPayment");
            axios.post('../includes/backendRouter.php',data)
            .then(function(r){
                vue.invoice = [];
                for(var v of r.data){
                    if(v.status == 1){
                        vue.invoice.push({
                            student_id: v.student_id,
                            payment_id: v.payment_id,
                            last_name: v.last_name,
                            first_name: v.first_name,
                            course: v.course,
                            year_sec: v.year_sec,
                            email: v.email,
                            address: v.address,
                            paymentType: v.paymentType,
                            amount: v.amount,
                            status: v.status
                        })
                    }
                }
            })
        },
        getInvoiceId:function(){
            var data = new FormData();
            const vue = this;
            data.append("method","allPaymentId");
            axios.post('../includes/backendRouter.php',data)
            .then(function(r){
                vue.invoiceid = [];
                for(var v of r.data){
                    if(v.status == 1){
                        vue.invoiceid.push({
                            student_id: v.student_id,
                            payment_id: v.payment_id,
                            last_name: v.last_name,
                            first_name: v.first_name,
                            course: v.course,
                            year_sec: v.year_sec,
                            email: v.email,
                            address: v.address,
                            paymentType: v.paymentType,
                            amount: v.amount,
                            status: v.status
                        })
                    }
                }
            })
        },
    },
    created:function(){
        this.getAllPayment();
        this.getpay();
        this.getInvoice();
        this.getInvoiceId();
    },
}).mount('#payment');