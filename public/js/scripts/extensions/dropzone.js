/*=========================================================================================
    File Name: dropzone.js
    Description: dropzone
    --------------------------------------------------------------------------------------
    Item Name: Frest HTML Admin Template
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

Dropzone.options.dpzSingleFile = {
  paramName: "file", // The name that will be used to transfer the file
  maxFiles: 1,
  init: function () {
    this.on("maxfilesexceeded", function (file) {
      this.removeAllFiles();
      this.addFile(file);
    });
  }
};

/********************************************
*               Multiple Files              *
********************************************/
Dropzone.options.dpzMultipleFiles = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 0.5, // MB
  clickable: true
}


/********************************************************
*               Use Button To Select Files              *
********************************************************/


/****************************************************************
*               Limit File Size and No. Of Files                *
****************************************************************/
Dropzone.options.dpzFileLimits = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 0.5, // MB
  maxFiles: 5,
  maxThumbnailFilesize: 1, // MB
}


/********************************************
*               Accepted Files              *
********************************************/
Dropzone.options.dpAcceptFiles = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 1, // MB
  acceptedFiles: 'image/*'
}

console.log(Dropzone.options.myAwesomeDropzone);
/************************************************
*               Remove Thumbnail                *
************************************************/
Dropzone.options.myAwesomeDropzone = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 1, // MB
  addRemoveLinks: true,
  dictRemoveFile: " Eliminar"
}

/*****************************************************
*               Remove All Thumbnails                *
*****************************************************/
Dropzone.options.dpzRemoveAllThumb = {
  paramName: "file", // The name that will be used to transfer the file
  maxFilesize: 1, // MB
  init: function () {

    // Using a closure.
    var _this = this;

    // Setup the observer for the button.
    $("#clear-dropzone").on("click", function () {
      // Using "_this" here, because "this" doesn't point to the dropzone anymore
      _this.removeAllFiles();
      // If you want to cancel uploads as well, you
      // could also call _this.removeAllFiles(true);
    });
  }
}
