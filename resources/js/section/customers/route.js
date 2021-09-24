import Vue from 'vue';
import VueRouter from 'vue-router';

import customerDashboard from './../../components/pages/dashboards/customerDashboard.vue';

import manageComplaint from './../../components/pages/complaint/manageComplain.vue';
import createComplaint from './../../components/pages/complaint/createComplain.vue';


import manageEmergencyHelp from './../../components/pages/emergencyHelp/manageHelp.vue';
import createEmergencyHelp from './../../components/pages/emergencyHelp/createHelp.vue';


import manageFeedback from './../../components/pages/feedback/manageFeedback.vue';
import createFeedback from './../../components/pages/feedback/createFeedback.vue';
import editFeedback from './../../components/pages/feedback/editFeedback.vue';

import manageNotification from './../../components/pages/notification/manageNotification.vue';

import customerProfile from './../../components/pages/profiles/customer.vue';


Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [

        { path: '/', name: 'customerDashboard', component: customerDashboard },

        { path: '/complaint', name: 'manageComplaint', component: manageComplaint },
        { path: '/complaint/create', name: 'createComplaint', component: createComplaint },

        { path: '/emergencyHelp', name: 'manageEmergencyHelp', component: manageEmergencyHelp },
        { path: '/emergencyHelp/create', name: 'createEmergencyHelp', component: createEmergencyHelp },


        { path: '/feedback', name: 'manageFeedback', component: manageFeedback },
        { path: '/feedback/create', name: 'createFeedback', component: createFeedback },
        { path: '/feedback/:id/edit', name: 'editFeedback', component: editFeedback },

        { path: '/notification', name: 'manageNotification', component: manageNotification },


        { path: '/customerProfile', name: 'customerProfile', component: customerProfile },



    ]
});

export default router;