<template>

   
    <div style="">
        <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>

        <div class="col-md-12" style="">
            <div class="panel panel-default">                           
                <div class="panel-body" id="uploaded_image">                            
                </div>
            </div>
        </div>      
    </div>      
    
   

</template>

<script>
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'
Dropzone.autoDiscover = false;
export default {
  name: 'app',
  components: {
    vueDropzone: vue2Dropzone
  },
  beforeCreate: function () {
            // location.reload();
            // `this` points to the vm instance
            
            console.log('app before create')
            
            load_images();
              
        },    
  data: function () {
    return {
      dropzoneOptions: {
       
        autoProcessQueue : true,
        parallelUploads:1,
        url: 'dropzone/upload',
        thumbnailWidth: 150,
        dictDefaultMessage: "Drop files here or click to upload. <br> <i class='fas fa-upload'></i>",
        maxFilesize: 1200000000,
        headers: { 
            "My-Awesome-Header": "header value" ,
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg,.txt,.xml,.tmp",
        
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
      }
    }
  },
  


    
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
</script>