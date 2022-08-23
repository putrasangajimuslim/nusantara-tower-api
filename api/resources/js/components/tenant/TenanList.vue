<template>
    <div class="p-4">
        <div class="text-left">
            <!-- <router-link class="btn btn-primary mb-3" class-active="active" to="/tenant/create">Add Data</router-link> -->
            <button class="btn btn-primary mb-3" @click.prevent="create">Add Data</button>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Address</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="tenant in tenants" :key="tenants.id">
                    <td>{{ tenant.company }}</td>
                    <td>{{ tenant.email }}</td>
                    <td>{{ tenant.phone }}</td>
                    <td>{{ tenant.address }}</td>
                    <td>
                        <a @click.prevent="update(tenant)" class="btn btn-primary">
                            View
                        </a>
                        <a @click.prevent="del(tenant)" class="btn btn-danger">
                            Delete
                        </a>
                    </td>
                </tr>

                <tr v-if="tenants.length == 0">
                     <td colspan="7">No data tenants!</td>
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
             tenants: [],
        }
    },
    props: {
        csrf: ''
    },
    components: {
    },
    methods: {
        getDataTenant() {
            var urlToCall = routes.tenant.list;

            axios.get(urlToCall)
                .then(response => {
                    if (response.error) {
                        alert("Sorry, something went wrong. Please try again later.");
                    } else {
                        this.isLoading = false;
                        this.tenants = response.data;
                    }
                })
                .catch(error => {
                    console.log(error);
                    alert("Sorry, something went wrong. Please try again later.");
                })
        },

        create() {
            window.location.href = routes.tenant.create;
        },

        update(tenant) {
            window.location.href = routes.tenant.show + tenant.id
        },

        del(tenant) {
            if(confirm("Are you sure you want to tenant?")) {
                 window.location.href = routes.tenant.delete + tenant.id
            }
        }
    },
    mounted() {
        this.getDataTenant();
    }
};
</script>