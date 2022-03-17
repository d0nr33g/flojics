<template>
    <div class="card my-3 py-3">
        <div class=" row no-gutters">
            <div class="col-md-4">
                <div class="m-3">
                    <a :href="'/doctor/'+row.id" class="text-decoration-none">
                        <img class="img-thumbnail" :src="row.photo.replace('public', 'storage')" alt="Card image cap">
                    </a>
                </div>
            </div>

            <div class="col-md-8">
                <div class="p-3">
                    <h3 class="card-title mt-3 blue-text"><i class="fas fa-user-md"></i> <a :href="'/doctor/'+row.id" class="text-decoration-none">{{row.name.charAt(0).toUpperCase() + row.name.slice(1)}}</a></h3>
                    <h4 class="card-title"><i class="fa-solid fa-stethoscope"></i> {{row.speciality.charAt(0).toUpperCase() + row.speciality.slice(1)}}</h4>
                    <p class="card-text"><i class="fa-solid fa-location-dot"></i> {{row.address}}</p>
                    <p class="card-text">{{row.experience}}</p>
                    <a  :href="'/doctor/'+this.row.id+'/booking/create'" class="btn btn-primary">Book Now</a>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "doctor",
    props:{
        row: Object
    },
    methods:{
        book: function (){
            console.log(this.row.id);
        }
    }
}
</script>

<style scoped>

</style>
