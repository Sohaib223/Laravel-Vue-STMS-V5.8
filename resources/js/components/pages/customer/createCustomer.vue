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
            >Users</h1>
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
              <h3 class="block-title">Add New User</h3>
              <div class="block-options">
                <router-link to="/customer" class="btn btn-info">Manage Users</router-link>
              </div>
            </div>
            <div class="block-content block-content-full clearfix">
              <form @submit="submitForm($event)">
                <div class="row">
                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.first_name) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <input
                          type="text"
                          class="form-control"
                          v-model="myForm.first_name"
                          placeholder="Enter First Name"
                        >
                        <label for="material-text2">First Name</label>
                      </div>
                      <div
                        v-if="allerrors.first_name"
                        v-for="error_name in allerrors.first_name"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.last_name) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <input
                          type="text"
                          class="form-control"
                          v-model="myForm.last_name"
                          placeholder="Enter Last Name"
                        >
                        <label for="material-text2">Last Name</label>
                      </div>
                      <div
                        v-if="allerrors.last_name"
                        v-for="error_name in allerrors.last_name"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.email) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <input
                          type="email"
                          name="fake-email"
                          style="position:absolute;left:-9999px"
                        >
                        <input
                          type="password"
                          name="fake-password"
                          style="position:absolute;left:-9999px"
                        >
                        <input
                          type="email"
                          class="form-control"
                          v-model="myForm.email"
                          placeholder="Enter Email Address"
                        >
                        <label for="material-text2">Email Address</label>
                      </div>
                      <div
                        v-if="allerrors.email"
                        v-for="error_name in allerrors.email"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.password) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <input
                          type="password"
                          class="form-control"
                          v-model="myForm.password"
                          placeholder="Enter Password"
                        >
                        <label for="material-text2">Password</label>
                      </div>
                      <div
                        v-if="allerrors.password"
                        v-for="error_name in allerrors.password"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div :class="['form-group',(allerrors.contact_no) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <input
                          type="number"
                          class="form-control"
                          v-model="myForm.contact_no"
                          placeholder="Enter Contact No"
                        >
                        <label for="material-text2">Contact No</label>
                      </div>
                      <div
                        v-if="allerrors.contact_no"
                        v-for="error_name in allerrors.contact_no"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.address) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <textarea
                          class="form-control"
                          v-model="myForm.address"
                          placeholder="Enter Personal Address"
                          rows="10"
                        ></textarea>
                        <label for="material-text2">
                          Personal Address
                          <small>(optional)</small>
                        </label>
                      </div>
                      <div
                        v-if="allerrors.address"
                        v-for="error_name in allerrors.address"
                        class="invalid-feedback"
                      >{{error_name}}</div>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div :class="['form-group',(allerrors.id_prove) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <label for="material-text2">
                          Id Proof
                          <small>(eg : Scan Photo Of National Id etc )</small>
                        </label>
                      </div>
                      <input
                        type="file"
                        class="dropify"
                        @change="onImageChange($event)"
                        data-max-file-size="5M"
                        data-allowed-file-extensions="jpeg jpg png"
                      >
                      <div
                        v-if="allerrors.id_prove"
                        v-for="error_name in allerrors.id_prove"
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
        first_name: "",
        last_name: "",
        email: "",
        password: "",

        contact_no: "",
        address: "",
        status: 0,
        id_prove: ""
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
    var _this = this;
    _this.fetchData();
  },
  mounted() {
    var _this = this;

    $(".dropify").dropify();
  },
  methods: {
    onImageChange(e) {
      let files = e.target.files || e.dataTransfer.files;
      if (!files.length) return;
      this.createImage(files[0]);
    },
    createImage(file) {
      let reader = new FileReader();
      var _this = this;
      reader.onload = e => {
        _this.myForm.id_prove = e.target.result;
      };
      reader.readAsDataURL(file);
    },
    submitForm(e) {
      e.preventDefault();

      var _this = this;

      $(".process_button").prop("disabled", true);

      axios
        .post(_this.baseurl + "/api/customer", _this.myForm)
        .then(response => {
          console.log(response);
          if (response.data * 1 === 1) {
            $.notify(
              {
                title: "<strong>Success!</strong>",
                message: "Successfully Added."
              },
              {
                type: "success",
                placement: {
                  from: "top",
                  align: "right"
                }
              }
            );
            _this.$router.push({ name: "managecustomer" });
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