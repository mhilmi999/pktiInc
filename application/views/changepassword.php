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
        height: auto;
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
        margin-bottom:20px;
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
    <p class="sign" align="center">Change Password</p>   
    <?= $this->session->flashdata('message');?>
      <form action="changingPassword" method="post" class="form1">
      <input class="un " type="text" align="center" type="text" id="username" name="username" width="100" value="<?= $user['username']; ?>" readonly  height="100px">
      <input class="pass" type="password" align="center"  required="required" <input type="password" id="currentpassword" name="currentpassword" width="100" placeholder="Current Password"/></td>
      <?= form_error('currentpassword', '<small class="text-danger pl-3">', '</small>');?>
      <input class="pass" type="password" align="center"  required="required" <input type="password" id="newpassword1" name="newpassword1" width="100" placeholder="New Password"/></td>
      <?= form_error('newpassword1', '<small class="text-danger pl-3">', '</small>');?>
      <input class="pass" type="password" align="center"  required="required" <input type="password" id="newpassword2" name="newpassword2" width="100" placeholder="Repeat Password"/></td>
      <?= form_error('newpassword2', '<small class="text-danger pl-3">', '</small>');?>
      <button type="submit" class="submit" align="center">Update</button>
    </form> 
    </div>
     
</body>
</html>