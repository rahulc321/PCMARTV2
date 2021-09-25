<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
  // input forms
  public function inputForm(){

    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Form Elements"],["name" => "Input"]
    ];
    return view('pages.form-inputs',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
  // Input Group forms
  public function inputGroupForm(){

    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Forms"],["name" => "Input Groups"]
    ];
    return view('pages.form-input-groups',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
  // Input number forms
  public function numberInputForm(){

    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Form Elements"],["name" => "Number Input"]
    ];
    return view('pages.form-number-input',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
  //select forms
  public function selectForm(){

    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Form Elements"],["name" => "Select"]
    ];
    return view('pages.form-select',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
   //Radio forms
   public function radioForm(){

    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Form Elements"],["name" => "Radio"]
    ];
    return view('pages.form-radio',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
   //checkbox forms
   public function checkboxForm(){

    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Form Elements"],["name" => "Checkbox"]
    ];
    return view('pages.form-checkbox',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
   //switch forms
   public function switchForm(){

    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Form Elements"],["name" => "Switch"]
    ];
    return view('pages.form-switch',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
   //textarea forms
   public function textareaForm(){

    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Form Elements"],["name" => "Textarea"]
    ];
    return view('pages.form-textarea',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
  //Quill Editor forms
  public function quillEditorForm(){

    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Form Elements"],["name" => "Quill Editor"]
    ];
    return view('pages.form-quill-editor',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
   //File Uploader forms
   public function fileUploaderForm(){

    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Form Elements"],["name" => "File Uploader"]
    ];
    return view('pages.form-file-uploader',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
   //date time Picker forms
   public function datePickerForm(){

    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Form Elements"],["name" => "Date & Time Picker"]
    ];
    return view('pages.form-date-time-picker',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
   //Form Layout
   public function formLayout(){

    $pageConfigs = ['pageHeader' => true];

    $breadcrumbs = [
      ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Forms"],["name" => "Form Layouts"]
    ];

    return view('pages.form-layout',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
    //Form Wizard
    public function formWizard(){

      $pageConfigs = ['pageHeader' => true];
  
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Forms"],["name" => "Form Wizard"]
      ];
      
      return view('pages.form-wizard',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
    //Form validation
    public function formValidation(){

      $pageConfigs = ['pageHeader' => true];
  
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Forms"],["name" => "Form Validation"]
      ];
      
      return view('pages.form-validation',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
    }
    //Form repeater
    public function formRepeater(){

      $pageConfigs = ['pageHeader' => true];
  
      $breadcrumbs = [
        ["link" => "/", "name" => "Home"],["link" => "#", "name" => "Forms"],["name" => "Form Repeater"]
      ];
      
      return view('pages.form-repeater',['pageConfigs'=>$pageConfigs,'breadcrumbs'=>$breadcrumbs]);
  }
}
