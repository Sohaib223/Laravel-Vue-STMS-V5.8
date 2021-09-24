<template>
  <div>
    <div
      class="bg-image bg-image-bottom"
      :style="{backgroundImage: 'url('+baseurl+'/public/assets/media/photos/photo34@2x.jpg'+')'}"
    >
      <div class="bg-primary-dark-op">
        <div class="content content-top text-center overflow-hidden">
          <div class="pt-50 pb-20">
            <h1
              class="font-w700 text-white mb-10 js-appear-enabled animated fadeInUp"
              data-toggle="appear"
              data-class="animated fadeInUp"
            >Complaints</h1>
            <h2
              class="h4 font-w400 text-white-op js-appear-enabled animated fadeInUp"
              data-toggle="appear"
              data-class="animated fadeInUp"
            >Welcome to your custom panel!</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="block">
            <div class="block-header block-header-default">
              <h3 class="block-title">Edit Complaint</h3>
              <div class="block-options">
                <router-link to="/complaint" class="btn btn-info">Manage Complaints</router-link>
                <router-link to="/complaint/create" class="btn btn-info">Add Complaints</router-link>
              </div>
            </div>
            <div class="block-content block-content-full clearfix">
              <form @submit="submitForm($event)">
                <div class="row">
                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.title) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <input
                          type="text"
                          class="form-control"
                          v-model="myForm.title"
                          placeholder="Enter Complaint Title"
                        >
                        <label for="material-text2">Title</label>
                      </div>
                      <div
                        v-if="allerrors.title"
                        v-for="error_name in allerrors.title"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.category_id) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <select class="form-control js-select2 category-selector">
                          <option value>Select Any Category</option>
                          <option
                            :value="key"
                            v-for="(category,key) in categories"
                            v-text="category"
                          ></option>
                        </select>
                        <label for="material-text2">Category</label>
                      </div>
                      <div
                        v-if="allerrors.category_id"
                        v-for="error_name in allerrors.category_id"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.location_id) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <select class="form-control js-select2 location-selector">
                          <option value selected>Select Complaint Location</option>
                          <option
                            :value="key"
                            v-for="(location,key) in locations"
                            v-text="location"
                          ></option>
                        </select>
                        <label for="material-text2">Location</label>
                      </div>
                      <div
                        v-if="allerrors.location_id"
                        v-for="error_name in allerrors.location_id"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.address) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <input
                          type="text"
                          class="form-control"
                          placeholder="Enter Street Address"
                          v-model="myForm.address"
                        >

                        <label for="material-text2">Street Address</label>
                      </div>
                      <div
                        v-if="allerrors.address"
                        v-for="error_name in allerrors.address"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div :class="['form-group',(allerrors.description) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <textarea
                          v-model="myForm.description"
                          placeholder="Enter Description"
                          class="form-control"
                          rows="4"
                        ></textarea>
                        <label for="material-text2">Discription</label>
                      </div>
                      <div
                        v-if="allerrors.description"
                        v-for="error_name in allerrors.description"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div :class="['form-group',(allerrors.status) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <select class="form-control status-selector">
                          <option value="0">Pending</option>
                          <option value="1">In Process</option>
                          <option value="2">Resolved</option>
                        </select>
                        <label for="material-text2">Status</label>
                      </div>
                      <div
                        v-if="allerrors.status"
                        v-for="error_name in allerrors.status"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>

                  <div class="col-md-12" align="right">
                    <button class="btn btn-primary process_button">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      myForm: {
        user_id: document.getElementById("userId").value,
        title: "",
        description: "",
        address: "",
        location_id: "",
        category_id: "",
        status: 0
      },
      categories: [],
      locations: [],
      allerrors: {},
      baseurl: document.getElementById("baseUrl").value,
      role_id: document.getElementById("roleId").value,
      user_id: document.getElementById("userId").value,
      rptErr: 1
    };
  },
  created() {
    this.fetchData();
  },
  mounted() {
    var _this = this;
    $(document).ready(function() {
      $(".js-select2").select2();
      $(".category-selector").on("change", function() {
        _this.myForm.category_id = $(this).val();
      });
      $(".location-selector").on("change", function() {
        _this.myForm.location_id = $(this).val();
      });
      $(".status-selector").on("change", function() {
        _this.myForm.status = $(this).val();
      });
    });
  },
  methods: {
    fetchData() {
      var _this = this;
      var id = this.$route.params.id;

      axios
        .get(_this.baseurl + "/api/complaint/" + id + "/edit")
        .then(response => {
          $(document).ready(function() {
            $(".category-selector, .location-selector").select2("destroy");
            $(".category-selector").val(response.data.complaint.category_id);
            $(".location-selector").val(response.data.complaint.location_id);
          });

          _this.myForm.title = response.data.complaint.title;
          _this.myForm.description = response.data.complaint.description;
          _this.myForm.address = response.data.complaint.address;
          _this.myForm.category_id = response.data.complaint.category_id;
          _this.myForm.location_id = response.data.complaint.location_id;
          _this.myForm.status = response.data.complaint.status;
          _this.categories = response.data.categories;
          _this.locations = response.data.location;
          setTimeout(() => {
            $(document).ready(function() {
              $(".category-selector, .location-selector").select2();
            });
            $(".status-selector").on("change", function() {
              _this.myForm.status = $(this).val();
            });
          }, 500);
        })
        .catch(error => {
          if (_this.rptErr < 8) {
            _this.fetchData();

            _this.rptErr++;
          }
        });
    },
    submitForm(e) {
      e.preventDefault();

      var _this = this;
      var id = this.$route.params.id;
      $(".process_button").prop("disabled", true);
      axios
        .patch(_this.baseurl + "/api/complaint/" + id, _this.myForm)
        .then(response => {
          if (response.data * 1 === 1) {
            $.notify(
              {
                title: "<strong>Success!</strong>",
                message: "Successfully Updated."
              },
              {
                type: "success",
                placement: {
                  from: "top",
                  align: "right"
                }
              }
            );
            //_this.$router.push({path : '/complaint'});
            $(".process_button").prop("disabled", false);
          }
        })
        .catch(error => {
          _this.allerrors = error.response.data.errors;
          $(".process_button").prop("disabled", false);
        });
    }
  }
};
</script>