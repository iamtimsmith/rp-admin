<template>
<div>
<button class="btn btn-default bg-dark text-light" @click="openLeft"><i class="fa fa-bars"></i></button>
  <div class="card bg-dark" id="offcanvas-left">
    <button class="btn btn-default bg-dark text-light ml-auto" @click="closeLeft"><i class="fa fa-close"></i></button>
    <div class="card-body">
      <ul>
          <li class="mt-3 mb-5"><a href="/"><img src="/images/d20.png" alt="RP Admin" class="col-sm-12"></a></li>
          <li class="mt-2"><a href="/">Home</a></li>
          <li class="mt-2"><a href="/documentation">Documentation</a></li>
          <li class="mt-2"><a href="/about">About Us</a></li>
          <li class="mt-2"><a href="/contact">Contact Us</a></li>
          <li class="mt-2"><a href="/login">Login</a></li>
          <li class="mt-2"><a href="/signup">Signup</a></li>
          
      </ul>
    </div>
  </div>
</div>
</template>

<script>
  export default {
    methods: {
      openLeft() {
        var offcanvas = document.getElementById('offcanvas-left');
        offcanvas.classList.add('showing');
      },
      closeLeft() {
        var offcanvas = document.getElementById('offcanvas-left');
        offcanvas.classList.remove('showing');
      }
    }
  }
</script>

<style lang="scss" scoped>
.btn-default {
    margin-top:5px;
    border:none!important;
    .fa-bars {
      font-size:1.5rem;
    }
  }
  #offcanvas-left {
  visibility:hidden;
  position:fixed;
  top:0;
  bottom:0;
  left:-300px;
  width:300px;
  z-index:9;
  transition:all .3s;
  &.showing {
    visibility:visible;
    left:0;
  }
  .card-body {
    overflow-y:scroll;
  }
  a {
    color:#fff;
  }
  button {
    width:50px;
    .fa-close {
      font-size:1.5rem;
    }
  }
  ul {
    list-style:none;
    padding:0;
    li {
      a {
        font-size:1.1rem;
        text-decoration:none!important;
        img {
          max-width:100px;
        }
        .fa {
          font-size:0.9rem;
          margin-right:10px;
        }
      }
    }
  }
}
</style>