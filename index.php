<!DOCTYPE html>
<html>
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bgimg {
  /* background-image: url('gate_old.jpg'); */
  background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('gate_old.jpg');
  height: 100%;
  background-position: center;
  background-size: cover;
  position: relative;
  color: white;
  font-family: "Courier New", Courier, monospace;
  font-size: 25px;
}

.middle {
    /* background: rgba(0, 0, 0, 0.3); */
    /* border-radius: 25px; */
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

#logo {
    max-width: 100%;
}

.soon {
    margin: 0;
}

</style>
<body>

<div class="bgimg">
  <div class="middle">
    <img id="logo" src="ZeonGoLogo.png" class="img-fluid">
    <h1 class="soon">COMING SOON</h1>
  </div>
</div>

</body>
</html>
