
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


body{
  margin: 0;
  padding: 0;
   background-image: url("upload_img/slider/thought-catalog-505eectW54k-unsplash.jpg");
   -webkit-background-size:cover;
   background-size: cover;font-family: Tohoma,sans-serif;
}
.form-area{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  width: 400px;
  height: 450px;
  box-sizing: border-box;
  background: rgba(0,0,0,0.8);
  padding: 40px;
}
h1{
  margin: 0;
  padding: 0 0 20px;
  font-weight: bold;
  color: #ffffff;
}

.form-area p{
     margin: 0;
     padding: 0;
     font-weight: bold;
     color: #ffffff;

}
.form-area input{
    margin-bottom: 20px;
    margin-bottom: 30px;
    width: 100%;

}
input[type=text], input[type=password]{
   border: none;
   border-bottom: 1px solid #ffffff;
   background-color: transparent;
   outline: none;
   height: 40px;
   color: #ffffff;
   display: 16px;
}
::placeholder {
  color: #ffffff;

}
.btn{
 border: none;
 height: 40px;
 width: 320px;
 outline: none;
 color: #ffffff;
 font-size: 15px;
 background-color: tomato;
 cursor: pointer;
 border-radius: 20px;
}
.error{
  background:#ff8080;
  color: red;
  padding: 10px;
  width: 95%;
 
  margin: 20px auto;
}
</style>
</head>
<body>
<div class="form-area">
  <form action="connection/login_fun.php" method="post">
    <h1>ADMIN LOGIN</h1>
   
    <p>Email</p>
    <input type="text" placeholder="Enter Email" name="user" >

    <p>Password</p>
    <input type="password" placeholder="Enter Password" name="password" >
    
     
    <button type="submit" class=" btn"  name ="action" value="student"> Login</button>
    
  
  </form>

     
</div>
</body>
</html>