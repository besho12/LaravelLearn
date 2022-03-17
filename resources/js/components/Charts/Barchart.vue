<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        
                        <!-- chart -->
                        <!-- <div class="col-md-12"> -->
                          <D3BarChart :config="chart_config" :datum="chart_data"></D3BarChart>
                          <D3BarChart :config="chart_config2" :datum="chart_data2"></D3BarChart>
                          <D3LineChart :config="chart_config3" :datum="chart_data3"></D3LineChart>
                        <!-- </div> -->


                        <!-- value control -->
                        <!-- <select v-model="config.values">
                        <option :value="[d]" v-for="d in ['hours', 'production']">{{d}}</option>
                        </select> -->

                        <!-- current control -->
                        <!-- <select v-model="config.currentKey">
                        <option :value="d.year" v-for="d in data">{{d.year}}</option>
                        </select> -->

                        <!-- title control -->
                        <!-- <input type="text" v-model="chart_title"> -->

                        <!-- source control -->
                        <!-- <input type="text" v-model="chart_source"> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script scoped>

    import { D3BarChart } from 'vue-d3-charts';

    export default {
        components: {
            D3BarChart,
        },        
    
        data() {
            return {
                chart_data: [
                    //...                                
                    {lorem: 1648, ipsum: 9613, dolor: 1390, sit: 9130, year: '2013'},
                    {lorem: 2479, ipsum: 6315, dolor: 1560, sit: 6150, year: '2014'},
                    {lorem: 3200, ipsum: 12541, dolor: 5421, sit: 2541, year: '2015'},
                    {lorem: 1648, ipsum: 9613, dolor: 1390, sit: 9130, year: '2016'},
                    {lorem: 2479, ipsum: 6315, dolor: 1560, sit: 6150, year: '2017'},
                    {lorem: 3200, ipsum: 12541, dolor: 5421, sit: 2541, year: '2018'},
                    {lorem: 1648, ipsum: 9613, dolor: 1390, sit: 9130, year: '2019'},
                    {lorem: 2479, ipsum: 6315, dolor: 1560, sit: 6150, year: '2020'},
                    {lorem: 3200, ipsum: 12541, dolor: 5421, sit: 2541, year: '2021'},
                    {lorem: 1648, ipsum: 9613, dolor: 1390, sit: 9130, year: '2022'},               
                ],
                chart_config: {
                    key: 'year',
                    values: ['lorem', 'ipsum', 'dolor', 'sit'],
                    axis: {
                    yTicks: 4
                    },
                    color: {
                        keys: {
                            lorem: '#F98B3B',
                            ipsum: '#F26643',
                            dolor: '#FF463D',
                            sit: '#C92C39',
                        },
                    },
                },
                //////////////////////////////////
                chart_data2: [
                    {vue: 20, d3: 62, category: 'lorem'},
                    {vue: 28, d3: 47, category: 'ipsum'},
                    {vue: 35, d3: 36, category: 'dolor'},
                    {vue: 60, d3: 24, category: 'sit'},
                    {vue: 65, d3: 18, category: 'amet'},
                ],
                chart_config2: {
                    key: 'category',
                    values: ['vue', 'd3'],
                    orientation: 'horizontal',
                    color: {
                        keys: {
                            vue: '#41b882',
                            d3: '#b35899', 
                        },
                    },
                },
                //////////////////////////////////
                chart_data3: [
                    {hours: 238, production: 134, date: 2000},
                    {hours: 938, production: 478, date: 2001},
                    {hours: 1832, production: 1392, date: 2002},
                    {hours: 2092, production: 2343, date: 2003},
                    {hours: 2847, production: 2346, date: 2004},
                    {hours: 2576, production: 2233, date: 2005},
                    {hours: 2524, production: 2325, date: 2006},
                    {hours: 1648, production: 2456, date: 2007},
                    {hours: 2479, production: 2329, date: 2008},
                    {hours: 3200, production: 2438, date: 2009}
                ],
                chart_config3: {
                    values: ['hours', 'production'],
                    date: {
                        key: 'date',
                        inputFormat: '%Y',
                        outputFormat: '%Y',
                    },
                    // points:true,
                    axis: {
                        yTicks: 6,
                    },
                    color: {
                        scheme: ['#41B882', '#222f3e']
                    }
                },
            };
        },
    };
</script>
