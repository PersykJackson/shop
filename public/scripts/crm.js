function inOrder(id){
    $.ajax({
        url: 'ajax',
        type: 'POST',
        data: ({action: 'inOrder', id: id}),
        dataType: 'html',
        success: reload()
    })
}
function reload(){
$('.frame').attr('src', '123');
$('.frame').load('crm/index .frame');
}