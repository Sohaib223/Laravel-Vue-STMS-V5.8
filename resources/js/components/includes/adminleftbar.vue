<template>
  <!-- Sidebar -->
  <nav id="sidebar">
    <!-- Sidebar Content -->
    <div class="sidebar-content">
      <!-- Side Header -->
      <div class="content-header content-header-fullrow px-15">
        <!-- Mini Mode -->
        <div class="content-header-section sidebar-mini-visible-b">
          <!-- Logo -->
          <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
            <span class="text-dual-primary-dark">s</span>
            <span class="text-primary">m</span>
          </span>
          <!-- END Logo -->
        </div>
        <!-- END Mini Mode -->

        <!-- Normal Mode -->
        <div class="content-header-section text-center align-parent sidebar-mini-hidden">
          <!-- Close Sidebar, Visible only on mobile screens -->
          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
          <button
            type="button"
            class="btn btn-circle btn-dual-secondary d-lg-none align-v-r"
            data-toggle="layout"
            data-action="sidebar_close"
          >
            <i class="fa fa-times text-danger"></i>
          </button>
          <!-- END Close Sidebar -->

          <!-- Logo -->
          <div class="content-header-item">
            <a class="link-effect font-w700" href="index.html">
              <img :src="baseurl+'/public/uploads/logo.png'" style="width:200px" alt>
            </a>
          </div>
          <!-- END Logo -->
        </div>
        <!-- END Normal Mode -->
      </div>
      <!-- END Side Header -->

      <!-- Side Navigation -->
      <div class="content-side content-side-full">
        <ul class="nav-main">
          <li class="nav-main-heading">
            <span class="sidebar-mini-visible" style="font-size:10px;">NA</span>
            <span class="sidebar-mini-hidden" style="font-size:10px;">Navigation</span>
          </li>
          <li>
            <router-link class="active" :to="{ name: 'adminDashboard' }">
              <i class="si si-home"></i>
              <span class="sidebar-mini-hide">Dashboad</span>
            </router-link>
          </li>
          <li>
            <a class="nav-submenu" data-toggle="nav-submenu" href="#">
              <i class="fa fa-users"></i>
              <span class="sidebar-mini-hide">Users</span>
            </a>
            <ul>
              <li>
                <router-link :to="{name: 'manageCustomer'}">Users List</router-link>
              </li>
              <li>
                <router-link :to="{name: 'createCustomer'}">Create Users</router-link>
              </li>
            </ul>
          </li>
          <li>
            <a class="nav-submenu" data-toggle="nav-submenu">
              <i class="fa fa-bullhorn"></i>
              <span class="sidebar-mini-hide">Complaint</span>
            </a>
            <ul>
              <li>
                <router-link :to="{ name: 'manageComplaint' }">Complaint List</router-link>
              </li>
              <li>
                <router-link :to="{ name: 'createComplaint' }">Create Complaint</router-link>
              </li>
              <li>
                <router-link :to="{ name: 'manageComplaintCategory' }">Complaint Category</router-link>
              </li>
            </ul>
          </li>
          <li>
            <a class="nav-submenu" data-toggle="nav-submenu" href="#">
              <i class="fa fa-bell-o"></i>
              <span class="sidebar-mini-hide">Notification</span>
            </a>
            <ul>
              <li>
                <router-link :to="{name: 'manageNotification'}">Notification List</router-link>
              </li>
              <li>
                <router-link :to="{name: 'createNotification'}">Create Notification</router-link>
              </li>
            </ul>
          </li>

          <li>
            <a class="nav-submenu" data-toggle="nav-submenu" href="#">
              <i class="fa fa-header"></i>
              <span class="sidebar-mini-hide">Emergency Help</span>
            </a>
            <ul>
              <li>
                <router-link :to="{name : 'manageEmergencyHelp'}">Emergency Help List</router-link>
              </li>
              <li>
                <router-link :to="{name : 'createEmergencyHelp'}">Create Emergency Help</router-link>
              </li>
            </ul>
          </li>
          <li>
            <a class="nav-submenu" data-toggle="nav-submenu" href="#">
              <i class="fa fa-commenting-o"></i>
              <span class="sidebar-mini-hide">Feedback</span>
            </a>
            <ul>
              <li>
                <router-link :to="{name : 'manageFeedback'}">Feedback List</router-link>
              </li>
              <li>
                <router-link :to="{name : 'createFeedback'}">Create Feedback</router-link>
              </li>
            </ul>
          </li>

          <li>
            <a class="nav-submenu" data-toggle="nav-submenu" href="#">
              <i class="fa fa-map-marker"></i>
              <span class="sidebar-mini-hide">Location</span>
            </a>
            <ul>
              <li>
                <router-link :to="{name : 'createlocations'}">Add Location</router-link>
              </li>
              <li>
                <router-link :to="{name : 'managelocations'}">Manage Location</router-link>
              </li>
            </ul>
          </li>

          <li>
            <router-link :to="{ name: 'reporting' }">
              <i class="fa fa-list-alt"></i>
              <span class="sidebar-mini-hide">Reporting</span>
            </router-link>
          </li>
        </ul>
      </div>
      <!-- END Side Navigation -->
    </div>
    <!-- Sidebar Content -->
  </nav>
  <!-- Sidebar -->
</template>
<script>
export default {
  data() {
    return {
      baseurl: document.getElementById("baseUrl").value,
      userName: document.getElementById("userName").value,
      csrf: document.head.querySelector('meta[name="csrf-token"]').content
    };
  }
};
</script>
