<template>
    <div class="loading-container hello">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header">View Courses</div> -->

                    <div class="card-body" style="padding-top:0.75rem;">     
                        <!-- <div class="wmd-view-topscroll" style="margin-bottom:10px;">
                            <div class="scroll-div1" style="height:0px;">
                            </div>
                        </div>            -->
                                                        
                        <Sortable></Sortable>                                                         
 
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import Sortable from '../Sortable';
    export default {
        name: 'Project',
        components: {
            Sortable
        },
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
</style>
