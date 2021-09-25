
@section('sidebar-content')
<div class="sidebar-content email-app-sidebar d-flex">
  <!-- sidebar close icon -->
  <span class="sidebar-close-icon">
    <i class="bx bx-x"></i>
  </span>
  <!-- sidebar close icon -->
  <div class="email-app-menu">
    <div class="form-group form-group-compose">
      <!-- compose button  -->
      <button type="button" class="btn btn-primary btn-block my-2 compose-btn">
        <i class="bx bx-plus"></i>
        Compose
      </button>
    </div>
    <div class="sidebar-menu-list">
      <!-- sidebar menu  -->
      <div class="list-group list-group-messages">
        <a href="javascript:void(0);" class="list-group-item pt-0 active" id="inbox-menu">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: envelope-put.svg; size: 24px; style: lines; strokeColor:#5A8DEE; eventOn:grandparent; duration:0.85;">
            </i>
          </div>
          Inbox
          <span class="badge badge-light-primary badge-pill badge-round float-right mt-50">5</span>
        </a>
        <a href="javascript:void(0);" class="list-group-item">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: paper-plane.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;">
            </i>
          </div>
          Sent
        </a>
        <a href="javascript:void(0);" class="list-group-item">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: pen.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;">
            </i>
          </div> Draft
        </a>
        <a href="javascript:void(0);" class="list-group-item">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: star.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;">
            </i>
          </div>
          Starred
        </a>
        <a href="javascript:void(0);" class="list-group-item">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: info-alt.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;">
            </i>
          </div>
          Spam
          <span class="badge badge-light-danger badge-pill badge-round float-right mt-50">3</span>
        </a>
        <a href="javascript:void(0);" class="list-group-item">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: trash.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;">
            </i>
          </div>
          Trash
        </a>
      </div>
      <!-- sidebar menu  end-->

      <!-- sidebar label start -->
      <label class="sidebar-label">Labels</label>
      <div class="list-group list-group-labels ">
        <a href="javascript:void(0);" class="list-group-item d-flex justify-content-between align-items-center">
          Product
          <span class="bullet bullet-success bullet-sm"></span>
        </a>
        <a href="javascript:void(0);" class="list-group-item d-flex justify-content-between align-items-center">
          Work
          <span class="bullet bullet-primary bullet-sm"></span>
        </a>
        <a href="javascript:void(0);" class="list-group-item d-flex justify-content-between align-items-center">
          Misc
          <span class="bullet bullet-warning bullet-sm"></span>
        </a>
        <a href="javascript:void(0);" class="list-group-item d-flex justify-content-between align-items-center">
          Family
          <span class="bullet bullet-danger bullet-sm"></span>
        </a>
        <a href="javascript:void(0);" class="list-group-item d-flex justify-content-between align-items-center">
          Design
          <span class="bullet bullet-info bullet-sm"></span>
        </a>
      </div>
      <!-- sidebar label end -->
    </div>
  </div>
</div>
<!-- User new mail right area -->
<div class="compose-new-mail-sidebar">
  <div class="card shadow-none quill-wrapper p-0">
    <div class="card-header">
      <h3 class="card-title" id="emailCompose">New Message</h3>
      <button type="button" class="close close-icon">
        <i class="bx bx-x"></i>
      </button>
    </div>
    <!-- form start -->
    <form action="#" id="compose-form">
      <div class="card-body pt-0">
        <div class="form-group pb-50">
          <label for="emailfrom">from</label>
          <input type="text" id="emailfrom" class="form-control" placeholder="user@example.com" disabled>
        </div>
        <div class="form-label-group">
          <input type="email" id="emailTo" class="form-control" placeholder="To" required>
          <label for="emailTo">To</label>
        </div>
        <div class="form-label-group">
          <input type="text" id="emailSubject" class="form-control" placeholder="Subject">
          <label for="emailSubject">Subject</label>
        </div>
        <div class="form-label-group">
          <input type="text" id="emailCC" class="form-control" placeholder="CC">
          <label for="emailCC">CC</label>
        </div>
        <div class="form-label-group">
          <input type="text" id="emailBCC" class="form-control" placeholder="BCC">
          <label for="emailBCC">BCC</label>
        </div>
        <!-- Compose mail Quill editor -->
        <div class="snow-container border rounded p-50 ">
          <div class="compose-editor mx-75"></div>
          <div class="d-flex justify-content-end">
            <div class="compose-quill-toolbar pb-0">
              <span class="ql-formats mr-0">
                <button class="ql-bold"></button>
                <button class="ql-italic"></button>
                <button class="ql-underline"></button>
                <button class="ql-link"></button>
                <button class="ql-image"></button>
              </span>
            </div>
          </div>
        </div>
        <div class="form-group mt-2">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="emailAttach">
            <label class="custom-file-label" for="emailAttach">Attach file</label>
          </div>
        </div>
      </div>
      <div class="card-footer d-flex justify-content-end pt-0">
        <button type="reset" class="btn btn-light-secondary cancel-btn mr-1">
          <i class='bx bx-x mr-25'></i>
          <span class="d-sm-inline d-none">Cancel</span>
        </button>
        <button type="submit" class="btn-send btn btn-primary">
          <i class='bx bx-send mr-25'></i> <span class="d-sm-inline d-none">Send</span>
        </button>
      </div>
    </form>
    <!-- form start end-->
  </div>
</div>
<!--/ User Chat profile right area -->
@endsection

