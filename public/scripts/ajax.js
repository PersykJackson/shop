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
function basketClean() {
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
function rel() {
    let v = '.contain';
    $('.contain').load('main/category '+v);
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
        success: rel()
    });
}
function toOrder() {
    $.ajax({
        url: 'main/ajax',
        type: 'POST',
        data: ({action: 'toOrder'}),
        dataType: "html"
    })
}
function deleteThisBask(obj){
    let id = obj.value;
    $.ajax({
        url: '/main/ajax',
        type: 'POST',
        data: ({action: 'deleteThis', target: id}),
        dataType: "html"
    });
    reloadBask();
}
function reloadBask() {
    let v = '.contain';
    $('.contain').load('/main/basket '+v);
}
function count(obj, id){
let count = obj.value;
$.ajax({
    url: '/main/ajax',
    type: 'POST',
    data: ({action: 'setCount', id: id, count: count}),
    dataType: 'html',
    success: $('.total').load('/main/basket .total')
})
}
function buy(){
    $.ajax({
        url: '/main/ajax',
        type: 'POST',
        data: ({action: 'buy'}),
        dataType: 'html'
    })
}
function logout(){
    $.ajax({
        url: '/main/ajax',
        type: 'POST',
        data: ({action: 'logout'}),
        dataType: 'html',
        success: window.location.reload()
    })
}
function show(){
    if($('.hide').css('display') === 'none'){
        $('.hide').css('display', 'block')
    }else{
        $('.hide').css('display', 'none')
    }

}