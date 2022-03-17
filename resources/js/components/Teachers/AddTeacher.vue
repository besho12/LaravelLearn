<template>
    <div class="" data-app>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div v-if="!this.$store.state.main_id[0]['id']" class="card-header">Add Teahcer</div>
                    <div v-else class="card-header">Update Teahcer</div>

                    <div class="card-body">
                        <form @submit.prevent="form.id ? editTeacher() : addTeacher()">                             
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- <label>Teacher Name</label> -->
                                        <v-text-field v-model="form.name" name="name" :class="{ 'error--text': form.errors.has('name') }"  label="First name" ></v-text-field>
                                        <!-- <input v-model="form.name" type="text" name="name" :class="{ 'is-invalid': form.errors.has('name') }" placeholder="Teacher Name" class="form-control" >                     -->
                                        <div class="error--text" v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                                    </div>
                                </div>                    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Teacher Title</label>
                                        <input v-model="form.title" type="text" name="title" :class="{ 'is-invalid': form.errors.has('title') }" placeholder="Teacher Title" class="form-control" >                    
                                        <div class="error--text" v-if="form.errors.has('title')" v-html="form.errors.get('title')" />
                                    </div>
                                </div>                                                    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Teacher Age</label>
                                        <input v-model="form.age" type="text" name="age" :class="{ 'is-invalid': form.errors.has('age') }" placeholder="Teacher Age" class="form-control" >                    
                                        <div class="error--text" v-if="form.errors.has('age')" v-html="form.errors.get('age')" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Teacher Courses#</label>
                                        <input v-model="form.number_of_courses" type="text" name="number_of_courses" :class="{ 'is-invalid': form.errors.has('number_of_courses') }" placeholder="Teacher Courses#" class="form-control" >                    
                                        <div class="error--text" v-if="form.errors.has('number_of_courses')" v-html="form.errors.get('number_of_courses')" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Teacher Salary</label>
                                        <input v-model="form.salary" type="text" name="salary" :class="{ 'is-invalid': form.errors.has('salary') }" placeholder="Teacher Salary" class="form-control" >                                                            
                                        <div class="error--text" v-if="form.errors.has('salary')" v-html="form.errors.get('salary')" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Teacher Address</label>
                                        <textarea v-model="form.address" name="address" :class="{ 'is-invalid': form.errors.has('address') }" cols="30" rows="8" class="form-control"></textarea>
                                        <div class="error--text" v-if="form.errors.has('address')" v-html="form.errors.get('address')" />
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                    <button type="submit" v-if="!this.$store.state.main_id[0]['id']" class="btn btn-primary" style="padding:4px 30px;">Save</button>
                                    <button type="submit" v-else-if="this.$store.state.main_id[0]['id']" class="btn btn-primary" style="padding:4px 30px;">Update</button>
                                    <button type="button" v-if="this.$store.state.main_id[0]['id']" @click="newTeacher" class="btn btn-success" style="padding:4px 30px;">New</button>                                    
                                </div>            

                                <br><br>
                                <div class="col-md-12">
                                    <!-- <Attachment v-if="renderComponent"  :category='"accessories"'></Attachment> -->
                                    <!-- <Example v-if="renderComponent"></Example> -->
                                    <Attachment2></Attachment2>
                                    <Vuetify></Vuetify>
                                    

                                </div>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    // import Dropzone  from "../../../../public/js/dropzone";
    // import Attachment from '../AttachmentComponent.vue';
    import Example from '../ExampleComponent.vue';
    import Attachment2 from '../Attachment2.vue';
    import Vuetify from '../Vuetify.vue';
    export default {   
        name: 'Teacher',
        components: {
            Attachment2,Vuetify
        },     
        beforeCreated(){
            this.forceRerender2();
        },
        beforeDestroy () {
            // localStorage.removeItem('vuex');
            // this.$root.$emit('forceRerender')
            this.$store.commit('show', {id: ''});

        },      
        data: () => ({
            form: new Form({
                id: '',
                name: '',
                title: '',
                age: '',
                number_of_courses: '',
                salary: '',
                address: '',
            }),
            renderComponent: true,
            nameRules: [
                v => !!v || 'Name is required',
                v => v.length <= 10 || 'Name must be less than 10 characters',
            ],
            emailRules: [
                v => !!v || 'E-mail is required',
                v => /.+@.+/.test(v) || 'E-mail must be valid',
            ],
        }),
        methods:{                      
            forceUpdate() {
                this.$forceUpdate();
            },       
            addTeacher(){
                this.form.post('api/add/teacher')
                .then(() => {
                    Swal.fire({                        
                        icon: 'success',
                        title: 'Teacher Added',
                        confirmButtonColor: '#28a745',    
                        confirmButtonText: 'Okay',                    
                    })                   
                })
            },
            editTeacher(){
                this.form.post('api/edit/teacher')
                .then(() => {
                    Swal.fire({                        
                        icon: 'success',
                        title: 'Teacher Updated',
                        confirmButtonColor: '#28a745',    
                        confirmButtonText: 'Okay',                    
                    })                   
                })
            },
            newTeacher()
            {
                this.$store.commit('show', {id: ''});          
                this.form.reset();
            }
        },
        mounted(){
            this.forceUpdate();
        },
        created() {       
            if(this.$store.state.main_id[0]['id'])     
            {
                axios.post('/api/get_teacher',{
                    // id:this.$route.params.teacher_id
                    id:this.$store.state.main_id[0]['id']
                }).then(res => {
                    this.form.fill(res.data);      
                    // this.$store.commit('show', {id: ''});          
                }).catch(err => console.log(err));   
            }
        }
    }
</script>
