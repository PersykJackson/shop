function add(obj){
    let val = obj.value;
    $.ajax({
        url: 'main/ajax',
        type: 'POST',
        data: ({action: 'add', target: val}),
        dataType: "html"
    });
    reload();
}
function unc() {
    $.ajax({
        url: 'main/ajax',
        type: 'POST',
        data: ({action: 'deleteAll'}),
        dataType: "html"
    });
    reload();
}
function reload(){
    $(".hide").load('main/index .hide');
}
function deleteThis(obj){
    let id = obj.value;
    $.ajax({
        url: 'main/ajax',
        type: 'POST',
        data: ({action: 'deleteThis', target: id}),
        dataType: "html"
    });
    reload();
}