//sengle file upload
function previewFetcherd() {
        var file = document.getElementById("fetcherd").files;
        if (file.length > 0) {
            var fileReader = new FileReader();
 
            fileReader.onload = function (event) {
                document.getElementById("fetcherd-img").setAttribute("src", event.target.result);
            };
 
            fileReader.readAsDataURL(file[0]);
        }
    }


//Product Img-1 file upload
function previewProdOne() {
        var file = document.getElementById("Prdouct_img1").files;
        if (file.length > 0) {
            var fileReader = new FileReader();
 
            fileReader.onload = function (event) {
                document.getElementById("Prdouct_img1_view").setAttribute("src", event.target.result);
            };
 
            fileReader.readAsDataURL(file[0]);
        }
    }


//Product Img-2 file upload
function previewProdTow() {
        var file = document.getElementById("Prdouct_img2").files;
        if (file.length > 0) {
            var fileReader = new FileReader();
 
            fileReader.onload = function (event) {
                document.getElementById("Prdouct_img2_view").setAttribute("src", event.target.result);
            };
 
            fileReader.readAsDataURL(file[0]);
        }
    }


//Product Img-3 file upload
function previewProdThree() {
        var file = document.getElementById("Prdouct_img3").files;
        if (file.length > 0) {
            var fileReader = new FileReader();
 
            fileReader.onload = function (event) {
                document.getElementById("Prdouct_img3_view").setAttribute("src", event.target.result);
            };
 
            fileReader.readAsDataURL(file[0]);
        }
    }


//Product Img-4 file upload
function previewProdfore() {
        var file = document.getElementById("Prdouct_img4").files;
        if (file.length > 0) {
            var fileReader = new FileReader();
 
            fileReader.onload = function (event) {
                document.getElementById("Prdouct_img4_view").setAttribute("src", event.target.result);
            };
 
            fileReader.readAsDataURL(file[0]);
        }
    }





//banner file upload
function bannerPre() {
        var file = document.getElementById("banner").files;
        if (file.length > 0) {
            var fileReader = new FileReader();
 
            fileReader.onload = function (event) {
                document.getElementById("banner-img").setAttribute("src", event.target.result);
            };
 
            fileReader.readAsDataURL(file[0]);
        }
    }


//data table
$(document).ready(function() {
    $('#example').DataTable();
} );


//sengle file upload
function iconFetcherd() {
        var file = document.getElementById("icon").files;
        if (file.length > 0) {
            var fileReader = new FileReader();
 
            fileReader.onload = function (event) {
                document.getElementById("icon-img").setAttribute("src", event.target.result);
            };
 
            fileReader.readAsDataURL(file[0]);
        }
    }

$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">x</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
      console.log(files);
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});