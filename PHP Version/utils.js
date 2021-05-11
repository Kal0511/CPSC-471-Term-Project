const init = [
  {
    username: "1",
    password: "1",
    type: "visitor",
  },
  {
    username: "2",
    password: "2",
    type: "manager",
  },
  {
    username: "3",
    password: "3",
    type: "employee-admin",
  },
  {
    username: "4",
    password: "4",
    type: "security-guard",
  },
  {
    username: "5",
    password: "5",
    type: "border-officer",
  },
];

initUser();
function initUser() {
  let users = localStorage.getItem("users");
  if (!users) {
    users = [];
  } else {
    users = JSON.parse(users);
  }
  for (const item of init) {
    const { username } = item;
    if(!findUser(username)){
      users.push(item);
    }
  }
  localStorage.setItem("users", JSON.stringify(users));
}

function addUser(username, password,type="visitor") {
  let users = localStorage.getItem("users");
  if (!users) {
    users = [];
  } else {
    users = JSON.parse(users);
  }
  if(username == "null" || username == "undefined"){
    alert("用户名不能为字符串null或者字符串undefined")
    return  false
  }
  users.push({ username, password, type });
  localStorage.setItem("users", JSON.stringify(users));
  return true
}

function findUser(username) {
  let users = localStorage.getItem("users");
  if (!users) {
    users = [];
  } else {
    users = JSON.parse(users);
  }
  const exist = users.find((item) => {
    return item.username == username;
  })
  return exist;
}

function userLogin(username, password) {
  let users = localStorage.getItem("users");
  if (!users) {
    users = [];
  } else {
    users = JSON.parse(users);
  }
  const exist = users.find((item,idx) => {
    return item.username == username && item.password == password 
  })
  localStorage.setItem("users", JSON.stringify(users)); //登录之后 重新改变数据
  console.log(exist)
  return {
    success: exist,
    type: exist ? exist.type : ""
  }
}


function userLogOut(username) {
  setToken()
  window.location = "login.php";
  return true
}


function setToken(username) {
  if(username == "null" || username == "undefined"){
    return alert("用户名不能为字符串null或者字符串undefined")
  }
  localStorage.setItem("token", username);
}

function getToken() {
  return localStorage.getItem("token");
}

function SaveInfo(info) {
  console.log(info)
  const username = getToken();
  console.log(username)

  let users = localStorage.getItem("users");
  if (!users) {
    users = [];
  } else {
    users = JSON.parse(users);
  }
  users = users.map((item) => {
    if (item.username == username) {
      item = Object.assign(item, info);
    }
    return item;
  })
  localStorage.setItem("users", JSON.stringify(users));
}

 $("#back").on("click",function(){
  window.history.back(-1);
 })

 $("#exit").on("click",function(){
  userLogOut();
 })

 $("#submit_btn").on("click",function(){
  alert("success")
 })