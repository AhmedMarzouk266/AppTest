function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#previewHolder').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function () {
    $("#filePhoto").change(function () {
        readURL(this);
    });
});

var dev1 = document.getElementById('ajaxReload');
function changePosition(idSort,idNextSort,testId){
    var response = '';
    var url    = '/admin/question/edit?idSort='+idSort+'&idNextSort='+idNextSort;
    $.ajax({
        url        : url,
        type       : 'GET',
        success    : function(html){
           $('#ajaxReload').load('/admin/question/index?test_id='+testId+'&partView=true');
        }
    });

}
