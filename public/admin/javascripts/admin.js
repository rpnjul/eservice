/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var server = 'http://localhost/projects/genesis/';

$(document).ready(function(){
    addPageToMenu();
});

addPageToMenu = function(){
    $('.addMenu').click(function(){
        var confirmClick = confirm('Menambahkan halaman ini ke menu utama?');
        var title = $(this).attr('title');
        var permalink = $(this).attr('permalink');
        if (confirmClick == true){
            $.ajax({
                url : server + 'admin/pages/addToMenu',
                type : 'POST',
                data : ({
                    title : title,
                    permalink : permalink
                }),
                dataType : "html",
                success : function (msg){
                    $('#result').hide().html(msg).fadeIn();
                }
            });
        }
    });
}