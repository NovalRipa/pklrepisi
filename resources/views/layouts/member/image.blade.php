<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="{{asset('frontend/css/image.css')}}" rel="stylesheet" />

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    </style>
</head>
<body>
  <br><br><br>
<center><h3>Kategori</h3></center>
  <div class="wrapper">
    <!-- filter Items -->
    <nav>
      <div class="items">
        <span class="item active" data-name="all"></span>
        <span class="item" data-name="shoe">Baju Muslim Pria</span>
        <span class="item" data-name="watch">Baju Muslim Wanita</span>
        <span class="item" data-name="camera">Baju Muslim Anak-Anak</span>
      </div>
    </nav>
    <!-- filter Images -->
    <div class="gallery">
        <div class="image" data-name="shoe"><span><img src="{{ asset('assets/header/baju_muslim_laki2_cover.jpg') }}" ></span></div>
        <div class="image" data-name="watch"><span><img src="{{ asset('assets/header/baju _muslim _wanita _cover.jpg') }}" ></span></div>
        <div class="image" data-name="camera"><span><img src="{{ asset('assets/header/anak perempuan.jpg') }}" ></span></div>

        <!-- <div class="image" data-name="shoe"><span><img src="{{$data->image()}}"></span></div>
        <div class="image" data-name="watch"><span><img src="{{$data->image()}}"></span></div>
        <div class="image" data-name="camera"><span><img src="{{$data->image()}}" ></span></div>  -->
    </div>
</div>


  <!-- fullscreen img preview box -->
  <div class="preview-box">
    <div class="details">
      <span class="title"> <p></p></span>
      <span class="icon fas fa-times"></span>
    </div>
    <div class="image-box"><img src="" alt=""></div>
  </div>
  <div class="shadow"></div>

  <script>
      //selecting all required elements
const filterItem = document.querySelector(".items");
const filterImg = document.querySelectorAll(".gallery .image");

window.onload = ()=>{ //after window loaded
  filterItem.onclick = (selectedItem)=>{ //if user click on filterItem div
    if(selectedItem.target.classList.contains("item")){ //if user selected item has .item class
      filterItem.querySelector(".active").classList.remove("active"); //remove the active class which is in first item
      selectedItem.target.classList.add("active"); //add that active class on user selected item
      let filterName = selectedItem.target.getAttribute("data-name"); //getting data-name value of user selected item and store in a filtername variable
      filterImg.forEach((image) => {
        let filterImges = image.getAttribute("data-name"); //getting image data-name value
        //if user selected item data-name value is equal to images data-name value
        //or user selected item data-name value is equal to "all"
        if((filterImges == filterName) || (filterName == "all")){
          image.classList.remove("hide"); //first remove the hide class from the image
          image.classList.add("show"); //add show class in image
        }else{
          image.classList.add("hide"); //add hide class in image
          image.classList.remove("show"); //remove show class from the image
        }
      });
    }
  }
  for (let i = 0; i < filterImg.length; i++) {
    filterImg[i].setAttribute("onclick", "preview(this)"); //adding onclick attribute in all available images
  }
}

//fullscreen image preview function
//selecting all required elements
const previewBox = document.querySelector(".preview-box"),
categoryName = previewBox.querySelector(".title p"),
previewImg = previewBox.querySelector("img"),
closeIcon = previewBox.querySelector(".icon"),
shadow = document.querySelector(".shadow");

function preview(element){
  //once user click on any image then remove the scroll bar of the body, so user cant scroll up or down
  document.querySelector("body").style.overflow = "hidden";
  let selectedPrevImg = element.querySelector("img").src; //getting user clicked image source link and stored in a variable
  let selectedImgCategory = element.getAttribute("data-name"); //getting user clicked image data-name value
  previewImg.src = selectedPrevImg; //passing the user clicked image source in preview image source
  categoryName.textContent = selectedImgCategory; //passing user clicked data-name value in category name
  previewBox.classList.add("show"); //show the preview image box
  shadow.classList.add("show"); //show the light grey background
  closeIcon.onclick = ()=>{ //if user click on close icon of preview box
    previewBox.classList.remove("show"); //hide the preview box
    shadow.classList.remove("show"); //hide the light grey background
    document.querySelector("body").style.overflow = "auto"; //show the scroll bar on body
  }
}
  </script>

</body>
</html>
