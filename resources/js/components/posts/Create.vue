<template>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPost">
  New Post
</button>

<!-- Modal -->
<div class="modal fade" id="createPost" tabindex="-1" aria-labelledby="createPostLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createPostLabel">New Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form @submit.prevent="createPost">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input v-model="title" placeholder="Post Title" type="text" class="form-control" id="title" />
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea v-model="body" placeholder="Post Body" class="form-control" id="body" rows="3"></textarea>
                </div>
               <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Create</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               </div>
          </form>
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
            title: '',
            body: '',
        }
    },
    methods: {
        async createPost(){
            if (this.title.length == 0 || this.title.length == 0){
                alert('Make sure that the title or body is not empty');
                return;
            }

            const post = {
                title: this.title,
                body: this.body
            };

            try {
                let res = await axios.post('api/create', post);
                console.log("Res=>", res);
                this.title = '';
                this.body = '';
                this.$.emit('update-posts');
            } catch (e){
                console.log("Error=>", e);
            }
        }
    },
    emits: ['update-posts']
}

</script>
