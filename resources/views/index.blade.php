@extends('layouts.app')
@section('class', 'homepage')

@section('content')
<div class="hero">
    <div class="container text-center">
        <img src="/storage/images/admin-mockup1.png" alt="RP Admin">
        <h1>Finally, an easier way to manage your campaign.</h1>
        <a href="/register" class="btn btn-primary btn-lg mt-4" role="button">Try now for free!</a>
    </div>
</div>

<div class="features">
    <div class="container">
    <div class="row" id="row1">
        <div class="col-6 d-flex justify-content-center align-items-center">
            <img src="https://placeimg.com/400/300" alt="">
        </div>
        <div class="col-6 d-flex justify-content-center align-items-center">
            <p class="h3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum est provident tempora, pariatur quos.</p>
        </div>
    </div>
    <div class="row" id="row2">
        <div class="col-6 d-flex justify-content-center align-items-center">
            <p class="h3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum est provident tempora, pariatur quos.</p>
        </div>
        <div class="col-6 d-flex justify-content-center align-items-center">
            <img src="https://placeimg.com/400/300" alt="">
        </div>
    </div>
    <div class="row" id="row3">
        <div class="col-6 d-flex justify-content-center align-items-center">
            <img src="https://placeimg.com/400/300" alt="">
        </div>
        <div class="col-6 d-flex justify-content-center align-items-center">
            <p class="h3">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum est provident tempora, pariatur quos.</p>
        </div>
    </div>
  </div>
</div>

<div>
  <div class="container">
    <div class="row mt-5 pt-5 mb-5 pb-5 justify-content-center">
      <div class="col-sm-6 text-center">
        <p class="h1">Ready to see how easy managing your campaign can be?</p>
        <a href="/register" class="btn btn-primary btn-lg mt-4" role="button">Try now for free!</a>
      </div>
    </div>
  </div>
</div>

<div class="blog">
  <div class="container mt-5">
    <div class="row">
      <div class="col-4">
        <a href="#" class="card">
          <img src="https://placeimg.com/550/300" alt="" class="card-img-top" height="250">
          <div class="card-body">
            <p class="h5 card-title">This is a blog post</p>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis maiores laborum recusandae iusto eveniet a eum obcaecati...</p>
          </div>
        </a>
      </div>
      <div class="col-4">
        <a href="#" class="card">
          <img src="https://placeimg.com/500/300" alt="" class="card-img-top" height="250">
          <div class="card-body">
            <p class="h5 card-title">This is a second blog post</p>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis maiores laborum recusandae iusto eveniet a eum obcaecati...</p>
          </div>
        </a>
      </div>
      <div class="col-4">
        <a href="#" class="card">
          <img src="https://placeimg.com/450/300" alt="" class="card-img-top" height="250">
          <div class="card-body">
            <p class="h5 card-title">This is a third blog post</p>
            <p class="card-text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis maiores laborum recusandae iusto eveniet a eum obcaecati...</p>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
@endsection



@section('contentjs')
<script>
window.onscroll = () => {
  var top = window.pageYOffset;
  var row1 = document.getElementById('row1');
  var row2 = document.getElementById('row2');
  var row3 = document.getElementById('row3');
  console.log(top);
  
  
  if (top > 500) {row1.classList.add("visible")};
  if (top > 900) {row2.classList.add("visible")};
  if (top > 1300) {row3.classList.add("visible")};
    
};

</script>
@endsection