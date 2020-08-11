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
function reload(target){
    target = typeof target !== 'undefined' ?  target : '.hide';
    $(target).load('main/index '+target);
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
function onCategory(obj){
    let id = obj.value;
    $.ajax({
        url: 'main/ajax',
        type: 'POST',
        data: ({action: 'onCategory', target: id}),
        dataType: "html",
        success: reload('.contain')
    });
}