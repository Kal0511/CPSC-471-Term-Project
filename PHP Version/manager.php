<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manager Page</title>
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

    .modal-body .item .title {
      width: 33%;
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

    .right_container {
      overflow-y: scroll;
      width: 100%;
      height: 69%;
    }


    .item.item_list {
      display: flex;
      justify-content: space-between;
    }

    button.btn.btn-link.item_list_btn {
      position: static;
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
              <h5 class="modal-title" id="exampleModalLabel">edit</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="item">
                <div class="title">
                  Entry Point Number:
                </div>
                <div class="content">
                  <input type="text" class="form-control" id="validationCustom03" value="" required placeholder="">
                </div>
              </div>
              <div class="item">
                <div class="title">
                  Change Position:
                </div>
                <div class="content">
                  <select class="form-control" id="select_status">
                    <option value="approve">approve</option>
                    <option value="denied">denied</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal" id="save">Save</button>
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
            <div class="text" id="Gender"></div>
          </div>
          <div class="item">
            <div class="label">name:</div>
            <div class="text" id="Username"></div>
          </div>
        </div>
        <div class="bottom">
          <p>Entry station Number：9</p>
          <p>Entry station address：XXXX</p>
        </div>
      </div>
      <div class="right">
        <header>
          Manager Page
          <div class="btns_div">
            <span id="back">Go Back</span>
            <span id="exit">Log Out</span>
          </div>

        </header>
        <div class="right_container">



          <div class="item item_list">
            <div class="name">name</div>
            <div class="status">status</div>
            <button type="button" class="btn btn-link item_list_btn" data-toggle="modal"
              data-target="#modal1">edit</button>
          </div>


        </div>
        <div class="submit_div">
          <button type="submit"  id="submit_btn" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    crossorigin="anonymous"></script>
    <script src="./utils.js"></script>
  
  

    <script>
      let positions = [
        "visitor",
        "manager",
        "employee-admin",
        "security-guard",
        "border-officer",
      ]

      let data=[
        {name:"xxx",position:"visitor",pointNumber:"0"},
        {name:"xxx2",position:"employee-admin",pointNumber:"1"},
        {name:"xxx3",position:"manager",pointNumber:"3"},
        {name:"xxx4",position:"border-officer",pointNumber:"2"},
      ]
  
      let  config = {
        activeIdx:0, //存点击的是哪一列
      }
  
      window.addEventListener('load', function () {
        renderSelect();
        // loaded
        initLoad()
      }, false);

      function renderSelect(){
        console.log("渲染下拉框")
          $("#select_status").html("") //先清空
          let html = "";
          positions.forEach((item,idx) => {
            html+= `
            <option value="${item}">${item}</option>
            `
          });
          console.log("render")
          $("#select_status").html(html)
      }
  
      function initLoad(){ //初始化
        offBind();//取消绑定事件然后再重新绑定 否则会造成重复绑定 
        renderHtml(data)
        addEvent();
        $("#handledNumber").html(data.length)
      }
      
      function renderHtml(data){ //渲染dom
        console.log("data:",data)
        $("#right_container").html("") //先清空
          let html = "";
          data.forEach((item,idx) => {
            html+= `
            <div class="item item_list">
              <div class="name">${item.name}</div>
              <div class="status">${item.position}</div>
              <button type="button" 
                class="btn btn-link item_list_btn" 
                data-toggle="modal"
                data-target="#modal1"
                data_val=${idx}
              >Process</button>
            </div>
            `
          });
          console.log("render")
          $(".right_container").eq(0).html(html) //再渲染
      }
  
      function addEvent(){ //绑定事件
        let domArr = $(".item_list_btn")
        let len = domArr.length
  
        for(let i=0;i<len;i++){
  
          let $dom = $(domArr[i])
          $dom.on("click",function(){
  
            // $('#modals').modal('show')
  
            let idx = $(this).attr("data_val");
  
            console.log("click:",idx)
  
            let {name,position,pointNumber} = data[idx]
  
            setConfig(idx)

            $("#select_status").val(position)//设置 模态框的值
            
            $("#validationCustom03").val(pointNumber) 
  
  
          })
  
          // $("#close").on("click",function(){
          //   $('#modals').modal('hide')
          // }) //保存按钮绑定事件
          
        }
        $("#save").on("click",changeData) //保存按钮绑定事件
      }
  
      function offBind(){ //取消绑定事件
        let domArr = $(".item_list_btn")
        let len = domArr.length
        for(let i=0;i<len;i++){
          let $dom = $(domArr[i])
          $dom.off("click")
        }
        $("#save").off("click") 
      }
  
      function setConfig(idx){ //设置全局得值  用于改变数据
          config.activeIdx = idx
      }
  
      function changeData(event){
          //改变完数据 就需要重新渲染dom
          data[config.activeIdx].position = $("#select_status").val()
          data[config.activeIdx].pointNumber = $("#validationCustom03").val()
          console.log($("#select_status").val())
          initLoad();
      }
    </script>



</body>

</html>