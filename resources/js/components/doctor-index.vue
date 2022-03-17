<template>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card my-3 ">
                <div class="sidebar p-4">
                    <div class="widget user_widget_search">
                        <h2>Search</h2>
                        <form id="user_wiget_search_form" class="user_wiget_search_form" method="GET">
                            <div class="form-group">
                                <label for="search">Doctor</label>
                                <input class="form-control"  id="search" placeholder="Search" v-model="searchQuery">
                            </div>
                            <div class="form-group">
                                <label for="user_sort">Sort</label>
                                <select class="form-control custom-select" id="user_sort">
                                    <option ></option>
                                    <option>A-Z</option>
                                    <option>Z-A</option>
                                    <option>Most viewed</option>
                                    <option>Most liked</option>
                                    <option>Popular</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user_filter">Filter</label>
                                <select class="form-control custom-select" id="user_filter">
                                    <option ></option>
                                    <option value="dermatology">Dermatology</option>
                                    <option value="dentistry">Dentistry</option>
                                    <option value="psychiatry">Psychiatry</option>
                                    <option value="pediatrics">Pediatrics & New Born</option>
                                    <option value="neurology">Neurology</option>
                                    <option value="orthopedics">Orthopedics</option>
                                    <option value="gynaecology">Gynaecology & Infertility</option>
                                    <option value="ent">Ear, Nose & Throat</option>
                                    <option value="cardiology">Cardiology & Vascular Disease</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div v-for="item in filteredResources">
                <doctor :row="item"></doctor>
            </div>
        </div>
    </div>
</template>

<script>
import doctor from './doctor.vue'
export default {
    name: "doctor-index",
    components: {
        doctor
    },
    props: {
        data: Array
    },
    data() {
        return {
            searchQuery: '',
            resources: this.data
        }
    },
    computed: {
        filteredResources (){
            if(this.searchQuery){
                return this.resources.filter((item)=>{
                    return item.name.toLowerCase().match(this.searchQuery.toLowerCase());
                })
            }else{
                return this.resources;
            }
        }
    }
}
</script>

<style scoped>

</style>
