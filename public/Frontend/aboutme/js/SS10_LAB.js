// async function getDataAPI() {
//   let promise = await fetch(`https://sheetdb.io/api/v1/uo37nyuvbu1k8`);
//   let data = await promise.json();
//   console.log(data);

//   let thumb = document.getElementById(`imgFood`);
//   let name = document.getElementById(`name`);
//   // let introduce = document.getElementById(`introduce`);
//   let address = document.getElementById(`address`);
//   // let review = document.getElementById(`review`);
//   // let link = document.getElementById(`link`);
//   // let ingred = document.getElementById(`listIngred`);
//   let content = document.getElementById(`detail`);

//   let size = Object.keys(data).length;
//   console.log(size);

//   let index = Math.floor(Math.random() * size+1);

//   thumb.src = data[index].Image;
//   name.innerHTML += `${data[index].Name}`;
//   address.innerHTML += `<p style="font-weight: bold;">Địa chỉ: </p> ${data[index].Address}`;
//   content.insertAdjacentElement(`beforeend`,``)
//   // introduce.innerHTML += `<p style="font-weight: bold;">Instructions: </p> ${data[index].Introduce}`;
//   // review.innerHTML += `<p style="font-weight: bold;">Review: <a href="${data[index].Review}">${data[index].Review}</a></p>`;
//   //------------------------------------------------------------
//   // let food = data.meals[0];

//   // let thumb = document.getElementById(`imgFood`);
//   // let meal = document.getElementById(`meal`);
//   // let cate = document.getElementById(`category`);
//   // let area = document.getElementById(`area`);
//   // let tag = document.getElementById(`tags`);
//   // let instruc = document.getElementById(`instructions`);
//   // let link = document.getElementById(`link`);
//   // let ingred = document.getElementById(`listIngred`);

//   // thumb.src = food.strMealThumb;
//   // meal.innerHTML += `${food.strMeal}`;
//   // cate.innerHTML += `<p style="font-weight: bold;">Category:  ${food.strCategory}</p>`;
//   // area.innerHTML += `<p style="font-weight: bold;">Area: ${food.strArea}</p> `;
//   // tag.innerHTML += `<p style="font-weight: bold;">Tags:  ${food.strTags}</p>`;
//   // instruc.innerHTML += `<p style="font-weight: bold;">Instructions: </p> ${food.strInstructions}`;
//   // link.src = convertToEmbedUrl(food.strYoutube);

//   //   function convertToEmbedUrl(youtubeUrl) {
//   //     return youtubeUrl.replace("watch?v=", "embed/");
//   // }

//   // let size = Object.keys(food).length;
//   // console.log(size);

//   // for(let i=1;i<size;i++){
//   //     if()
//   // }
// }
// getDataAPI();

// let Reload = document.getElementById('reload');
// Reload.onclick = function () {
//   location.reload();
// }
async function getDataAPI() {
  let promise = await fetch(`https://sheetdb.io/api/v1/d8fe4j4mgrr9m`);
  let data = await promise.json();
  console.log(data);

  let size = Object.keys(data).length;
  let index = Math.floor(Math.random() * size);

  let name = document.getElementById("foodName");
  let like = document.getElementById("like");
  let img = document.getElementById("imgfood");
  let randfood = document.getElementById("randomfood");

  console.dir(name);
  console.dir(like);
  console.dir(img);
  console.dir(randfood);
  img.src = data[index]["food_img"];
  name.innerHTML += `${data[index].food_name}`;
  like.innerHTML += `${data[index].like}`;

  // detail
  let imgs = document.getElementById("imgs");
  let caption = document.getElementById("caption");
  let addr = document.getElementById("address");
  let desc = document.getElementById("desc");
  let likes = document.getElementById("likes");
  let price = document.getElementById("price");

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    let btnDetail = document.getElementById("btnDetail");
    btnDetail.onclick = function () {
      modal.style.display = "block";
      imgs.src = data[index].food_img;
      caption.innerHTML += `${data[index].food_name}`;
      addr.innerHTML += `<b>Địa chỉ: </b>${data[index].Address}`;
      desc.innerHTML += `<b>Giới thiệu: </b>${data[index].food_desc}`;
      likes.innerHTML += `${data[index].like}`;
      price.innerHTML += `<b>Giá: </b>${data[index].price} VND`;
      console.log(`modal ${index}`);
    };

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
      modal.style.display = "none";
    };

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on <span> (x), close the modal
  span.onclick = function () {
    modal.style.display = "none";
    caption.innerHTML = ``;
    addr.innerHTML = ``;
    desc.innerHTML = ``;
    likes.innerHTML = `<i class="fas fa-heart"></i> `;
    price.innerHTML = ``;

    index = Math.floor(Math.random() * size);
    img.src = data[index]["food_img"];
    name.innerHTML = `${data[index].food_name}`;
    like.innerHTML = `${data[index].like}`;
  };
}

getDataAPI();
