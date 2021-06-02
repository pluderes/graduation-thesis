async function getDataAPI() {
  let promise = await fetch(`https://sheetdb.io/api/v1/d8fe4j4mgrr9m`);
  let dataFood = await promise.json();
  // console.log(data);

  let size = Object.keys(dataFood).length;
  // console.log(size);

  let img = document.getElementById("imgs");
  let name = document.getElementById("caption");
  let addr = document.getElementById("address");
  let desc = document.getElementById("desc");
  let like = document.getElementById("like");
  let price = document.getElementById("price");

  // user login
  let user = document.getElementById("userlogin");
  console.dir(user);

  let divRow = document.getElementById("divRow");

  var card = [];
  // Get the modal
  var modal = document.getElementById("myModal");

  // call api Cmt
  let nameCmt = document.getElementById("nameCmt");
  let evaluate = document.getElementById("evaluate");
  let comments = document.getElementById("comment");

  let sizeLogin;
  let dataLogin;

  // save cmt
  let rating = document.getElementById("sel1");
  let cmt = document.getElementById("message-text");
  let newname = document.getElementById("namecmt");

  //  get api user
  async function getLoginAPI() {
    let promise = await fetch(
      "https://sheetdb.io/api/v1/c684dimdyx8aj?fbclid=IwAR28GQSWV-HxIKm03AhLyiFIqbfw43chGFWhL-oc_nz2BsZBa8okym0Vd_M"
    );
    dataLogin = await promise.json();
    sizeLogin = Object.keys(dataLogin).length;
  }
  getLoginAPI();

  let sizeCmt;
  let dataCmt;
  // get api comment
  async function getCmtApi() {
    let promise = await fetch("https://sheetdb.io/api/v1/o49nd7bsw9rod");
    dataCmt = await promise.json();
    sizeCmt = Object.keys(dataCmt).length;
  }
  getCmtApi();

  for (let i = 0; i < size; i++) {
    divRow.insertAdjacentHTML(
      `beforeend`,
      `<div class="wrapper col-sm-3">
        <div class="card" id="border${i}" style="border-radius: 20px; border: none;">
                <img id="img" class="imgfood" src="${dataFood[i].food_img}" alt="" />
                  <div class="info">
                    <h2 id="foodname" class="name">
                     ${dataFood[i].food_name}
                    </h2>
                  </div>
        </div>
      </div>`
    );
    var first = divRow.lastChild.lastChild;
    var second = first.previousSibling;
    // console.dir(second.id);
    card.push(second.id);
  }

  // console.log(card);
  let length = Object.keys(card).length;
  for (let i = 0; i < length; i++) {
    // // Get the modal
    // var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var show = document.getElementById(`${card[i]}`);
    show.onclick = function () {
      modal.style.display = "block";
      img.src = dataFood[i].food_img;
      name.innerHTML += `${dataFood[i].food_name}`;
      addr.innerHTML += `<b>Địa chỉ: </b>${dataFood[i].Address}`;
      desc.innerHTML += `<b>Giới thiệu: </b>${dataFood[i].food_desc}`;
      like.innerHTML += `${dataFood[i].like}`;
      price.innerHTML += `<b>Giá: </b>${dataFood[i].price} VND`;

      for (let j = 0; j < sizeCmt; j++) {
        if (dataCmt[j].food_id === dataFood[i].food_id) {
          // for (let l = 0; l < sizeLogin; l++) {
          // if (dataCmt[j].user_id === dataLogin[l].user_id) {
          let title = document.getElementById("titleCmt");
          title.insertAdjacentHTML(
            `afterend`,
            `<hr>
            <div class="allcmt">
              <p id="nameCmt"><b>Tên: </b>${dataCmt[i].user_name}</p>
              <p id="evaluate"><b>Đánh giá: </b>${dataCmt[j].rating}</p>
              <p id="comment"><b>Comment: </b>${dataCmt[j].comments}</p>
            </div>`
          );
          // nameCmt.innerHTML += `${dataCmt[i].user_name}`;
          // evaluate.innerHTML += `${dataCmt[j].rating}`;
          // comments.innerHTML += `${dataCmt[j].comments}`;
          // }
          // }
        }

        // post cmt
        let btnSendcmt = document.getElementById("btnSend");
        async function postCmt() {
          // save cmt
          let review = {
            method: "POST",
            headers: {
              Accept: "application/json",
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              data: [
                {
                  user_name: `${namecmt.value}`,
                  food_id: `${dataCmt[j].food_id}`,
                  rating: `${rating.value}`,
                  comments: `${cmt.value}`,
                },
              ],
            }),
          };
          const res = await fetch(
            `https://sheetdb.io/api/v1/o49nd7bsw9rod`,
            review
          );
          console.log(await res.json());
        }
        btnSendcmt.onclick = function () {
          postCmt();
          alert("Đã gửi đánh giá của bạn. Cảm ơn!");
          rating.value = `1`;
          cmt.value = ``;
          console.dir(rating);
        };
      }
    };

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
      modal.style.display = "none";
    };
  }

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function () {
    modal.style.display = "none";
    name.innerHTML = ``;
    addr.innerHTML = ``;
    desc.innerHTML = ``;
    like.innerHTML = `<i class="fas fa-heart"></i> `;
    price.innerHTML = ``;
    nameCmt.innerHTML = `<b>Tên: </b>`;
    evaluate.innerHTML = `<b>Đánh giá: </b>`;
    comments.innerHTML = `<b>Comment: </b>`;
  };
}

getDataAPI();
