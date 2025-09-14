$(function(){
  $(".tabs_content").not(":first").hide()
  $(".tabs_head .tab").on("click", function(){
    $(".tabs_head .tab").removeClass("active").eq($(this).index()).addClass("active")
    $(".tabs_content").hide().eq($(this).index()).fadeIn()
  }).eq(0).addClass("active")
})



document.getElementById("modal-open").addEventListener("click", function(){
    document.getElementById("mymodal").classList.add("open")
});

document.getElementById("modal-close").addEventListener("click", function(){
    document.getElementById("mymodal").classList.remove("open")
});

window.addEventListener('keydown', (e) => {
    if (e.key === "Escape") {
        document.getElementById("mymodal").classList.remove("open")
    }
});

document.querySelector("#mymodal .modal_box").addEventListener('click', event => {
    event._isClickWithInModal = true;
});
document.getElementById("mymodal").addEventListener('click', event => {
    if (event._isClickWithInModal) return;
    event.currentTarger.classList.remove('open');
});
