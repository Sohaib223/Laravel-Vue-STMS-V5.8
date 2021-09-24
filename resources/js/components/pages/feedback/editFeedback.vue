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
            >Feedbacks</h1>
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
              <h3 class="block-title">Edit Feedback</h3>
              <div class="block-options">
                <router-link to="/feedback" class="btn btn-info">Manage Feedback</router-link>
                <router-link to="/feedback/create" class="btn btn-info">Add Feedback</router-link>
              </div>
            </div>
            <div class="block-content block-content-full clearfix">
              <form @submit="submitForm($event)">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div class="form-material">
                        <textarea
                          class="form-control"
                          v-model="myForm.description"
                          placeholder="Enter Feedback"
                          name="description"
                        ></textarea>
                        <label for="material-text2">Feedback Description</label>
                      </div>
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
        description: "",
        user_id: document.getElementById("userId").value
      },
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
  methods: {
    fetchData() {
      var _this = this;
      var id = this.$route.params.id;

      axios
        .get(_this.baseurl + "/api/feedback/" + id + "/edit")
        .then(response => {
          _this.myForm.description = response.data.description;
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
        .patch(_this.baseurl + "/api/feedback/" + id, _this.myForm)
        .then(response => {
          console.log(response);
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
            _this.$router.push({ path: "/feedback" });
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