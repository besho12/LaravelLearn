<template>
    <div class="attachment_section">
        <div class="row justify-content-center">
            <div class="col-md-12">                                
                <div class="row">                                  
                    <div class="col-md-12" >
                        <form method="POST" id="dropzoneForm" style="margin-bottom:0;" class="dropzone" action="dropzone/upload">
                            <input type="hidden" name="_token" :value="csrf">
                        </form>
                    </div>
                </div>
                <!-- <div class="my-dropzone"></div> -->        


                <div class="col-md-12" style="margin-top:5px">
                    <div class="panel panel-default">                           
                        <div class="panel-body" id="uploaded_image">                            
                        </div>
                    </div>
                </div>                                             
            </div>
        </div>
    </div>
</template>


<script type="text/javascript">

    // var element = document.getElementById("dropzoneForm");
    
    // element.classList.add("dropzone");
    // import Dropzone  from "../../../public/js/dropzone";
    // import Dropzone from "dropzone";
    // Dropzone.autodiscover = false;
    // import Dropzone  from "../../../public/js/dropzone";
    Dropzone.options.dropzoneForm =
    {
        maxFilesize: 12,
        // renameFile: function(file) {
        //     // var dt = new Date();
        //     // var time = dt.getTime();
        //    return Math.floor(Math.random() * 1000000)+file.name;
        // },
        // acceptedFiles: ".jpeg,.jpg,.png,.gif",
        autoProcessQueue : true,
        parallelUploads:1,
        acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",
        // timeout: 50000,
        init: function() {      
            var _this = this;         
            setTimeout(function(){                                     
                _this.on("success", function(){
                    if(_this.getQueuedFiles().length == 0 && _this.getUploadingFiles().length == 0)
                    {
                        // var _this = this;
                        _this.removeAllFiles();
                    }
                    load_images();
                });  
                // _this.on("sending", function (file) {
                // _this.options.renameFilename = function(file){
                //     //keeping the file extension.
                //     var ext = file.split('.').pop();
                //     return file.name = filename + '.' + ext;
                // };
            // });
                


            },300,this);
        },          
        success: function(file, response) 
        {
            load_images(); 
            console.log(response)           
        },
        error: function(file, response)
        {
        return false;
        }
    };

    function load_images()
    {
        console.log('1')
        $.ajax({
            url:"dropzone/fetch",
            success:function(data)
            {
                $('#uploaded_image').html(data);
            }
        })
    }


    $(document).on('click', '.remove_image', function(){
        var name = $(this).attr('id');
        $.ajax({
            url:"dropzone/delete",
            data:{name : name},
            success:function(data){
                load_images();
            }
        })
    });
    
    // import Dropzone  from "../../../public/js/dropzone";

    export default {     
        name:'Attachment',
        beforeDestroy: function () {
            // `this` points to the vm instance
            
        },

        beforeCreate: function () {
            // location.reload();
            // `this` points to the vm instance
            
            console.log('app before create')
            
            load_images();
              
        },               




        data() {
            return {
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        // created() {    
            
        // },
        mounted(){
            console.log('test')
            // document.getElementById("dropzoneForm").classList.add("dropzone");
             
        },
       
        // updated() {
               
        // },
        props: {
            category: String
        },
    }
</script>

<style scoped>
    .dropzone {
        min-height: 150px;
        background: #fff;
        padding: 20px;
        cursor: pointer;
        box-shadow: 1px 3px 8px rgb(0 0 0 / 9%);
        border: 1px solid #eee!important;
    }
    .dropzone .dz-message {
        margin: 2.5em 0!important;
        font-size: 2.5rem;
        text-align: center;
        color: #a6a9b7;
    }
</style>
