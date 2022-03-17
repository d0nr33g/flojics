<template>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-3 ">
                <img class="img-thumbnail" :src="'/'+doctor.photo.replace('public', 'storage')" alt="Card image cap">
                <h3 class="card-title mt-3 blue-text"><i class="fas fa-user-md"></i> <a :href="'/doctor/'+doctor.id" class="text-decoration-none">{{doctor.name.charAt(0).toUpperCase() + doctor.name.slice(1)}}</a></h3>
                <h4 class="card-title"><i class="fa-solid fa-stethoscope"></i> {{doctor.speciality.charAt(0).toUpperCase() + doctor.speciality.slice(1)}}</h4>
                <p class="card-text"><i class="fa-solid fa-location-dot"></i> {{doctor.address}}</p>
                <p class="card-text">{{doctor.experience}}</p>
            </div>
        </div>
        <div class="col-md-8 card p-4">

            <table id="booking_table" class="table">
                <thead>
                <tr>
                    <th>Username</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="row in data">
                    <td><a :href="'/doctor/'+doctor.id+'/booking/'+row.id">{{ row.username }}</a></td>
                    <td>{{ row.date }}</td>
                    <td>{{ row.time }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>

<script>

export default {
    mounted(){
        $("#booking_table").DataTable();
    },
    name: "booking-index",
    props:{
        data: Array,
        doctor: Object,
        user: Object
    },
}
</script>

<style scoped>

</style>
