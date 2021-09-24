<template>
  <!-- Header -->

  <header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
      <!-- Left Section -->
      <div class="content-header-section">
        <!-- Toggle Sidebar -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <button
          type="button"
          class="btn btn-circle btn-dual-secondary"
          data-toggle="layout"
          data-action="sidebar_toggle"
        >
          <i class="fa fa-navicon"></i>
        </button>
        <!-- END Toggle Sidebar -->

        <!-- Open Search Section -->
        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
        <span style="font-size:18px;font-weight:600;">Smart Traffic Management System(S.T.M.S)</span>
        <!-- END Layout Options -->
      </div>
      <!-- END Left Section -->

      <!-- Right Section -->
      <div class="content-header-section">
        <!-- User Dropdown -->
        <div class="btn-group" role="group">
          <button
            type="button"
            class="btn btn-rounded btn-dual-secondary"
            id="page-header-user-dropdown"
            data-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <i class="fa fa-user d-sm-none"></i>
            <span class="d-none d-sm-inline-block">{{userName}}</span>
            <i class="fa fa-angle-down ml-5"></i>
          </button>
          <div
            class="dropdown-menu dropdown-menu-right min-width-200"
            aria-labelledby="page-header-user-dropdown"
          >
            <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">{{userName}}</h5>
            <router-link class="dropdown-item" to="/customerProfile">
              <i class="si si-user mr-5"></i> Profile
            </router-link>

            <!-- Toggle Side Overlay -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->

            <a class="dropdown-item" @click="logoutSessions($event)" href="javascript:void(0)">
              <i class="si si-logout mr-5"></i> Sign Out
            </a>
            <form id="logout-form" :action="baseurl+'/logout'" method="POST" style="display: none;">
              <input type="hidden" name="_token" :value="csrf">
            </form>
          </div>
        </div>
        <!-- END User Dropdown -->

        <!-- Notifications -->

        <!-- END Toggle Side Overlay -->
      </div>
      <!-- END Right Section -->
    </div>
    <!-- END Header Content -->

    <!-- Header Search -->

    <!-- END Header Search -->

    <!-- Header Loader -->
    <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-primary">
      <div class="content-header content-header-fullrow text-center">
        <div class="content-header-item">
          <i class="fa fa-sun-o fa-spin text-white"></i>
        </div>
      </div>
    </div>
    <!-- END Header Loader -->
  </header>
</template>
<script>
export default {
  data() {
    return {
      baseurl: document.getElementById("baseUrl").value,
      userName: document.getElementById("userName").value,
      csrf: document.head.querySelector('meta[name="csrf-token"]').content
    };
  },
  mounted() {
    console.log(this.baseurl + " " + this.csrf);
  },
  methods: {
    logoutSessions: function(event) {
      event.preventDefault();
      document.getElementById("logout-form").submit();
    }
  }
};
</script>