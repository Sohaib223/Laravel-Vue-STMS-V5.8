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
            >Complaints Category</h1>
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
              <h3 class="block-title">Create Category</h3>
              <div class="block-options">
                <router-link to="/complaintCategory" class="btn btn-info">Manage Categories</router-link>
              </div>
            </div>
            <div class="block-content block-content-full clearfix">
              <form @submit="submitForm($event)">
                <div class="row">
                  <div class="col-md-12">
                    <div :class="['form-group',(allerrors.category_name) ? 'is-invalid' : '']">
                      <div class="form-material">
                        <input type="text" class="form-control" v-model="myForm.category_name">
                        <label for="material-text2">Category Name</label>
                      </div>
                      <div
                        v-if="allerrors.category_name"
                        v-for="error_name in allerrors.category_name"
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
        category_name: "",
        status: ""
      },
      allerrors: {},
      baseurl: document.getElementById("baseUrl").value,
      role_id: document.getElementById("roleId").value,
      user_id: document.getElementById("userId").value,
      rptErr: 1
    };
  },
  methods: {
    submitForm(e) {
      e.preventDefault();

      var _this = this;

      $(".process_button").prop("disabled", true);

      axios
        .post(_this.baseurl + "/api/complaintCategory", _this.myForm)
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
            _this.$router.push({ path: "/complaintCategory" });
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