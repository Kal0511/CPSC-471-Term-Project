<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Admin</title>
  <!-- bootstrap文档：https://v4.bootcss.com/docs/getting-started/introduction/ -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    ::-webkit-input-placeholder {
      /* WebKit browsers */
      color: #ddd !important;
      ;
      font-size: 14px;
    }

    ::-moz-placeholder {
      /* Mozilla Firefox 19+ */
      color: #ddd !important;
      ;
      font-size: 14px;
    }

    :-ms-input-placeholder {
      /* Internet Explorer 10+ */
      color: #ddd !important;
      ;
      font-size: 14px;
    }

    html,
    body {
      width: 100%;
      height: 100%;
    }

    #page {
      background: linear-gradient(-135deg, #48D1CC, #FF7F50);
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .info {
      width: 750px;
      height: 750px;
      max-height: 100%;
      background-color: #fff;
      display: flex;
    }

    .info .left {
      width: 200px;
      background-color: #f8fafc;
    }

    .info .right {
      flex: 1;
    }

    .avatar img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      overflow: hidden;
    }

    .left .item {
      display: flex;
    }

    .left .item .label {
      width: 60px;
    }

    .left .item .text {
      flex: 1;
      color: #999;
    }

    .left {
      padding: 10px;
      margin-right: 20px;
    }

    .left .top {
      border-bottom: 1px solid #ccc;
      padding: 10px 0;
    }

    .left .bottom {
      margin-top: 20px;
      font-size: 14px;
    }

    .avatar {
      text-align: center;
      margin-bottom: 20px;
    }

    .right .item {
      height: 100px;
      display: flex;
      padding: 20px 0;
      align-items: center;
      padding-right: 50px;
      position: relative;
      border-bottom: 1px solid #ededed;
    }

    .right .item button {
      position: absolute;
      right: 0;
    }

    .right {
      padding-right: 20px;
    }

    .right .item img {
      width: 60px;
      height: 60px;
      padding: 15px;
    }

    .right .item .mid {
      flex: 1;
    }

    .right .title {
      font-weight: bold;
    }

    .right .content {
      color: #666;
    }

    .right header {
      border-bottom: 1px solid #ededed;
      line-height: 80px;
      text-align: center;
      font-size: 28px;
      font-weight: bold;
    }

    button:hover {
      box-shadow: none !important;
      border: none !important;
      outline: none !important;
    }

    button:focus {
      box-shadow: none !important;
      border: none !important;
      outline: none !important;
    }

    button:active {
      box-shadow: none !important;
      border: none !important;
      outline: none !important;
    }

    .btn-primary {
      background-color: #64dcdc;
      outline: 0;
      border-color: #64dcdc;
    }

    .btn-primary:hover {
      background-color: #64dcdc;
      border-color: #64dcdc;
      box-shadow: 0 0 8px 0px #64dcdc;
    }

    .btn-primary:focus {
      background-color: #64dcdc;
      border-color: #64dcdc;
      box-shadow: none;
    }

    .btn-primary:active {
      background-color: #64dcdc !important;
      border-color: #64dcdc !important;
      box-shadow: 0 0 8px 0px #64dcdc !important;
    }

    .btn-link,
    .btn-link:hover,
    .btn-link:focus,
    .btn-link:active {
      color: #64dcdc !important;
    }

    .modal-body .item {
      display: flex;
      margin-bottom: 20px;
    }
    
    .position .item {
      justify-content: center;
    }

    .modal-body .item .title {
      width: 25%;
      line-height: 38px;
    }

    .item .content {
      flex: 1;
      line-height: 38px;
      display: flex;
      align-items: center;
    }

    .checkbox {
      margin-right: 10px;
      border-radius: .25rem;
    }

    .item input {
      border: 1px solid #64dcdc;
    }

    .item input:focus {
      border-color: #64dcdc;
      outline: 0;
      box-shadow: 0 0 8px 0px #64dcdc;
    }

    .submit_div {
      display: flex;
      justify-content: center;
      margin-top: 30px;
    }

    .item select {
      border: 1px solid #64dcdc;
      border-radius: .25rem;
    }

    .item select:focus {
      border-color: #64dcdc;
      outline: 0;
      box-shadow: 0 0 8px 0px #64dcdc;
    }

    .right header {
        position: relative;
    }

    .btns_div {
        position: absolute;
        right: 0;
        top: 0;
        color: #64dcdc !important;
        font-size: 1rem;
        cursor: pointer;
    }
    .btns_div>span{
      padding: 0 0.1rem;
    }
  </style>
</head>

<body>
  <div id="page">
    <div class="modals">
      <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Health Record</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="item">
                <div class="title">
                  Gender:
                </div>
                <div class="content">
                  <select class="form-control" id="GenderSelect">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Unknown</option>
                  </select>
                </div>
              </div>
              <div class="item">
                <div class="title">
                  Name:
                </div>
                <div class="content">
                  <input type="text" class="form-control" id="Name" value="" required placeholder="">
                </div>
              </div>
              <div class="item">
                <div class="title">
                  Date:
                </div>
                <div class="content" >
                  <input type="date" id="Date" class="checkbox">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal" onClick="handleSave('modal1')">Save</button>
            </div>
          </div>
        </div>
      </div>


      <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Position</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body position">
              <div class="item">
                <select class="form-control custom-select" id="positionSelect" required>
                  <!-- <option selected disabled value="">select position</option> -->
                  <!-- <option value="visitor">visitor</option> -->
                  <option value="manager">manager</option>
                  <!-- <option value="employee-admin">employee-admin</option> -->
                  <option value="security-guard">security-guard</option>
                  <option value="border-officer">border-officer</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary"  data-dismiss="modal" onClick="handleSave('modal2')">Save</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="info">
      <div class="left">
        <div class="top">
          <div class="avatar">
            <img src="./images/avatar.png" alt="">
          </div>
          <div class="item">
            <div class="label">gender:</div>
            <div class="text"  id="Gender">male</div>
          </div>
          <div class="item">
            <div class="label">name</div>
            <div class="text" id="Username">mm</div>
          </div>
        </div>
        <div class="bottom">
          <p>Entry station Number：9</p>
          <p>Entry station address：XXXX</p>
        </div>
      </div>
      <div class="right">
        <header>
          Employee Admin Page

          
          <div class="btns_div">
            <span id="back">Go Back</span>
            <span id="exit">Log Out</span>
          </div>


        </header>
        <div class="item">
          <div class="icon">
            <img src="./images/health.png" alt="">
          </div>
          <div class="mid">
            <div class="title">
              Health Record:
            </div>
            <div class="content" id="Health">
            </div>
          </div>
          <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal1">edit</button>
        </div>
        <div class="item">
          <div class="icon">
            <img src="./images/health.png" alt="">
          </div>
          <div class="mid">
            <div class="title">
              Position:
            </div>
            <div class="content" id="Position">
            </div>
          </div>
          <button type="button" class="btn btn-link" data-toggle="modal" data-target="#modal2">edit</button>
        </div>
        <div class="item">
          <div class="icon">
            <img src="./images/health.png" alt="">
          </div>
          <div class="mid">
            <div class="title">
              Start Date:
            </div>
            <div class="content">
              <input type="date" class="form-control" id="validationCustom03" value="" required placeholder="">
            </div>
          </div>
        </div>
        <div class="submit_div">
          <button type="submit" class="btn btn-primary" id="submit">Submit</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
    <script src="utils.js"></script>
  <script>
       const info = {};
    function handleSave(val) {
      if (val == "modal1") {
        const gender = $("#GenderSelect").val();
        const date = $("#Date").val();
        const name = $("#Name").val();
        info.gender = gender;
        info.date = date;
        info.name = name;
        $("#Username").text(name);
        $("#Gender").text(gender)
        $('#modal1').modal('hide')
      }
      if (val == "modal2") {
        const position= $("#positionSelect").val();
        info.type = position;
        $("#Position").text(position)
        $('#modal2').modal('hide')
      }
      

    }
    function handleSubmit() {
      let  startDate =$("#validationCustom03").val()
      info.startDate = startDate;
      SaveInfo(info);
      let type = $("#Position").text();
       if (type == "manager") {
                  window.location = "./manager.html";
      }
      if (type == "border-officer") {
        window.location = "./border-officer.html";
      }
      
      if (type == "security-guard") {
        window.location = "./security-guard.html";
      }
    }
    (function () {
      'use strict';
      window.addEventListener('load', function () {
        if($("#Position").text() == "employee-admin" ){
          $("#Position").text("")
        }
        // loaded
        $("#submit").on("click",function(){
          handleSubmit()
        })
      }, false);
    })();
  </script>
</body>

</html>