<template>
    <div class="row">
    <div class="col-8">
				<h3>TODO LIST</h3>
        <table class="table">
          <thead>
						<tr>
							<th>#</th>
							<th>Task Name</th>
							<th>Order</th>
							<th>Sort</th>
						</tr>
          </thead>
					<draggable :list="listsNew" :options="{animation:200,handle:'.my-sort'}" :element="'tbody'" @change="update">
						<tr v-for="element in listsNew" :key="element.id"> 
							<td>{{ element.id }}</td>
							<td>{{ element.taskname }}</td>
							<td>{{ element.order }}</td>
							<td><i class="fa fa-arrows my-sort"></i></td>
						</tr>
					</draggable>
				</table>
    </div>
    </div> 
</template>

<script>
import draggable from "vuedraggable";

    export default {
        props:['lists'],
        components: {
            draggable
        },
        data() {
            return {
            listsNew: this.lists,
            }
        },
        methods: {
            update(){
                this.listsNew.map((element,index)=>{                    
                    element.order = index+1;
                })
                axios.put('/update',{
                    lists:this.listsNew
                }).then((response) =>{
                    //
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>