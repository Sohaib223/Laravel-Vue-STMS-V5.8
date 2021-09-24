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
                        <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
                    </span>
                    <!-- END Logo -->
                </div>
                <!-- END Mini Mode -->

                <!-- Normal Mode -->
                <div class="content-header-section text-center align-parent sidebar-mini-hidden">
                    <!-- Close Sidebar, Visible only on mobile screens -->
                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                    <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                        <i class="fa fa-times text-danger"></i>
                    </button>
                    <!-- END Close Sidebar -->

                    <!-- Logo -->
                    <div class="content-header-item">
                        <a class="link-effect font-w700" href="index.html">
                            <i class="si si-fire text-primary"></i>
                            <span class="font-size-xl text-dual-primary-dark">code</span><span class="font-size-xl text-primary">base</span>
                        </a>
                    </div>
                    <!-- END Logo -->
                </div>
                <!-- END Normal Mode -->
            </div>
            <!-- END Side Header -->

            <!-- New Account -->
            <div class="content-side content-side-full bg-black-op-10">
                <button type="button" class="btn btn-sm btn-block btn-hero btn-alt-success" data-toggle="click-ripple">
                    <i class="fa fa-briefcase mr-5"></i> New Project
                </button>
            </div>
            <!-- END New Account -->

            <!-- Side Navigation -->
            <div class="content-side content-side-full">
                <ul class="nav-main">
                    <li>
                        <a class="active" href="db_dark.html"><i class="si si-home"></i><span class="sidebar-mini-hide">Home <span class="badge badge-pill badge-primary ml-5">3</span></span></a>
                    </li>
                    <li class="nav-main-heading"><span class="sidebar-mini-visible">PR</span><span class="sidebar-mini-hidden">Projects</span></li>
                    <li>
                        <a class="active" href="db_dark.html"><i class="si si-home"></i><span class="sidebar-mini-hide">Home <span class="badge badge-pill badge-primary ml-5">3</span></span></a>
                    </li>
                    
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- Sidebar Content -->
    </nav>

</template>
<script>
export default {
    
}
</script>
