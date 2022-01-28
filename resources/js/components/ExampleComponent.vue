<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <h4 class="display-4">{{ name }}</h4>
                        <button @click="changeName" class="btn btn-primary btn-sm">Change Name</button>
                        <input v-model="age" type="text" class="form-control">
                        <div v-if="age >= 18" class="alert alert-success">
                            <small>Your age is above 17</small>
                        </div>
                        <div v-else class="alert alert-danger">
                            <small>You are not allowed to enter the Mall</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: 'Dummy Value!',
            age: 21
        }
    },
    methods: {
        changeName(){
            this.name = 'James Gosling';
        },
        async fetchPosts(){
            try {
                let res = await axios.get('/posts/api/');

                console.log(res);
            } catch (e){
                console.log("Error=>", e);
            }
        }
    },
    mounted() {
        console.log('Component mounted.')
    },
    created() {
        this.fetchPosts();
    }
}
</script>
