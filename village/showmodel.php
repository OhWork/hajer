<style>
</style>
<div id="Modal" class="modal">

  <!-- The Close Button -->
  <button type="button" class="close" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>  <!-- Modal Content (The Image) -->
  <img class="modal-content" id= "show">

</div>
<script>
var modal = document.getElementById('Modal');
var modalImg = document.getElementById("show");
var img = document.getElementById('image');
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
}
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.click = function() {
	console.log('Yo น้า');
    modal.style.display = "none";
}
</script>
