@extends('layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','File Manager Application')
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-file-manager.css')}}">
@endsection
{{-- sidebar included --}}
@include('pages.app-file-manager-sidebar')

@section('content')
<!-- File Manager app overlay -->
<div class="app-file-overlay"></div>
<div class="app-file-area">
  <!-- File App Content Area -->
  <!-- App File Header Starts -->
  <div class="app-file-header">
    <!-- Header search bar starts -->
    <div class="app-file-header-search flex-grow-1">
      <div class="sidebar-toggle d-block d-lg-none">
        <i class="bx bx-menu"></i>
      </div>
      <fieldset class="form-group position-relative has-icon-left m-0">
        <input type="text" class="form-control border-0 shadow-none" id="file-search" placeholder="Search file">
        <div class="form-control-position">
          <i class="bx bx-search"></i>
        </div>
      </fieldset>
    </div>
    <!-- Header search bar Ends -->
    <!-- Header Icons Starts -->
    <div class="app-file-header-icons">
      <div class="fonticon-wrap d-inline mx-sm-1 align-middle">
        <i class="livicon-evo cursor-pointer"
          data-options="name: user.svg; size: 24px; style: lines; strokeColor:#596778; duration:0.85;"></i>
      </div>
      <div class="fonticon-wrap d-inline mr-sm-50 align-middle">
        <i class="livicon-evo cursor-pointer"
          data-options="name: trash.svg; size: 24px; style: lines; strokeColor:#596778; duration:0.85;"></i>
      </div>
      <i class="bx bx-dots-vertical-rounded font-medium-3 align-middle cursor-pointer"></i>
    </div>
    <!-- Header Icons Ends -->
  </div>
  <!-- App File Header Ends -->

  <!-- App File Content Starts -->
  <div class="app-file-content p-2">
    <h5>All Files</h5>

    <!-- App File - Recent Accessed Files Section Starts -->
    <label class="app-file-label">Recently Accessed Files</label>
    <div class="row app-file-recent-access">
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="{{asset('images/icon/pdf.png')}}" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-recent-details">
              <div class="app-file-name font-size-small font-weight-bold">Felecia Resume.pdf</div>
              <div class="app-file-size font-size-small text-muted mb-25">12.85kb</div>
              <div class="app-file-last-access font-size-small text-muted">Last accessed : 3 hours ago</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="{{asset('images/icon/psd.png')}}" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-content-details">
              <div class="app-file-name font-size-small font-weight-bold">Logo_design.psd</div>
              <div class="app-file-size font-size-small text-muted mb-25">15.60mb</div>
              <div class="app-file-last-access font-size-small text-muted">Last accessed : 3 hours ago</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="{{asset('images/icon/doc.png')}}" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-content-details">
              <div class="app-file-name font-size-small font-weight-bold">Music_Two.xyz</div>
              <div class="app-file-size font-size-small text-muted mb-25">1.2gb</div>
              <div class="app-file-last-access font-size-small text-muted">Last accessed : 3 hours ago</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <i class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></i>
            <img class="d-block mx-auto" src="{{asset('images/icon/sketch.png')}}" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-content-details">
              <div class="app-file-name font-size-small font-weight-bold">Application.sketch</div>
              <div class="app-file-size font-size-small text-muted mb-25">92.83kb</div>
              <div class="app-file-last-access font-size-small text-muted">Last accessed : 3 hours ago</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- App File - Recent Accessed Files Section Ends -->

    <!-- App File - Folder Section Starts -->
    <label class="app-file-label">Folder</label>
    <div class="row app-file-folder">
      <div class="col-lg-3 col-md-4 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="card-body px-75 py-50">
            <div class="app-file-folder-content d-flex align-items-center">
              <div class="app-file-folder-logo mr-75">
                <i class="bx bx-folder font-medium-4"></i>
              </div>
              <div class="app-file-folder-details">
                <div class="app-file-folder-name font-size-small font-weight-bold">Project</div>
                <div class="app-file-folder-size font-size-small text-muted">2 files, 14.05mb</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="card-body px-75 py-50">
            <div class="app-file-folder-content d-flex align-items-center">
              <div class="app-file-folder-logo mr-75">
                <i class="bx bx-folder font-medium-4"></i>
              </div>
              <div class="app-file-folder-details">
                <div class="app-file-folder-name font-size-small font-weight-bold">Video</div>
                <div class="app-file-folder-size font-size-small text-muted">130 files, 890mb</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="card-body px-75 py-50">
            <div class="app-file-folder-content d-flex align-items-center">
              <div class="app-file-folder-logo mr-75">
                <i class="bx bx-folder font-medium-4"></i>
              </div>
              <div class="app-file-folder-details">
                <div class="app-file-folder-name font-size-small font-weight-bold">Music</div>
                <div class="app-file-folder-size font-size-small text-muted">15 files, 58mb</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="card-body px-75 py-50">
            <div class="app-file-folder-content d-flex align-items-center">
              <div class="app-file-folder-logo mr-75">
                <i class="bx bx-folder font-medium-4"></i>
              </div>
              <div class="app-file-folder-details">
                <div class="app-file-folder-name font-size-small font-weight-bold">Documents</div>
                <div class="app-file-folder-size font-size-small text-muted">12 files, 9.5mb</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="card-body px-75 py-50">
            <div class="app-file-folder-content d-flex align-items-center">
              <div class="app-file-folder-logo mr-75">
                <i class="bx bx-folder font-medium-4"></i>
              </div>
              <div class="app-file-folder-details">
                <div class="app-file-folder-name font-size-small font-weight-bold">Application Design</div>
                <div class="app-file-folder-size font-size-small text-muted">1 files, 36.25kb</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="card-body px-75 py-50">
            <div class="app-file-folder-content d-flex align-items-center">
              <div class="app-file-folder-logo mr-75">
                <i class="bx bx-folder font-medium-4"></i>
              </div>
              <div class="app-file-folder-details">
                <div class="app-file-folder-name font-size-small font-weight-bold">Photos</div>
                <div class="app-file-folder-size font-size-small text-muted">3.6k files, 348mb</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- App File - Folder Section Ends -->

    <!-- App File - Files Section Starts -->
    <label class="app-file-label">Files</label>
    <div class="row app-file-files">
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="{{asset('images/icon/pdf.png')}}" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Banner.jpg</div>
              <div class="app-file-size font-size-small text-muted mb-25">13kb</div>
              <div class="app-file-type font-size-small text-muted">Image File</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="{{asset('images/icon/psd.png')}}" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Management.docx</div>
              <div class="app-file-size font-size-small text-muted mb-25">15.60mb</div>
              <div class="app-file-type font-size-small text-muted">Word Document</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="{{asset('images/icon/doc.png')}}" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Thunder.mp3</div>
              <div class="app-file-size font-size-small text-muted mb-25">3.4mb</div>
              <div class="app-file-type font-size-small text-muted">Mp3 File</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <i class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></i>
            <img class="d-block mx-auto" src="{{asset('images/icon/sketch.png')}}" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Dashboard.sketch</div>
              <div class="app-file-size font-size-small text-muted mb-25">108kb</div>
              <div class="app-file-type font-size-small text-muted">Sketch File</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="{{asset('images/icon/psd.png')}}" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Logo.psd</div>
              <div class="app-file-size font-size-small text-muted mb-25">10.6kb</div>
              <div class="app-file-type font-size-small text-muted">Photoshop File</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <i class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></i>
            <img class="d-block mx-auto" src="{{asset('images/icon/sketch.png')}}" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Logo_Design.sketch</div>
              <div class="app-file-size font-size-small text-muted mb-25">256.5kb</div>
              <div class="app-file-type font-size-small text-muted">Sketch File</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="{{asset('images/icon/doc.png')}}" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Bootstrap.xyz</div>
              <div class="app-file-size font-size-small text-muted mb-25">0.0kb</div>
              <div class="app-file-type font-size-small text-muted">Unknown File</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-6">
        <div class="card border shadow-none mb-1 app-file-info">
          <div class="app-file-content-logo card-img-top">
            <img class="bx bx-dots-vertical-rounded app-file-edit-icon d-block float-right"></img>
            <img class="d-block mx-auto" src="{{asset('images/icon/pdf.png')}}" height="38" width="30"
              alt="Card image cap">
          </div>
          <div class="card-body p-50">
            <div class="app-file-details">
              <div class="app-file-name font-size-small font-weight-bold">Read_Me.pdf</div>
              <div class="app-file-size font-size-small text-muted mb-25">10.5kb</div>
              <div class="app-file-type font-size-small text-muted">PDF File</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- App File - Files Section Ends -->
  </div>
</div>
@endsection
{{-- page styles --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-file-manager.js')}}"></script>
@endsection
