let  gameOpening = document.getElementById("gameOpening")
let musicPack = new Audio('./musics/GeneriquePkm.mp3');
function getAnimation(){
    console.log("animation lancée");
    document.querySelector('.card-1').classList.add('anim');
    document.querySelector('.card-2').classList.add('anim2');
    musicPack.play();
}
document.addEventListener("click", getAnimation);


function getAleatoireCard(){

}