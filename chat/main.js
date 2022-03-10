$(document).ready(function(){
    console.log('hi!');
    $.ajax({
        url : 'chat-list.php',
        type : 'GET',
        success: function(response){
            let users = JSON.parse(response);
            let render ='';
            users.forEach(user => {
                render +=`
                <tr userID="${user.id}">
                    <td><a class ="item-user" href="#">${user.name} ${user.lastname}</a></td>
                </tr>`
            });
            $('#list').html(render);
        }
    });
    $(document).on('click','.item-user', function(){
        let item = $(this)[0].parentElement.parentElement;
        let id = $(item).attr('userID');
        $.post('select-chat.php',{id}, function(response){
            let users = JSON.parse(response);
            let render = '';
            users.forEach(user => {
                render+=`
                <h5>${user.name} ${user.lastname}</h5>
                `
            });
            $('#chat').html(render);
        })
    });
});
    