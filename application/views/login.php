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
        font-family: 'Ubuntu', sans-serif;
    }
    
    .main {
        
        background-color: #FFFFFF;
        width: 400px;
        height: 370px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
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
    border: 1px solid rgba(0, 0, 0, 0.02);
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
    margin-top:20px;
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
        margin-top:30px;
        margin-left: 35%;
        font-size: 13px;
        box-shadow: 0 0 50px 1px rgba(0, 0, 0, 0.04);
      }
    
    .forgot {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #808080;
        padding-top: 0.5px;
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
    <p class="sign" align="center">Login</p>
    <p class= "forgot" align="center">
      You should login to the system, 
    </p>
    <p class="forgot" align="center">
    before you can submit or review any article.
          </p>
    <?= $this->session->flashdata('message');?>
    <form action="<?php echo base_url() . 'index.php/accountCtl/checkingLogin'; ?>" method="post" class="form1">
      <input class="un " type="text" align="center" id="username"  name="username" placeholder="Username" >
      <?= form_error('username', '<small class="text-danger pl-3">', '</small>');?>
      <input class="pass" type="password" align="center" id="katasandi" name="katasandi" placeholder="Password">

      <button type="submit" class="submit" align="center">Login</button>
          </form> 
          <p class="forgot" align="center">If you haven't had an account, please <a href="<?php echo base_url() . 'index.php/welcome/signup'; ?>" />Sign-Up</a></>
            
            
    </div>
     
</body>

</html>