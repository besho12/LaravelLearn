<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <D3PieChart :config="chart_config" :datum="chart_data"></D3PieChart>
                        <button @click="addData()">Add</button>
                        <button @click="removeFirst()">Remove first</button>
                        <button @click="removeLast()">Remove last</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script scoped>

    import { D3PieChart } from 'vue-d3-charts';

    export default {        
        components: {
            D3PieChart,
        },       
        data() {
    return {
      chart_data: [
        {hours: 20, name: 'Lorem'},
        {hours: 30, name: 'Ipsum'},
        {hours: 30, name: 'Dolor'},
        {hours: 20, name: 'Sit'},
      ],
      chart_config: {
        key: 'name',
        value: 'hours',
        color: {scheme: 'schemeTableau10'},
        // radius: {inner: 80}
        radius: {inner: 0}
      },
      count: 1
    }
  },
  methods: {
    addData(){
      const hours = Math.floor(Math.random() * 30);
      const name = 'New '+this.count++;
      this.chart_data.push({hours, name})
    },
    removeFirst(){
      if(!this.chart_data.length) return;
      this.chart_data.splice(0, 1);
    },
    removeLast(){
      if(!this.chart_data.length) return;
      this.chart_data.splice(this.chart_data.length-1, 1);
    }
  }
        
    }
</script>
