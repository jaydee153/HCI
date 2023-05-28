const { createApp } = Vue;
createApp({
    data(){
        return{
            chart:[],
        }
    },
    methods:{
        getChart:function(){
            const vue = this;
            const data = new FormData()
            data.append("method","getStatus")
            axios.post('../includes/model.php',data)
            .then(function(r){
                var chartdata = [];
                r.data.forEach(function(v){
                    chartdata.push({
                        'status' : v.status,
                        'count': v.count
                    })
                });
    
                var chart = document.getElementById('chart');
                new Chart(chart,{
                    type:'bar',
                    data: {
                        labels: chartdata.map(row => row.status),
                        datasets: [
                        {
                            label: 'Enrolled',
                            data: chartdata.map(row => row.count),
                            backgroundColor:[
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(255, 99, 132, 0.2)'],
                            borderColor: [
                                'rgb(75, 192, 192)',
                                'rgb(255, 99, 132)',
                            ],
                            borderWidth: 1
                        }
                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                suggestedMin: 0,
                                suggestedMax: 10
                            },
                        }
                    }
                });
            })
            
        },
    
        
    },
    created:function(){
        this.getChart();
    },
    mounted:function(){
        const vue = this;
        
    }
}).mount('#chart-app')