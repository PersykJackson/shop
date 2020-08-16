function inOrder(id){
    $.ajax({
        url: 'ajax',
        type: 'POST',
        data: ({action: 'inOrder', id: id})
    })
}