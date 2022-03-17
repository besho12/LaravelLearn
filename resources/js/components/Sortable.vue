        
<template>
    <div class="card-body" style="padding-top:0.75rem;" data-app>     
        <!-- <div class="wmd-view-topscroll" style="margin-bottom:10px;">
            <div class="scroll-div1" style="height:0px;">
            </div>
        </div>            -->
        <div class="view_all_courses" id="view_all_courses">

            <ul style="list-style:none;display: flex;width: 100%;">
                                    
                <li class="milestone_list connectedMilestoneSortable" v-if="myArray.length" v-for="element in myArray" :id="element.id" :key="element.id">
                                    
                    
                    <ul  class="course parent_drag_class sortable_list connectedSortable ui-sortable">
                        <div>
                            <div class="course_category disable-sort-item">
                                <i class="fas fa-bars move_icon_milestone"></i>
                                {{ element.name }}                                                    


                                <template>
                                    <v-menu offset-y left>
                                    <template v-slot:activator="{ on }">
                                        <v-btn class="white--text new_task_icon_button" v-on="on">
                                            <i class="fa fa-angle-down"></i>
                                        </v-btn>
                                    </template>

                                    <v-list class="list_new_task">
                                        <v-row justify="center">
                                            <v-dialog v-model="dialog" persistent max-width="600px">
                                            <template v-slot:activator="{ on }">
                                                <v-btn color="primary" class="new_task" v-on="on" @click="remove_popover(element.id)">
                                                    NEW TASK
                                                </v-btn>
                                            </template>
                                            <v-card>
                                                <v-card-title>
                                                <span class="text-h5">Task Information</span>
                                                </v-card-title>
                                                <v-card-text>
                                                <v-container>
                                                    <v-row>
                                                    <v-col cols="12">
                                                        <v-text-field v-model="milestone_name" label="Name"></v-text-field>
                                                    </v-col>                            
                                                    <v-col cols="12">
                                                        <v-text-field v-model="milestone_description" label="Description"></v-text-field>
                                                    </v-col>                            
                                                    </v-row>
                                                </v-container>
                                                
                                                </v-card-text>
                                                <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn color="#1e88e5" text @click="closing">Close</v-btn>
                                                <v-btn color="#1e88e5" text @click="save(element.id)">Save</v-btn>
                                                </v-card-actions>
                                            </v-card>
                                            </v-dialog>
                                        </v-row>
                                    </v-list>
                                    </v-menu>
                                </template>


                                <!-- <button tabindex="0"  
                                    class="add_milestone_icon" role="button" data-toggle="popover" data-placement="bottom" data-trigger="focus" >
                                    <i class="fa fa-angle-down"></i>
                                </button> -->

  
                            </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                        </div>
                 

                        <div class="li_class_tasks">
                            <li v-for="(task,index) in element['tasks']" :key="task.id" class="course_body ui-state-default ui-sortable-handle" style="display:block;">                                 

                                <div class="task_body">                                
                                    <div class="course_pic">
                                        <img src="https://media-exp1.licdn.com/dms/image/C4D03AQHL31XQHcGCww/profile-displayphoto-shrink_400_400/0/1606241495760?e=2147483647&v=beta&t=J6_ai1Dp01hr6llke4K4nJS41E1oRnCCjU0O7C1nHOE" alt="AdminLTE Logo" class="img-fluid">
                                    </div>                                        
                                    <div class="course_info">                                                    
                                        <div class="course_name">
                                            {{ task.description }}                                        
                                        </div>                                            
                                    </div> 
                                    <div class="task_extra_info">
                                        <p>Start Date: {{  task.created_at | myDate }}</p>
                                    </div>
                                    <!-- <i class="fas fa-arrows-alt move_icon"></i>                                                                     -->
                                </div>
                            </li>  
                        </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
                    </ul>             
                </li>
            </ul>

            
                                                                                                                                                                                                                                                          
                                
        </div>
    </div>

</template>



<script scoped>
import '../../../public/js/jquery-ui.min.js';

$(document).ready(function () {
    
});
$(document).on("click", ".add_new_task", function() {
    // alert($(this).parentElement.data("id"))
    alert($(this).data('id'))
});
    window.onload = function() {
        
    };
    document.addEventListener("dragstart", function(event) {
        // Change the opacity of the draggable element
        // event.target.style.opacity = "1";

    });

    function showScrollTop()
    {
        var outerwidth = document.getElementById('view_all_courses').scrollWidth;    
        $('.scroll-div1').css('width',outerwidth);  
        
        $(".wmd-view-topscroll").scroll(function () {
            $(".view_all_courses")
            .scrollLeft($(".wmd-view-topscroll").scrollLeft());
        });

        $(".view_all_courses").scroll(function () {
            $(".wmd-view-topscroll")
            .scrollLeft($(".view_all_courses").scrollLeft());
        });
    }        
    export default {
        name: 'Sortable',        
        data: () => ({
            myArray: '',
            disable_drag: 0, 
            dialog: false,  
            popover:false ,
            id:'', 
            milestone_id:'',
            milestone_name:'',
            milestone_description:'',
        }),
        methods: {    
            load_data(){
                axios.post('/api/get_milestones',{
                    id: this.$store.state.main_id[0]['id'],
                }).then(res => {
                    this.myArray = res.data;                      
                }).catch(err => console.log(err));
            },  
            addTask(id){
                alert(id)
            },
            greet(id){
                alert('milestone_id' + id)
            },
            closing(){                
                this.dialog = false;
            },
            save(milestone_id){                             
                axios.post('/api/save_task',{
                    project_id: this.id,
                    milestone_id: milestone_id,
                    name:this.milestone_name,
                    description:this.milestone_description
                }).then(res => {
                    this.load_data()                     
                }).catch(err => console.log(err));                                  
                this.dialog = false;   
            },
            remove_popover(id){
                $('.v-menu__content').css('display','none');                                 
            }
        },
        created() {       
            if(this.$store.state.main_id[0]['id'])     
            {
                this.id = this.$store.state.main_id[0]['id']
                this.load_data();                   
            }                 
            // if(window.mobile){
            //     this.disable_drag = 1
            // }
            // window.addEventListener("orientationchange", function() {
            //     this.disable_drag = 1
            //     // console.log('test')
            // });
            // window.addEventListener("resize", function() {
            //     // this.disable_drag = 1
            //     console.log('test')
            //     this.disable_drag = 5;
            // });
            // var res;
            // window.onresize=function() {
                // var self = this;
                // if (res){clearTimeout(res)};
                // res = setTimeout(function(){
                //     if(/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                //         console.log('mob')
                //         this.disable_drag = 1
                //         self.disable_drag = 1                       
                //     }else{
                //         console.log('desk')
                //         this.disable_drag = 0  
                //         self.disable_drag = 0                          
                //     }
                // },100);

                // console.log('test')
                // this.disable_drag = Math.random();
            // };
            
        },
        mounted() {
            console.log('Component mounted.')
            // showScrollTop();
            setTimeout(function(){
                //////for milestones///////
                $(".milestone_list").sortable({ 
                    connectWith: '.connectedMilestoneSortable',
                    revert: 300,
                    // animation: 800,
                    // handle: ".move_icon_milestone",      
                    // axis: "x"              
                })


                //////for tasks///////
                $(".sortable_list").sortable({ 
                    connectWith: '.connectedSortable',
                    revert: 300,
                    // animation: 800,
                    // handle: ".move_icon",
                    cancel: ".disable-sort-item",
                    items: "li:not(.disable-sort-item)"
                })
                // $('.add_milestone_icon').popover({
                //     // title: '<a role="button" class="btn btn-primary">Test</a>',
                //     // content: '',
                //     html: true
                // })

                // jQuery(function ($) {
                //     $(".add_milestone_icon").popover({trigger: "click",html: true, content: '<br><a role="button" class="add_new_task">NEW TASK</a><br><br>'})
                //     .click(function (event) {
                //         event.stopPropagation();
                //     }).on('inserted.bs.popover', function () {
                //         $(".popover").click(function (event) {                            
                //             event.stopPropagation();
                //         })
                //     })
                //     $(document).click(function () {
                //         $(".add_milestone_icon").popover('hide')
                //     })                                        
                // })
            },200)


           

           
        }
    }

    
</script>

<style>

.sortable {
    /* cursor:move; */
}
.hello .sortable-drag {
    opacity:1;
}

.sortable-ghost {
    opacity:0;    
}




ul{display: inline-block;}
  
  .sortable_list li span { position: absolute; margin-left: -1.3em; }


    .sortable_list {    
        width: 340px;
        min-height: 650px;
        list-style-type: none;
        margin: 0;
        float: left;
        margin-right: 10px;
    }

    .sortable_list li {
    
    }
    .move_icon_milestone {
        color:#000;
        /* cursor:ew-resize	 */
        cursor:move;	
    }
    .move_icon {
        float: right;
        margin-top: -30px;
        margin-right: -8px;
        color:#00b0ff;
    }
    .move_icon:hover {
        cursor:move;
    }
    .add_milestone_icon{
        color:#000;
        float:right;
        cursor:pointer;
    }
    .add_new_task {
        background:#84c529 !important;background-color:#84c529 !important;
        color:#fff;
        text-decoration: none;
        padding: 5px 60px;
        margin: 15px;
        /* width:200px; */
    }
    .add_new_task:hover{
        color:#fff;
       text-decoration: none;
    }




.list_new_task {
  padding: 22px 60px !important;
}
.new_task {
  padding: 4px 65px !important;
  background: #84c529 !important;
  background-color: #84c529 !important;
  color: #fff !important;
  border-radius: 4px !important;  
} 
.new_task_icon_button{
    background: none !important;
    box-shadow: none !important;
    color: #000 !important;
    float: right !important;
    height: 26px !important;
    min-width: 7px !important;
    padding: 10px 13px !important;
    width: 0 !important;
}
.task_body .task_extra_info{
    font-size:11px !important;
}
.task_body .task_extra_info p{
    margin:0 !important;
}
</style>