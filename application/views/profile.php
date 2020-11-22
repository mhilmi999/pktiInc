<html>

<head>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <style>
    
    body {
        padding-top:100px;
        background-color: #9acd32;
        font-family: 'arial', sans-serif;
    }

.main {
        
        background-color: #FFFFFF;
        width: auto;
        height: auto;
        margin: 53em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
   
.card-container{
	width: 400px;
	height: auto;
	background: #FFF;
	border-radius: 6px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	box-shadow: 0px 1px 10px 1px #000;

	display: inline-block;
}
.upper-container{
	height: auto;
	background: #808080;
}
.image-container{
	background: white;
	width: 150px;
	height: 150px;
  margin-left:20px;
  margin-bottom:10px;
	border-radius: 50%;
	padding: 5px;
	transform: translate(100px,100px);
}
.image-container img{
	width: 150px;
	height: 150px;
  margin-left:;
  margin-bottom:10px;
	border-radius: 50%;
}
.lower-container{
	height: 280px;
	background: #FFF;
	padding: 20px;
	padding-top: 40px;
	text-align: center;
}
.lower-container h3{
  margin-top:55px;
	box-sizing: border-box;
	line-height: .6;
	font-weight: lighter;
}
.lower-container h4{
  margin-top:5px;
	color: #9acd32;
	opacity: .6;
	font-weight: bold;
}
.lower-container p{
	font-size: 16px;
	color: gray;
	margin-bottom: 30px;
}
.lower-container .btn{

	background: #9acd32;
	border: none;
	color: white;
	border-radius: 30px;
	font-size: 12px;
	text-decoration: none;
	font-weight: bold;
	transition: all .3s ease-in;
  margin-bottom:50px;
}
.lower-container .btn:hover{
	background: transparent;
	color: #808080;
	border: 2px solid #808080;
}
.card-text{
  margin-top:-5px;
  background: transparent;
	color: #808080;
	}

    
    .sign {
        padding-top:30px;
        color: #808080;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }
    
    .un {
    width: 305px;
    height: 600px;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 100px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 50px 20px;
    border: none;
    border-radius: 100px;
    outline: none;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-left: 46px;
    text-align: center;
    margin-bottom: 50px;
    font-family: 'Ubuntu', sans-serif;
    }
    
    form.form1 {
        padding-top: 10px;
    }
    
    .pass {
    width: 305px;
    height: 600px
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    border: 2px solid rgba(0, 0, 0, 0.02);

    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
   
    .un:focus, .pass:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;
        
    }
    
    .submit {
      cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: #9acd32;
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 5px;
        padding-top: 5px;
        font-family: 'Ubuntu', sans-serif;
        margin-top:10px;
        margin-left: 35%;
        font-size: 13px;
        box-shadow: 0 0 50px 1px rgba(0, 0, 0, 0.04);
      }
    
    .forgot {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #808080;
        padding-top: auto;
        margin-bottom:10px;
      }
    .remain {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #808080;
        padding-top: 0.1px;
        padding-bottom:30px;

      }
    
    a {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #808080;
        text-decoration: none
      }
    
    @media (max-width: 600px) {
        .main {
            border-radius: 0px;
              }
            }
  </style>
</head>

<body>
  <div class="main">
  <div class="card-container">
      <div class="upper-container">
      <?= $this->session->flashdata('message');?>
        <div class="image-container">
        <img src="<?= base_url('photos/') . $user['photo']; ?>" class="card-img" width=150 height=200>
        </div>
      </div>

      <div class="lower-container">
        <div>
          <h3> <?= $user['nama']; ?></h3>
          <h4><?= $current_role;?></h4>
        </div>
        <div>
        <p class="card-text">Your user id :<?= $user['username']; ?></p>
        <p class="card-text">Your mail : <?= $user['email']; ?></p>
        <p class="card-text">Since : <?= $user['date_created']; ?> </p>
        </div>
        <div>
          <a href="<?= base_url('index.php/AccountCtl/editProfile'); ?>" class="btn ">Edit profile</a>
          <a href="<?= base_url('index.php'); ?>/AccountCtl/changePassword" class="btn ">Change password</a>
        </div>
      </div>

    </div>
     
</body>
</html>