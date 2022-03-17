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
                                <th>Title</th>
                                <th>Address</th>
                                <th>Age</th>
                                <th>#Courses</th>
                                <th>Salary</th>
                                <th>Actions</th>                            
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

<script scoped>

    export default {  
                
        mounted() {   
            var parent_this = this;
            $(document).on('click','.edit_teacher', function() {
                var id = $(this).data("id");
                parent_this.$store.commit('show', {id:id});
                parent_this.$router.push('/add_teacher').catch(()=>{});
                // const userId = '123'
                // parent_this.$router.push({ path: `/add_teacher/${userId}` }) // -> /user/123
                // parent_this.$router.push('/add_teacher/' + id); 

                // parent_this.$router.push({ name: 'add_teacher', params: { userId } })
                // parent_this.$router.push({ path: 'register', query: { plan: 'private' } })
            })
            
            $('#main_table').DataTable({
                'processing':true,
                'serverSide':true,
                ajax: "api/teachers/all",
                // dom: 'Bfrtip',
                "dom": 'B<"row"<"col-sm-6"l><"col-sm-6"f>> <"row table-container"<"col-sm-12" t r >>  <"row"<"col-sm-5"i><"col-sm-7"p>>',
                buttons: [                  
                    {
                        "extend": 'csv',
                        "text": '<i class="fas fa-file-csv"></i>',
                        "titleAttr": 'Download in CSV',   
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        "extend": 'pdf',
                        "text": '<i class="far fa-file-pdf"></i>',
                        "titleAttr": 'Download in PDF',   
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        "extend": 'excel',
                        "text": '<i class="far fa-file-excel"></i>',
                        "titleAttr": 'Download in Excel',   
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    {
                        "extend": 'print',
                        "text": '<i class="fas fa-print"></i>',
                        "titleAttr": 'Print',   
                        exportOptions: {
                            columns: ':visible'
                        },
                    },
                    'colvis',
                ],
          
                columns:[
                    {data : 'id'},
                    {data : 'name'},
                    {data : 'title'},
                    {data : 'address'},
                    {data : 'age'},
                    {data : 'number_of_courses'},
                    {data : 'salary'},
                    {data : 'operations'}
                ],
                "order": [[0, "asc"]],

                aLengthMenu: [
                    [10, 25, 50, 100, 200, -1],
                    [10, 25, 50, 100, 200, "All"]
                ],
                "iDisplayLength": 10,                        
            })          
        
        },        
    }
</script>
