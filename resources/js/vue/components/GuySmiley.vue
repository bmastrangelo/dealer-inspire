<template>
    <!-- Contact Section -->
    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div v-if="!formSubmitted" class="col-lg-8 col-lg-offset-2">
                <h2>Contact Guy Smiley</h2>
                <p>Remember Guy Smiley?  Yeah, he wants to hear from you.</p>
                <div class="form-group">
                    <label for="full_name">Full Name *</label>
                    <div v-if="form.errors().has('full_name')" v-text="form.errors().get('full_name')"></div>
                    <input v-model="form.full_name" type="text" class="form-control" id="full_name" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <label for="email">Email address *</label>
                    <div v-if="form.errors().has('email')" v-text="form.errors().get('email')"></div>
                    <input v-model="form.email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <div v-if="form.errors().has('phone')" v-text="form.errors().get('phone')"></div>
                    <input v-model="form.phone" type="text" class="form-control" id="phone" placeholder="Phone">
                </div>
                <div class="form-group">
                    <label for="message">Message</label><br>
                    <div v-if="form.errors().has('message')" v-text="form.errors().get('message')"></div>
                    <textarea v-model="form.message" class="form-control" id="message"></textarea>
                </div>
                <button :disabled="form.empty('full_name', 'email', 'message')" @click="handleSubmit" class="btn btn-primary">Submit</button>
            </div>
            <div v-else class="col-lg-8 col-lg-offset-2">
                <h2>Contact Guy Smiley</h2>
                <p>Thank you for contacting Guy Smiley.</p>
                <p>He will soon respond to your message with a smile!</p>
            </div>
        </div>
    </section>
</template>

<script>
import form from 'vuejs-form';
import axios from 'axios';
const API_BASE_URL = window.location.origin;
const baseURL = `${API_BASE_URL}/api`;

export default {
    name: 'GuySmiley',
    data() {
        return {
            http: axios.create({
                baseURL,
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'application/json'
                }
            }),
            formSubmitted: false,
            form: form.default({
                full_name: '',
                email: '',
                phone: '',
                message: ''
            })
                .rules({
                    full_name: 'string|min:5|required',
                    email: 'email|min:5|required',
                    message: 'string|min:5|required'
                })
                .messages({
                    'email.email': 'Email field must be an email!',
                    'email.min': ':attribute may not have less than :min characters',
                    'full_name.min': ':attribute may not have less than :min characters',
                    'message.min': ':attribute may not have less than :min characters'
                })
        };
    },
    methods: {
        async handleSubmit() {
            if (this.form.validate().errors().any()) return;
            const payload = JSON.parse(JSON.stringify(this.form.all()));
            console.log('form all(): ', payload);

            await this.http.post('/form-submissions', payload).then(data => {
                this.formSubmitted = true;
            });
        }
    }
};
</script>

<style scoped>

</style>
