$('.modal-delete').magnificPopup({
    type: 'inline',

    fixedContentPos: false,
    fixedBgPos: true,

    overflowY: 'auto',

    closeBtnInside: true,
    preloader: false,

    midClick: true,
    removalDelay: 300,
    mainClass: 'my-mfp-zoom-in',
    modal: true
});

/*
 Modal Dismiss
 */
$(document).on('click', '.modal-dismiss', function (e) {
    e.preventDefault();
    $.magnificPopup.close();
});

/*
 Modal Confirm
 */
$(document).on('click', '.modal-confirm', function (e) {
    $.magnificPopup.close();
});

function setupDeleteModal(name,deleteUrl){
    $('#modalDeleteName').text(name);
    $('#deleteForm').attr('action', deleteUrl);
}