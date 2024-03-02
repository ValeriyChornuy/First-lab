$(document).ready(function() {
    $('.gallery-image').click(function() {
        var imageUrl = $(this).attr('src');
        $('#modalImage').attr('src', imageUrl);
        $('#imageModal').modal('show'); // Відображення модального вікна
    });
});

function closeModal() {
    $('#imageModal').modal('hide');
}
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="modalImage" class="img-fluid" alt="Велике фото">
            </div>
        </div>
    </div>
</div>

function openModal(img) {
    var modal = document.getElementById("myModal");
    var modalImg = document.getElementById("modalImage");

    if (modal && modalImg) {
        modalImg.src = img.src;
    }
}


function closeModal() {
    var modal = document.getElementById("myModal");
    if (modal) {
        modal.style.display = "none";
    }
}
