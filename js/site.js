var box = new Array();
box[0] = 'multi';
box[1] = 'single';

function high(field) {
    field.focus();
    field.select();
}

function toggle(id) {
    for (i = 0; i < box.length; i++) {
        document.getElementById(box[i]).style.display = 'none';
    }
    var id = document.getElementById(id);
    if (id.style.display == 'none') {
        id.style.display = 'block';
    } else {
        id.style.display = 'none';
    }
}
