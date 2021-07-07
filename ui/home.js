const apps = function(){
    const math = {
      $: function(selector){return document.querySelector(selector)}
    }
    return math;
}

const io = new apps();

io.$("a").addEventListener("mousemove",function(event){
   console.log("Sample "+event.clientX+"px") 
});

