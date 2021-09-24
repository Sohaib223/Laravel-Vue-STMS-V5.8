import Vue from 'vue';
import VueRouter from 'vue-router';

import adminDashboard from './../../components/pages/dashboards/adminDashboard.vue';

import manageComplaint from './../../components/pages/complaint/manageComplain.vue';
import createComplaint from './../../components/pages/complaint/createComplain.vue';
import editComplaint from './../../components/pages/complaint/editComplain.vue';

import manageComplaintCategory from './../../components/pages/complaintCategory/manageCategory.vue';
import createComplaintCategory from './../../components/pages/complaintCategory/createCategory.vue';
import editComplaintCategory from './../../components/pages/complaintCategory/editCategory.vue';

import manageCustomer from './../../components/pages/customer/manageCustomer.vue';
import createCustomer from './../../components/pages/customer/createCustomer.vue';
import editCustomer from './../../components/pages/customer/editCustomer.vue';

import manageEmergencyHelp from './../../components/pages/emergencyHelp/manageHelp.vue';
import createEmergencyHelp from './../../components/pages/emergencyHelp/createHelp.vue';
import editEmergencyHelp from './../../components/pages/emergencyHelp/editHelp.vue';

import manageFeedback from './../../components/pages/feedback/manageFeedback.vue';
import createFeedback from './../../components/pages/feedback/createFeedback.vue';
import editFeedback from './../../components/pages/feedback/editFeedback.vue';

import manageNotification from './../../components/pages/notification/manageNotification.vue';
import createNotification from './../../components/pages/notification/createNotification.vue';
import editNotification from './../../components/pages/notification/editNotification.vue';

import manageTrafficPolice from './../../components/pages/trafficPolice/managePolice.vue';
import createTrafficPolice from './../../components/pages/trafficPolice/createPolice.vue';
import editTrafficPolice from './../../components/pages/trafficPolice/editPolice.vue';

import managelocations from './../../components/pages/locations/manage_locations.vue';
import createlocations from './../../components/pages/locations/create_locations.vue';
import editlocations from './../../components/pages/locations/edit_locations.vue';

import adminProfile from './../../components/pages/profiles/admin.vue';

import reporting from './../../components/pages/reporting/reporting.vue';



Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [

        { path: '/', name: 'adminDashboard', component: adminDashboard },

        { path: '/complaint', name: 'manageComplaint', component: manageComplaint },
        { path: '/complaint/create', name: 'createComplaint', component: createComplaint },
        { path: '/complaint/:id/edit', name: 'editComplaint', component: editComplaint },

        { path: '/customer', name: 'manageCustomer', component: manageCustomer },
        { path: '/customer/create', name: 'createCustomer', component: createCustomer },
        { path: '/customer/:id/edit', name: 'editCustomer', component: editCustomer },

        { path: '/complaintCategory', name: 'manageComplaintCategory', component: manageComplaintCategory },
        { path: '/complaintCategory/create', name: 'createComplaintCategory', component: createComplaintCategory },
        { path: '/complaintCategory/:id/edit', name: 'editComplaintCategory', component: editComplaintCategory },

        { path: '/emergencyHelp', name: 'manageEmergencyHelp', component: manageEmergencyHelp },
        { path: '/emergencyHelp/create', name: 'createEmergencyHelp', component: createEmergencyHelp },
        { path: '/emergencyHelp/:id/edit', name: 'editEmergencyHelp', component: editEmergencyHelp },

        { path: '/feedback', name: 'manageFeedback', component: manageFeedback },
        { path: '/feedback/create', name: 'createFeedback', component: createFeedback },
        { path: '/feedback/:id/edit', name: 'editFeedback', component: editFeedback },

        { path: '/notification', name: 'manageNotification', component: manageNotification },
        { path: '/notification/create', name: 'createNotification', component: createNotification },
        { path: '/notification/:id/edit', name: 'editNotification', component: editNotification },

        { path: '/trafficPolice', name: 'manageTrafficPolice', component: manageTrafficPolice },
        { path: '/trafficPolice/create', name: 'createTrafficPolice', component: createTrafficPolice },
        { path: '/trafficPolice/:id/edit', name: 'editTrafficPolice', component: editTrafficPolice },

        { path: '/locations', name: 'managelocations', component: managelocations },
        { path: '/locations/create', name: 'createlocations', component: createlocations },
        { path: '/locations/:id/edit', name: 'editlocations', component: editlocations },


        { path: '/adminProfile', name: 'adminProfile', component: adminProfile },

        { path: '/reporting', name: 'reporting', component: reporting },

    ]
});

export default router;