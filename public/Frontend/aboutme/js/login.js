async function getLoginAPI() {
    let promise = await fetch("https://sheetdb.io/api/v1/c684dimdyx8aj?fbclid=IwAR28GQSWV-HxIKm03AhLyiFIqbfw43chGFWhL-oc_nz2BsZBa8okym0Vd_M");
    let data = await promise.json();
    let userName = document.getElementById("username");
    let passWord = document.getElementById("pass");
    let btn_login = document.getElementById("btndangnhap");
    let btn_signin = document.getElementById("btndangki");
    let size = Object.keys(data).length;
    // console.dir(userName);
    // console.dir(passWord);
    // console.log(data);
    // console.log(size);
    btn_login.addEventListener("click", function () {
        for (let i = 0; i < size; i++) {
            if (userName.value === data[i].user_name && passWord.value === data[i].user_password) {
                // console.log(userName.value);
                // console.log(passWord.value);
                location.href = "allfood.html";
                break;
            }
            if (userName.value !== data[i].user_name || passWord.value !== data[i].user_password || 
                (userName.value !== data[i].user_name && passWord.value !== data[i].user_password) ) {   
                alert("Thông tin đăng nhập không chính xác !!!");
                break;
            }
        }
    });
    btn_signin.addEventListener("click", function () {
        location.href = "dangKiHTML.html";
        // alert(userName.value);
    });
}
getLoginAPI();