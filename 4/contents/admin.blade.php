<form id="config-form" action="" method="POST">
  <script>
    // Show save button upon form input changes.
    document.addEventListener("DOMContentLoaded", function () {showSaveButton()});
    function showSaveButton() {
      const __identifier___configForm = document.getElementById("config-form");
      const __identifier___saveOverlay = document.getElementById("save-overlay");

      __identifier___configForm.addEventListener("change", function () {
        __identifier___saveOverlay.style.display = "inline";
        setTimeout(() => {
          __identifier___saveOverlay.style.bottom = "10px";
        }, 100)
      });
    }
  </script>

  <!-- Save button overlay. (appears when form content is changed) -->
  <div id="save-overlay">{{ csrf_field() }}<button type="submit" name="_method" value="PATCH" style="transition: background-color .3s;" class="btn btn-primary btn-sm">Apply Changes</button></div>
  <style>#save-overlay {display: none;position: fixed;transition: bottom 1s;bottom: -200px;z-index: 500;}</style>

  <div class="row">

    <div class="col-xs-12 col-md-4 col-lg-3">
      <div class="box box-primary">
        <div class="box-header with-border">

          <h3 class="box-title">
            text input
          </h3>

        </div>
        <div class="box-body">

            <!-- input title -->
            <div class="col-xs-12">
              <label class="control-label text-truncate">
                input title
              </label>

              <input 
                type="text"
                name="config:1"
                id="config:1"
                value="{{ $config_1 }}"
                placeholder=":eyes:"
                class="form-control"
              />

              <p class="text-muted small">
                input description
              </p>
            </div>

        </div>
      </div>
    </div>

    <div class="col-xs-12 col-md-4 col-lg-3">
      <div class="box box-warning">
        <div class="box-header with-border">

          <h3 class="box-title">
            dropdown menu
          </h3>
          
        </div>
        <div class="box-body">

            <!-- dropdown title -->
            <div class="col-xs-12">
              <label class="control-label text-truncate">
                dropdown title
              </label>

              <select 
                class="form-control"
                name="config:2"
              >

                <option
                  value="0"
                  @if($config_2 == "0")
                    selected
                  @endif
                >
                  option one
                </option>

                <option
                  value="1"
                  @if($config_2 == "1")
                    selected
                  @endif
                >
                  option two
                </option>

                <option
                  value="2"
                  @if($config_2 == "2")
                    selected
                  @endif
                >
                  option three
                </option>

              </select>

              <p class="text-muted small">
                dropdown description
              </p>
            </div>

        </div>
      </div>
    </div>

    <div class="col-xs-12 col-md-4 col-lg-3">
      <div class="box box-danger">
        <div class="box-header with-border">

          <h3 class="box-title">
            color picker
          </h3>
          
        </div>
        <div class="box-body">

            <!-- picker title -->
            <div class="col-xs-12">
              <label class="control-label text-truncate">
                picker title
              </label>

              <input
                type="color"
                name="config:3"
                id="config:3"
                value="{{ $config_3 }}"
                placeholder="#000000"
                class="form-control"
              />

              <p class="text-muted small">
                dropdown description
              </p>
            </div>

        </div>
      </div>
    </div>

  </div>
</form>