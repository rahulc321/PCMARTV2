@section('sidebar-content')
<div class="todo-sidebar d-flex">
  <span class="sidebar-close-icon">
    <i class="bx bx-x"></i>
  </span>
  <!-- todo app menu -->
  <div class="todo-app-menu">
    <div class="form-group text-center add-task">
      <!-- new task button -->
      <button type="button" class="btn btn-primary add-task-btn btn-block my-1">
        <i class="bx bx-plus"></i>
        <span>New Task</span>
      </button>
    </div>
    <!-- sidebar list start -->
    <div class="sidebar-menu-list">
      <div class="list-group">
        <a href="javascript:void(0);" class="list-group-item border-0 active">
          <span class="fonticon-wrap mr-50">
            <i class="livicon-evo"
              data-options="name: list.svg; size: 24px; style: lines; strokeColor:#5A8DEE; eventOn:grandparent;"></i>
          </span>
          <span> All</span>
        </a>
      </div>
      <label class="filter-label mt-2 mb-1 pt-25">Filters</label>
      <div class="list-group">
        <a href="javascript:void(0);" class="list-group-item border-0">
          <span class="fonticon-wrap mr-50">
            <i class="livicon-evo"
              data-options="name: star.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent;"></i>
          </span>
          <span>Favourites</span>
        </a>
        <a href="javascript:void(0);" class="list-group-item border-0">
          <span class="fonticon-wrap mr-50">
            <i class="livicon-evo"
              data-options="name: check.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent;"></i>
          </span>
          <span>Done</span>
        </a>
        <a href="javascript:void(0);" class="list-group-item border-0">
          <span class="fonticon-wrap mr-50">
            <i class="livicon-evo"
              data-options="name: trash.svg; size: 24px; style: lines; strokeColor:#475f7b; eventOn:grandparent;"></i>
          </span>
          <span>Deleted</span>
        </a>
      </div>
      <label class="filter-label mt-2 mb-1 pt-25">Labels</label>
      <div class="list-group">
        <a href="javascript:void(0);" class="list-group-item border-0 d-flex align-items-center justify-content-between">
          <span>Frontend</span>
          <span class="bullet bullet-sm bullet-primary"></span>
        </a>
        <a href="javascript:void(0);" class="list-group-item border-0 d-flex align-items-center justify-content-between">
          <span>Backend</span>
          <span class="bullet bullet-sm bullet-success"></span>
        </a>
        <a href="javascript:void(0);" class="list-group-item border-0 d-flex align-items-center justify-content-between">
          <span>Issue</span>
          <span class="bullet bullet-sm bullet-danger"></span>
        </a>
        <a href="javascript:void(0);" class="list-group-item border-0 d-flex align-items-center justify-content-between">
          <span>Design</span>
          <span class="bullet bullet-sm bullet-warning"></span>
        </a>
        <a href="javascript:void(0);" class="list-group-item border-0 d-flex align-items-center justify-content-between">
          <span>Wireframe</span>
          <span class="bullet bullet-sm bullet-info"></span>
        </a>
      </div>
    </div>
    <!-- sidebar list end -->
  </div>
</div>
<!-- todo new task sidebar -->
<div class="todo-new-task-sidebar">
  <div class="card shadow-none p-0 m-0">
    <div class="card-header border-bottom py-75">
      <div class="task-header d-flex justify-content-between align-items-center w-100">
        <h5 class="new-task-title mb-0">New Task</h5>
        <button class="mark-complete-btn btn btn-light-primary btn-sm">
          <i class="bx bx-check align-middle"></i>
          <span class="mark-complete align-middle">Mark Complete</span>
        </button>
        <span class="dropdown mr-50">
          <i class='bx bx-paperclip cursor-pointer mr-50'></i>
          <a href="javascript:void(0);" class="dropdown-toggle" id="todo-sidebar-dropdown" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="true">
            <i class='bx bx-dots-vertical-rounded'></i>
          </a>
          <span class="dropdown-menu dropdown-menu-right" aria-labelledby="todo-sidebar-dropdown">
            <a href="javascript:void(0);" class="dropdown-item">Add to another project </a>
            <a href="javascript:void(0);" class="dropdown-item">Create follow up task</a>
            <a href="javascript:void(0);" class="dropdown-item">Print</a>
          </span>
        </span>
      </div>
      <button type="button" class="close close-icon">
        <i class="bx bx-x"></i>
      </button>
    </div>
    <!-- form start -->
    <form id="compose-form" class="mt-1">
      <div class="card-body py-0 border-bottom">
        <div class="form-group">
          <!-- text area for task title -->
          <textarea name="title" class="form-control task-title" cols="1" rows="2" placeholder="Write a Task Name"
            required>
          </textarea>
        </div>
        <div class="assigned d-flex justify-content-between">
          <div class="form-group d-flex align-items-center mr-1">
            <!-- users avatar -->
            <div class="avatar">
              <img src="#" class="avatar-user-image d-none" alt="#" width="38" height="38">
              <div class="avatar-content">
                <i class='bx bx-user font-medium-4'></i>
              </div>
            </div>
            <!-- select2  for user name  -->
            <div class="select-box mr-1">
              <select class="select2-users-name form-control" id="select2-users-name">
                <optgroup label="Backend">
                  <option value="David Smith">David Smith</option>
                  <option value="John Doe">John Doe</option>
                  <option value="James Smith">James Smith</option>
                  <option value="Maria Garcia">Maria Garcia</option>
                </optgroup>
                <optgroup label="Frontend">
                  <option value="Maria Rodrigu">Maria Rodrigu</option>
                  <option value="Marry Smith">Marry Smith</option>
                  <option value="Maria Hern">Maria Hern</option>
                  <option value="Jamesh J">Jamesh Jackson</option>
                </optgroup>
              </select>
            </div>
          </div>
          <div class="form-group d-flex align-items-center position-relative">
            <!-- date picker -->
            <div class="date-icon mr-50">
              <button type="button" class="btn btn-icon btn-outline-secondary round">
                <i class='bx bx-calendar-alt'></i>
              </button>
            </div>
            <div class="date-picker">
              <input type="text" class="pickadate form-control px-0" placeholder="Due Date">
            </div>
          </div>
        </div>
      </div>
      <div class="card-body border-bottom task-description">
        <!--  Quill editor for task description -->
        <div class="snow-container border rounded p-50">
          <div class="compose-editor mx-75"></div>
          <div class="d-flex justify-content-end">
            <div class="compose-quill-toolbar pb-0">
              <span class="ql-formats mr-0">
                <button class="ql-bold"></button>
                <button class="ql-link"></button>
                <button class="ql-image"></button>
              </span>
            </div>
          </div>
        </div>
        <div class="tag d-flex justify-content-between align-items-center pt-1">
          <div class="flex-grow-1 d-flex align-items-center">
            <i class="bx bx-tag align-middle mr-25"></i>
            <select class="select2-assign-label form-control" id="select2-assign-label" disabled>
              <optgroup label="Tags">
                <option value="Frontend">Frontend</option>
                <option value="Backend">Backend</option>
                <option value="Issue">Issue</option>
                <option value="Design">Design</option>
                <option value="Wireframe">Wireframe</option>
              </optgroup>
            </select>
          </div>
          <div class="ml-25">
            <i class="bx bx-plus-circle cursor-pointer add-tags"></i>
          </div>
        </div>
      </div>
      <div class="card-body pb-1">
        <div class="d-flex align-items-center mb-1">
          <div class="avatar mr-75">
            <img src="{{asset('images/portrait/small/avatar-s-3.jpg')}}" alt="charlie" width="38" height="38">
          </div>
          <div class="avatar-content">
            Charlie created this task
          </div>
          <small class="ml-75 text-muted">13 days ago</small>
        </div>
        <!-- quill editor for comment -->
        <div class="snow-container border rounded p-50 ">
          <div class="comment-editor mx-75"></div>
          <div class="d-flex justify-content-end">
            <div class="comment-quill-toolbar pb-0">
              <span class="ql-formats mr-0">
                <button class="ql-bold"></button>
                <button class="ql-link"></button>
                <button class="ql-image"></button>
              </span>
            </div>
            <button type="button" class="btn btn-sm btn-primary comment-btn">
              <span>Comment</span>
            </button>
          </div>
        </div>
        <div class="mt-1 d-flex justify-content-end">
          <button type="button" class="btn btn-primary add-todo">Add Task</button>
          <button type="button" class="btn btn-primary update-todo">Save Changes</button>
        </div>
      </div>
    </form>
    <!-- form start end-->
  </div>
</div>
@endsection
