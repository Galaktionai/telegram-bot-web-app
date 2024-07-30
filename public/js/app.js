$(function () {
  $('.category__select').select2();

  function myFunction() {
    const publicImgProduct = document.querySelector('#publicImgProduct');
    const imgs = publicImgProduct.files.length;
    imgs.forEach(element => {
      console.log(element);
    });
  }

  myFunction()
  
})