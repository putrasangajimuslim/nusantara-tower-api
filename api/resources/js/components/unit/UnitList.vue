<template>
    <div class="p-4">
        <div class="text-left">
            <!-- <router-link class="btn btn-primary mb-3" class-active="active" to="/tenant/create">Add Data</router-link> -->
            <button class="btn btn-primary mb-3" @click.prevent="create">Add Data</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Unit</th>
                    <th>Lantai</th>
                    <th>Area</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="unit in units" :key="units.id">
                    <td>{{ unit.name }}</td>
                    <td>{{ unit.lantai }}</td>
                    <td>{{ unit.area }}</td>
                    <td>
                        <a @click.prevent="update(unit)" class="btn btn-primary">
                            View
                        </a>
                        <a @click.prevent="del(unit)" class="btn btn-danger">
                            Delete
                        </a>
                    </td>
                </tr>

                <tr v-if="units.length == 0">
                     <td colspan="7">No data units!</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import routes from './routes';

export default {
    data() {
        return {
             routesObject: routes,
             units: [],
        }
    },
    props: {
        csrf: ''
    },
    components: {
    },
    methods: {
        getDataUnit() {
            var urlToCall = routes.unit.list;

            axios.get(urlToCall)
                .then(response => {
                    if (response.error) {
                        alert("Sorry, something went wrong. Please try again later.");
                    } else {
                        this.isLoading = false;
                        this.units = response.data;
                    }
                })
                .catch(error => {
                    console.log(error);
                    alert("Sorry, something went wrong. Please try again later.");
                })
        },

        create() {
            window.location.href = routes.unit.create;
        },

        update(unit) {
            window.location.href = routes.unit.show + unit.id
        },

        del(unit) {
            if(confirm("Are you sure you want to tenant?")) {
                 window.location.href = routes.unit.delete + unit.id
            }
        }
    },
    mounted() {
        this.getDataUnit();
    }
};
</script>