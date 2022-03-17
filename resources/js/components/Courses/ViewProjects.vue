<template>
    <div class="">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-md-12">
                <div class="card">
                    <div class="card-header">View Teachers</div>
                    <div class="card-body">
                        <table class="table table-striped" id="main_table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>                               
                                <th>View</th>                            
                            </tr>
                            </thead>
                            <tbody class="table-bordered">                    
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {  

        data: () => ({
            myArray: ''
        }),                
        mounted() {   
            var parent_this = this;
            $(document).on('click','.view_project', function() {
                var id = $(this).data("id");
                parent_this.$store.commit('show', {id:id});
                parent_this.$router.push('/view_project').catch(()=>{});
                // const userId = '123'
                // parent_this.$router.push({ path: `/add_teacher/${userId}` }) // -> /user/123
                // parent_this.$router.push('/add_teacher/' + id); 

                // parent_this.$router.push({ name: 'add_teacher', params: { userId } })
                // parent_this.$router.push({ path: 'register', query: { plan: 'private' } })
            })
            
            $('#main_table').DataTable({
                'processing':true,
                'serverSide':true,
                ajax: "api/projects/all",
                // dom: 'Bfrtip',                        
                columns:[
                    {data : 'id'},
                    {data : 'name'},                   
                    {data : 'view'}
                ],
                "order": [[0, "asc"]],
                aLengthMenu: [
                    [10, 25, 50, 100, 200, -1],
                    [10, 25, 50, 100, 200, "All"]
                ],
                "iDisplayLength": 10,                        
            })  
            
            axios.get('/api/projects/all',{
            }).then(res => {
                this.myArray = res.data;   
            }).catch(err => console.log(err));   
        
        },        
    }
</script>
