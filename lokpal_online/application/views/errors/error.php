
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Complaint Management System Lokpal of India</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<style type="text/css">
body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    font-weight: 300;
    line-height: 1.5;
    color: #585858;
    background-color: #f3f6fd;
}

.wrapper {
  max-width: 960px;
  width: 100%;
  margin: 30px auto;
  transform: scale(0.8);
}
.landing-page {
  max-width: 960px;
  margin: 0;
  padding: 100px 0;
  box-shadow: 0px 0px 8px 1px #ccc;
  background: #fafafa;
  border-radius: 8px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.landing-page img {
  width: 200px;
  margin: 0 0 15px;
}
.landing-page h1 {
    font-size: 58px;
    margin: 0;
}
.landing-page p {
    font-size: 28px;
    width: 50%;
    margin: 16px auto 24px;
    text-align: center;
}
.landing-page .error_button {
    border-radius: 50px;
    padding: 12px 50px;
    font-size: 24px;
    cursor: pointer;
    background: #164160;
    color: #fff;
    border: none;
    box-shadow: 0 4px 8px 0 #ccc;
    text-decoration: none;
}
</style>

<div class="wrapper">
  <div class="landing-page">
    <div style="text-align:center;" class="icon__download">
		<img src="<?php echo base_url();?>assets/admin_material/dashboard/images/logo_lokpal.png" alt="logo">
	</div>
   
    <h1> 404 Error.</h1>
    <p> We can't find the page you're looking for.</p>
    <a href="<?php echo base_url().$url;?>" class="error_button">Back to home</a>
  </div>
</div>
</body>
</html>