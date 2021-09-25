@section('sidebar-content')
<div class="app-file-sidebar sidebar-content d-flex">
  <!-- App File sidebar - Left section Starts -->
  <div class="app-file-sidebar-left">
    <!-- sidebar close icon starts -->
    <span class="app-file-sidebar-close"><i class="bx bx-x"></i></span>
    <!-- sidebar close icon ends -->
    <div class="form-group add-new-file text-center">
      <!-- Add File Button -->
      <label for="getFile" class="btn btn-primary btn-block glow my-2 add-file-btn text-capitalize"><i
          class="bx bx-plus"></i>Add File</label>
      <input type="file" class="d-none" id="getFile">
    </div>
    <div class="app-file-sidebar-content">
      <!-- App File Left Sidebar - Drive Content Starts -->
      <label class="app-file-label">My Drive</label>
      <div class="list-group list-group-messages my-50">
        <a href="javascript:void(0);" class="list-group-item list-group-item-action pt-0 active">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: morph-folder.svg; size: 24px; style: lines; strokeColor:#5A8DEE; eventOn:grandparent; duration:0.85;"></i>
          </div>
          All Files
          <span class="badge badge-light-danger badge-pill badge-round float-right mt-50">2</span>
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: morph-desktop-smartphone.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div>
          My Devices
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: clock.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div> Recents
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: morph-star.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div>
          Important
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: trash.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div>
          Deleted Files
        </a>
      </div>
      <!-- App File Left Sidebar - Drive Content Ends -->

      <!-- App File Left Sidebar - Labels Content Starts -->
      <label class="app-file-label">Labels</label>
      <div class="list-group list-group-labels my-50">
        <a href="javascript:void(0);" class="list-group-item list-group-item-action pt-0">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: morph-doc.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div>
          Documents
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: image.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div>
          Images
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: camcoder.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div> Videos
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: music.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div>
          Audio
        </a>
        <a href="javascript:void(0);" class="list-group-item list-group-item-action">
          <div class="fonticon-wrap d-inline mr-25">
            <i class="livicon-evo"
              data-options="name: servers.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;"></i>
          </div>
          Zip Files
        </a>
      </div>
      <!-- App File Left Sidebar - Labels Content Ends -->

      <!-- App File Left Sidebar - Storage Content Starts -->
      <label class="app-file-label mb-75">Storage Status</label>
      <div class="d-flex mb-1">
        <div class="fonticon-wrap mr-1">
          <i class="livicon-evo cursor-pointer"
            data-options="name: save.svg; size: 30px; style: lines; strokeColor:#475f7b; eventOn:grandparent; duration:0.85;">
          </i>
        </div>
        <div class="file-manager-progress">
          <span class="text-muted font-size-small">19.5GB used of 25GB</span>
          <div class="progress progress-bar-primary progress-sm mb-0">
            <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="80" aria-valuemax="100"
              style="width:80%;"></div>
          </div>
        </div>
      </div>
      <a href="javascript:void(0);" class="font-weight-bold">Upgrade Storage</a>
      <!-- App File Left Sidebar - Storage Content Ends -->
    </div>
  </div>
</div>
<!-- App File sidebar - Right section Starts -->
<div class="app-file-sidebar-info">
  <div class="card shadow-none mb-0 p-0 pb-1">
    <div class="card-header d-flex justify-content-between align-items-center border-bottom">
      <h6 class="mb-0">Document.pdf</h6>
      <div class="app-file-action-icons d-flex align-items-center">
        <i class="bx bx-trash cursor-pointer mr-50"></i>
        <i class="bx bx-x close-icon cursor-pointer"></i>
      </div>
    </div>
    <ul class="nav nav-tabs justify-content-center" role="tablist">
      <li class="nav-item mr-1 pt-50 pr-1 border-right">
        <a class=" nav-link active d-flex align-items-center" id="details-tab" data-toggle="tab" href="#details"
          aria-controls="details" role="tab" aria-selected="true">
          <i class="bx bx-file mr-50"></i>Details</a>
      </li>
      <li class="nav-item pt-50 ">
        <a class=" nav-link d-flex align-items-center" id="activity-tab" data-toggle="tab" href="#activity"
          aria-controls="activity" role="tab" aria-selected="false">
          <i class="bx bx-pulse mr-50"></i>Activity</a>
      </li>
    </ul>
    <div class="tab-content pl-0">
      <div class="tab-pane active" id="details" aria-labelledby="details-tab" role="tabpanel">
        <div class="border-bottom d-flex align-items-center flex-column pb-1">
          <img src="{{asset('images/icon/pdf.png')}}" alt="PDF" height="42" width="35" class="my-1">
          <p class="mt-2">15.3mb</p>
        </div>
        <div class="card-body pt-2">
          <label class="app-file-label">Setting</label>
          <div class="d-flex justify-content-between align-items-center mt-75">
            <p>File Sharing</p>
            <div class="custom-control custom-switch custom-switch-primary custom-switch-glow custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="customSwitchGlow1">
              <label class="custom-control-label" for="customSwitchGlow1"></label>
            </div>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Synchronization</p>
            <div class="custom-control custom-switch custom-switch-primary custom-switch-glow custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="customSwitchGlow2" checked>
              <label class="custom-control-label" for="customSwitchGlow2"></label>
            </div>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Backup</p>
            <div class="custom-control custom-switch custom-switch-primary custom-switch-glow custom-control-inline">
              <input type="checkbox" class="custom-control-input" id="customSwitchGlow3">
              <label class="custom-control-label" for="customSwitchGlow3"></label>
            </div>
          </div>

          <label class="app-file-label">Info</label>
          <div class="d-flex justify-content-between align-items-center mt-75">
            <p>Type</p>
            <p class="font-weight-bold">PDF</p>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Size</p>
            <p class="font-weight-bold">15.6mb</p>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Location</p>
            <p class="font-weight-bold">Files > Documents</p>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Owner</p>
            <p class="font-weight-bold">Elnora Reese</p>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Modified</p>
            <p class="font-weight-bold">September 4 2019</p>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Opened</p>
            <p class="font-weight-bold">July 8, 2019</p>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <p>Created</p>
            <p class="font-weight-bold">July 1, 2019</p>
          </div>
        </div>
      </div>
      <div class="tab-pane pl-0" id="activity" aria-labelledby="activity-tab" role="tabpanel">
        <div class="card-body">
          <ul class="timeline mb-0">
            <li class="timeline-item timeline-icon-success active">
              <div class="timeline-time">Today</div>
              <h6 class="timeline-title">You added an item to</h6>
              <p class="timeline-text">You added an item</p>
              <div class="timeline-content">
                <img src="{{asset('images/icon/psd.png')}}" alt="PSD" height="30" width="25"
                  class="mr-50">Mockup.psd
              </div>
            </li>
            <li class="timeline-item timeline-icon-info active">
              <div class="timeline-time">10 min ago</div>
              <h6 class="timeline-title">You shared 2 times</h6>
              <p class="timeline-text">Emily Bennett edited an item</p>
              <div class="timeline-content">
                <img src="{{asset('images/icon/sketch.png')}}" alt="Sketch" height="30" width="25"
                  class="mr-50">Template_Design.sketch
              </div>
            </li>
            <li class="timeline-item timeline-icon-danger active">
              <div class="timeline-time">Mon 10:20 PM</div>
              <h6 class="timeline-title">You edited an item</h6>
              <p class="timeline-text">You edited an item</p>
              <div class="timeline-content">
                <img src="{{asset('images/icon/pdf.png')}}" alt="document" height="30" width="25"
                  class="mr-50">Information.doc
              </div>
            </li>
            <li class="timeline-item timeline-icon-primary active">
              <div class="timeline-time">Jul 13 2019</div>
              <h6 class="timeline-title">You edited an item</h6>
              <p class="timeline-text">John Keller edited an item</p>
              <div class="timeline-content">
                <img src="{{asset('images/icon/pdf.png')}}" alt="document" height="30" width="25"
                  class="mr-50">Documentation.doc
              </div>
            </li>
            <li class="timeline-item timeline-icon-warning">
              <div class="timeline-time">Apr 18 2019</div>
              <h6 class="timeline-title">You added an item to</h6>
              <p class="timeline-text">You edited an item</p>
              <div class="timeline-content">
                <img src="{{asset('images/icon/pdf.png')}}" alt="document" height="30" width="25"
                  class="mr-50">Resume.pdf
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- App File sidebar - Right section Ends -->
@endsection
