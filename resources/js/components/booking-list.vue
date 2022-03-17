<template>
    <table id="booking_list_table" class="table">
        <thead>
        <tr>
            <th>Username</th>
            <th>Doctor</th>
            <th>Date</th>
            <th>Time</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="row in data">
            <td><a :href="'/doctor/'+row.doctor_id+'/booking/'+row.id">{{ row.username }}</a></td>
            <td>{{ row.doctor_name }}</td>
            <td>{{ row.date }}</td>
            <td>{{ row.time }}</td>
        </tr>
        </tbody>
    </table>
</template>

<script>
export default {
    mounted(){
        $("#booking_list_table").DataTable();
    },
    name: "booking-list",
    props: {
        data: Array
    }
}
</script>

<style scoped>

</style>
