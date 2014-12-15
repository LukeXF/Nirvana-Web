<style type="text/css">

.nav-centering {
  width: 100%;
  position: fixed;
}

.nav-backing {
  background: url('http://root-image.luke.sx/bdbd.png');
  background-size: contain;
  width: 100%;
  height: 20px;
  z-index: 0;
}

.nav-overlay {
  background: url('http://nirvanamc.com/assets/img/OVERLAY-TEXT.png');
  background-size: contain;
  z-index: 999999 !important;
  height: 190px;
  width: 1500px;
  margin:0 auto;
  text-align: center;
  margin-top: -190px;
}

.nav-map {
  background: url('http://nirvanamc.com/assets/img/NAVBAR.png') no-repeat;
  background-size: contain;
  z-index: 9999;
  height: 190px;
  width: 1500px;
  margin:0 auto;
  text-align: center;
  margin-top: -20px;
}


.nav-item {
  width: 32.4%;
  height: 100%;
  display: -webkit-inline-box;

}

.nav-small {
  cursor: pointer;
}

.nav-small div:hover {
  background: url('http://root-image.luke.sx/c0ac.png') no-repeat;
  background-size: contain;
}

.nav-small div.n-3:hover {
  background: url('http://nirvanamc.com/assets/img/nav-store.png') no-repeat;
  background-size: contain;
  width: 86px;
}

.nav-small div.n-2:hover {
  background: url('http://nirvanamc.com/assets/img/nav-news.png') no-repeat;
  background-size: contain;
  width: 87px;
}

.nav-small div.n-1:hover {
  background: url('http://nirvanamc.com/assets/img/nav-home.png') no-repeat;
  background-size: contain;
  width: 86px;
  margin-right: 2px;
}

.nav-small div.n-4:hover {
  background: url('http://nirvanamc.com/assets/img/nav-forum.png') no-repeat;
  background-size: contain;
  width: 87px;
  margin-left: -5px;
}

.nav-small div.n-5:hover {
  background: url('http://nirvanamc.com/assets/img/nav-yt.png') no-repeat;
  background-size: contain;
  width: 87px;
  margin-left: -1px;
}


.nav-small div.n-6:hover {
  background: url('http://nirvanamc.com/assets/img/nav-stat.png') no-repeat;
  background-size: contain;
  width: 85px;
  margin-left: 2px;
}

.nav-small div {
  height: 54px;
  margin-top: 3px;
  padding-left: 0px;
}

.nav-small.side1 { 
  float: left;
  margin-top: 25px;
  margin-left: 236px;
  width : 295px;
  height: 54px;
}

.nav-small.side2 { 
  float:right;
  margin-top: 25px;
  margin-right: 234px;
  width : 290px;
  height: 54px;
}

</style>

<div class="nav-centering">
  <div class="nav-backing"></div>
  <div class="nav-map">
    <div class="nav-small side1">
      <a href="#home"> <div class="nav-item n-1"></div></a>
      <a href="#news"> <div class="nav-item n-2"></div></a>
      <a href="#store"><div class="nav-item n-3"></div></a>
    </div>
    <div class="nav-small side2">
      <a href="#forum"><div class="nav-item n-4"></div></a>
      <a href="#yt">   <div class="nav-item n-5"></div></a>
      <a href="#stats"><div class="nav-item n-6"></div></a>
    </div>
  </div>
  <div class="nav-overlay"></div>
</div>